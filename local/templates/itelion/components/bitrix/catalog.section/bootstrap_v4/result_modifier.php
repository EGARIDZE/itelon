<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arPropsHtmlByElementId = CDataConstructor::genPropsHtml(
	array_column($arResult['ITEMS'], 'ID'),
	array_column($arResult['ITEMS'], 'DISPLAY_PROPERTIES'),
	array_column($arResult['ITEMS'], 'PREVIEW_TEXT'),
);
//clog($arPropsHtmlByElementId);

//refactor: сократить кол-во шаблонов листинга до 2 + вынести foreach в result_modifier карточки
foreach ($arResult['ITEMS'] as &$arItem) {
	$arItem['CARD_DATA']['PRICE'] = CDataModifier::PriceFormat($arItem['ITEM_PRICES'][0]['PRICE']);
	$arItem['CARD_DATA']['AVAIL'] = CDataModifier::QtyToStrValues(
		$arItem['CATALOG_QUANTITY']
		,$arItem['PROPERTIES']['AVAIL']['VALUE']
		,$arItem['PROPERTIES']['AVAIL']['XML_ID']
		,$arItem['PROPERTIES']['_MIN_DTIME']['VALUE'] ?: $arItem['PROPERTIES']['DELIVERY_TIME']['VALUE'] ?: ''
	);
	$arItem['CARD_DATA']['CONFIG_URL'] = $arItem['PROPERTIES']['CONFIGURATOR_URL']['VALUE'];
	$arItem['CARD_DATA']['PROPS'] = $arPropsHtmlByElementId[$arItem['ID']];
	$arItem['CARD_DATA']['STATUS'] = CDataConstructor::genStatusArray([
		'price' => $arItem['ITEM_PRICES'][0]['PRICE'] ?? 0,
		'discontinued' => $arItem['PROPERTIES']['DISCONTINUED']['VALUE'],
		'text' => $arItem['PROPERTIES']['MARK_STATUS']['VALUE'],
		'class' => $arItem['PROPERTIES']['MARK_STATUS']['VALUE_XML_ID']
	]);
	$arItem['CARD_DATA']['DISCONTINUED'] = $arItem['PROPERTIES']['DISCONTINUED']['VALUE'] == 1;
	$arItem['HIDE_PRICE'] = !$arItem['ITEM_PRICES'][0]['PRICE']
		&& ($arItem['PROPERTIES']['MANUFACTURER']['VALUE']==1486||$arItem['PROPERTIES']['DISCONTINUED']['VALUE']);
}
unset($arItem);
global $smartPreFilter;
global $arrFilter;
$sectionId = $arResult['ORIGINAL_PARAMETERS']['SECTION_ID'];
$arMergedFilters = array_merge($smartPreFilter ?? [], $arrFilter ?? []);
//clog($arrFilter);

$arResult['min_price'] = CDataHarvester::GetMinPrice($arResult['IBLOCK_ID'], $sectionId, $arMergedFilters);

//clog($arParams['SECTION_TYPE']);

$arResult['BRANDS'] = [];
$rsBrands = CIBlockElement::GetList(
	array("sort" => "ASC"),  array('IBLOCK_ID' => 16),false,false,
	array("ID", "IBLOCK_ID", "NAME",)
);

while($arElement = $rsBrands->GetNextElement()) {
	$arFields = $arElement->GetFields();
	$arResult['BRANDS'][$arFields['ID']] = $arFields['NAME'];
}
//clog($arResult['ITEMS']);
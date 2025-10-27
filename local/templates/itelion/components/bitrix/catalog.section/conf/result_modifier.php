<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arModelsIdList = [];
//clog(CDataHarvester::test($arResult["ITEMS"][0]['PROPERTIES']));
foreach ($arResult['ITEMS'] as &$arItem) {
	$arItem['CARD_DATA']['PRICE'] = CDataModifier::PriceFormat($arItem['ITEM_PRICES'][0]['PRICE']);
	$arItem['CARD_DATA']['AVAIL'] = CDataModifier::QtyToStrValues(
		$arItem['CATALOG_QUANTITY']
		, strDeliveryTime: $arItem['PROPERTIES']['DELIVERY_TIME']['VALUE']
	);
	// todo refactor - собирать опции сразу для всех конфигов вне цикла
	$arInstalledOptions = CDataHarvester::getInstalledOptions($arItem['PROPERTIES']);
	$arItem['CARD_DATA']['DESC'] = CDataConstructor::genConfShortSpecs($arInstalledOptions);

	$arModelsIdList[$arItem['PROPERTIES']['MODEL']['VALUE']][] = $arItem['ID'];
}
unset($arItem);

GLOBAL $arrFilter;
$arResult['min_price'] = CDataHarvester::GetMinPrice(
	EConfigIntConst::CONFIG_IBLOCK_ID->value
	, $arParams['SECTION_ID']
	, $arrFilter
);
$arCardData = CDataHarvester::GetConfigCardPics($arModelsIdList);
$arCardData += CDataHarvester::GetCatPropsForConfCards(array_keys($arModelsIdList));
//clog($arCardData);

foreach ($arResult['ITEMS'] as &$arItem) {
	$pic = $arCardData['PIC'][$arItem['PROPERTIES']['MODEL']['VALUE']] ?: $arItem['PREVIEW_PICTURE']['SRC'];
	$arItem['CARD_DATA']['PIC'] = $pic;
	$arItem['CARD_DATA']['DEL'] = $arCardData['PROPS'][$arItem['PROPERTIES']['MODEL']['VALUE']]['DELIVERY'];
	$arItem['CARD_DATA']['WTY'] = $arCardData['PROPS'][$arItem['PROPERTIES']['MODEL']['VALUE']]['WARRANTY'];
	$arItem['CARD_DATA']['STATUS'] = CDataConstructor::genStatusArray([
		"price" => $arItem['ITEM_PRICES'][0]['PRICE'] ?? 0,
		'discontinued' => $arItem['PROPERTIES']['DISCONTINUED']['VALUE'],
		'text' => $arItem['PROPERTIES']['STATUS']['VALUE'],
		'class' => CDataModifier::nameToStyleClass($arItem['PROPERTIES']['STATUS']['VALUE'])
	]);
	$arItem['CARD_DATA']['DISCONTINUED'] = $arItem['PROPERTIES']['DISCONTINUED']['VALUE'];
	$arItem['CARD_DATA']['BASKET_WTY'] = CDataModifier::wtyFormat(
		$arItem['PROPERTIES']['WARRANTY']['VALUE'],$arItem['CARD_DATA']['WTY']
	);
}
unset($arItem);

$arResult['filter_url'] = GarbageStorage::get('filter_url');
//clog($arResult['ITEMS']);
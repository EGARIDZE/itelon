<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arCodes = array_column($arResult['ITEMS'], 'CODE');

foreach ($arResult['ITEMS'] as &$arItem) {
	$arItem['CONFIG_PATH'] = $arParams['RCM_MODELS'][$arItem['CODE']]['CONFIG_PATH'] ?: '';
	$arItem['DESCRIPTION_LIST'] = $arParams['RCM_MODELS'][$arItem['CODE']]['CONFIG_DESC'];
	$arItem['CARD_DATA']['STATUS'] = CDataConstructor::genStatusArray(
		[
			'price' => $arItem['ITEM_PRICES'][0]['PRICE'] ?? 0,
			'discontinued' => $arItem['PROPERTIES']['DISCONTINUED']['VALUE'],
			'text' => $arItem['PROPERTIES']['STATUS']['VALUE'],
			'class' => CDataModifier::nameToStyleClass($arItem['PROPERTIES']['STATUS']['VALUE'])
		]
	);
	$arItem['CARD_DATA']['DISCONTINUED'] = $arItem['PROPERTIES']['DISCONTINUED']['VALUE'];
	$bShowPrice = $arItem['PROPERTIES']['TYPE']['VALUE'] != '';
	$arItem['CARD_DATA']['PRICE'] = CDataModifier::PriceFormat($arItem['ITEM_PRICES'][0]['PRICE'], false, $bShowPrice);
	$arItem['HIDE_PRICE'] = !$arItem['ITEM_PRICES'][0]['PRICE'] && ($arItem['PROPERTIES']['VENDOR']['VALUE']=='Lenovo'
		|| $arItem['PROPERTIES']['DISCONTINUED']['VALUE']);
	$arItem['CARD_DATA']['AVAIL'] = CDataModifier::QtyToStrValues(
		$arItem['CATALOG_QUANTITY'], strDeliveryTime: $arItem['PROPERTIES']['DELIVERY_TIME']['VALUE']
	);
	$arItem['CARD_DATA']['MIN_PRICE_WTY'] = match($arItem['PROPERTIES']['WARRANTY']['VALUE']) {
		'1' => '1 год'
		,'3' => '3 года'
		,default => ''
	};
}
unset($arItem);

//clog($arResult['ITEMS']);
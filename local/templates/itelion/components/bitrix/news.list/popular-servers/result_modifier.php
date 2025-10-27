<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arPropsHtmlByElementId = CDataConstructor::genPropsHtml(
	array_column($arResult['ITEMS'], 'ID'),
	array_column($arResult['ITEMS'], 'DISPLAY_PROPERTIES'),
	array_column($arResult['ITEMS'], 'PREVIEW_TEXT'),
);

foreach ($arResult['ITEMS'] as &$arItem) {
	$arItem['PRICE_FORMATTED'] = CDataModifier::PriceFormat($arItem['PRICE_1']);
	$arItem['CARD_DATA']['AVAIL'] = CDataModifier::QtyToStrValues(
		$arItem['QUANTITY']
		,$arItem['PROPERTIES']['AVAIL']['VALUE']
		,$arItem['PROPERTIES']['AVAIL']['XML_ID']
		,$arItem['PROPERTIES']['_MIN_DTIME']['VALUE'] ?: $arItem['PROPERTIES']['DELIVERY_TIME']['VALUE'] ?: ''
	);
	$arItem['CONF_URL'] = $arItem['PROPERTIES']['CONFIGURATOR_URL']['VALUE'];
	$arItem['CARD_DATA']['PROPS'] = $arPropsHtmlByElementId[$arItem['ID']];
	$arItem['CARD_DATA']['STATUS']['TEXT'] = $arItem['PROPERTIES']['MARK_STATUS']['VALUE'];
	$arItem['CARD_DATA']['STATUS']['CLASS'] = $arItem['PROPERTIES']['MARK_STATUS']['VALUE_XML_ID'];
	$arItem['CARD_DATA']['DISCONTINUED'] = $arItem['PROPERTIES']['DISCONTINUED']['VALUE'] == 1;
}
unset($arItem);
//clog($arResult['ITEMS']);
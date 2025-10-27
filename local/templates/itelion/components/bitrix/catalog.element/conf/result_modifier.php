<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
function GenTabHtml($sName, $bFlag = false, $sId='') {
	$html = "<h2 class='tabs__title";
	$html.= $bFlag ? " _active'" : "'";
	$html.= $sId ? " id='$sId'>" : ">";
	$html.= "$sName</h2>";
	return $html;
}
$model = $arResult['PROPERTIES']['MODEL']['VALUE'];
$arModelInfo = CDataHarvester::GetModelInfo($model);
$arResult['PREVIEW_PICTURE'] = $arModelInfo['PIC'] ?? $arResult['DEFAULT_PICTURE']['SRC'];

$arResult['SPECS']['TAB_DETAIL'] = $arModelInfo['DETAIL_TEXT'];
$arResult['PRODUCT_INFO'] = CDataHarvester::GetCatalogInfo($model);
$arResult['PRICE'] = CDataModifier::PriceFormat($arResult['ITEM_PRICES'][0]['PRICE']);
$arResult['AVAIL'] = CDataModifier::QtyToStrValues($arResult['CATALOG_QUANTITY']);

GarbageStorage::set('config_sku', $arResult['CODE']);
//clog($arResult["PROPERTIES"]);
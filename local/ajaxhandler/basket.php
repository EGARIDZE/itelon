<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

if(!empty($_POST['addBasketElement'])) {
	CBasketManager::addIbElement($_POST['addBasketElement']);
} else if (!empty($_POST['updateBasketElement'])) {
	$arData = is_array($_POST['updateBasketElement']) ? $_POST['updateBasketElement'] : json_decode($_POST['updateBasketElement'], true);
	CBasketManager::updateIbElement($arData[0], $arData[1]);
}
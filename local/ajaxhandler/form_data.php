<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

if (!empty($_POST['form_data_basket_desc'])) {
	$code = $_POST['form_data_basket_desc']['code'];
	$codeType = $_POST['form_data_basket_desc']['code_type'];
	$descr = CDataHarvester::getMinPriceSkuDescription(
		$code
		, codeType: $codeType
	);
	echo $descr;
}
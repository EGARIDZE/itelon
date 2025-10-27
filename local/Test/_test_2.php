<?php


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
spl_autoload_register(function ($class_name) {
	include $_SERVER['DOCUMENT_ROOT'] . "/local/lib/classes/$class_name.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/Configurator/$class_name.php";
});
function print_pre($needle)
{
	echo "<pre>";
	print_r($needle);
	echo '</pre>';
}

//print_pre(CDataHarvester::Test('P40423-B21'));
//print_pre(COptionsHarvester::Test('876897'));
GarbageStorage::set('1234', '7894');
print_pre(GarbageStorage::getAll());
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('catalog');
CModule::IncludeModule('iblock');
spl_autoload_register(function($class_name){
	include $_SERVER['DOCUMENT_ROOT']."/local/lib/classes/$class_name.php";
	include $_SERVER['DOCUMENT_ROOT']."/local/lib/classes/Configurator/$class_name.php";
	include $_SERVER['DOCUMENT_ROOT']."/local/php_interface/Configurator/$class_name.php";
});
?>
    <link rel="stylesheet" type="text/css" href="/local/Test/test.css">
<?
function print_pre($needle)
{
	echo"<pre>";print_r($needle);echo'</pre>';
}

//CPropsUpdater::updateCatConfigUrl();
//CCatalogFieldsUpdater::UpdateConf();
//echo "updated";

CConsoleExecutor::updateSetList();
//print_pre(CConsoleExecutor::getArResult());
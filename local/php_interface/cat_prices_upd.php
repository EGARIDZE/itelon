<?
#!/usr/local/php/bin/php -q
define('SITE_ID', 's1');
$_SERVER["DOCUMENT_ROOT"] = "/home/c/cx17768/Itelon/public_html";

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("BX_CAT_CRON", true);
define('NO_AGENT_CHECK', true);
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);
spl_autoload_register(function($class_name){
	include $_SERVER["DOCUMENT_ROOT"]."/local/lib/classes/$class_name.php";
});
CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');

CCatalogFieldsUpdater::UpdateCat();
CCatalogFieldsUpdater::UpdateConf();
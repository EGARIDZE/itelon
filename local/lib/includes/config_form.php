<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if (!GarbageStorage::get('config_sku'))
	GarbageStorage::set('config_sku', $_REQUEST['code']);

$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form",
	"configurator",
	array(
		"IBLOCK_TYPE" => "webform",
		"IBLOCK_ID" => "52",
		"STATUS_NEW" => "N",
		"LIST_URL" => "",
		"USE_CAPTCHA" => "Y",
		"USER_MESSAGE_EDIT" => "success",
		"USER_MESSAGE_ADD" => "success",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"PROPERTY_CODES" => array(
			0 => "414",
			1 => "415",
			2 => "416",
			3 => "417",
			4 => "NAME",
			5 => "PREVIEW_TEXT",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "414",
			1 => "NAME",
		),
		"GROUPS" => array(
			0 => "2",
		),
		"STATUS" => "ANY",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => "Y",
		"MAX_FILE_SIZE" => "0",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "",
		"CUSTOM_TITLE_NAME" => "Имя",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "Комментарии",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"SUCCESS_URL" => "",
		"COMPONENT_TEMPLATE" => "configurator"
	),
	false
);
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//$_REQUEST['section'] = 'blog';

if (!$_REQUEST["q"]) {
	$_REQUEST['q'] = $_SESSION['search_q'];
	$_REQUEST['s'] = $_SESSION['search_s'];
	$_REQUEST['section'] = $_SESSION['search_section'];
} else {
	$_SESSION['search_q'] = $_REQUEST['q'];
	$_SESSION['search_s'] = $_REQUEST['s'];
	$_SESSION['search_section'] = $_REQUEST['section'];
}
//clog($_REQUEST);

$strIblock = match ($_REQUEST['section']) {
	'solutions' => 'iblock_consolations',
	'news' => "iblock_news",
	'blog' => "iblock_news",
	default => "iblock_Catalog",
};
$strIblockId = match ($_REQUEST['section']) {
	'news' => '2',
	'blog' => '17',
	default => "17",
};
$APPLICATION->IncludeComponent(
	"arturgolubev:search.page", 
	//"search", 
	"",
	array(
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "30",
		"TAGS_URL_SEARCH" => "/search/index.php",
		"TAGS_INHERIT" => "Y",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"USE_SUGGEST" => "Y",
		"SHOW_RATING" => "Y",
		"PATH_TO_USER_PROFILE" => "",
		"AJAX_MODE" => "N",
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "N",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "Y",
		"USE_TITLE_RANK" => "Y",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => $strIblock
		),
		"SHOW_WHERE" => "N",
		"arrWHERE" => "",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "200",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "search",
		"arrFILTER_iblock_Catalog" => array(
			0 => "14",
		),
		"arrFILTER_iblock_news" => array(
			0 => $strIblockId,
		),
		"arrFILTER_iblock_consolations" => array(
			0 => "19",
		)
	),
	false
);
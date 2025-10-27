<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//clog($arResult);
?>

<section class="section sale-may">
	<div class="container">
		<div class="section__column">
<!--            баннер-->
            <?=htmlspecialchars_decode($arResult['PROPERTIES']['BANNER']['VALUE']['TEXT']);?>
<!--            основная часть-->
            <div class="articles__detail">
	            <?=htmlspecialchars_decode($arResult['DETAIL_TEXT']);?>
<!--                форма-->
	            <?$APPLICATION->IncludeComponent(
		            "bitrix:form",
		            "template1",
		            array(
			            "FORM_TEMPLATE" => "promo",
			            "FORM_TEXT" => $arResult['PROPERTIES']['FORM_TEXT'],
			            "AJAX_MODE" => "Y",
			            "AJAX_OPTION_ADDITIONAL" => "",
			            "AJAX_OPTION_HISTORY" => "N",
			            "AJAX_OPTION_JUMP" => "N",
			            "AJAX_OPTION_STYLE" => "Y",
			            "CACHE_TIME" => "3600",
			            "CACHE_TYPE" => "A",
			            "CHAIN_ITEM_LINK" => "",
			            "CHAIN_ITEM_TEXT" => "",
			            "COMPONENT_TEMPLATE" => "template1",
			            "EDIT_ADDITIONAL" => "N",
			            "EDIT_STATUS" => "N",
			            "IGNORE_CUSTOM_TEMPLATE" => "N",
			            "NAME_TEMPLATE" => "",
			            "NOT_SHOW_FILTER" => array(
				            0 => "",
				            1 => "",
			            ),
			            "NOT_SHOW_TABLE" => array(
				            0 => "",
				            1 => "",
			            ),
			            "RESULT_ID" => $_REQUEST["RESULT_ID"],
			            "SEF_MODE" => "N",
			            "SHOW_ADDITIONAL" => "N",
			            "SHOW_ANSWER_VALUE" => "Y",
			            "SHOW_EDIT_PAGE" => "N",
			            "SHOW_LIST_PAGE" => "N",
			            "SHOW_STATUS" => "N",
			            "SHOW_VIEW_PAGE" => "N",
			            "START_PAGE" => "new",
			            "SUCCESS_URL" => "",
			            "USE_EXTENDED_ERRORS" => "N",
			            "WEB_FORM_ID" => "1",
			            "VARIABLE_ALIASES" => array(
				            "action" => "action",
			            )
		            ),
		            false
	            );?>
            </div>
		</div>
	</div>
</section>

<? $APPLICATION->IncludeComponent(
    "bitrix:form",
    "template3",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NAME_TEMPLATE" => "",
		"NOT_SHOW_FILTER" => array("",""),
		"NOT_SHOW_TABLE" => array("",""),
		"RESULT_ID" => $_REQUEST["RESULT_ID"],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array("action"=>"action"),
		"WEB_FORM_ID" => "5"
	)
); ?>

<?

?>
<div id="cases_list_container">
		<?
		global $CaseFilter;
		$section = 'news_12_section';
		if (isset($_REQUEST[$section])) {
			$CaseFilter = [];
			$APPLICATION->RestartBuffer();
		} else {
			$CaseFilter = ['ID' => $arResult['PROPERTIES']['CASE_LINKS']['VALUE']];
        }
    $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "case_index",
    array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array("", ""),
        "FILE_404" => "",
        "FILTER_NAME" => "CaseFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "12",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "3",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => $_REQUEST[$section] ?? '',
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array("", "POSITION", ""),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
);
    if (isset($_REQUEST[$section])) die();
    ?>
</div>

<?
global $BlogFilter; $BlogFilter = ['ID' => $arResult['PROPERTIES']['BLOG_LINKS']['VALUE']];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "blog_list_content",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(0 => "", 1 => "",),
        "FILTER_NAME" => "BlogFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "17",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "3",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(0 => "", 1 => "",),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
); ?>

<section class="section">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "COMPONENT_TEMPLATE" => ".default",
                "AREA_FILE_SHOW" => "file",
                "PATH" => "/include/why.php",
                "EDIT_TEMPLATE" => ""
            ),
            false
        ); ?>
    </div>
</section>



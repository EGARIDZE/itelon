<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

if ($arParams["USE_RSS"] == "Y"):
    if (method_exists($APPLICATION, 'addheadstring'))
        $APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="' . $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] . '" href="' . $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] . '" />');
    ?>
    <a href="<?= $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["rss"] ?>" title="rss" target="_self"><img alt="RSS"
                                                                                                             src="<?= $templateFolder ?>/images/gif-light/feed-icon-16x16.gif"
                                                                                                             border="0"
                                                                                                             align="right"/></a>
<?
endif;

if ($arParams["USE_SEARCH"] == "Y"):?>
    <?= GetMessage("SEARCH_LABEL") ?><?php
    $APPLICATION->IncludeComponent(
        "bitrix:search.form",
        "flat",
        [
            "PAGE" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["search"]
        ],
        $component,
        ['HIDE_ICONS' => 'Y']
    ); ?>
    <br/>
<?php
endif;
if ($arParams["USE_FILTER"] == "Y"):
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.filter",
        "",
        [
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        ],
        $component,
        ['HIDE_ICONS' => 'Y']
    );
    ?>
    <br/>
<?php
endif;
?>


<section class="section">
    <div class="container">
        <div class="section__column">
            <div class="banner">
                <h1><?= $APPLICATION->ShowProperty('h1') ?></h1>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                ); ?>
                <div class="banner__image">
                    <picture>
                        <source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/cases-banner.webp" type="image/webp">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/files/images/cases-banner.webp" alt="#"></picture>
                </div>
            </div>
            <div id="cases_list_container" class="section__wrapper">
                <?
                $section = 'news_12_section';
                if (isset($_REQUEST[$section])) {
                    $APPLICATION->RestartBuffer();
                }
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "ajax_buttons",
                    array(
                            "ACTIVE_SECTION" => $_REQUEST[$section] ?? '',
                        "ALL_BUTTON_NAME" => "",
                        "TAG_ID" => "cases_list_container",
                        "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "N",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                        "IBLOCK_ID" => "12",
                        "IBLOCK_TYPE" => "news",
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array(
                            0 => "CODE",
                            1 => "NAME",
                            2 => "",
                        ),
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_URL" => "",
                        "SECTION_USER_FIELDS" => array(
                            0 => "",
                            1 => "",
                            2 => "",
                        ),
                        "SHOW_PARENT_NAME" => "Y",
                        "TOP_DEPTH" => "1",
                        "VIEW_MODE" => "LINE",
                        "COMPONENT_TEMPLATE" => "ajax_buttons"
                    ),
                    false
                );
                $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "",
                            [
                                "AJAX_MODE" => "Y",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "Y",
                                "AJAX_OPTION_STYLE" => "Y",
                                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                                "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                                "SORT_BY1" => $arParams["SORT_BY1"],
                                "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                                "SORT_BY2" => $arParams["SORT_BY2"],
                                "PARENT_SECTION_CODE" => $_REQUEST[$section] ?? '',
                                "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                                "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
                                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                                "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
                                "SET_TITLE" => $arParams["SET_TITLE"],
                                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                                "MESSAGE_404" => $arParams["MESSAGE_404"],
                                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                                "SHOW_404" => $arParams["SHOW_404"],
                                "FILE_404" => $arParams["FILE_404"],
                                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                                "CACHE_TIME" => $arParams["CACHE_TIME"],
                                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                                "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                                "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                                "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                                "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                                "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                                "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                                "FILTER_NAME" => $arParams["FILTER_NAME"],
                                "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                                "CHECK_DATES" => $arParams["CHECK_DATES"],
                            ],
                            $component,
                            ['HIDE_ICONS' => 'Y']
                        );
                if (isset($_REQUEST[$section])) die();
                ?>
            </div>

        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "COMPONENT_TEMPLATE" => ".default",
                "AREA_FILE_SHOW" => "file",
                "PATH" => "/include/choosen-preview.php",
                "EDIT_TEMPLATE" => ""
            ),
            false
        ); ?>
    </div>
</section>




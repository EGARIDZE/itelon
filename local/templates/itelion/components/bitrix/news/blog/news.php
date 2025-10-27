<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
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

if($arParams["USE_RSS"]=="Y"):
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?
endif;

if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?php
	$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	[
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	],
	$component,
		['HIDE_ICONS' => 'Y']
);?>
<br />
<?php
endif;
if($arParams["USE_FILTER"]=="Y"):
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
<br />
<?php
endif;

?>
    <section class="section">
    <div class="container">
    <div class="section__column">
    <div class="banner">
        <div class="page-preview">
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
        </div>
        <div class="banner__image">
            <picture>
                <source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/blog-banner.webp" type="image/webp">
                <img src="<?= SITE_TEMPLATE_PATH ?>/files/images/blog-banner.webp" alt="#"></picture>
        </div>
    </div>
        <div id="blog_tags_head" class="navigation">
            <?
            $arSelect = ['ID', 'IBLOCK_ID', 'NAME'];
            $arFilter = ['IBLOCK_CODE' => 'blog_tags', 'ACTIVE' => 'Y', 'SECTION_CODE' => 'header-tags'];
            $res = CIBlockElement::GetList(['SORT'=>'asc'], $arFilter, false, false, $arSelect);
            while ($ob = $res->Fetch()) {
                ?>
                <p class="navigation__item btn btn_medium btn_outlined" data-id="<?=$ob['ID'];?>"><?=$ob['NAME'];?></p>
                <?
            }?>
            <!-- Активному пункту добавляется класс _active-->

        </div>
    <div class="blog__wrapper">

        <div id="blog__list">
            <?
                global $arBlogListFilter;
                $newsQty = '12';
                if (isset($_REQUEST['blog_filter'])) {
                    if ($_REQUEST['blog_filter']) {
	                    $arBlogListFilter = ['PROPERTY_TAGS_LINKS' => $_REQUEST['blog_filter']];
	                    $newsQty = '100';
                    } else {
                        $arBlogListFilter = [];
	                    $newsQty = '12';
                    }
	                $APPLICATION->RestartBuffer();
                }
                $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	[
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $newsQty,
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
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
		"FILTER_NAME" => 'arBlogListFilter',
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
	],
	$component,
	['HIDE_ICONS' => 'Y']
);
                if (isset($_REQUEST['blog_filter'])) die();
            ?>
        </div>

        <div class="blog__sidebar">
		    <? if($arResult['POPULAR']):?>
                <div class="blog__top">
                    <h3>Топ 3: популярные статьи</h3>
                    <ul>
					    <? foreach ($arResult['POPULAR'] as $item):?>
                            <li><a href="<?= $item['DETAIL_PAGE_URL']?>"><?= $item['NAME']?></a></li>
					    <? endforeach;?>
                    </ul>
                </div>
		    <? endif;?>

	        <?$APPLICATION->IncludeComponent(
		        "bitrix:form",
		        "sub_news",
		        array(
			        "FORM_TEMPLATE" => "side",
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
			        "SHOW_ANSWER_VALUE" => "N",
			        "SHOW_EDIT_PAGE" => "N",
			        "SHOW_LIST_PAGE" => "N",
			        "SHOW_STATUS" => "Y",
			        "SHOW_VIEW_PAGE" => "N",
			        "START_PAGE" => "new",
			        "SUCCESS_URL" => "",
			        "USE_EXTENDED_ERRORS" => "N",
			        "WEB_FORM_ID" => "11",
			        "COMPONENT_TEMPLATE" => "sub_news",
			        "VARIABLE_ALIASES" => array(
				        "action" => "action",
			        )
		        ),
		        false
	        );?>

            <div class="articles__marketing">
			    <? $APPLICATION->IncludeComponent(
				    "bitrix:main.include",
				    ".default",
				    array(
					    "COMPONENT_TEMPLATE" => ".default",
					    "AREA_FILE_SHOW" => "file",
					    "PATH" => "/include/consultation.php",
					    "EDIT_TEMPLATE" => ""
				    ),
				    false
			    ); ?>
			    <? $APPLICATION->IncludeComponent(
				    "bitrix:main.include",
				    ".default",
				    array(
					    "COMPONENT_TEMPLATE" => ".default",
					    "AREA_FILE_SHOW" => "file",
					    "PATH" => "/include/import-substitution.php",
					    "EDIT_TEMPLATE" => ""
				    ),
				    false
			    ); ?>
			    <? $APPLICATION->IncludeComponent(
				    "bitrix:main.include",
				    ".default",
				    array(
					    "COMPONENT_TEMPLATE" => ".default",
					    "AREA_FILE_SHOW" => "file",
					    "PATH" => "/include/help.php",
					    "EDIT_TEMPLATE" => ""
				    ),
				    false
			    ); ?>
            </div>
            <div id="blog_tags_cloud" class="navigation">
			    <? $APPLICATION->IncludeComponent(
				    "bitrix:main.include",
				    ".default",
				    array(
					    "COMPONENT_TEMPLATE" => ".default",
					    "AREA_FILE_SHOW" => "file",
					    "PATH" => "/include/blog-sets.php",
					    "EDIT_TEMPLATE" => ""
				    ),
				    false
			    ); ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
<?
$APPLICATION->IncludeComponent(
    "bitrix:form",
    "sub_news",
    Array(
            'FORM_TEMPLATE' => "",
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
        "SHOW_STATUS" => "Y",
        "SHOW_VIEW_PAGE" => "N",
        "START_PAGE" => "new",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "VARIABLE_ALIASES" => Array("action"=>"action"),
        "WEB_FORM_ID" => "11"
    )
);

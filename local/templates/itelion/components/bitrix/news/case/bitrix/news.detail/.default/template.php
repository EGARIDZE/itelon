<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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


//mpr($arResult['ITEMS']);
?>



<section class="section">
    <div class="container">
        <div class="section__column">
            <div class="case-banner">
                <div class="case-banner__bg" style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/case-banner.webp');"></div>
                <div class="case-banner__content">
                    <? if($arResult['PROPERTIES']['TITLE']['VALUE']):?>
                        <h1><?=$arResult['PROPERTIES']['TITLE']['VALUE']['TEXT']?></h1>
                    <? else:?>
                        <h1><?=$arResult['NAME']?></h1>
                    <? endif;?>
                    <? if($arResult['PROPERTIES']['DESCRIPTION']['VALUE']):?>
                        <div class="case-banner__preview">
                            <p>
                                <?=$arResult['PROPERTIES']['DESCRIPTION']['VALUE']['TEXT']?>
                            </p>
                        </div>
                    <? endif;?>
	                <?$APPLICATION->IncludeComponent(
		                "bitrix:breadcrumb",
		                "cases",
		                Array(
			                "PATH" => "",
			                "SITE_ID" => "s1",
			                "START_FROM" => "0",
		                )
	                );?>
                </div>
            </div>
						<?php if($arResult['PROPERTIES']['TITLE_CASE']['VALUE']):?>
							<div class="articles__detail">
								<div class="articles__wrapper">
									<? foreach ($arResult['PROPERTIES']['TITLE_CASE']['VALUE'] as $key => $value):?>
									<div class="case-description__content">
										<h3> <?= $value?></h3>
										<?= $arResult['PROPERTIES']['DESCRIPTION_CASE']['~VALUE'][$key]['TEXT'] ?>
            </div>
									<?  endforeach;?>

            <? if($arResult['PROPERTIES']['PROPERTY']['VALUE']):?>
                <div class="case-properties">

                    <? foreach ($arResult['PROPERTIES']['PROPERTY']['~VALUE'] as $item):?>
                    <div class="properties__item">
                    <?= $item['TEXT']?>
                    </div>
                    <?  endforeach;?>
                </div>
                <?
                if($arResult['PROPERTIES']['COMMENT']['VALUE']) {
                    ?>
                    <div class="properties__item properties__item_big">
                        <h3>Комментарий заказчика</h3>
                        <span><?=$arResult['PROPERTIES']['COMMENT']['VALUE']['TEXT'];?></span>
                    </div>
                    <?
                }
                ?>

            <? endif;?>
        </div>
        <?$arData = $arResult['PROPERTIES']['FORM_TEXT']['VALUE']['SUB_VALUES']??[];?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:form",
            "template1",
            array(
                "FORM_TEMPLATE" => "promo",
                "FORM_TEXT" => $arData,
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
						<? endif;?>
                </div>
            </div>
        </section>

<?php if($arResult['PROPERTIES']['TITLE_PROD']['VALUE']):?>
    <section class="section">
        <div class="container">
            <div class="case-product">
                <div class="case-product__content">
                    <div class="case-product__header">
                        <h2><?= $arResult['PROPERTIES']['TITLE_PROD']['VALUE']?></h2>
                        <?php if($arResult['PROPERTIES']['SUB_TITLE_PROD']['VALUE']):?>
                            <div class="case-product__preview">
                                <p><?= $arResult['PROPERTIES']['SUB_TITLE_PROD']['VALUE']?></p>
                            </div>
                        <? endif;?>
                    </div>
                    <div class="case-product__main">
                        <?php if($arResult['PROPERTIES']['DESCRIPTION_PROD']['~VALUE']):?>
                            <div class="case-product__text">
                                <?= $arResult['PROPERTIES']['DESCRIPTION_PROD']['~VALUE']['TEXT']?>
                            </div>
                        <? endif;?>
                        <?php if($arResult['PROPERTIES']['LINK_PROD']['VALUE']):?>
                            <span class="btn btn_large btn_primary" >
                                <span class="children">Узнать больше о продукте</span>
                                <a href="<?= $arResult['PROPERTIES']['LINK_PROD']['VALUE']?>"   class="cover " ></a>
                            </span>
                        <? endif;?>
                    </div>
                </div>
                <?php if($arResult['PROPERTIES']['PICTURE_PROD']['VALUE']):?>
                    <div class="case-product__image">
                        <picture><source srcset="<?= \CFile::GetPath($arResult['PROPERTIES']['PICTURE_PROD']['VALUE']) ?>"><img src="<?= \CFile::GetPath($arResult['PROPERTIES']['PICTURE_PROD']['VALUE']) ?>" alt="photo"></picture>
                    </div>
                <? endif;?>
            </div>
        </div>
    </section>
<? endif;?>






<?php if($arResult['PROPERTIES']['ITEMS']['VALUE']):?>
    <section class="section">
    <div class="container">
        <div class="section__wrapper">
            <h2>Продукты в кейсе</h2>
	        <?php
	        $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['ITEMS']['VALUE'];
	        $APPLICATION->IncludeComponent(
		        "bitrix:catalog.section",
		        "similar_list",
		        array(
			        "ACTION_VARIABLE" => "action",
			        "ADD_PICT_PROP" => "-",
			        "ADD_PROPERTIES_TO_BASKET" => "Y",
			        "ADD_SECTIONS_CHAIN" => "N",
			        "ADD_TO_BASKET_ACTION" => "ADD",
			        "AJAX_MODE" => "Y",
			        "AJAX_OPTION_ADDITIONAL" => "",
			        "AJAX_OPTION_HISTORY" => "N",
			        "AJAX_OPTION_JUMP" => "Y",
			        "AJAX_OPTION_STYLE" => "Y",
			        "BACKGROUND_IMAGE" => "-",
			        "BASKET_URL" => "/personal/basket.php",
			        "BROWSER_TITLE" => "-",
			        "CACHE_FILTER" => "N",
			        "CACHE_GROUPS" => "Y",
			        "CACHE_TIME" => "36000000",
			        "CACHE_TYPE" => "A",
			        "COMPATIBLE_MODE" => "N",
			        "CONVERT_CURRENCY" => "N",
			        "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
			        "DETAIL_URL" => "",
			        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
			        "DISPLAY_BOTTOM_PAGER" => "N",
			        "DISPLAY_COMPARE" => "N",
			        "DISPLAY_TOP_PAGER" => "N",
			        "ELEMENT_SORT_FIELD" => "QUANTITY",
			        "ELEMENT_SORT_FIELD2" => "SCALED_PRICE_1",
			        "ELEMENT_SORT_ORDER" => "desc",
			        "ELEMENT_SORT_ORDER2" => "asc,nulls",
			        "ENLARGE_PRODUCT" => "STRICT",
			        "FILTER_NAME" => "groupFilter",
			        "HIDE_NOT_AVAILABLE" => "L",
			        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
			        "IBLOCK_ID" => "14",
			        "IBLOCK_TYPE" => "Catalog",
			        "INCLUDE_SUBSECTIONS" => "A",
			        "LABEL_PROP" => array(
			        ),
			        "LAZY_LOAD" => "Y",
			        "LINE_ELEMENT_COUNT" => "4",
			        "LOAD_ON_SCROLL" => "N",
			        "MESSAGE_404" => "",
			        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
			        "MESS_BTN_BUY" => "Купить",
			        "MESS_BTN_DETAIL" => "Подробнее",
			        "MESS_BTN_LAZY_LOAD" => "Показать ещё",
			        "MESS_BTN_SUBSCRIBE" => "Подписаться",
			        "MESS_NOT_AVAILABLE" => "Нет в наличии",
			        "MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
			        "META_DESCRIPTION" => "-",
			        "META_KEYWORDS" => "-",
			        "OFFERS_LIMIT" => "5",
			        "PAGER_BASE_LINK_ENABLE" => "N",
			        "PAGER_DESC_NUMBERING" => "N",
			        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			        "PAGER_SHOW_ALL" => "N",
			        "PAGER_SHOW_ALWAYS" => "N",
			        "PAGER_TEMPLATE" => "modern",
			        "PAGER_TITLE" => "Товары",
			        "PAGE_ELEMENT_COUNT" => "4",
			        "PARTIAL_PRODUCT_PROPERTIES" => "N",
			        "PRICE_CODE" => array(
				        0 => "price",
			        ),
			        "PRICE_VAT_INCLUDE" => "Y",
			        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			        "PRODUCT_ID_VARIABLE" => "id",
			        "PRODUCT_PROPS_VARIABLE" => "prop",
			        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
			        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
			        "PRODUCT_SUBSCRIPTION" => "N",
			        "SECTION_CODE" => "",
			        "SECTION_ID" => $_REQUEST["SECTION_ID"],
			        "SECTION_ID_VARIABLE" => "SECTION_ID",
			        "SECTION_URL" => "",
			        "SECTION_USER_FIELDS" => array(
				        0 => "",
				        1 => "",
			        ),
			        "SEF_MODE" => "N",
			        "SET_BROWSER_TITLE" => "N",
			        "SET_LAST_MODIFIED" => "N",
			        "SET_META_DESCRIPTION" => "N",
			        "SET_META_KEYWORDS" => "N",
			        "SET_STATUS_404" => "N",
			        "SET_TITLE" => "N",
			        "SHOW_404" => "N",
			        "SHOW_ALL_WO_SECTION" => "Y",
			        "SHOW_CLOSE_POPUP" => "N",
			        "SHOW_DISCOUNT_PERCENT" => "N",
			        "SHOW_FROM_SECTION" => "N",
			        "SHOW_MAX_QUANTITY" => "N",
			        "SHOW_OLD_PRICE" => "N",
			        "SHOW_PRICE_COUNT" => "1",
			        "SHOW_SLIDER" => "N",
			        "SLIDER_INTERVAL" => "3000",
			        "SLIDER_PROGRESS" => "N",
			        "TEMPLATE_THEME" => "blue",
			        "USE_ENHANCED_ECOMMERCE" => "N",
			        "USE_MAIN_ELEMENT_SECTION" => "N",
			        "USE_PRICE_COUNT" => "N",
			        "USE_PRODUCT_QUANTITY" => "N",
			        "COMPONENT_TEMPLATE" => "similar_list",
			        "USE_OFFER_NAME" => "N",
			        "SECTIONS_OFFSET_MODE" => "N",
			        "SECTIONS_SECTION_ID" => "",
			        "SECTIONS_SECTION_CODE" => "",
			        "SECTIONS_TOP_DEPTH" => "2",
			        "SHOW_SECTIONS" => "Y",
			        "DEFERRED_LOAD" => "N",
			        "CYCLIC_LOADING" => "N",
			        "CYCLIC_LOADING_COUNTER_NAME" => "cycleCount",
			        "PROPERTY_CODE_MOBILE" => array(
			        )
		        ),
		        false
	        );?>
        </div>
    </div>
</section>
<?php endif;?>

<?$APPLICATION->IncludeComponent(
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
        "SHOW_ANSWER_VALUE" => "Y",
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
);?>
<div id="cases_list_container">
	<?
	$section = 'news_12_section';
	if (isset($_REQUEST[$section])) {
		$APPLICATION->RestartBuffer();
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
			"AJAX_OPTION_JUMP" => "Y",
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
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILE_404" => "",
			"FILTER_NAME" => "",
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
			"PAGER_TEMPLATE" => "modern",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => $_REQUEST[$section] ?? '',
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "POSITION",
				2 => "",
			),
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
			"STRICT_SECTION_CHECK" => "N",
			"COMPONENT_TEMPLATE" => "case_index"
		),
		false
	);
	if (isset($_REQUEST[$section])) die();
	?>
</div>


<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "blog_list_content",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
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
        "FIELD_CODE" => array("",""),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "17",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "4",
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
        "PROPERTY_CODE" => array("",""),
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
);?>

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




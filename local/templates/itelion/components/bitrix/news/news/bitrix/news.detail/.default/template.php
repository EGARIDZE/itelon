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

?>

    <section class="section">
        <div class="container">
            <div class="section__column">
                <div class="section__wrapper">
                    <div class="page-preview">
                        <h1><?=$arResult['NAME']?></h1>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "breadcrumb",
                            Array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "0"
                            )
                        );?>
                    </div>
                    <div class="articles__detail">
                        <div class="articles__wrapper">
                            <div class="articles__preview">
                                <div class="articles__date"><span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span></div>
																<div>
                                <div class="articles__label">
                                    <div class="articles__icon">
                                        <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/eye.svg" alt="#">
                                    </div>
                                    <span><?=$arResult["SHOW_COUNTER"];?></span>
                                </div>
                                <div class="articles__label">
                                    <div class="articles__icon">
                                        <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/clock.svg" alt="#">
                                    </div>
                                    <span><?=$arResult['PROPERTIES']['TIME']['VALUE']?></span>
                                </div>
																</div>
                            </div>
                            <div class="articles__content">
                                <?
                                if ($arResult['DISPLAY_PROPERTIES']['DETAIL_TEXT_UP']['DISPLAY_VALUE']) {
                                    ?>
                                <div class="articles__text">
                                    <?=$arResult['DISPLAY_PROPERTIES']['DETAIL_TEXT_UP']['DISPLAY_VALUE']?>
                                    <picture><source srcset="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" type="image/webp"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="#"></picture>
                                </div>
                                    <?
                                }
                                if($arResult['PROPERTIES']['ITEMS']['VALUE']) {
	                                $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['ITEMS']['VALUE'];
	                                $APPLICATION->IncludeComponent(
		                                "bitrix:catalog.section",
		                                "top-list_blog",
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
			                                "DISPLAY_BOTTOM_PAGER" => "Y",
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
			                                "COMPONENT_TEMPLATE" => "top-list_blog",
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
	                                );
                                }

                                if ($arResult['DISPLAY_PROPERTIES']['DETAIL_TEXT_DOWN']['DISPLAY_VALUE']) {
                                    ?>
                                <div class="articles__text">
                                   <?=$arResult['DISPLAY_PROPERTIES']['DETAIL_TEXT_DOWN']['DISPLAY_VALUE']?>
                                </div>
                                    <?
                                }
                                ?>

                            </div>
                        </div>

                        <div class="articles__marketing">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "case_index",
    Array(
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
        "FIELD_CODE" => array("",""),
        "FILE_404" => "",
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "12",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
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
        "PROPERTY_CODE" => array("","POSITION",""),
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
);?>


<?$APPLICATION->IncludeComponent(
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
        "NOT_SHOW_FILTER" => array(0=>"",1=>"",),
        "NOT_SHOW_TABLE" => array(0=>"",1=>"",),
        "RESULT_ID" => $_REQUEST["RESULT_ID"],
        "SEF_MODE" => "Y",
        "SHOW_ADDITIONAL" => "N",
        "SHOW_ANSWER_VALUE" => "N",
        "SHOW_EDIT_PAGE" => "N",
        "SHOW_LIST_PAGE" => "N",
        "SHOW_STATUS" => "Y",
        "SHOW_VIEW_PAGE" => "N",
        "START_PAGE" => "new",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "VARIABLE_ALIASES" => array("action"=>"action",),
        "WEB_FORM_ID" => "11"
    )
);?>


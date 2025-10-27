<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$title = $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'];
?>


    <section class="section">
        <div class="container">
            <div class="section__column">
            <div class="shop-item__detail" data-shop-item-get-id="<?=$arResult['ID'];?>" data-shop-item-get-type="config">
                <div class="section__wrapper">
                    <div class="page-preview">
                        <h1 data-shop-item-get="title"><?= $title; ?></h1>
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
                    <div class="ware">
                        <div class="ware__wrapper">
                            <div class="ware__slider ware-slider">
                                <div class="ware-slider_main">
                                    <div class="swiper-wrapper">
                                        <? if ($arResult['PREVIEW_PICTURE']): ?>
                                            <div class="swiper-slide ware-slider_main__item">
                                                <picture>
                                                    <source srcset="<?= $arResult['PREVIEW_PICTURE'] ?>"
                                                            type="image/webp">
                                                    <img src="<?= $arResult['PREVIEW_PICTURE'] ?>"
                                                         alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>"></picture>
                                            </div>
                                        <? endif; ?>
                                        <? if ($arResult['PROPERTIES']['GALLERY']['VALUE']): ?>
                                            <? foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $item): ?>
                                                <div class="swiper-slide ware-slider_main__item">
                                                    <picture>
                                                        <source srcset="<?= \CFile::GetPath($item) ?>"
                                                                type="image/webp">
                                                        <img src="<?= \CFile::GetPath($item) ?>" alt="photo"></picture>
                                                </div>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                    </div>
                                    <div class="slider__navigation ware-slider__navigation">
                                        <div class="_prev"></div>
                                        <div class="_next"></div>
                                    </div>
                                </div>
                                <div class="ware-slider_secondary">
                                    <div class="swiper-wrapper">
                                        <? if ($arResult['DETAIL_PICTURE']['SRC']): ?>
                                            <div class="swiper-slide ware-slider_secondary__item">
                                                <picture>
                                                    <source srcset="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                                                            type="image/webp">
                                                    <img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                                                         alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>"></picture>
                                            </div>
                                        <? endif; ?>
                                        <? if ($arResult['PROPERTIES']['GALLERY']['VALUE']): ?>
                                            <? foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $item): ?>
                                                <div class="swiper-slide ware-slider_secondary__item">
                                                    <picture>
                                                        <source srcset="<?= \CFile::GetPath($item) ?>"
                                                                type="image/webp">
                                                        <img src="<?= \CFile::GetPath($item) ?>" alt="photo"></picture>
                                                </div>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ware__info ware-info">
                                <div data-shop-item-get="delivery" style="display: none;"><?= $arResult['AVAIL']['text']; ?></div>
                                <div data-shop-item-get="warranty" style="display: none;"><?$APPLICATION->ShowViewContent('config-warranty');?></div>
                                <div class="ware-info__item">
                                    <h3 class="ware-info__title">Характеристики:</h3>
                                    <div class="ware-info__body">
                                        <div data-shop-item-get="description">
                                            <?
                                            $APPLICATION->ShowViewContent('config-short-specs');
                                            ?>
                                        </div>
                                        <a href="#ware-properties" class="ware-info__more link-scroll">Подробнее</a>
                                    </div>
                                </div>
                                <? if ($arResult['PRODUCT_INFO']['FILES']): ?>
                                    <div class="ware-info__item">
                                        <h3 class="ware-info__title">Руководство пользователя:</h3>
                                        <div class="ware-info__body">
                                            <? foreach ($arResult['PRODUCT_INFO']['FILES'] as $title => $src): ?>
                                                <a href="<?= $src ?>" target="_blank" class="ware-info__doc"
                                                   download=""><?= $title ?></a>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                        <div class="ware__settings ware-settings">
                            <div class="ware-settings__wrapper">
                                <div class="ware-settings__score">
                                    <div class="ware-settings__count">
                                        <div class="ware-settings__value" data-shop-item-get="price"><?= $arResult['PRICE']; ?></div>
                                        <div class="ware-settings__tax">включая НДС 20%</div>
                                    </div>
                                    <div class="ware-settings__place"><?= $arResult['AVAIL']['text']; ?></div>
                                </div>
                                <div class="ware-settings__info">
                                    <ul>
                                        <? if ($arResult['PRODUCT_INFO']['DELIVERY']): ?>
                                            <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg"
                                                     alt="icon"><?= $arResult['PRODUCT_INFO']['DELIVERY'] ?></li>
                                        <? endif; ?>
                                        <? if ($arResult['PRODUCT_INFO']['WARRANTY']): ?>
                                            <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg"
                                                     alt="icon"><?= $arResult['PRODUCT_INFO']['WARRANTY'] ?>
                                            </li>
                                        <? endif; ?>
                                        <? if ($arResult['PRODUCT_INFO']['LEASING']): ?>
                                            <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/calendar.svg"
                                                     alt="icon"><?= $arResult['PRODUCT_INFO']['LEASING'] ?></li>
                                        <? endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="ware-settings__btns">
                                <div class="ware-settings__buy">
                                <span class="btn btn_large btn_secondary">
                                    <span class="children">Купить</span>
                                    <a href="#tender" class="cover popup-link"></a>
                                </span>
                                    <button class="btn btn_large btn_icon btn_outlined btn_shop" data-shop-item="btn">
                                        <div class="btn_shop__label">
                                            Добавить в корзину
                                        </div>
                                        <div class="btn_shop__check"></div>
                                        <span class="children"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg"></span>
                                    </button>
                                </div>
                                <span class="btn btn-icon btn_primary btn-icon_large btn-icon_config">
                                    <span class="children">Сконфигурировать</span>
                                    <a href="#config_fold" class="cover "></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/preferences.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>

                <div class="tabs service__tabs">
                    <div class="tabs__titles">
                        <!-- Для активного таба добавляется класс _active-->
                        <?
                            $sName = 'Конфигуратор';
                            echo GenTabHtml($sName, true, 'config_fold');
                            echo GenTabHtml(sName:'Описание платформы', sId:'ware-properties');
                            echo GenTabHtml('Почему выбирают нас');
                        ?>
                    </div>
                    <div class="tabs__wrapper">
                        <!-- Для активного таба добавляется класс _active-->
                        <div class="tabs__content _active">
	                        <?$APPLICATION->IncludeComponent(
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
	                        );?>
                        </div>
                        <div class="tabs__content">
                            <div class="ware-config-desc">
                                <div class="ware-config-desc__wrapper">
	                                <?=$arResult['SPECS']['TAB_DETAIL'];?>
                                </div>
                                <div class="ware-config-desc__props">
                                    <div class="specifications">
	                                    <? if ($arResult['PRODUCT_INFO']['PROPS']): ?>
		                                    <? foreach ($arResult['PRODUCT_INFO']['PROPS'] as $title => $description): ?>
                                                <div class="specifications__item">
                                                    <h3><?= $title ?></h3>
                                                    <div class="specifications__value">
					                                    <?= $description ?>
                                                    </div>
                                                </div>
		                                    <? endforeach; ?>
	                                    <? endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs__content">
                            <div class="choosen">

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

                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => "/include/choosen-perfectly.php",
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
                                        "PATH" => "/include/choosen-specifications.php",
                                        "EDIT_TEMPLATE" => ""
                                    ),
                                    false
                                ); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<? if ($arResult['SETS']): ?>
    <section class="section">
        <div class="container">
            <div class="navigation">
                <!-- Активному пункту добавляется класс _active-->
                <? foreach ($arResult['SETS'] as $item): ?>
                    <a href="/category/<?= $item['CODE'] ?>/"
                       class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME'] ?></a>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? endif; ?>

<? if ($arResult['PROPERTIES']['SIMILAR_PRODUCTS']['VALUE']): ?>
    <section class="section">
        <div class="container">
            <div class="similar">
                <h2>Похожие модели</h2>
                <div class="similar__list">
                    <?php
                    $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['SIMILAR_PRODUCTS']['VALUE'];
                    $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section",
                        "similar_list",
                        array(
                            "ACTION_VARIABLE" => "action",
                            "ADD_PICT_PROP" => "-",
                            "ADD_PROPERTIES_TO_BASKET" => "Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "ADD_TO_BASKET_ACTION" => "ADD",
                            "AJAX_MODE" => "N",
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
                            "LABEL_PROP" => array(),
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
                            "RCM_PROD_ID" => $arResult["ID"],
                            "RCM_PROD_NAME" => $arResult["NAME"],
                            "RCM_PROD_PICTURE" => $arResult['PREVIEW_PICTURE'],
                            "RCM_TYPE" => "personal",
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
                            "PROPERTY_CODE_MOBILE" => array()
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>
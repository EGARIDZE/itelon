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
$picture = $arResult['PREVIEW_PICTURE'] ? $arResult['PREVIEW_PICTURE']['SRC'] : $arResult['DEFAULT_PICTURE']['SRC'];
$bShowConfig = !empty($arResult["CHASSIS_LIST"]);
$bShowModels = $arResult['SHOW_MODELS'];
//$formId = '#tender';
$formId = $arResult['ITEM_PRICES'][0]['PRICE'] ? '#basket' : '#tender';
$buyBtnClass = $arResult['ITEM_PRICES'][0]['PRICE'] ? 'basket-call' : 'tender-call';
$bHidePrice = empty($arResult['ITEM_PRICES']) && ($arResult['PROPERTIES']['MANUFACTURER']['VALUE']==1486
    || $arResult['PROPERTIES']['DISCONTINUED']['VALUE']);
?>


<section class="section">
    <div class="container">
        <div class="section__column">
            <div class="shop-item__detail" data-shop-item-get-id="<?=$arResult['ID'];?>" data-shop-item-get-type="product">
            <div class="section__wrapper">
                <div class="page-preview">
                    <h1 data-shop-item-get="title"><?= $arResult['NAME'] ?></h1>
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
                                <?
                                if ($arResult['LOGO']) {
	                                ?>
                                        <picture class="partner__logo_pic">
                                            <source srcset="<?=$arResult['LOGO']['PIC'];?>" type="image/webp">
                                            <img class="<?=$arResult['LOGO']['CLASS']?>" src="<?=$arResult['LOGO']['PIC'];?>" alt="">
                                        </picture>
                                        <div class="tip__text partner__logo_tip">
			                                <?=$arResult['LOGO']['TEXT'];?>
                                        </div>
	                                <?
                                }
                                ?>
                                <div class="swiper-wrapper">
                                    <? if ($picture): ?>
                                        <div class="swiper-slide">
                                            <a href="<?= $picture ?>" class="ware-slider_main__item" data-fancybox="product" data-caption="<?= $arResult['NAME'] ?>">
                                                <img src="<?= $picture ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>">
                                            </a>
                                        </div>
                                    <? endif; ?>
                                    <? if ($arResult['PROPERTIES']['GALLERY']['VALUE']): ?>
                                        <? foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $item): ?>
                                            <div class="swiper-slide">
                                                <a href="<?= \CFile::GetPath($item) ?>" class="ware-slider_main__item" data-fancybox="product" data-caption="<?= $arResult['NAME'] ?>">
                                                    <img src="<?= \CFile::GetPath($item) ?>" alt="photo">
                                                </a>
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
                                                    <source srcset="<?= \CFile::GetPath($item) ?>" type="image/webp">
                                                    <img src="<?= \CFile::GetPath($item) ?>" alt="photo"></picture>
                                            </div>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="ware__info ware-info">
                            <div data-shop-item-get="delivery" style="display: none;"><?=$arResult['AVAILABILITY']['TEXT'];?></div>
                            <div data-shop-item-get="warranty" style="display: none;"><?= $arResult['PROPERTIES']['_WARRANTY']['VALUE']; ?></div>
                            <div class="ware-info__item">
                                <h3 class="ware-info__title">Общие характеристики:</h3>
                                <div class="ware-info__body">
                                    <div>
                                        <?
                                        echo $arResult['PROPS_HTML'];

                                        ?>
																																	</div>
                                    <?if ($arResult['PROPERTIES']['CHARACTERISTIC_TITLE']['~VALUE']){?>
                                        <a href="#ware-properties" class="ware-info__more link-scroll">Подробнее</a>
                                    <?}?>
                                </div>
                            </div>
                            <? if ($arResult['PROPERTIES']['FILE']['VALUE']): ?>
                                <div class="ware-info__item">
                                    <h3 class="ware-info__title">Руководство пользователя:</h3>
                                    <div class="ware-info__body">
                                        <? foreach ($arResult['PROPERTIES']['FILE']['VALUE'] as $item): ?>
                                            <? $file = \CFile::GetFileArray($item) ?>
                                            <a href="<?= $file['SRC'] ?>" class="ware-info__doc"
                                               target="_blank"><?= $file['ORIGINAL_NAME'] ?></a>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
	                        <?

	                        ?>
                        </div>
                        <?
                        if ($arResult['OTHER_MODELS']) {
                            ?>
                            <div class="other-models__block">
                                <p class="title">Другие поколения со склада и под заказ:</p>
                                <p class="links">
                                    <?
                                    foreach ($arResult['OTHER_MODELS'] as $title => $code){
                                        echo "<a class='default-link' href='/product/$code/' target='_blank'>$title</a>";
                                    }
                                    ?>
                                </p>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                    <div class="ware__settings ware-settings">
                        <div class="ware-settings__score">
                            <div class="ware-settings__count">
                                    <span class="<?=$arResult['STATUS']['class'];?>">
                                        <?=$arResult['STATUS']['text'];?>
                                    </span>
                                <?
                                if ($bHidePrice) {
                                    ?>
                                    <div class="_hidden" data-shop-item-get="price"><?=$arResult['MIN_PRICE'];?></div>
                                    <div class="ware-settings__value"><?=$arResult['AVAILABILITY']['text1'];?></div>
                                    <div class="ware-settings__tax"><?=$arResult['AVAILABILITY']['text2'];?></div>
                                    <?
                                } else {
                                    ?>
                                    <p class="title">Цена:</p>
                                    <div class="ware-settings__value" data-shop-item-get="price"><?=$arResult['MIN_PRICE'];?></div>
                                    <div class="ware-settings__tax">включая НДС 20%</div>
                                    <?
                                }
                                ?>
                            </div>
                            <div class="ware-settings__nav">
			                    <?
			                    if ($bShowConfig) {
				                    ?>
                                    <a
                                            id="view-conf_link"
                                            class="default-link anchor-link"
                                            href="#config_tab"
                                            data-tab="#config_tab"
                                    >
                                        Посмотреть комплектацию
                                    </a>
				                    <?
			                    }
			                    if ($bShowModels) {
				                    ?>
                                    <a
                                            id="view-models_link"
                                            class="default-link anchor-link"
                                            href="#models_tab"
                                            data-tab="#models_tab"
                                    >
                                        Выбрать готовую модель
                                    </a>
				                    <?
			                    }
			                    ?>
                            </div>
                            <div class="ware-settings__place">
                                <?
                                if (!empty($arResult['ITEM_PRICES'])) {
                                    ?><span><?=$arResult['AVAILABILITY']['TEXT'];?></span><?
                                }
			                    if ($arResult['PROPERTIES']['DISCONTINUED']['VALUE']) {
				                    ?>
                                    <span>Снято с производства</span>
				                    <?
			                    }
			                    ?>
                            </div>
                        </div>
                        <div class="ware-settings__info">
                            <ul>
	                            <? if ($arResult['PROPERTIES']['GUARANTEE']['VALUE']): ?>
                                    <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg" alt=""><?= $arResult['PROPERTIES']['GUARANTEE']['VALUE'] ?></li>
	                            <? endif; ?>
			                    <? if ($arResult['PROPERTIES']['DELIVERY']['VALUE']): ?>
                                    <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg" alt=""><?= $arResult['PROPERTIES']['DELIVERY']['VALUE'] ?></li>
			                    <? endif; ?>
			                    <? if ($arResult['PROPERTIES']['LEASING']['VALUE']): ?>
                                    <li><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/calendar.svg" alt=""><?= $arResult['PROPERTIES']['LEASING']['VALUE'] ?></li>
			                    <? endif; ?>
                            </ul>
                        </div>
                        <div class="ware-settings__btns">
                            <div class="ware-settings__buy">
                                <?
                                if ($arResult['PROPERTIES']['DISCONTINUED']['VALUE']) {
                                    ?>
                                    <span class="btn btn_large btn_secondary">
                                        <span class="children">Подобрать аналог</span>
                                        <a href="#get_analog_form" class="cover popup-link" data-name="<?=$arResult['NAME']?>"></a>
                                    </span>
                                    <?
                                } else {
                                    ?>
                                    <span class="btn btn_large btn_secondary buy-btn_cat btn-icon btn-icon_large <?=$buyBtnClass;?>">
                                    <span class="children"><?=$bHidePrice?'Уточнить цену':'Купить';?></span>
                                    <a href="<?=$formId;?>" class="cover popup-link"></a>
                                    </span>
                                    <button class="btn btn_large btn_icon btn_outlined btn_shop" data-shop-item="btn">
                                        <div class="btn_shop__label">
                                            Добавить в корзину
                                        </div>
                                        <div class="btn_shop__check"></div>
                                        <span class="children"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg"></span>
                                    </button>
                                    <?
                                }
                                ?>

                            </div>
                            <?
                            if ($bShowConfig) {
                                ?>
                                <div class="ware-settings__config">
                                <span class="btn btn-icon btn_primary btn-icon_large btn-icon_config">
                                    <span class="children">Сконфигурировать</span>
                                    <a href="#config_tab" class="cover anchor-link" data-tab="#config_tab"></a>
                                </span>
                                </div>
                                <?
                            }
                            ?>
                            <div id="basket-desc" style="display: none" data-shop-item-get="description"
                                data-name="<?=$arResult['NAME']?>"
                                data-price="<?=$arResult['MIN_PRICE'];?>"
                                data-warranty="<?= $arResult['PROPERTIES']['_WARRANTY']['VALUE']; ?>"
                                data-avail="<?=$arResult['AVAILABILITY']['TEXT'];?>"
                                >
                                <?=$arResult['BASKET_DESCRIPTION'];?>
                            </div>
                        </div>
                        <div class="ware-settings__contacts">
                            <p class="default_bold">Написать ИТ-эксперту:</p>
                            <a href="https://t.me/itelon_official" target="_blank"><img src="/local/templates/itelion/files/icons/tg.svg" alt="#"></a>
                            <a href="https://api.whatsapp.com/send?phone=79891053335" target="_blank"><img src="/local/templates/itelion/files/icons/whats.svg" alt="#"></a>
                            <a href="mailto:sales@itelon.ru" class="email default-link">sales@itelon.ru
<!--                                <img src="/local/templates/itelion/files/icons/email_Icon.svg" alt="#">-->
                            </a>
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

                    $bFirstTab = true;
                    if ($bShowConfig) {
	                    $sName = 'Конфигуратор';
	                    echo GenTabHtml($sName, $bFirstTab, 'config_tab');
	                    $bFirstTab=false;
                    }
                    if ($bShowModels) {
	                    echo GenTabHtml('Готовые модели', $bFirstTab, 'models_tab');
	                    $bFirstTab = false;
                    }

                    echo GenTabHtml('Обзор', $bFirstTab);
                    if ($arResult['PROPERTIES']['CHARACTERISTIC_TITLE']['~VALUE'])
                        echo GenTabHtml('Характеристики', false, 'ware-properties');
                    echo GenTabHtml('Почему выбирают нас', false);
                    if(!empty($arResult['QA'])){
                        echo GenTabHtml('Вопросы и ответы', false);
                    }
                    if ($arResult['PROPERTIES']['BLOG_LINKS']['VALUE'])
                        echo GenTabHtml('Обзоры и статьи');
                    ?>
                </div>
                <div class="tabs__wrapper">
                    <!-- Для активного таба добавляется класс _active-->
                    <?
                    $bFirstTab = true;
                    // region config tab content
                    if ($bShowConfig) {
	                    ?><div id="config_fold" class="tabs__content<?if($bFirstTab) echo ' _active';?>">
                        <?
                        if ($arResult['SHOW_PLATFORM_SELECTOR']) {
                            ?>
                            <div id="choose-platform_wrap" class="input-radio input-radio_row">

                                <label><?=$arResult['CONF_TITLE'];?>:
                                    <!--<div class="tip">
                                    <div class="tip__image">
                                        <img src="<?php /*= SITE_TEMPLATE_PATH */?>/files/icons/question.svg"
                                             alt="#">
                                    </div>
                                    <div class="tip__text">
                                        Подсказка текста
                                    </div>
                                </div>-->
                                </label>

                                <div class="input-radio__list">
			                        <?
			                        $bChecked = true;
			                        foreach ($arResult['CHASSIS_LIST'] as $code => $title) {
				                        ?>
                                        <div class="input-radio__item">
                                            <input type="radio" name="platform" value="<?=$code;?>" <?if ($bChecked) echo "checked='true'"?>>
                                            <div class="input-radio__button">
                                                <span></span>
                                                <h4><?=$title;?></h4>
                                            </div>
                                        </div>
				                        <?
				                        $bChecked = false;
			                        }
			                        ?>
                                </div>
                            </div>
                            <?
                        }
                        ?>

                        <div id="config_form__wrap">
		                    <?include $_SERVER['DOCUMENT_ROOT'].'/local/lib/includes/config_form.php';?>
                        </div>
                        </div><?
	                    $bFirstTab=false;
                    }
                    // endregion
                    // region models tab content
                    if ($bShowModels) {
                        global $arrFilterModels;
                        ?><div id="models_fold" class="tabs__content<?if($bFirstTab) echo ' _active';?>">
                            <div class="models">
                                <?
                                if ($arResult['USE_FILTER']) {
                                    ?>
                                    <div class="models__filter">
                                        <form id="models_filter_form" data-initialized="true">
                                            <div class="models__inputs">
				                                <?
				                                foreach ($arResult['MODELS']['FILTER'] as $inputName => $arData) {
					                                ?>
                                                    <div class="form-group dropdown ">
                                                        <div class="dropdown__button">
                                                            <span class="dropdown__title" style="display: none"></span>
                                                            <span class="dropdown__placeholder"><?=$arData['title'];?></span>
                                                            <div class="arrow"></div>
                                                            <input class="form-control" type="text" name="<?=$inputName;?>">
                                                        </div>
                                                        <div class="dropdown__options">
                                                            <ul class="dropdown__list">
								                                <?
								                                foreach ($arData['list'] as $name => $arCodes) {
									                                ?>
                                                                    <li class="dropdown__option"
                                                                        data-value='<?=json_encode($arCodes);?>'>
										                                <?=$name;?>
                                                                    </li>
									                                <?
								                                }
								                                ?>
                                                            </ul>
                                                        </div>

                                                    </div>
					                                <?
				                                }
				                                ?>
                                                <button class="btn btn_large btn_secondary" type="reset">
                                                    <span class="children">Сбросить фильтр</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?
                                }
                                ?>
	                            <div id="models_list">
		                            <?
		                            $arrFilterModels = [
			                            'PROPERTY_MARKER' => $arResult["PROPERTIES"]["PART_NUMBER"]['VALUE']
			                            ,'!PROPERTY_TYPE' => [51,52]
		                            ];
                                    if (isset($_POST['codes'])) {
                                        if ($_POST['codes'] != '') {
	                                        $arrFilterModels = ['CODE' => $_POST['codes']];
                                        }
	                                    $APPLICATION->RestartBuffer();
		                            }
                                    $APPLICATION->IncludeComponent(
			                            "bitrix:catalog.section",
			                            "Price-list",
			                            array(
                                                "DISCONTINUED" => $arResult['PROPERTIES']['DISCONTINUED']['VALUE'],
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
				                            "FILTER_NAME" => "arrFilterModels",
				                            "HIDE_NOT_AVAILABLE" => "L",
				                            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
				                            "IBLOCK_ID" => "28",
				                            "IBLOCK_TYPE" => "Catalog",
				                            "INCLUDE_SUBSECTIONS" => "Y",
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
				                            "PAGE_ELEMENT_COUNT" => "7",
				                            "PARTIAL_PRODUCT_PROPERTIES" => "N",
				                            "PRICE_CODE" => array(
					                            0 => "price",
				                            ),
				                            "PRICE_VAT_INCLUDE" => "Y",
				                            "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
				                            "PRODUCT_ID_VARIABLE" => "id",
				                            "PRODUCT_PROPS_VARIABLE" => "prop",
				                            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
				                            "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
				                            "PRODUCT_SUBSCRIPTION" => "N",
				                            "RCM_PROD_ID" => $arResult['ID'],
				                            "RCM_PROD_NAME" => $arResult['NAME'],
				                            "RCM_PROD_PICTURE" => $picture,
				                            "RCM_TYPE" => "personal",
				                            "RCM_BANNER_PROPS" => [
					                            'TYPICAL_SOLUTIONS_NAME' => $arResult['PROPERTIES']['TYPICAL_SOLUTIONS_NAME']['VALUE']
					                            ,'TYPICAL_SOLUTIONS_LINK' => $arResult['PROPERTIES']['TYPICAL_SOLUTIONS_LINK']['VALUE']
					                            ,'SOLUTIONS_LINK' => $arResult['PROPERTIES']['SOLUTIONS_LINK']['VALUE']
					                            ,'EXAMPLES_IMPLEMENTATION_NAME' => $arResult['PROPERTIES']['EXAMPLES_IMPLEMENTATION_NAME']['VALUE']
					                            ,'EXAMPLES_IMPLEMENTATION_LINK' => $arResult['PROPERTIES']['EXAMPLES_IMPLEMENTATION_LINK']['VALUE']
					                            ,'CASE_LINK' => $arResult['PROPERTIES']['CASE_LINK']['VALUE']
					                            ,'BTN_TITLE' => $arResult['PROPERTIES']['BTN_TITLE']['VALUE']
				                            ],
				                            "RCM_CARD_PROPS" => [
					                            'WTY' => $arResult['PROPERTIES']['GUARANTEE']['VALUE']
					                            ,'DEL' => $arResult['PROPERTIES']['DELIVERY']['VALUE']
					                            ,'SHOW_PN' => $arResult['PROPERTIES']['MANUFACTURER']['VALUE'] != 77
				                            ],
				                            "RCM_MODELS" => $arResult['MODELS']['BUNDLES'],
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
				                            "COMPONENT_TEMPLATE" => "Price-list",
				                            "USE_OFFER_NAME" => "N",
				                            "SECTIONS_OFFSET_MODE" => "N",
				                            "SECTIONS_SECTION_ID" => "",
				                            "SECTIONS_SECTION_CODE" => "",
				                            "SECTIONS_TOP_DEPTH" => "2",
				                            "SHOW_SECTIONS" => "Y",
				                            "DEFERRED_LOAD" => "N",
				                            "CYCLIC_LOADING" => "N",
				                            "CYCLIC_LOADING_COUNTER_NAME" => "cycleCount"
			                            ),
			                            false
		                            );
		                            if (isset($_POST['codes'])) die();
                                    ?>
                                </div>

                            </div>

                        </div>
                        <?
                        $bFirstTab=false;
                    }
                    // endregion

                    ?>
                    <div class="tabs__content<?if($bFirstTab) echo ' _active';?>">
                        <div class="overview">
                            <div class="overview__content">
                                <?= $arResult['DETAIL_TEXT'] ?>
                            </div>
                            <div class="preview-banner">
                                <div class="preview-banner__list">
                                    <?if(!empty($arResult['PROPERTIES']['TYPICAL_SOLUTIONS_NAME']['VALUE'])):?>
                                    <div class="preview-banner__item">
                                        <div class="preview-banner__title">
                                            <h3>Типовые решения на базе <?=$arResult['NAME']?>:</h3>
                                        </div>
                                        <div class="preview-banner__links">
                                                <? foreach ($arResult['PROPERTIES']['TYPICAL_SOLUTIONS_NAME']['VALUE'] as $key => $value):?>
                                                    <a href="<?= $arResult['PROPERTIES']['TYPICAL_SOLUTIONS_LINK']['VALUE'][$key]?>"><?= $value?></a>
                                                <? endforeach;?>
                                        </div>
                                            <?if(!empty($arResult['PROPERTIES']['SOLUTIONS_LINK']['VALUE'])):?>
                                                <a href="<?= $arResult['PROPERTIES']['SOLUTIONS_LINK']['VALUE']?>" class="preview-banner__more"><span>Еще решения</span></a>
                                            <? endif;?>
                                    </div>
                                    <? endif;?>
                                    <?if(!empty($arResult['PROPERTIES']['EXAMPLES_IMPLEMENTATION_NAME']['VALUE'])):?>
                                    <div class="preview-banner__item">
                                        <div class="preview-banner__title">
                                            <h3>Примеры внедрения:</h3>
                                        </div>
                                        <div class="preview-banner__links">
                                                <? foreach ($arResult['PROPERTIES']['EXAMPLES_IMPLEMENTATION_NAME']['VALUE'] as $key => $value):?>
                                                    <a href="<?= $arResult['PROPERTIES']['EXAMPLES_IMPLEMENTATION_LINK']['VALUE'][$key]?>"><?= $value?></a>
                                                <? endforeach;?>
                                        </div>
                                            <?if(!empty($arResult['PROPERTIES']['CASE_LINK']['VALUE'])):?>
                                                <a href="<?= $arResult['PROPERTIES']['CASE_LINK']['VALUE']?>" class="preview-banner__more"><span>Еще кейсы</span></a>
                                            <? endif;?>
                                    </div>
                                    <? endif;?>
                                </div>
                                <div class="preview-banner__request">
                                    <?if(!empty($arResult['PROPERTIES']['BTN_TITLE']['VALUE'])):?>
                                        <div class="preview-banner__subtitle"><?= $arResult['PROPERTIES']['BTN_TITLE']['VALUE']?></div>
                                    <? endif;?>
                                    <div class="preview-banner__btn">
			<span class="btn btn_large btn_secondary">
	<span class="children">Оставить заявку</span>
	<a href="#consultation" class="cover popup-link"></a>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	                <? if ($arResult['PROPERTIES']['CHARACTERISTIC_TITLE']['~VALUE']): ?>
                    <div class="tabs__content">
                        <div class="specifications">

                                <? foreach ($arResult['PROPERTIES']['CHARACTERISTIC_TITLE']['~VALUE'] as $key => $value): ?>
                                    <div class="specifications__item">
                                        <h3><?= $value ?></h3>
                                        <div class="specifications__value">
                                            <?= $arResult['PROPERTIES']['CHARACTERISTIC_DESCRIPTION']['~VALUE'][$key]['TEXT'] ?>
                                        </div>
                                    </div>
                                <? endforeach; ?>

                        </div>
                    </div>
	                <? endif; ?>
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
                    <? if(!empty($arResult['QA'])):?>
                        <div class="tabs__content">
                            <div class="ware-accardeon">
                                <div class="accordion__list">
                                    <? foreach ($arResult['QA'] as $qa):?>
                                    <div class="accordion ">
                                        <div class="accordion__title">
                                            <h3><?= $qa['NAME']?></h3>
                                        </div>
                                        <div class="accordion__content">
                                            <div class="accordion__text">
                                                <?= $qa['PREVIEW_TEXT']?>
                                            </div>
                                        </div>
                                    </div>
                                    <? endforeach;?>
                                </div>
                            </div>
                        </div>
                    <? endif;?>
                    <?
                    if ($arResult['PROPERTIES']['BLOG_LINKS']['VALUE']) {
	                    global $arBlogListFilter;
	                    $arBlogListFilter['ID'] = $arResult['PROPERTIES']['BLOG_LINKS']['VALUE'];
	                    $APPLICATION->IncludeComponent(
                            "bitrix:news.list"
                            , "blog_list"
                            , array(
                                "HIDE_TITLE" => true
                                ,"ACTIVE_DATE_FORMAT" => "j F Y"
                                , "ADD_SECTIONS_CHAIN" => "N"
                                , "AJAX_MODE" => "N"
                                , "AJAX_OPTION_ADDITIONAL" => ""
                                , "AJAX_OPTION_HISTORY" => "N"
                                , "AJAX_OPTION_JUMP" => "N"
                                , "AJAX_OPTION_STYLE" => "Y"
                                , "CACHE_FILTER" => "N"
                                , "CACHE_GROUPS" => "Y"
                                , "CACHE_TIME" => "36000000"
                                , "CACHE_TYPE" => "A"
                                , "CHECK_DATES" => "Y"
                                , "DETAIL_URL" => ""
                                , "DISPLAY_BOTTOM_PAGER" => "N"
                                , "DISPLAY_DATE" => "Y"
                                , "DISPLAY_NAME" => "Y"
                                , "DISPLAY_PICTURE" => "Y"
                                , "DISPLAY_PREVIEW_TEXT" => "Y"
                                , "DISPLAY_TOP_PAGER" => "N"
                                , "FIELD_CODE" => array("SHOW_COUNTER", "")
                                , "FILTER_NAME" => "arBlogListFilter"
                                , "HIDE_LINK_WHEN_NO_DETAIL" => "N"
                                , "IBLOCK_ID" => "17"
                                , "IBLOCK_TYPE" => "news"
                                , "INCLUDE_IBLOCK_INTO_CHAIN" => "N"
                                , "INCLUDE_SUBSECTIONS" => "Y"
                                , "MESSAGE_404" => ""
                                , "NEWS_COUNT" => "3"
                                , "PAGER_BASE_LINK_ENABLE" => "N"
                                , "PAGER_DESC_NUMBERING" => "N"
                                , "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000"
                                , "PAGER_SHOW_ALL" => "N"
                                , "PAGER_SHOW_ALWAYS" => "N"
                                , "PAGER_TEMPLATE" => ".default"
                                , "PAGER_TITLE" => "Новости"
                                , "PARENT_SECTION" => ""
                                , "PARENT_SECTION_CODE" => ""
                                , "PREVIEW_TRUNCATE_LEN" => ""
                                , "PROPERTY_CODE" => array("RATINGS", "UPDATE_DATE")
                                , "SET_BROWSER_TITLE" => "N"
                                , "SET_LAST_MODIFIED" => "N"
                                , "SET_META_DESCRIPTION" => "N"
                                , "SET_META_KEYWORDS" => "N"
                                , "SET_STATUS_404" => "N"
                                , "SET_TITLE" => "N"
                                , "SHOW_404" => "N"
                                , "SORT_BY1" => "PROPERTY_UPDATE_DATE"
                                , "SORT_BY2" => "ACTIVE_FROM"
                                , "SORT_ORDER1" => "DESC"
                                , "SORT_ORDER2" => "DESC"
                                , "STRICT_SECTION_CHECK" => "N"
                            )
                        );
                    }
                    ?>
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
		"RCM_PROD_ID" => $arResult["ID"],
		"RCM_PROD_NAME" => $arResult["NAME"],
		"RCM_PROD_PICTURE" => $picture,
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
		"PROPERTY_CODE_MOBILE" => array(
		)
	),
	false
);?>

            </div>
        </div>
    </section>
<? endif; ?>

<script>
window.dataLayer = window.dataLayer || [];
dataLayer.push({
    "ecommerce": {
        "currencyCode": "RUB",
        "detail": {
            "products": [
                {
                    "id": "<?=$arResult["ID"]?>",
                    "name" : "<?=$arResult["NAME"]?>",
                    "price": <?echo (int)$arResult["MIN_PRICE"] ?>,
                    "brand": "<?=$arResult['BRANDS'][$arResult['PROPERTIES']['MANUFACTURER']['VALUE']];?>",
                }
            ]
        }
    }
});
</script>

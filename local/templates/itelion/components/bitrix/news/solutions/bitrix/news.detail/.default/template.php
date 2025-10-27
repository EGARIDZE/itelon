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
//mpr($arResult['PROPERTIES']['TASK']);
?>


<section class="section">
    <div class="container">
        <div class="section__column">
            <div class="solution-banner">
                <div class="solution-banner__bg"
                     style="background-image: url('<?= $arResult['DETAIL_PICTURE']['SRC'] ?>');"></div>
                <div class="solution-banner__content">
                    <div class="solution-banner__text">
                        <h1><?= $arResult['NAME'] ?></h1>
                        <? if ($arResult['PREVIEW_TEXT']): ?>
                            <div class="solution-banner__preview">
                                <?= $arResult['PREVIEW_TEXT'] ?>
                            </div>
                        <? endif; ?>
                    </div>
                    <span class="btn btn_large btn_accent">
                            <span class="children">Подобрать решение</span>
                            <a href="#callback" class="cover popup-link"></a>
                        </span>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumb-solutions",
                        Array(
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0",
                        )
                    );?>
                </div>
            </div>

						<div class="articles__detail">
							<div class="articles__wrapper">
                                <? if ($arResult['DETAIL_TEXT']): ?>
                                    <div class="solution-description__text">
                                        <?= $arResult['DETAIL_TEXT'] ?>
                                    </div>
                                <? endif; ?>

									<?
                                    if (!empty($arResult['PROPERTIES']['_EXAMPLE_TITLE']['VALUE']['TEXT'])) {

                                        ?>
                                        <div class="properties__item properties__item_big">
                                            <h3>Практический пример</h3>
                                            <div class="section__wrapper">
                                                <h4><?=$arResult['PROPERTIES']['_EXAMPLE_TITLE']['VALUE']['TEXT'];?></h4>
                                                <div class="section__container">
                                                    <h4>Основные задачи:</h4>
                                                    <div class="section__preview">
	                                                    <?=html_entity_decode($arResult['PROPERTIES']['_EXAMPLE_TASKS']['VALUE']['TEXT']);?>
                                                    </div>
                                                </div>
                                                <div class="section__container">
                                                    <h4><?=$arResult['PROPERTIES']['_EXAMPLE_TITLE2']['VALUE']['TEXT'];?></h4>
                                                    <div class="section__preview">
	                                                    <?=html_entity_decode($arResult['PROPERTIES']['_EXAMPLE_PRODUCT']['VALUE']['TEXT']);?>
                                                    </div>
                                                </div>
                                                <blockquote>
                                                    <b>Рекомендация:</b> <?=$arResult['PROPERTIES']['_EXAMPLE_RECOMMEND']['VALUE']['TEXT'];?>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <?
                                    }
                                    ?>

							</div>
							<?$arData = $arResult['PROPERTIES']['FORM_TEXT']['VALUE']['SUB_VALUES']??[];?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:form",
								"template1",
								array(
									"FORM_TEMPLATE" => "solution",
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
        </div>
    </div>
</section>

<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/include/stages.php",
        "EDIT_TEMPLATE" => ""
    ),
    false
); ?>



<?php if ($arResult['PROPERTIES']['TITLE_TOP']['VALUE']): ?>
    <section class="section">
        <div class="container">
            <div class="section__preview">
                <div class="section__title">
                    <h2><?= $arResult['PROPERTIES']['TITLE_TOP']['VALUE'] ?></h2>
                </div>
                <div class="tabs">
                    <div class="tabs__titles">
                        <!-- Для активного таба добавляется класс _active-->
                        <?
                        $classActive = ' _active';
                        if ($arResult['PROPERTIES']['EQUIPMENT_TOP']['VALUE']):
                            $classActive = '';
                            ?>
                            <h2 class="tabs__title _active">Импортное оборудование</h2>
                        <? endif; ?>
                        <? if ($arResult['PROPERTIES']['EQUIPMENT_TOP_RU']['VALUE']): ?>
                            <h2 class="tabs__title<?=$classActive;?>">Российское оборудование</h2>
                        <? endif; ?>
                    </div>

                    <div class="tabs__wrapper">
                        <? if ($arResult['PROPERTIES']['EQUIPMENT_TOP']['VALUE']): ?>
                            <div class="tabs__content _active">
                                <?
                                $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['EQUIPMENT_TOP']['VALUE'];
                                $APPLICATION->IncludeComponent(
                                    "bitrix:catalog.section",
                                    "top-list_solutions",
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
                                        "PAGE_ELEMENT_COUNT" => "8",
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
                                        "COMPONENT_TEMPLATE" => "top-list_solutions",
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
                                ?>
                            </div>
                        <? endif; ?>
                        <? if ($arResult['PROPERTIES']['EQUIPMENT_TOP_RU']['VALUE']): ?>
                            <div class="tabs__content<?=$classActive;?>">
	                            <?
	                            $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['EQUIPMENT_TOP_RU']['VALUE'];
	                            $APPLICATION->IncludeComponent(
		                            "bitrix:catalog.section",
		                            "top-list_solutions",
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
			                            "PAGE_ELEMENT_COUNT" => "8",
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
			                            "COMPONENT_TEMPLATE" => "top-list_solutions",
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
	                            ?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<section class="section">
    <div class="container">
        <div class="solution-event">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "/include/solution-event.php",
                    "EDIT_TEMPLATE" => ""
                ),
                false
            ); ?>
            <?$APPLICATION->IncludeComponent("bitrix:form", "do-you-have-a-special-case", Array(
                "AJAX_MODE" => "Y",	// Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                "CACHE_TYPE" => "A",	// Тип кеширования
                "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
                "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
                "EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
                "EDIT_STATUS" => "N",	// Выводить форму смены статуса
                "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
                "NAME_TEMPLATE" => "",	// Формат имени
                "NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
                    0 => "",
                    1 => "",
                ),
                "NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
                    0 => "",
                    1 => "",
                ),
                "RESULT_ID" => $_REQUEST["RESULT_ID"],	// ID результата
                "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                "SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
                "SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
                "SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
                "SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
                "SHOW_STATUS" => "N",	// Показать текущий статус результата
                "SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
                "START_PAGE" => "new",	// Начальная страница
                "SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
                "USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
                "WEB_FORM_ID" => "16",	// ID веб-формы
                "COMPONENT_TEMPLATE" => ".default",
                "VARIABLE_ALIASES" => array(
                    "action" => "action",
                ),
                'TASK' => [
                    'TITLE' =>$arResult['PROPERTIES']['TASK']['VALUE'],
                    'VALUE' =>$arResult['PROPERTIES']['TASK']['VALUE_XML_ID']
                ]
            ),
                false
            );?>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "blog_list_content",
    Array(
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
        "FIELD_CODE" => array(0=>"",1=>"",),
        "FILTER_NAME" => "",
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
        "PROPERTY_CODE" => array(0=>"",1=>"",),
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

<?php /*if($arResult['SETS']):*/?><!--
    <section class="section">
        <div class="container">
            <div class="navigation">
                <?/* foreach ($arResult['SETS'] as $item):*/?>
                    <a href="/category/<?php /*= $item['CODE']*/?>/" class="navigation__item btn btn_medium btn_outlined"><?php /*= $item['NAME']*/?></a>
                <?/* endforeach;*/?>
            </div>
        </div>
    </section>
--><?php /*endif;*/?>

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
);?>


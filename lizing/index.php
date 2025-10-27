<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Лизинг");
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
                            <source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/leasing.webp" type="image/webp">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/images/leasing.webp" alt="photo"></picture>
                    </div>
                </div>
                <div class="section__wrapper">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/leasing-preview.php",
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
                            "PATH" => "/include/leasing-banner.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/leasing-conditions.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
            </div>
        </div>
    </section>

<? $APPLICATION->IncludeComponent("bitrix:news.list", "leasing-type", array(
    "ACTIVE_DATE_FORMAT" => "j F Y",    // Формат показа даты
    "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
    "DISPLAY_DATE" => "N",    // Выводить дату элемента
    "DISPLAY_NAME" => "N",    // Выводить название элемента
    "DISPLAY_PICTURE" => "N",    // Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "N",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "FIELD_CODE" => array(    // Поля
        0 => "NAME",
        1 => "PREVIEW_TEXT",
        2 => "PREVIEW_PICTURE",
        3 => "",
    ),
    "FILE_404" => "",
    "FILTER_NAME" => "",    // Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "33",    // Код информационного блока
    "IBLOCK_TYPE" => "news",    // Тип информационного блока (используется только для проверки)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
    "INCLUDE_SUBSECTIONS" => "N",    // Показывать элементы подразделов раздела
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "NEWS_COUNT" => "999",    // Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Новости",    // Название категорий
    "PARENT_SECTION" => "",    // ID раздела
    "PARENT_SECTION_CODE" => "",    // Код раздела
    "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array(    // Свойства
        0 => "",
        1 => "",
        2 => "",
        3 => "",
        4 => "",
    ),
    "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "N",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "SORT_BY1" => "SORT",    // Поле для первой сортировки новостей
    "SORT_BY2" => "ID",    // Поле для второй сортировки новостей
    "SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
    "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
    "COMPONENT_TEMPLATE" => ".default"
),
    false
); ?>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/leasing-preview-two.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/leasing-conditions-two.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/leasing-financing.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="configuration-steps">
                <div class="configuration-steps__info">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/leasing-configuration-steps.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    ); ?>
                </div>
                <?$APPLICATION->IncludeComponent("bitrix:form", "leasing", Array(
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
                    "NAME_TEMPLATE" => "",
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
                    "WEB_FORM_ID" => "14",	// ID веб-формы
                    "COMPONENT_TEMPLATE" => ".default",
                    "VARIABLE_ALIASES" => array(
                        "action" => "action",
                    )
                ),
                    false
                );?>
            </div>
        </div>
    </section>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"questions-technical-support", 
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
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "",
		),
		"FILE_404" => "",
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "29",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "99",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "lizing",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "Y",
		"COMPONENT_TEMPLATE" => "questions-technical-support"
	),
	false
); ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
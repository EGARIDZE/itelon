<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Подбор СХД");
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
                            <source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/choose_shd.webp" type="image/webp">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/images/choose_shd.webp" alt="#"></picture>
                    </div>
                </div>
                <div class="choice-desc">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/choice-desc.php",
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
            <div class="configuration-steps__info configuration-steps__info_row">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/configuration-steps-info.php",
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
                        "PATH" => "/include/our-specialist.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
            </div>
        </div>
    </section>

<?$APPLICATION->IncludeComponent(
    "wptt:choose.shd.form",
    "",
    Array()
);?>

<? $APPLICATION->IncludeComponent("bitrix:news.list", "questions-technical-support", array(
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
        2 => "",
    ),
    "FILE_404" => "",
    "FILTER_NAME" => "",    // Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "29",    // Код информационного блока
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
    "PARENT_SECTION_CODE" => "podbor-skhd",    // Код раздела
    "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array(    // Свойства
        0 => "",
        1 => "",
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

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вопросы и ответы");

?>
        <section class="section">
            <div class="container">
                <div class="section__wrapper">
                    <div class="page-preview">
                        <h1><? $APPLICATION->ShowProperty('h1'); ?></h1>
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
                    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "questions", Array(
                        "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "",	// Дополнительный фильтр для подсчета количества элементов в разделе
                        "VIEW_MODE" => "TILE",	// Вид списка подразделов
                        "SHOW_PARENT_NAME" => "N",	// Показывать название раздела
                        "IBLOCK_TYPE" => "news",	// Тип инфоблока
                        "IBLOCK_ID" => "29",	// Инфоблок
                        "SECTION_ID" => "",	// ID раздела
                        "SECTION_CODE" => "",	// Код раздела
                        "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                        "COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
                        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "Y",	// Скрывать разделы с нулевым количеством элементов
                        "TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
                        "SECTION_FIELDS" => array(	// Поля разделов
                            0 => "NAME",
                            1 => "",
                        ),
                        "SECTION_USER_FIELDS" => array(	// Свойства разделов
                            0 => "",
                            1 => "UF_SETS",
                            2 => "",
                        ),
                        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                        "CACHE_NOTES" => "",
                        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                        "COMPONENT_TEMPLATE" => "solutions",
                        "FILTER_NAME" => "",	// Имя массива со значениями фильтра разделов
                        "HIDE_SECTION_NAME" => "N",	// Не показывать названия подразделов
                        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                    ),
                        false
                    );?>
                </div>
            </div>
        </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
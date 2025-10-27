<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
use Bitrix\Main\Page\Asset;
include_once $_SERVER['DOCUMENT_ROOT'] . '/local/Test/console_log.php';
clog(SITE_TEMPLATE_PATH);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <? $APPLICATION->ShowHead(); ?>
    <link rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/files/icons/favicon.ico" type="image/x-icon">
    <title><?= $APPLICATION->ShowTitle(); ?></title>
    <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=99c16496-e61c-49e8-9bb7-483ffcf0340c&lang=ru_RU&_v=20240419164142" type="text/javascript"></script> -->
    <?
    Asset::getInstance()->addString('<link rel="icon" type="image/x-icon" href="' . SITE_TEMPLATE_PATH . '/files/icons/favicon.ico">');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/styles.bundle.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/utils.bundle.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/main.bundle.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery-3.7.1.min.js");

    $page = $APPLICATION->GetCurPage(true);

    ?>
    <meta name="format-detection" content="telephone=no">
    <script src="<?= SITE_TEMPLATE_PATH ?>/scripts/sourcebuster.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            sbjs.init({
                domain: window.location.hostname,
                lifetime: 3,
                session_length: 30,
            })

            const addSbjsValues = () => {
                const forms = document.querySelectorAll('form')
                if (forms[0]) {
                    forms.forEach(form => {
                        if (form.dataset.initialized) return
                        form.dataset['initialized'] = true
                        const formWrap = form.closest('div')
                        const utmInputs = formWrap.querySelectorAll('[data-utm]')
                        const urlInput = formWrap.querySelector('[data-fill-url]')
                        const formName = formWrap.querySelector('[data-form-name]')

                        utmInputs.forEach(input => {
                            input.value = sbjs.get.current[input.dataset.utm]
                        })

                        if (urlInput) {
                            urlInput.value = window.location.href
                        }

                        form.addEventListener('submit', (evt) => {
                            setTimeout(() => {
                                addSbjsValues()
                            }, 3000)
                        })
                    })
                }
            }
            addSbjsValues()
        })
    </script>
</head>

<body>
    <div class="wrapper"><? $APPLICATION->ShowPanel(); ?>
        <header class="header lock-padding">
            <div class="container">
                <div class="header__wrapper">
                    <div class="header__container">
                        <div class="header__burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="/" class="header__logo">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/logo.svg" alt="#">
                        </a>
                        <div class="header__contacts">
                            <div class="menu-contacts">

                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "/include/phone.php",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/phone.php"
                                    )
                                ); ?>
                                <div class="menu-contacts__socials">
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "/include/social.php",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/include/social.php"
                                        )
                                    ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="header__btns">
                            <div class="menu-btns">
                                <span class="btn btn_medium btn_outlined">

                                    <span class="children">Заказать звонок</span>

                                    <a href="#callback" class="cover popup-link"></a>
                                </span>
                                <span class="btn btn_medium btn_primary">

                                    <span class="children">Получить КП</span>

                                    <a href="#tender" class="cover popup-link"></a>
                                </span>
                            </div>
                        </div>
                        <?/*$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel2", Array(
                  "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                      "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                      "DELAY" => "N",	// Откладывать выполнение шаблона меню
                      "MAX_LEVEL" => "3",	// Уровень вложенности меню
                      "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                          0 => "",
                      ),
                      "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                      "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                      "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                      "MENU_THEME" => "site",
                      "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                      "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                  ),
                  false
              );*/ ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section.list",
                            "header_menu",
                            array(
                                "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "COUNT_ELEMENTS" => "N",
                                "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                                "FILTER_NAME" => "headerSectionsFilter",
                                "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                                "IBLOCK_ID" => "51",
                                "IBLOCK_TYPE" => "Catalog",
                                "SECTION_CODE" => "",
                                "SECTION_FIELDS" => array("", ""),
                                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                "SECTION_URL" => "",
                                "SECTION_USER_FIELDS" => array("UF_BLOCK_PICTURE", "UF_BLOCK_LINK", "UF_BLOCK_NAME", ""),
                                "SHOW_PARENT_NAME" => "Y",
                                "TOP_DEPTH" => "1",
                                "VIEW_MODE" => "LINE"
                            )
                        ); ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:search.form",
                            "search",
                            array(
                                "USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
                                "PAGE" => "#SITE_DIR#search/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                                "COMPONENT_TEMPLATE" => ".default"
                            ),
                            false
                        ); ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-menu">
            <div class="mobile-menu__wrapper">
                <div class="mobile-menu__header">
                    <div class="mobile-menu__btns">
                        <div class="menu-btns">
                            <span class="btn btn_medium btn_outlined">

                                <span class="children">Заказать звонок</span>

                                <a href="#callback" class="cover popup-link"></a>
                            </span>
                            <span class="btn btn_medium btn_primary">

                                <span class="children">Получить КП</span>

                                <a href="#tender" class="cover popup-link"></a>
                            </span>
                        </div>
                    </div>
                    <div class="mobile-menu__close">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.5 8C0.5 3.85786 3.85786 0.5 8 0.5H36C40.1421 0.5 43.5 3.85786 43.5 8V36C43.5 40.1421 40.1421 43.5 36 43.5H8C3.85786 43.5 0.5 40.1421 0.5 36V8Z"
                                stroke="#CFD4D8" />
                            <rect x="16.8486" y="16" width="16" height="1.2" rx="0.6" transform="rotate(45 16.8486 16)"
                                fill="#58616A" />
                            <rect x="16" y="27.3125" width="16" height="1.2" rx="0.6" transform="rotate(-45 16 27.3125)"
                                fill="#58616A" />
                        </svg>
                    </div>
                </div>
                <div class="mobile-menu__nav">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "horizontal_multilevel_mob",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "3",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                            "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                        false
                    ); ?>
                </div>
                <div class="mobile-menu__contacts">
                    <div class="menu-contacts">
                        <div class="menu-contacts__adress">
                            <a href="mailto:mail@itelon.ru">mail@itelon.ru</a>
                            <a href="tel:88005055110">8 (800) 505-51-10</a>
                            <a href="tel:74955103335">7 (495) 510-33-35</a>
                        </div>
                        <div class="menu-contacts__socials">
                            <a href="#" target="_blank"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/tg.svg"
                                    alt="#"></a>
                            <a href="#" target="_blank"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/whats.svg"
                                    alt="#"></a>
                            <a href="#" target="_blank"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/vk.svg"
                                    alt="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main>
    <div>
            <? if (
                strpos($page, 'catalog') === false &&
                strpos($page, 'certificates') === false &&
                strpos($page, 'category') === false
            ): ?>

                <?php endif; ?>
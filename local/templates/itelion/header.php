<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Page\Asset;

//include_once $_SERVER['DOCUMENT_ROOT'] . '/local/Test/console_log.php';

?>
    <!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">

    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <? $APPLICATION->ShowHead(); ?>
        <link rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/files/icons/favicon.ico" type="image/x-icon">
        <title><?= $APPLICATION->ShowTitle(); ?></title>
        <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=99c16496-e61c-49e8-9bb7-483ffcf0340c&lang=ru_RU&_v=20240419164142" type="text/javascript"></script> -->
        <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(13396396, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); </script> <!-- /Yandex.Metrika counter -->
        <?
        Asset::getInstance()->addString('<link rel="icon" type="image/x-icon" href="' . SITE_TEMPLATE_PATH . '/files/icons/favicon.ico">');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/fancybox.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/styles.bundle.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/common.css");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery-3.7.1.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/fancybox.umd.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/utils.bundle.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/main.bundle_v2.js");
        //Asset::getInstance()->addJs('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/ya-counters.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/ecommerce.js");
		Asset::getInstance()->addJs("/local/lib/js/common.js");

        $page = $APPLICATION->GetCurPage(true);

        ?>
		<script src="https://www.google.com/recaptcha/api.js?render=6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa"></script>
        <meta name="format-detection" content="telephone=no">
        <script src="<?= SITE_TEMPLATE_PATH ?>/scripts/sourcebuster.min.js"></script>
        <script>
            function setMailAttr() {
                let emailLink = document.querySelectorAll('a[href^="mailto:"]');
                let interval = setInterval(function(){
                    if (typeof window.ym !== "undefined") {
                        ym(13396396, 'getClientID', function(cid) {
                            emailLink.forEach(function(link)
                            {
                                link.setAttribute('href',`mailto: sales@itelon.ru?subject=[ID%20Обращения%20${cid}].%20Тема:`);
                            });
                        });
                        clearInterval(interval);
                    }
                }, 500);
            }
            document.addEventListener('DOMContentLoaded', function () {
                setMailAttr();
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


        <script src="//code.jivo.ru/widget/PJF6OfPAxW" async></script>
        <script>
            function jivo_onLoadCallback() {
                const jivo_custom_widget = true;
            }
        </script>
        <!-- Top.Mail.Ru counter -->
        <script type="text/javascript">
            var _tmr = window._tmr || (window._tmr = []);
            _tmr.push({id: "3654004", type: "pageView", start: (new Date()).getTime()});
            (function (d, w, id) {
                if (d.getElementById(id)) return;
                var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
                ts.src = "https://top-fwz1.mail.ru/js/code.js";
                var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
                if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
            })(document, window, "tmr-code");
        </script>
        <noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3654004;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
        <!-- /Top.Mail.Ru counter -->
        <script type="text/javascript">window._ab_id_=160157</script>
        <script src="https://cdn.botfaqtor.ru/one.js"></script>
    </head>

<body>
    
<div class="wrapper"><? $APPLICATION->ShowPanel(); ?>
    <header class="header lock-padding">
        <?
        $APPLICATION->IncludeComponent(
	        "bitrix:main.include",
	        ".default",
	        array(
		        "COMPONENT_TEMPLATE" => ".default",
		        "AREA_FILE_SHOW" => "file",
		        "PATH" => "/include/header-banner.php",
		        "EDIT_TEMPLATE" => ""
	        ),
	        false
        );
        ?>
        <div class="header__row">
            <div class="container">
                <div class="header__wrapper">
                    <div class="header__container">
                        <div class="header__burger _disable" data-menu-btn="menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="/" class="header__logo _open">
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

                            </div>
                        </div>
																								<div class="header__right">
                        <div class="header__btns">
                            <div class="menu-btns">
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
                        <div class="header__btns-mobile">
                            <a href="#search" class="header-btn-mobile open-mobile-menu" data-menu-btn="search">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/search.svg" class="header-btn-mobile-img" alt="">
																																<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/only.svg" class="header-btn-mobile-img-close" alt="">
                            </a>
                            <a href="#callback" class="header-btn-mobile open-mobile-menu" data-menu-btn="phone">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/phone.svg" class="header-btn-mobile-img" alt="">
																																<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/only.svg" class="header-btn-mobile-img-close" alt="">
                            </a>
                        </div>
																									<div class="header__shop" data-shop="header">
																										<a href="#shop" class="header__shop--btn" data-shop-header="link">
																											<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg" class="header-btn-mobile-img" alt="">
																											<span class="header__shop--count" data-shop="count">1</span>
																										</a>
																										<!--Для показа добавляется класс _active -->
																										<div class="header__shop--notice header__shop--notice_error" data-shop-header="error">
																											<div>
																												<span>Ваша корзина пуста.</span> <a href="/catalog/">Перейти в каталог</a>
																											</div>
																											<span></span>
																										</div>
																										<!--Для показа добавляется класс _active -->
																										<div class="header__shop--notice header__shop--notice_success" data-shop-header="success">
																											<div><span>Товар добавлен в корзину</span></div>
																											<span></span>
																										</div>
																									</div>
																								</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__navigation-container _open">
            <div class="container">
                <div class="header__wrapper">
                    <div id="smart-title-search" class="header__container-nav">

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
                        <div class="header__search">
                            <? $APPLICATION->IncludeComponent(
	"arturgolubev:search.title", 
	".default", 
	array(
		"USE_SUGGEST" => "N",
		"PAGE" => "#SITE_DIR#search/",
		"COMPONENT_TEMPLATE" => ".default",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "1000",
		"ORDER" => "rank",
		"USE_LANGUAGE_GUESS" => "Y",
		"INPUT_ID" => "smart-title-search-input",
		"CONTAINER_ID" => "smart-title-search",
		"ANIMATE_HINTS" => array(
		),
		"ANIMATE_HINTS_SPEED" => "1",
		"INPUT_PLACEHOLDER" => "",
		"SHOW_PREVIEW" => "Y",
		"SHOW_PREVIEW_TEXT" => "N",
		"SHOW_PROPS" => array(
		),
		"SHOW_QUANTITY" => "N",
		"PRICE_CODE" => array(
			0 => "price",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"SHOW_HISTORY" => "N",
		"VOICE_INPUT" => "N",
		"SHOW_LOADING_ANIMATE" => "Y",
		"FILTER_NAME" => "",
		"CHECK_DATES" => "N",
		"SHOW_INPUT" => "Y",
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0" => array(
			0 => "main",
			1 => "iblock_news",
			2 => "iblock_Catalog",
			3 => "iblock_configurator",
			4 => "iblock_consolations",
			5 => "blog",
		),
		"PREVIEW_WIDTH_NEW" => "34",
		"PREVIEW_HEIGHT_NEW" => "34",
		"SHOW_HISTORY_POPUP" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"CATEGORY_0_iblock_Catalog" => array(
			0 => "14",
		),
		"CATEGORY_0_main" => array(
		),
		"CATEGORY_0_forum" => array(
			0 => "all",
		),
		"CATEGORY_0_iblock_Set" => array(
			0 => "all",
		),
		"CATEGORY_0_iblock_news" => array(
			0 => "2",
			1 => "12",
			2 => "17",
		),
		"CATEGORY_0_iblock_webform" => array(
			0 => "all",
		),
		"CATEGORY_0_iblock_configurator" => array(
			0 => "45",
			1 => "48",
		),
		"CATEGORY_0_iblock_consolations" => array(
			0 => "19",
		),
		"CATEGORY_0_iblock_arturgolubev_services" => array(
			0 => "all",
		),
		"CATEGORY_0_iblock_rest_entity" => array(
			0 => "all",
		),
		"CATEGORY_0_blog" => array(
			0 => "all",
		),
		"CURRENCY_ID" => "RUB"
	),
	false
); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <div class="mobile-menu" data-menu-content="menu">
        <div class="mobile-menu__wrapper">
            <div class="mobile-menu__nav">
                <!-- Элемент с классом "_arrow" добавляется автоматически, если у пункта меню будет свой вложенный список -->
                <? $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "mob-menu",
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
            </div>
            <div class="mobile-menu-phone__btns">
                <div class="menu-btns">
				<span class="btn btn_large btn_primary">
					<span class="children">Заказать звонок</span>
					<a href="#callback" class="cover popup-link"></a>
				</span>
                    <span class="btn btn_large btn_accent">
					<span class="children">Получить КП</span>
					<a href="#tender" class="cover popup-link"></a>
				</span>
                </div>
            </div>
            <!--            <div class="mobile-menu__contacts">-->
            <!--                <div class="menu-contacts">-->
            <!--                    --><? // $APPLICATION->IncludeComponent(
            //                        "bitrix:main.include",
            //                        "",
            //                        array(
            //                            "AREA_FILE_SHOW" => "file",
            //                            "AREA_FILE_SUFFIX" => "/include/phone.php",
            //                            "EDIT_TEMPLATE" => "",
            //                            "PATH" => "/include/phone.php"
            //                        )
            //                    ); ?>
            <!--                    <div class="menu-contacts__socials">-->
            <!--                        --><? // $APPLICATION->IncludeComponent(
            //                            "bitrix:main.include",
            //                            "",
            //                            array(
            //                                "AREA_FILE_SHOW" => "file",
            //                                "AREA_FILE_SUFFIX" => "/include/social.php",
            //                                "EDIT_TEMPLATE" => "",
            //                                "PATH" => "/include/social.php"
            //                            )
            //                        ); ?>
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
    <div class="mobile-menu mobile-menu-phone" data-menu-content="phone">
        <div class="mobile-menu__wrapper">
            <div></div>
            <div class="mobile-menu-phone__contacts">
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
										<div class="menu-contacts__icons">
											<a href="https://t.me/itelon_official" target="_blank">
												<img src="/local/templates/itelion/files/icons/tg.svg" alt="#">
											</a>
											<a href="https://api.whatsapp.com/send?phone=79891053335" target="_blank">
												<img src="/local/templates/itelion/files/icons/whats.svg" alt="#">
											</a>
<!--											<a href="https://youtube.com/@itelon8673?si=G9K6TLEFCNLTnbKl" target="_blank">-->
<!--												<img src="/local/templates/itelion/files/icons/youtube.svg" alt="#">-->
<!--											</a>-->
                    </div>
                </div>

            </div>
            <div class="mobile-menu-phone__btns">
                <div class="menu-btns">
                    <span class="btn btn_large btn_primary">
                        <span class="children">Заказать звонок</span>
                        <a href="#callback" class="cover popup-link"></a>
                    </span>
                    <span class="btn btn_large btn_accent">
                        <span class="children">Получить КП</span>
                        <a href="#tender" class="cover popup-link"></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
				<div class="mobile-search" data-menu-content="search">
					<div class="search-bar ">
						<form action="/search/" data-initialized="true" novalidate="true">
       <div class="search-bar__wrapper">
        <input class="search-bar__input" type="text" placeholder="Поиск" name="q" value="" required="">
         <!-- <button class="search-bar__reset" type="reset" id="search-bar-reset"></button>	 -->
         <button class="search-bar__submit" name="s" value="Поиск" type="submit"></button>
        </div>
      </form>
        </div>
    </div>
    <main class="<?=$_COOKIE['hide_banner']=='Y'?'':'_offset';?>">
<div <? if (strpos($page, 'catalog')): ?> class='gap-children' <? endif; ?>>
<? if (
    strpos($page, 'catalog') === false &&
    strpos($page, 'certificates') === false &&
    strpos($page, 'category') === false
): ?>

<?php endif; ?>
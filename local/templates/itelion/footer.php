<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$page = $APPLICATION->GetCurPage();
$flag = true;
if(strpos($page, 'solutions')){
    $arr = explode('/', $page);
    if($arr[1] == 'solutions' && !empty($arr[3])){
        $flag = false;
    }
}
if($page == '/company/about/'){
    $flag = false;
}

if(strpos($page, 'news/')){
    $flag = false;
}

if(strpos($page, 'blog/')){
    $flag = false;
}

?>
<?php if($flag):?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"need_more_answer", 
	array(
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
		"WEB_FORM_ID" => "9",
		"COMPONENT_TEMPLATE" => "need_more_answer",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
<?php endif;?>
<? if (
        strpos($page, 'catalog') === false &&
        strpos($page, 'certificates') === false &&
        strpos($page, 'category') === false
):?>
    </div>
<?php endif;?>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__description">
                <a href="#" class="footer__logo">
                    <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/logo.svg" alt="#">
                </a>
                <div class="footer__label">Надежно. Удобно. Выгодно. <br>По умолчанию</div>
            </div>
            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"manufacturer", 
	array(
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
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "Catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "12",
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
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "ICONS",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "manufacturer"
	),
	false
);?>
            <div class="footer__nav">
                <div class="links">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "bottom",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                        "MENU_THEME" => "site",
                        "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                        false
                    );?>
                </div>
                <div class="links">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "bottom_2",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "bottom"
                        ),
                        false
                    );?>
                </div>
                <div class="links">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "bottom_3",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "bottom"
                        ),
                        false
                    );?>
                </div>
                <div class="links">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "bottom_4",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "bottom"
                        ),
                        false
                    );?>
                </div>
                <div class="links">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "bottom_5",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "bottom"
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="footer__ending">
                <div class="footer__optionally">
                    <div class="footer__links">
                        <a href="/privacy-policy/">Политика конфиденциальности</a>
                        <a href="/public-offer-agreement/">Публичный договор-оферта</a>
                        <a href="/user-agreement/">Пользовательское соглашение</a>
						<a href="https://t.me/itelon_servers" target="_blank">❤ Наш Telegram-канал</a>

                    </div>
                    <div class="footer__info">
                        Поставка серверов, систем хранения данных, серверного оборудования <br>г. Москва, Спартаковский пер., д.2, стр.1
                    </div>
                    <div class="footer__info">
                        © ITELON - на рынке и в Интернете с 2004 года.
                    </div>
                </div>
                <div class="footer__socials">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/social-footer.php"
                        )
                    );?>
                </div>
            </div>
        </div>
    </div>
</footer>

                <?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"template1", 
	array(
            'FORM_TEMPLATE' => '',
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



            <?$APPLICATION->IncludeComponent(
                "bitrix:form",
                "it_expert",
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
                    "SHOW_STATUS" => "Y",
                    "SHOW_VIEW_PAGE" => "N",
                    "START_PAGE" => "new",
                    "SUCCESS_URL" => "",
                    "USE_EXTENDED_ERRORS" => "N",
                    "VARIABLE_ALIASES" => Array("action"=>"action"),
                    "WEB_FORM_ID" => "10"
                )
            );?>
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"get_analog",
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
		"SHOW_STATUS" => "Y",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array("action"=>"action"),
		"WEB_FORM_ID" => "19"
	)
);?>

<!--Добавить класс _open для раскрытия модалки-->
<!-- При раскрытии модалки к body добавить класс _lock-->
<?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"individ_offer-tender", 
	array(
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
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "12",
		"COMPONENT_TEMPLATE" => "individ_offer-tender",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
<?
// форма-корзина fixed
$APPLICATION->IncludeComponent(
	"bitrix:form",
	"individ_offer-tender",
	array(
            "FORM_TEMPLATE" => "basket",
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
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "12",
		"COMPONENT_TEMPLATE" => "individ_offer-tender",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
<!--Добавить класс _open для раскрытия модалки-->
<!-- При раскрытии модалки к body добавить класс _lock-->
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"individ_offer-tender",
	array(
		"FORM_TEMPLATE" => "basket_new",
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
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "12",
		"COMPONENT_TEMPLATE" => "individ_offer-tender",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
<!--Добавить класс _open для раскрытия модалки-->
<!-- При раскрытии модалки к body добавить класс _lock-->
<?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"individ_offer-choose-config", 
	array(
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
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "17",
		"COMPONENT_TEMPLATE" => "individ_offer-choose-config",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
    <!--Добавить класс _open для раскрытия модалки-->
    <!-- При раскрытии модалки к body добавить класс _lock-->
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"tech_support-modal",
	array(
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
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "13",
		"COMPONENT_TEMPLATE" => "tech_support-modal",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>

    <div class="lock-padding popup popup-form popup-form--success" id="successful-submission-form">
        <div class="popup__body">
            <div class="popup__content">
                <div class="popup__wrapper">
                    <div class="popup-form__bg form-access popup-form__bg_desktop"
                         style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/access.webp');"></div>
                     <div class="popup-form__bg popup-form__bg_mobile" style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/access.webp');"></div>
                    <div class="popup-form__wrapper">
                        <div class="popup-form__preview">
                            <h2>Спасибо!</h2>
                        </div>
                        <div class="popup-form__container">
                            <div class="popup-form__form">
                                <div class="popup-form__preview">
                                    <h2>Мы свяжемся <br>с Вами в ближайшее время!</h2>
                                </div>
                                <div class="popup-form-access__text popup-form__info--links">
                                    <p>С заботой, команда ITELON</p>
                                    <p>
                                        ❤️ Обзоры серверов и СХД, бенчмарки и железные новости — больше в нашем <a href="https://t.me/itelon_servers" target="_blank">Telegram</a>
                                    </p>
                                </div>
                                <div class="popup-form__btns">
                                    <!--Для блокировки добавить класс _disabled-->
                                    <button class="btn btn_large btn_accent close-btn" type="submit">
                                        <span class="children">Закрыть</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="popup__close close-btn">
				<img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/popup-close.svg" alt="#">
			</span>
            </div>
        </div>
    </div>

<div class="cookie-container">
    <div class="cookie-container__wrapper">
        <div class="cookie-container__description">
            Мы используем файлы cookie для вашего удобства пользования сайтом и повышения качества рекомендаций. <a href="/privacy-policy/" target="_blank">Подробнее</a>.
        </div>
        <span class="btn btn_large btn_outlined cookie-accept" >
        <span class="children">Я согласен</span>
            <a class="cover " ></a>
        </span>
    </div>
</div>
</div>

<?$APPLICATION->IncludeComponent("bitrix:main.include", "template2", Array(
	"AREA_FILE_SHOW" => "page",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "/include/phone.php",	// Суффикс имени файла включаемой области
		"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8" defer></script>
<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=29a5f456dbb1d4d4740849e3a4ede19a" charset="UTF-8" async></script>
</body>
</html>

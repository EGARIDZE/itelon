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
                        <h1><? $APPLICATION->ShowTitle(false)?></h1>
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
                    <div class="articles__detail">
                        <div class="articles__wrapper">
                            <div class="articles__preview">
                                <? if($arResult['DISPLAY_ACTIVE_FROM']):?>
                                    <div class="articles__date">
                                        <span><b>Опубликовано:</b> <?=$arResult['DISPLAY_ACTIVE_FROM']?></span>
                                    </div>
                                <? endif;?>
                                <?
                                if($arResult['PROPERTIES']['UPDATE_DATE']['VALUE']) {
                                    ?>
                                    <div class="articles__label articles__date">
                                        <div class="articles__icon">
                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/update.svg" alt="#" />
                                        </div>
                                        <span><b>Обновлено:</b> <?=$arResult['DISPLAY_UPDATE_DATE'];?></span>
                                    </div>
                                    <?
                                }
                                ?>
                                <div>
                                    <? if($arResult['SHOW_COUNTER']):?>
                                        <div class="articles__label">
                                            <div class="articles__icon">
                                                <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/eye.svg" alt="#">
                                            </div>
                                            <span><?=$arResult['SHOW_COUNTER']?></span>
                                        </div>
                                    <? endif;?>

                                    <div class="articles__label">
                                        <div class="articles__icon">
                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/comment.svg" alt="#" />
                                        </div>
                                        <span><?=$APPLICATION->ShowViewContent('comments_count');?></span>
                                    </div>

                                    <div class="articles__label">
                                        <div class="articles__icon">
                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/star.svg" alt="#" />
                                        </div>
                                        <span><?=$arResult['AVERAGE_RATE'];?></span>
                                    </div>
                                </div>
                            </div>
                            <? if($arResult['PROPERTIES']['TITLE']['VALUE']):?>
                                <div class="articles__listing">
                                    <h2>Содержание</h2>
                                    <ol>
                                        <? foreach ($arResult['PROPERTIES']['TITLE']['VALUE'] as $key => $item):?>
                                            <li><a href="#<?= ($key + 1)?>" class="link-scroll"><?= $item ?></a></li>
                                        <? endforeach; ?>
                                    </ol>
                                </div>
                            <? endif;?>
                            <div class="articles__content">
                                <? if($arResult['PROPERTIES']['DESCRIPTION_1']['VALUE']):?>
                                    <? foreach ($arResult['PROPERTIES']['DESCRIPTION_1']['VALUE'] as $item){
                                        echo "<div class='articles__text'>";
                                        echo htmlspecialchars_decode($item['TEXT']);
                                        echo "</div>";
                                    } ?>
                                <? endif;?>
                                <?
                                if($arResult['PROPERTIES']['ITEMS']['VALUE']) {
                                    $GLOBALS['groupFilter']['=ID'] = $arResult['PROPERTIES']['ITEMS']['VALUE'];
                                    ?><div class="articles__content"><?
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
                                    ?></div><?
                                }
                                ?>

                                <? if($arResult['PROPERTIES']['DESCRIPTION_2']['VALUE']):?>
                                    <? foreach ($arResult['PROPERTIES']['DESCRIPTION_2']['VALUE'] as $item){
		                                echo "<div class='articles__text'>";
                                        echo htmlspecialchars_decode($item['TEXT']);
		                                echo "</div>";
                                    } ?>
                                <? endif;?>


                                <hr />
                                <div class="articles__author articles-author">
                                    <div class="articles-author__logo" style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/it-logo.png')"></div>
                                    <div class="articles-author__content">
                                        <div class="articles-author__label">Автор:</div>
                                        <h4 class="articles-author__title">Команда пресейла ITELON</h4>
                                    </div>
                                </div>
                                <?
                                if ($arResult['PROPERTIES']['LINK_ORIG']['VALUE']) {
                                    ?>
                                    <div class="articles__original">
                                        <strong>Источник:</strong>
                                        <?
                                        if ($arResult['PROPERTIES']['LINK_ORIG']['DESCRIPTION']) {
                                            ?>
                                            <a href="<?=$arResult['PROPERTIES']['LINK_ORIG']['DESCRIPTION'];?>" target="_blank">
                                                <?=$arResult['PROPERTIES']['LINK_ORIG']['VALUE']?>
                                            </a>
                                            <?
                                        } else {
                                            ?>
                                            <p><?=$arResult['PROPERTIES']['LINK_ORIG']['VALUE']?></p>
                                            <?
                                        }
                                        ?>

                                    </div>
                                    <?
                                }
                                ?>




                                <div class="articles__comments">
                                    <div class="articles__content">
                                        <div class="articles__options articles-options">
                                            <div class="articles-options__btns">
                                                <span class="btn btn_large btn_outline btn_breakpoint" data-clipboard>
                                                    <span class="children children_desktop">Скопировать ссылку</span>
                                                    <span class="children children_mobile">Ссылка</span>
                                                </span>
                                                <span class="btn btn_large btn_outline btn_breakpoint" data-bookmark>
                                                    <span class="children children_desktop">Добавить в закладки</span>
                                                    <span class="children children_mobile">В закладки</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="section__preview">
                                            <h2>Оцените статью и добавьте комментарий
	                                            <?=$APPLICATION->ShowViewContent('be_first');?>
                                            </h2>
		                                    <?$APPLICATION->IncludeComponent(
			                                    "bitrix:form",
			                                    "add_comment",
			                                    array(
				                                    "BLOG_ID" => $arResult['ID'],
				                                    "AJAX_MODE" => "Y",
				                                    "AJAX_OPTION_ADDITIONAL" => "",
				                                    "AJAX_OPTION_HISTORY" => "N",
				                                    "AJAX_OPTION_JUMP" => "Y",
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
				                                    "WEB_FORM_ID" => "18",
				                                    "COMPONENT_TEMPLATE" => "add_comment",
				                                    "VARIABLE_ALIASES" => array(
					                                    "action" => "action",
				                                    )
			                                    ),
			                                    false
		                                    );?>
                                        </div>
                                        <div class="articles-comments-form-success">
                                            <div class="articles-form">
                                                <div class="articles-form__wrapper">
                                                    <div class="articles-form__preview">
                                                        <h2>Спасибо!</h2>
                                                        <p>
                                                            Комментарий успешно отправлен на модерацию! После модерации комментарий будет
                                                            опубликован в ближайшее время!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?
                                        global $arCommentsFilter;
                                        $arCommentsFilter = ['PROPERTY_BLOG' => $arResult['ID'], 'PROPERTY_APPROVED' => 1];
                                        $APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "blog_comments",
                                        array(
                                        "ACTIVE_DATE_FORMAT" => "j F Y",
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "AJAX_MODE" => "Y",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "CACHE_FILTER" => "N",
                                        "CACHE_GROUPS" => "Y",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_TYPE" => "A",
                                        "CHECK_DATES" => "Y",
                                        "COMPONENT_TEMPLATE" => "blog_comments",
                                        "DETAIL_URL" => "",
                                        "DISPLAY_BOTTOM_PAGER" => "Y",
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "N",
                                        "DISPLAY_PICTURE" => "N",
                                        "DISPLAY_PREVIEW_TEXT" => "N",
                                        "DISPLAY_TOP_PAGER" => "N",
                                        "FIELD_CODE" => array(0=>"",1=>"",),
                                        "FILTER_NAME" => "arCommentsFilter",
                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                        "IBLOCK_ID" => EIdIntConst::IB_COMMENTS->value,
                                        "IBLOCK_TYPE" => "webform",
                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                        "INCLUDE_SUBSECTIONS" => "Y",
                                        "MESSAGE_404" => "",
                                        "NEWS_COUNT" => "3",
                                        "PAGER_BASE_LINK_ENABLE" => "N",
                                        "PAGER_DESC_NUMBERING" => "N",
                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                        "PAGER_SHOW_ALL" => "N",
                                        "PAGER_SHOW_ALWAYS" => "N",
                                        "PAGER_TEMPLATE" => "show_more",
                                        "PAGER_TITLE" => "Новости",
                                        "PARENT_SECTION" => "",
                                        "PARENT_SECTION_CODE" => "",
                                        "PREVIEW_TRUNCATE_LEN" => "",
                                        "PROPERTY_CODE" => array(
                                        0 => "USER_NAME",
                                        1 => "COMMENT",
                                        2 => "REPLY_TO_COMMENT",
                                        3 => "RATING",
                                        4 => "",
                                        ),
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_LAST_MODIFIED" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_STATUS_404" => "N",
                                        "SET_TITLE" => "N",
                                        "SHOW_404" => "N",
                                        "SORT_BY1" => "ACTIVE_FROM",
                                        "SORT_BY2" => "SORT",
                                        "SORT_ORDER1" => "DESC",
                                        "SORT_ORDER2" => "ASC",
                                        "STRICT_SECTION_CHECK" => "N"
                                        ),
                                        false
                                        );
                                        ?>



                                    </div>
                                </div>

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

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <div id="blog_tags_bottom" class="articles__tags navigation">
		            <?
		            foreach ($arResult['TAGS'] as $tagId => $tagName) {
			            echo "<p class='navigation__item btn btn_medium btn_outlined' data-id='$tagId'>$tagName</p>";
		            }
		            ?>
                </div>
                <div id="blog__list">
                    <?
                    if ($arResult['SHOW_BLOGS']) {
	                    global $arBlogListFilter;
	                    if (isset($_REQUEST['blog_filter'])) {
		                    $arBlogListFilter['PROPERTY_TAGS_LINKS'] = $_REQUEST['blog_filter'];
		                    $arBlogListFilter['!ID'] = $arResult['ID'];
		                    $APPLICATION->RestartBuffer();
	                    } else {
		                    $arBlogListFilter['ID'] = $arResult['PROPERTIES']['INTERESTING']['VALUE'];
	                    }
	                    $APPLICATION->IncludeComponent("bitrix:news.list", "blog_list", array("ACTIVE_DATE_FORMAT" => "j F Y", "ADD_SECTIONS_CHAIN" => "N", "AJAX_MODE" => "N", "AJAX_OPTION_ADDITIONAL" => "", "AJAX_OPTION_HISTORY" => "N", "AJAX_OPTION_JUMP" => "N", "AJAX_OPTION_STYLE" => "Y", "CACHE_FILTER" => "N", "CACHE_GROUPS" => "Y", "CACHE_TIME" => "36000000", "CACHE_TYPE" => "A", "CHECK_DATES" => "Y", "DETAIL_URL" => "", "DISPLAY_BOTTOM_PAGER" => "N", "DISPLAY_DATE" => "Y", "DISPLAY_NAME" => "Y", "DISPLAY_PICTURE" => "Y", "DISPLAY_PREVIEW_TEXT" => "Y", "DISPLAY_TOP_PAGER" => "N", "FIELD_CODE" => array("SHOW_COUNTER", ""), "FILTER_NAME" => "arBlogListFilter", "HIDE_LINK_WHEN_NO_DETAIL" => "N", "IBLOCK_ID" => "17", "IBLOCK_TYPE" => "news", "INCLUDE_IBLOCK_INTO_CHAIN" => "N", "INCLUDE_SUBSECTIONS" => "Y", "MESSAGE_404" => "", "NEWS_COUNT" => "3", "PAGER_BASE_LINK_ENABLE" => "N", "PAGER_DESC_NUMBERING" => "N", "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", "PAGER_SHOW_ALL" => "N", "PAGER_SHOW_ALWAYS" => "N", "PAGER_TEMPLATE" => ".default", "PAGER_TITLE" => "Новости", "PARENT_SECTION" => "", "PARENT_SECTION_CODE" => "", "PREVIEW_TRUNCATE_LEN" => "", "PROPERTY_CODE" => array("RATINGS", "UPDATE_DATE"), "SET_BROWSER_TITLE" => "N", "SET_LAST_MODIFIED" => "N", "SET_META_DESCRIPTION" => "N", "SET_META_KEYWORDS" => "N", "SET_STATUS_404" => "N", "SET_TITLE" => "N", "SHOW_404" => "N", "SORT_BY1" => "PROPERTY_UPDATE_DATE", "SORT_BY2" => "ACTIVE_FROM", "SORT_ORDER1" => "DESC", "SORT_ORDER2" => "DESC", "STRICT_SECTION_CHECK" => "N"));
	                    if (isset($_REQUEST['blog_filter'])) die();
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php if($arResult['CASE']):?>
    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h3>Реализованные проекты</h3>
                <div class="cases-preview__list">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['CASE'] as $case):?>
                            <a href="<?= $case['DETAIL_PAGE_URL']?>" class="swiper-slide cases-card">
                                <div class="cases-card__image">
                                    <picture><source srcset="<?= \CFile::GetPath($case['PREVIEW_PICTURE'])?>" type="image/webp"><img src="<?= \CFile::GetPath($case['PREVIEW_PICTURE'])?>" alt="#"></picture>
                                </div>
                                <div class="cases-card__info">
                                    <h3><?= $case['NAME']?></h3>
                                </div>
                            </a>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
<?$APPLICATION->IncludeComponent(
    "bitrix:form",
    "sub_news",
    array(
            "FORM_TEMPLATE" => "",
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
        "WEB_FORM_ID" => "11",
        "COMPONENT_TEMPLATE" => "sub_news",
        "VARIABLE_ALIASES" => array(
            "action" => "action",
        )
    ),
    false
);?>

<?$APPLICATION->IncludeComponent("bitrix:form", "catch", Array(
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
    "WEB_FORM_ID" => "15",	// ID веб-формы
    "COMPONENT_TEMPLATE" => ".default",
    "VARIABLE_ALIASES" => array(
        "action" => "action",
    )
),
    false
);?>

<script type="text/javascript" src="/local/templates/itelion/scripts/clipboard.min.js"></script>


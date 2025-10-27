<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

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

if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showLazyLoad = false;

if ($arParams['NEWS_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showLazyLoad = $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

?>
<div class="section__wrapper">
    <div class="navigation">

        <!-- Активному пункту добавляется класс _active-->
        <? if($arResult['ITEMS']):?>
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <a href="<?= $item['DETAIL_PAGE_URL'] ?>"
                   class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME'] ?></a>
            <? endforeach; ?>
        <? endif;?>
    </div>
    <div class="tabs">
	    <?$APPLICATION->IncludeComponent(
		    "bitrix:catalog.section.list",
		    "ajax_buttons",
		    array(
                    "ACTIVE_SECTION" => $arParams['PARENT_SECTION_CODE'],
                    "ALL_BUTTON_NAME" => 'Все решения',
                "TAG_ID" => 'solutions_list_container',
			    "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
			    "ADD_SECTIONS_CHAIN" => "N",
			    "CACHE_FILTER" => "N",
			    "CACHE_GROUPS" => "Y",
			    "CACHE_TIME" => "36000000",
			    "CACHE_TYPE" => "A",
			    "COUNT_ELEMENTS" => "N",
			    "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
			    "FILTER_NAME" => "sectionsFilter",
			    "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
			    "IBLOCK_ID" => "19",
			    "IBLOCK_TYPE" => "consolations",
			    "SECTION_CODE" => "",
			    "SECTION_FIELDS" => array(
				    0 => "CODE",
				    1 => "NAME",
				    2 => "",
			    ),
			    "SECTION_ID" => $_REQUEST["SECTION_ID"],
			    "SECTION_URL" => "",
			    "SECTION_USER_FIELDS" => array(
				    0 => "UF_SETS",
				    1 => "",
			    ),
			    "SHOW_PARENT_NAME" => "Y",
			    "TOP_DEPTH" => "1",
			    "VIEW_MODE" => "LINE",
			    "COMPONENT_TEMPLATE" => "ajax_buttons",
		    ),
		    false
	    );?>
        <div class="tabs__wrapper">
            <div class="tabs__content _active">
                <div class="section__wrapper">
                    <div class="cases__list">
                        <!-- items-container -->
                        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <? if ($key == 3): ?>
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="swiper-slide cases-card" data-entity="item"
                                   id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <div class="cases-card__image">
                                        <!-- Расскоментировать на бэке -->
                                        <picture>
                                            <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
                                            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                                 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"></picture>
                                    </div>
                                    <div class="cases-card__info">
                                        <h3><?= $arItem['NAME'] ?></h3>
                                    </div>
                                </a>
                                <div class="products-banner-new" data-entity="item">
			                        <?
			                        $GLOBALS['arrFilterSectionForm'] = ['ID' => 1914522];
			                        $APPLICATION->IncludeComponent(
				                        "bitrix:news.list",
				                        "section_form",
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
					                        "FILTER_NAME" => "arrFilterSectionForm",
					                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
					                        "IBLOCK_ID" => "50",
					                        "IBLOCK_TYPE" => "Catalog",
					                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					                        "INCLUDE_SUBSECTIONS" => "Y",
					                        "MESSAGE_404" => "",
					                        "NEWS_COUNT" => "1",
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
						                        0 => "BLOCKS",
						                        1 => "BUTTON",
						                        2 => "TRIGGER",
						                        3 => "",
					                        ),
					                        "SET_BROWSER_TITLE" => "N",
					                        "SET_LAST_MODIFIED" => "N",
					                        "SET_META_DESCRIPTION" => "N",
					                        "SET_META_KEYWORDS" => "N",
					                        "SET_STATUS_404" => "Y",
					                        "SET_TITLE" => "N",
					                        "SHOW_404" => "Y",
					                        "SORT_BY1" => "ACTIVE_FROM",
					                        "SORT_BY2" => "SORT",
					                        "SORT_ORDER1" => "DESC",
					                        "SORT_ORDER2" => "ASC",
					                        "STRICT_SECTION_CHECK" => "N",
					                        "COMPONENT_TEMPLATE" => "section_form"
				                        )
			                        );?>
                                </div>
                            <? else: ?>
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="swiper-slide cases-card"
                                   data-entity="item"
                                   id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <div class="cases-card__image">
                                        <!-- Расскоментировать на бэке -->
                                        <picture>
                                            <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
                                            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                                 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"></picture>
                                    </div>
                                    <div class="cases-card__info">
                                        <h3><?= $arItem['NAME'] ?></h3>
                                    </div>
                                </a>
                            <? endif; ?>
                        <? endforeach; ?>
                        <!-- items-container -->
                    </div>
                    <div class="browsing">

                        <? if ($arResult["NAV_STRING"]): ?>
                            <div class="pagination" data-pagination-num="<?= $navParams['NavNum'] ?>">
                                <!-- pagination-container -->
                                <?= $arResult["NAV_STRING"] ?>
                                <!-- pagination-container -->
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- component-end -->



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
?>
    <section class="section">
        <div class="container">
            <div class="cases-preview">
                <div class="cases-preview__header">
                    <a href="<?= $arResult['LIST_PAGE_URL'] ?>" class="link_title"><h2><?= $arResult['NAME'] ?></h2></a>
	                <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "ajax_buttons",
                        array(
                                "ACTIVE_SECTION" => $arParams['PARENT_SECTION_CODE'],
                            "ALL_BUTTON_NAME" => "",
                            "TAG_ID" => "cases_list_container",
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
                            "IBLOCK_ID" => "12",
                            "IBLOCK_TYPE" => "news",
                            "SECTION_CODE" => "",
                            "SECTION_FIELDS" => array(
                                0 => "CODE",
                                1 => "NAME",
                                2 => "",
                            ),
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                                2 => "",
                            ),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LINE",
                            "COMPONENT_TEMPLATE" => "ajax_buttons"
                        ),
                        false
                    );?>
                </div>
                <div class="cases__list">
                    <!-- items-container -->
		            <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
			            <?
			            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			            ?>
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="swiper-slide cases-card" data-entity="item" target="_self"
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
		            <? endforeach; ?>
                    <!-- items-container -->
                </div>
            </div>
        </div>
    </section>
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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<nav class="header__nav">
	<ul class="desktop-menu">
		<?foreach ($arResult['SECTIONS'] as &$arSection) {
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			// consoleLog($arSection);
			?>
			<li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a href="<?= $arSection['CODE']; ?>" class="desktop-menu__link"><?= $arSection['NAME']; ?></a>
				<? if ($arSection['ID'] == '448') { // Каталог ?>
					<?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "header_menu_catalog",
                        Array(
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
                            "SECTION_ID" => $arSection['ID'],
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array("UF_SECIONS", "UF_BLOCK_LINK"),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LINE"
                        )
                    );?>
				<? } else if ($arSection['ID'] == '275') { // Конфигуратор ?>
					<?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "header_menu_config",
                        Array(
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
                            "SECTION_ID" => $arSection['ID'],
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array("UF_SECIONS", "UF_BLOCK_LINK"),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LINE"
                        )
                    );?>
				<? } else { ?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"header_menu",
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
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "N",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array("",""),
							"FILTER_NAME" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "51",
							"IBLOCK_TYPE" => "Catalog",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "N",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "20",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => $arSection['ID'],
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array("ICON"),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "SORT",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "ASC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"UF_BLOCK_LINK" => $arSection['UF_BLOCK_LINK'],
							"UF_BLOCK_NAME" => $arSection['UF_BLOCK_NAME'],
							"UF_BLOCK_PICTURE" => $arSection['UF_BLOCK_PICTURE'],
						)
					);?>
				<? } ?>
			</li>
		<? } ?>
	</ul>
</nav>
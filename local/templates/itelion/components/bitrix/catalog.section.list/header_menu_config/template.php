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
<div class="desktop-menu__item">
	<div class="desktop-menu-nav">
		<ul class="desktop-menu-nav__links">
			<?foreach ($arResult['SECTIONS'] as $key => $arSection) {
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				?>
				<li class="desktop-menu-nav__link<?= $key == 0 ? ' _visible' : ''; ?>" data-link="config<?= $key; ?>" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
					<h3><?
						if ($arSection['UF_BLOCK_LINK'])
							echo "<a href='$arSection[UF_BLOCK_LINK]'>$arSection[NAME]</a>";
						else
							echo $arSection['NAME'];
						?>
                    </h3>
				</li>
			<? } ?>
		</ul>
		<div class="desktop-menu-nav__items">
			<?foreach ($arResult['SECTIONS'] as $key => $arSection) { ?>
				<div class="desktop-menu-nav__body<?= $key == 0 ? ' _visible' : ''; ?>" data-menu="config<?= $key; ?>">
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"header_menu_config",
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
							"PROPERTY_CODE" => array("SUBSECTIONS",""),
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
						)
					);?>
					<? if ($arSection['UF_SECIONS']) { ?>
						<div class="desktop-menu-nav__btns">
							<? foreach ($arSection['UF_SECIONS'] as $item) { ?>
								<span class="btn btn_medium btn_menu btn-icon btn-icon_reverse btn-icon_hover" >
									<span class="children"><?= explode(' - ', $item)[0]; ?></span>
									<a href="<?= explode(' - ', $item)[1]; ?>"   class="cover " ></a>
								</span>
							<? } ?>
						</div>
					<? } ?>
				</div>
			<? } ?>
		</div>
	</div>
</div>

<?/*
		<div class="desktop-menu-nav__items">
			<?foreach ($arResult['SECTIONS'] as $key => $arSection) { ?>
				<div class="desktop-menu-nav__body" data-menu="catalog<?= $key; ?>">
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"header_menu_catalog",
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
							"PROPERTY_CODE" => array("SUBSECTIONS","SETS"),
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
						)
					);?>
					<? if ($arSection['UF_SECIONS']) { ?>
						<div class="desktop-menu-nav__btns">
							<? foreach ($arSection['UF_SECIONS'] as $item) { ?>
								<span class="btn btn_medium btn_menu btn-icon btn-icon_reverse btn-icon_hover" >
									<span class="children"><?= explode(' - ', $item)[0]; ?></span>
									<a href="<?= explode(' - ', $item)[1]; ?>"   class="cover " ></a>
								</span>
							<? } ?>
						</div>
					<? } ?>
				</div>
			<? } ?>
		</div>
	</div>
</div>
*/?>
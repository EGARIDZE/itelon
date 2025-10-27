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
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="products-banner-new__list" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<? foreach ($arItem['PROPERTIES']['BLOCKS']['VALUE'] as $key => $item) { ?>
			<div class="products-banner-new__item">
				<div class="products-banner__content">
					<div class="products-banner__title"><?= $item['SUB_VALUES']['BLOCKS_TITLE']['VALUE']; ?></div>
					<div class="products-banner__text"><?= $item['SUB_VALUES']['BLOCKS_SUBTITLE']['VALUE']; ?></div>
				</div>
			</div>
		<? } ?>
	</div>
	<div class="products-banner-new__request">
		<? if ($arItem['PROPERTIES']['TRIGGER']['VALUE']) { ?>
			<div class="products-banner__subtitle"><?= $arItem['PROPERTIES']['TRIGGER']['VALUE']; ?></div>
		<? } ?>
		<? if ($arItem['PROPERTIES']['BUTTON']['VALUE']) { ?>
			<div class="products-banner__btn">
				<span class="btn btn_large btn_secondary" >
					<span class="children"><?= $arItem['PROPERTIES']['BUTTON']['VALUE']; ?></span>
					<a href="<?= $arItem['PROPERTIES']['BUTTON']['DESCRIPTION']; ?>" class="cover popup-link" ></a>
				</span>
			</div>
		<? } ?>
	</div>
<?endforeach;?>
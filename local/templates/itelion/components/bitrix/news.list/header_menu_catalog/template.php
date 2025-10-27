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
    <div class="desktop-menu-nav__preview" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="desktop-menu-nav__header">
            <a href="<?echo $arItem["CODE"];?>">
                <span><?echo $arItem["NAME"]?></span>
            </a>
            <? if ($arItem['PROPERTIES']['SUBSECTIONS']['VALUE']) {
	            $subsectionsCount = count($arItem['PROPERTIES']['SUBSECTIONS']['VALUE']);
	            $navListClass = $subsectionsCount < 9 ? ' two-cols' : '';
                ?>
                <div class="desktop-menu-nav__list<?=$navListClass;?>">
                    <? foreach ($arItem['PROPERTIES']['SUBSECTIONS']['VALUE'] as $key => $item) { ?>
                        <a href="<?= $arItem['PROPERTIES']['SUBSECTIONS']['DESCRIPTION'][$key]; ?>"><?= $item; ?></a>
                    <? } ?>
                </div>
            <? } ?>
        </div>
    </div>
    <? if ($arItem['PROPERTIES']['SETS']['VALUE']) { ?>
        <div class="navigation">
            <!-- Активному пункту добавляется класс _active-->
            <? foreach ($arItem['PROPERTIES']['SETS']['VALUE'] as $key => $item) { ?>
                <a href="<?= $arItem['PROPERTIES']['SETS']['DESCRIPTION'][$key]; ?>" class="navigation__item btn btn_small btn_outlined"><?= $item; ?></a>
            <? } ?>
        </div>
    <? } ?>
<?endforeach;?>
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
<h2>Производители</h2>
<div class="navigation">
    <!-- Активному пункту добавляется класс _active-->
    <a href="<?= $APPLICATION->GetCurPageParam('manufacturer=Импортное оборудование', ['manufacturer']) ?>" class="navigation__item btn btn_medium btn_outlined">Импортное оборудование!</a>
    <a href="<?= $APPLICATION->GetCurPageParam('manufacturer=Импортозамещение', ['manufacturer']) ?>" class="navigation__item btn btn_medium btn_outlined">Импортозамещение</a>
    <a href="<?= $APPLICATION->GetCurPageParam('manufacturer=Российское программное обеспечение', ['manufacturer']) ?>" class="navigation__item btn btn_medium btn_outlined">Российское программное обеспечение</a>
</div>
<div class="catalog-brands__logos">
    <div class="brands">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
            <div id="<?=$this->GetEditAreaId($arItem['ID']);?>"><img src="<?= CFile::GetPath($arItem['PROPERTIES']['ICONS']['VALUE']); ?>" alt="<?echo $arItem["NAME"]?>"></div>
        <?endforeach;?>
    </div>
</div>

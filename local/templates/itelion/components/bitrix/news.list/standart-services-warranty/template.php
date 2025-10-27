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

<div class="section__preview">
    <div class="services__preview">
        <h3>Стандартные услуги в рамках гарантийного сопровождения:</h3>
        <p>Для любого оборудования, приобретенного у нашей компании с актуальным сроком гарантии согласно гарантийному талону и сертификату на техническую поддержку</p>
    </div>
    <div class="services__list">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="services__item undefined" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="services__image">
                    <picture>
                        <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC']?>"
                                type="image/webp">
                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT']?>"></picture>
                </div>
                <div class="services__content">
                    <div class="services__title">
                        <h4><?= $arItem['NAME']?></h4>
                        <?= $arItem['~PREVIEW_TEXT']?>
                    </div>
                    <div class="services__links">
                        <? if($arItem['PROPERTIES']['TEXT_LINK']['VALUE']):?>
                            <a href="<?= $arItem['PROPERTIES']['LINK']['VALUE'] ?? ''?>"><?= $arItem['PROPERTIES']['TEXT_LINK']['VALUE']?></a>
                        <? endif;?>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>



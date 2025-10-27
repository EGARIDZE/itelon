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
        <h2>Услуги в рамках расширенного пакета гарантийного сопровождения:</h2>
        <p>Могут предоставляться как в рамках договора на техническое обслуживание, так и в виде разовых работ по запросу клиента</p>
    </div>
    <div class="services__list">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="services__item<?= ($key + 1) == count($arResult["ITEMS"]) ? ' services__item_big' : ''?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
                        <?= $arItem['PROPERTIES']['LINKS']['~VALUE']['TEXT'] ?? ''?>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
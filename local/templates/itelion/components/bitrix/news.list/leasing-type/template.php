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
        <div class="section__preview">
            <h2>Виды лизинговых продуктов для закупки ИТ</h2>
            <div class="tabs">
                <div class="tabs__titles">
                    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                        <h2 class="tabs__title<?= $key == 0 ? ' _active' : ''?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><?= $arItem['NAME']?></h2>
                    <?endforeach;?>
                </div>
                <div class="tabs__wrapper">
                    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                        <div class="tabs__content<?= $key == 0 ? ' _active' : ''?>">
                            <div class="tabs__text">
                                <?= $arItem['~PREVIEW_TEXT']?>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>




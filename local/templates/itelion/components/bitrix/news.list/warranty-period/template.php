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
    <h2>Гарантия на серверы и системы хранения Dell, HPE, Lenovo</h2>
    <p>После ухода западных вендоров мы не допустили ни малейшего простоя оборудования у наших заказчиков и оперативно создали собственный сервисный центр, на базе которого мы осуществляем гарантийное сопровождение ИТ-оборудования.</p>
</div>
<div class="warranty-period">
    <h3>Сроки гарантии на серверы и системы хранения:</h3>
    <div class="warranty-period__list">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
            <div class="warranty-period__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="warranty-period__header">
                    <h4><?= $arItem['NAME']?></h4>
                </div>
                <div class="warranty-period__description">
                    <?= $arItem['~PREVIEW_TEXT']?>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>



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
//mpr($arResult["ITEMS"]);
?>



<div class="main-slider">
    <div class="main-slider__wrapper">
        <div class="swiper-wrapper">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="swiper-slide main-slider__slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="main-slider__bg"
                         style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]['SRC']?>');"></div>
                    <div class="main-slider__content">
                        <div class="main-slider__text">
                            <h2><?= htmlspecialchars_decode($arItem["NAME"])?></h2>
                            <div class="main-slider__preview">
                                <?= $arItem["PREVIEW_TEXT"]?>
                            </div>
                        </div>
                        <span class="btn btn_large btn_accent">
                            <span class="children"><?= $arItem["PROPERTIES"]['BTN_TEXT']['VALUE']?></span>
                            <a href="<?= $arItem["PROPERTIES"]['BTN_LINK']['VALUE']?>" class="cover "></a>
                        </span>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
    <div class="main-slider__pagination"></div>
</div>
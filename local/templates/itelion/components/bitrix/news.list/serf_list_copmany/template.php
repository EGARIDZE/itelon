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
        <div class="section__wrapper">
            <div class="section__slider">
                <a href="/company/certificates/" class="link_title"><h2><?=$arResult['NAME']?></h2></a>
                <div class="section__navigation slider__navigation section__navigation_certificates">
                    <div class="_prev"></div>
                    <div class="_next"></div>
                </div>
            </div>
            <div class="certificates__slider">
                <div class="swiper-wrapper">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="swiper-slide certificate" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <picture><source srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" type="image/webp"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="photo"></picture>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

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
                <h2>Отзывы клиентов</h2>
                <div class="section__navigation slider__navigation section__navigation_reviews">
                    <div class="_prev"></div>
                    <div class="_next"></div>
                </div>
            </div>
            <div class="reviews__slider">
                <div class="swiper-wrapper">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="swiper-slide reviews-preview">
                        <div class="reviews-preview__title">
                            <h3><?=$arItem['NAME']?></h3>
                            <span><?=$arItem['PROPERTIES']['POSITION']['VALUE']?></span>
                        </div>
                        <div class="reviews-preview__logo">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                        </div>
                        <div class="reviews-preview__text">
                            <p><?=$arItem['PREVIEW_TEXT']?></p>
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>













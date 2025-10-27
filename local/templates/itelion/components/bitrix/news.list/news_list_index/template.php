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
            <a href="<?=$arResult['LIST_PAGE_URL']?>" class="link_title"><h2>Новости</h2></a>
            <div class="cases-preview__list">
                <div class="swiper-wrapper">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="swiper-slide articles__item">
                        <div class="articles__image">
                             <picture><source srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" type="image/webp"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="#"></picture>
                        </div>
                        <div class="articles__info">
                            <div class="articles__header">
                                <h3><?=$arItem['NAME']?></h3>
                                <div class="articles__card">
                                    <?=$arItem['PREVIEW_TEXT']?>
                                </div>
                            </div>
                            <div class="articles__date"><span><?=$arItem['DISPLAY_ACTIVE_FROM']?></span></div>
                        </div>
                    </a>
                    <?endforeach;?>

                </div>
            </div>
        </div>
    </div>
</section>











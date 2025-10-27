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

<div class="tabs">
    <div class="navigation">
        <? foreach ($arResult['SECTIONS'] as $key => $section):?>
            <p class="navigation__item btn btn_medium btn_outlined<?= $key == 0 ? ' _active' : ''?>" data-section="<?=$section['ID'];?>">
                <?= $section['NAME']?>
            </p>
        <? endforeach;?>
    </div>

    <div class="tabs__wrapper">

        <? foreach ($arResult['SECTIONS'] as $key => $section):?>
            <div class="tabs__content<?= $key == 0 ? ' _active' : ''?>" data-section="<?=$section['ID'];?>">
                <? if($section['ITEMS']):?>
                    <div class="accordion__list">
                        <? foreach ($section['ITEMS'] as $item):?>
                        <div class="accordion ">
                            <div class="accordion__title">
                                <h3><?= $item['NAME']?></h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <?= $item['PREVIEW_TEXT']?>
                                </div>
                            </div>
                        </div>
                        <? endforeach;?>
                    </div>
                <? endif;?>
            </div>
        <? endforeach;?>
    </div>
</div>


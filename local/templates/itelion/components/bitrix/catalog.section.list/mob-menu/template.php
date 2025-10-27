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
<!-- Элемент с классом "_arrow" добавляется автоматически, если у пункта меню будет свой вложенный список -->
<ul class="mobile-list">
<?php foreach ($arResult['SECTIONS'] as $arItem):?>
    <li>
        <a href="<?= $arItem['CODE']?>"><span><?= $arItem['NAME']?></span></a>
        <? if(!empty($arItem['ELEMENTS'])):?>
            <ul>
                <? foreach ($arItem['ELEMENTS'] as $item):?>
                    <li><a href="<?= $item['CODE']?>"><span><?= $item['NAME']?></span></a></li>
                <? endforeach;?>
            </ul>
        <? elseif (!empty($arItem['SUB_SECTIONS'])):?>
            <ul>
                <? foreach ($arItem['SUB_SECTIONS'] as $item):?>
                    <? if(!empty($item['ELEMENTS'])):?>
                        <li>
                            <a href="<?= $item['CODE']?>"><span><?= $item['NAME']?></span></a>
                            <ul>
                                <? foreach ($item['ELEMENTS'] as $elem):?>
                                    <li><a href="<?= $elem['SUBSECTIONS_DESCRIPTION']?>"><span><?= $elem['SUBSECTIONS_VALUE']?></span></a></li>
                                <? endforeach;?>
                            </ul>
                        </li>
                    <? elseif (!empty($item['SUB_SECTION_SECTION'])):?>
                        <li>
                            <a href="<?= $item['CODE']?>"><span><?= $item['NAME']?></span></a>
                            <ul>
                                <? foreach ($item['SUB_SECTION_SECTION'] as $subSection):?>
                                    <li>
                                        <a href="<?= $subSection['CODE']?>"><span><?= $subSection['NAME']?></span></a>
                                        <? if(!empty($subSection['ELEMENTS'])):?>
                                            <ul>
                                                <? foreach ($subSection['ELEMENTS'] as $elemSS):?>
                                                    <li><a href="<?= $elemSS['SUBSECTIONS_DESCRIPTION']?>"><span><?= $elemSS['SUBSECTIONS_VALUE']?></span></a></li>
                                                <? endforeach;?>
                                            </ul>
                                        <? endif;?>
                                    </li>
                                <? endforeach;?>
                            </ul>
                        </li>
                    <? endif;?>
                <? endforeach;?>
            </ul>
        <? endif;?>
    </li>
<?php endforeach;?>




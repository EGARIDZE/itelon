<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <div class="links__items">
        <?
        foreach ($arResult as $key => $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) continue; ?>
        <? if ($arItem["SELECTED"]):?>
            <? if($key == 0):?>
                <a href="<?= $arItem["LINK"] ?>"><h3><?= $arItem["TEXT"] ?></h3></a>
            <? else:?>
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
            <? endif;?>
        <? else:?>
            <? if($key == 0):?>
                <a href="<?= $arItem["LINK"] ?>"><h3><?= $arItem["TEXT"] ?></h3></a>
            <? else:?>
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
            <? endif;?>
        <? endif ?>
        <? endforeach ?>
    </div>
<? endif ?>



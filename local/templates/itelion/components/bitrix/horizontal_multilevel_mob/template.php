<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//mpr($arResult['CATALOG']);

?>
<? global $APPLICATION; ?>
<? if (!empty($arResult['ITEMS'])): ?>
    <ul class="mobile-list">
        <?
        $previousLevel = 0;
        foreach ($arResult['ITEMS'] as $arItem):?>

            <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? endif ?>
            <? if ($arItem["IS_PARENT"]): ?>
                <li>
                    <a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a>
                    <ul>
            <? else: ?>
                <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <li><a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a></li>
                <? else: ?>
                    <li><a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a></li>
                <? endif ?>
            <? endif ?>
            <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
        <? endforeach ?>
        <? if ($previousLevel > 1): ?>
            <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
        <? endif ?>
    </ul>
<? endif ?>





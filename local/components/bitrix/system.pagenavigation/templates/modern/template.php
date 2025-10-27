<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\UI\Extension::load(['ui.design-tokens']);

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
//clog($arResult);
?>
<div class="pagination ">
    <?
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

    $bFirst = true;

    if ($arResult["NavPageNomer"] > 1):
        if ($arResult["bSavePage"]):
            ?>
            <a class="pagination__arrow pagination__arrow_prev"
               href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?= GetMessage("nav_prev") ?>
            </a>
        <?
        else:
            if ($arResult["NavPageNomer"] > 2):
                ?>
                <a class="pagination__arrow pagination__arrow_prev"
                   href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?= GetMessage("nav_prev") ?></a>
            <?
            else:
                ?>
                <a class="pagination__arrow pagination__arrow_prev"
                   href="<?= $arResult["sUrlPath"] ?>"><?= GetMessage("nav_prev") ?></a>
            <?
            endif;

        endif;

        if ($arResult["nStartPage"] > 1):
            $bFirst = false;
            if ($arResult["bSavePage"]):
                ?>
                <a class="pagination__item"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1</a>
            <?
            else:
                ?>
                <a class="pagination__item" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
            <?
            endif;
            if ($arResult["nStartPage"] > 2):
                /*?>
                            <span class="pagination__item _disabled">...</span>
                <?*/
                ?>
                <a class="pagination__item"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= round($arResult["nStartPage"] / 2) ?>">...</a>
            <?
            endif;
        endif;
    else: ?>
        <a class="pagination__arrow pagination__arrow_prev _disabled"><?= GetMessage("nav_prev") ?></a>
    <? endif;

    do {
        if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
            ?>
            <a class="pagination__item _active"><?= $arResult["nStartPage"] ?></a>
        <?
        elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):

            ?>
            <a href="<?= $arResult["sUrlPath"] ?>"
               class="pagination__item"><?= $arResult["nStartPage"] ?></a>
        <?
        else:
            ?>
            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"<?
            ?> class="pagination__item"><?= $arResult["nStartPage"] ?></a>
        <?
        endif;
        $arResult["nStartPage"]++;
        $bFirst = false;
    } while ($arResult["nStartPage"] <= $arResult["nEndPage"]);

    if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
        if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
            if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                /*?>
                        <span class="pagination__item _disabled">...</span>
                <?*/
                ?>
                <a class="pagination__item"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2) ?>">...</a>
            <?
            endif;
            ?>
            <a class="pagination__item"
               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>
        <?
        endif;
        ?>
        <a class="pagination__arrow pagination__arrow_next"
           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_next") ?></a>
    <?
    else:?>
        <a class="pagination__arrow pagination__arrow_next _disabled"><?= GetMessage("nav_next") ?></a>
    <? endif; ?>
</div>
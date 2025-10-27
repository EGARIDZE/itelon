<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

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

if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showLazyLoad = false;

if ($arParams['NEWS_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showLazyLoad = $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

?>

<div class="section__wrapper">
    <div class="search-result__info">Результаты
        поиска <?= $arResult['NAV_RESULT']->NavPageNomer == 1 ? '1' : ((($arResult['NAV_RESULT']->NavPageNomer - 1) * $arResult['NAV_RESULT']->NavPageSize) + 1) ?>
        - <?= $arResult['NAV_RESULT']->NavRecordCount >= $arResult['NAV_RESULT']->NavPageSize ? ((($arResult['NAV_RESULT']->NavPageSize * $arResult['NAV_RESULT']->NavPageNomer) > $arResult['NAV_RESULT']->NavRecordCount) ? $arResult['NAV_RESULT']->NavRecordCount : ($arResult['NAV_RESULT']->NavPageSize * $arResult['NAV_RESULT']->NavPageNomer)) : $arResult['NAV_RESULT']->NavRecordCount ?>
        из <?= $arResult['NAV_RESULT']->NavRecordCount ?>
    </div>
    <div class="cases__list">
        <!-- items-container -->
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="swiper-slide cases-card"
                   data-entity="item"
                   id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="cases-card__image">
                        <!-- Расскоментировать на бэке -->
                        <picture>
                            <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
                            <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"></picture>
                    </div>
                    <div class="cases-card__info">
                        <h3><?= $arItem['NAME'] ?></h3>
                    </div>
                </a>
        <? endforeach; ?>
        <!-- items-container -->
    </div>
    <div class="browsing">
        <? if ($arResult["NAV_STRING"]): ?>
            <div class="pagination" data-pagination-num="<?= $navParams['NavNum'] ?>">
                <!-- pagination-container -->
                <?= $arResult["NAV_STRING"] ?>
                <!-- pagination-container -->
            </div>
        <? endif; ?>
    </div>
</div>
<!-- component-end -->
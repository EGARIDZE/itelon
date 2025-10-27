<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="section__wrapper">
    <div class="news__list">
        <!-- items-container -->
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="articles__item" target="_self">
                    <div class="articles__image">
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
                    </div>
                    <div class="articles__info">
                        <div class="articles__header">
                            <h3><?= $arItem["NAME"] ?></h3>
                            <div class="articles__card">
								<?= $arItem["PREVIEW_TEXT"] ?>
                            </div>
                        </div>
                        <div class="articles__date"><span><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span></div>
                    </div>
                </a>
            </div>
		<? endforeach; ?>
        <!-- items-container -->
    </div>
    <div class="browsing">

        <div class="pagination ">
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                <!-- pagination-container -->
                <?=$arResult["NAV_STRING"]?>
                <!-- pagination-container -->
			<?endif;?>
        </div>

    </div>
</div>
<!-- component-end -->
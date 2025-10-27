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
<? if ($arResult['ITEMS']): ?>
    <div class="section__wrapper">
        <div class="cases__list">
            <? foreach ($arResult['ITEMS'] as $arItem):?>
                <a href="<?= $arItem['DETAIL_PAGE_URL']?>" class=" articles__item">
                    <div class="articles__image">
                        <picture><source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" type="image/webp"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT']?>"></picture>
                    </div>
                    <div class="articles__info">
                        <div class="articles__header">
                            <h3><?= $arItem['NAME']?></h3>
                            <div class="articles__card">
                                <?= $arItem['~PREVIEW_TEXT']?>
                            </div>
                        </div>
                        <div class="articles__date"><span><?= $arItem['DISPLAY_ACTIVE_FROM']?></span></div>
                    </div>
                </a>
            <? endforeach;?>
        </div>
        <div class="browsing">
            <? if (!empty(trim($arResult["NAV_STRING"]))): ?>
                <?
                    $x = 18;
                    if($_REQUEST['show-count']){
                        $x = $_REQUEST['show-count'] + 9;
                    }
                ?>
                <span class="btn btn_medium btn_outlined">
                    <span class="children">Показать еще</span>

                    <a href="<?= $APPLICATION->GetCurPageParam("show-count=$x", ['show-count']) ?>" class="cover "></a>
                </span>
                <?= $arResult["NAV_STRING"] ?>
            <? endif; ?>
        </div>
    </div>
<? endif; ?>




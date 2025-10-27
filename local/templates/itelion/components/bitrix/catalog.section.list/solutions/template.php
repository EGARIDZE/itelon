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

//mpr($arResult['SETS']);

?>

<?php if ($arResult['SECTIONS']): ?>
    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <h2>Решения</h2>
                <div class="solutions-preview">
                    <div class="solutions-preview__main">
                        <div class="catalog-item catalog-primary__item catalog-item_primary">
                            <a href="/solutions/<?= $arResult['SECTIONS'][0]['CODE'] ?>/"
                               class="catalog-primary__preview">
                                <div class="catalog-primary__image">
                                    <picture>
                                        <source srcset="<?= $arResult['SECTIONS'][0]['PICTURE']['SRC'] ?>"
                                                type="image/webp">
                                        <img src="<?= $arResult['SECTIONS'][0]['PICTURE']['SRC'] ?>" alt="photo">
                                    </picture>
                                </div>
                                <div class="catalog-primary__title">
                                    <h2><?= $arResult['SECTIONS'][0]['NAME'] ?></h2>
                                </div>
                            </a>
                            <? if (!empty($arResult['ITEMS'][$arResult['SECTIONS'][0]['ID']])): ?>
                                <div class="catalog-primary__subtitles">
                                    <div class="catalog-primary__column">
                                        <div class="navigation">
                                            <? foreach($arResult['ITEMS'][$arResult['SECTIONS'][0]['ID']] as $item):?>
                                                <a href="/solutions/<?=$arResult['SECTIONS'][0]['CODE'] .'/'. $item['CODE'];?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
                                            <? endforeach;?>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                        <? if ($arResult['SECTIONS'][1]): ?>
                            <div class="catalog-item catalog-primary__item">
                                <a href="/solutions/<?= $arResult['SECTIONS'][1]['CODE'] ?>/"
                                   class="catalog-primary__preview">
                                    <div class="catalog-primary__image">
                                        <picture>
                                            <source srcset="<?= $arResult['SECTIONS'][1]['PICTURE']['SRC'] ?>"
                                                    type="image/webp">
                                            <img src="<?= $arResult['SECTIONS'][1]['PICTURE']['SRC'] ?>" alt="photo">
                                        </picture>
                                    </div>
                                    <div class="catalog-primary__title">
                                        <h2><?= $arResult['SECTIONS'][1]['NAME'] ?></h2>
                                    </div>
                                </a>
                                <? if (!empty($arResult['ITEMS'][$arResult['SECTIONS'][1]['ID']])): ?>
                                    <div class="catalog-primary__subtitles">
                                        <div class="catalog-primary__column">
                                            <div class="navigation">
                                                <? foreach($arResult['ITEMS'][$arResult['SECTIONS'][1]['ID']] as $item):?>
                                                    <a href="/solutions/<?=$arResult['SECTIONS'][1]['CODE'] .'/'. $item['CODE']?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
                                                <? endforeach;?>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                        <? endif; ?>
                        <? if ($arResult['SECTIONS'][2]): ?>
                            <div class="catalog-item catalog-primary__item">
                                <a href="/solutions/<?= $arResult['SECTIONS'][2]['CODE'] ?>/"
                                   class="catalog-primary__preview">
                                    <div class="catalog-primary__image">
                                        <picture>
                                            <source srcset="<?= $arResult['SECTIONS'][2]['PICTURE']['SRC'] ?>"
                                                    type="image/webp">
                                            <img src="<?= $arResult['SECTIONS'][2]['PICTURE']['SRC'] ?>" alt="photo">
                                        </picture>
                                    </div>
                                    <div class="catalog-primary__title">
                                        <h2><?= $arResult['SECTIONS'][2]['NAME'] ?></h2>
                                    </div>
                                </a>
                                <? if (!empty($arResult['ITEMS'][$arResult['SECTIONS'][2]['ID']])): ?>
                                    <div class="catalog-primary__subtitles">
                                        <div class="catalog-primary__column">
                                            <div class="navigation">
                                                <? foreach($arResult['ITEMS'][$arResult['SECTIONS'][2]['ID']] as $item):?>
                                                    <a href="/solutions/<?=$arResult['SECTIONS'][2]['CODE'] .'/'. $item['CODE']?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
                                                <? endforeach;?>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                        <? endif; ?>
                    </div>
                    <? if (count($arResult['SECTIONS']) > 3): ?>
                        <div class="catalog-list">
                            <? foreach ($arResult['SECTIONS'] as $key => $value): ?>
                                <? if ($key == 0 || $key == 1 || $key == 2) continue; ?>
                                <a href="/solutions/<?= $value['CODE'] ?>/" class="catalog-item">
                                    <div class="catalog-item__image">
                                        <picture>
                                            <source srcset="<?= $value['PICTURE']['SRC'] ?>"
                                                    type="image/webp">
                                            <img src="<?= $value['PICTURE']['SRC'] ?>" alt="photo">
                                        </picture>
                                    </div>
                                    <div class="catalog-item__title">
                                        <h2><?= $value['NAME'] ?></h2>
                                    </div>
                                </a>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
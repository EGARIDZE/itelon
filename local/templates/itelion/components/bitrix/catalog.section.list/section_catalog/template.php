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
//mpr($arResult);

?>
<div class="catalog-primary">
    <? foreach (array_slice($arResult['SECTIONS'], 0, 2) as $section):
        //clog($section);
        ?>
        <div class="catalog-item catalog-primary__item">
            <a href="<?= $section['SECTION_PAGE_URL']; ?>" target="_self" class="catalog-primary__preview">
                <div class="catalog-primary__image">
                    <picture>
                        <source srcset="<?= $section["PICTURE"]["SRC_WEBP"] ?>" type="image/webp">
                        <img src="<?= $section["PICTURE"]["SRC"] ?>" alt="#"></picture>
                </div>
                <div class="catalog-primary__title">
                    <h2><?= $section['NAME'] ?></h2>
                </div>
            </a>
            <div class="catalog-primary__subtitles">
                <? if (!empty($section['UF_TYPES'])): ?>
                    <div class="catalog-primary__column">
                        <div class="links">
                            <h3>Типы</h3>
                            <div class="links__items">
                                <? foreach ($section['UF_TYPES'] as $item): ?>
                                    <?= htmlspecialchars_decode($item) ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
                <? if (!empty($section['UF_TASKS'])): ?>
                    <div class="catalog-primary__column">
                        <div class="links">
                            <h3>Задачи</h3>
                            <div class="links__items">
                                <? foreach ($section['UF_TASKS'] as $item): ?>
                                    <?= htmlspecialchars_decode($item) ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
                <div class="catalog-primary__column">
                    <? if (!empty($section['UF_FORMFACTORS'])): ?>
                        <div class="links">
                            <h3>Формфакторы</h3>
                            <div class="links__items">
                                <? foreach ($section['UF_FORMFACTORS'] as $item): ?>
                                    <?= htmlspecialchars_decode($item) ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <? if (!empty($section['UF_PROCESSORS'])): ?>
                        <div class="links">
                            <h3>Процессоры</h3>
                            <div class="links__items">
                                <? foreach ($section['UF_PROCESSORS'] as $item): ?>
                                    <?= htmlspecialchars_decode($item) ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endif; ?>
	                <? if (!empty($section['UF_INTERFACES'])): ?>
                        <div class="links">
                            <h3>Интерфейсы</h3>
                            <div class="links__items">
				                <? foreach ($section['UF_INTERFACES'] as $item): ?>
					                <?= htmlspecialchars_decode($item) ?>
				                <? endforeach; ?>
                            </div>
                        </div>
	                <? endif; ?>
                </div>
            </div>
            <? if (!empty($section['UF_MANUF_ICONS'])): ?>
                <div class="catalog-primary__brands">
                    <? foreach ($section['UF_MANUF_ICONS'] as $key => $item): ?>
                        <a href="<?= $section['UF_MANUF_LINK'][$key]?>"><img src="<?= CFile::GetPath($item) ?>" alt="#"></a>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
    <? endforeach; ?>
</div>
<div class="catalog-list">
    <? foreach (array_slice($arResult['SECTIONS'], 2) as $i => $section):
        //clog($section['SORT']);
        ?>

        <? if ($i != 4): ?>
            <a href="<?= $section['SECTION_PAGE_URL']; ?>" target="_self" class="catalog-item">
                <div class="catalog-item__image">
                    <picture>
                        <source srcset="<?= $section["PICTURE"]["SRC_WEBP"] ?>" type="image/webp">
                        <img src="<?= $section["PICTURE"]["SRC"] ?>" alt="#"></picture>
                </div>
                <div class="catalog-item__title">
                    <h2><?= $section['NAME'] ?></h2>
                </div>
            </a>
        <? else: ?>
            <div class="catalog-item catalog-primary__item catalog-item_primary">
                <a href="<?= $section['SECTION_PAGE_URL']; ?>" target="_self" class="catalog-primary__preview">
                    <div class="catalog-primary__image">
                        <picture>
                            <source srcset="<?= $section["PICTURE"]["SRC_WEBP"] ?>" type="image/webp">
                            <img src="<?= $section["PICTURE"]["SRC"] ?>" alt="#"></picture>
                    </div>
                    <div class="catalog-primary__title">
                        <h2><?= $section['NAME'] ?></h2>
                    </div>
                </a>
            </div>
        <? endif; ?>
    <? endforeach; ?>
</div>

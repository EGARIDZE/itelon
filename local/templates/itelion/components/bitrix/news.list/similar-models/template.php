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

<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <div class=" product-preview">
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="product-preview__image">
            <picture>
                <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                        type="image/webp">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"></picture>
            <span>Заглушка (наличие)</span>
        </a>
        <div class="product-preview__description">
            <div class="product-preview__info">
                <div class="product-preview__score">Заглушка (стоимость)</div>
                <div class="product-preview__title">
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                        <h4><?= $arItem['NAME'] ?></h4>
                    </a>
                    <ul>
                        <? if ($arItem['PROPERTIES']['MANUFACTURER']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['MANUFACTURER']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['TYPE_EQUIPMENT']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['TYPE_EQUIPMENT']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['TECHNICAL_FEATURES']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['TECHNICAL_FEATURES']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['TASKS']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['TASKS']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['FORM_FACTOR']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['FORM_FACTOR']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['PROCESSOR_FAMILY']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['PROCESSOR_FAMILY']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['PROCESSOR_SERIES']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['PROCESSOR_SERIES']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['NUMBER_PROCESSOR']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['NUMBER_PROCESSOR']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['GENERATION']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['GENERATION']['VALUE'] ?></li>
                        <? endif; ?>
                        <? if ($arItem['PROPERTIES']['GUARANTEE_REDUCTION']['VALUE']): ?>
                            <li><?= $arItem['PROPERTIES']['GUARANTEE_REDUCTION']['VALUE']?>
                                <? if ($arItem['PROPERTIES']['GUARANTEE']['VALUE']): ?>
                                    <div class="tip">
                                        <div class="tip__image">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="icon">
                                        </div>
                                        <div class="tip__text">
                                            <?= $arItem['PROPERTIES']['GUARANTEE']['VALUE']?>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </li>
                        <? endif; ?>
                    </ul>
                </div>
            </div>
            <div class="product-preview__btns">
				<span class="btn btn_large btn_mobile_small btn_secondary">
                    <span class="children">Купить в 1 клик</span>
                    <a href="#tender" class="cover popup-link"></a>
                </span>
                <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config">
                    <span class="children">Сконфигурировать</span>
                    <a href="#" class="cover "></a>
                </span>
            </div>
        </div>
    </div>
<? endforeach; ?>


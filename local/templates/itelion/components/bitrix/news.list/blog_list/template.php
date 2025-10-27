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
if (!isset($arParams['HIDE_TITLE']) || !$arParams['HIDE_TITLE'])
    echo "<h3>Вам может быть интересно</h3>";
?>

<div class="blog-list">
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
        <article class="articles__item">
            <div class="articles__image">
                <picture><source srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="#"></picture>
            </div>
            <div class="articles__info">
                <div class="articles__header">
                    <h3><?=$arItem['NAME']?></h3>
                    <div class="articles__card">
						<?= $arItem["PREVIEW_TEXT"] ?>
                    </div>
                </div>
            </div>
            <div class="articles__data">
				<?
				if ($arItem['PROPERTIES']['UPDATE_DATE']['VALUE']) {
					?>
                    <div class="articles__label articles__date">
                        <div class="articles__icon">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/update.svg" alt="#" />
                        </div>
                        <span><b>Обновлено:</b> <?=FormatDate('j F Y', MakeTimeStamp($arItem['PROPERTIES']['UPDATE_DATE']['VALUE']));?></span>
                    </div>
					<?
				} else if ($arItem['DISPLAY_ACTIVE_FROM']) {
					?>
                    <div class="articles__date">
                        <span><b>Опубликовано:</b> <?=$arItem["DISPLAY_ACTIVE_FROM"]; ?></span>
                    </div>
					<?
				}
				?>
                <div class="articles__data--preview">
					<? if($arItem['SHOW_COUNTER']):?>
                        <div class="articles__label">
                            <div class="articles__icon">
                                <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/eye.svg" alt="#">
                            </div>
                            <span><?=$arItem['SHOW_COUNTER']?></span>
                        </div>
					<? endif;?>

                    <div class="articles__label">
                        <div class="articles__icon">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/comment.svg" alt="#" />
                        </div>
                        <span><?=$arItem['COMMENTS_CNT'];?></span>
                    </div>

                    <div class="articles__label">
                        <div class="articles__icon">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/star.svg" alt="#" />
                        </div>
                        <span><?=$arItem['AVERAGE_RATE'];?></span>
                    </div>
                </div>
            </div>
        </article>
    </a>
<?endforeach;?>
</div>

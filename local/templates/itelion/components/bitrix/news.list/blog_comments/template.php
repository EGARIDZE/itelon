<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Type\DateTime;
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
//clog($arResult);
$commentsCount = $arResult['NAV_RESULT']->NavRecordCount;
$this->SetViewTarget('comments_count');
echo $commentsCount;
$this->EndViewTarget();
$this->SetViewTarget('be_first');
	echo $commentsCount == 0 ? " — будьте первым" : '';
$this->EndViewTarget();
if (count($arResult['ITEMS']) > 0) {
?>
<div class="articles-comments">
	<div class="articles-comments__wrapper">
		<div class="articles-comments__header">
			<h2 class="articles-comments__title">
				Комментарии
				<span><?=$arResult['NAV_RESULT']->NavRecordCount;?></span>
			</h2>

		</div>
		<div class="articles-comments__list items-list">
			<!--Комментарий-->
			<?
            foreach ($arResult['ITEMS'] as $arComment) {
                ?>
                <div class="articles-comments__item comments-item item-content">
                    <div class="comments-item__comment">
                        <div class="comments-item__header">
                            <div class="comments-item__preview">
                                <h3 class="comments-item__title"><?=$arComment['PROPERTIES']['USER_NAME']['VALUE'];?></h3>
                                <div class="comments-item__label"><?=$arComment['DISPLAY_ACTIVE_FROM'];?></div>
                            </div>
                            <div class="comments-item__rating" data-comments-rating="<?=$arComment['PROPERTIES']['RATING']['VALUE'];?>">
                                <div class="comments-item__rating--item"></div>
                                <div class="comments-item__rating--item"></div>
                                <div class="comments-item__rating--item"></div>
                                <div class="comments-item__rating--item"></div>
                                <div class="comments-item__rating--item"></div>
                            </div>
                        </div>
                        <?
                        if (isset($arComment['PROPERTIES']['COMMENT']['VALUE']['TEXT'])) {
                            ?>
                            <div class="comments-item__description"><?=$arComment['PROPERTIES']['COMMENT']['VALUE']['TEXT'];?></div>
                            <?
                        }
                        ?>

                    </div>
                    <?
                    if ($arComment['PROPERTIES']['REPLY_TO_COMMENT']['VALUE']) {
                        ?>
                        <div class="comments-item__answer">
                            <div class="comments-item__header">
                                <div class="comments-item__preview">
                                    <div
                                            class="comments-item__logo"
                                            style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/it-logo.png')"></div>
                                    <div>
                                        <h3 class="comments-item__title">Вихрожданов Алексей</h3>
                                        <div class="comments-item__label">
                                            Менеджер по работе с клиентами ITELON
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-item__label"><?=FormatDate('j F Y', MakeTimeStamp($arComment['TIMESTAMP_X']));?></div>
                            </div>
                            <div class="comments-item__description"><?=$arComment['PROPERTIES']['REPLY_TO_COMMENT']['VALUE']['TEXT'];?></div>
                        </div>
                        <?
                    }
                    ?>

                </div>
                <?
            }
            ?>
		</div>
        <div id="pag">
			<?=$arResult["NAV_STRING"]?>
        </div>
	</div>
</div>
<?}
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */
//clog($item);

?>
<a href="<?= $item['DETAIL_PAGE_URL']; ?>" class="product-preview__image" target="_self">
	<picture>
		<source srcset="<?= $item['CARD_DATA']['PIC']; ?>" type="image/webp">
		<img src="<?= $item['CARD_DATA']['PIC']; ?>" alt="<?= $item['NAME']; ?>">
	</picture>
	<?
        if ($item['CARD_DATA']['STATUS']) {
            ?>
            <span class="<?=$item['CARD_DATA']['STATUS']['class'];?>"><?= $item['CARD_DATA']['STATUS']['text'];?></span>
            <?
        }
    ?>

</a>
<div class="avail_wrapper">
    <span class="<?=$item['CARD_DATA']['AVAIL']['class'];?>" data-shop-item-get="delivery">
        <?=$item['CARD_DATA']['AVAIL']['text'];?>
    </span>
    <?
        if ($item['CARD_DATA']['DISCONTINUED']) {
            ?>
            <span class="discontinued">Снято с производства</span>
            <?
        }
    ?>
</div>
<div class="product-preview__description">
	<div class="product-preview__info">
		<div class="product-preview__score" data-shop-item-get="price"><?= $item['CARD_DATA']['PRICE']; ?></div>
		<div class="product-preview__title">
			<a href="<?= $item['DETAIL_PAGE_URL']; ?>" target="_self">
				<h4 data-shop-item-get="title"><?= $item['NAME']; ?></h4>
			</a>
			<div data-shop-item-get="description">
			<?=$item['CARD_DATA']['DESC'];?>
		</div>
		</div>

        <? if (!empty($item['CARD_DATA']['WTY'])): ?>
            <div class="product-preview-info">
                <div data-shop-item-get="warranty" style="display: none;">
                    <?=$item['CARD_DATA']['BASKET_WTY'];?>
                </div>
                <div class="product-preview-icon">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg" alt="">
                </div>
                <p><?= $item['CARD_DATA']['WTY']; ?></p>
            </div>
        <? endif;?>
        <? if (!empty($item['CARD_DATA']['DEL'])): ?>
            <div class="product-preview-info">
                <div class="product-preview-icon">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg" alt="">
                </div>
                <p><?= $item['CARD_DATA']['DEL']; ?></p>
            </div>
        <? endif;?>
	</div>
	<div class="product-preview__btns">
		<? if ($item['CODE'] && $item['PROPERTIES']['VENDOR']['VALUE']=='HPE'): ?>
            <div class="product-preview__part">Партномер: <b><?= $item['CODE']; ?></b></div>
		<? endif;?>
		<div class="product-preview__buy">
		<span class="btn btn_large btn_mobile_small btn_secondary" >
			<span class="children">Купить в 1 клик</span>
			<a href="#tender"   class="cover popup-link" ></a>
		</span>
			<button class="btn btn_large btn_icon btn_outlined btn_shop" data-shop-item="btn">
				<div class="btn_shop__label">
					Добавить в корзину
				</div>
				<div class="btn_shop__check"></div>
				<span class="children"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg"></span>
				</button>
		</div>

		<span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >
			<span class="children">Сконфигурировать</span>
			<a href="<?=$item['DETAIL_PAGE_URL'];?>"   class="cover " target="_self"></a>
		</span>
	</div>
</div>
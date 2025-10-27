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
$formId = $item['ITEM_PRICES'][0]['PRICE'] ? '#basket' : '#tender';
$buyBtnClass = $item['ITEM_PRICES'][0]['PRICE'] ? 'basket-call' : 'tender-call';
?>
<a href="<?= $item['DETAIL_PAGE_URL']; ?>" target="_self" class="product-preview__image">
    <picture>
        <source srcset="<?= $item['PREVIEW_PICTURE']['SRC']; ?>" type="image/webp">
        <img src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $productTitle; ?>">
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
    <span class="<?=$item['CARD_DATA']['AVAIL']['class'];?>">
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
<div class="product-preview__description"
     data-model="<?=$item['PROPERTIES']['MODEL_LINK']['VALUE'];?>"
     data-marker="<?=$item['PROPERTIES']['PART_NUMBER']['VALUE']?>"
     data-min_wty="<?=$item['PROPERTIES']['_WARRANTY']['VALUE'];?>"
    >
    <div class="product-preview__info">
        <?$priceClass = $item['HIDE_PRICE'] ? '_hidden' : 'product-preview__score';?>
            <div class="<?=$priceClass?>" data-shop-item-get="price"><?= $item['CARD_DATA']['PRICE']; ?></div>

        <div class="product-preview__title">
            <a href="<?= $item['DETAIL_PAGE_URL']; ?>" target="_self">
                <h4 class="card-title" data-shop-item-get="title"><?= $productTitle; ?></h4>
            </a>
            <div class="card-description">
	            <?
	            echo $item['CARD_DATA']['PROPS'];
	            ?>
            </div>
        </div>
	    <? if ($item['PROPERTIES']['GUARANTEE']['VALUE']): ?>
            <div class="product-preview-info">
                <div data-shop-item-get="warranty" style="display: none;"><?=$item['PROPERTIES']['_WARRANTY']['VALUE'];?></div>
                <div class="product-preview-icon">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg" alt="">
                </div>
                <p><?= $item['PROPERTIES']['GUARANTEE']['VALUE']; ?></p>
            </div>
	    <? endif;?>
	    <? if ($item['PROPERTIES']['DELIVERY']['VALUE']): ?>
            <div class="product-preview-info">
                <div data-shop-item-get="delivery" style="display: none;"><?=$item['CARD_DATA']['AVAIL']['text'];?></div>
                <div class="product-preview-icon">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg" alt="">
                </div>
                <p><?= $item['PROPERTIES']['DELIVERY']['VALUE']; ?></p>
            </div>
	    <? endif;?>
    </div>
    <?
    if (!isset($arParams['SHOW_BUTTONS']) || $arParams['SHOW_BUTTONS']=="Y") {
        ?>
        <div class="product-preview__btns">
            <div class="product-preview__buy">
                <?
                if ($item['PROPERTIES']['DISCONTINUED']['VALUE']) {
                    ?>
                    <span class="btn btn_large btn_secondary">
                        <span class="children">Подобрать аналог</span>
                        <a href="#get_analog_form" class="cover popup-link" data-name="<?=$item['NAME']?>"></a>
                    </span>
                    <?
                } else {
                    ?>
                    <span class="btn btn_large btn_mobile_small btn_secondary btn-icon btn-icon_reverse btn-icon_large <?=$buyBtnClass;?>" >
			            <span class="children"><?=$item['HIDE_PRICE']?'Уточнить цену':'Купить в 1 клик';?></span>
			            <a href="<?=$formId;?>" class="cover popup-link" ></a>
		            </span>
                    <button class="btn btn_large btn_icon btn_outlined btn_shop" data-shop-item="btn">
                        <div class="btn_shop__label">
                            Добавить в корзину
                        </div>
                        <div class="btn_shop__check"></div>
                        <span class="children"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg"></span>
                    </button>
                    <?
                }
                ?>

            </div>

		    <?
		    if ($item['CARD_DATA']['CONFIG_URL']) {
			    ?>
                <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >
            <span class="children">Сконфигурировать</span>
            <a href="/configurator/<?=$item['CARD_DATA']['CONFIG_URL'];?>"   class="cover " ></a>
            </span>
			    <?
		    }
		    ?>
        </div>
        <?
    }
    ?>

</div>
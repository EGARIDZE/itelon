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

//clog($arResult["ITEMS"]);
?>
<section class="section">
    <div class="container">
        <div class="section__wrapper">
            <h2>Популярные серверы</h2>
            <div class="popular">
                <div class="popular-list">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	                $formId = $arItem['PRICE_1'] ? '#basket' : '#tender';
	                $buyBtnClass = $arItem['PRICE_1'] ? 'basket-call' : 'tender-call';
                    ?>
                    <div class="product-preview" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-shop-item-get-id="<?=$arItem['ID'];?>" data-shop-item-get-type="product">
                        <a href="<?= $arItem['DETAIL_PAGE_URL']?>" class="product-preview__image">
                            <picture>
                                <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" type="image/webp">
                                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?= $arItem['PREVIEW_PICTURE']['ALT']?>"></picture>
	                        <?
	                        if ($arItem['CARD_DATA']['STATUS']) {
		                        ?>
                                <span class="<?=$arItem['CARD_DATA']['STATUS']['CLASS'];?>">
                                    <?= $arItem['CARD_DATA']['STATUS']['TEXT'];?>
                                </span>
		                        <?
	                        }
	                        ?>
                        </a>
                        <div class="avail_wrapper">
                            <span class="<?=$arItem['CARD_DATA']['AVAIL']['class'];?>" data-shop-item-get="delivery">
                                <?=$arItem['CARD_DATA']['AVAIL']['text'];?>
                            </span>
		                    <?
		                    if ($arItem['CARD_DATA']['DISCONTINUED']) {
			                    ?>
                                <span class="discontinued">Снято с производства</span>
			                    <?
		                    }
		                    ?>
                        </div>
                        <div class="product-preview__description"
                             data-model="<?=$arItem['PROPERTIES']['MODEL_LINK']['VALUE'];?>"
                             data-marker="<?=$arItem['PROPERTIES']['PART_NUMBER']['VALUE']?>"
                             data-min_wty="<?=$arItem['PROPERTIES']['_WARRANTY']['VALUE'];?>"
                             >
                            <div class="product-preview__info">
                                <div class="product-preview__score" data-shop-item-get="price"><?=$arItem['PRICE_FORMATTED'];?></div>
                                <div class="product-preview__title">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL']?>">
                                        <h4 class="card-title" data-shop-item-get="title"><?= $arItem['NAME']?></h4>
                                    </a>
                                    <div class="card-description">
                                        <?echo $arItem['CARD_DATA']['PROPS'];?>
                                    </div>
                                </div>
                                <? if ($arItem['PROPERTIES']['GUARANTEE']['VALUE']): ?>
                                    <div class="product-preview-info">
                                        <div data-shop-item-get="warranty" style="display: none;"><?=$arItem['PROPERTIES']['_WARRANTY']['VALUE'];?></div>
                                        <div class="product-preview-icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg" alt="">
                                        </div>
                                        <p><?= $arItem['PROPERTIES']['GUARANTEE']['VALUE']; ?></p>
                                    </div>
                                <? endif;?>
                                <? if ($arItem['PROPERTIES']['DELIVERY']['VALUE']): ?>
                                    <div class="product-preview-info">
                                        <div class="product-preview-icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg" alt="">
                                        </div>
                                        <p><?= $arItem['PROPERTIES']['DELIVERY']['VALUE']; ?></p>
                                    </div>
                                <? endif;?>
                            </div>
                            <div class="product-preview__btns">
                                <div class="product-preview__buy">
                                    <span class="btn btn_large btn_mobile_small btn_secondary btn-icon btn-icon_reverse btn-icon_large <?=$buyBtnClass;?>" >
                                        <span class="children">Купить в 1 клик</span>
                                        <a href="<?=$formId;?>" class="cover popup-link" ></a>
                                    </span>
                                    <button class="btn btn_large btn_icon btn_outlined btn_shop" data-shop-item="btn">
                                        <div class="btn_shop__label">
                                            Добавить в корзину
                                        </div>
                                        <div class="btn_shop__check"></div>
                                        <span class="children"><img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/shop.svg"></span>
                                    </button>
                                </div>
                                <?
                                if ($arItem['CONF_URL']) {
                                    ?>
                                    <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config">
                                    <span class="children">Сконфигурировать</span>
                                    <a href="/configurator/<?=$arItem['CONF_URL'];?>" class="cover "></a>
                                    </span>
                                    <?
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
                    <div class="popular__banner"
                         style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/popular.webp')">
                        <div class="popular__banner-title">
                            <p></p>
                        </div>
                        <div class="popular__banner-content">
                            <div class="popular__banner-title-second">
                                <h3>Выбрать лучший сервер</h3>
                            </div>
                            <div class="product-preview__btns">
                                <span class="btn btn_large btn_mobile_small btn_secondary">
                                    <span class="children">Перейти</span>
                                        <a href="/catalog/servers/" class="cover"></a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Не удалять, после отработки ajax автолоадером классы не подтягиваются - автолоадер перенесён в Init
//include $_SERVER['DOCUMENT_ROOT'] . '/local/lib/classes/CDataHarvester.php';
//include $_SERVER['DOCUMENT_ROOT'] . '/local/lib/classes/CDataModifier.php';

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
    $navParams =  array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
}
else
{
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'USE_PAGINATION_CONTAINER' => $showTopPager || $showBottomPager,
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
    {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
    }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
    {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
    }
}

$arParams['~MESS_BTN_BUY'] = ($arParams['~MESS_BTN_BUY'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = ($arParams['~MESS_BTN_DETAIL'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = ($arParams['~MESS_BTN_COMPARE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = ($arParams['~MESS_BTN_SUBSCRIBE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = ($arParams['~MESS_NOT_AVAILABLE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_NOT_AVAILABLE_SERVICE'] = ($arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '') ?: Loc::getMessage('CP_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE_SERVICE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = ($arParams['MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = ($arParams['MESS_BTN_LAZY_LOAD'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];
$bannerProps = $arParams['RCM_BANNER_PROPS'];

//clog($arResult);
?>

<div class="models__products">

    <div class="products__list" data-entity="<?=$containerName?>">
        <!-- items-container -->
		    <?
		    $const = SITE_TEMPLATE_PATH;
		    foreach ($arResult['ITEMS'] as $key => $arModel) {
			    $formId = $arModel['ITEM_PRICES'][0]['PRICE'] ? '#basket' : '#tender';
			    $buyBtnClass = $arModel['ITEM_PRICES'][0]['PRICE'] ? 'basket-call' : 'tender-call';
			    ?>
                <div data-entity="items-row">
                    <div class=" product-preview" data-entity="item"  data-shop-item-get-id="<?=$arModel['ID'];?>" data-shop-item-get-type="product">
                        <a href="#" class="product-preview__image">
                            <picture>
                                <source srcset="<?=$arParams['RCM_PROD_PICTURE'];?>"
                                        type="image/webp">
                                <img src="<?=$arParams['RCM_PROD_PICTURE'];?>"
                                     alt="#">
                            </picture>
	                        <?
	                        if ($arModel['CARD_DATA']['STATUS']) {
		                        ?>
                                <span class="<?=$arModel['CARD_DATA']['STATUS']['class'];?>">
                                    <?= $arModel['CARD_DATA']['STATUS']['text'];?>
                                </span>
		                        <?
	                        }
	                        ?>
                        </a>
                        <div class="avail_wrapper">
                            <span class="<?=$arModel['CARD_DATA']['AVAIL']['class'];?>" data-shop-item-get="delivery">
                                <?=$arModel['CARD_DATA']['AVAIL']['text'];?>
                            </span>
		                    <?
		                    if ($arModel['CARD_DATA']['DISCONTINUED']) {
			                    ?>
                                <span class="discontinued">Снято с производства</span>
			                    <?
		                    }
		                    ?>
                        </div>
                        <div class="product-preview__description">
                            <div class="product-preview__info">
                                <?$priceClass = $arModel['HIDE_PRICE'] ? '_hidden' : 'product-preview__score';?>
                                    <div class="<?=$priceClass?>" data-shop-item-get="price"><?=$arModel['CARD_DATA']['PRICE'];?></div>

                                <div class="product-preview__title">
                                    <a href="#">
                                        <h4 class="card-title" data-shop-item-get="title"><?=$arParams['RCM_PROD_NAME'];?></h4>
                                    </a>
                                    <div class="card-description" data-shop-item-get="description">
	                                    <?= $arModel['DESCRIPTION_LIST'] ?: "<p>$arModel[PREVIEW_TEXT]</p>";?>
                                    </div>
                                </div>
                            </div>
                            <div class="product-preview__btns">
	                            <? if ($arParams['RCM_CARD_PROPS']['WTY']): ?>
                                    <div class="product-preview-info">
                                        <div data-shop-item-get="warranty" style="display: none;">
		                                    <?=$arModel['CARD_DATA']['MIN_PRICE_WTY'];?>
                                        </div>
                                        <div class="product-preview-icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/garant.svg" alt="">
                                        </div>
                                        <p><?= $arParams['RCM_CARD_PROPS']['WTY']; ?></p>
                                    </div>
	                            <? endif;?>
	                            <? if ($arParams['RCM_CARD_PROPS']['DEL']): ?>
                                    <div class="product-preview-info">
                                        <div class="product-preview-icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/car.svg" alt="">
                                        </div>
                                        <p><?= $arParams['RCM_CARD_PROPS']['DEL']; ?></p>
                                    </div>
	                            <? endif;?>
                                <?
                                if ($arParams['RCM_CARD_PROPS']['SHOW_PN']) {
                                    ?>
                                    <div class="product-preview__part">Партномер: <b><?= $arModel['CODE']; ?></b></div>
                                    <?
                                }
                                ?>
                                <div class="product-preview__buy">
                                    <?
                                    if ($arParams['DISCONTINUED']) {
                                        ?>
                                        <span class="btn btn_large btn_secondary">
                                        <span class="children">Подобрать аналог</span>
                                        <a href="#get_analog_form" class="cover popup-link" data-name="<?=$arModel['NAME'];?>"></a>
                                        </span>
                                        <?
                                    } else {
                                        ?>
                                        <span class="btn btn_large btn_mobile_small btn_secondary btn-icon btn-icon_reverse btn-icon_large <?=$buyBtnClass;?>" >
                                        <span class="children"><?=$arModel['HIDE_PRICE']?'Уточнить цену':'Купить в 1 клик';?></span>
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
                                if ($arModel['CONFIG_PATH']) {
                                    echo <<<MODEL
                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config">            
                                            <span class="children">Сконфигурировать</span>            
                                            <a href="$arModel[CONFIG_PATH]" class="cover "></a>
                                        </span>
                                    MODEL;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?

                    if (count($arResult['ITEMS']) < 4 && $key==array_key_last($arResult['ITEMS'])
                        || count($arResult['ITEMS']) > 4 && $key==3) {
                        ?>
                    <div data-entity="items-row">
                        <div class="preview-banner" data-entity="item">
                            <div class="preview-banner__list">
		                        <?if(!empty($bannerProps['TYPICAL_SOLUTIONS_NAME'])):?>
                                    <div class="preview-banner__item">
                                        <div class="preview-banner__title">
                                            <h3>Типовые решения на базе <?=$arParams['RCM_PROD_NAME']?>:</h3>
                                        </div>
                                        <div class="preview-banner__links">
					                        <? foreach ($bannerProps['TYPICAL_SOLUTIONS_NAME'] as $key => $value):?>
                                                <a href="<?= $bannerProps['TYPICAL_SOLUTIONS_LINK'][$key]?>"><?= $value?></a>
					                        <? endforeach;?>
                                        </div>
				                        <?if(!empty($bannerProps['SOLUTIONS_LINK'])):?>
                                            <a href="<?= $bannerProps['SOLUTIONS_LINK']?>" class="preview-banner__more"><span>Еще решения</span></a>
				                        <? endif;?>
                                    </div>
		                        <? endif;?>
		                        <?if(!empty($bannerProps['EXAMPLES_IMPLEMENTATION_NAME'])):?>
                                    <div class="preview-banner__item">
                                        <div class="preview-banner__title">
                                            <h3>Примеры внедрения:</h3>
                                        </div>
                                        <div class="preview-banner__links">
					                        <? foreach ($bannerProps['EXAMPLES_IMPLEMENTATION_NAME'] as $key => $value):?>
                                                <a href="<?= $bannerProps['EXAMPLES_IMPLEMENTATION_LINK'][$key]?>"><?= $value?></a>
					                        <? endforeach;?>
                                        </div>
				                        <?if(!empty($bannerProps['CASE_LINK'])):?>
                                            <a href="<?= $bannerProps['CASE_LINK']?>" class="preview-banner__more"><span>Еще кейсы</span></a>
				                        <? endif;?>
                                    </div>
		                        <? endif;?>
                            </div>
                            <div class="preview-banner__request">
		                        <?if(!empty($bannerProps['BTN_TITLE'])):?>
                                    <div class="preview-banner__subtitle"><?= $bannerProps['BTN_TITLE']?></div>
		                        <? endif;?>
                                <div class="preview-banner__btn">
			                        <span class="btn btn_large btn_secondary">
	                                    <span class="children">Оставить заявку</span>
	                                    <a href="#consultation" class="cover popup-link"></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
			    }
		    }
		    ?>
        <!-- items-container -->
    </div>
<div class="browsing">
    <?
    //region LazyLoad Button
    if ($showLazyLoad)
    {
        ?>
        <span class="btn btn_medium btn_outlined" data-entity="lazy-<?=$containerName?>" id="load-more" data-use="show-more-<?=$navParams['NavNum']?>">
            <span class="children" ><?=$arParams['MESS_BTN_LAZY_LOAD']?></span>
        </span>
        <?
    }
    //endregion
    //region Pagination
    if ($showBottomPager)
    {
        ?>
            <div class="pagination" data-pagination-num="<?=$navParams['NavNum']?>">
                <!-- pagination-container -->
                <?=$arResult['NAV_STRING']?>
                <!-- pagination-container -->
            </div>
        <?
    }
    //endregion
    $signer = new \Bitrix\Main\Security\Sign\Signer;
    $signedTemplate = $signer->sign($templateName, 'catalog.section');
    $signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
    ?>
</div>
    <script>
        BX.message({
            BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BASKET_URL: '<?=$arParams['BASKET_URL']?>',
            ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
            BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
            SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
        });
        var <?=$obName?> = new JCCatalogSectionComponent({
            siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
            componentPath: '<?=CUtil::JSEscape($componentPath)?>',
            navParams: <?=CUtil::PhpToJSObject($navParams)?>,
            deferredLoad: false,
            initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
            bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
            lazyLoad: !!'<?=$showLazyLoad?>',
            loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
            template: '<?=CUtil::JSEscape($signedTemplate)?>',
            ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
            parameters: '<?=CUtil::JSEscape($signedParams)?>',
            container: '<?=$containerName?>'
        });
    </script>
</div>
<? //end wrapper?>
<!-- component-end -->
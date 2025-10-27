<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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
$sorting = $_SESSION['sorting'][$APPLICATION->GetCurPage()] ?? 'popular';
global $arrFilter;
if (empty($_POST['sorting'])) $_SESSION['filter'][$APPLICATION->GetCurPage()] = $arrFilter;
//print_r($arrFilter)
?>
<?/*
<? $index = 1 ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <div class=" product-preview">
        <a href="#" class="product-preview__image">
            <picture>
                <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" type="image/webp">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="#">
            </picture>`
            <span>Склад</span>
        </a>
        <div class="product-preview__description">
            <div class="product-preview__info">
                <?php if ((int)$arItem['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] <= 0): ?>
                    <div class="product-preview__score">Цена по запросу </div>
                <?php else: ?>
                    <div class="product-preview__score">
                        от <?= $arItem['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></div>
                    <?php endif; ?>
                    <div class="product-preview__title">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <h4><?= $arItem["NAME"] ?></h4>
                        </a>
                        <ul>
                            <li><?= $arItem['DISPLAY_PROPERTIES']['form_factor']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['PROPERTIES']['number_proces']['VALUE'] ?>
                            х <?= $arItem['DISPLAY_PROPERTIES']['family_procs']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['DISPLAY_PROPERTIES']['RAM']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['DISPLAY_PROPERTIES']['max_disc']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['DISPLAY_PROPERTIES']['type_disc']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['DISPLAY_PROPERTIES']['max_disc']['DISPLAY_VALUE'] ?> <?= $arItem['DISPLAY_PROPERTIES']['power']['DISPLAY_VALUE'] ?></li>
                            <li><?= $arItem['PROPERTIES']['garanty']['VALUE'] ?>
                            <div class="tip">
                                <div class="tip__image">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                    alt="#">
                                </div>
                                <div class="tip__text">
                                    Подсказка текста
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-preview__btns">
                <span class="btn btn_large btn_mobile_small btn_secondary">
                    <span class="children">Купить в 1 клик</span>
                    <a href="#tender" class="cover popup-link "></a>
                </span>
                <?php if (!(int)$arItem['ITEM_PRICES'][0]['UNROUND_BASE_PRICE'] <= 0): ?>
                    <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config">
                        <span class="children">Сконфигурировать</span>
                        <a href="#" class="cover "></a>
                    </span>
                <? endif; ?>
            </div>
        </div>
    </div>
    <?php if ($index % 4 == 0): ?>
        <div class="products-banner-new">
            <div class="products-banner-new__list">
                <div class="products-banner-new__item">
                    <div class="products-banner__content">
                        <div class="products-banner__title">Обязательное
                            тестирование до отгрузки
                        </div>
                        <div class="products-banner__text">Надежная защита от
                            заводского брака
                        </div>
                    </div>
                </div>
                <div class="products-banner-new__item">
                    <div class="products-banner__content">
                        <div class="products-banner__title">Собственный склад
                            серверов и опций
                        </div>
                        <div class="products-banner__text">Замена по гарантии в
                            течение нескольких дней
                        </div>
                    </div>
                </div>
                <div class="products-banner-new__item">
                    <div class="products-banner__content">
                        <div class="products-banner__title">Новое и оригинальное
                            оборудование
                        </div>
                        <div class="products-banner__text">Как проверить
                            оригинальность и срок производства?
                        </div>
                    </div>
                </div>
            </div>
            <div class="products-banner-new__request">
                <div class="products-banner__subtitle">Нужна техническая
                    консультация по выбору сервера?
                </div>
                <div class="products-banner__btn">
                    <span class="btn btn_large btn_secondary">
                        <span class="children">Оставить заявку</span>
                        <a href="#consultation" class="cover popup-link"></a>
                    </span>
                </div>
            </div>
        </div>
    <? endif ?>
    <? $index++ ?>
<? endforeach; ?>
*/?>
<div class="products__preview">
    <?
    if ($arParams['HEAD_BANNER_HTML']) {
        $colorClass = $arParams['HEAD_BANNER_COLOR'] ?: '';
        ?>
        <div class="head-banner__container<?=$colorClass;?>">
            <?=htmlspecialchars_decode($arParams['HEAD_BANNER_HTML']);?>
        </div>
        <?
    }
    ?>
    <div class="products__sorting">
        <div class="sorting">
            <div class="sorting__description">
                <div class="sorting__value">Найдено:
                    <span><?= $arResult['NAV_RESULT']->NavRecordCount ?></span>
                </div>
                <div class="sorting__value">Минимальная цена:
                    <span><?= $arResult['min_price'] ?> </span>
                </div>
            </div>
            <form id="sortingForm" data-initialized="true">
                <div class="sorting__dropdown">
                    <div class="form-group dropdown">
                        <div class="dropdown__button">
                            <span class="dropdown__title" id="sortingTitle">
                                <?=match ($sorting){
	                                'down' => 'По убыванию цены'
                                ,'up' => 'По возрастанию цены'
                                , default => 'По популярности'
                                };
                                ?>
                            </span>
                            <div class="arrow"></div>
                            <input class="form-control" type="hidden" name="sorting"
                                   value="<?php echo $sorting ?? 'popular'; ?>">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <li class="dropdown__option <?php echo ($sorting == 'popular') ? '_selected' : ''; ?>"
                                    data-value="popular">
                                    По популярности
                                </li>
                                <li class="dropdown__option <?php echo ($sorting == 'up') ? '_selected' : ''; ?>"
                                    data-value="up">
                                    По возрастанию цены
                                </li>
                                <li class="dropdown__option <?php echo ($sorting == 'down') ? '_selected' : ''; ?>"
                                    data-value="down">
                                    По убыванию цены
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="products__list" data-entity="<?=$containerName?>">
        <!-- items-container -->
        <? if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])) {
            $generalParams = [
                'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
                'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
                'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
                'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
                'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
                'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
                'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
                'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
                'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
                'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
                'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
                'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
                'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
                'COMPARE_PATH' => $arParams['COMPARE_PATH'],
                'COMPARE_NAME' => $arParams['COMPARE_NAME'],
                'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
                'LABEL_POSITION_CLASS' => $labelPositionClass,
                'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
                'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
                'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
                '~BASKET_URL' => $arParams['~BASKET_URL'],
                '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
                '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
                '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
                '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
                'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
                'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
                'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
                'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
                'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
                'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
                'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
            ];
            $areaIds = [];
            $itemParameters = [];
            foreach ($arResult['ITEMS'] as $item) {
                $uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
                $areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
                $this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
                $this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);

                $itemParameters[$item['ID']] = [
                    'SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']],
                    'MESS_NOT_AVAILABLE' => ($arResult['MODULES']['catalog'] && $item['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE
                        ? $arParams['~MESS_NOT_AVAILABLE_SERVICE']
                        : $arParams['~MESS_NOT_AVAILABLE']
                    ),
                ];
            }
            $counter = 1;
            foreach ($arResult['ITEM_ROWS'] as $key => $rowData) {
                $rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
                foreach ($rowItems as $key => $item) {
                    if ($counter % 5 == 0) {
                        $counter++;
                        ?>
                            <div class="products-banner-new count-<?= count($arResult['ELEMENTS']); ?>" data-entity="items-row">
                                <?
                                $GLOBALS['arrFilterSectionForm'] = ['ID' => $arParams['BANNER_ID']];
                                $APPLICATION->IncludeComponent(
                                    "bitrix:news.list",
                                    "section_form",
                                    array(
                                        "ACTIVE_DATE_FORMAT" => "j F Y",
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "AJAX_MODE" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "CACHE_FILTER" => "N",
                                        "CACHE_GROUPS" => "Y",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_TYPE" => "A",
                                        "CHECK_DATES" => "Y",
                                        "DETAIL_URL" => "",
                                        "DISPLAY_BOTTOM_PAGER" => "Y",
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "Y",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                        "DISPLAY_TOP_PAGER" => "N",
                                        "FIELD_CODE" => array(
                                            0 => "",
                                            1 => "",
                                        ),
                                        "FILE_404" => "",
                                        "FILTER_NAME" => "arrFilterSectionForm",
                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                        "IBLOCK_ID" => "50",
                                        "IBLOCK_TYPE" => "Catalog",
                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                        "INCLUDE_SUBSECTIONS" => "Y",
                                        "MESSAGE_404" => "",
                                        "NEWS_COUNT" => "1",
                                        "PAGER_BASE_LINK_ENABLE" => "N",
                                        "PAGER_DESC_NUMBERING" => "N",
                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                        "PAGER_SHOW_ALL" => "N",
                                        "PAGER_SHOW_ALWAYS" => "N",
                                        "PAGER_TEMPLATE" => ".default",
                                        "PAGER_TITLE" => "Новости",
                                        "PARENT_SECTION" => "",
                                        "PARENT_SECTION_CODE" => "",
                                        "PREVIEW_TRUNCATE_LEN" => "",
                                        "PROPERTY_CODE" => array(
                                            0 => "BLOCKS",
                                            1 => "BUTTON",
                                            2 => "TRIGGER",
                                            3 => "",
                                        ),
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_LAST_MODIFIED" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_STATUS_404" => "Y",
                                        "SET_TITLE" => "N",
                                        "SHOW_404" => "Y",
                                        "SORT_BY1" => "ACTIVE_FROM",
                                        "SORT_BY2" => "SORT",
                                        "SORT_ORDER1" => "DESC",
                                        "SORT_ORDER2" => "ASC",
                                        "STRICT_SECTION_CHECK" => "N",
                                        "COMPONENT_TEMPLATE" => "section_form"
                                    )
                                );?>
                            </div>
                        <?
                    }
                    ?>
                        <div class="ecommerce-product" data-entity="items-row" data-id="<?php echo $item['ID']; ?>" data-brand="<?php echo $arResult['BRANDS'][$item['PROPERTIES']['MANUFACTURER']['VALUE']]?>">
                            <?
                            $APPLICATION->IncludeComponent(
                                'bitrix:catalog.item',
                                'product',
                                array(
                                    'RESULT' => array(
                                        'ITEM' => $item,
                                        'AREA_ID' => $areaIds[$item['ID']],
                                        'TYPE' => $rowData['TYPE'],
                                        'BIG_LABEL' => 'N',
                                        'BIG_DISCOUNT_PERCENT' => 'N',
                                        'BIG_BUTTONS' => 'N',
                                        'SCALABLE' => 'N'
                                    ),
                                    'PARAMS' => $generalParams + $itemParameters[$item['ID']],
                                ),
                                $component,
                                array('HIDE_ICONS' => 'Y')
                            );
                            ?>
                        </div>
                    <?
                    $counter++;
                }
            }
            unset($rowItems);
            unset($itemParameters);
            unset($areaIds);
            unset($generalParams);
        } ?>
        <!-- items-container -->
    </div>
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
    <script>
        $(function(){
            const node = $('#sortingForm')[0];
            const config = {
                subtree: true,
                attributes: true,
                attributeFilter: ['value'],
                attributeOldValue: false
            };
            const callback = (mutationList) => {
                //console.log();
                let formData = new FormData(node);

                $.ajax({
                    url: window.location.href,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#catalog_section').html(response);
                    },
                    error: function () {
                        console.log("Произошла ошибка при отправке запроса.");
                    }
                });
            };
            const observer = new MutationObserver(callback);
            observer.observe(node, config);
        });
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
</div><? //end wrapper?>
<!-- component-end -->
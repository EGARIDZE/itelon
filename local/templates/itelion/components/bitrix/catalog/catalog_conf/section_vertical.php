<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = $arParams['COMMON_ADD_TO_BASKET_ACTION'] ?? '';
}
else
{
	$basketAction = $arParams['SECTION_ADD_TO_BASKET_ACTION'] ?? '';
}

$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(
	$arParams['IBLOCK_ID'],
	$arResult['VARIABLES']['SECTION_ID']
);
$arResult['SEO'] = $ipropValues->getValues();

if($arResult['SEO']){
    $APPLICATION->SetTitle($arResult['SEO']['SECTION_META_TITLE']);
    $APPLICATION->SetPageProperty('title', $arResult['SEO']['SECTION_META_TITLE']);
//    $APPLICATION->SetPageProperty('keywords', $arResult['SEO']['keywords']);
    $APPLICATION->SetPageProperty('description', $arResult['SEO']['SECTION_META_DESCRIPTION']);
}
$sectionsList = CIBlockSection::GetNavChain(
	    $arParams['IBLOCK_ID']
        ,$arResult['VARIABLES']['SECTION_ID']
        , ['ID','CODE', 'NAME', 'DESCRIPTION']
        , true
);
$url = '/configurator/';
$lastSectionIndex = array_key_last($sectionsList);
foreach ($sectionsList as $i => $section){
	$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(
		$arParams['IBLOCK_ID'],
		$section['ID']
	);
    $seo = $ipropValues->getValues();
    //clog($seo);
	$url .= $section['CODE'] . '/';
	if ($i === $lastSectionIndex) $url = '';
    $APPLICATION->AddChainItem($seo['SECTION_PAGE_TITLE'], $url);
    if (empty($_REQUEST['PAGEN_1']) && count($sectionsList) < 3 && $section['ID']==$arResult['VARIABLES']['SECTION_ID']) {
        $arResult['DESCRIPTION'] = $section['DESCRIPTION'];
    }
}

//clog($arResult['VARIABLES']);
?>
<section class="section">
	<div class="container">
		<div class="section__wrapper">
            <div class="section__container">
                    <div class="page-preview">
                        <h1><?= $arResult['SEO']['SECTION_PAGE_TITLE'] ?></h1>
                        <?$APPLICATION->IncludeComponent(
	                        "bitrix:breadcrumb",
	                        "breadcrumb",
	                        Array(
		                        "PATH" => '',
		                        "SITE_ID" => "s1",
		                        "START_FROM" => "0",
	                        )
                        );?>
                    </div>
                    <?php
                    //region Catalog Section
                    $sectionListParams = array(
                            "GMI_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        //"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],  // закоменчено, чтобы показывать только корневой раздел
                        //"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"], // тоже самое
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                        "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                        "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                        "HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
                        "ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? ''),
                        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => 'Y',

                    );
                    if ($sectionListParams["COUNT_ELEMENTS"] === "Y")
                    {
                        $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";
                        if ($arParams["HIDE_NOT_AVAILABLE"] == "Y")
                        {
                            $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
                        }
                    }
                    $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "section_conf",
//                        'bootstrap_v4',
                        $sectionListParams,
                        $component,
                        array("HIDE_ICONS" => "Y")
                    );
                    unset($sectionListParams);
                    //endregion
//                    //region popular models
//                    $mainSection = explode('/', $arResult["VARIABLES"]["SECTION_CODE_PATH"])[0];
//                    $arPopModels = CDataHarvester::GetConfigPopModels($mainSection);
//                    //clog($APPLICATION->GetCurDir(),$arPopModels);
//                    if ($arPopModels) {
//	                    ?>
<!--                        <div class="navigation-config">-->
<!--		                    --><?//
//		                    foreach($arPopModels as $arPopModel){
//			                    if (!$arPopModel['list']) continue;
//                                ?>
<!--                                <div class="navigation-config__group">-->
<!--                                    <div class="navigation-config__title">-->
<!--                                        <h3>--><?php //=$arPopModel['title']?><!--</h3>-->
<!--                                        <a href=""></a>-->
<!--                                    </div>-->
<!--                                    <div class="navigation-config__list">-->
<!--                                        Активному пункту добавляется класс _active-->
<!--					                    --><?//
//					                    foreach($arPopModel['list'] as $title => $url){
//                                            $class = $APPLICATION->GetCurDir() == "/configurator/$url" ? ' _active' : '';
//						                    ?>
<!--                                            <a href="/configurator/--><?php //=$url;?><!--"-->
<!--                                               class="navigation-config__item--><?php //=$class;?><!--">--><?php //=$title;?>
<!--                                            </a>-->
<!--						                    --><?//
//					                    }
//					                    ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--			                    --><?//
//		                    }
//		                    ?>
<!--                        </div>-->
<!--	                    --><?//
//                    }
//                    //endregion?>
				</div>
			<div class="products">
				<div class="products__sidebar">
					<? $APPLICATION->IncludeComponent(
						"bitrix:search.form",
						"search_conf",
						array(
							"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
							"PAGE" => $arParams['SEF_FOLDER'],	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
							"COMPONENT_TEMPLATE" => ".default"
						),
						false
					); ?>
					<?
						$APPLICATION->IncludeComponent(
                                "bitrix:catalog.smart.filter"
                                , "conf"
                                , array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arCurSection['ID'],
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SAVE_IN_SESSION" => "N",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"XML_EXPORT" => "N",
							"SECTION_TITLE" => "NAME",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							"SEF_MODE" => $arParams["SEF_MODE"],
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                            "AJAX_OPTION_HISTORY" => "N",
						),
						$component,
						array('HIDE_ICONS' => 'Y')
						);
					?>
					<div class="marketing ">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/banner_warranty.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/banner_side-extSupport.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/banner_side-how choose server.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
					</div>
				</div>
				<div class="products__wrapper">
					<?
					global $arrFilter;
					if ($_REQUEST['q']) {
						$qSku = explode(' ', $_REQUEST['q']);
                        $qName = str_replace(" ", " && ", $_REQUEST['q']);
                        $arrFilter[] = array(
							"LOGIC" => "OR",
							array("XML_ID" => $qSku),
							array("?NAME" => $qName),
						);
					}
                    $order = match ($_COOKIE['sorting']) {
                        'down' => 'desc,nulls'
                        ,'up' => 'asc,nulls'
                        ,default => $arParams["ELEMENT_SORT_ORDER"]
                    };
					//region find banner Id
					$bannerId = '';
					if ($arResult['VARIABLES']['SECTION_ID']) {
						$res = CIBlockSection::GetList([],
							[
								'ID'=>$arResult['VARIABLES']['SECTION_ID']
								,'IBLOCK_ID' => 48
							]
							,false
							,[
								'IBLOCK_ID'
								,'UF_SECTION_FORM'
							]
						);
						if ($ob = $res->Fetch()) {
							$bannerId = $ob['UF_SECTION_FORM'];
						}
					} else if ($arResult['SET']) {
						$bannerId = $arResult['SET']['PROPERTY_SECTION_FORM_VALUE'];
					}

					//endregion
					$intSectionID = $APPLICATION->IncludeComponent(
						"bitrix:catalog.section",
						"conf", array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
							"ELEMENT_SORT_ORDER" => $order,
							"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
							"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
							"PROPERTY_CODE" => ($arParams["LIST_PROPERTY_CODE"] ?? []),
							"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
							"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
							"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
							"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
							"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
							"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
							"BASKET_URL" => $arParams["BASKET_URL"],
							"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
							"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
							"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
							"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
							"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_FILTER" => $arParams["CACHE_FILTER"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SET_TITLE" => $arParams["SET_TITLE"],
							"MESSAGE_404" => $arParams["~MESSAGE_404"],
							"SET_STATUS_404" => $arParams["SET_STATUS_404"],
							"SHOW_404" => $arParams["SHOW_404"],
							"FILE_404" => $arParams["FILE_404"],
							"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
							"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
							"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
							"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

							"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
							"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
							"ADD_PROPERTIES_TO_BASKET" => ($arParams["ADD_PROPERTIES_TO_BASKET"] ?? ''),
							"PARTIAL_PRODUCT_PROPERTIES" => ($arParams["PARTIAL_PRODUCT_PROPERTIES"] ?? ''),
							"PRODUCT_PROPERTIES" => ($arParams["PRODUCT_PROPERTIES"] ?? []),

							"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
							"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
							"PAGER_TITLE" => $arParams["PAGER_TITLE"],
							"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
							"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
							"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
							"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
							"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
							"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
							"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"LAZY_LOAD" => $arParams["LAZY_LOAD"],
							"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
							"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

							"OFFERS_CART_PROPERTIES" => ($arParams["OFFERS_CART_PROPERTIES"] ?? []),
							"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
							"OFFERS_PROPERTY_CODE" => ($arParams["LIST_OFFERS_PROPERTY_CODE"] ?? []),
							"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
							"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
							"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
							"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
							"OFFERS_LIMIT" => ($arParams["LIST_OFFERS_LIMIT"] ?? 0),

							"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
							"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
							"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
							"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
							"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

							'LABEL_PROP' => $arParams['LABEL_PROP'],
							'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
							'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
							'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'] ?? '',
							'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
							'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
							'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
							'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
							'ENLARGE_PROP' => $arParams['LIST_ENLARGE_PROP'] ?? '',
							'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
							'SLIDER_INTERVAL' => $arParams['LIST_SLIDER_INTERVAL'] ?? '',
							'SLIDER_PROGRESS' => $arParams['LIST_SLIDER_PROGRESS'] ?? '',

							'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
							'OFFER_TREE_PROPS' => ($arParams['OFFER_TREE_PROPS'] ?? []),
							'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
							'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
							'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
							'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
							'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
							'MESS_SHOW_MAX_QUANTITY' => ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? ''),
							'RELATIVE_QUANTITY_FACTOR' => ($arParams['RELATIVE_QUANTITY_FACTOR'] ?? ''),
							'MESS_RELATIVE_QUANTITY_MANY' => ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? ''),
							'MESS_RELATIVE_QUANTITY_FEW' => ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? ''),
							'MESS_BTN_BUY' => ($arParams['~MESS_BTN_BUY'] ?? ''),
							'MESS_BTN_ADD_TO_BASKET' => ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? ''),
							'MESS_BTN_SUBSCRIBE' => ($arParams['~MESS_BTN_SUBSCRIBE'] ?? ''),
							'MESS_BTN_DETAIL' => ($arParams['~MESS_BTN_DETAIL'] ?? ''),
							'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE'] ?? '',
							'MESS_NOT_AVAILABLE_SERVICE' => $arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '',
							'MESS_BTN_COMPARE' => ($arParams['~MESS_BTN_COMPARE'] ?? ''),

							'USE_ENHANCED_ECOMMERCE' => ($arParams['USE_ENHANCED_ECOMMERCE'] ?? ''),
							'DATA_LAYER_NAME' => ($arParams['DATA_LAYER_NAME'] ?? ''),
							'BRAND_PROPERTY' => ($arParams['BRAND_PROPERTY'] ?? ''),

							'TEMPLATE_THEME' => ($arParams['TEMPLATE_THEME'] ?? ''),
							"ADD_SECTIONS_CHAIN" => "N",
							'ADD_TO_BASKET_ACTION' => $basketAction,
							'SHOW_CLOSE_POPUP' => $arParams['COMMON_SHOW_CLOSE_POPUP'] ?? '',
							'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
							'COMPARE_NAME' => $arParams['COMPARE_NAME'],
							'USE_COMPARE_LIST' => 'Y',
							'BACKGROUND_IMAGE' => ($arParams['SECTION_BACKGROUND_IMAGE'] ?? ''),
							'COMPATIBLE_MODE' => ($arParams['COMPATIBLE_MODE'] ?? ''),
							'DISABLE_INIT_JS_IN_COMPONENT' => ($arParams['DISABLE_INIT_JS_IN_COMPONENT'] ?? ''),
                            'BANNER_ID' => $bannerId,
						),
					$component
					);
					?>
				</div>
			</div>
            <div class="section__container">
                <?=$arResult['DESCRIPTION'];?>
            </div>
		</div>
	</div>
</section>

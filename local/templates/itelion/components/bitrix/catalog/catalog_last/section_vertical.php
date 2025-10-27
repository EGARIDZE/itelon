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

if($arResult['SEO']){
    $APPLICATION->SetTitle($arResult['SEO']['title']);
    $APPLICATION->SetPageProperty('title', $arResult['SEO']['title']);
    $APPLICATION->SetPageProperty('keywords', $arResult['SEO']['keywords']);
    $APPLICATION->SetPageProperty('description', $arResult['SEO']['description']);
}
$page = $APPLICATION->GetCurPage();
$bIsCategory = explode('/',$page)[1] == 'category';
?>
<section class="section">
	<div class="container">
		<div class="section__wrapper">
			<?

            $arr = explode('/', $page);
            if($arr[2] == 'oborudovanie-rossiyskoe'){?>
            	<div class="section__column">
            		<div class="banner">
            			<div class="page-preview">
            				<?
							//region Catalog Section
							$sectionListParams = array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
								"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
								"CACHE_TYPE" => $arParams["CACHE_TYPE"],
								"CACHE_TIME" => $arParams["CACHE_TIME"],
								"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
								"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
								"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
								"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
								"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
								"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
								"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
								"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
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
								"catalog_section",
								$sectionListParams,
								$component,
								array("HIDE_ICONS" => "Y")
							);
							unset($sectionListParams);
							//endregion
							?>
            				<?$APPLICATION->IncludeComponent(
								"bitrix:breadcrumb",
								"breadcrumb",
								Array(
									"PATH" => "",
									"SITE_ID" => "s1",
									"START_FROM" => "0",
		                            "CATEGORY_NAME" =>  $arResult['SET']['NAME'] ?? ''
								)
							);?>
            			</div>
            			<div class="banner__image">
            				<picture>
            					<source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/equipment-banner.webp" type="image/webp">
        						<img src="<?= SITE_TEMPLATE_PATH ?>/files/images/equipment-banner.webp" alt="#">
        					</picture>
        				</div>
        			</div>
        			<div class="equipment-preview">
        				<h2>
        					ITELON — официальный партнер Российских производителей ИТ-оборудования и ПО из реестра МинПромТорга и РЭП
        				</h2>
        				<div class="equipment-preview__text">
        					<p>Мы работаем напрямую с ведущими отечественными производителями, чтобы предложить вам самые передовые продукты и программное обеспечение, соответствующие актуальным стандартам качества и безопасности.</p>
        					<p>Мы гарантируем надежность, качество и профессионализм в каждом аспекте нашей работы, помогая государственным учреждениям реализовать самые важные и значимые проекты точно в срок.</p>
        				</div>
        			</div>
        		</div>
				<div class="navigation">
					<!-- Активному пункту добавляется класс _active-->
                    <? foreach ($arResult['SETS_TOP'] as $item):?>
                        <a href="/category/<?= $item['CODE']?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
                    <? endforeach;?>
				</div>
            <? } else { ?>
				<div class="section__container">
					<div class="page-preview">
	                    <?
	                        if($bIsCategory){?>
	                            <h1><?= !empty($arResult['SEO']['elementTitle']) ? $arResult['SEO']['elementTitle'] : $arResult['SET']['NAME']?></h1>
	                        <?}
	                    ?>
						<?
						//region Catalog Section
						$sectionListParams = array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
							"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
							"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
							"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
							"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
							"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
							"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
							"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
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
							"catalog_section",
							$sectionListParams,
							$component,
							array("HIDE_ICONS" => "Y")
						);
						unset($sectionListParams);
						//endregion
						?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:breadcrumb",
							"breadcrumb",
							Array(
								"PATH" => "",
								"SITE_ID" => "s1",
								"START_FROM" => "0",
	                            "CATEGORY_NAME" =>  $arResult['SET']['NAME'] ?? ''
							)
						);?>
					</div>
					<div class="navigation">
						<!-- Активному пункту добавляется класс _active-->
	                    <? foreach ($arResult['SETS_TOP'] as $item):?>
	                        <a target="_self" href="/category/<?= $item['CODE']?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
	                    <? endforeach;?>
					</div>
				</div>
			<? } ?>
			<div class="products">
				<div class="products__sidebar">
                    <?
                    if ($bIsCategory) {
                        global $smartPreFilter;
                        $smartPreFilter = ['ID' => $arResult['ID_LIST']];
                    }
                    ?>
					<?
						$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter",
                           "bootstrap_v4",
                            array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arResult['VARIABLES']['SECTION_ID'],
                            //'PREFILTER_NAME' => 'smartPreFilter',
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SAVE_IN_SESSION" => "Y",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"XML_EXPORT" => "N",
							"SECTION_TITLE" => "NAME",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							"SEF_MODE" => 'N',
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                            "AJAX_MODE" => "Y",
                            "INSTANT_RELOAD" => "Y",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_HISTORY" => "N",
//                            "SHOW_ALL_WO_SECTION" =>  $arr[1] == 'category' ? "Y" : "N"
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

				<div class="products__wrapper" id="catalog_section">
					<?
                    //region find banner Id
                    $bannerId = '';
                    if ($arResult['VARIABLES']['SECTION_ID']) {
	                    $res = CIBlockSection::GetList([],
		                    [
			                    'ID'=>$arResult['VARIABLES']['SECTION_ID']
			                    ,'IBLOCK_ID' => 14
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
                    //region sort

					if (!empty($_POST['sorting'])) {
//                        if (!empty($_POST['filter']))
                        $GLOBALS['arrFilter'] = $_SESSION['filter'][$page]; //json_decode($_POST['filter'], true);
						$_SESSION['sorting'][$page] = $_POST['sorting'];
						$APPLICATION->RestartBuffer();
					}
					//clog($page);
					if ($bIsCategory) {
						$arSortParams = match ($_SESSION['sorting'][$page]) {
							'down' => [
								'PRICE_1' => 'desc,nulls',
							]
                            ,'up' => [
                                'PRICE_1' => 'asc,nulls',
                            ]
                            ,default => [
                                'PROPERTY__HAS_PRICE' => 'desc,nulls',
                                'ID' => $arResult['ID_LIST']
                            ]
						};
                    } else {
						$arSortParams = match ($_SESSION['sorting'][$page]) {
							'down' => [
								'PRICE_1' => 'desc,nulls',
								'QUANTITY' => 'desc',
								'SORT' => 'asc'
							]
                            ,'up' => [
                                'PRICE_1' => 'asc,nulls',
                                'QUANTITY' => 'desc',
                                'SORT' => 'asc'
                            ]
                            ,default => [
                                'PROPERTY__HAS_PRICE' => 'desc,nulls',
								'PROPERTY_DISCONTINUED' => 'nulls,asc',
								'QUANTITY' => 'desc',
                                'SORT' => 'asc'
                            ]
						};
                    }

                    //clog($arParams["FILTER_NAME"]);
					//endregion
                    //clog($arResult['SET']);
					$intSectionID = $APPLICATION->IncludeComponent(
						"bitrix:catalog.section",
						"bootstrap_v4", array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            'CUSTOM_ELEMENT_SORT' => $arSortParams,
//							"ELEMENT_SORT_FIELD" => $arSortParams['field1'],
//							"ELEMENT_SORT_ORDER" => $arSortParams['order1'],
//							"ELEMENT_SORT_FIELD2" => $arSortParams['field2'],
//							"ELEMENT_SORT_ORDER2" => $arSortParams['order2'],
							"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
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
							"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
							"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
							"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

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

							"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
							"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
							"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
							"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
							"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
							"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
							"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
							"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

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
							'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
							'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
							'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
							'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

							'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
							'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
							'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
							'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
							'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
							'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
							'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
							'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
							'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
							'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
							'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
							'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
							'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
							'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
							'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
							'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE'] ?? '',
							'MESS_NOT_AVAILABLE_SERVICE' => $arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '',
							'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

							'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
							'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
							'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

							'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
							"ADD_SECTIONS_CHAIN" => "N",
							'ADD_TO_BASKET_ACTION' => $basketAction,
							'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
							'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
							'COMPARE_NAME' => $arParams['COMPARE_NAME'],
							'USE_COMPARE_LIST' => 'Y',
							'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
							'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
							'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
                            'BANNER_ID' => $bannerId,
                            'HEAD_BANNER_HTML' => $arResult['SET'] ? $arResult['SET']['PROPERTY_BANNER_HTML_VALUE']['TEXT'] : '',
                            'HEAD_BANNER_COLOR' => $arResult['SET'] ? $arResult['SET']['PROPERTY_BANNER_COLOR_VALUE'] : '',
						),
					$component
					);
                    if (!empty($_POST['sorting'])) die();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="navigation">
		<!-- Активному пункту добавляется класс _active-->
        <? foreach ($arResult['SETS_BOTTOM'] as $item):?>
            <a href="/category/<?= $item['CODE']?>/" class="navigation__item btn btn_medium btn_outlined"><?= $item['NAME']?></a>
        <? endforeach;?>
	</div>
</div>
<? if ($arr[1] == 'catalog') { ?>
	<? if ($arResult['VARIABLES']['SECTION_ID']) { ?>
		<?
		$getSection = CIBlockSection::GetList(
			false,
			[
				'IBLOCK_ID' => 14,
				'ID' => $arResult['VARIABLES']['SECTION_ID'],
			],
			false,
			[
				'DESCRIPTION',
				'UF_SEO_TITLE'
			],
			false
		)->Fetch();
		?>
		<? if ($getSection['UF_SEO_TITLE']) { ?>
			<section class="section">
				<div class="container">
					<div class="seo-text">
						<?= $getSection['UF_SEO_TITLE']; ?>
						<div class="seo-text__description"><?= $getSection['DESCRIPTION']; ?></div>
					</div>
				</div>
			</section>
		<? } ?>
	<? } ?>
<? } else if ($arr[1] == 'category') { ?>
	<? if ($arResult['SET']['PROPERTY_SEO_TITLE_VALUE']['TEXT']) { ?>
		<section class="section">
			<div class="container">
				<div class="seo-text">
					<?= $arResult['SET']['PROPERTY_SEO_TITLE_VALUE']['TEXT']; ?>
					<div class="seo-text__description"><?= $arResult['SET']['PROPERTY_SEO_SUBTITLE_VALUE']['TEXT']; ?></div>
				</div>
			</div>
		</section>
	<? } ?>
<? } ?>

<?

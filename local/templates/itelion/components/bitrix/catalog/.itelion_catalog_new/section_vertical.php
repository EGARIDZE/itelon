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
if (isset($_GET['sorting']) && !empty($_GET['sorting'])){
    $sort  = $_GET['sorting'];
    switch ($sort){
        case 'up':
            $arParams["ELEMENT_SORT_FIELD"] = 'SCALED_PRICE_1';
            $arParams["ELEMENT_SORT_ORDER"] = 'asc,nulls';
            break;
        case 'down':
            $arParams["ELEMENT_SORT_FIELD"] = 'SCALED_PRICE_1';
            $arParams["ELEMENT_SORT_ORDER"] = 'desc,nulls';
            break;
        case 'popular':
            $arParams["ELEMENT_SORT_FIELD"] = 'propertysort_SALELEADER';
            $arParams["ELEMENT_SORT_ORDER"] = 'desc,nulls';
            break;

    }
}
?>
<div style="display: none;">
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
		"bootstrap_v4",
		$sectionListParams,
		$component,
		array("HIDE_ICONS" => "Y")
	);
	unset($sectionListParams);
	//endregion
	?>
</div>
<section class="section">
    <div class="container">
        <div class="section__wrapper">
			<div class="section__container">
				<div class="page-preview">
					<h1>Серверы (Сеты пока находятся в catalog.section)</h1>
					<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"breadcrumb",
						Array(
							"PATH" => "",
							"SITE_ID" => "s1",
							"START_FROM" => "0"
						)
					);?>
					<div class="navigation">
						<? foreach ($arResult['SETS'] as $key => $set) { ?>
							<a class="navigation__item btn btn_medium btn_outlined" href="<?= $_GET['set'] == $set ? $APPLICATION->GetCurPageParam('', ['set']) : $APPLICATION->GetCurPageParam('set=' . $set, ['set']); ?>"><?= $set; ?></a>
						<? } ?>
					</div>
			    </div>
			</div>
            <div class="products">
                <div class="products__sidebar">
					<? $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "bootstrap_v4", array(
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
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
					<div class="marketing ">
						<a href="#" target="_blank" class="marketing__item">
							<div class="marketing__info">
								<h3>Помощь в выборе сервера под Ваши задачи и требования</h3>
								<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="#">
							</div>
							<div class="marketing__image">
								<picture>
									<source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-1.webp"
										type="image/webp">
										<img src="<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-1.webp" alt="#">
									</picture>
								</div>
							</a>
							<a href="#" target="_blank" class="marketing__item marketing__item_bg"
							style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-2.webp');">
							<div class="marketing__info">
								<h3>Калькулятор RAID</h3>
								<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="#">
							</div>
						</a>
					</div>
				</div>
                <div class="products__wrapper">
					<?
					$GLOBALS['arrFilter'] = ['PROPERTY_SET' => $_GET['set']];
					$intSectionID = $APPLICATION->IncludeComponent(
						"bitrix:catalog.section",
						"bootstrap_v4", array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
							"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
							"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
							"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
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
							'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
						),
					$component
					);
					?>
            	</div>
            </div>
        </div>
    </div>
</section>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"set1", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
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
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "Set",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
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
			0 => "",
			1 => "PROPERTY_SET",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "set1"
	),
	false
);
?>
<section class="section">
	<div class="container">
		<div class="seo-text">
			<h2>Серверное оборудование <br>
			и корпоративные IT-решения для бизнеса</h2>
			<div class="seo-text__description">
				<p>
					Профессиональная команда системного интегратора ITELON всегда готова внедрить IT решения для вашего бизнеса:
				</p>
				<ul>
					<li>
					комплексные решения. Cотрудничаем с крупнейшими вендорами и оказываем услуги системной интеграции под ключ: проектирование, внедрение облачных технологий, построение корпоративной IT-инфраструктуры и инженерных систем, разработку узкоспециализированных коробочных решений. Наши инженеры глубоко вникают в задачу и несут ответственность за результат; </li>
					<li>
					большой портфель готовых решений. Ознакомьтесь с примерами наших проектов – за 19 лет мы реализовали более 1000 проектных решений для финансовых и государственных учреждений, IT и телекома, промышленности и ритейла, медицины и науки. Сформулируйте задачу, и инженеры ITELON предложат быстрый, рациональный и эффективный путь ее решения; </li>
					<li>
					гарантии безопасности. Защищаем конфиденциальную информацию клиентов от третьих лиц. Заботимся о безопасности корпоративных данных; </li>
					<li>
					индивидуальный подход. Принимайте решения, которые выгодны или удобны вам. Покупайте оборудование или заказывайте конкретную услугу. </li>
				</ul>
			</div>
		</div>
	</div>
</section>
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


if ($isSidebar)
{
	$contentBlockClass = ($isSidebarLeft ? "col-md-9 col-sm-8 order-1 order-sm-2" : "col-md-9 col-sm-8 order-1");
}
else
{
	$contentBlockClass = "col";
}

?>


<section class="section">
	<div class="container">
		<div class="section__wrapper">
			<div class="section__container">
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
							"START_FROM" => "0"
						)
					);?>
				</div>
				<div class="navigation">
					<!-- Активному пункту добавляется класс _active-->
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы HP</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы Dell</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы Lenovo</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Стоечные серверы</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Tower серверы</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы 1U</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы 2U</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы 4U</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы с 1 CPU</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы с 2 CPU</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы с 4 CPU</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы на AMD EPYC</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы на Intel Xeon</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Производительные серверы</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы начального уровня</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы российского производства</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервера для 1С</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">BackUp сервер</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Веб-сервер</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Почтовый сервер</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервера базы данных</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер видеонаблюдения</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Терминальный сервер</a>
					<a href="#" class="navigation__item btn btn_medium btn_outlined">Файловый сервер</a>
				</div>
			</div>
			<div class="products">
				<?
				/*$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "bootstrap_v4", array(
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
				);*/
				?>
				<div class="products__sidebar">
					<div class="filter">
						<form>
							<div class="filter__wrapper">
								<div class="filter__header"><h3>Фильтр</h3></div>
								<div class="filter__main">
									<div class="filter__header_mobile">
										<h3>Фильтр</h3>
										<div class="filter__close">
											<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0.5 8C0.5 3.85786 3.85786 0.5 8 0.5H36C40.1421 0.5 43.5 3.85786 43.5 8V36C43.5 40.1421 40.1421 43.5 36 43.5H8C3.85786 43.5 0.5 40.1421 0.5 36V8Z" stroke="#CFD4D8"/>
												<rect x="16.8486" y="16" width="16" height="1.2" rx="0.6" transform="rotate(45 16.8486 16)" fill="#58616A"/>
												<rect x="16" y="27.3125" width="16" height="1.2" rx="0.6" transform="rotate(-45 16 27.3125)" fill="#58616A"/>
											</svg>
										</div>
									</div>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:catalog.smart.filter",
                                        ".default",
                                        array(
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "IBLOCK_TYPE" => "Catalog",
                                            "IBLOCK_ID" => "14",
                                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                            "SECTION_CODE" => "",
                                            "PREFILTER_NAME" => "smartPreFilter",
                                            "FILTER_NAME" => "arrFilter",
                                            "HIDE_NOT_AVAILABLE" => "N",
                                            "TEMPLATE_THEME" => "blue",
                                            "FILTER_VIEW_MODE" => "vertical",
                                            "POPUP_POSITION" => "left",
                                            "DISPLAY_ELEMENT_COUNT" => "Y",
                                            "SEF_MODE" => "N",
                                            "CACHE_TYPE" => "A",
                                            "CACHE_TIME" => "36000000",
                                            "CACHE_GROUPS" => "Y",
                                            "SAVE_IN_SESSION" => "N",
                                            "PAGER_PARAMS_NAME" => "arrPager",
                                            "PRICE_CODE" => array(
                                            ),
                                            "CONVERT_CURRENCY" => "N",
                                            "XML_EXPORT" => "N",
                                            "SECTION_TITLE" => "-",
                                            "SECTION_DESCRIPTION" => "-",
                                            "AJAX_MODE" => "Y",
                                            "INSTANT_RELOAD" => "Y"
                                        ),
                                        false
                                    );?>
									<div class="filter__list">
										<div class="filter__item">
											<div class="filter__title _open"><h4>Производитель</h4></div>
											<div class="filter__body _open">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Hewlett Packard</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Dell</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Lenovo</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Acer</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>AIC</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>ASUS</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Cisco</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Nerpa</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Lenovo</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Acer</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>AIC</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Lenovo</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Acer</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>AIC</span>
													</div>
												</div>
												<div class="filter__more">+ Показать еще</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Наличие</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>В наличии</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Под заказ</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Формфактор</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>3U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>4U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>12U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Mid Tower</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Mini Tower</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>Tower</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Модель</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Тип процессора</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Кол-во процессоров</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Оперативная память</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
												</div>
											</div>
										</div>
										<div class="filter__item">
											<div class="filter__title"><h4>Max кол-во дисков</h4></div>
											<div class="filter__body">
												<div class="filter__inputs">
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>1U</span>
													</div>
													<div class="filter-checkbox">
														<input    value="" data-type="checkbox" type="checkbox" >
														<span>2U</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="filter__btns">
										<!--Для блокировки добавить класс _disabled-->
										<button class="btn btn_large btn_secondary"   type="submit">
											<span class="children">Показать</span>
										</button>
										<!--Для блокировки добавить класс _disabled-->
										<button class="btn btn_large btn_outlined"   type="reset">
											<span class="children">Сбросить</span>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="marketing ">
						<a href="#" target="_blank" class="marketing__item">
							<div class="marketing__info">
								<h3>Помощь в выборе сервера под Ваши задачи и требования</h3>
								<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="#">
							</div>
							<div class="marketing__image">
								<picture>
									<source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-1.webp" type="image/webp">
									<img src="<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-1.webp" alt="#">
								</picture>
							</div>
						</a>
						<a href="#" target="_blank" class="marketing__item marketing__item_bg" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/marketing-2.webp');">
							<div class="marketing__info">
								<h3>Калькулятор RAID</h3>
								<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="#">
							</div>
						</a>
					</div>
				</div>
                        <?
                            $page = $APPLICATION->GetCurPage();
                            $arr = explode('/', $page);
                            if($arr[1] == 'category'){
                                $GLOBALS['arrFilter']['=ID'] = 112;
                            }
                        ?>
						<?
                        $intSectionID = $APPLICATION->IncludeComponent(
							"bitrix:catalog.section",
							"bootstrap_v4", array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
								"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
								"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
								"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
								"PROPERTY_CODE" => [
                                    'MANUFACTURER',
                                    'TYPE_EQUIPMENT',
                                    'TECHNICAL_FEATURES',
                                    'TASKS',
                                    'FORM_FACTOR',
                                    'PROCESSOR_FAMILY',
                                    'PROCESSOR_SERIES',
                                    'NUMBER_PROCESSOR',
                                    'GENERATION',
                                    'GUARANTEE_REDUCTION',
                                    'GUARANTEE'
                                ],
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
								"PAGE_ELEMENT_COUNT" =>  $arParams["PAGE_ELEMENT_COUNT"],
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
</section>
<div class="container">
	<div class="navigation">
		<!-- Активному пункту добавляется класс _active-->
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для облачных вычислений</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер контроллер домена</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер корпоративной сети</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер печати</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер СУБД MS SQL</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер хранилища данных</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Универсальный сервер</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для школы</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для дата-центра (ЦОД)</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для офиса</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для интернет-магазина</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для больницы</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для гостиницы</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для хостинга</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для музея</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для поликлиники</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для института</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для организации</a>
		<a href="#" class="navigation__item btn btn_medium btn_outlined">Сервер для бизнеса</a>
	</div>
</div>
<section class="section">
	<div class="container">
		<div class="seo-text">
			<h2>Серверное оборудование <br>и корпоративные IT-решения для бизнеса</h2>
			<div class="seo-text__description">
				<p>
					Профессиональная команда системного интегратора ITELON всегда готова внедрить IT решения для вашего бизнеса:
				</p>
				<ul>
					<li>
						комплексные решения. Cотрудничаем с крупнейшими вендорами и оказываем услуги системной интеграции под ключ: проектирование, внедрение облачных технологий, построение корпоративной IT-инфраструктуры и инженерных систем, разработку узкоспециализированных коробочных решений. Наши инженеры глубоко вникают в задачу и несут ответственность за результат;
					</li>
					<li>
						большой портфель готовых решений. Ознакомьтесь с примерами наших проектов – за 19 лет мы реализовали более 1000 проектных решений для финансовых и государственных учреждений, IT и телекома, промышленности и ритейла, медицины и науки. Сформулируйте задачу, и инженеры ITELON предложат быстрый, рациональный и эффективный путь ее решения;
					</li>
					<li>
						гарантии безопасности. Защищаем конфиденциальную информацию клиентов от третьих лиц. Заботимся о безопасности корпоративных данных;
					</li>
					<li>
						индивидуальный подход. Принимайте решения, которые выгодны или удобны вам. Покупайте оборудование или заказывайте конкретную услугу.
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
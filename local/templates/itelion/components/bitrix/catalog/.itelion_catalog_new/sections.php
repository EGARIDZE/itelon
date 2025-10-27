<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

?>
<section class="section">
	<div class="container">
		<div class="section__wrapper">
			<div class="section__container">
				<div class="page-preview">
					<h1>Каталог</h1>
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
					<!-- Активному пункту добавляется класс _active--> <a href="#" class="navigation__item btn btn_medium btn_outlined">ИТ оборудование российского производства</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Серверы</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Серверные платформы</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Системы хранения данных (СХД)</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">ИБП</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Сетевое оборудование</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Персональные компьютеры</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Программное обеспечение</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Все производители</a>
				</div>
			</div>
			<div class="subcategories-links">
				<a href="/konfigurator-serverov/" class="btn btn_primary btn-icon btn-icon_large btn-icon_primary btn-icon_primary_arrow">Конфигуратор серверов</a> <a href="#" class="btn btn_primary btn-icon btn-icon_large btn-icon_primary btn-icon_primary_arrow">Быстрый подбор сервера</a> <a href="#" class="btn btn_primary btn-icon btn-icon_large btn-icon_primary btn-icon_primary_arrow">Конфигуратор СХД</a> <a href="#" class="btn btn_primary btn-icon btn-icon_large btn-icon_primary btn-icon_primary_arrow">Быстрый подбор СХД</a>
			</div>
			<?/*$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"section_catalog",
				Array(
					"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
					"ADD_SECTIONS_CHAIN" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPONENT_TEMPLATE" => "section_catalog",
					"COUNT_ELEMENTS" => "Y",
					"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
					"FILTER_NAME" => "sectionsFilter",
					"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "Catalog",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array(0=>"",1=>"",),
					"SECTION_ID" => "",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
					"SHOW_PARENT_NAME" => "Y",
					"TOP_DEPTH" => "1",
					"VIEW_MODE" => "LINE"
				)
			);*/?>

			<?php
			$sectionListParams = array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
				"ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? '')
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
				"section_catalog",
				$sectionListParams,
				$component,
				($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? array("HIDE_ICONS" => "Y") : array())
			);
			unset($sectionListParams);
			?>
		</div>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="catalog-brands">
			<h2>Производители</h2>
			<div class="navigation">
				<!-- Активному пункту добавляется класс _active--> <a href="#" class="navigation__item btn btn_medium btn_outlined">Импортное оборудование</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Импортозамещение</a> <a href="#" class="navigation__item btn btn_medium btn_outlined">Российское программное обеспечение</a>
			</div>
			<div class="catalog-brands__logos">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"manufact",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "Y",
						"AJAX_MODE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"COMPONENT_TEMPLATE" => "manufact",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array(0=>"",1=>"",),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "1",
						"IBLOCK_TYPE" => "Catalog",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"INCLUDE_SUBSECTIONS" => "Y",
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
						"PROPERTY_CODE" => array(0=>"manufacturer",1=>"",),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "Y",
						"SHOW_404" => "N",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>
			</div>
		</div>
	</div>
</section>
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
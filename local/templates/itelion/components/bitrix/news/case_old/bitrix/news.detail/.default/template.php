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
?>



    <section class="section">
        <div class="container">
            <div class="section__column">
                <div class="case-banner">
                    <div class="case-banner__bg" style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/case-banner.webp');"></div>
                    <div class="case-banner__content">
                        <h1><?=$arResult['PROPERTIES']['DESCRIPTION']['VALUE'][0]['TEXT']?></h1>
                        <div class="case-banner__preview">
                            <p>
                                <?=$arResult['PROPERTIES']['DESCRIPTION']['VALUE'][1]['TEXT']?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="properties">
                    <div class="properties__item">
                        <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][0]?></h3>
                        <span><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][1]?></span>
                    </div>
                    <div class="properties__item">
                        <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][2]?></h3>
                        <span><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][3]?></span>
                    </div>
                    <div class="properties__item">
                        <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][4]?></h3>
                        <span><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][5]?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <? if ($arResult['PROPERTIES']['PROBLEMS']['VALUE']) { ?>
        <section class="section">
            <div class="container">
                <div class="case-description">
                    <div class="case-description__title">
                        <h2><?=$arResult['PROPERTIES']['PROBLEMS']['NAME']?></h2>
                    </div>
                        <div class="case-description__content">
                            <?= htmlspecialchars_decode($arResult['PROPERTIES']['PROBLEMS']['VALUE']['TEXT']) ?>
                        </div>
                </div>
            </div>
        </section>
    <? } ?>

    <section class="section">
        <div class="container">
            <div class="case-description">
                <div class="case-description__title">
                    <h2> <?=$arResult['PROPERTIES']['TASKS']['NAME']?></h2>
                </div>
                <div class="case-description__content">
                    <h3><?=$arResult['PROPERTIES']['TASKS']['VALUE'][0]['TEXT']?></h3>
                    <ul>
                        <li><?=$arResult['PROPERTIES']['TASKS']['VALUE'][1]['TEXT']?></li>
                        <li><?=$arResult['PROPERTIES']['TASKS']['VALUE'][2]['TEXT']?></li>
                        <li><?=$arResult['PROPERTIES']['TASKS']['VALUE'][3]['TEXT']?></li>
                        <li><?=$arResult['PROPERTIES']['TASKS']['VALUE'][4]['TEXT']?>.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="case-description">
                <div class="case-description__title">
                    <h2><?=$arResult['PROPERTIES']['DECISION']['NAME']?></h2>
                </div>
                <div class="case-description__content">
                    <h3><?=$arResult['PROPERTIES']['DECISION']['VALUE'][0]['TEXT']?></h3>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="case-product">
                <div class="case-product__content">
                    <div class="case-product__header">
                        <h2>СХД RAIDIX</h2>
                        <div class="case-product__preview">
                            <p>Российская программно-определяемая СХД для задач, требующих высокой производительности</p>
                        </div>
                    </div>
                    <div class="case-product__main">
                        <div class="case-product__text">
                            <h3>Рекомендовано для импортозамещения</h3>
                            <p>
                                Программное обеспечение RAIDIX внесено в Единый реестр российских программ для электронных вычислительных машин и баз данных (Реестр российского программного обеспечения).
                            </p>
                        </div>
                        <span class="btn btn_large btn_primary" >

	<span class="children">Узнать больше о продукте</span>

	<a href="#"   class="cover " ></a>
</span>
                    </div>
                </div>
                <div class="case-product__image">
                    <picture><source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/case-product.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH ?>/files/images/case-product.webp" alt="#"></picture>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2><?=$arResult['PROPERTIES']['CLIENT_OF_IMPLEMENT']['NAME']?></h2>
                <div class="case-client">
                    <div class="case-client__content">
                        <p>
                            СХД Raidix 5X совмещает высокоскоростной блочный (SAN) и файловый (NAS) доступ. Уровни массивов RAID 7.3 и RAID N+M обеспечивают повышенные показатели надёжности и отказоустойчивости для бесперебойной работы в гетерогенной среде и многопоточном режиме.
                        </p>
                        <h3>В чем преимущества выбранной СХД?</h3>
                        <ol>
                            <li>Первичная цена ПО от RAIDIX доступнее, чем продукты конкурентов.</li>
                            <li>Высокий уровень производительности.</li>
                            <li>RAIDIX — зрелый, успешно конкурирующий на внешнем рынке продукт.</li>
                            <li>Протоколы Fibre Channel и iSCSI доступны одновременно.</li>
                            <li>Возможность использовать преимущества современных сетевых адаптеров с RDMA, которые позволяют разгрузить процессоры хоста и СХД за счёт использования, например, iSER (iSCSI Extensions for RDMA).</li>
                            <li>
                                Клиент почти не ограничен в выборе аппаратной платформы СХД и в будущем может легко перейти на более производительные интерфейсы, заменив соответствующие адаптеры.
                            </li>
                        </ol>
                    </div>
                    <div class="case-client__preview">
                        <h3>ПО было установлено на сервер Zeon в следующей конфигурации:</h3>
                        <ul>
                            <li>2 × Intel Xeon Gold 6230R (2,1 ГГц / 35,75 МБ / 26 ядер);</li>
                            <li>384 ГБ (12 × 32 ГБ) DDR4 3200 МГц RDIMM;</li>
                            <li>2 × 480 ГБ SSD SATA Read Intensive 6bps;</li>
                            <li>60 × 18 ТБ 3,5″ 7200 RPM 512 МБ SAS;</li>
                            <li>PCIE 25 ГБ 4SFP28.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2><?=$arResult['PROPERTIES']['RESULT']['NAME']?></h2>
                <div class="case-result">
                    <div class="conditions__item ">
                        <div class="conditions__card">
                            <div class="conditions__preview">

                                <h3>2 дня</h3>


                                <h4>с поставки СХД до запуска</h4>

                            </div>

                        </div>

                    </div>
                    <div class="conditions__item ">
                        <div class="conditions__card">
                            <div class="conditions__preview">

                                <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][0]?></h3>


                                <h4><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][1]?></h4>

                            </div>

                        </div>

                    </div>
                    <div class="conditions__item ">
                        <div class="conditions__card">
                            <div class="conditions__preview">

                                <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][2]?></h3>


                                <h4><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][3]?></h4>

                            </div>

                        </div>

                    </div>
                    <div class="conditions__item ">
                        <div class="conditions__card">
                            <div class="conditions__preview">

                                <h3><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][4]?></h3>


                                <h4><?=$arResult['PROPERTIES']['DESCRIPTION_ON_HEADING']['VALUE'][5]?></h4>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <div class="section__preview">
                    <div class="section__slider">
                        <h2>Продукты в кейсе</h2>
                        <div class="section__navigation slider__navigation section__navigation_product-preview">
                            <div class="_prev"></div>
                            <div class="_next"></div>
                        </div>
                    </div>
                    <div class="product-preview__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide product-preview">
                                <a href="#" class="product-preview__image">
                                    <picture><source srcset="./files/images/product-preview.webp" type="image/webp"><img src="./files/images/product-preview.webp" alt="#"></picture>
                                    <span>Склад</span>
                                </a>
                                <div class="product-preview__description">
                                    <div class="product-preview__info">

                                        <div class="product-preview__score">от 226 062 ₽</div>

                                        <div class="product-preview__title">
                                            <a href="#">
                                                <h4>Сервер HP ProLiant DL380 Gen10 (2U)</h4>
                                            </a>
                                            <ul>
                                                <li>Rack 2U</li>
                                                <li>2 х Intel Xeon 2Gen</li>
                                                <li>24 х  DDR4 DIMM </li>
                                                <li>12 x LFF / 24 x SFF</li>
                                                <li>SAS/SATA/SSD/NVMe</li>
                                                <li>2 PSU</li>
                                                <li>До 5 лет гарантии <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="./files/icons/question.svg" alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            Подсказка текста
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-preview__btns">

				<span class="btn btn_large btn_mobile_small btn_secondary" >

	<span class="children">Купить в 1 клик</span>

	<a href="#"   class="cover " ></a>
</span>


                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >

	<span class="children">Сконфигурировать</span>

	<a href="#"   class="cover " ></a>
</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-preview">
                                <a href="#" class="product-preview__image">
                                    <picture><source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" alt="#"></picture>
                                    <span>Склад</span>
                                </a>
                                <div class="product-preview__description">
                                    <div class="product-preview__info">

                                        <div class="product-preview__score">от 226 062 ₽</div>

                                        <div class="product-preview__title">
                                            <a href="#">
                                                <h4>Сервер HP ProLiant DL380 Gen10 (2U)</h4>
                                            </a>
                                            <ul>
                                                <li>Rack 2U</li>
                                                <li>2 х Intel Xeon 2Gen</li>
                                                <li>24 х  DDR4 DIMM </li>
                                                <li>12 x LFF / 24 x SFF</li>
                                                <li>SAS/SATA/SSD/NVMe</li>
                                                <li>2 PSU</li>
                                                <li>До 5 лет гарантии <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            Подсказка текста
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-preview__btns">

				<span class="btn btn_large btn_mobile_small btn_secondary" >

	<span class="children">Купить в 1 клик</span>

	<a href="#"   class="cover " ></a>
</span>


                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >

	<span class="children">Сконфигурировать</span>

	<a href="#"   class="cover " ></a>
</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-preview">
                                <a href="#" class="product-preview__image">
                                    <picture><source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" alt="#"></picture>
                                    <span>Склад</span>
                                </a>
                                <div class="product-preview__description">
                                    <div class="product-preview__info">

                                        <div class="product-preview__score">от 226 062 ₽</div>

                                        <div class="product-preview__title">
                                            <a href="#">
                                                <h4>Сервер HP ProLiant DL380 Gen10 (2U)</h4>
                                            </a>
                                            <ul>
                                                <li>Rack 2U</li>
                                                <li>2 х Intel Xeon 2Gen</li>
                                                <li>24 х  DDR4 DIMM </li>
                                                <li>12 x LFF / 24 x SFF</li>
                                                <li>SAS/SATA/SSD/NVMe</li>
                                                <li>2 PSU</li>
                                                <li>До 5 лет гарантии <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            Подсказка текста
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-preview__btns">

				<span class="btn btn_large btn_mobile_small btn_secondary" >

	<span class="children">Купить в 1 клик</span>

	<a href="#"   class="cover " ></a>
</span>


                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >

	<span class="children">Сконфигурировать</span>

	<a href="#"   class="cover " ></a>
</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-preview">
                                <a href="#" class="product-preview__image">
                                    <picture><source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" alt="#"></picture>
                                    <span>Склад</span>
                                </a>
                                <div class="product-preview__description">
                                    <div class="product-preview__info">

                                        <div class="product-preview__score">от 226 062 &#x20BD</div>

                                        <div class="product-preview__title">
                                            <a href="#">
                                                <h4>Сервер HP ProLiant DL380 Gen10 (2U)</h4>
                                            </a>
                                            <ul>
                                                <li>Rack 2U</li>
                                                <li>2 х Intel Xeon 2Gen</li>
                                                <li>24 х  DDR4 DIMM </li>
                                                <li>12 x LFF / 24 x SFF</li>
                                                <li>SAS/SATA/SSD/NVMe</li>
                                                <li>2 PSU</li>
                                                <li>До 5 лет гарантии <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            Подсказка текста
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-preview__btns">

				<span class="btn btn_large btn_mobile_small btn_secondary" >

	<span class="children">Купить в 1 клик</span>

	<a href="#"   class="cover " ></a>
</span>


                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >

	<span class="children">Сконфигурировать</span>

	<a href="#"   class="cover " ></a>
</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product-preview">
                                <a href="#" class="product-preview__image">
                                    <picture><source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH ?>/files/images/product-preview.webp" alt="#"></picture>
                                    <span>Склад</span>
                                </a>
                                <div class="product-preview__description">
                                    <div class="product-preview__info">

                                        <div class="product-preview__score">от 226 062 ₽</div>

                                        <div class="product-preview__title">
                                            <a href="#">
                                                <h4>Сервер HP ProLiant DL380 Gen10 (2U)</h4>
                                            </a>
                                            <ul>
                                                <li>Rack 2U</li>
                                                <li>2 х Intel Xeon 2Gen</li>
                                                <li>24 х  DDR4 DIMM </li>
                                                <li>12 x LFF / 24 x SFF</li>
                                                <li>SAS/SATA/SSD/NVMe</li>
                                                <li>2 PSU</li>
                                                <li>До 5 лет гарантии <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            Подсказка текста
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-preview__btns">

				<span class="btn btn_large btn_mobile_small btn_secondary" >

	<span class="children">Купить в 1 клик</span>

	<a href="#"   class="cover " ></a>
</span>


                                        <span class="btn btn-icon btn_primary btn-icon_reverse btn-icon_large btn-icon_config" >

	<span class="children">Сконфигурировать</span>

	<a href="#"   class="cover " ></a>
</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brands">

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/hpe.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/dell.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/HP.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/cisco.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/IBM.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/microsoft.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/juniper.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/synology.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/Lenovo.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/SuperMicro.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/Infortrend.svg" alt="#"></a>

                    <a href="#" target="_blank"><img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/Raidix.svg" alt="#"></a>

                </div>
            </div>
        </div>
    </section>

<?$APPLICATION->IncludeComponent(
    "bitrix:form",
    "template3",
    Array(
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "EDIT_ADDITIONAL" => "N",
        "EDIT_STATUS" => "Y",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "NAME_TEMPLATE" => "",
        "NOT_SHOW_FILTER" => array("",""),
        "NOT_SHOW_TABLE" => array("",""),
        "RESULT_ID" => $_REQUEST["RESULT_ID"],
        "SEF_MODE" => "N",
        "SHOW_ADDITIONAL" => "N",
        "SHOW_ANSWER_VALUE" => "Y",
        "SHOW_EDIT_PAGE" => "N",
        "SHOW_LIST_PAGE" => "N",
        "SHOW_STATUS" => "N",
        "SHOW_VIEW_PAGE" => "N",
        "START_PAGE" => "new",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "VARIABLE_ALIASES" => Array("action"=>"action"),
        "WEB_FORM_ID" => "5"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "case_index",
    Array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "Y",
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
        "FIELD_CODE" => array("",""),
        "FILE_404" => "",
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "12",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "4",
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
        "PROPERTY_CODE" => array("","POSITION",""),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "blog_list_content",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
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
        "FIELD_CODE" => array("",""),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "17",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "4",
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
        "PROPERTY_CODE" => array("",""),
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

    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <h2>Почему ITELON?</h2>
                <div class="why">
                    <div class="why__list">
                        <div class="conditions__item ">
                            <div class="conditions__card">
                                <div class="conditions__preview">

                                    <h3>20 лет</h3>


                                    <h4>опыта</h4>

                                </div>

                                <div class="conditions__text">
                                    <p>Построения распределенных центров обработки данных, высоконагруженных вычислительных кластеров и систем хранения</p>
                                </div>

                            </div>

                        </div>
                        <div class="conditions__item ">
                            <div class="conditions__card">
                                <div class="conditions__preview">

                                    <h3>2000</h3>


                                    <h4>серверов и систем хранения</h4>

                                </div>

                                <div class="conditions__text">
                                    <p>За 2022 и 2023 год мы отгрузили более 2 000 серверов и систем хранения Dell, HPE, Lenovo, Supermicro</p>
                                </div>

                            </div>

                        </div>
                        <div class="conditions__item conditions__item_small">
                            <div class="conditions__card">
                                <div class="conditions__preview">


                                    <h4>Импортозамещение</h4>

                                </div>

                                <div class="conditions__text">
                                    <p>Выбрали лучшее и сформировали надежный портфель решений по информационной безопасности</p>
                                </div>

                            </div>

                        </div>
                        <div class="conditions__item conditions__item_small">
                            <div class="conditions__card">
                                <div class="conditions__preview">


                                    <h4>Чистые и прозрачные договоры поставки</h4>

                                </div>

                                <div class="conditions__text">
                                    <p>Мы не обещаем то, что не можем выполнить, и всегда выполняем то, что обещаем</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="why__banner">
                        <h3>Профессиональное корпоративное <br>финансирование проектов</h3>
                        <div class="why__content">
                            <span>Быстрая оценка рисков</span>
                            <span>Предоплата от 30%</span>
                            <span>Фиксация курса</span>
                            <span>100% постоплата</span>
                            <span>Графики платежей</span>
                            <span>Лизинг</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




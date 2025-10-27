<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
            <div class="banner">

                <div class="page-preview">
                    <h1>Кейсы</h1>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumb",
                        array(
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0"
                        )
                    ); ?>


                </div>


                <div class="banner__image">
                    <picture>
                        <source srcset="<?= SITE_TEMPLATE_PATH ?>/files/images/cases-banner.webp" type="image/webp">
                        <img src="/files/images/cases-banner.webp" alt="#">
                    </picture>
                </div>
            </div>
            <div class="tabs">
                <div class="tabs__titles">
                    <h2 class="tabs__title _active">Все кейсы</h2>
                    <? foreach ($arResult["SECTIONS"] as $arSection): ?>
                        <h2 class="tabs__title" data-section-id="<?= $arSection["ID"] ?>"><?= $arSection["NAME"] ?></h2>
                    <? endforeach; ?>
                </div>

                <div class="tabs__wrapper">
                        <div class="tabs__content _active">
                            <div class="section__wrapper">
                                <div class="cases__list">
                                    <?
                                    $counter = 0;
                                    foreach ($arResult['ITEMS'] as $key => $arItem) { ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class=" cases-card">
                                            <div class="cases-card__image">
                                                <picture>
                                                    <source srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" type="image/webp">
                                                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="#">
                                                </picture>
                                            </div>
                                            <div class="cases-card__info">
                                                <h3><?=$arItem['NAME']?></h3>
                                            </div>  
                                        </a>
                                        <? if ($counter == 3) { ?>
                                            <div class="products-banner">
                                                <div class="products-banner__list">
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/products-banner-1.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Обязательное тестирование до отгрузки</div>
                                                            <div class="products-banner__text">Надежная защита от заводского брака</div>
                                                        </div>
                                                    </div>
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/products-banner-2.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Собственный склад серверов и опций</div>
                                                            <div class="products-banner__text">Замена по гарантии в течение нескольких дней</div>
                                                        </div>
                                                    </div>
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/products-banner-3.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Новое и оригинальное оборудование</div>
                                                            <div class="products-banner__text">Как проверить оригинальность и срок производства?</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="products-banner__request">
                                                    <div class="products-banner__subtitle">Нужна техническая консультация по выбору сервера?</div>
                                                    <div class="products-banner__btn">
                                                        <span class="btn btn_large btn_secondary" >
                                                            <span class="children">Оставить заявку</span>
                                                            <a href="#consultation"   class="cover popup-link" ></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } $counter++; ?>
                                    <? } ?>
                                </div>
                                <div class="browsing">
                                    <span class="btn btn_medium btn_outlined">
                                        <span class="children">Показать еще</span>
                                        <a href="#" class="cover "></a>
                                    </span>
                                    <div class="pagination ">
                                        <a href="#" class="pagination__arrow pagination__arrow_prev _disabled">В
                                        начало</a>
                                        <a href="#" class="pagination__item _active">1</a>
                                        <a href="#" class="pagination__item">2</a>
                                        <a href="#" class="pagination__item">3</a>
                                        <a href="#" class="pagination__item _disabled">...</a>
                                        <a href="#" class="pagination__item">5</a>
                                        <a href="#" class="pagination__arrow pagination__arrow_next">Дальше</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? foreach ($arResult["SECTIONS"] as $key => $arSection) { ?>
                        <div class="tabs__content">
                            <div class="section__wrapper">
                                <div class="cases__list">
                                    <?
                                    $counter = 0;
                                    foreach ($arSection['ITEMS'] as $key => $arItem) { ?>
                                        <a href="#" class=" cases-card">
                                            <div class="cases-card__image">
                                                <picture>
                                                    <source srcset="#" type="image/webp">
                                                    <img src="#" alt="#">
                                                </picture>
                                            </div>
                                            <div class="cases-card__info">
                                                <h3>Виртуализация рабочих мест</h3>
                                            </div>  
                                        </a>
                                        <? if ($counter == 3) { ?>
                                            <div class="products-banner">
                                                <div class="products-banner__list">
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="./files/icons/products-banner-1.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Обязательное тестирование до отгрузки</div>
                                                            <div class="products-banner__text">Надежная защита от заводского брака</div>
                                                        </div>
                                                    </div>
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="./files/icons/products-banner-2.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Собственный склад серверов и опций</div>
                                                            <div class="products-banner__text">Замена по гарантии в течение нескольких дней</div>
                                                        </div>
                                                    </div>
                                                    <div class="products-banner__item">
                                                        <div class="products-banner__image">
                                                            <img src="./files/icons/products-banner-3.svg" alt="#">
                                                        </div>
                                                        <div class="products-banner__content">
                                                            <div class="products-banner__title">Новое и оригинальное оборудование</div>
                                                            <div class="products-banner__text">Как проверить оригинальность и срок производства?</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="products-banner__request">
                                                    <div class="products-banner__subtitle">Нужна техническая консультация по выбору сервера?</div>
                                                    <div class="products-banner__btn">
                                                        <span class="btn btn_large btn_secondary" >
                                                            <span class="children">Оставить заявку</span>
                                                            <a href="#consultation"   class="cover popup-link" ></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } $counter++; ?>
                                    <? } ?>
                                </div>
                                <div class="browsing">

                                    <div class="pagination ">
                                        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                                          <?=$arResult["NAV_STRING"]?>
                                        <?endif;?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <? } ?>
                    <!-- Структура остальных табов аналогична активному-->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

</div>
</div>
</div>
<!-- Структура остальных табов аналогична активному-->
<div class="tabs__content"></div>
<div class="tabs__content"></div>
<div class="tabs__content"></div>
<div class="tabs__content"></div>
<div class="tabs__content"></div>
<div class="tabs__content"></div>
<div class="tabs__content"></div>
</div>


</div>
</div>
</div>
</section>

<section class="section">
    <div class="container">
        <div class="choosen-preview">
            <h2>20 лет на рынке системной интеграции</h2>

            <div class="choosen-preview__wrapper">
                <div class="choosen-preview__banner">
                    <div class="choosen-preview__bigimage">
                        <picture>
                            <source srcset="<?=SITE_TEMPLATE_PATH ?>/files/images/choosen-preview__bigimage.webp" type="image/webp">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/images/choosen-preview__bigimage.png" alt="#">
                        </picture>
                    </div>
                    <div class="choosen-preview__biginfo">
                        <h3>Официальный партнер Dell, HPE, Cisco, Lenovo, Juniper, IBM, HP Inc, Fortinet, Checkpoint
                            Microsoft, VMware</h3>
                        <span>*до 2022 года включительно</span>
                    </div>
                </div>
                <div class="choosen-preview__list">
                    <div class="choosen-preview__item">
                        <div class="choosen-preview__image">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/choosen-preview-1.svg" alt="#">
                        </div>
                        <div class="choosen-preview__info">
                            Наше юридическое лицо работает с 2004 года и успешно прошло переаккредитацию как ИТ-компания
                            на 2023-2024 год
                        </div>
                    </div>
                    <div class="choosen-preview__item">
                        <div class="choosen-preview__image">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/choosen-preview-2.svg" alt="#">
                        </div>
                        <div class="choosen-preview__info">
                            Оветственная работа с государственными заказчиками по ФЗ-44 и ФЗ-212
                            <a href="#" target="_blank">
                                <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/company-tooltip.svg" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="choosen-preview__item">
                        <div class="choosen-preview__image">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/choosen-preview-3.svg" alt="#">
                        </div>
                        <div class="choosen-preview__info">
                            Безукоризненная работа с корпоративными заказчиками - за 20 лет ни одного иска, где наша
                            компания является ответчиком
                        </div>
                    </div>
                    <div class="choosen-preview__item">
                        <div class="choosen-preview__image">
                            <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/choosen-preview-4.svg" alt="#">
                        </div>
                        <div class="choosen-preview__info">
                            Непрерывное обучение и экспертиза в лучших зарубежных и российских продуктах для построения
                            ЦОД и высоконагруженных вычислительных систем и систем хранения
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






















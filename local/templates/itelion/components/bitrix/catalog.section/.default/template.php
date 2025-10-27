<?php
(defined('B_PROLOG_INCLUDED') && B_PROLOG_INCLUDED === true) || die();


$this->setFrameMode(true);
?>

<main>
    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <div class="section__container">
                    <div class="page-preview">
                        <h1>Серверы (Сеты пока находятся в catalog.section)</h1>


                        <div class="bread-crumbs">
                            <a href="#">Главная</a>


                            <a href="#">Каталог</a>


                            <span>Серверы</span>
                        </div>
                
                            <!-- Активному пункту добавляется класс _active-->
                        <?$APPLICATION->IncludeComponent("bitrix:news.list", "set", Array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                            "AJAX_MODE" => "N",	// Включить режим AJAX
                            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                            "CACHE_TYPE" => "A",	// Тип кеширования
                            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                            "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                            "DISPLAY_DATE" => "N",	// Выводить дату элемента
                            "DISPLAY_NAME" => "N",	// Выводить название элемента
                            "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
                            "DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
                            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                            "FIELD_CODE" => array(	// Поля
                                0 => "",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",	// Фильтр
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                            "IBLOCK_ID" => "4",	// Код информационного блока
                            "IBLOCK_TYPE" => "Set",	// Тип информационного блока (используется только для проверки)
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                            "INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
                            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                            "NEWS_COUNT" => "20",	// Количество новостей на странице
                            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                            "PAGER_TITLE" => "Новости",	// Название категорий
                            "PARENT_SECTION" => "",	// ID раздела
                            "PARENT_SECTION_CODE" => "",	// Код раздела
                            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                            "PROPERTY_CODE" => array(	// Свойства
                                0 => "",
                                1 => "PROPERTY_SET",
                                2 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
                            "SET_STATUS_404" => "N",	// Устанавливать статус 404
                            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                            "SHOW_404" => "N",	// Показ специальной страницы
                            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                        ),
                            false
                        );
                        ?>

                        </div>

                    </div>


                <div class="products">
                    <div class="products__sidebar">
                        <div class="filter">
                            <form>
                                <div class="filter__wrapper">
                                    <div class="filter__header"><h3>Фильтр находятся в catalog.section</h3></div>
                                    <div class="filter__main">
                                        <div class="filter__header_mobile">
                                            <h3>Фильтр</h3>
                                            <div class="filter__close">
                                                <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.5 8C0.5 3.85786 3.85786 0.5 8 0.5H36C40.1421 0.5 43.5 3.85786 43.5 8V36C43.5 40.1421 40.1421 43.5 36 43.5H8C3.85786 43.5 0.5 40.1421 0.5 36V8Z"
                                                          stroke="#CFD4D8"/>
                                                    <rect x="16.8486" y="16" width="16" height="1.2" rx="0.6"
                                                          transform="rotate(45 16.8486 16)" fill="#58616A"/>
                                                    <rect x="16" y="27.3125" width="16" height="1.2" rx="0.6"
                                                          transform="rotate(-45 16 27.3125)" fill="#58616A"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="filter__list">
                                            <div class="filter__item">
                                                <div class="filter__title _open"><h4>Производитель</h4></div>
                                                <div class="filter__body _open">
                                                    <div class="filter__inputs">
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Hewlett Packard</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Dell</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Lenovo</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Acer</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>AIC</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>ASUS</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Cisco</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Nerpa</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Lenovo</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Acer</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>AIC</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Lenovo</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Acer</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>В наличии</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>2U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>3U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>4U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>12U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Mid Tower</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>Mini Tower</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
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
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>1U</span>
                                                        </div>
                                                        <div class="filter-checkbox">
                                                            <input value="" data-type="checkbox" type="checkbox">
                                                            <span>2U</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter__btns">
                                            <!--Для блокировки добавить класс _disabled-->
                                            <button class="btn btn_large btn_secondary" type="submit">

                                                <span class="children">Показать</span>

                                            </button>
                                            <!--Для блокировки добавить класс _disabled-->
                                            <button class="btn btn_large btn_outlined" type="reset">

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
                        <div class="products__preview">
                            <div class="products__sorting">
                                <div class="sorting">
                                    <div class="sorting__description">
                                        <div class="sorting__value">Найдено:
                                            <span><?= $arResult['SELECTED_ROWS_COUNT'] ?></span></div>
                                        <div class="sorting__value">Минимальная цена:
                                            <span><?= $arResult['min_price'] ?> ₽</span></div>
                                    </div>
                                    <form id="sortingForm">
                                        <div class="sorting__dropdown">
                                            <div class="form-group dropdown">
                                                <div class="dropdown__button">
                <span class="dropdown__title" id="sortingTitle">
                    <?php
                    $sortingValues = ['up' => 'По возрастанию', 'down' => 'По убыванию', 'popular' => 'По популярности'];
                    echo $sortingValues[$_GET['sorting'] ?? 'up'];
                    ?>
                </span>
                                                    <div class="arrow"></div>
                                                    <input class="form-control" type="hidden" name="sorting"
                                                           value="<?php echo $_GET['sorting'] ?? 'up'; ?>">
                                                </div>
                                                <div class="dropdown__options">
                                                    <ul class="dropdown__list">
                                                        <div class="dropdown__option <?php echo ($_GET['sorting'] == 'up') ? '_selected' : ''; ?>"
                                                             data-value="up"><a href="?sorting=up">По возрастанию</a>
                                                        </div>
                                                        <div class="dropdown__option <?php echo ($_GET['sorting'] == 'down') ? '_selected' : ''; ?>"
                                                             data-value="down"><a href="?sorting=down">По убыванию</a>
                                                        </div>
                                                        <div class="dropdown__option <?php echo ($_GET['sorting'] == 'popular') ? '_selected' : ''; ?>"
                                                             data-value="popular"><a href="?sorting=popular">По
                                                                популярности</a></div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="products__list">
                                <? $index = 1 ?>
                                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                                    <div class=" product-preview">
                                        <a href="#" class="product-preview__image">
                                            <picture>
                                                <source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                                        type="image/webp">
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

                            </div>


                        </div>
                      <!--  <div class="browsing">
	<span class="btn btn_medium btn_outlined">

	<span class="children">Показать еще</span>

	<a href="#" class="cover "></a>
</span>
                            <div class="pagination ">
                                <a href="#" class="pagination__arrow pagination__arrow_prev _disabled">В начало</a>
                                <a href="#" class="pagination__item _active">1</a>
                                <a href="#" class="pagination__item">2</a>
                                <a href="#" class="pagination__item">3</a>
                                <a href="#" class="pagination__item _disabled">...</a>
                                <a href="#" class="pagination__item">5</a>
                                <a href="#" class="pagination__arrow pagination__arrow_next">Дальше</a>
                            </div>

                        </div>-->
                        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                            <br/><?=$arResult["NAV_STRING"]?>
                        <?endif;?>

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
                <h2>Серверное оборудование <br>и корпоративные IT-решения для бизнеса</h2>
                <div class="seo-text__description">
                    <p>
                        Профессиональная команда системного интегратора ITELON всегда готова внедрить IT решения для
                        вашего бизнеса:
                    </p>
                    <ul>
                        <li>
                            комплексные решения. Cотрудничаем с крупнейшими вендорами и оказываем услуги системной
                            интеграции под ключ: проектирование, внедрение облачных технологий, построение
                            корпоративной
                            IT-инфраструктуры и инженерных систем, разработку узкоспециализированных коробочных
                            решений.
                            Наши инженеры глубоко вникают в задачу и несут ответственность за результат;
                        </li>
                        <li>
                            большой портфель готовых решений. Ознакомьтесь с примерами наших проектов – за 19 лет мы
                            реализовали более 1000 проектных решений для финансовых и государственных учреждений, IT
                            и
                            телекома, промышленности и ритейла, медицины и науки. Сформулируйте задачу, и инженеры
                            ITELON предложат быстрый, рациональный и эффективный путь ее решения;
                        </li>
                        <li>
                            гарантии безопасности. Защищаем конфиденциальную информацию клиентов от третьих лиц.
                            Заботимся о безопасности корпоративных данных;
                        </li>
                        <li>
                            индивидуальный подход. Принимайте решения, которые выгодны или удобны вам. Покупайте
                            оборудование или заказывайте конкретную услугу.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
?>
    <!-- TODO-ROMAN: Содержимое тега "main > div" -->
    <section class="section">
        <div class="container">
            <div class="section__column">
                <div class="banner">
                    <div class="page-preview">
                        <h1><?= $APPLICATION->ShowProperty('h1') ?></h1>

                        <!--TODO-ROMAN: сходу не нашел, как импортировать -->
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

                    <div class="banner__image">
                        <picture>
                            <source srcset="/local/templates/itelion/files/images/delivery.webp" type="image/webp"><img src="/local/templates/itelion/files/images/delivery.png"
                                                                                                                        alt="#">
                        </picture>
                    </div>
                </div>

                <div class="section__preview">
                    <h2>Надежно привозим, быстро оформляем, честно фиксируем условия.</h2>
                    <div class="section__preview">
                        <h3>Финансы и логистика: понятно, прозрачно и без «мелкого шрифта».</h3>

						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/preferences.php",
								"EDIT_TEMPLATE" => ""
							),
							false
						); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2>Финансовые условия</h2>
                <div class="section__preview">

                    <div class="calm__list">
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/calm-3.svg" alt="#">
                            </div>
                            <p><strong>Только B2B в РФ.</strong> Поставляем и заключаем договоры <strong>исключительно с юридическими
                                    лицами и ИП</strong> на территории Российской Федерации.</p>
                        </div>
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/calm-pay.svg" alt="#">
                            </div>
                            <p><strong>Оплата — по безналу, в рублях.</strong> Выставляем счёт, принимаем оплату в рублях на расчетный
                                счет.</p>
                        </div>
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/calm-lising.svg" alt="#">
                            </div>
                            <p><strong>Лизинг под ключ.</strong> Работаем с ведущими лизинговыми компаниями и помогаем согласовать
                                лучшие условия (ставка, аванс, график).</p>
                        </div>
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/calm-1.svg" alt="#">
                            </div>
                            <p><strong>Честные договоры поставки.</strong> Мы не обещаем невыполнимого и выполняем обещанное. Условия,
                                сроки и ответственность сторон фиксируются в договоре.</p>
                        </div>
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/calm-chart.svg" alt="#">
                            </div>
                            <p><strong>Гибкие условия по курсу и срокам.</strong> Проводим ускоренную финансовую оценку; для части
                                контрагентов уже в первом заказе возможны:<br>— фиксация курса USD для расчётов в рублях;<br>— отсрочка
                                или рассрочка платежа.</p>
                        </div>
                        <div class="calm__item">
                            <div class="calm__image">
                                <img src="/local/templates/itelion/files/icons/choosen-preview-3.svg" alt="#">
                            </div>
                            <p><strong>Юрлицо с 2004 года.</strong> Предоставляем актуальную бухгалтерскую отчетность, налоговые
                                декларации, уставные документы — при заключении договора и далее ежегодно.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <h2>Логистика и сроки</h2>

                <!--TODO-ROMAN: похож на indicators.php, но другой контент и классы-модификаторы поменялись местами -->
                <div class="indicators">
                    <div class="indicators__item indicators__item_red">
                        <h3>2–3 рабочих дня</h3>
                        <p>
                            cредний срок по Москве и МО.<br>
                            Согласуем окно доставки и привозим до двери.
                        </p>
                    </div>
                    <div class="indicators__item indicators__item_blue">
                        <h3>Бесплатно</h3>
                        <p>доставим серверное и сетевое оборудование по Москве и регионам со страхованием груза.</p>
                    </div>
                </div>

                <!--TODO-ROMAN: таких блоков на странице несколько, но разный текст -->
                <div class="annotation-text">
                    <img src="/local/templates/itelion/files/icons/question-blue.svg" class="annotation-text__icon" alt="Страховой случай">
                    <p class="annotation-text__content">
                        <strong>Страховой случай</strong> — без вашего участия. Если в пути произойдет порча/утеря/пересорт, мы
                        отправим товар заново, а разбирательство с ТК возьмём на себя.
                    </p>
                </div>
                <!--END-TODO-->

                <div class="calm__list calm__list_col-3">
                    <div class="calm__item">
                        <div class="calm__image">
                            <img src="/local/templates/itelion/files/icons/calm_delivery-1.svg" alt="#">
                        </div>
                        <p>
                            <strong>Правильная упаковка.</strong><br>
                            Отгружаем в оригинальной транспортной таре производителя; при передаче в ТК делаем обрешётку.
                        </p>
                    </div>
                    <div class="calm__item">
                        <div class="calm__image">
                            <img src="/local/templates/itelion/files/icons/preferences-5.svg" alt="#">
                        </div>
                        <p>
                            <strong>Предпродажная подготовка.</strong><br>
                            Перед отправкой проводим тестирование и доукомплектацию в нашем сервисном центре.
                        </p>
                    </div>
                    <div class="calm__item">
                        <div class="calm__image">
                            <img src="/local/templates/itelion/files/icons/products-banner-2.svg" alt="#">
                        </div>
                        <p>
                            <strong>Свой склад, сервис и доставка.</strong><br>
                            В Москве и МО — собственная курьерская служба. При необходимости возможна отгрузка «день-в-день».
                        </p>
                    </div>
                </div>

                <div class="additional-text">
                    <h3>Для получения товара со стороны заказчика требуется:</h3>
                    <ul>
                        <li>
                            Доверенность на получение ТМЦ на представителя (бумажная на бланке компании или прикрепленная в ЭДО).
                        </li>
                        <li>
                            Документ, удостоверяющий личность представителя.
                        </li>
                    </ul>
                    <p>
                        При оформлении через ЭДО или если приемку выполняет экспедитор/курьер по поручению заказчика, доверенность
                        также обязательна.
                    </p>
                </div>

                <div class="support-info">
                    <div class="support-info__content">
                        <h3>Самовывоз</h3>
                        <p>
                            <strong>Москва, Щёлковское шоссе, д. 5. </strong>
                        </p>
                        <p>
                            На площадке доступны пандус, грузовые лифты и автопогрузчик.
                        </p>
                        <p>
                            Согласуйте время — подготовим груз и документы. Для выдачи потребуется доверенность на получение ТМЦ и
                            паспорт представителя.
                        </p>
                    </div>
                    <div class="contacts__map">
                        <iframe src="https://yandex.ru/map-widget/v1/org/sokol/1130336164/?indoorLevel=1&ll=37.756243%2C55.804369&z=18"
                                allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2>Поставки под заказ и импорт</h2>

                <!--TODO-ROMAN: на сайте такой компонент уже есть,
					только параграф теперь обернут .services__text (в других местах менять необязательно)
				-->
                <div class="services__list">
                    <div class="services__item">
                        <div class="services__image">
                            <picture>
                                <source srcset="/local/templates/itelion/files/images/delivery-services-1.webp" type="image/webp"><img
                                        src="/local/templates/itelion/files/images/delivery-services-1.png" alt="Проверенные каналы">
                            </picture>
                        </div>
                        <div class="services__content">
                            <div class="services__title">
                                <h4>Проверенные каналы</h4>
                                <div class="services__text">
                                    <p>Закупаем у партнеров в <strong>Китае, ОАЭ, Европе</strong>, в том числе с заводов производителей.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services__item">
                        <div class="services__image">
                            <picture>
                                <source srcset="/local/templates/itelion/files/images/delivery-services-2.webp" type="image/webp"><img
                                        src="/local/templates/itelion/files/images/delivery-services-2.png" alt="Сроки под заказ">
                            </picture>
                        </div>
                        <div class="services__content">
                            <div class="services__title">
                                <h4>Сроки под заказ</h4>
                                <div class="services__text">
                                    <p><strong>2–4 недели</strong> со склада официального дистрибьютора за рубежом.</p>
                                    <p><strong>8–10 недель</strong> с завода производителя.</p>
                                    <p>Конкретные сроки фиксируем в договоре, ответственность за их соблюдение — тоже.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services__item">
                        <div class="services__image">
                            <picture>
                                <source srcset="/local/templates/itelion/files/images/delivery-services-3.webp" type="image/webp"><img
                                        src="/local/templates/itelion/files/images/delivery-services-3.png" alt="Страхование и таможня">
                            </picture>
                        </div>
                        <div class="services__content">
                            <div class="services__title">
                                <h4>Страхование и таможня</h4>
                                <div class="services__text">
                                    <p>Весь импортируемый товар застрахован;<br><strong>таможенное оформление строго по законодательству
                                            РФ.</strong></p>
                                    <p>По запросу предоставляем <strong>ГТД/ДТ</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END-TODO-->
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2>Транспортные компании</h2>

                <!--TODO-ROMAN: brands отличается от других на сайте только новыми классами-модификаторами-->
                <div class="brands brands_delivery brands_disabled">
                    <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/dellin.svg" alt="Деловые линии"></a>
                    <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/cdek.svg" alt="СДЕК"></a>
                    <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/pecom.svg" alt="ПЭК"></a>
                    <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/dpd.svg" alt="DPD"></a>
                    <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/mjr.svg" alt="Major"></a>
                </div>
                <!--END-TODO-->

                <!--TODO-ROMAN: таких блоков на странице несколько, но разный текст -->
                <div class="annotation-text">
                    <img src="/local/templates/itelion/files/icons/question-blue.svg" class="annotation-text__icon" alt="Страховой случай">
                    <p class="annotation-text__content">
                        По запросу отправляем через любую ТК по письменному распоряжению заказчика.
                    </p>
                </div>
                <!--END-TODO-->
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2>Документы к поставке</h2>

                <div class="delivery-docs">
                    <!--TODO-ROMAN: brands отличается от других на сайте только новыми классами-модификаторами-->
                    <div class="brands brands_disabled brands_column">
                        <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/contur.svg" alt="Контур Диадок"></a>
                        <a href="#" target="_blank"><img src="/local/templates/itelion/files/icons/saby.svg" alt="saby"></a>
                    </div>
                    <!--END-TODO-->
                    <div class="delivery-docs__content">
                        <ul>
                            <li>
                                <strong>Мы работаем в ЭДО - Контур.Диадок и СБИС.</strong>
                            </li>
                            <li>
                                Счет и договор поставки (или спецификация к рамочному договору).
                            </li>
                            <li>
                                УПД/товаро-транспортная накладная.
                            </li>
                            <li>
                                Гарантийные документы производителя/продавца.
                            </li>
                            <li>
                                Сертификаты соответствия - согласно законодательству РФ.
                            </li>
                            <li>
                                Отчет по проверке в сервисном центре и нагрузочном тестировании - если применимо.
                            </li>
                            <li>
                                Сертификат о расширенной гарантии - если применимо.
                            </li>
                            <li>
                                <strong>От заказчика</strong> - Доверенность на получение ТМЦ и паспорт представителя.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__preview">
                <h2>Вопросы и ответы</h2>
                <!--TODO-ROMAN: аккордеоны отличаются от других на сайте только наличием классов _open и _disabled-->
                <div class="accordion__list">
                    <div class="accordion _open _disabled">
                        <div class="accordion__title">
                            <h3>Работаете с физлицами?</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <p>
                                    Нет, только юрлица и ИП.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion _open _disabled">
                        <div class="accordion__title">
                            <h3>Можно наличными или в валюте?</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <p>

                                    Нет, только безнал в рублях.


                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion _open _disabled">
                        <div class="accordion__title">
                            <h3>Фиксация курса и отсрочка доступны всем?</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <p>

                                    Решаем после экспресс-оценки — часто уже для первого заказа.


                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion _open _disabled">
                        <div class="accordion__title">
                            <h3>Какие ТК используете?</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <p>

                                    На выбор клиента или по нашей рекомендации; всегда страхуем груз и оформляем обрешётку.


                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion _open _disabled">
                        <div class="accordion__title">
                            <h3>Когда реально «день-в-день»?</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <p>

                                    Если позиция на складе и согласованы документы/окно доставки; детали уточняем с менеджером проекта.


                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END-TODO-->
            </div>
        </div>
    </section>

    <!--TODO-ROMAN: need_more_answer = true -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
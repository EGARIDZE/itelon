<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
//mpr($arResult['SETTINGS']);
?>

<div class="tabs__content _active">
    <form novalidate="true">
        <div class="solution-config">
            <div class="solution-config__inputs">
                <? if($arResult['SETTINGS']['PROPERTY_PROCESSOR_NUM_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Количество процессоров
                            <? if($arResult['SETTINGS']['PROPERTY_PROCESSOR_NUM_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_PROCESSOR_NUM_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="PROCESSOR_NUM">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_NUM_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                <? endif;?>
                <? if($arResult['SETTINGS']['PROPERTY_CORES_NUM_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Количество ядер одного процессора
                            <? if($arResult['SETTINGS']['PROPERTY_CORES_NUM_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_CORES_NUM_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="CORES_NUM">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_CORES_NUM_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?></ul>
                        </div>
                    </div>
                <? endif;?>
                <? if($arResult['SETTINGS']['PROPERTY_PROCESSOR_FREQURNCY_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Частота одного процессора
                            <? if($arResult['SETTINGS']['PROPERTY_PROCESSOR_FREQURNCY_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_PROCESSOR_FREQURNCY_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="PROCESSOR_FREQURNCY">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_FREQURNCY_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                <? endif;?>
                <? if($arResult['SETTINGS']['PROPERTY_VOLUME_DISC_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Совокупный объём дискового пространства
                            <? if($arResult['SETTINGS']['PROPERTY_VOLUME_DISC_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_VOLUME_DISC_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="VOLUME_DISC">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_VOLUME_DISC_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?>
                            </ul>
                        </div>

                    </div>
                <? endif;?>
                <? if($arResult['SETTINGS']['PROPERTY_VOLUME_RAM_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Объём оперативной памяти
                            <? if($arResult['SETTINGS']['PROPERTY_VOLUME_RAM_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_VOLUME_RAM_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="VOLUME_RAM">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_VOLUME_RAM_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                <? endif;?>
                <? if($arResult['SETTINGS']['PROPERTY_SOFTWARE_VALUE']):?>
                    <div class="form-group dropdown">
                        <label>Программное обеспечение
                            <? if($arResult['SETTINGS']['PROPERTY_SOFTWARE_HINT_VALUE']):?>
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_SOFTWARE_HINT_VALUE']?>
                                    </div>
                                </div>
                            <? endif;?>
                        </label>
                        <div class="dropdown__button">
                            <span class="dropdown__title" style="display: none;">@@button</span>
                            <span class="dropdown__placeholder">Выбрать</span>
                            <div class="arrow"></div>
                            <input class="form-control" type="text" name="SOFTWARE">
                        </div>
                        <div class="dropdown__options">
                            <ul class="dropdown__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_SOFTWARE_VALUE'] as $item):?>
                                    <li class="dropdown__option" data-value="<?= $item?>"><?= $item?></li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                <? endif;?>
            </div>
            <div class="solution-config__server">
                <div class="solution-config__preview">
                    <h3>Ваш сервер:</h3>
                    <div class="solution-config__task">
                        <h4>Выполняет задачу:</h4>
                        <div class="solution-config__task-desc">
                            <div class="solution-config__task-list">
                                <div class="solution-config__task-item">
                                    <h5>Количество виртуальных машин:</h5>
                                    <span>10</span>
                                </div>
                                <div class="solution-config__task-item">
                                    <h5>Частота vCPU, GHz:</h5>
                                    <span>до 3,00 GHz</span>
                                </div>
                                <div class="solution-config__task-item">
                                    <h5>RAM на 1 виртуальную машину:</h5>
                                    <span>2.4.8.16.32.64.128</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="solution-config__main">
                    <? if($arResult['SETTINGS']['PROPERTY_PERIOD_VALUE']):?>
                        <div class="solution-config__time">
                            <div class="form-group input-radio ">
                                <label>Срок гарантии с выездом по месту установки
                                    <? if($arResult['SETTINGS']['PROPERTY_PERIOD_HINT_VALUE']):?>
                                        <div class="tip">
                                            <div class="tip__image">
                                                <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/question.svg" alt="#">
                                            </div>
                                            <div class="tip__text">
                                                <?= $arResult['SETTINGS']['PROPERTY_PERIOD_HINT_VALUE']?>
                                            </div>
                                        </div>
                                    <? endif;?>
                                </label>
                                <div class="input-radio__list">
                                    <? foreach ($arResult['SETTINGS']['PROPERTY_PERIOD_VALUE'] as $key => $item):?>
                                        <div class="input-radio__item">
                                            <input type="radio" name="PERIOD" value="<?= $item?>"<?= $key == 0 ? ' checked=""' : ''?> class="_filled">
                                            <div class="input-radio__button">
                                                <span></span>
                                                <h4><?= $item?></h4>
                                            </div>
                                        </div>
                                    <? endforeach;?>
                                </div>
                            </div>
                        </div>
                    <? endif;?>
                    <div class="solution-config__leasing">
                        <div class="form-group input-range _disabled">
                            <div class="input-range__preview">
                                <div class="form-group checkbox-container">
                                    <label class="checkbox">
                                        <input class="form-control _filled" name="leasing-agree" data-type="checkbox" type="checkbox">
                                        <span class="checkbox__label">Включить в КП лизинг — <span><b><span>12</span> мес</b></span></span>
                                        <span class="custom-checkbox"></span>
                                    </label>
                                </div>
                                <div class="input-range__wrapper">
                                    <input class="form-control _filled" name="leasing" required="" value="12" min="<?= $arResult['SETTINGS']['PROPERTY_LIMIT_FROM_VALUE']?>" max="<?= $arResult['SETTINGS']['PROPERTY_LIMIT_TO_VALUE']?>" step="1" data-type="range" type="range">
                                    <div class="input-range__captions">
                                        <span><?= $arResult['SETTINGS']['PROPERTY_LIMIT_FROM_VALUE']?> мес</span>
                                        <span><?= $arResult['SETTINGS']['PROPERTY_LIMIT_TO_VALUE']?> мес</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="btn btn_large btn_primary">
                        <span class="children">Получить КП с индивидуальной скидкой</span>
                        <a href="#choose-config" class="cover popup-link"></a>
                    </span>
                </div>
            </div>
        </div>
        <!--Добавить класс _open для раскрытия модалки-->
        <!-- При раскрытии модалки к body добавить класс _lock-->
        <div class="lock-padding popup popup-form" id="choose-config" style="padding-right: 0px;">
            <div class="popup__body">
                <div class="popup__content">
                    <div class="popup__wrapper">
                        <div class="popup-form__bg popup-form__bg_desktop" style="background-image: url('<?= SITE_TEMPLATE_PATH?>/files/images/choose_desktop.webp');"></div>
                        <div class="popup-form__bg popup-form__bg_mobile" style="background-image: url('<?= SITE_TEMPLATE_PATH?>/files/images/tender.webp');"></div>
                        <div class="popup-form__wrapper">
                            <div class="popup-form__preview">
                                <h2>Подготовим индивидуальное <br>
                                    предложение для вас</h2>
                            </div>
                            <div class="popup-form__container">
                                <div class="popup-form__form">
                                    <div class="popup-form__socials">
                                        <div class="choosing-social">
                                            <h3>Где вы хотите получить КП:</h3>
                                            <div class="choosing-social__list">
                                                <div class="choosing-social__item">
                                                    <input type="radio" name="choosing-social" value="Telegram" class="_filled">
                                                    <button>
                                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/tg.svg" alt="#">
                                                        <span>Telegram</span>
                                                    </button>
                                                </div>
                                                <div class="choosing-social__item">
                                                    <input type="radio" name="choosing-social" value="Whatsapp" class="_filled">
                                                    <button>
                                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/whats.svg" alt="#">
                                                        <span>Whatsapp</span>
                                                    </button>
                                                </div>
                                                <div class="choosing-social__item">
                                                    <input type="radio" name="choosing-social" value="E-mail" class="_filled">
                                                    <button>
                                                        <img src="<?= SITE_TEMPLATE_PATH?>/files/icons/mail.svg" alt="#">
                                                        <span>E-mail</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popup-form__inputs">
                                        <div class="form-group input__container input__container_text ">
                                            <input class="form-control " required="" name="name" data-type="text" type="text">
                                            <span class="input__label">Имя*</span>
                                        </div>

                                        <div class="form-group input__container input__container_phone">
                                            <input class="form-control input-tel" type="tel" minlength="18" name="phone" required="">
                                            <span class="input__label">Телефон*</span>
                                        </div>
                                    </div>
                                    <div class="form-group textarea__container">
                                        <textarea class="form-control" placeholder="Чем дополнить конфигурацию..." name="comment" data-type="textarea"></textarea>
                                    </div>
                                    <div class="popup-form__btns">
                                        <!--Для блокировки добавить класс _disabled-->
                                        <button class="btn btn_large btn_accent" type="submit">
                                            <span class="children">Получить КП</span>
                                        </button>
                                        <div class="billboard__policy">
                                             <a href="#" target="_blank">Нажимая на кнопку, вы даете согласие на обработку личных данных</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="popup-form__list">
                                    <div class="popup-form__block">
                                        <h3>HPE Proliant DL380 Gen10 CTO 8SFF</h3>
                                        <div class="popup-form__results">
                                            <div class="popup-form__result">
                                                <ul>
                                                    <li>1x2U Rack</li>
                                                    <li>1xXeon Silver 4208 (2.1 GHz, 8C, 85W)</li>
                                                    <li>1xXeon Silver 4208 (2.1 GHz, 8C, 85W)</li>
                                                    <li>1xXeon Silver 4208 (2.1 GHz, 8C, 85W)</li>
                                                    <li>1xXeon Silver 4208 (2.1 GHz, 8C, 85W)</li>
                                                </ul>
                                            </div>
                                            <div class="popup-form__result">
                                                <div class="popup-form__item">
                                                    <h4>Гарантия:</h4>
                                                    <span>3 года</span>
                                                </div>
                                                <div class="popup-form__item">
                                                    <h4>Лизинг:</h4>
                                                    <span>нет</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="popup__close close-btn">
				<img src="<?= SITE_TEMPLATE_PATH?>/files/icons/popup-close.svg" alt="#">
			</span>
                </div>
            </div>
        </div>
    </form>
</div>
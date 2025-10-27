<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<section class="section">
    <div class="container">
        <div class="choise-form">
            <form method="post">
                <div class="choise-form__wrapper">
                    <div class="choise-form__inputs">
                        <div class="accordion accordion_arrow _open">
                            <div class="accordion__title">
                                <h3>Отметьте ваших приоритетных производителей</h3>
                            </div>
                            <div class="accordion__content _open">
                                <div class="accordion__text _open">
                                    <div class="accordion__inputs">
                                        <input type="hidden" data-utm='src' name="src">
                                        <input type="hidden" data-utm='typ' name="typ">
                                        <input type="hidden" data-utm='mdm' name="mdm">
                                        <input type="hidden" data-utm='cmp' name="cmp">
                                        <input type="hidden" data-utm='cnt' name="cnt">
                                        <input type="hidden" data-utm='trm' name="trm">
                                        <input type="hidden" data-fill-url name="url">
                                        <div class="accordion__inputs" data-depend-inputs>
                                            <div data-characteristics-choice="radio">
                                                <div class="form-group input-radio ">
                                                    <div class="input-radio__title-container">
                                                        <label>Производители </label>
                                                    </div>
                                                    <div class="input-radio__list">
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="producers" value="Все"
                                                                   autocomplete="off"
                                                                   data-depend-input="all">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4>Все</h4>
                                                            </div>
                                                        </div>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="producers"
                                                                   value="Российские" autocomplete="off"
                                                                   data-depend-input="russian"
                                                                   data-tip="undefined">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4>Российские</h4>
                                                            </div>
                                                        </div>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="producers"
                                                                   value="Иностранные" autocomplete="off"
                                                                   data-depend-input="foreign"
                                                                   data-tip="undefined">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4>Иностранные</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choise-form__inputs-wrapper"
                                                 data-depend-input-container="russian"
                                                 data-characteristics-choice="radio">
                                                <div class="form-group input-radio ">
                                                    <div class="input-radio__title-container">
                                                        <label>Марка </label>
                                                    </div>
                                                    <div class="input-radio__list">
                                                        <? foreach ($arResult['SETTINGS']['PROPERTY_MANUFACTURES_RUS_VALUE'] as $item): ?>
                                                            <div class="input-radio__item">
                                                                <input type="radio" name="mark" value="<?= $item ?>"
                                                                       autocomplete="off">
                                                                <div class="input-radio__button">
                                                                    <span></span>
                                                                    <h4><?= $item ?></h4>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choise-form__inputs-wrapper"
                                                 data-depend-input-container="foreign"
                                                 data-characteristics-choice="radio">
                                                <div class="form-group input-radio ">
                                                    <div class="input-radio__title-container">
                                                        <label>Марка </label>
                                                    </div>
                                                    <div class="input-radio__list">
                                                        <? foreach ($arResult['SETTINGS']['PROPERTY_MANUFACTURES_FOREIGN_VALUE'] as $item): ?>
                                                            <div class="input-radio__item">
                                                                <input type="radio" name="mark" value="<?= $item ?>"
                                                                       autocomplete="off">
                                                                <div class="input-radio__button">
                                                                    <span></span>
                                                                    <h4><?= $item ?></h4>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choise-form__inputs-wrapper"
                                                 data-depend-input-container="all"
                                                 data-characteristics-choice="radio">
                                                <div class="form-group input-radio ">
                                                    <div class="input-radio__title-container">
                                                        <label>Марка </label>
                                                    </div>
                                                    <div class="input-radio__list">
                                                        <? foreach ($arResult['SETTINGS']['PROPERTY_MANUFACTURES_VALUE'] as $item): ?>
                                                            <div class="input-radio__item">
                                                                <input type="radio" name="mark"
                                                                       value="<?= $item ?>"
                                                                       autocomplete="off">
                                                                <div class="input-radio__button">
                                                                    <span></span>
                                                                    <h4><?= $item ?></h4>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Подбор по техническим характеристикам</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div class="accordion__inputs">
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Тип системы хранения </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_STORAGE_SYSTEM_TYPE_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="storage-system"
                                                                   value="<?= $item ?>"
                                                                   autocomplete="off">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Количество контроллеров </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CONTROLLER_NUMBER_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="controller-count"
                                                                   value="<?= $item ?>" autocomplete="off">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Интерфейс контроллера </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CONTROLLER_INTERFACE_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="controller-interface"
                                                                   value="<?= $item ?>" autocomplete="off">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group dropdown "
                                             data-characteristics-choice="dropdownOrCount">
                                            <label>Объем кеша контроллера </label>
                                            <div class="dropdown__button">
                                                <span class="dropdown__title"></span>
                                                <div class="arrow"></div>
                                                <input class="form-control" type="text" name="cache">
                                            </div>
                                            <div class="dropdown__options">
                                                <ul class="dropdown__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CACHE_VALUE'] as $item): ?>
                                                        <li class="dropdown__option" data-value="<?= $item ?>"
                                                            data-tip="undefined"><?= $item ?>
                                                        </li>
                                                    <? endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="accordion__inputs" data-depend-inputs>
                                            <div class="form-group checkbox-container">
                                                <span class="checkbox__title">SSD кеш
                                                    <div class="tip">
                                                        <div class="tip__image">
                                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                                 alt="#">
                                                        </div>
                                                        <div class="tip__text">
                                                            <?= $arResult['SETTINGS']['PROPERTY_SSD_CACHE_HINT_VALUE'] ?>
                                                        </div>
                                                    </div>
                                                </span>
                                                <label class="checkbox" data-depend-input="SSDcache">
                                                    <input class="form-control" name="SSD_cache" value="Нужен" data-type="checkbox"
                                                           type="checkbox">
                                                    <span class="checkbox__label">Нужен</span>
                                                    <span class="custom-checkbox"></span>
                                                </label>
                                            </div>
                                            <div class="choise-form__inputs-wrapper"
                                                 data-depend-input-container="SSDcache">
                                                <div class="form-group dropdown "
                                                     data-characteristics-choice="dropdownOrCount">
                                                    <label>Размер SSD кеша </label>
                                                    <div class="dropdown__button">
                                                        <span class="dropdown__title"></span>
                                                        <div class="arrow"></div>
                                                        <input class="form-control" type="text" name="cache-size">
                                                    </div>
                                                    <div class="dropdown__options">
                                                        <ul class="dropdown__list">
                                                            <? foreach ($arResult['SETTINGS']['PROPERTY_SSD_CACHE_VALUE'] as $item): ?>
                                                                <li class="dropdown__option" data-value="<?= $item ?>"
                                                                    data-tip="undefined"><?= $item ?>
                                                                </li>
                                                            <? endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Общий объем массива</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div class="accordion__inputs" data-depend-inputs>
                                        <div class="form-group input-radio ">
                                            <div class="input-radio__title-container">
                                                <label>Производители </label>
                                            </div>
                                            <div class="input-radio__list">
                                                <div class="input-radio__item">
                                                    <input type="radio" name="@@name"
                                                           value="Укажу общие объемы массивов (после RAID)"
                                                           autocomplete="off"
                                                           data-depend-input="custom-characteristics">
                                                    <div class="input-radio__button">
                                                        <span></span>
                                                        <h4>Укажу общие объемы массивов (после RAID)</h4>
                                                    </div>
                                                </div>
                                                <div class="input-radio__item">
                                                    <input type="radio" name="@@name"
                                                           value="Укажу нужные технические характиристики"
                                                           autocomplete="off"
                                                           data-depend-input="choose-characteristics"
                                                           data-tip="undefined">
                                                    <div class="input-radio__button">
                                                        <span></span>
                                                        <h4>Укажу нужные технические характиристики</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="choise-form__inputs-wrapper"
                                             data-depend-input-container="custom-characteristics">
                                            <div class="accordion__inputs">
                                                <div class="accordion__form" data-form="set">
                                                    <div class="accordion__team" data-form="team">
                                                        <div class="accordion__group" data-form="group">
                                                            <div data-characteristics-choice="radio">
                                                                <div class="form-group input-radio ">
                                                                    <div class="input-radio__title-container">
                                                                        <label>Тип данных </label>
                                                                    </div>
                                                                    <div class="input-radio__list">
                                                                        <? foreach ($arResult['SETTINGS']['PROPERTY_DATA_TYPE_VALUE'] as $item): ?>
                                                                            <div class="input-radio__item">
                                                                                <input type="radio" name="speed-type"
                                                                                       value="<?= $item ?>"
                                                                                       autocomplete="off">
                                                                                <div class="input-radio__button">
                                                                                    <span></span>
                                                                                    <h4><?= $item ?></h4>
                                                                                </div>
                                                                            </div>
                                                                        <? endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-characteristics-choice="dropdownOrCount">
                                                                <div class="form-group input-count">
                                                                    <label class="input-count__label">Объем массива
                                                                        (ТБ)</label>
                                                                    <div class="input-count__wrapper">
                                                                        <div class="input-count__btn input-count__btn_lower _disabled"></div>
                                                                        <input class="form-control " name="disk-size-TB"
                                                                               min="1" max="10000" data-type="number"
                                                                               type="number" autocomplete="off"
                                                                        >
                                                                        <div class="input-count__btn input-count__btn_uppper"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="input-set__append">
                                                        <span><b>Добавить еще один массив</b></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choise-form__inputs-wrapper"
                                             data-depend-input-container="choose-characteristics">
                                            <div class="accordion__inputs">
                                                <div class="accordion__form" data-form="set">
                                                    <div class="accordion__team" data-form="team">
                                                        <div class="accordion__group" data-form="group">
                                                            <div class="accordion__inputs">
                                                                <div class="form-group dropdown tasks-value"
                                                                     data-characteristics-choice="dropdownOrCount">
                                                                    <label>Форм-фактор жестких
                                                                        дисков </label>
                                                                    <div class="dropdown__button">
                                                                        <span class="dropdown__title"></span>
                                                                        <div class="arrow"></div>
                                                                        <input class="form-control" type="text"
                                                                               name="disc-form-factor">
                                                                    </div>
                                                                    <div class="dropdown__options">
                                                                        <ul class="dropdown__list">
                                                                            <? foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES'] as $item): ?>
                                                                                <li class="dropdown__option"
                                                                                    data-value="<?= $item['NAME'] ?>"
                                                                                    data-tip="undefined"><?= $item['NAME'] ?>
                                                                                </li>
                                                                            <? endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <? foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES'] as $key => $item): ?>
                                                                    <div data-task="<?= $item['NAME'] ?>"
                                                                         class="accardeon__tasks">
                                                                        <div class="accordion__inputs">
                                                                            <div class="form-group dropdown tasks-value"
                                                                                 data-characteristics-choice="dropdownOrCount">
                                                                                <label>Тип жестких дисков </label>
                                                                                <div class="dropdown__button">
                                                                                    <span class="dropdown__title"></span>
                                                                                    <div class="arrow"></div>
                                                                                    <input class="form-control"
                                                                                           type="text"
                                                                                           name="disc-type-<?= $key ?>">
                                                                                </div>
                                                                                <div class="dropdown__options">
                                                                                    <ul class="dropdown__list">
                                                                                        <? foreach ($item['TYPE'] as $type): ?>
                                                                                            <li class="dropdown__option"
                                                                                                data-value="<?= $type['NAME'] ?>"
                                                                                                data-tip="undefined"><?= $type['NAME'] ?>
                                                                                            </li>
                                                                                        <? endforeach; ?>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="accordion__inputs">
                                                                                <? foreach ($item['TYPE'] as $k => $type): ?>
                                                                                    <div data-task="<?= $type['NAME'] ?>"
                                                                                         class="accardeon__tasks">
                                                                                        <div class="form-group dropdown "
                                                                                             data-characteristics-choice="dropdownOrCount">
                                                                                            <label>Модель жесткого
                                                                                                диска </label>
                                                                                            <div class="dropdown__button">
                                                                                                <span class="dropdown__title"></span>
                                                                                                <div class="arrow"></div>
                                                                                                <input class="form-control"
                                                                                                       type="text"
                                                                                                       name="disc-model-<?= $key . '-' . $k ?>">
                                                                                            </div>
                                                                                            <div class="dropdown__options">
                                                                                                <ul class="dropdown__list">
                                                                                                    <? foreach ($type['MODEL'] as $model): ?>
                                                                                                        <li class="dropdown__option"
                                                                                                            data-value="<?= $model['NAME'] ?>"
                                                                                                            data-tip="undefined">
                                                                                                            <?= $model['NAME'] ?>
                                                                                                        </li>
                                                                                                    <? endforeach; ?>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <? endforeach; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <? endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="input-set__append"><span><b>Добавить диски</b></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Дополнительные опции</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div class="accordion__inputs">
                                        <div class="form-group checkbox-container">
                                            <span class="checkbox__title">Сервисные услуги
                                                <div class="tip">
                                                    <div class="tip__image">
                                                        <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                             alt="#">
                                                    </div>
                                                    <div class="tip__text">
                                                        <?= $arResult['SETTINGS']['PROPERTY_ADDITIONAL_SERVICES_HINT_VALUE'] ?>
                                                    </div>
                                                </div>
                                            </span>
                                            <? foreach ($arResult['SETTINGS']['PROPERTY_ADDITIONAL_SERVICES_VALUE'] as $item): ?>
                                                <label class="checkbox" data-characteristics-choice="checkbox">
                                                    <input class="form-control" name="additional-services[]"
                                                           value="<?= $item ?>" data-type="checkbox" type="checkbox">
                                                    <span class="checkbox__label"><?= $item ?></span>
                                                    <span class="custom-checkbox"></span>
                                                </label>
                                            <? endforeach; ?>
                                        </div>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Количество подключенных серверов </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CONNECTED_SERVER_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="connected-servers-count"
                                                                   value="<?= $item ?>"
                                                                   autocomplete="off">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group checkbox-container">
                                            <span class="checkbox__title">SAN-коммутатор
                                                <div class="tip">
                                                    <div class="tip__image">
                                                        <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                             alt="#">
                                                    </div>
                                                    <div class="tip__text">
                                                        <?= $arResult['SETTINGS']['PROPERTY_SAN_HINT_VALUE'] ?>
                                                    </div>
                                                </div>
                                            </span>
                                            <label class="checkbox" data-characteristics-choice="checkbox">
                                                <input class="form-control" name="SAN-comutator" value="да"
                                                       data-type="checkbox" type="checkbox">
                                                <span class="checkbox__label">SAN-коммутатор</span>
                                                <span class="custom-checkbox"></span>
                                            </label>
                                        </div>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>ИБП </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_UPS_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="ups" value="<?= $item ?>"
                                                                   autocomplete="off">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group input-radio ">
                                            <div class="input-radio__title-container">
                                                <label>Гарантия </label>
                                            </div>
                                            <div class="input-radio__list">
                                                <? foreach ($arResult['SETTINGS']['PROPERTY_WARRANTY_VALUE'] as $item): ?>
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="waranty" value="<?= $item ?>"
                                                               autocomplete="off" undefined
                                                               data-tip="undefined">
                                                        <div class="input-radio__button">
                                                            <span></span>
                                                            <h4><?= $item ?></h4>
                                                        </div>
                                                    </div>
                                                <? endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="choise-form__info">
                        <h3>Ваша будущая СХД:</h3>
                        <div class="solution-config__task">
                            <h4>Соответствует техническим характеристикам:</h4>
                            <div class="solution-config__task-desc">
                                <div class="solution-config__task-list"
                                     data-characteristics-choice-container>
                                    <!-- <div class="solution-config__task-item">
                            <h5>Производитель:</h5>
                            <span>dell</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Тип системы хранения:</h5>
                            <span>сервер для 1с</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Интерфейс контроллера:</h5>
                            <span>rack</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Количество портов контроллера:</h5>
                            <span>1u</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Объем кеша контроллера:</h5>
                            <span>1</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>SSD кеш:</h5>
                            <span>да</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Тип данных:</h5>
                            <span>intex xeon 3-gen</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Объем массива:</h5>
                            <span>16 Gb</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Количество дисков:</h5>
                            <span>HDD</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Форм-фактор жестких дисков:</h5>
                            <span>3.5 LFF</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Тип дисков:</h5>
                            <span>1.2</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Модели жестких дисков:</h5>
                            <span>RAID</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Расширенные функции:</h5>
                            <span>1</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>Количество подключенных серверов:</h5>
                            <span>800</span>
                        </div>
                        <div class="solution-config__task-item">
                            <h5>ИБП:</h5>
                            <span>нет</span>
                        </div> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group checkbox-container">
                            <span class="checkbox__title">Сервисные услуги
                                <div class="tip">
                                    <div class="tip__image">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        <?= $arResult['SETTINGS']['PROPERTY_SERVICE_HINT_VALUE'] ?>
                                    </div>
                                </div>
                            </span>
                            <? foreach ($arResult['SETTINGS']['PROPERTY_SERVICE_VALUE'] as $item): ?>
                                <label class="checkbox" undefined>
                                    <input class="form-control" value="<?= $item ?>" name="service[]" data-type="checkbox"
                                           type="checkbox">
                                    <span class="checkbox__label"><?= $item ?></span>
                                    <span class="custom-checkbox"></span>
                                </label>
                            <? endforeach; ?>
                        </div>

                        <div class="form-group input-radio input-radio_column input-radio_transparent">
                            <div class="input-radio__title-container">
                                <label>Наличие
                                    <div class="tip">
                                        <div class="tip__image">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg" alt="#">
                                        </div>
                                        <div class="tip__text">
                                            <?= $arResult['SETTINGS']['PROPERTY_RPS_HINT_VALUE'] ?>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="input-radio__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_RPS_VALUE'] as $item): ?>
                                    <div class="input-radio__item">
                                        <input type="radio" name="RPS" value="<?= $item ?>" autocomplete="off"
                                               undefined data-tip="undefined">
                                        <div class="input-radio__button">
                                            <span></span>
                                            <h4><?= $item ?></h4>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <span class="btn btn_large btn_primary" data-send-form>
                            <span class="children">Получить КП с индивидуальной скидкой</span>
                            <a href="#choose" class="cover popup-link"></a>
                        </span>
                    </div>
                </div>
                <!--Добавить класс _open для раскрытия модалки-->
                <!-- При раскрытии модалки к body добавить класс _lock-->
                <div class="lock-padding popup popup-form" id="choose">
                    <div class="popup__body">
                        <div class="popup__content">
                            <div class="popup__wrapper">
                                <div class="popup-form__bg popup-form__bg_desktop"
                                     style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/choose_desktop.webp');"></div>
                                <div class="popup-form__bg popup-form__bg_mobile"
                                     style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/tender.webp');"></div>
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
                                                            <input type="radio" name="choosing-social"
                                                                   value="Telegram">
                                                            <button>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/tg.svg"
                                                                     alt="#">
                                                                <span>Telegram</span>
                                                            </button>
                                                        </div>
                                                        <div class="choosing-social__item">
                                                            <input type="radio" name="choosing-social"
                                                                   value="Whatsapp">
                                                            <button>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/whats.svg"
                                                                     alt="#">
                                                                <span>Whatsapp</span>
                                                            </button>
                                                        </div>
                                                        <div class="choosing-social__item">
                                                            <input type="radio" name="choosing-social"
                                                                   value="E-mail">
                                                            <button>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/mail.svg"
                                                                     alt="#">
                                                                <span>E-mail</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="popup-form__inputs">
                                                <div class="form-group input__container input__container_text ">
                                                    <input class="form-control " required name="name"
                                                           data-type="text" type="text" autocomplete="off">
                                                    <span class="input__label">Имя*</span>
                                                </div>

                                                <div class="form-group input__container input__container_phone">
                                                    <input class="form-control input-tel" type="text"
                                                           data-type="tel" minlength="16" name="phone"
                                                           required autocomplete="off">
                                                    <span class="input__label">Телефон*</span>
                                                </div>
                                            </div>

                                            <div class="form-group textarea__container">

                                                            <textarea class="form-control"
                                                                      placeholder="Чем дополнить конфигурацию..."
                                                                      name="comment" data-type="textarea"></textarea>
                                            </div>
                                            <div class="popup-form__btns">
                                                <!--Для блокировки добавить класс _disabled-->
                                                <button class="btn btn_large btn_accent" type="submit">

                                                    <span class="children">Получить КП</span>

                                                </button>
                                                <div class="billboard__policy">
                                                     <a
                                                            href="/privacy-policy/" target="_blank">Нажимая на кнопку, вы даете согласие на обработку личных данных</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popup-form__list">
                                            <div class="popup-form__block" data-form-res=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="popup__close close-btn">
				<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/popup-close.svg" alt="#">
			</span>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<?php if(isset($_GET['success']) && $_GET['success'] == 'yes'):?>
    <script>
        const url = new URL(document.location);
        const searchParams = url.searchParams;
        searchParams.delete("success"); // удалить параметр "test"
        window.history.pushState({}, '', url.toString());

        document.querySelector('#successful-submission-form').classList.add('_open')
        // document.querySelector('body').classList.remove('_lock')
        document.querySelectorAll('.popup__close').forEach(function (el){
            el.addEventListener('click', function (){
                document.querySelector('body').classList.remove('_lock')
                document.querySelector('#catch').classList.remove('_open')
            })
        })
    </script>
<?php endif;?>
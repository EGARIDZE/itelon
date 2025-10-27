<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
//mpr($arResult['SETTINGS']);
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
                            <div class="accordion__content ">
                                <div class="accordion__text _open">
                                    <div class="accordion__inputs" data-depend-inputs>
                                        <input type="hidden" data-utm='src' name="src">
                                        <input type="hidden" data-utm='typ' name="typ">
                                        <input type="hidden" data-utm='mdm' name="mdm">
                                        <input type="hidden" data-utm='cmp' name="cmp">
                                        <input type="hidden" data-utm='cnt' name="cnt">
                                        <input type="hidden" data-utm='trm' name="trm">
                                        <input type="hidden" data-fill-url name="url">
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Производители </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="producers" value="Все"
                                                               autocomplete="off" data-depend-input="all">
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
                        <div class="accordion accordion_arrow _open">
                            <div class="accordion__title">
                                <h3>Укажите основную и дополнительные задачи сервера</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text _open">
                                    <div class="accordion__form" data-form="set">
                                        <div class="accordion__team" data-form="team" data-task-wrap>
                                            <div class="accordion__group" data-form="group"
                                                 data-part-of-task>
                                                <div class="accordion__inputs tasks-list">
                                                    <div class="form-group dropdown tasks-value"
                                                         data-task-input>

                                                        <label>Задача </label>

                                                        <div class="dropdown__button">
                                                            <span class="dropdown__title">Сервер для видеонаблюдения</span>

                                                            <div class="arrow"></div>
                                                            <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    name="task"
                                                                    value="Сервер для видеонаблюдения"


                                                            >
                                                        </div>
                                                        <div class="dropdown__options">
                                                            <ul class="dropdown__list">

                                                                <li class="dropdown__option _selected"
                                                                    data-value="Сервер для видеонаблюдения">
                                                                    Сервер для видеонаблюдения
                                                                </li>


                                                                <li class="dropdown__option"
                                                                    data-value="Сервер виртуализации"
                                                                    data-tip="undefined">Сервер
                                                                    виртуализации
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Сервер баз данных"
                                                                    data-tip="undefined">Сервер баз данных
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы с GPU"
                                                                    data-tip="undefined">Серверы с GPU
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы для анализа данных"
                                                                    data-tip="undefined">Серверы для анализа
                                                                    данных
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы для машинного обучения"
                                                                    data-tip="undefined">Серверы для
                                                                    машинного обучения
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Терминальный сервер"
                                                                    data-tip="undefined">Терминальный сервер
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Почтовый сервер"
                                                                    data-tip="undefined">Почтовый сервер
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы для проектирования и моделирования (CAD/CAM/BIM/3D)"
                                                                    data-tip="undefined">Серверы для
                                                                    проектирования и моделирования
                                                                    (CAD/CAM/BIM/3D)
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы для IP-телефонии"
                                                                    data-tip="undefined">Серверы для
                                                                    IP-телефонии
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Серверы для хостинга (Web-серверы)"
                                                                    data-tip="undefined">Серверы для
                                                                    хостинга (Web-серверы)
                                                                </li>

                                                                <li class="dropdown__option"
                                                                    data-value="Сервер для 1С"
                                                                    data-tip="undefined">Сервер для 1С
                                                                </li>

                                                            </ul>
                                                        </div>


                                                    </div>

                                                    <div data-task="Сервер для видеонаблюдения"
                                                         class="accardeon__tasks _open">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество камер </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_video-cameras-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество камер до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество камер до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество камер до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество камер до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество камер больше 500"
                                                                            data-tip="undefined">больше 500
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Разрешение видео </label>


                                                                </div>
                                                                <div class="input-radio__list">


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_video-resolution"
                                                                               value="Разрешение видео 720p"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>720p</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_video-resolution"
                                                                               value="Разрешение видео 1080p"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1080p</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_video-resolution"
                                                                               value="Разрешение видео 4K" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>4К</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group dropdown ">

                                                                <label>Объём хранилища (TB) </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_video-capacity"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Объём хранилища (TB) до 1"
                                                                            data-tip="undefined">до 1
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём хранилища (TB) до 5"
                                                                            data-tip="undefined">до 5
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём хранилища (TB) до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём хранилища (TB) больше 10"
                                                                            data-tip="undefined">больше 10
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранения данных </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_video-hard-drive"
                                                                               value="Тип хранения данных SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SDD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_video-hard-drive"
                                                                               value="Тип хранения данных HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Резервное копирование </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_video-backup"
                                                                               value="Резервное копирование Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_video-backup"
                                                                               value="Резервное копирование Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Сервер виртуализации"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество виртуальных машин </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_virtual-machines-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество виртуальных машин до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество виртуальных машин до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество виртуальных машин до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество виртуальных машин до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество виртуальных машин больше 500"
                                                                            data-tip="undefined">больше 500
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>Объем оперативной памяти</label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_virtual-machines-RAM"
                                                                                   value="Объем оперативной памяти 2"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_virtual-machines-RAM"
                                                                                   value="Объем оперативной памяти 16"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_virtual-machines-RAM"
                                                                                   value="Объем оперативной памяти 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_virtual-machines-RAM"
                                                                                   value="Объем оперативной памяти 64"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_virtual-machines-RAM"
                                                                                   value="Объем оперативной памяти 128"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>2</span>

                                                                        <span>16</span>

                                                                        <span>32</span>

                                                                        <span>64</span>

                                                                        <span>128</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип гипервизора </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-hypervizor"
                                                                               value="Тип гипервизора На аппаратном уровне"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>На аппаратном уровне</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-hypervizor"
                                                                               value="Тип гипервизора На на базе ОС"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>На на базе ОС</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранения данных </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-hard-drive"
                                                                               value="Тип хранения данных SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-hard-drive"
                                                                               value="Тип хранения данных HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-hard-drive"
                                                                               value="Тип хранения данных NVMe"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NVMe</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Резервное копирование </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-backup"
                                                                               value="Резервное копирование Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_virtual-machines-backup"
                                                                               value="Резервное копирование Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-task="Сервер баз данных"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">
                                                                <label>Объём данных TB </label>
                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>
                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_db-capacity">
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Объём данных TB до 1"
                                                                            data-tip="undefined">до 1
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём данных TB до 5"
                                                                            data-tip="undefined">до 5
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём данных TB до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём данных TB более 10"
                                                                            data-tip="undefined">более 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объём данных TB более 500"
                                                                            data-tip="undefined">более 500
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип базы данных </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type" value="Тип базы данных SQL"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SQL</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type"
                                                                               value="Тип базы данных NoSQL"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NoSQL</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type"
                                                                               value="Тип базы данных Graph"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Graph</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type"
                                                                               value="Тип базы данных NewSQL"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NewSQL</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type"
                                                                               value="Тип базы данных Key-Value"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Key-Value</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-db-type"
                                                                               value="Тип базы данных Другой"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Другой</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group dropdown ">

                                                                <label>Число пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_db-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Число пользователей до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Число пользователей до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Число пользователей до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Число пользователей более 100"
                                                                            data-tip="undefined">более 100
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранения данных </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_db-hard-drive"
                                                                               value="Тип хранения данных SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_db-hard-drive"
                                                                               value="Тип хранения данных HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип резервного
                                                                        копирования </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio" name="tk_item_db-backup"
                                                                               value="Тип резервного
                                                                        копирования Полное"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Полное</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio" name="tk_item_db-backup"
                                                                               value="Тип резервного
                                                                        копирования Инкрементное"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Инкрементное</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio" name="tk_item_db-backup"
                                                                               value="Тип резервного
                                                                        копирования Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы с GPU" class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Количество GPU </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_gpu-number" value="Количество GPU 1"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-number" value="Количество GPU 2"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>2</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-number" value="Количество GPU 4"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>4</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-number" value="Количество GPU 8"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>8</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-number"
                                                                               value="Количество GPU больше 8"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>больше 8</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>Объём VRAM на GPU (ГБ)</label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_gpu-vram" value="Объём VRAM на GPU (ГБ) 4"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_gpu-vram" value="Объём VRAM на GPU (ГБ) 8"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_gpu-vram"
                                                                                   value="Объём VRAM на GPU (ГБ) 16"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_gpu-vram"
                                                                                   value="Объём VRAM на GPU (ГБ) 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_gpu-vram"
                                                                                   value="Объём VRAM на GPU (ГБ) 64"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>4</span>

                                                                        <span>8</span>

                                                                        <span>16</span>

                                                                        <span>32</span>

                                                                        <span>64</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип нагрузки </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_gpu-load-type"
                                                                               value="Тип нагрузки Машинное обучение"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Машинное обучение</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-load-type"
                                                                               value="Тип нагрузки Видеонаблюдение"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Видеонаблюдение</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-load-type"
                                                                               value="Тип нагрузки Графика и рендеринг"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Графика и рендеринг</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-load-type"
                                                                               value="Тип нагрузки Высокопроизводительные вычисления"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Высокопроизводительные
                                                                                вычисления</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип GPU </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio" name="tk_item_gpu-type"
                                                                               value="Тип GPU NVIDIA"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NVIDIA</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio" name="tk_item_gpu-type"
                                                                               value="Тип GPU AMD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>AMD</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio" name="tk_item_gpu-type"
                                                                               value="Тип GPU FPGA"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>FPGA</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка виртуализации
                                                                        GPU </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_gpu-virtualization"
                                                                               value="Поддержка виртуализации
                                                                        GPU Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_gpu-virtualization"
                                                                               value="Поддержка виртуализации
                                                                        GPU Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы для анализа данных"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Объем данных </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_analysis-capacity"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">

                                                                        <li class="dropdown__option _selected"
                                                                            data-value="@@value"></li>


                                                                        <li class="dropdown__option"
                                                                            data-value="Объем данных До 1 ТБ"
                                                                            data-tip="undefined">До 1 ТБ
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объем данных До 10 ТБ"
                                                                            data-tip="undefined">До 10 ТБ
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объем данных До 100 ТБ"
                                                                            data-tip="undefined">До 100 ТБ
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Объем данных Более 100 ТБ"
                                                                            data-tip="undefined">Более 100
                                                                            ТБ
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранилища </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_analysis-storage-type"
                                                                               value="Тип хранилища SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-storage-type"
                                                                               value="Тип хранилища HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-storage-type"
                                                                               value="Тип хранилища Облачное хранилище"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Облачное хранилище</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Инструменты анализа </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_analysis-tool"
                                                                               value="Инструменты анализа Встроенные"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Встроенные</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-tool"
                                                                               value="Внешние"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Внешние</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-tool"
                                                                               value="Инструменты анализа Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип анализа </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_analysis-type"
                                                                               value="Тип анализа Статистический"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Статистический</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-type"
                                                                               value="Тип анализа Машинное обучение"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Машинное обучение</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-type"
                                                                               value="Анализ больших данных (Big Data)"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Анализ больших данных (Big
                                                                                Data)</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-type"
                                                                               value="Тип анализа Визуализация данных"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Визуализация данных</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка параллельной
                                                                        обработки </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_analysis-paralel-processing"
                                                                               value="Поддержка параллельной
                                                                        обработки Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_analysis-paralel-processing"
                                                                               value="Поддержка параллельной
                                                                        обработки Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы для машинного обучения"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Количество GPU </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-gpu-number"
                                                                               value="Количество GPU 1" autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-gpu-number"
                                                                               value="Количество GPU 2" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>2</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-gpu-number"
                                                                               value="Количество GPU 4" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>4</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-gpu-number"
                                                                               value="Количество GPU 8" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>8</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-gpu-number"
                                                                               value="Количество GPU больше 8"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>больше 8</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип задач </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-type"
                                                                               value="Тип задач Обучение моделей"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Обучение моделей</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-type"
                                                                               value="Тип задач Инференс"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Инференс</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-type"
                                                                               value="Тип задач Обработка данных"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Обработка данных</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>Объём VRAM на GPU GB </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_machine-learning-vram"
                                                                                   value="Объём VRAM на GPU GB 16"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_machine-learning-vram"
                                                                                   value="Объём VRAM на GPU GB 24"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_machine-learning-vram"
                                                                                   value="Объём VRAM на GPU GB 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_machine-learning-vram"
                                                                                   value="Объём VRAM на GPU GB 48"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>16</span>

                                                                        <span>24</span>

                                                                        <span>32</span>

                                                                        <span>48</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип анализа </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-analysis-type"
                                                                               value="Тип анализа NVIDIA"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NVIDIA</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-analysis-type"
                                                                               value="Тип анализа AMD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>AMD</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-analysis-type"
                                                                               value="Тип анализа FPGA"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>FPGA</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка контейнеров </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-container-support"
                                                                               value="Поддержка контейнеров Да (Docker, Kubernetes)"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да (Docker, Kubernetes)</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_machine-learning-container-support"
                                                                               value="Поддержка контейнеров Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Терминальный сервер"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Кол-во пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_terminal-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Кол-во пользователей до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Кол-во пользователей до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Кол-во пользователей до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Кол-во пользователей больше 500"
                                                                            data-tip="undefined">больше 500
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип подключения </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_terminal-connection-type"
                                                                               value="Тип подключения RDP"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>RDP</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_terminal-connection-type"
                                                                               value="Тип подключения VDI"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>VDI</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>RAM (ГБ) </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_terminal-ram"
                                                                                   value="RAM (ГБ) 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_terminal-ram"
                                                                                   value="RAM (ГБ) 64"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_terminal-ram"
                                                                                   value="RAM (ГБ) 128"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_terminal-ram"
                                                                                   value="RAM (ГБ) 256"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>32</span>

                                                                        <span>64</span>

                                                                        <span>128</span>

                                                                        <span>256</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранилища </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_terminal-storage-type"
                                                                               value="Тип хранилища SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_terminal-storage-type"
                                                                               value="Тип хранилища HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Резервное копирование </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_terminal-backup"
                                                                               value="Резервное копирование Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_terminal-backup"
                                                                               value="Резервное копирование Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Почтовый сервер"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_mail-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 1000"
                                                                            data-tip="undefined">до 1000
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 5000"
                                                                            data-tip="undefined">до 5000
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="до 10000"
                                                                            data-tip="undefined">до 10000
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей больше 10000"
                                                                            data-tip="undefined">больше
                                                                            10000
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>Объем хранилища на
                                                                    пользователя </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_mail-capacity-value"
                                                                                   value="Объем хранилища на
                                                                    пользователя 1"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_mail-capacity-value"
                                                                                   value="Объем хранилища на
                                                                    пользователя 5"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_mail-capacity-value"
                                                                                   value="Объем хранилища на
                                                                    пользователя 10"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_mail-capacity-value"
                                                                                   value="Объем хранилища на
                                                                    пользователя 20"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>1</span>

                                                                        <span>5</span>

                                                                        <span>10</span>

                                                                        <span>20</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип почтового сервиса </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_mail-service-type"
                                                                               value="Тип почтового сервиса SMTP"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SMTP</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_mail-service-type"
                                                                               value="Тип почтового сервиса IMAP"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>IMAP</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_mail-service-type"
                                                                               value="Тип почтового сервиса POP3"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>POP3</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранилища </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_mail-storage-type"
                                                                               value="Тип хранилища SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_mail-storage-type"
                                                                               value="Тип хранилища HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка безопасности </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_mail-encryption-type"
                                                                               value="Поддержка безопасности SSL/TLS"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSL/TLS</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_mail-encryption-type"
                                                                               value="Поддержка безопасности Без шифрования"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Без шифрования</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы для проектирования и моделирования (CAD/CAM/BIM/3D)"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_engineering-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей больше 100"
                                                                            data-tip="undefined">больше 100
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>


                                                            <div class="form-group input-radio-castom ">
                                                                <label>GPU VRAM (ГБ) </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_engineering-gpu-vram"
                                                                                   value="GPU VRAM (ГБ) 8"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_engineering-gpu-vram"
                                                                                   value="GPU VRAM (ГБ) 16"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_engineering-gpu-vram"
                                                                                   value="GPU VRAM (ГБ) 24"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_engineering-gpu-vram"
                                                                                   value="GPU VRAM (ГБ) 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>8</span>

                                                                        <span>16</span>

                                                                        <span>24</span>

                                                                        <span>32</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Качество рендеринга </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_engineering-render-quality"
                                                                               value="Качество рендеринга Стандартное"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Стандартное</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_engineering-render-quality"
                                                                               value="Качество рендеринга Высокое"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Высокое</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_engineering-render-quality"
                                                                               value="Качество рендеринга Очень высокое"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Очень высокое</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип GPU </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_engineering-gpu"
                                                                               value="Тип GPU NVIDIA"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>NVIDIA</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_engineering-gpu"
                                                                               value="Тип GPU AMD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>AMD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка виртуализации </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_engineering-virtualization"
                                                                               value="Поддержка виртуализации Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_engineering-virtualization"
                                                                               value="Поддержка виртуализации Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы для IP-телефонии"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_ip-phone-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">

                                                                        <li class="dropdown__option _selected"
                                                                            data-value="@@value"></li>


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей больше 100"
                                                                            data-tip="undefined">больше 100
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Пропускная способность сети
                                                                        (Gbps) </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-network-bandwidth"
                                                                               value="Пропускная способность сети
                                                                        (Gbps) 1" autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-network-bandwidth"
                                                                               value="2.5"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>2.5</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-network-bandwidth"
                                                                               value="Пропускная способность сети
                                                                        (Gbps) 5" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>5</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-network-bandwidth"
                                                                               value="Пропускная способность сети
                                                                        (Gbps) 10" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>10</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>Объем хранилища для записей
                                                                    (ГБ) </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_ip-phone-storage-size"
                                                                                   value="Объем хранилища для записей
                                                                    (ГБ) 10"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_ip-phone-storage-size"
                                                                                   value="Объем хранилища для записей
                                                                    (ГБ) 50"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_ip-phone-storage-size"
                                                                                   value="Объем хранилища для записей
                                                                    (ГБ) 100"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_ip-phone-storage-size"
                                                                                   value="Объем хранилища для записей
                                                                    (ГБ) 500"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>10</span>

                                                                        <span>50</span>

                                                                        <span>100</span>

                                                                        <span>500</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Качество связи </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-connection-quality"
                                                                               value="Качество связи Стандартное"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Стандартное</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-connection-quality"
                                                                               value="Качество связи Высокое"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Высокое</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-connection-quality"
                                                                               value="Качество связи Очень высокое"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Очень высокое</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Поддержка интеграции </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-integration-support"
                                                                               value="Поддержка интеграции CRM системы"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>CRM системы</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-integration-support"
                                                                               value="Поддержка интеграции Веб-интерфейсы"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Веб-интерфейсы</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_ip-phone-integration-support"
                                                                               value="Поддержка интеграции Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Серверы для хостинга (Web-серверы)"
                                                         class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество сайтов </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_hosting-sites-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество сайтов до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество сайтов до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество сайтов до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Пропускная способность сети
                                                                        (Gbps) </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_hosting-network-bandwidth"
                                                                               value="Количество сайтов 1" autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-network-bandwidth"
                                                                               value="Количество сайтов 2.5"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>2.5</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-network-bandwidth"
                                                                               value="Количество сайтов 5" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>5</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-network-bandwidth"
                                                                               value="Количество сайтов 10" autocomplete="off"
                                                                               undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>10</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хостинга </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_hosting-type"
                                                                               value="Тип хостинга Виртуальный"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Виртуальный</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-type"
                                                                               value="Тип хостинга Выделенный"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Выделенный</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-type"
                                                                               value="Тип хостинга Облачный"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Облачный</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип хранилища </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_hosting-storage-type"
                                                                               value="Тип хранилища SSD"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>SSD</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-storage-type"
                                                                               value="Тип хранилища HDD"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>HDD</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Резервное копирование </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_hosting-backup"
                                                                               value="Резервное копирование Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_hosting-backup"
                                                                               value="Резервное копирование Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div data-task="Сервер для 1С" class="accardeon__tasks">
                                                        <div class="accordion__inputs">
                                                            <div class="form-group dropdown ">

                                                                <label>Количество пользователей </label>

                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>

                                                                    <div class="arrow"></div>
                                                                    <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="tk_item_1c-users-number"


                                                                    >
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">


                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 10"
                                                                            data-tip="undefined">до 10
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 50"
                                                                            data-tip="undefined">до 50
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 100"
                                                                            data-tip="undefined">до 100
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей до 500"
                                                                            data-tip="undefined">до 500
                                                                        </li>

                                                                        <li class="dropdown__option"
                                                                            data-value="Количество пользователей больше 500"
                                                                            data-tip="undefined">больше 500
                                                                        </li>

                                                                    </ul>
                                                                </div>


                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Частота CPU GHz </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_1c-cpu-frequency"
                                                                               value="Частота CPU GHz до 2.0"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>до 2.0</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_1c-cpu-frequency"
                                                                               value="Частота CPU GHz до 2.5"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>до 2.5</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_1c-cpu-frequency"
                                                                               value="Частота CPU GHz до 3.0"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>до 3.0</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_1c-cpu-frequency"
                                                                               value="Частота CPU GHz больше 3.0"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>больше 3.0</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio-castom ">
                                                                <label>RAM (ГБ) </label>
                                                                <div class="input-radio-castom__wrapper">
                                                                    <div class="input-radio-castom__inputs">
                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_1c-ram" value="RAM (ГБ) 8"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_1c-ram" value="RAM (ГБ) 16"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_1c-ram" value="RAM (ГБ) 32"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_1c-ram" value="RAM (ГБ) 64"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                        <div class="input-radio-castom__input">
                                                                            <input type="radio"
                                                                                   name="tk_item_1c-ram" value="RAM (ГБ) 128"
                                                                                   autocomplete="off">
                                                                            <span></span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="input-radio-castom__captions">
                                                                        <span>8</span>

                                                                        <span>16</span>

                                                                        <span>32</span>

                                                                        <span>64</span>

                                                                        <span>128</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Тип базы данных </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio"
                                                                               name="tk_item_1c-db-type"
                                                                               value="Тип базы данных MS SQL Server"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>MS SQL Server</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_1c-db-type"
                                                                               value="Тип базы данных PostgreSQL"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>PostgreSQL</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-radio__item">
                                                                        <input type="radio"
                                                                               name="tk_item_1c-db-type"
                                                                               value="Тип базы данных 1С:Предпр"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>1С:Предприятие</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <div class="form-group input-radio ">
                                                                <div class="input-radio__title-container">

                                                                    <label>Резервное копирование </label>


                                                                </div>
                                                                <div class="input-radio__list">

                                                                    <div class="input-radio__item">

                                                                        <input type="radio" name="tk_item_1c-backup"
                                                                               value="Тип базы данных Да"
                                                                               autocomplete="off">


                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Да</h4>
                                                                        </div>
                                                                    </div>


                                                                    <div class="input-radio__item">
                                                                        <input type="radio" name="tk_item_1c-backup"
                                                                               value="Тип базы данных Нет"
                                                                               autocomplete="off" undefined
                                                                               data-tip="undefined">
                                                                        <div class="input-radio__button">
                                                                            <span></span>
                                                                            <h4>Нет</h4>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="input-set__append">
                                            <span><b>Добавить задачу</b></span></button>
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
                                                    <label>Корпус </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CORPUS_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="corpus" value="<?= $item ?>"
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
                                                    <label>Высота корпуса </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_CORPUS_HEIGHT_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="corpus-height"
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
                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Вычислительная мощность</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div class="accordion__inputs" data-depend-inputs>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Количество процессоров </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_NUMBER_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="number-processors"
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
                                                    <label>Производитель процессоров </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="chip-maker"
                                                                   value="<?= $item ?>" autocomplete="off"
                                                                   data-depend-input="<?= $item ?>">
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <? foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK'] as $item): ?>
                                            <? if (!empty($item['FAMILY'])): ?>
                                                <div class="choise-form__inputs-wrapper"
                                                     data-depend-input-container="<?= $item['NAME'] ?>">
                                                    <div class="accordion__group">
                                                        <div class="accordion__inputs tasks-list">
                                                            <div class="form-group dropdown tasks-value"
                                                                 data-characteristics-choice="dropdownOrCount">
                                                                <label>Семейство процессоров </label>
                                                                <div class="dropdown__button">
                                                                    <span class="dropdown__title"></span>
                                                                    <div class="arrow"></div>
                                                                    <input class="form-control" type="text" name="chip-family">
                                                                </div>
                                                                <div class="dropdown__options">
                                                                    <ul class="dropdown__list">
                                                                        <? foreach ($item['FAMILY'] as $family): ?>
                                                                            <li class="dropdown__option"
                                                                                data-value="<?= $family['NAME'] ?>"
                                                                                data-tip="undefined"><?= $family['NAME'] ?>
                                                                            </li>
                                                                        <? endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <? foreach ($item['FAMILY'] as $family): ?>
                                                                <div data-task="<?= $family['NAME'] ?>"
                                                                     class="accardeon__tasks">
                                                                    <div class="accordion__inputs">
                                                                        <div class="form-group dropdown "
                                                                             data-characteristics-choice="dropdownOrCount">
                                                                            <label>Модель процессоров </label>
                                                                            <div class="dropdown__button">
                                                                                <span class="dropdown__title"></span>
                                                                                <div class="arrow"></div>
                                                                                <input class="form-control" type="text" name="chip-model">
                                                                            </div>
                                                                            <div class="dropdown__options">
                                                                                <ul class="dropdown__list">
                                                                                    <? foreach ($family['MODEL'] as $model): ?>
                                                                                        <li class="dropdown__option"
                                                                                            data-value="<?= $model['NAME'] ?>"
                                                                                            <?= !empty($model['DESCRIPTION']) ? 'data-tip="' . $model['DESCRIPTION'] . '"' : '' ?>>
                                                                                            <?= $model['NAME'] ?>
                                                                                        </li>
                                                                                    <? endforeach; ?>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="dropdown__tip-container">
                                                                                <div class="tip">
                                                                                    <div class="tip__image">
                                                                                        <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                                                             alt="#">
                                                                                    </div>
                                                                                    <div class="tip__text"
                                                                                         data-dropdown-tip>Выберите
                                                                                        модель процессора
                                                                                    </div>
                                                                                </div>
                                                                                <span class="dropdown__tip">Подробнее о моделе процессора</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <? endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? else: ?>
                                                <div class="choise-form__inputs-wrapper"
                                                     data-depend-input-container="<?= $item['NAME'] ?>">
                                                    Не определился
                                                </div>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                        <div class="accordion__form" data-form="set">
                                            <div class="accordion__team" data-form="team">
                                                <div class="accordion__group" data-form="group">
                                                    <div class="form-group dropdown "
                                                         data-characteristics-choice="dropdownOrCount">
                                                        <label>Тип планок памяти </label>
                                                        <div class="dropdown__button">
                                                            <span class="dropdown__title"></span>
                                                            <div class="arrow"></div>
                                                            <input class="form-control" type="text" name="ram-type">
                                                        </div>
                                                        <div class="dropdown__options">
                                                            <ul class="dropdown__list">
                                                                <? foreach ($arResult['SETTINGS']['PROPERTY_MEMORY_TYPE_VALUE'] as $item): ?>
                                                                    <li class="dropdown__option"
                                                                        data-value="<?= $item ?>"
                                                                        data-tip="undefined"><?= $item ?>
                                                                    </li>
                                                                <? endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div data-characteristics-choice="dropdownOrCount">
                                                        <div class="form-group input-count">
                                                            <label class="input-count__label">Количество планок</label>
                                                            <div class="input-count__wrapper">
                                                                <div class="input-count__btn input-count__btn_lower _disabled"></div>
                                                                <input class="form-control " name="ram-amount" min="1"
                                                                       max="100" data-type="number" type="number"
                                                                       autocomplete="off">
                                                                <div class="input-count__btn input-count__btn_uppper"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="input-set__append">
                                                <span><b>Добавить память</b></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Хранилище данных</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div class="accordion__inputs">
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Тип RAID </label>
                                                    <div>
                                                        <div class="tip">
                                                            <div class="tip__image">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                                     alt="#">
                                                            </div>
                                                            <div class="tip__text" data-radio-tip>
                                                                Выберите тип RAID
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_RAID_VALUE'] as $key => $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="RAID-type"
                                                                   value="<?= $item ?>"
                                                                   autocomplete="off"
                                                                <?= !empty($arResult['SETTINGS']['PROPERTY_RAID_DESCRIPTION'][$key]) ? 'data-tip="' . $arResult['SETTINGS']['PROPERTY_RAID_DESCRIPTION'][$key] . '"' : '' ?>>
                                                            <div class="input-radio__button">
                                                                <span></span>
                                                                <h4><?= $item ?></h4>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion__form" data-form="set">
                                            <div class="accordion__team" data-form="team">
                                                <div class="accordion__inputs accordion__group"
                                                     data-form="group">
                                                    <div data-characteristics-choice="dropdownOrCount">
                                                        <div class="form-group input-count">
                                                            <label class="input-count__label">Количество дисков</label>
                                                            <div class="input-count__wrapper">
                                                                <div class="input-count__btn input-count__btn_lower _disabled"></div>
                                                                <input class="form-control " name="disk-amount" min="1"
                                                                       max="100" data-type="number" type="number"
                                                                       autocomplete="off">
                                                                <div class="input-count__btn input-count__btn_uppper"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion__inputs">
                                                        <div class="form-group dropdown tasks-value"
                                                             data-characteristics-choice="dropdownOrCount">
                                                            <label>Форм-фактор жестких дисков </label>
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
                                                                            <input class="form-control" type="text"
                                                                                   name="disc-type-<?= $key?>">
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
                                                                                               name="disc-model-<?= $key . '-' . $k?>">
                                                                                    </div>
                                                                                    <div class="dropdown__options">
                                                                                        <ul class="dropdown__list">
                                                                                            <? foreach ($type['MODEL'] as $model): ?>
                                                                                                <li class="dropdown__option"
                                                                                                    data-value="<?= $model['NAME'] ?>"
                                                                                                    data-tip="<?= $model['DESCRIPTION'] ?>">
                                                                                                    <?= $model['NAME'] ?>
                                                                                                </li>
                                                                                            <? endforeach; ?>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="dropdown__tip-container">
                                                                                        <div class="tip">
                                                                                            <div class="tip__image">
                                                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                                                                     alt="#">
                                                                                            </div>
                                                                                            <div class="tip__text"
                                                                                                 data-dropdown-tip>
                                                                                                Выберите модель
                                                                                                жесткого диска
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="dropdown__tip">Подробнее о моделе жесткого диска</span>
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
                                            <button class="input-set__append"><span><b>Добавить жесткие диски</b></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion accordion_arrow">
                            <div class="accordion__title">
                                <h3>Сетевая инфраструктура</h3>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__text">
                                    <div data-form="set" class="accordion__inputs">
                                        <div data-form="team" data-task-wrap class="accordion__inputs">
                                            <div class="accordion__group" data-form="group">
                                                <div class="accordion__inputs tasks-list">
                                                    <div class="form-group dropdown tasks-value"
                                                         data-characteristics-choice="dropdownOrCount">
                                                        <label>Интерфейс карт </label>
                                                        <div class="dropdown__button">
                                                            <span class="dropdown__title"></span>
                                                            <div class="arrow"></div>
                                                            <input class="form-control" type="text" name="network-card-interface">
                                                        </div>
                                                        <div class="dropdown__options">
                                                            <ul class="dropdown__list">
                                                                <? foreach ($arResult['SETTINGS']['PROPERTY_MAPS'] as $item): ?>
                                                                    <li class="dropdown__option"
                                                                        data-value="<?= $item['NAME'] ?>"
                                                                        data-tip="undefined"><?= $item['NAME'] ?>
                                                                    </li>
                                                                <? endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_MAPS'] as $key => $item): ?>
                                                        <div data-task="<?= $item['NAME'] ?>" class="accardeon__tasks">
                                                            <div class="accordion__inputs">
                                                                <div class="form-group dropdown "
                                                                     data-characteristics-choice="dropdownOrCount">
                                                                    <label>Модель сетевой карты </label>
                                                                    <div class="dropdown__button">
                                                                        <span class="dropdown__title"></span>
                                                                        <div class="arrow"></div>
                                                                        <input class="form-control" type="text"
                                                                               name="network-card-model-<?= $key?>">
                                                                    </div>
                                                                    <div class="dropdown__options">
                                                                        <ul class="dropdown__list">
                                                                            <? foreach ($item['MODEL'] as $model): ?>
                                                                                <li class="dropdown__option"
                                                                                    data-value="<?= $model['NAME'] ?>"
                                                                                    data-tip="<?= $model['DESCRIPTION'] ?>"><?= $model['NAME'] ?>
                                                                                </li>
                                                                            <? endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="dropdown__tip-container">
                                                                        <div class="tip">
                                                                            <div class="tip__image">
                                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/question.svg"
                                                                                     alt="#">
                                                                            </div>
                                                                            <div class="tip__text" data-dropdown-tip>
                                                                                Выберите сетевую карту
                                                                            </div>
                                                                        </div>
                                                                        <span class="dropdown__tip">Подробнее о сетевой карте</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <? endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="input-set__append">
                                            <span><b>Добавить сетевую карту</b></span></button>
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
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Количество блоков питания </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_POWER_NUMBER_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="power-unit" value="<?= $item ?>"
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
                                        <div class="form-group dropdown " data-characteristics-choice="dropdownOrCount">
                                            <label>Мощность блоков питания </label>
                                            <div class="dropdown__button">
                                                <span class="dropdown__title"></span>
                                                <div class="arrow"></div>
                                                <input class="form-control" type="text" name="power-energy">
                                            </div>
                                            <div class="dropdown__options">
                                                <ul class="dropdown__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_POWER_ENERGY_VALUE'] as $item): ?>
                                                        <li class="dropdown__option" data-value="<?= $item ?>"
                                                            data-tip="undefined"><?= $item ?>
                                                        </li>
                                                    <? endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div data-characteristics-choice="radio">
                                            <div class="form-group input-radio ">
                                                <div class="input-radio__title-container">
                                                    <label>Расширенное управление </label>
                                                </div>
                                                <div class="input-radio__list">
                                                    <? foreach ($arResult['SETTINGS']['PROPERTY_ADVANCED_MANAGEMENT_VALUE'] as $item): ?>
                                                        <div class="input-radio__item">
                                                            <input type="radio" name="extended-control"
                                                                   value="<?= $item ?>" autocomplete="off" undefined
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
                                        <div data-characteristics-choice="radio">
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
                                        <div data-form="set" class="accordion__inputs">
                                            <div data-form="team" data-task-wrap class="accordion__inputs">
                                                <div class="accordion__group" data-form="group">
                                                    <div class="form-group dropdown "
                                                         data-characteristics-choice="dropdownOrCount">
                                                        <label>Программное обеспечение </label>
                                                        <div class="dropdown__button">
                                                            <span class="dropdown__title"></span>
                                                            <div class="arrow"></div>
                                                            <input class="form-control" type="text" name="software">
                                                        </div>
                                                        <div class="dropdown__options">
                                                            <ul class="dropdown__list">
                                                                <? foreach ($arResult['SETTINGS']['PROPERTY_SOFTWARE_VALUE'] as $item): ?>
                                                                    <li class="dropdown__option"
                                                                        data-value="<?= $item ?>" data-tip="undefined">
                                                                        <?= $item ?>
                                                                    </li>
                                                                <? endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="input-set__append">
                                                <span><b>Добавить программное обеспечение</b></span>
                                            </button>
                                        </div>
                                        <div class="form-group input-radio ">
                                            <div class="input-radio__title-container">
                                                <label>ИБП </label>
                                            </div>
                                            <div class="input-radio__list">
                                                <? foreach ($arResult['SETTINGS']['PROPERTY_UPS_VALUE'] as $item): ?>
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="ups" value="<?= $item ?>"
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
                        <h3>Ваш сервер:</h3>
                        <div class="solution-config__task-container" data-task-description-container>
                            <div class="solution-config__task task-first" data-task-description>
                                <h4>Выполняет задачу:</h4>
                                <div class="solution-config__task-desc">
                                    <div class="solution-config__task-list">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="solution-config__task">
                            <h4>Соответствует техническим характеристикам:</h4>
                            <div class="solution-config__task-desc">
                                <div class="solution-config__task-list"
                                     data-characteristics-choice-container>

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
                                        <?= $arResult['SETTINGS']['PROPERTY_SERVICE_HINT_VALUE']?>
                                    </div>
                                </div>
                            </span>
                            <? foreach ($arResult['SETTINGS']['PROPERTY_SERVICE_VALUE'] as $item): ?>
                                <label class="checkbox" undefined>
                                    <input class="form-control" name="service[]" data-type="checkbox" type="checkbox" value="<?= $item ?>">
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
                                            <?= $arResult['SETTINGS']['PROPERTY_RPS_HINT_VALUE']?>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="input-radio__list">
                                <? foreach ($arResult['SETTINGS']['PROPERTY_RPS_VALUE'] as $item): ?>
                                    <div class="input-radio__item">
                                        <input type="radio" name="in-stock" value="<?= $item ?>" autocomplete="off" undefined data-tip="undefined">
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
                            <a href="#choose" class="cover popup-link">
                            </a>
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
                                            <div class="popup-form__block" data-form-res=""><h3>Выполняет задачу:</h3>
                                                <div class="popup-form__item">
                                                    <h4>Задача:</h4>
                                                    <span>Сервер для видеонаблюдения</span>
                                                </div>
                                            </div>
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



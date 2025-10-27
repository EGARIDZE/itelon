<?// особый случай - деталка решений
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$email = str_replace('type="text"', 'type="email"', $arResult['QUESTIONS']['SIMPLE_QUESTION_709']['HTML_CODE']);
//mpr($arParams['TASK']['TITLE']);
if (empty($arParams['TASK']['TITLE']))
	$arResult['arForm']['BUTTON'] = 'Обсудить с ИТ экспертом';
?>
<?
$strFormClass = '';
if ($arResult["isFormNote"] == "Y"):
	$strFormClass = ' _success';
	$arValues = CFormResult::GetDataByIDForHTML($_REQUEST['RESULT_ID'], "N");
	//clog($arValues);
    ?>
    <script>
		ym(13396396,'reachGoal','form.send');
    </script>
<? endif ?>
<div class="solution-event__elem">
	<div class="solution-event__form<?=$strFormClass;?>" data-form-info>
	<?= $arResult["FORM_HEADER"] ?>
    <div class="solution-event__form--wrapper" id="solution-event">
        <div class="solution-event__header">
            <h2><?= $arResult['FORM_TITLE'] ?></h2>
            <p><?= $arResult['FORM_DESCRIPTION'] ?></p>
        </div>
        <div class="solution-event__inputs">
			<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
				<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
					<?= $arQuestion["HTML_CODE"] ?>
				<? endif ?>
			<? endforeach; ?>
				<div class="form-group textarea__container textarea_medium">
					<?= $arResult['QUESTIONS']['TASK']['HTML_CODE'] ?>
					<span class="textarea__label"><?= $arResult['QUESTIONS']['TASK']['CAPTION'] ?></span>
				</div>
            <div class="form-group input__container input__container_text ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_852']['HTML_CODE'] ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_852']['CAPTION'] ?></span>
            </div>
            <div class="form-group input__container input__container_email ">
				<?= $email ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_709']['CAPTION'] ?></span>
            </div>
            <div class="form-group input__container input__container_phone">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_265']['HTML_CODE'] ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_265']['CAPTION'] ?></span>
            </div>
            <div class="form-group input__container input__container_text ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_880']['HTML_CODE'] ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_880']['CAPTION'] ?></span>
            </div>

			<? if(!empty($arParams['TASK']['TITLE'])):?>
                <div class="choise-form">
                    <div class="accordion accordion_arrow _open">
                        <div class="accordion__title">
                            <h3>Отметьте ваших приоритетных производителей</h3>
                        </div>
                        <div class="accordion__content _open">
                            <div class="accordion__text _open">
                                <div class="accordion__inputs">
                                    <div class="form-group input-radio producers">
                                        <div class="input-radio__title-container">
                                            <label>Производители </label>
                                        </div>
                                        <div class="input-radio__list">
                                            <div class="input-radio__item">
                                                <input type="radio" name="form_text_121" value="Все"
                                                       checked autocomplete="off">
                                                <div class="input-radio__button">
                                                    <span></span>
                                                    <h4>Все</h4>
                                                </div>
                                            </div>
                                            <div class="input-radio__item">
                                                <input type="radio" name="form_text_121"
                                                       value="Российские" autocomplete="off">
                                                <div class="input-radio__button">
                                                    <span></span>
                                                    <h4>Российские</h4>
                                                </div>
                                            </div>
                                            <div class="input-radio__item">
                                                <input type="radio" name="form_text_121"
                                                       value="Иностранные" autocomplete="off">
                                                <div class="input-radio__button">
                                                    <span></span>
                                                    <h4>Иностранные</h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="inputs-mark">
                                        <div class="form-group input-radio _open">
                                            <div class="input-radio__title-container">
                                                <label>Марка </label>
                                            </div>
                                            <div class="input-radio__list">
												<? foreach ($arResult['MANUF']['PROPERTY_MANUFACTURES_VALUE'] as $item): ?>
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="form_text_122"
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
                                        <div class="form-group input-radio ">
                                            <div class="input-radio__title-container">
                                                <label>Марка </label>
                                            </div>
                                            <div class="input-radio__list">
												<? foreach ($arResult['MANUF']['PROPERTY_MANUFACTURES_RUS_VALUE'] as $key => $item): ?>
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="form_text_122"
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
                                        <div class="form-group input-radio ">
                                            <div class="input-radio__title-container">
                                                <label>Марка </label>
                                            </div>
                                            <div class="input-radio__list">
												<? foreach ($arResult['MANUF']['PROPERTY_MANUFACTURES_FOREIGN_VALUE'] as $key => $item): ?>
                                                    <div class="input-radio__item">
                                                        <input type="radio" name="form_text_122"
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
                            <h3>Укажите основную и дополнительные задачи сервера</h3>
                        </div>
                        <div class="accordion__content">
                            <div class="accordion__text">
                                <div class="accordion__form" data-form="set">
                                    <div class="accordion__team" data-form="team">
                                        <div class="accordion__group" data-form="group">
                                            <div class="accordion__inputs tasks-list">
                                                <div class="form-group dropdown tasks-value">
                                                    <label>Задача </label>
                                                    <div class="dropdown__button">
                                                        <span class="dropdown__title"><?= !empty($arParams['TASK']['TITLE']) ? $arParams['TASK']['TITLE'] : 'Сервер виртуализации' ?></span>
                                                        <div class="arrow"></div>
                                                        <input class="form-control" type="text"
                                                               name="task[]"
                                                               value="<?= !empty($arParams['TASK']['VALUE']) ? $arParams['TASK']['VALUE'] : 'value12' ?>">
                                                    </div>
                                                    <div class="dropdown__options">
                                                        <ul class="dropdown__list">
                                                            <li class="dropdown__option _selected"
                                                                data-value="value1">Сервер
                                                                виртуализации
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value2">Сервер для
                                                                видеонаблюдения
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value3">Сервер баз
                                                                данных
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value4">Серверы с
                                                                GPU
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value5">Серверы для
                                                                анализа данных
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value6">Серверы для
                                                                машинного обучения
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value7">Терминальный
                                                                сервер
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value8">Почтовый
                                                                сервер
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value9">Серверы для
                                                                проектирования и моделирования
                                                                (CAD/CAM/BIM/3D).
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value10">Серверы для
                                                                IP-телефонии
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value11">Серверы для
                                                                хостинга (Web-серверы)
                                                            </li>
                                                            <li class="dropdown__option"
                                                                data-value="value12">Сервер для
                                                                1С
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div data-task="value1"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value1' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество виртуальных
                                                                машин </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name1_1"
                                                                       value="Количество виртуальных машин - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество виртуальных машин - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество виртуальных машин - 50">50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество виртуальных машин - 100">100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="500">500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество виртуальных машин - более 500">
                                                                        Более
                                                                        500
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
                                                                               name="name1_2"
                                                                               value="Объем оперативной памяти - 2"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name1_2"
                                                                               value="Объем оперативной памяти - 16"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name1_2"
                                                                               value="Объем оперативной памяти - 32"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name1_2"
                                                                               value="Объем оперативной памяти - 64"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name1_2"
                                                                               value="Объем оперативной памяти - 128"
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
                                                                           name="name1_3"
                                                                           value="Тип гипервизора - На аппаратном уровне"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>На аппаратном
                                                                            уровне</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name1_3"
                                                                           value="Тип гипервизора - На на базе ОС"
                                                                           autocomplete="off">
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
                                                                           name="name1_4" value="Тип хранения данных - SSD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name1_4" value="Тип хранения данных - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>HDD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name1_4" value="Тип хранения данных - NVMe"
                                                                           autocomplete="off">
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
                                                                           name="name1_5" value="Резервное копирование - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name1_5"
                                                                           value="Резервное копирование - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value2"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value2' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество камер </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name2_1"
                                                                       value="Количество камер - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество камер - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество камер - 50">50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество камер - 100">100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество камер - 500">500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество камер - Более 500">Более 500
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
                                                                           name="name2_2"
                                                                           value="Разрешение видео - 720"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>720</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name2_2" value="Разрешение видео - 1080"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>1080</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name2_2" value="Разрешение видео - 4К"
                                                                           autocomplete="off">
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
                                                                <span class="dropdown__title">1</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name2_3"
                                                                       value="Объём хранилища (TB) - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Объём хранилища (TB) - 1">1
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём хранилища (TB) - 5">5
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём хранилища (TB) - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём хранилища (TB) - Более 10">Более
                                                                        10
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
                                                                           name="name2_4"
                                                                           value="Тип хранения данных - SDD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SDD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name2_4" value="Тип хранения данных - HDD"
                                                                           autocomplete="off">
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
                                                                           name="name2_5"
                                                                           value="Резервное копирование - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name2_5"
                                                                           value="Резервное копирование - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value3"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value3' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Объём данных TB </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">1</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name3_1"
                                                                       value="Объём данных TB - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Объём данных TB - 1">1
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём данных TB - 5">5
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём данных TB - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объём данных TB - Более 10">Более 10
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>"Тип базы данных" </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2"
                                                                           value="Тип базы данных - SQL"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SQL</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2" value="Тип базы данных - NoSQL"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>NoSQL</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2" value="Тип базы данных - Graph"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Graph</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2" value="Тип базы данных - NewSQL"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>NewSQL</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2"
                                                                           value="Тип базы данных - Key-Value"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Key-Value</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_2" value="Тип базы данных - Другой"
                                                                           autocomplete="off">
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
                                                                <span class="dropdown__title">10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name3_3"
                                                                       value="Число пользователей - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Число пользователей - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Число пользователей - 50">50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Число пользователей - 100">100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Число пользователей - Более 100">Более
                                                                        100
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
                                                                           name="name3_4"
                                                                           value="Тип хранения данных - SDD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SDD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_4" value="Тип хранения данных - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>HDD</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Тип резервного копирования </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_5"
                                                                           value="Тип резервного копирования - Полное"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Полное</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_5"
                                                                           value="Тип резервного копирования - Инкрементное"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Инкрементное</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name3_5"
                                                                           value="Тип резервного копирования - Нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value4"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value4' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>"Количество GPU" </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_1"
                                                                           value="Количество GPU - 1"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>1</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_1" value="Количество GPU - 2"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>2</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_1" value="Количество GPU - 4"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>4</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_1" value="Количество GPU - 8"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>8</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_1" value="Количество GPU -  более 8"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Более 8</h4>
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
                                                                               name="name4_2"
                                                                               value="Объём VRAM на GPU (ГБ) - 4"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name4_2"
                                                                               value="Объём VRAM на GPU (ГБ) - 8"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name4_2"
                                                                               value="Объём VRAM на GPU (ГБ) - 16"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name4_2"
                                                                               value="Объём VRAM на GPU (ГБ) - 32"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name4_2"
                                                                               value="Объём VRAM на GPU (ГБ) - 64"
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
                                                                <label>"Тип нагрузки" </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_3"
                                                                           value="Тип нагрузки - Машинное обучение"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Машинное обучение</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_3"
                                                                           value="Тип нагрузки - Видеонаблюдение"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Видеонаблюдение</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_3"
                                                                           value="Тип нагрузки - Графика и рендеринг"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Графика и рендеринг</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_3"
                                                                           value="Тип нагрузки - Высокопроизводительные вычисления"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Высокопроизводительные вычисления</h4>
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
                                                                           name="name4_4"
                                                                           value="Тип GPU - NVIDIA"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>NVIDIA</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_4" value="Тип GPU - AMD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>AMD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_4" value="Тип GPU - FPGA"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>FPGA</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Поддержка виртуализации GPU</label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_5"
                                                                           value="Поддержка виртуализации GPU - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name4_5"
                                                                           value="Поддержка виртуализации GPU - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value5"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value5' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Объем данных </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">1</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name5_1"
                                                                       value="Объем данных - 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Объем данных - 1">1
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объем данных - 10">10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объем данных - 100">100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Объем данных - Более 100">Более 100
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
                                                                           name="name5_2"
                                                                           value="Тип хранилища - SSD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_2" value="Тип хранилища - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> HDD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_2"
                                                                           value="Тип хранилища - Облачное хранилище"
                                                                           autocomplete="off">
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
                                                                           name="name5_3"
                                                                           value="Инструменты анализа - Встроенные"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Встроенные</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_3"
                                                                           value="Инструменты анализа - Внешние"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Внешние</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_3" value="Инструменты анализа - Нет"
                                                                           autocomplete="off">
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
                                                                           name="name5_4"
                                                                           value="Тип анализа - Статистический"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Статистический</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_4"
                                                                           value="Тип анализа - Машинное обучение"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Машинное обучение</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_4"
                                                                           value="Тип анализа - Анализ больших данных (Big Data)"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Анализ больших данных (Big Data)</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_4"
                                                                           value="Тип анализа - Визуализация данных"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Визуализация данных</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Поддержка параллельной обработки </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_5"
                                                                           value="Поддержка параллельной обработки - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name5_5"
                                                                           value="Поддержка параллельной обработки - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value6"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value6' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>"Количество GPU" </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_1"
                                                                           value="Количество GPU - 1"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>1</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_1" value="Количество GPU - 2"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 2</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_1" value="Количество GPU - 4"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>4</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_1" value="Количество GPU - 8"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>8</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_1" value="Количество GPU - Более 8"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Более 8</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>"Тип задач" </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_2"
                                                                           value="Тип задач - Обучение моделей"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Обучение моделей</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_2" value="Тип задач - Инференс"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Инференс</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_2"
                                                                           value="Тип задач - Обработка данных"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Обработка данных</h4>
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
                                                                               name="name6_3"
                                                                               value="Объём VRAM на GPU (ГБ) - 16"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name6_3"
                                                                               value="Объём VRAM на GPU (ГБ) - 24"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name6_3"
                                                                               value="Объём VRAM на GPU (ГБ) - 32"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name6_3"
                                                                               value="Объём VRAM на GPU (ГБ) - 48"
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
                                                                <label>Тип GPU</label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_4"
                                                                           value="Тип GPU - NVIDIA"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>NVIDIA</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_4" value="Тип GPU - AMD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> AMD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_4" value="Тип GPU - FPGA"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> FPGA</h4>
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
                                                                           name="name6_5"
                                                                           value="Поддержка контейнеров - Да (Docker, Kubernetes)"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да (Docker, Kubernetes)</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name6_5"
                                                                           value="Поддержка контейнеров - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value7"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value7' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество пользователей </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 50</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name7_1"
                                                                       value="Количество пользователей - до 50">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество пользователей - до 50">до 50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 100">до
                                                                        100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 200">до
                                                                        200
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 500">до
                                                                        500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - Более 500">
                                                                        Более
                                                                        500
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
                                                                           name="name7_2"
                                                                           value="Тип подключения - RDP"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>RDP</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name7_2" value="Тип подключения - VDI"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> VDI</h4>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio-castom ">
                                                            <label>RAM (ГБ)</label>
                                                            <div class="input-radio-castom__wrapper">
                                                                <div class="input-radio-castom__inputs">
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name7_3" value="RAM (ГБ) - 32"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name7_3" value="RAM (ГБ) - 64"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name7_3"
                                                                               value="RAM (ГБ) - 128"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name7_3"
                                                                               value="RAM (ГБ) - 256"
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
                                                                           name="name7_4"
                                                                           value="Тип хранилища - SSD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name7_4" value="Тип хранилища - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> HDD</h4>
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
                                                                           name="name7_5"
                                                                           value="Резервное копирование - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name7_5"
                                                                           value="Резервное копирование - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value8"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value8' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество пользователей </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 500</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name8_1"
                                                                       value="Количество пользователей - до 500">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество пользователей - до 500">до
                                                                        500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 1000">до
                                                                        1000
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 5000">до
                                                                        5000
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 10000">до
                                                                        10000
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - Более 10000">
                                                                        Более 10000
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio-castom ">
                                                            <label>Объем хранилища на пользователя</label>
                                                            <div class="input-radio-castom__wrapper">
                                                                <div class="input-radio-castom__inputs">
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name8_2"
                                                                               value="Объем хранилища на пользователя - 1"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name8_2"
                                                                               value="Объем хранилища на пользователя - 5"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name8_2"
                                                                               value="Объем хранилища на пользователя - 10"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name8_2"
                                                                               value="Объем хранилища на пользователя - 20"
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
                                                                           name="name8_3"
                                                                           value="Тип почтового сервиса - SMTP"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SMTP</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name8_3"
                                                                           value="Тип почтового сервиса - IMAP"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> IMAP</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name8_3"
                                                                           value="Тип почтового сервиса - POP3"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> POP3</h4>
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
                                                                           name="name8_4" value="Тип хранилища - SSD"
                                                                           autocomplete="off" checked>
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name8_4" value="Тип хранилища - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>HDD</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Поддержка безопасности</label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name8_5"
                                                                           value="Поддержка безопасности - SSL/TLS"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSL/TLS</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name8_5"
                                                                           value="Поддержка безопасности - Без шифрования"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Без шифрования</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value9"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value9' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество пользователей </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name9_1"
                                                                       value="Количество пользователей - до 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество пользователей - до 10">до 10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 50">до 50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 100">до
                                                                        100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - Больше 100">
                                                                        Больше 100
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio-castom ">
                                                            <label>GPU VRAM (ГБ)</label>
                                                            <div class="input-radio-castom__wrapper">
                                                                <div class="input-radio-castom__inputs">
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name9_2" value="GPU VRAM (ГБ) - 8"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name9_2" value="GPU VRAM (ГБ) - 16"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name9_2" value="GPU VRAM (ГБ) - 24"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name9_2" value="GPU VRAM (ГБ) - 32"
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
                                                                           name="name9_3"
                                                                           value="Качество рендеринга - Стандартное"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Стандартное</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name9_3"
                                                                           value="Качество рендеринга - Высокое"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Высокое</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name9_3"
                                                                           value="Качество рендеринга - Очень высокое"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Очень высокое</h4>
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
                                                                           name="name9_4"
                                                                           value="Тип GPU - NVIDIA"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>NVIDIA</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name9_4" value="Тип GPU - AMD"
                                                                           autocomplete="off">
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
                                                                           name="name9_5"
                                                                           value="Поддержка виртуализации - да"
                                                                           autocomplete="off" checked>
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name9_5"
                                                                           value="Поддержка виртуализации - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value10"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value10' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Количество пользователей </label>
                                                            </div>

                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 50</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name10_1"
                                                                       value="Количество пользователей - до 50">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество пользователей - до 50">до 50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 100">до
                                                                        100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 500">до
                                                                        500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - Более 500">
                                                                        Более
                                                                        500
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Пропускная способность сети (Gbps) </label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_2"
                                                                           value="Пропускная способность сети (Gbps) - 1"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>1</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_2"
                                                                           value="Пропускная способность сети (Gbps) - 2.5"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 2.5</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_2" value="5"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 5</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_2"
                                                                           value="Пропускная способность сети (Gbps) - 10"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>10</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio-castom ">
                                                            <label>Объем хранилища для записей</label>
                                                            <div class="input-radio-castom__wrapper">
                                                                <div class="input-radio-castom__inputs">
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name10_3"
                                                                               value="Объем хранилища для записей - 10"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name10_3"
                                                                               value="Объем хранилища для записей - 50"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name10_3"
                                                                               value="Объем хранилища для записей - 100"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name10_3"
                                                                               value="Объем хранилища для записей - 500"
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
                                                                           name="name10_4"
                                                                           value="Качество связи - Стандартное"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Стандартное</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_4" value="Качество связи - Высокое"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Высокое</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_4"
                                                                           value="Качество связи - Очень высокое"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> Очень высокое</h4>
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
                                                                           name="name10_5"
                                                                           value="Поддержка интеграции - CRM системы"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>CRM системы</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_5"
                                                                           value="Поддержка интеграции - Веб-интерфейсы"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Веб-интерфейсы</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name10_5"
                                                                           value="Поддержка интеграции - Нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value11"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value11' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество сайтов </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name11_1"
                                                                       value="Количество сайтов - до 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество сайтов - до 10">до 10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество сайтов - до 50">до 50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество сайтов - до 100">до 100
                                                                    </li
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Пропускная способность сети (Gbps)</label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_2"
                                                                           value="Пропускная способность сети (Gbps) - 1"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>1</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_2"
                                                                           value="Пропускная способность сети (Gbps) - 2.5"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 2.5</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_2"
                                                                           value="Пропускная способность сети (Gbps) - 5"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 5</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_2"
                                                                           value="Пропускная способность сети (Gbps) - 10"
                                                                           autocomplete="off">
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
                                                                           name="name11_3"
                                                                           value="Тип хостинга - Виртуальный"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Виртуальный</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_3" value="Тип хостинга - Выделенный"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Выделенный</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_3" value="Тип хостинга - Облачный"
                                                                           autocomplete="off">
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
                                                                           name="name11_4"
                                                                           value="Тип хранилища - SSD"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>SSD</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_4" value="Тип хранилища - HDD"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> HDD</h4>
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
                                                                           name="name11_5"
                                                                           value="Резервное копирование - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name11_5"
                                                                           value="Резервное копирование - нет"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Нет</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-task="value12"
                                                     class="accardeon__tasks<?= $arParams['TASK']['VALUE'] == 'value12' ? ' _open' : '' ?>">
                                                    <div class="accordion__gap">
                                                        <div class="form-group dropdown ">
                                                            <label>Количество пользователей </label>
                                                            <div class="dropdown__button">
                                                                <span class="dropdown__title">до 10</span>
                                                                <div class="arrow"></div>
                                                                <input class="form-control"
                                                                       type="text" name="name12_1"
                                                                       value="Количество пользователей - до 10">
                                                            </div>
                                                            <div class="dropdown__options">
                                                                <ul class="dropdown__list">
                                                                    <li class="dropdown__option _selected"
                                                                        data-value="Количество пользователей - до 10">до 10
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 50">до 50
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 100">до
                                                                        100
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - до 500">до
                                                                        500
                                                                    </li>
                                                                    <li class="dropdown__option"
                                                                        data-value="Количество пользователей - Более 500">
                                                                        Более
                                                                        500
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio ">
                                                            <div class="input-radio__title-container">
                                                                <label>Частота CPU GHz</label>
                                                            </div>

                                                            <div class="input-radio__list">
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_2"
                                                                           value="Частота CPU GHz - до 2.0"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>до 2.0</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_2" value="Частота CPU GHz - до 2.5"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>до 2.5</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_2" value="Частота CPU GHz - до 3.0"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>до 3.0</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_2"
                                                                           value="Частота CPU GHz - больше 3.0"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>больше 3.0</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-radio-castom ">
                                                            <label>RAM (ГБ)</label>
                                                            <div class="input-radio-castom__wrapper">
                                                                <div class="input-radio-castom__inputs">
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name12_3" value="RAM (ГБ) - 8"
                                                                               checked
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name12_3" value="RAM (ГБ) - 16"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name12_3" value="RAM (ГБ) - 32"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name12_3" value="RAM (ГБ) - 64"
                                                                               autocomplete="off">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="input-radio-castom__input">
                                                                        <input type="radio"
                                                                               name="name12_3"
                                                                               value="RAM (ГБ) - 128"
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
                                                                           name="name12_4"
                                                                           value="Тип базы данных - MS SQL Server"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>MS SQL Server</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_4"
                                                                           value="Тип базы данных - PostgreSQL"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> PostgreSQL</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_4"
                                                                           value="Тип базы данных - 1С:Предприятие"
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4> 1С:Предприятие</h4>
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
                                                                           name="name12_5"
                                                                           value="Резервное копирование - да"
                                                                           checked
                                                                           autocomplete="off">
                                                                    <div class="input-radio__button">
                                                                        <span></span>
                                                                        <h4>Да</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="input-radio__item">
                                                                    <input type="radio"
                                                                           name="name12_5"
                                                                           value="Резервное копирование - нет"
                                                                           autocomplete="off">
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
                </div>
			<? else:?>
                <div class="form-group textarea__container">
					<?= $arResult['QUESTIONS']['COMMENT']['HTML_CODE'] ?>
					<span class="textarea__label"><?= $arResult['QUESTIONS']['COMMENT']['CAPTION'] ?></span>
                </div>
			<? endif;?>

            <div class="solution-event__btn">
                <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                <!--Для блокировки добавить класс _disabled-->
	            <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
                <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                        value="<?= $arResult['arForm']['BUTTON'] ?>">
                    <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
                </button>
            </div>
        </div>
				<div class="solution-event__info">
					<div class="solution-event__info--content">
						<div class="solution-event__info--text">
							<p><span data-form-output="name"></span><?=$arValues['form_text_117'];?>, спасибо за ваш запрос!</p>
							<p>Ваш телефон: <span data-form-output="phone"><?=$arValues['form_text_119'];?></span></p>
							<p>Ваша почта: <span data-form-output="email"><?=$arValues['form_email_118'];?></span></p>
							<p>Задача: <span data-form-output="task"><?=$arValues['form_textarea_158'];?></span></p>
						</div>
						<div class="solution-event__info--text">
							<p>
								Если в данных ошибка, вы можете продублировать Ваш запрос на почту <a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
							</p>
						</div>
						<div class="solution-event__info--text">
							<p>
								Мы свяжемся с вами в ближайшее время!<br>
								С заботой, команда ITELON
							</p>
						</div>
					</div>
					<div class="solution-event__info--contacts">
						<div class="solution-event__info--phones">
							<p>
								<a href="tel:+74955103335">+7 495 510 3335</a><br>
								<a href="tel:88005055110">8 (800) 505-51-10</a> - бесплатно по России<br>
								<a href="tel:+79891053335">+7 989 105 33 35</a> (WhatsApp, Telegram)
							</p>
						</div>
						<div class="solution-event__info--links">
							<p>
								<a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
								|
								<a href="/">https://itelon.ru</a>
							</p>
						</div>
            </div>
        </div>
    </div>
	<?= $arResult["FORM_FOOTER"] ?>
</div>
</div>
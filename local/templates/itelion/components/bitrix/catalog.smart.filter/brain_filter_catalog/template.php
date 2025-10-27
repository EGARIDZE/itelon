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

use Bitrix\Iblock\SectionPropertyTable;

$this->setFrameMode(true);

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME']))
{
	$this->addExternalCss($templateData['TEMPLATE_THEME']);
}
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>

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
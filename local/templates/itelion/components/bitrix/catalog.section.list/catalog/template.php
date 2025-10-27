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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="catalog-primary">
	<? foreach ($arResult['SECTIONS'] as $key => &$arSection) {
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
		<? if ($key == 0 || $key == 1) { ?>
		    <div class="catalog-item catalog-primary__item" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
		        <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="catalog-primary__preview">
		            <div class="catalog-primary__image">
		                <picture>
		                    <source srcset="<?= $arSection['PICTURE']['SRC']; ?>" type="image/webp">
		                    <img src="<?= $arSection['PICTURE']['SRC']; ?>" alt="<?= $arSection['NAME']; ?>">
		                </picture>
		            </div>
		            <div class="catalog-primary__title">
		                <h2><?= $arSection['NAME']; ?></h2>
		            </div>
		        </a>
		        <? if ($key == 0) { ?>
			        <div class="catalog-primary__subtitles">
			            <div class="catalog-primary__column">
			                <div class="links">
			                    <h3>Типы</h3>
			                    <div class="links__items">
			                        <a href="#">Серверы в стойку</a>
			                        <a href="#">Напольные серверы</a>
			                        <a href="#">Высокопроизводительные серверы</a>
			                        <a href="#">Blade-серверы</a>
			                        <a href="#">Шасси</a>
			                    </div>
			                </div>
			            </div>
			            <div class="catalog-primary__column">
			                <div class="links">
			                    <h3>Задачи</h3>
			                    <div class="links__items">
			                        <a href="#">Серверы для 1С</a>
			                        <a href="#">Веб-сервер</a>
			                        <a href="#">Файловый сервер</a>
			                        <a href="#">Сервер виртуализации</a>
			                        <a href="#">Сервер для офиса</a>
			                    </div>
			                </div>
			            </div>
			            <div class="catalog-primary__column">
			                <div class="links">
			                    <h3>Формфакторы</h3>
			                    <div class="links__items">
			                        <a href="#">Серверы 1U</a>
			                        <a href="#">Серверы2U</a>
			                    </div>
			                </div>
			                <div class="links">
			                    <h3>Процессоры</h3>
			                    <div class="links__items">
			                        <a href="#">HPE AMD EPYC</a>
			                        <a href="#">Intel Xeon</a>
			                    </div>
			                </div>
			            </div>
			        </div>
			    <? } else if ($key == 1) { ?>
			        <div class="catalog-primary__subtitles">
			            <div class="catalog-primary__column">
			                <div class="links">
			                    <h3>Типы</h3>
			                    <div class="links__items">
			                        <a href="#">Системы хранения данных (СХД)</a>
			                        <a href="#">Высокопроизводительные СХД (High perfomance)</a>
			                        <a href="#">Сетевые хранилища (NAS)</a>
			                        <a href="#">Ленточные системы хранения</a>
			                        <a href="#">Дисковые полки</a>
			                        <a href="#">Системы резервирования D2D</a>
			                        <a href="#">Гиперконвергентные системы</a>
			                    </div>
			                </div>
			            </div>
			        </div>
			    <? } ?>
		        <div class="catalog-primary__brands">
		            <a href="#">
		                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/dell.svg" alt="#">
		            </a>
		            <a href="#">
		                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/hpe.svg" alt="#">
		            </a>
		            <a href="#">
		                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/SuperMicro.svg" alt="#">
		            </a>
		            <a href="#">
		                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/Lenovo.svg" alt="#">
		            </a>
		        </div>
		    </div>
		<? } ?>
	<? } ?>
</div>
<div class="catalog-list">
	<? foreach ($arResult['SECTIONS'] as $key => &$arSection) {
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		if ($key == 0 || $key == 1) continue;
		?>
		<? if ($key != 6) { ?>
		    <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="catalog-item" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
		        <div class="catalog-item__image">
		            <picture>
		                <source srcset="<?= $arSection['PICTURE']['SRC']; ?>" type="image/webp">
		                <img src="<?= $arSection['PICTURE']['SRC']; ?>" alt="<?= $arSection['NAME']; ?>">
		            </picture>
		        </div>
		        <div class="catalog-item__title">
		            <h2><?= $arSection['NAME']; ?></h2>
		        </div>
		    </a>
		<? } else { ?>
		    <div class="catalog-item catalog-primary__item catalog-item_primary">
		        <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="catalog-primary__preview">
		            <div class="catalog-primary__image">
		                <picture>
		                    <source srcset="<?= $arSection['PICTURE']['SRC']; ?>" type="image/webp">
		                    <img src="<?= $arSection['PICTURE']['SRC']; ?>" alt="<?= $arSection['NAME']; ?>">
		                </picture>
		            </div>
		            <div class="catalog-primary__title">
		                <h2><?= $arSection['NAME']; ?></h2>
		            </div>
		        </a>
		    </div>
		<? } ?>
	<? } ?>
</div>
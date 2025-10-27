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


<div class="lock-padding popup" id="centre-popup">
    <div class="popup__body">
        <div class="container">
            <div class="popup__content centre-popup__content">
                <div class="popup__wrapper centre-popup__wrapper">
                    <div class="centre-popup__table">
                        <div class="centre-popup__header">
                            <h3>Производитель</h3>
                            <h3>Основания для сдачи в гарантийный сервис</h3>
                            <h3>Адрес и телефон авторизованного сервиса</h3>
                            <h3>Гарантийные условия</h3>
                        </div>
                        <div class="centre-popup__list">
                            <?foreach($arResult["ITEMS"] as $arItem):?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                                <div class="centre-popup__row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                    <div class="centre-popup__item">
                                        <h4><?= $arItem['NAME']?></h4>
                                    </div>
                                    <div class="centre-popup__item">
                                        <?= $arItem['PROPERTIES']['GROUNDS']['~VALUE']['TEXT'] ?? ''?>
                                    </div>
                                    <div class="centre-popup__item">
                                        <?= $arItem['PROPERTIES']['ADDRESS_PHONE']['~VALUE']['TEXT'] ?? ''?>
                                    </div>
                                    <div class="centre-popup__item">
                                        <?= $arItem['PROPERTIES']['WARRANTY']['~VALUE']['TEXT'] ?? ''?>
                                    </div>
                                </div>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
                <span class="popup__close close-btn centre-popup__close">
					<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/popup-close.svg" alt="#">
				</span>
            </div>
        </div>
    </div>
    <div class="centre-popup__banner">
		<span class="btn btn_medium btn_primary">
            <span class="children">Написать в техподдержку ITELON</span>
            <a href="#technical-support-form" target="_blank" class="cover "></a>
        </span>
        <span class="btn btn_medium btn_outlined">
            <span class="children">Закрыть</span>
            <a class="cover "></a>
        </span>
    </div>
</div>

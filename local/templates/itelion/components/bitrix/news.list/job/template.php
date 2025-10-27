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
<div class="container">
    <div class="section__wrapper">
        <div class="page-preview">
            <h1><?= $APPLICATION->ShowProperty('h1') ?></h1>
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
        <div class="section__description">
            <p>
                Компания ITELON основана в 2004 году и в течение нескольких лет прочно вошла на рынок
                системной интеграции как компетентный и надежный партнер и для заказчиков, и для
                производителей.
            </p>
            <p>
                Непрерывное развитие, профессиональная команда и ориентация на потребности клиента позволяют
                нам соответствовать самым жестким требованиями наших заказчиков.
            </p>
        </div>
        <div class="vacancies">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                ?>

                <p class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="accordion ">

                    <div class="accordion__title">
                        <h3><?= $arItem["NAME"] ?></h3>
                    </div>
                    <div class="accordion__content">
                        <div class="accordion__text">
                            <p>
                                <?= $arItem["PREVIEW_TEXT"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>


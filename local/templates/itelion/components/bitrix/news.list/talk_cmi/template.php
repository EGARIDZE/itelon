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
    <section class="section">
        <div class="container">
            <div class="section__wrapper">
                <h2><?=$arResult["NAME"]?></h2>


                    <div class="brands">
                        <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <p class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a href="<?= $arItem['PROPERTIES']['LINK']['VALUE'] ?>" target="_blank"><img
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="#"></a>
                        <?endforeach;?>
                    </div>
            </div>
        </div>
    </section>


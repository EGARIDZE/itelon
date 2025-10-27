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
<? if ($arResult["ITEMS"]) { ?>
    <div class="desktop-menu__item">
        <div class="desktop-menu-links">
            <div class="desktop-menu-links__list">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <a href="<?echo $arItem["CODE"];?>" class="desktop-menu-links__item">
                        <div class="desktop-menu-links__icon">
                            <img src="<?echo CFile::GetPath($arItem["PROPERTIES"]['ICON']['VALUE'])?>" alt="<?echo $arItem["NAME"]?>">
                        </div>
                        <div class="desktop-menu-links__content">
                            <h3><?echo $arItem["NAME"]?></h3>
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        </div>
                    </a>
                <?endforeach;?>
            </div>
            <? if ($arParams['UF_BLOCK_LINK']) {
                if (str_starts_with($arParams['UF_BLOCK_LINK'], '#')) {
                    ?>
                    <div class="desktop-menu-links__banner">
                        <a href="<?= $arParams['UF_BLOCK_LINK']; ?>" class="popup-link cover"></a>
                        <div class=" marketing__item ">
                            <div class="marketing__info">
                                <h3><?= $arParams['UF_BLOCK_NAME']; ?></h3>
                                <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="<?= $arParams['UF_BLOCK_NAME']; ?>">
                            </div>
                            <div class="marketing__image">
                                <picture><source srcset="<?= CFile::GetPath($arParams['UF_BLOCK_PICTURE']); ?>" type="image/webp">
                                    <img src="<?= CFile::GetPath($arParams['UF_BLOCK_PICTURE']); ?>" alt="<?= $arParams['UF_BLOCK_NAME']; ?>"></picture>
                            </div>
                        </div>
                    </div>
                    <?
                } else {
                    ?>
                    <a href="<?= $arParams['UF_BLOCK_LINK']; ?>" class="">
                        <div class="desktop-menu-links__banner">

                            <div class=" marketing__item ">
                                <div class="marketing__info">
                                    <h3><?= $arParams['UF_BLOCK_NAME']; ?></h3>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/btn-icon_primary.svg" alt="<?= $arParams['UF_BLOCK_NAME']; ?>">
                                </div>
                                <div class="marketing__image">
                                    <picture><source srcset="<?= CFile::GetPath($arParams['UF_BLOCK_PICTURE']); ?>" type="image/webp">
                                        <img src="<?= CFile::GetPath($arParams['UF_BLOCK_PICTURE']); ?>" alt="<?= $arParams['UF_BLOCK_NAME']; ?>"></picture>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?
                }
            } ?>
        </div>
    </div>
<? } ?>
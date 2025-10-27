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
<section class="section">
    <div class="container">
        <div class="section__wrapper">
            <div class="page-preview">
                <h1><?= $APPLICATION->ShowProperty('h1') ?></h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
            </div>
            <? if($arResult['SECTIONS']):?>
                <div class="navigation">
                    <a href="<?= $APPLICATION->GetCurPageParam('', ['section']) ?>" class="navigation__item btn btn_medium btn_outlined<?= !isset($_REQUEST['section']) ? ' _active' : '' ?>">Все</a>
                    <? foreach ($arResult['SECTIONS'] as $item):?>
                        <a href="<?= $APPLICATION->GetCurPageParam($_REQUEST['section'] && $_REQUEST['section'] == $item['CODE'] ? '' : 'section=' . $item['CODE'], ['section']) ?>" class="navigation__item btn btn_medium btn_outlined<?= $_REQUEST['section'] && $_REQUEST['section'] == $item['CODE'] ? ' _active' : '' ?>"><?= $item['NAME']?></a>
                    <? endforeach;?>
                </div>
            <? endif;?>

            <div class="certificates">
                <div class="certificates__list">
                    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                        <div class="certificate">
													<a href='<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>' data-fancybox="certificate">
														<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="#">
													</a>
                        </div>
                    <?php endforeach; ?>
                        </p>
                </div>
	            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		            <?=$arResult["NAV_STRING"]?>
	            <?endif;?>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
    </div>
</section>


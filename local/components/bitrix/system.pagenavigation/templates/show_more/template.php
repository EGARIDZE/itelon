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

if($arResult["NavPageCount"] > 1) {
	if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]) {
		$plus = $arResult["NavPageNomer"]+1;
		$url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;
		?>
        <div class="articles-comments__btn-more load-more-items" data-url="<?=$url?>">
                <span class="btn btn_medium btn_outlined">
                    <span class="children">Показать еще комментарии</span>
                </span>
        </div>
		<?
    }
}
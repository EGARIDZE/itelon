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

$value = $_REQUEST["q"] ?? '';
?>


<div class="search-bar_reverse config_search-bar">
    <form action="" id="conf-search" data-initialized="true">
        <div class="search-bar__wrapper">
            <input class="search-bar__input" type="text" placeholder="Партномер или название" name="q" value="<?=$value;?>" required="">
            <!-- <button class="search-bar__reset" type="reset" id="search-bar-reset"></button>	 -->
            <button class="search-bar__submit" type="submit"></button>
        </div>
    </form>
</div>

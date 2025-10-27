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
$this->setFrameMode(true); ?>


<div class="search-bar ">
    <form action="<?= $arResult["FORM_ACTION"] ?>">
        <div class="search-bar__wrapper">
            <input class="search-bar__input" type="text" placeholder="<?= GetMessage("BSF_T_SEARCH_BUTTON"); ?>"
                   name="q" value="" required>
            <!-- <button class="search-bar__reset" type="reset" id="search-bar-reset"></button>	 -->
            <button class="search-bar__submit" name="s" value="<?= GetMessage("BSF_T_SEARCH_BUTTON"); ?>"
                    type="submit"></button>
        </div>
    </form>
</div>

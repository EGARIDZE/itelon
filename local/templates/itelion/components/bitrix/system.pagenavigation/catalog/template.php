<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
* @var array $arResult
* @var array $arParam
* @var CBitrixComponentTemplate $this
*/
$this->setFrameMode(true);
?>
<? if (!$arResult['NavShowAlways']) { ?>
	<? if ($arResult['NavRecordCount'] == 0 || ($arResult['NavPageCount'] == 1 && $arResult['NavShowAll'] == false)) return; ?>
<? } ?>
<?
$strNavQueryString = ($arResult['NavQueryString'] != "" ? $arResult['NavQueryString'] . "&amp;" : "");
$strNavQueryStringFull = ($arResult['NavQueryString'] != "" ? "?".$arResult['NavQueryString'] : "");
?>
<? if ($arResult['NavPageNomer'] > 1) { ?>
	<a href="<?= $arResult['sUrlPath']; ?><?= $strNavQueryStringFull?>" class="pagination__arrow pagination__arrow_prev">В начало</a>
<? } else { ?>
	<a href="<?= $arResult['sUrlPath']; ?><?= $strNavQueryStringFull?>" class="pagination__arrow pagination__arrow_prev _disabled">В начало</a>
<? } ?>
<? if ($arResult['NavPageNomer'] > 1) { ?>
	<? if ($arResult['nStartPage'] > 1) { ?>
		<? if ($arResult['bSavePage']) { ?>
			<a class="page-link 1" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=1">1</a>
		<? } else { ?>
			<a href="<?= $arResult['sUrlPath']; ?><?= $strNavQueryStringFull?>">1</a>
		<? } ?>
		<? if ($arResult['nStartPage'] > 2) { ?>
			<a class="pagination__item _disabled" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?= round($arResult['nStartPage'] / 2)?>">...</a>
		<? } ?>
	<? } ?>
<? } ?>
<? do { ?>
	<? if ($arResult['nStartPage'] == $arResult['NavPageNomer']) { ?>
		<a href="javascript:void(0);" class="pagination__item _active"><?= $arResult['nStartPage']; ?></a>
	<? } else if ($arResult['nStartPage'] == 1 && $arResult['bSavePage'] == false) { ?>
		<a href="<?= $arResult['sUrlPath']; ?><?= $strNavQueryStringFull?>" class="pagination__item"><?= $arResult['nStartPage']; ?></a>
	<? } else { ?>
		<a href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?= $arResult['nStartPage']; ?>" class="pagination__item"><?= $arResult['nStartPage']; ?></a>
	<? } ?>
	<? $arResult['nStartPage']++; ?>
<? } while($arResult['nStartPage'] <= $arResult['nEndPage']); ?>
<? if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) { ?>
	<? if ($arResult['nEndPage'] < $arResult['NavPageCount']) { ?>
		<? if ($arResult['nEndPage'] < ($arResult['NavPageCount'] - 1)) { ?>
			<a class="pagination__item _disabled" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?= round($arResult['nEndPage'] + ($arResult['NavPageCount'] - $arResult['nEndPage']) / 2)?>">...</a>
		<? } ?>
		<a href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?= $arResult['NavPageCount']; ?>"><?= $arResult['NavPageCount']; ?></a>
	<? } ?>
<? } ?>
<? if ($arResult['NavPageNomer'] > 1) { ?>
	<? if ($arResult['bSavePage']) { ?>
		<a class="page-link 8" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?=($arResult['NavPageNomer']-1)?>">
			<?=GetMessage("MAIN_UI_PAGINATION__PREV")?>
		</a>
	<? } else { ?>
		<? if ($arResult['NavPageNomer'] > 2) { ?>
			<?/*
			<a class="prev 1" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?=($arResult['NavPageNomer']-1)?>">
				<img src="<?=SITE_TEMPLATE_PATH?>/files/icons/arrow.svg">
			</a>
			*/?>
		<? } else { ?>
			<?/*
			<a class="pagination__arrow pagination__arrow_prev _disabled" href="<?= $arResult['sUrlPath']; ?><?= $strNavQueryStringFull?>">В начало</a>
			*/?>
		<? } ?>
	<? } ?>
<? } ?>
<? if ($arResult['bShowAll']) { ?>
	<? if ($arResult['NavShowAll']) { ?>
		<a class="page-link 11" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>SHOWALL_<?= $arResult['NavNum']; ?>=0">
			<?=GetMessage("MAIN_UI_PAGINATION__PAGED")?>
		</a>
	<? } else { ?>
		<a class="page-link 12" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>SHOWALL_<?= $arResult['NavNum']; ?>=1">
			<?=GetMessage("MAIN_UI_PAGINATION__ALL")?>
		</a>
	<? } ?>
<? } ?>
<? if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) { ?>
	<a class="pagination__arrow pagination__arrow_next" href="<?= $arResult['sUrlPath']; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult['NavNum']; ?>=<?=($arResult['NavPageNomer']+1)?>">Дальше</a>
<? } ?>

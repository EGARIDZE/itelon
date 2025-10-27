<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
$arParams['USE_SHARE'] = (string)($arParams['USE_SHARE'] ?? 'N');
$arParams['USE_SHARE'] = $arParams['USE_SHARE'] === 'Y' ? 'Y' : 'N';
$arParams['SHARE_HIDE'] = (string)($arParams['SHARE_HIDE'] ?? 'N');
$arParams['SHARE_HIDE'] = $arParams['SHARE_HIDE'] === 'Y' ? 'Y' : 'N';
$arParams['SHARE_TEMPLATE'] = (string)($arParams['SHARE_TEMPLATE'] ?? 'N');
$arParams['SHARE_HANDLERS'] ??= [];
$arParams['SHARE_HANDLERS'] = is_array($arParams['SHARE_HANDLERS']) ? $arParams['SHARE_HANDLERS'] : [];
$arParams['SHARE_SHORTEN_URL_LOGIN'] = (string)($arParams['SHARE_SHORTEN_URL_LOGIN'] ?? 'N');
$arParams['SHARE_SHORTEN_URL_KEY'] = (string)($arParams['SHARE_SHORTEN_URL_KEY'] ?? 'N');

$sections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'],
    false,
    ['ID', 'NAME', 'CODE', 'DESCRIPTION']
);
while ($ob = $sections->fetch()){
   $arResult['SECTIONS'][$ob['CODE']] = $ob;
}
//clog($arResult);
<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
//$arResult['ALL_EQUIPMENT'] = array_merge($arResult['PROPERTIES']['EQUIPMENT_TOP_RU']['VALUE'] ?: []
//	, $arResult['PROPERTIES']['EQUIPMENT_TOP']['VALUE'] ?: []);
//clog($arResult['ALL_EQUIPMENT']);

$sections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'ID' => $arResult['IBLOCK_SECTION_ID']],
    false,
    ['NAME', 'UF_SETS']
);
$sets = [];
while ($ob = $sections->fetch()){
    $arResult['SECTIONS'][$ob['CODE']] = $ob;
    $sets = array_merge($sets, $ob['UF_SETS']);
}

$setsRes = CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'ID' => $sets],
    false,
    false,
    ['ID', 'NAME', 'CODE']
);
while ($ob = $setsRes->fetch()){
    $arResult['SETS'][$ob['ID']] = $ob;
}
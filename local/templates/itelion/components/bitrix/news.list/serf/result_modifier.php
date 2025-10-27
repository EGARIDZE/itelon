<?php

$setsRes = CIBlockElement::GetList(
    false,
    [$arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'],
    false,
    false,
    ['ID', 'IBLOCK_SECTION_ID']
);
$sectionsIdList = [];
while ($ob = $setsRes->fetch()){
    $sectionsIdList[] = $ob['IBLOCK_SECTION_ID'];
}
$sectionsIdList = array_values($sectionsIdList);

$sections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'ID' => $sectionsIdList],
    false,
    ['ID', 'NAME', 'CODE']
);

while ($ob = $sections->fetch()){
    $arResult['SECTIONS'][] = $ob;
}


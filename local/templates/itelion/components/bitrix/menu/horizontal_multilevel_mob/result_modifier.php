<?php
$caseRes = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    ['IBLOCK_ID' => 12, 'ACTIVE' => 'Y'],
    false,
    ['CODE', 'UF_ICON', 'UF_TEXT_MENU']
);
while ($ob = $caseRes->fetch()) {
    foreach ($arResult as $key => $value){
        if($value['DEPTH_LEVEL'] == 2 && strpos($value['LINK'],'case') && strpos($value['LINK'],$ob['CODE'])){
            $arResult[$key]['PARAMS']['DESCRIPTION'] = $ob['UF_TEXT_MENU'];
            $arResult[$key]['PARAMS']['ICON_URL'] = \CFile::GetPath($ob['UF_ICON']);
        }
    }
}

$solutionsRes = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    ['IBLOCK_ID' => 19, 'ACTIVE' => 'Y'],
    false,
    ['CODE', 'UF_ICON', 'UF_TEXT_MENU']
);
while ($ob = $solutionsRes->fetch()) {
    foreach ($arResult as $key => $value){
        if($value['DEPTH_LEVEL'] == 2 && strpos($value['LINK'],'solutions') && strpos($value['LINK'],$ob['CODE'])){
            $arResult[$key]['PARAMS']['DESCRIPTION'] = $ob['UF_TEXT_MENU'];
            $arResult[$key]['PARAMS']['ICON_URL'] = \CFile::GetPath($ob['UF_ICON']);
        }
    }
}

$catalogRes = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    ['IBLOCK_ID' => 14, 'ACTIVE' => 'Y'],
    false,
    ['ID', 'CODE']
);
$catalogSectionsIdList = [];
while ($ob = $catalogRes->fetch()) {
    foreach ($arResult as $key => $value){
        if($value['DEPTH_LEVEL'] == 2 && strpos($value['LINK'],'catalog') && strpos($value['LINK'],$ob['CODE'])){
            $arResult[$key]['PARAMS']['ID'] = $ob['ID'];
            $catalogSectionsIdList[] = $ob['ID'];
            $arResult[$key]['PARAMS']['CODE'] = $ob['CODE'];
        }
    }
}

$catalogSubSectRes = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    ['IBLOCK_ID' => 14, 'ACTIVE' => 'Y', 'DEPTH_LEVEL' => 2],
    false,
    ['ID', 'CODE', 'NAME', 'IBLOCK_SECTION_ID']
);
$catalogSubSect = [];
while ($ob = $catalogSubSectRes->fetch()) {
    $catalogSubSect[$ob['IBLOCK_SECTION_ID']][] = $ob;
}



foreach ($arResult as $key => $value){
    if($value['DEPTH_LEVEL'] == 2 && strpos($value['LINK'],'catalog')){
        $arResult[$key]['SUB_SECTIONS'] = $catalogSubSect[$value['PARAMS']['ID']];
    }
}




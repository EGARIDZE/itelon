<?php

$page = $APPLICATION->GetCurPage();
$arr = explode('/', $page);
$sectionId = [];
$sets = [];
if ($arr[1] == 'category') {
    $setsRes = CIBlockElement::GetList(
        false,
        ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'CODE' => $arr[2]],
        false,
        false,
        [
			'ID'
	        , 'NAME'
	        , 'PROPERTY_ITEMS'
	        , 'PROPERTY_SECTIONS'
	        , 'PROPERTY_SETS'
	        , 'PROPERTY_SET_MANUFACTURER'
	        , 'PROPERTY_SEO_TITLE'
	        , 'PROPERTY_SEO_SUBTITLE'
	        , 'PROPERTY_SECTION_FORM'
	        , 'PROPERTY_BANNER_COLOR'
	        , 'PROPERTY_BANNER_HTML'
        ]
    );
    $manufacturer = null;
    while ($ob = $setsRes->fetch()) {
        $arResult['SET'] = $ob;
        if(!empty($ob['PROPERTY_SET_MANUFACTURER_VALUE'])){
            $manufacturer = $ob['PROPERTY_SET_MANUFACTURER_VALUE'];
        }
        $arResult['ID_LIST'][] = $ob['PROPERTY_ITEMS_VALUE'];
        $sectionId[] = $ob['PROPERTY_SECTIONS_VALUE'];
        if(!empty($ob['PROPERTY_SETS_VALUE'])){
            $sets[] = $ob['PROPERTY_SETS_VALUE'];
        }
    }



    $arResult['ID_LIST'] = array_values(array_unique((array)$arResult['ID_LIST']));
    if($manufacturer){
        $result = CIBlockElement::GetList(
            false,
            ['IBLOCK_ID' => 14, 'ACTIVE' => 'Y', 'PROPERTY_MANUFACTURER' => $manufacturer],
            false,
            false,
            ['ID']
        );
        $arResult['ID_LIST'] = [];
        while ($ob = $result->fetch()) {
            if($ob['ID']){
                $arResult['ID_LIST'][] = $ob['ID'];
            }
        }
    }

    if(empty($arResult['ID_LIST'][0])){
        $arResult['ID_LIST'] = false;
    }

    $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(18, $arResult['SET']['ID']);
    $arElMetaProp = $ipropValues->getValues();
    $arResult['SEO'] = [
        'elementTitle' => $arElMetaProp['ELEMENT_PAGE_TITLE'],
        'title' => $arElMetaProp['ELEMENT_META_TITLE'],
        'keywords' => $arElMetaProp['ELEMENT_META_KEYWORDS'],
        'description' => htmlspecialchars_decode($arElMetaProp['ELEMENT_META_DESCRIPTION'])
    ];
}


if($arr[1] == 'category'){
    $arResult['SETS'] = [];
    if(!empty($sets)){
        $sets = array_unique($sets);
        $res = CIBlockElement::GetList(
            ['ID' => $sets],
            ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'ID' => $sets],
            false,
            false,
            ['ID', 'NAME', 'CODE', 'PROPERTY_POSITION']
        );
        while ($ob = $res->fetch()) {
            if ($ob['PROPERTY_POSITION_ENUM_ID'] == 273) {
                $arResult['SETS_TOP'][] = $ob;
            } else if ($ob['PROPERTY_POSITION_ENUM_ID'] == 274) {
                $arResult['SETS_BOTTOM'][] = $ob;
            } else {
                $arResult['SETS'][] = $ob;
            }
        }
    }
}else{
    $res = CIBlockElement::GetList(
        ['SORT'=>'ASC'],
        ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'PROPERTY_SECTIONS' => !empty($sectionId) ? $sectionId : $arResult['VARIABLES']['SECTION_ID']],
        false,
        false,
        ['ID', 'NAME', 'CODE', 'PROPERTY_POSITION']
    );
    while ($ob = $res->fetch()) {
        if ($ob['PROPERTY_POSITION_ENUM_ID'] == 273) {
            $arResult['SETS_TOP'][] = $ob;
        } else if ($ob['PROPERTY_POSITION_ENUM_ID'] == 274) {
            $arResult['SETS_BOTTOM'][] = $ob;
        }
    }
}





//mpr($arResult['VARIABLES']['SECTION_ID']);

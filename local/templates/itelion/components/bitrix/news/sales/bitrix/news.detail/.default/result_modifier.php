<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$res = CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => 14, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['CATALOG_PRODUCT']['VALUE']],
    false,
    false,
    [
        'ID',
        'NAME',
        'DETAIL_PAGE_URL',
        'PREVIEW_PICTURE',
        'PROPERTY_MANUFACTURER.ID',
        'PROPERTY_MANUFACTURER.NAME',
        'PROPERTY_MANUFACTURER.PROPERTY_ICONS',
        'PROPERTY_TYPE_EQUIPMENT',
        'PROPERTY_TECHNICAL_FEATURES',
        'PROPERTY_TASKS',
        'PROPERTY_FORM_FACTOR',
        'PROPERTY_PROCESSOR_FAMILY',
        'PROPERTY_PROCESSOR_SERIES',
        'PROPERTY_NUMBER_PROCESSOR',
        'PROPERTY_GENERATION',
        'PROPERTY_GUARANTEE_REDUCTION',
        'PROPERTY_GUARANTEE',
    ]
);

while ($ob = $res->GetNext()){
    $arResult['ITEMS'][] = $ob;
}




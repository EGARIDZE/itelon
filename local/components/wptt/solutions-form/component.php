<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Loader,
    \Bitrix\Iblock\IblockTable,
    \Bitrix\Iblock\Model\Section,
    \Bitrix\Iblock\Iblock;

Loader::includeModule("iblock");

//file_put_contents(__DIR__.'/data.txt', print_r($_REQUEST, true), FILE_APPEND);

if($_REQUEST['name'] && $_REQUEST['phone']){
    $el = new CIBlockElement;

    $PROP = [
        'NAME' => $_REQUEST['name'],
        'PHONE' => $_REQUEST['phone'],
        'COMMENT' => $_REQUEST['comment'],
        'CONNECTION_TYPE' => $_REQUEST['choosing-social'],
        'PROCESSOR_NUM' => $_REQUEST['PROCESSOR_NUM'],
        'CORES_NUM' => $_REQUEST['CORES_NUM'],
        'PROCESSOR_FREQURNCY' => $_REQUEST['PROCESSOR_FREQURNCY'],
        'VOLUME_DISC' => $_REQUEST['VOLUME_DISC'],
        'VOLUME_RAM' => $_REQUEST['VOLUME_RAM'],
        'SOFTWARE' => $_REQUEST['SOFTWARE'],
        'PERIOD' => $_REQUEST['PERIOD'],
        'LEASING' => $_REQUEST['leasing'],
    ];

    $iblockId = IblockTable::getList([
        'filter' => ['CODE' => 'formSolutions']
    ])->Fetch()['ID'];

    $arLoadProductArray = Array(
        "IBLOCK_ID"      => $iblockId,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
        "ACTIVE"         => "Y",
    );

    if(!$el->Add($arLoadProductArray)) {
        file_put_contents(__DIR__.'/error_log.txt', print_r($_REQUEST, true), FILE_APPEND);
    }
    LocalRedirect($APPLICATION->GetCurPage());
}

$iblockId = IblockTable::getList([
    'filter' => ['CODE' => 'solutionsFormSettings']
])->Fetch()['ID'];

$arResult['SETTINGS'] = \CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
    false,
    false,
    [
        'ID',
        'NAME',
        'PROPERTY_PROCESSOR_NUM',
        'PROPERTY_PROCESSOR_NUM_HINT',
        'PROPERTY_CORES_NUM',
        'PROPERTY_CORES_NUM_HINT',
        'PROPERTY_PROCESSOR_FREQURNCY',
        'PROPERTY_PROCESSOR_FREQURNCY_HINT',
        'PROPERTY_VOLUME_DISC',
        'PROPERTY_VOLUME_DISC_HINT',
        'PROPERTY_VOLUME_RAM',
        'PROPERTY_VOLUME_RAM_HINT',
        'PROPERTY_SOFTWARE',
        'PROPERTY_SOFTWARE_HINT',
        'PROPERTY_PERIOD',
        'PROPERTY_PERIOD_HINT',
        'PROPERTY_LIMIT_FROM',
        'PROPERTY_LIMIT_TO',
    ]
)->fetch();

$this->includeComponentTemplate();
?>
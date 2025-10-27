<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main\Loader,
    \Bitrix\Iblock\Iblock,
    \Bitrix\Iblock\IblockTable;

if(Loader::includeModule('iblock')){
//    $objectsClassName = Iblock::wakeUp(16)->getEntityDataClass();
//    $arrPayload = [
//        'select' => ['NAME', 'CATEGORIES_' => 'CATEGORIES'],
//        'filter' => ['ACTIVE' => 'Y'],
//        'order' => ['NAME' => 'ASC']
//    ];
//
//    $arResult['MANUF'] = $objectsClassName::getList($arrPayload)->fetchAll();


    $iblockId = IblockTable::getList([
        'filter' => ['CODE' => 'chooseServerFormSettings']
    ])->Fetch()['ID'];

    $arResult['MANUF'] = \CIBlockElement::GetList(
        false,
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
        false,
        false,
        [
            'ID',
            'PROPERTY_MANUFACTURES',
            'PROPERTY_MANUFACTURES_RUS',
            'PROPERTY_MANUFACTURES_FOREIGN',
        ]
    )->fetch();
}
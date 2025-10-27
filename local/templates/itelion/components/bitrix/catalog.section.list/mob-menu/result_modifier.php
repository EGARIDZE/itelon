<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Iblock\Iblock,
    \Bitrix\Iblock\SectionTable;

$objectsClassName = Iblock::wakeUp($arParams['IBLOCK_ID'])->getEntityDataClass();

foreach ($arResult['SECTIONS'] as $key => $value) {
    $arrPayload = [
        'order' => ['SORT' => 'ASC'],
        'select' => ['ID', 'NAME', 'CODE'],
        'filter' => ['IBLOCK_SECTION_ID' => $value['ID']]
    ];
    $arResult['SECTIONS'][$key]['ELEMENTS'] = $objectsClassName::getList($arrPayload)->fetchAll();

    $rsSection = SectionTable::getList(array(
        'order' => ['SORT' => 'ASC'],
        'filter' => ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'IBLOCK_SECTION_ID' => $value['ID'], 'DEPTH_LEVEL' => 2],
        'select' => ['ID', 'NAME', 'CODE']
    ));
    $subSectionsIdList = [];
    while ($arSection = $rsSection->fetch()) {
        $arResult['SECTIONS'][$key]['SUB_SECTIONS'][$arSection['ID']] = $arSection;
        $subSectionsIdList[] = $arSection['ID'];
    }

    $arrPayload = [
        'order' => ['SORT' => 'ASC'],
        'select' => ['ID', 'NAME', 'CODE', 'IBLOCK_SECTION_ID', 'SUBSECTIONS_' => 'SUBSECTIONS'],
        'filter' => ['IBLOCK_SECTION_ID' => $subSectionsIdList]
    ];
    $subSectionsElements = $objectsClassName::getList($arrPayload)->fetchAll();
    foreach ($subSectionsElements as $item) {
        if ($value['ID'] != 275) {
            $arResult['SECTIONS'][$key]['SUB_SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $item;
        } else {
            if (empty($arResult['SECTIONS'][$key]['SUB_SECTIONS'][$item['IBLOCK_SECTION_ID']]['SUB_SECTION_SECTION'][$item['ID']])) {
                $arResult['SECTIONS'][$key]['SUB_SECTIONS'][$item['IBLOCK_SECTION_ID']]['SUB_SECTION_SECTION'][$item['ID']] = [
                    'ID' => $item['ID'],
                    'NAME' => $item['NAME'],
                    'CODE' => $item['CODE'],
                    'ELEMENTS' => [[
                        'SUBSECTIONS_VALUE' => $item['SUBSECTIONS_VALUE'],
                        'SUBSECTIONS_DESCRIPTION' => $item['SUBSECTIONS_DESCRIPTION']
                    ]]
                ];
            } else {
                $arResult['SECTIONS'][$key]['SUB_SECTIONS'][$item['IBLOCK_SECTION_ID']]['SUB_SECTION_SECTION'][$item['ID']]['ELEMENTS'][] = [
                    'SUBSECTIONS_VALUE' => $item['SUBSECTIONS_VALUE'],
                    'SUBSECTIONS_DESCRIPTION' => $item['SUBSECTIONS_DESCRIPTION']
                ];
            }
        }
    }
}


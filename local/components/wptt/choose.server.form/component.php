<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Loader,
    \Bitrix\Iblock\IblockTable,
    \Bitrix\Iblock\Model\Section,
    \Bitrix\Iblock\Iblock;

Loader::includeModule("iblock");

$iblockId = IblockTable::getList([
    'filter' => ['CODE' => 'chooseServerFormSettings']
])->Fetch()['ID'];
$arResult['SETTINGS'] = \CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
    false,
    false,
    [
        'ID',
        'PROPERTY_MANUFACTURES',
        'PROPERTY_MANUFACTURES_RUS',
        'PROPERTY_MANUFACTURES_FOREIGN',
        'PROPERTY_CORPUS',
        'PROPERTY_CORPUS_HEIGHT',
        'PROPERTY_PROCESSOR_NUMBER',
        'PROPERTY_PROCESSOR_MARK',
        'PROPERTY_PROCESSOR_FAMILY',
        'PROPERTY_PROCESSOR_MODEL',
        'PROPERTY_MEMORY_TYPE',
        'PROPERTY_RAID',
        'PROPERTY_HARD_DRIVES_FORM_FACTOR',
        'PROPERTY_HARD_DRIVES_TYPE',
        'PROPERTY_HARD_DRIVES_MODEL',
        'PROPERTY_MAPS_INTERFACE',
        'PROPERTY_MAPS_MODEL',
        'PROPERTY_POWER_NUMBER',
        'PROPERTY_POWER_ENERGY',
        'PROPERTY_ADVANCED_MANAGEMENT',
        'PROPERTY_WARRANTY',
        'PROPERTY_SOFTWARE',
        'PROPERTY_UPS',
        'PROPERTY_SERVICE_HINT',
        'PROPERTY_SERVICE',
        'PROPERTY_RPS_HINT',
        'PROPERTY_RPS',
    ]
)->fetch();

foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK_VALUE'] as $key1 => $item1) {
    $arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK'][$key1]['NAME'] = $item1;
    foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_FAMILY_VALUE'] as $key2 => $item2) {
        if ($item1 == $item2['SUB_VALUES']['PROCESSOR_FAMILY_BINDING']['VALUE']) {
            $arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK'][$key1]['FAMILY'][$key2]['NAME'] = $item2['SUB_VALUES']['PROCESSOR_FAMILY_NAME']['VALUE'];
            foreach ($arResult['SETTINGS']['PROPERTY_PROCESSOR_MODEL_VALUE'] as $key3 => $item3) {
                if ($item1 . '-' . $item2['SUB_VALUES']['PROCESSOR_FAMILY_NAME']['VALUE'] == $item3['SUB_VALUES']['PROCESSOR_MODEL_BINDING']['VALUE']) {
                    $arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK'][$key1]['FAMILY'][$key2]['MODEL'][$key3]['NAME'] = $item3['SUB_VALUES']['PROCESSOR_MODEL_NAME']['VALUE'];
                    $arResult['SETTINGS']['PROPERTY_PROCESSOR_MARK'][$key1]['FAMILY'][$key2]['MODEL'][$key3]['DESCRIPTION'] = $item3['SUB_VALUES']['PROCESSOR_MODEL_DESCRIPTION']['VALUE'];
                }
            }
        }
    }
}

foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_FORM_FACTOR_VALUE'] as $key1 => $item1) {
    $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['NAME'] = $item1;
    foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_TYPE_VALUE'] as $key2 => $item2) {
        if ($item1 == $item2['SUB_VALUES']['HARD_DRIVES_TYPE_BINDING']['VALUE']) {
            $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['TYPE'][$key2]['NAME'] = $item2['SUB_VALUES']['HARD_DRIVES_TYPE_NAME']['VALUE'];
            foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_MODEL_VALUE'] as $key3 => $item3) {
                if ($item1 . '-' . $item2['SUB_VALUES']['HARD_DRIVES_TYPE_NAME']['VALUE'] == $item3['SUB_VALUES']['HARD_DRIVES_MODEL_BINDING']['VALUE']) {
                    $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['TYPE'][$key2]['MODEL'][$key3]['NAME'] = $item3['SUB_VALUES']['HARD_DRIVES_MODEL_NAME']['VALUE'];
                    $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['TYPE'][$key2]['MODEL'][$key3]['DESCRIPTION'] = $item3['SUB_VALUES']['HARD_DRIVES_MODEL_DESCRIPTION']['VALUE'];
                }
            }
        }
    }
}

foreach ($arResult['SETTINGS']['PROPERTY_MAPS_INTERFACE_VALUE'] as $key1 => $item1) {
    $arResult['SETTINGS']['PROPERTY_MAPS'][$key1]['NAME'] = $item1;
    foreach ($arResult['SETTINGS']['PROPERTY_MAPS_MODEL_VALUE'] as $key2 => $item2) {
        if ($item1 == $item2['SUB_VALUES']['MAPS_MODEL_BINDING']['VALUE']) {
            $arResult['SETTINGS']['PROPERTY_MAPS'][$key1]['MODEL'][$key2]['NAME'] = $item2['SUB_VALUES']['MAPS_MODEL_NAME']['VALUE'];
            $arResult['SETTINGS']['PROPERTY_MAPS'][$key1]['MODEL'][$key2]['DESCRIPTION'] = $item2['SUB_VALUES']['MAPS_MODEL_DESCRIPTION']['VALUE'];
        }
    }
}
$request = [];

foreach ($_POST as $key => $value) {
    if (!empty($value)) {
        $request[$key] = $value;
    }
}


if ($request['name'] && $request['phone']) {
    $el = new CIBlockElement;
    $SERVER_TASKS = [];
    $task = '';
    foreach ($request as $key => $value) {
        if (strpos($key, 'task') !== false) {
            $task = $key;
            $SERVER_TASKS[$task] = 'Задача - ' . $value . "\n";
        } elseif (strpos($key, 'tk_item') !== false) {
            $SERVER_TASKS[$task] .= $value . "\n";
        }
    }

    $RAM_ARR = [];
    foreach ($request as $key => $value) {
        if (strpos($key, 'ram-type') !== false || strpos($key, 'ram-amount') !== false) {
            if (strpos($key, 'duplicate') !== false) {
                $k = explode('_duplicate_', $key)[1];
                if (strpos($key, 'ram-type') !== false) {
                    $RAM_ARR[$k]['type'] = $value;
                } else {
                    $RAM_ARR[$k]['amount'] = $value;
                }
            } else {
                if (strpos($key, 'ram-type') !== false) {
                    $RAM_ARR['empty']['type'] = $value;
                } else {
                    $RAM_ARR['empty']['amount'] = $value;
                }
            }
        }
    }
    $RAM = [];
    if(!empty($RAM_ARR)){
        foreach ($RAM_ARR as $key => $value){
            foreach ($value as $k => $item){
                if (strpos($k, 'type') !== false) {
                    if(empty($RAM[$key])){
                        $RAM[$key] = 'Тип - ' . $item . "\n";
                    }else{
                        $RAM[$key] .= 'Тип - ' . $item . "\n";
                    }
                } else {
                    if(empty($RAM[$key])){
                        $RAM[$key] = 'Количество - ' . $item . "\n";
                    }else{
                        $RAM[$key] .= 'Количество - ' . $item . "\n";
                    }
                }
            }
        }
    }

    $DISC_ARR = [];
    foreach ($request as $key => $value) {
        if (
            strpos($key, 'disk-amount') !== false ||
            strpos($key, 'disc-form-factor') !== false ||
            strpos($key, 'disc-type') !== false ||
            strpos($key, 'disc-model') !== false
        ) {
            if (strpos($key, 'duplicate') !== false) {
                $k = explode('_duplicate_', $key)[1];
                if (strpos($key, 'disk-amount') !== false) {
                    $DISC_ARR[$k]['amount'] = $value;
                } elseif(strpos($key, 'disc-form-factor') !== false) {
                    $DISC_ARR[$k]['form-factor'] = $value;
                }elseif(strpos($key, 'disc-type') !== false) {
                    $DISC_ARR[$k]['type'] = $value;
                }else{
                    $DISC_ARR[$k]['model'] = $value;
                }
            } else {
                if (strpos($key, 'disk-amount') !== false) {
                    $DISC_ARR['empty']['amount'] = $value;
                } elseif(strpos($key, 'disc-form-factor') !== false) {
                    $DISC_ARR['empty']['form-factor'] = $value;
                }elseif(strpos($key, 'disc-type') !== false) {
                    $DISC_ARR['empty']['type'] = $value;
                }else{
                    $DISC_ARR['empty']['model'] = $value;
                }
            }
        }
    }
    $DISC = [];
    if(!empty($DISC_ARR)){
        foreach ($DISC_ARR as $key => $value){
            foreach ($value as $k => $item){
                if (strpos($k, 'amount') !== false) {
                    if(empty($DISC[$key])){
                        $DISC[$key] = 'Количество - ' . $item . "\n";
                    }else{
                        $DISC[$key] .= 'Количество - ' . $item . "\n";
                    }
                } elseif(strpos($k, 'form-factor') !== false) {
                    if(empty($DISC[$key])){
                        $DISC[$key] = 'Форм-фактор - ' . $item . "\n";
                    }else{
                        $DISC[$key] .= 'Форм-фактор - ' . $item . "\n";
                    }
                }elseif(strpos($k, 'type') !== false) {
                    if(empty($DISC[$key])){
                        $DISC[$key] = 'Тип - ' . $item . "\n";
                    }else{
                        $DISC[$key] .= 'Тип - ' . $item . "\n";
                    }
                }else{
                    if(empty($DISC[$key])){
                        $DISC[$key] = 'Модель - ' . $item . "\n";
                    }else{
                        $DISC[$key] .= 'Модель - ' . $item . "\n";
                    }
                }
            }
        }
    }

    $MAPS_ARR = [];
    foreach ($request as $key => $value) {
        if (strpos($key, 'network-card-interface') !== false || strpos($key, 'network-card-model') !== false) {
            if (strpos($key, 'duplicate') !== false) {
                $k = explode('_duplicate_', $key)[1];
                if (strpos($key, 'network-card-interface') !== false) {
                    $MAPS_ARR[$k]['network-card-interface'] = $value;
                } else {
                    $MAPS_ARR[$k]['amount'] = $value;
                }
            } else {
                if (strpos($key, 'network-card-interface') !== false) {
                    $MAPS_ARR['empty']['network-card-interface'] = $value;
                } else {
                    $MAPS_ARR['empty']['amount'] = $value;
                }
            }
        }
    }
    $MAPS = [];
    if(!empty($MAPS_ARR)){
        foreach ($MAPS_ARR as $key => $value){
            foreach ($value as $k => $item){
                if (strpos($k, 'network-card-interface') !== false) {
                    if(empty($MAPS[$key])){
                        $MAPS[$key] = 'Интерфейс карт - ' . $item . "\n";
                    }else{
                        $MAPS[$key] .= 'Интерфейс карт - ' . $item . "\n";
                    }
                } else {
                    if(empty($MAPS[$key])){
                        $MAPS[$key] = 'Модель сетевой карты - ' . $item . "\n";
                    }else{
                        $MAPS[$key] .= 'Модель сетевой карты - ' . $item . "\n";
                    }
                }
            }
        }
    }

    $SOFTWARE = [];
    foreach ($request as $key => $value) {
        if (strpos($key, 'software') !== false) {
            $SOFTWARE[] = $value;
        }
    }

    $PROP = [
        'NAME' => $request['name'],
        'PHONE' => $request['phone'],
        'COMMENT' => $request['comment'],
        'CONNECTION_TYPE' => $request['choosing-social'],
        'MANUFACTURER' => $request['producers'],
        'MARK' => $request['mark'],
        'SERVER_TASKS' => array_values($SERVER_TASKS),
        'CORPUS' => $request['corpus'],
        'CORPUS_HEIGHT' => $request['corpus-height'],
        'NUMBER_PROCESSOR' => $request['number-processors'],
        'MARK_PROCESSOR' => $request['chip-maker'],
        'PROCESSOR_FAMILY' => $request['chip-family'],
        'PROCESSOR_MODEL' => $request['chip-model'],
        'RAM' => $RAM,
        'RAID' => $request['RAID-type'],
        'DISC' => $DISC,
        'MAPS' => $MAPS,
        'POWER_NUMBER' => $request['power-unit'],
        'POWER_ENERGY' => $request['power-energy'],
        'ADVANCED_MANAGEMENT' => $request['extended-control'],
        'WARRANTY' => $request['waranty'],
        'SOFTWARE' => $SOFTWARE,
        'UPS' => $request['ups'],
        'SERVICE' => $request['service'],
        'RPS' => $request['in-stock'],
        'SRC' => $request['src'],
        'TYP' => $request['typ'],
        'MDM' => $request['mdm'],
        'CMP' => $request['cmp'],
        'CNT' => $request['cnt'],
        'TRM' => $request['trm'],
        'URL' => $request['url'],
    ];

    $iblockId = IblockTable::getList([
        'filter' => ['CODE' => 'chooseServer']
    ])->Fetch()['ID'];

    $arLoadProductArray = array(
        "IBLOCK_ID" => $iblockId,
        "PROPERTY_VALUES" => $PROP,
        "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
        "ACTIVE" => "Y",
    );

    if (!$el->Add($arLoadProductArray)) {
        \CEventLog::Add(array(
            "SEVERITY" => "ERROR",
            "AUDIT_TYPE_ID" => "CHOOSE_SERVER",
            "MODULE_ID" => "main",
            "DESCRIPTION" => $el->LAST_ERROR,
        ));
    }
    LocalRedirect('/choose-server/?success=yes');
}


$this->includeComponentTemplate();
?>
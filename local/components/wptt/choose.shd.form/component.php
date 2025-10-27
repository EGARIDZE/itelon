<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Loader,
    \Bitrix\Iblock\IblockTable,
    \Bitrix\Iblock\Model\Section,
    \Bitrix\Iblock\Iblock;

Loader::includeModule("iblock");

$iblockId = IblockTable::getList([
    'filter' => ['CODE' => 'chooseShdFormSettings']
])->Fetch()['ID'];

$arResult['SETTINGS'] = \CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
    false,
    false,
    [
        'ID',
        'NAME',
        'PROPERTY_MANUFACTURES',
        'PROPERTY_MANUFACTURES_RUS',
        'PROPERTY_MANUFACTURES_FOREIGN',
        'PROPERTY_STORAGE_SYSTEM_TYPE',
        'PROPERTY_CONTROLLER_NUMBER',
        'PROPERTY_CONTROLLER_INTERFACE',
        'PROPERTY_CACHE',
        'PROPERTY_SSD_CACHE',
        'PROPERTY_SSD_CACHE_HINT',
        'PROPERTY_DATA_TYPE',
        'PROPERTY_HARD_DRIVES_FORM_FACTOR',
        'PROPERTY_HARD_DRIVES_TYPE',
        'PROPERTY_HARD_DRIVES_MODEL',
        'PROPERTY_ADDITIONAL_SERVICES',
        'PROPERTY_ADDITIONAL_SERVICES_HINT',
        'PROPERTY_CONNECTED_SERVER',
        'PROPERTY_SAN_HINT',
        'PROPERTY_UPS',
        'PROPERTY_WARRANTY',
        'PROPERTY_SERVICE',
        'PROPERTY_RPS',
        'PROPERTY_SERVICE_HINT',
        'PROPERTY_RPS_HINT',
    ]
)->fetch();

foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_FORM_FACTOR_VALUE'] as $key1 => $item1) {
    $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['NAME'] = $item1;
    foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_TYPE_VALUE'] as $key2 => $item2) {
        if ($item1 == $item2['SUB_VALUES']['HARD_DRIVES_TYPE_BINDING']['VALUE']) {
            $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['TYPE'][$key2]['NAME'] = $item2['SUB_VALUES']['HARD_DRIVES_TYPE_NAME']['VALUE'];
            foreach ($arResult['SETTINGS']['PROPERTY_HARD_DRIVES_MODEL_VALUE'] as $key3 => $item3) {
                if ($item1 . '-' . $item2['SUB_VALUES']['HARD_DRIVES_TYPE_NAME']['VALUE'] == $item3['SUB_VALUES']['HARD_DRIVES_MODEL_BINDING']['VALUE']) {
                    $arResult['SETTINGS']['PROPERTY_HARD_DRIVES'][$key1]['TYPE'][$key2]['MODEL'][$key3]['NAME'] = $item3['SUB_VALUES']['HARD_DRIVES_MODEL_NAME']['VALUE'];
                }
            }
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
    $DISC_ARR = [];
    foreach ($request as $key => $value) {
        if (
            strpos($key, 'disc-form-factor') !== false ||
            strpos($key, 'disc-type') !== false ||
            strpos($key, 'disc-model') !== false
        ) {
            if (strpos($key, 'duplicate') !== false) {
                $k = explode('_duplicate_', $key)[1];
                if (strpos($key, 'disc-form-factor') !== false) {
                    $DISC_ARR[$k]['form-factor'] = $value;
                } elseif (strpos($key, 'disc-type') !== false) {
                    $DISC_ARR[$k]['type'] = $value;
                } else {
                    $DISC_ARR[$k]['model'] = $value;
                }
            } else {
                if (strpos($key, 'disc-form-factor') !== false) {
                    $DISC_ARR['empty']['form-factor'] = $value;
                } elseif (strpos($key, 'disc-type') !== false) {
                    $DISC_ARR['empty']['type'] = $value;
                } else {
                    $DISC_ARR['empty']['model'] = $value;
                }
            }
        }
    }
    $TECHNICAL_CHARACTERISTICS = [];
    if (!empty($DISC_ARR)) {
        foreach ($DISC_ARR as $key => $value) {
            foreach ($value as $k => $item) {
                if (strpos($k, 'form-factor') !== false) {
                    if (empty($TECHNICAL_CHARACTERISTICS[$key])) {
                        $TECHNICAL_CHARACTERISTICS[$key] = 'Форм-фактор - ' . $item . "\n";
                    } else {
                        $TECHNICAL_CHARACTERISTICS[$key] .= 'Форм-фактор - ' . $item . "\n";
                    }
                } elseif (strpos($k, 'type') !== false) {
                    if (empty($TECHNICAL_CHARACTERISTICS[$key])) {
                        $TECHNICAL_CHARACTERISTICS[$key] = 'Тип - ' . $item . "\n";
                    } else {
                        $TECHNICAL_CHARACTERISTICS[$key] .= 'Тип - ' . $item . "\n";
                    }
                } else {
                    if (empty($TECHNICAL_CHARACTERISTICS[$key])) {
                        $TECHNICAL_CHARACTERISTICS[$key] = 'Модель - ' . $item . "\n";
                    } else {
                        $TECHNICAL_CHARACTERISTICS[$key] .= 'Модель - ' . $item . "\n";
                    }
                }
            }
        }
    }

    $TOTAL_VOLUME_ARR = [];
    foreach ($request as $key => $value) {
        if (strpos($key, 'speed-type') !== false || strpos($key, 'disk-size') !== false) {
            if (strpos($key, 'duplicate') !== false) {
                $k = explode('_duplicate_', $key)[1];
                if (strpos($key, 'speed-type') !== false) {
                    $TOTAL_VOLUME_ARR[$k]['type'] = $value;
                } else {
                    $TOTAL_VOLUME_ARR[$k]['size'] = $value;
                }
            } else {
                if (strpos($key, 'speed-type') !== false) {
                    $TOTAL_VOLUME_ARR['empty']['type'] = $value;
                } else {
                    $TOTAL_VOLUME_ARR['empty']['size'] = $value;
                }
            }
        }
    }
    $TOTAL_VOLUME = [];
    if (!empty($TOTAL_VOLUME_ARR)) {
        foreach ($TOTAL_VOLUME_ARR as $key => $value) {
            foreach ($value as $k => $item) {
                if (strpos($k, 'type') !== false) {
                    if (empty($TOTAL_VOLUME[$key])) {
                        $TOTAL_VOLUME[$key] = 'Тип данных - ' . $item . "\n";
                    } else {
                        $TOTAL_VOLUME[$key] .= 'Тип данных - ' . $item . "\n";
                    }
                } else {
                    if (empty($TOTAL_VOLUME[$key])) {
                        $TOTAL_VOLUME[$key] = 'Объем массива (ТБ) - ' . $item . "\n";
                    } else {
                        $TOTAL_VOLUME[$key] .= 'Объем массива (ТБ) - ' . $item . "\n";
                    }
                }
            }
        }
    }

    $PROP = [
        'NAME' => $request['name'],
        'PHONE' => $request['phone'],
        'COMMENT' => $request['comment'],
        'CONNECTION_TYPE' => $request['choosing-social'],
        'MANUFACTURER' => $request['producers'],
        'MARK' => $request['mark'],
        'STORAGE_SYSTEM_TYPE' => $request['storage-system'],
        'CONTROLLER_INTERFACE' => $request['controller-interface'],
        'CONTROLLER_NUMBER' => $request['controller-count'],
        'CACHE' => $request['cache'],
        'SSD_CACHE' => $request['SSD_cache'],
        'CACHE_SIZE' => $request['cache-size'],
        'TOTAL_VOLUME' => $TOTAL_VOLUME,
        'TECHNICAL_CHARACTERISTICS' => $TECHNICAL_CHARACTERISTICS,
        'ADDITIONAL_SERVICES' => $request['additional-services'],
        'CONNECTED_SERVER' => $request['connected-servers-count'],
        'SAN' => $request['SAN-comutator'],
        'UPS' => $request['ups'],
        'WARRANTY' => $request['waranty'],
        'SERVICE' => $request['service'],
        'RPS' => $request['RPS'],
        'SRC' => $request['src'],
        'TYP' => $request['typ'],
        'MDM' => $request['mdm'],
        'CMP' => $request['cmp'],
        'CNT' => $request['cnt'],
        'TRM' => $request['trm'],
        'URL' => $request['url'],
    ];

    $iblockId = IblockTable::getList([
        'filter' => ['CODE' => 'chooseShd']
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
            "AUDIT_TYPE_ID" => "CHOOSE_SHD",
            "MODULE_ID" => "main",
            "DESCRIPTION" => $el->LAST_ERROR,
        ));
    }
    LocalRedirect('/choose-shd/?success=yes');
}

$this->includeComponentTemplate();
?>
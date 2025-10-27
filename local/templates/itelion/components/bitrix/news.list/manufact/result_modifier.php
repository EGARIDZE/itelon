<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule('highloadblock');

$hlblockId = 2;

$hlblock = HighloadBlockTable::getById($hlblockId)->fetch();
$arResult = [];

if ($hlblock) {
    $entity = HighloadBlockTable::compileEntity($hlblock);
    $entityDataClass = $entity->getDataClass();

    // Получаем данные из Highload-блока
    $result = $entityDataClass::getList([
        'select' => ['ID', 'UF_NAME', 'UF_FILE'],
        'order' => ['ID' => 'ASC'],
    ]);

    while ($row = $result->fetch()) {
        $fileId = $row['UF_FILE'];

        // Получаем ссылку на файл по его ID
        $filePath = CFile::GetPath($fileId);

        if ($filePath) {
            $row['FILE_PATH'] = $filePath;
        }

        $arResult['hl_rows'][] = $row;
    }
}

$this->arResult = $arResult;


<?php
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

$arResult['SELECTED_ROWS_COUNT'] = 0;
$arResult['min_price'] = 0;
foreach ($arResult['ITEMS'] as $item){

    $arResult['SELECTED_ROWS_COUNT']++;
    if ($arResult['min_price'] == 0 || ($item['ITEM_PRICES'][0]['BASE_PRICE'] < $arResult['min_price'] && $item['ITEM_PRICES'][0]['BASE_PRICE'] > 0))
    {
        $arResult['min_price'] = $item['ITEM_PRICES'][0]['BASE_PRICE'];
    }

}


?>

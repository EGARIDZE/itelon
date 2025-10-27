<?php
$rsSections = CIBlockSection::GetList(
    Array("SORT" => "ASC"),
    Array(
        "=IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "=ACTIVE"    => "Y"
    )
);

$arSections = array();
while ($arSection = $rsSections->GetNext()) {
    $arSections[$arSection['ID']] = $arSection; // Используем ID как ключ
    $arSections[$arSection['ID']]['ITEMS'] = array(); // Создаем пустой массив "ITEMS" для каждого раздела
}

foreach ($arResult["ITEMS"] as $arItem) {
    if (isset($arSections[$arItem['IBLOCK_SECTION_ID']])) {
        $arSections[$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem; // Добавляем элементы в массив "ITEMS" соответствующего раздела
    }
}

$arResult["SECTIONS"] = $arSections;

?>
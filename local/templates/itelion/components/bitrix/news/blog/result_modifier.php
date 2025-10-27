<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
$arParams['USE_SHARE'] = (string)($arParams['USE_SHARE'] ?? 'N');
$arParams['USE_SHARE'] = $arParams['USE_SHARE'] === 'Y' ? 'Y' : 'N';
$arParams['SHARE_HIDE'] = (string)($arParams['SHARE_HIDE'] ?? 'N');
$arParams['SHARE_HIDE'] = $arParams['SHARE_HIDE'] === 'Y' ? 'Y' : 'N';
$arParams['SHARE_TEMPLATE'] = (string)($arParams['SHARE_TEMPLATE'] ?? 'N');
$arParams['SHARE_HANDLERS'] ??= [];
$arParams['SHARE_HANDLERS'] = is_array($arParams['SHARE_HANDLERS']) ? $arParams['SHARE_HANDLERS'] : [];
$arParams['SHARE_SHORTEN_URL_LOGIN'] = (string)($arParams['SHARE_SHORTEN_URL_LOGIN'] ?? 'N');
$arParams['SHARE_SHORTEN_URL_KEY'] = (string)($arParams['SHARE_SHORTEN_URL_KEY'] ?? 'N');

// вывод топ 3 популярных статей в блоге
if (CModule::IncludeModule('iblock')) {
	$res = CIBlockElement::GetList(
		array("SHOW_COUNTER" => "DESC"), // сортировка по количеству просмотров;
		array("IBLOCK_ID" => 17, " ACTIVE" => "Y", 'PROPERTY_POPULAR' => 1), //Получаем  активные элементы , в данном случае из инфоблока с ID = 1;
		false,
		array("nTopCount" => 3), //ограничиваем количество элементов - только 5.
		array("NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL")// Выбираем только указанные поля
	);
	while ($ar = $res->GetNext()) {
		$arResult['POPULAR'][] = $ar;    //массив с данными 5 самых просматриваемых элементов инфоблока
	}
}
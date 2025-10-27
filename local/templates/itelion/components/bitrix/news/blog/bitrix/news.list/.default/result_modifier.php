<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$res = CIBlockElement::GetList(
	false,
	[
		'IBLOCK_CODE' => 'blog_comments'
		, 'PROPERTY_BLOG' => $arResult['ELEMENTS']
		, 'PROPERTY_APPROVED' => 1

	],
	['PROPERTY_BLOG'],
	false
);
$arCommentsCount = [];
while ($ob = $res->Fetch()){
	$arCommentsCount[$ob['PROPERTY_BLOG_VALUE']] = $ob['CNT'];
}
foreach ($arResult['ITEMS'] as &$arItem) {
	$arItem['COMMENTS_CNT'] = array_key_exists($arItem['ID'], $arCommentsCount) ? $arCommentsCount[$arItem['ID']] : 0;
	$arRatings = $arItem['PROPERTIES']['RATINGS']['VALUE'];
	$arItem['AVERAGE_RATE'] = empty($arRatings) ? 0 : round(array_sum($arRatings) / count($arRatings), 1);
}
unset($arItem);

//clog($arResult);
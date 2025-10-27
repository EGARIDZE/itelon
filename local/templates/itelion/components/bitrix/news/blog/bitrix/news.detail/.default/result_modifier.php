<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Type\DateTime;
/*if($arResult['PROPERTIES']['CASE']['VALUE']){
    $res = CIBlockElement::GetList(
        false,
        ['IBLOCK_ID' => 12, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['CASE']['VALUE']],
        false,
        false,
        [
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
            'PREVIEW_PICTURE',
        ]
    );

    while ($ob = $res->GetNext()){
        $arResult['CASE'][] = $ob;
    }
}*/
$arResult['DISPLAY_ACTIVE_FROM'] = FormatDate('j F Y', MakeTimeStamp($arResult['DISPLAY_ACTIVE_FROM']));
$arResult['DISPLAY_UPDATE_DATE'] = FormatDate('j F Y', MakeTimeStamp($arResult['PROPERTIES']['UPDATE_DATE']['VALUE']));
$arRatings = $arResult['PROPERTIES']['RATINGS']['VALUE'];
$arResult['AVERAGE_RATE'] = empty($arRatings) ? 0 : round(array_sum($arRatings) / count($arRatings), 1);

//region tags
if (array_key_exists('TAGS_LINKS', $arResult['DISPLAY_PROPERTIES'])) {
	if (is_array($arResult['DISPLAY_PROPERTIES']['TAGS_LINKS']["DISPLAY_VALUE"])) {
		foreach ($arResult['DISPLAY_PROPERTIES']['TAGS_LINKS']["DISPLAY_VALUE"] as $i => $tag) {
			$arResult['TAGS'][$arResult['DISPLAY_PROPERTIES']['TAGS_LINKS']['VALUE'][$i]] = strip_tags($tag);
		}
	} else {
		$arResult['TAGS'][$arResult['DISPLAY_PROPERTIES']['TAGS_LINKS']['VALUE'][0]] =
			strip_tags($arResult['DISPLAY_PROPERTIES']['TAGS_LINKS']["DISPLAY_VALUE"]);
	}
} else {
	$arResult['TAGS'] = [];
}

//endregion

$arResult['SHOW_BLOGS'] = $arResult['PROPERTIES']['INTERESTING']['VALUE']
	&& count($arResult['PROPERTIES']['INTERESTING']['VALUE']) > 1
	|| isset($_REQUEST['blog_filter']);

//clog($arResult);
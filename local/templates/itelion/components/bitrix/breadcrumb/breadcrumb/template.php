<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$page = $APPLICATION->GetCurPage();
$arr = explode('/', $page);
if($arr[1] == 'category'){
    $res = CIBlockElement::GetList(
        false,
        ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'CODE' => $arr[2]],
        false,
        false,
        ['ID', 'NAME', 'CODE', 'PROPERTY_SECTIONS_BRADCRUMBS']
    );
    while ($ob = $res->fetch()){
    	if ($ob['PROPERTY_SECTIONS_BRADCRUMBS_VALUE']) {
    		$res = CIBlockSection::GetByID($ob['PROPERTY_SECTIONS_BRADCRUMBS_VALUE']);
    		$ar_res = $res->GetNext();
    		$arResult[] = [
    			'TITLE' => $ar_res['NAME'],
    			'LINK' => '/catalog/' . $ar_res['CODE'] . '/'
    		];
    	}
    	$arResult[] = [
    		'TITLE' => $ob['NAME'],
    		'LINK' => '/category/' . $ob['CODE'] . '/'
    	];
    }
}




//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="bread-crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<div id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item" target="_self">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}
	else
	{
		$strReturn .= '<span>'.$title.'</span>';
	}
}

$strReturn .= '</div>';

return $strReturn;


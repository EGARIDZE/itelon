<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//clog($arResult);

$strReturn .= '<div class="bread-crumbs">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	if ($index==2) continue;
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$strReturn .= '<a href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>';
	} else {
		$strReturn .= '<span>'.$title.'</span>';
	}
}
$strReturn .= '</div>';
return $strReturn;

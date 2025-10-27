<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
$aMenuLinks = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "1",
		"DETAIL_PAGE_URL" => "",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "news",
		"IS_SEF" => "Y",
		"SECTION_PAGE_URL" => "?section=#SECTION_CODE#",
		"SEF_BASE_URL" => "/case/"
	)
);


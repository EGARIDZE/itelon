<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$curDir = $APPLICATION->GetCurDir();
$mainSection = explode('/', $curDir)[2];
$sectionL2 = explode('/', $curDir)[3];
if (0 < $arResult['SECTIONS_COUNT'])
{
	if ('LIST' != $arParams['VIEW_MODE'])
	{
		$boolClear = false;
		$arNewSections = array();
		foreach ($arResult['SECTIONS'] as &$arOneSection)
		{
			if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL'])
			{
				$boolClear = true;
				continue;
			}
			$arNewSections[] = $arOneSection;
		}
		unset($arOneSection);
		if ($boolClear)
		{
			$arResult['SECTIONS'] = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);
	}
	foreach ($arResult['SECTIONS'] as $i => $arOneSection) {
		/*if ($arOneSection['ELEMENT_CNT'] == '0') {
			unset($arResult['SECTIONS'][$i]);
			continue;
		}*/
		if ($arOneSection['RELATIVE_DEPTH_LEVEL']===1) {
			$groupName = $arOneSection['NAME'];
			$arResult['SECTIONS_GROUPS']['TABS'][$groupName]['link'] = $arOneSection['SECTION_PAGE_URL'];
			$arResult['SECTIONS_GROUPS']['TABS'][$groupName]['active'] = $arOneSection['CODE']==$mainSection;
		}
		else if ($arOneSection['RELATIVE_DEPTH_LEVEL']===2) {
			$groupNameL2 = $arOneSection['NAME'];
			$arResult['SECTIONS_GROUPS']['TAB_CONTENT'][$groupName][$groupNameL2]['list'] = [];
			$arResult['SECTIONS_GROUPS']['TAB_CONTENT'][$groupName][$groupNameL2]['link'] = $arOneSection['SECTION_PAGE_URL'];
			$arResult['SECTIONS_GROUPS']['TAB_CONTENT'][$groupName][$groupNameL2]['active'] = $arOneSection['CODE']==$sectionL2;
		}
		else {
			$name = preg_replace('/^.+?([a-z]{1,2}\d.+)/i', '$1', $arOneSection['NAME']);
			$arResult['SECTIONS_GROUPS']['TAB_CONTENT'][$groupName][$groupNameL2]['list'][$name]['link'] = $arOneSection['SECTION_PAGE_URL'];
			$arResult['SECTIONS_GROUPS']['TAB_CONTENT'][$groupName][$groupNameL2]['list'][$name]['active'] =
				$arOneSection['CODE']==$arParams['GMI_SECTION_CODE'];
		}
	}
}


if (!empty($arParams['GMI_REDIRECT'])) {
	LocalRedirect($arResult['SECTIONS'][0]['SECTION_PAGE_URL']);
}

//clog($arParams);


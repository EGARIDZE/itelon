<?
$arSets = [];
$getElements = CIBlockElement::GetList(
	false,
	[
		'IBLOCK_ID' => $arParams['IBLOCK_ID'],
		'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
		'ACTIVE' => 'Y'
	],
	false,
	false,
	[
		'DETAIL_PAGE_URL',
		'PROPERTY_SET'
	]
);
while($elements = $getElements->GetNextElement()){ 
	$arProps = $elements->GetProperties();
	foreach ($arProps['SET']['VALUE'] as $key => $set) {
		$arSets[] = $set;
	}
}
$arResult['SETS'] = array_unique($arSets);
?>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
$intConfigurableBundles = 0;

$res = \CIBlockElement::GetList(
    false,
    ['IBLOCK_ID' => 18, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['SETS_LIST']['VALUE']],
    false,
    false,
    ['ID', 'NAME', 'CODE']
);

while ($ob = $res->fetch()) {
    $arResult['SETS'][] = $ob;
}

$marker = $arResult["PROPERTIES"]["PART_NUMBER"]['VALUE'];
$arVendor = $arResult['DISPLAY_PROPERTIES']['MANUFACTURER']['LINK_ELEMENT_VALUE'];
$vendorID = $arVendor ? reset($arVendor)['ID'] : '';
if ($vendorID) {
	$res = CIBlockElement::GetPropertyValues(16,['ID' => $vendorID],false,['ID'=>[612,613]]);
	if ($ob = $res->Fetch()) {
		$arResult['LOGO'] = [
			'PIC' => CFile::GetPath($ob['612']),
			'TEXT' => $ob['613'],
			'CLASS' => match ($vendorID) {
				'77' => 'low-height'
			,default => ''
			}
		];
	}
//	clog($arResult['LOGO']);
}
$arOtherModels = $arResult['PROPERTIES']['OTHER_MODELS_LINK']['VALUE'];
if ($arOtherModels) {

	$res = CIBlockElement::GetList(
		[]
		, [
			'IBLOCK_ID'=>14
			,'ID'=>$arOtherModels
			,'!PROPERTY_OTHER_MODELS_NAME' => false
		],false,false
		,['CODE', 'PROPERTY_OTHER_MODELS_NAME']
	);
	while ($ob = $res->fetch()) {
		$arResult['OTHER_MODELS'][$ob['PROPERTY_OTHER_MODELS_NAME_VALUE']] = $ob['CODE'];
	}
	//clog($arResult['OTHER_MODELS']);
}
$type = $arResult['PROPERTIES']['TYPE_EQUIPMENT']['VALUE'] ?? '';
if ($marker) {
	$arCodes = [];
	//region get price data
	$arSelect = [
		'ID'
		, 'IBLOCK_ID'
		, 'CODE'
//		, 'NAME'
		, 'QUANTITY'
		, 'PREVIEW_TEXT'
		, 'PROPERTY_TYPE'
		, 'PROPERTY_DELIVERY_TIME'
	];
	$arFilter = [
		"IBLOCK_ID" => 28 //price
		, "AVAILABLE" => "Y"
		,'PROPERTY_MARKER' => $marker
	];
	$res = CIBlockElement::GetList(["PRICE_1" => 'asc,nulls'],$arFilter,false,false,$arSelect);
	while ($ob = $res->fetch()) {
		$arCodes[] = $ob['CODE'];
		$ob['AVAIL'] = CDataModifier::QtyToStrValues(
			$ob['QUANTITY']
			, strDeliveryTime: $ob['PROPERTY_DELIVERY_TIME_VALUE'] ?? '')['text'];
		if (in_array($ob['PROPERTY_TYPE_ENUM_ID'], [51,52])) {
			$arResult['MODELS']['PLATFORMS'][$ob['CODE']] = $ob;
		} else {
			$ob['CONFIG_DESC'] = CDataConstructor::genBundlePropsList($ob['PREVIEW_TEXT']);
			$arResult['MODELS']['BUNDLES'][$ob['CODE']] = $ob;
		}
	}
	//endregion

	if (!empty($arCodes)) {
		//region get config data
		$arSelect = array(
			"ID"
			, "IBLOCK_ID"
			, "IBLOCK_SECTION_ID"
			, "CODE"
			, "ACTIVE"
		);
		$configFilter = array(
			"IBLOCK_ID" => EConfigIntConst::CONFIG_IBLOCK_ID->value
			, "=AVAILABLE" => "Y"
			,'CODE' => $arCodes
		);
		$res = CIBlockElement::GetList(['sort' => 'asc'], $configFilter, false, false, $arSelect);
		$arConfigIdAllData = [];
		while ($ob = $res->Fetch()) {
			$arConfigIdAllData[$ob['ID']] = $ob;
			$arPropItems[$ob['ID']] = [];
		}
		if (!empty($arConfigIdAllData)) {
			CIBlockElement::GetPropertyValuesArray(
				$arPropItems
				, EConfigIntConst::CONFIG_IBLOCK_ID->value
				, ['ID' => array_keys($arConfigIdAllData)]
				, []
				, ['PROPERTY_FIELDS' => ['NAME','VALUE', 'DESCRIPTION'],'GET_RAW_DATA' => 'Y']
			);
			foreach ($arConfigIdAllData as $id => $arData) {
				if (isset($arResult['MODELS']['PLATFORMS'][$arData['CODE']])) {
					$arResult['CHASSIS_LIST'][$arData['CODE']] = $type == 'Сервер'
						? $arPropItems[$id]['BAY_DESC']['VALUE']
						: ($arPropItems[$id]['BAY_DESC']['VALUE']
							? $arPropItems[$id]['BAY_DESC']['VALUE'] . ', ' . $arPropItems[$id]['STORAGE_CON_TYPE']['VALUE'] : "");
				}
				else {
					// todo refactor - собирать опции сразу для всех бандлов вне цикла
					$arInstalledOptions = CDataHarvester::getInstalledOptions($arPropItems[$id]);
					$cpuCode = $arPropItems[$id]['INSTALLED_CPU']['VALUE'];
					$cpuName = $arInstalledOptions[1][$cpuCode]['S_NAME'];

					if ($arData['ACTIVE'] == 'Y') {
						$intConfigurableBundles++;
						$list = CIBlockSection::GetNavChain($arData['IBLOCK_ID'],$arData['IBLOCK_SECTION_ID'], array('CODE'), true);
						$url = '/configurator/';
						foreach ($list as $item) $url.=$item['CODE']."/";
						$url.=$arData['CODE']."/";
					}

					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['CONFIG_PATH'] = $url ?? '';
					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['BAY'] = $arPropItems[$id]['BAY_DESC']['VALUE'];
					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['CON'] = $arPropItems[$id]['STORAGE_CON_TYPE']['VALUE'];
					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['CPU_CODE'] = $cpuCode;
					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['CPU_NAME'] = $cpuName;
					$arResult['MODELS']['BUNDLES'][$arData['CODE']]['CONFIG_DESC'] = CDataConstructor::genConfShortSpecs($arInstalledOptions);
				}
			}
		}
		//endregion
		//region get basket desc
		if (isset($arResult['MODELS']['BUNDLES'][$arCodes[0]])) {
			$arResult['BASKET_DESCRIPTION'] = $arResult['MODELS']['BUNDLES'][$arCodes[0]]['CONFIG_DESC'] ?:
				$arResult['MODELS']['BUNDLES'][$arCodes[0]]['PREVIEW_TEXT'];
		} else {
			$arResult['BASKET_DESCRIPTION'] = CDataHarvester::getMinPriceSkuDescription(
				$arCodes[0]
				, $arResult['MODELS']['PLATFORMS'][$arCodes[0]]['PREVIEW_TEXT']
			);
		}
		//endregion

	}

	if (isset($arResult['MODELS']['BUNDLES'])) {
		$arResult['SHOW_MODELS'] = true;
		//region set filter data
		if (in_array($type, ['Сервер','СХД']) && $intConfigurableBundles > 0) {
			$arResult['USE_FILTER'] = true;
			$arFilterData['bay'] = ['title' => 'Выбрать шасси','list' => []];
			if ($type == 'Сервер')
				$arFilterData['cpu'] = ['title'=>'Выбрать процессор','list'=>[]];
			else
				$arFilterData['con'] = ['title'=>'Выбрать контроллер','list'=>[]];

			$arFilterData['avail'] = ['title'=>'Выбрать срок поставки','list'=>[]];

			foreach ($arResult['MODELS']['BUNDLES'] as $code => $arItem) {
				$arFilterData['bay']['list'][$arItem['BAY']][] = $code;
				if ($type == 'Сервер')
					$arFilterData['cpu']['list'][$arItem['CPU_NAME']][] = $code;
				else
					$arFilterData['con']['list'][$arItem['CON']][] = $code;
				$arFilterData['avail']['list'][$arItem['AVAIL']][] = $code;
			}
			$arResult['MODELS']['FILTER'] = $arFilterData;
		} else {
			$arResult['USE_FILTER'] = false;
		}
		//clog($arResult['MODELS']['FILTER']);
		//endregion
	}
} else {
	$arResult['SHOW_MODELS'] = false;
}

$arResult['MIN_PRICE'] = CDataModifier::PriceFormat($arResult['ITEM_PRICES'][0]['PRICE'], false);
$avail = CDataModifier::QtyToStrValues(
	$arResult['CATALOG_QUANTITY']
	,$arResult['PROPERTIES']['AVAIL']['VALUE']
	,$arResult['PROPERTIES']['AVAIL']['XML_ID']
	,$arResult['PROPERTIES']['_MIN_DTIME']['VALUE'] ?: $arResult['PROPERTIES']['DELIVERY_TIME']['VALUE'] ?: ''
);
$arResult['AVAILABILITY']['TEXT'] = $avail['text'];
$arResult['AVAILABILITY']['CLASS'] = $avail['class'];
$arResult['AVAILABILITY']['text1'] = $avail['part1'];
$arResult['AVAILABILITY']['text2'] = $avail['part2'];
$arResult['STATUS'] = CDataConstructor::genStatusArray([
	'price' => $arResult['ITEM_PRICES'][0]['PRICE'] ?? 0,
	'discontinued' => $arResult['PROPERTIES']['DISCONTINUED']['VALUE'],
	'text' => $arResult['PROPERTIES']['MARK_STATUS']['VALUE'],
	'class' => $arResult['PROPERTIES']['MARK_STATUS']['VALUE_XML_ID']
]);

function GenTabHtml($sName, $bFlag = false, $sId='') {
	$html = "<h2 class='tabs__title";
	$html.= $bFlag ? " _active'" : "'";
	$html.= $sId ? " id='$sId'>" : ">";
	$html.= "$sName</h2>";
	return $html;
}

$picture = $arResult['PREVIEW_PICTURE'] ? $arResult['PREVIEW_PICTURE']['SRC'] : $arResult['DEFAULT_PICTURE']['SRC'];
$arData = CDataHarvester::SetCommonData(name: $arResult['NAME'], picture: $picture);
//clog($arPriceListData);

//$modelId = $arResult['PROPERTIES']['MODEL_LINK']['VALUE'] ?? '';
if (isset($arResult['CHASSIS_LIST'])) {
	GarbageStorage::set('config_sku', array_key_first($arResult['CHASSIS_LIST']));
	$arResult['CONF_TITLE'] = $type == 'Сервер' ? 'Серверная платформа' : 'Платформа СХД';
	$arResult['SHOW_PLATFORM_SELECTOR'] = (bool)reset($arResult['CHASSIS_LIST']);
}
if (!empty($arResult['DISPLAY_PROPERTIES']['MANUFACTURER'] && !empty($arResult['DISPLAY_PROPERTIES']['SET_VENDOR']))) {
	$arResult['DISPLAY_PROPERTIES']['MANUFACTURER']['VALUE_XML_ID'] =
		reset($arResult['DISPLAY_PROPERTIES']['SET_VENDOR']['LINK_ELEMENT_VALUE'])['CODE'];
	$arResult['DISPLAY_PROPERTIES']['MANUFACTURER']['VALUE'] =
		reset($arResult['DISPLAY_PROPERTIES']['MANUFACTURER']['LINK_ELEMENT_VALUE'])['NAME'];
	unset($arResult['DISPLAY_PROPERTIES']['SET_VENDOR']);
}
if (!empty($arResult['DISPLAY_PROPERTIES']['PROCESSOR_SERIES']) && $arResult['PROPERTIES']['PROCESSOR_FAMILY']['VALUE'])
{
	$strSet = str_starts_with($arResult['PROPERTIES']['PROCESSOR_FAMILY']['VALUE'], 'I') ? 'servery-intel-xeon' :
		'servery-amd-epyc';
	$arResult['DISPLAY_PROPERTIES']['PROCESSOR_SERIES']['VALUE_XML_ID'] = $strSet;
}
$arResult['PROPS_HTML'] = CDataConstructor::genPropsHtml(
	[$arResult['ID']],
	[$arResult['DISPLAY_PROPERTIES']],
	[$arResult['PREVIEW_TEXT']]
)[$arResult['ID']];
GarbageStorage::set('props_html', $arResult['PROPS_HTML']);
//GarbageStorage::set('product_name', $arResult['NAME']);

if(!empty($arResult["PROPERTIES"]['QA']['VALUE'])){
    $res = \CIBlockElement::GetList(
        false,
        ['IBLOCK_ID' => 29, 'ACTIVE' => 'Y', 'ID' => $arResult["PROPERTIES"]['QA']['VALUE']],
        false,
        false,
        ['ID', 'NAME', 'PREVIEW_TEXT']
    );

    while ($ob = $res->fetch()) {
        $arResult['QA'][] = $ob;
    }
}


// region getSectionInfo !!! пока не удалять
/*$sectionInfo = [];
$res = CIBlockSection::GetList([],['ID'=>$arResult['SECTION']['ID'],'IBLOCK_ID' => 14],false,['IBLOCK_ID','UF_PROPLIST']);
if ($ob = $res->Fetch()) {
	$property_enums = CUserFieldEnum::GetList(
		[],
		[
			'ID'=> $ob['UF_PROPLIST'],
			'CODE' => "UF_PROPLIST"
		]
	);
	while ($enum_fields = $property_enums->Fetch()) {
		$sectionInfo['DISPLAY_PROPS'][$enum_fields['XML_ID']] = $enum_fields['VALUE'];
	}
}

$arResult['DISPLAY_PROPS'] = $sectionInfo['DISPLAY_PROPS'];*/

//endregion

//$arResult['CONFIG_URL'] = CDataHarvester::GetConfigUrl($modelId, $vendorName, $type);



$arResult['BRANDS'] = [];
$rsBrands = CIBlockElement::GetList(
	array("sort" => "ASC"),  array('IBLOCK_ID' => 16),false,false,
	array("ID", "IBLOCK_ID", "NAME",)
);

while($arElement = $rsBrands->GetNextElement()) {
	$arFields = $arElement->GetFields();
	$arResult['BRANDS'][$arFields['ID']] = $arFields['NAME'];
}

//clog($arConfigIdAllData);
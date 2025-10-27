<?

class CDataHarvester
{
	private static array $_arData = [];
	private static array $_arContainer = [];

	//fixme rewrite for list: descr from conf and conf_url
	static function SetPersonalData($key, $val) :void {
		self::$_arData[$key] = $val;
	}

	/**
	 * @param $name
	 * @param $picture
	 * @return void
	 */
	static function SetCommonData($name, $picture) :void {
		self::$_arData['common'] = [
			'name' => $name
			,'picture' => $picture
			];
	}
	static function GetArData() :array {
		return self::$_arData;
	}
	static function HarvestConfigData(array|string $codes) :array {
		$arConfigData = [];
		$arSelect = array("ID", "IBLOCK_ID", "CODE", 'NAME', 'IBLOCK_SECTION_ID', 'ACTIVE', 'QUANTITY');
		$configFilter = array(
			"IBLOCK_ID" => EConfigIntConst::CONFIG_IBLOCK_ID->value
		, "CODE" => $codes
		, "=AVAILABLE" => "Y"
		);
		$res = CIBlockElement::GetList(Array("PRICE_1" => 'asc,nulls'), $configFilter, false, false, $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arPropsConfig = $ob->GetProperties(['sort'=>'asc'], ['EMPTY' => 'N']);
			$arFieldsConfig = $ob->GetFields();
			$arConfigData[$arFieldsConfig['CODE']]['F'] = $arFieldsConfig;
			$arConfigData[$arFieldsConfig['CODE']]['P'] = $arPropsConfig;
		}
		return $arConfigData;
	}
	public static function test($arConfigProps) {
		$arConfigProps = array_filter($arConfigProps, function($v){return !empty($v['VALUE']);});
		//region set main params
		define("POT", 'PROPERTY_OPTIONS_TYPES');
		define("PGT", 'PROPERTY_GLOBAL_SUBTYPES');
		foreach($arConfigProps as $strPropName => $arPropParams){
			if(explode('_',$strPropName)[0]=='INSTALLED'){
				$val = $arPropParams['VALUE'];
				if(is_array($val))
					foreach($val as $i => $v)
						self::$_arContainer['INSTALLED'][$v] = $arPropParams['DESCRIPTION'][$i] ? : 1;
				else
					self::$_arContainer['INSTALLED'][$arPropParams['VALUE']] = $arPropParams['DESCRIPTION'] ? : 1;
			}
		}
		self::$_arContainer['MODEL'] = $arConfigProps['MODEL']['VALUE'];
		self::$_arContainer['SUBTYPE_BIND'] = $arConfigProps['SUBTYPE_BIND']['VALUE'] ?: [];
		self::$_arContainer['BAY_DESC'] = $arConfigProps['BAY_DESC']['VALUE'] ?? false;
		self::$_arContainer['EXC_TYPES'] = $arConfigProps['EXC_TYPES']['VALUE'] ?: [];
		//endregion


		return self::$_arContainer;
	}
	public static function GetMinPrice($iblockId, $sectionId, $filter) {
		$minPrice = 0;
		$arFilter = [
			"IBLOCK_ID" => $iblockId
			,"=AVAILABLE" => "Y"
			,"ACTIVE" => "Y"
		];
		$arSelect = [
			'ID'
			,'IBLOCK_ID'
			,'NAME'
		];
		if ($sectionId) {
			$arFilter['SECTION_ID'] = $sectionId;
			$arFilter['INCLUDE_SUBSECTIONS'] = 'Y';
		}
		if (!empty($filter)) $arFilter[] = $filter;
		$res = CIBlockElement::GetList(Array("PRICE_1" => 'asc,nulls'), $arFilter, false, ['nTopCount'=>1], $arSelect);
		if ($ob = $res->Fetch()) {
			$minPrice = $ob['PRICE_1'];
		}
		return $minPrice ? number_format($minPrice, 0, '.', ' ')." ₽" : 'по запросу';
	}
	public static function GetConfigCardPics($arModelsId) {
		$arConfigData = [];
		$arSelect = ['ID','IBLOCK_ID','PREVIEW_PICTURE'];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::MODEL_IBLOCK_ID->value
			, 'ID' => array_keys($arModelsId)
		];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		while ($ob = $res->Fetch()) {
			$arConfigData['PIC'][$ob['ID']] = CFile::GetPath($ob['PREVIEW_PICTURE']);
		}
		return $arConfigData;
	}
	public static function getInstalledOptions(array $arConfigProps) : array {
		self::$_arContainer = [];
		$arConfigProps = array_filter($arConfigProps, function($v){return !empty($v['VALUE']);});
		//region set main params
		self::$_arContainer['INSTALLED']['nocode'] = 0;
		define("POT", 'PROPERTY_OPTIONS_TYPES');
		define("PGT", 'PROPERTY_GLOBAL_SUBTYPES');
		foreach($arConfigProps as $strPropName => $arPropParams){
			if(explode('_',$strPropName)[0]=='INSTALLED'){
				$val = $arPropParams['VALUE'];
				if(is_array($val)) {
					foreach ($val as $i => $v) self::$_arContainer['INSTALLED'][$v] = $arPropParams['DESCRIPTION'][$i] ?: 1;
				} else {
					self::$_arContainer['INSTALLED'][$arPropParams['VALUE']] = $arPropParams['DESCRIPTION'] ?: 1;
				}
			}
		}
		self::$_arContainer['MODEL'] = $arConfigProps['MODEL']['VALUE'];
		self::$_arContainer['SUBTYPE_BIND'] = $arConfigProps['SUBTYPE_BIND']['VALUE'] ?: [];
		self::$_arContainer['BAY_DESC'] = $arConfigProps['BAY_DESC']['VALUE'] ?? false;
		//endregion
		//region get Options Types
		$arFilter = [
			"IBLOCK_ID" => EConfigIntConst::MODEL_IBLOCK_ID->value
			,'ID' => self::$_arContainer['MODEL']
		];
		$arSelect = ["ID","IBLOCK_ID",
			POT.'.ID'
			, POT.'.CODE'
			, POT.'.SORT'
			, PGT // global subTypes (filter)
			, 'PROPERTY_GROUP'
		];
		$res = CIBlockElement::GetList (Array(), $arFilter, false, false, $arSelect );
		while ($ob = $res->Fetch() ) {
			self::$_arContainer['MODELPROP_GROUP'] = $ob['PROPERTY_GROUP_VALUE'];
			self::$_arContainer['GLOBAL_SUBTYPES'] = is_array($ob[PGT.'_VALUE']) ? $ob[PGT.'_VALUE'] : [$ob[PGT.'_VALUE']];
			self::$_arContainer['options'][$ob[POT.'_CODE']] = [
				'SORT' => intval($ob[POT.'_SORT'])
			];
		}
		if ( !empty(self::$_arContainer['GLOBAL_SUBTYPES']) ) {
			self::$_arContainer['SUBTYPE_BIND'] =
				array_unique(array_merge(self::$_arContainer['GLOBAL_SUBTYPES'], self::$_arContainer['SUBTYPE_BIND']));
		}

		uasort(self::$_arContainer['options'], function($a, $b) {return $a['SORT'] <=> $b['SORT'];});
		//endregion
		//region get options
		$arFilter = [
			"IBLOCK_ID" => EConfigIntConst::OPT_IBLOCK_ID->value
			,[
				"LOGIC" => "OR"
				,['CODE' => array_keys(self::$_arContainer['INSTALLED'])]
				,[
					'PROPERTY_ALWAYS_INS' => 1
					,'PROPERTY_TYPE.CODE' => array_keys(self::$_arContainer['options'])
					,[
						"LOGIC" => "OR"
						,["PROPERTY_MODELS_GROUP" => self::$_arContainer['MODELPROP_GROUP']]
						,["PROPERTY_MODELS" => self::$_arContainer['MODELPROP_GROUP']]
						,["PROPERTY_MODELS" => self::$_arContainer['MODEL']]
					]
					,[
						"LOGIC" => "OR"
						, ["PROPERTY_SUBTYPE" => false]
						, ["PROPERTY_SUBTYPE" => self::$_arContainer['SUBTYPE_BIND']]
					]
				]
			]
		];
		$arSelect = ["ID","IBLOCK_ID",
			'NAME'
			,'CODE'
			,'PROPERTY_TYPE.CODE'
			,'PROPERTY_SHORT_NAME'
			,'PROPERTY_ALWAYS_INS'
		];
		$res = CIBlockElement::GetList ([], $arFilter, false,false,$arSelect);
		while ($ob = $res->Fetch() ) {
			$name = self::$_arContainer['BAY_DESC'] && $ob['PROPERTY_TYPE_CODE'] == 'CHS' ?
				$ob['NAME'] . ' ' . self::$_arContainer['BAY_DESC'] : $ob['NAME'];
			$instCnt = $ob['PROPERTY_ALWAYS_INS_VALUE'] == 1 ? 1 : intval(self::$_arContainer['INSTALLED'][$ob['CODE']]);
			self::$_arContainer['options'][$ob['PROPERTY_TYPE_CODE']]['INS'][$ob['CODE']] = [
				'NAME' => $name
				,'CNT' => $instCnt
				,'S_NAME' => $ob['PROPERTY_SHORT_NAME_VALUE']
				,'NAME_HAS_CNT' => in_array($ob['PROPERTY_TYPE_CODE'], ['CON', 'RPS_storage', 'CONP'])
			];
		}
		$arInstalled = array_column(self::$_arContainer['options'], 'INS');
		//endregion
		return $arInstalled;
	}

	public static function GetModelInfo($modelId)
	{
		$arInfo = [];
		$arSelect = ['ID','IBLOCK_ID','DETAIL_TEXT', 'PREVIEW_PICTURE'];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::MODEL_IBLOCK_ID->value
			, 'ID' => $modelId
		];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		if ($ob = $res->Fetch()) {
			$arInfo['DETAIL_TEXT'] = $ob['DETAIL_TEXT'];
			$arInfo['PIC'] = CFile::GetPath($ob['PREVIEW_PICTURE']);
		}

		return $arInfo;
	}
	public static function GetCatalogInfo($modelId) {
		$arInfo = [];
		$arSelect = [
			'ID'
			,'IBLOCK_ID'
			,'PROPERTY_CHARACTERISTIC_TITLE'
			,'PROPERTY_CHARACTERISTIC_DESCRIPTION'
			,'PROPERTY_FILE'
			,'PROPERTY_DELIVERY'
			,'PROPERTY_GUARANTEE'
			,'PROPERTY_LEASING'
		];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::CATALOG_IBLOCK_ID->value
			, 'PROPERTY_MODEL_LINK' => $modelId
		];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		if ($ob = $res->Fetch()) {
			foreach ($ob['PROPERTY_CHARACTERISTIC_TITLE_VALUE'] as $k => $v) {
				$arInfo['PROPS'][$v] = $ob['PROPERTY_CHARACTERISTIC_DESCRIPTION_VALUE'][$k]['TEXT'];
			}
			foreach ($ob['PROPERTY_FILE_VALUE'] as $item) {
				$file = \CFile::GetFileArray($item);
				$arInfo['FILES'][$file['ORIGINAL_NAME']] = $file['SRC'];
			}
			$arInfo['DELIVERY'] = $ob['PROPERTY_DELIVERY_VALUE'];
			$arInfo['WARRANTY'] = $ob['PROPERTY_GUARANTEE_VALUE'];
			$arInfo['LEASING'] = $ob['PROPERTY_LEASING_VALUE'];
		}

		return $arInfo;
	}


	//todo rewrite method after sets was realised
	public static function GetConfigPopModels(string $sectionName) :array {
		if ($sectionName != 'servery') return [];
		$arPopularModels = [
			'HPE' => [
				'list' => []
				,'vendor' => 'hp'
				,'title' => 'HPE ProLiant'
			]
			,'Dell EMC' => [
				'list' => []
				,'vendor' => 'dell'
				,'title' => 'Dell PowerEdge'
			]
			,'Lenovo' => [
				'list' => []
				,'vendor'=>'lenovo'
				,'title' => 'Lenovo ThinkSystem'
			]
		];
		$arFilter = [
			"IBLOCK_ID" => EConfigIntConst::MODEL_IBLOCK_ID->value
			,"ACTIVE" => "Y"
			,"!PROPERTY_SHORT_NAME" => false
		];
		$arSelect = ["ID","IBLOCK_ID", 'PROPERTY_SECTION_LINK', 'PROPERTY_VENDOR', 'PROPERTY_SHORT_NAME'];
		$res = CIBlockElement::GetList(['SORT' => 'asc'], $arFilter, false, false, $arSelect );
		//todo refactor убрать проверку наличия конфигов после того как заработает скрипт обновления активности моделей
		while ($ob = $res->Fetch() ) {
			$list = CIBlockSection::GetNavChain(
				EConfigIntConst::CONFIG_IBLOCK_ID->value
				,$ob['PROPERTY_SECTION_LINK_VALUE']
				, array('CODE')
				, true
			);
			$url = "";
			foreach ($list as $item) {
				$url.=$item['CODE']."/";
			}
			$group = &$arPopularModels[$ob['PROPERTY_VENDOR_VALUE']];
			if($url) $group['list'][$ob['PROPERTY_SHORT_NAME_VALUE']] = $url;
		}

		return $arPopularModels;
	}
	public static function GetCatPropsForConfCards($arModelId): array
	{
		$arInfo = [];
		$arSelect = [
			'ID'
			,'IBLOCK_ID'
			,'PROPERTY_DELIVERY'
			,'PROPERTY_GUARANTEE'
			,'PROPERTY_MODEL_LINK'
		];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::CATALOG_IBLOCK_ID->value
			, 'PROPERTY_MODEL_LINK' => $arModelId
		];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		while ($ob = $res->Fetch()) {
			$arInfo['PROPS'][$ob['PROPERTY_MODEL_LINK_VALUE']] = [
				'DELIVERY' => $ob['PROPERTY_DELIVERY_VALUE']
				,'WARRANTY' => $ob['PROPERTY_GUARANTEE_VALUE']]
			;
		}

		return $arInfo;
	}

	public static function harvestCatCardData(array $idList) : array
	{
		$arItems = [];
		$arSelect = [
			'ID'
			, 'IBLOCK_ID'
			, 'NAME'
			, 'DETAIL_PAGE_URL'
			, 'PREVIEW_PICTURE'
			, 'PREVIEW_TEXT'
			, 'QUANTITY'
			, 'PRICE_1'
		];
		$res = CIBlockElement::GetList(
			['ID' => $idList]
			, ['IBLOCK_ID' => 14, 'ACTIVE' => 'Y', 'ID' => $idList]
			, false
			, false
			, $arSelect
		);
		while ($ob = $res->GetNext()) {
			$arItems[$ob['ID']] = $ob;
		}
		if (!empty($arItems)) {
			$arPropFilter = [
				'FORM_FACTOR'
				, 'MEMORY'
				, 'NUMBER_DISC'
				, 'POWER_UNIT'
				, 'PROCESSOR_SERIES'
				, 'CONTROLLERS'
				, 'INTERFACES'
				, 'CARTRIDGE_SLOTS'
				, 'DELIVERY'
				, 'GUARANTEE'
				, 'TYPE_EQUIPMENT'
				, 'CONFIGURATOR_URL'
			];
			$arPropItems = array_flip(array_column($arItems, 'ID'));
			CIBlockElement::GetPropertyValuesArray(
				$arPropItems
				, 14
				, ['ID' => array_keys($arPropItems)]
				, ['CODE' => $arPropFilter]
				, ['PROPERTY_FIELDS' => ['NAME', 'VALUE'], 'GET_RAW_DATA' => 'Y']
			);
			foreach ($arItems as &$arItem) {
				$price = intval($arItem['PRICE_1']);
				$arItem['PRICE'] = CDataModifier::PriceFormat($price);
				$arItem['AVAIL'] = CDataModifier::QtyToStrValues(intval($arItem['QUANTITY']));
				if (is_array($arPropItems[$arItem['ID']])) {
					$arItem['PROPS'] = $arPropItems[$arItem['ID']];
					$arDisplayProps = array_intersect_key($arItem['PROPS'], CDataConstructor::$arCatPropsForCard);
//					$arItem['PROPS_HTML'] = CDataConstructor::genCardPropsHtml(
//						$arItem['PROPS']['TYPE_EQUIPMENT']['VALUE']
//						, $arDisplayProps
//						, $arItem['PREVIEW_TEXT']
//					);
				}
			}
			unset($arItem);
		}
		return $arItems;
	}
	public static function getMinPriceSkuDescription(string $code, string $name = '', string $codeType = 'sku') : string {
		//todo ref - брать данные из свойства в конф-ре
		$descr = '';
		if ($codeType != 'marker') {
			$configFilter = array(
				"IBLOCK_ID" => EConfigIntConst::CONFIG_IBLOCK_ID->value
			, "ACTIVE" => "Y"
			);
			if ($codeType == 'model') {
				$configFilter['PROPERTY_MODEL'] = $code;
			} else {
				$configFilter['CODE'] = $code;
			}
			$props = CIBlockElement::GetList(["PRICE_1" => 'asc,nulls'], $configFilter, false, false, ['ID','IBLOCK_ID']);
			if ($ob2 = $props->GetNextElement()) {
				$arProps = $ob2->GetProperties(false, ['EMPTY' => 'N']);
				$arIns = self::getInstalledOptions($arProps);
				$descr = CDataConstructor::genConfShortSpecs($arIns);
			} else {
				$descr = "<p>" . $name . "</p>";
			}
		} else {
			$res = CIBlockElement::GetList(
				["PRICE_1" => 'asc,nulls']
				, ['IBLOCK_ID' => 28, 'PROPERTY_MARKER' => $code]
				, false
				, false
				, ['ID', 'IBLOCK_ID', 'PREVIEW_TEXT']
			);
			if ($ob = $res->Fetch()) {
				$descr = "<p>" . $ob['PREVIEW_TEXT'] . "</p>";
			}
		}

		return $descr;
	}
}
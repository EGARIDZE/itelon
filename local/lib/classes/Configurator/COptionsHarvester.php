<?php

class COptionsHarvester
{
	private const MODELS_IBLOCK_ID = EConfigIntConst::MODEL_IBLOCK_ID->value;
	private const OPT_IBLOCK_ID = EConfigIntConst::OPT_IBLOCK_ID->value;
	private static array $_arContainer = [];

	static function Harvest($arConfigProps) : array {
		foreach($arConfigProps as $strPropName => $arPropParams){
			$parts = explode('_',$strPropName);
			if($parts[0]=='INSTALLED'){
				if(is_array($arPropParams['VALUE']))
					foreach($arPropParams['VALUE'] as $i => $v)
						self::$_arContainer['INSTALLED'][$v] = $arPropParams['DESCRIPTION'][$i] ? : 1;
				else
					self::$_arContainer['INSTALLED'][$arPropParams['VALUE']] = $arPropParams['DESCRIPTION'] ? : 1;
			}else if ($parts[2]=='CNT'){
				self::$_arContainer['MAX'][$parts[1]] = intval($arPropParams['VALUE']);
			}
		}
		self::$_arContainer['MODEL'] = $arConfigProps['MODEL']['VALUE'];
		self::$_arContainer['SUBTYPE_BIND'] = $arConfigProps['SUBTYPE_BIND']['VALUE'] ?? [];
		self::$_arContainer['BAY_DESC'] = $arConfigProps['BAY_DESC']['VALUE'] ?? false;
		self::$_arContainer['FILTER_BY_SKU'] = $arConfigProps['FILTER_BY_SKU']['VALUE'] ?? false;
		self::$_arContainer['ARTICLE'] = $arConfigProps['ARTICLE']['VALUE'];
		self::$_arContainer['IS_PLATFORM'] = $arConfigProps['CHASSIS_NOCPU']['VALUE'] ?? false;
		self::$_arContainer['EXC_TYPES'] = $arConfigProps['EXC_TYPES']['VALUE'] ?? [];

		self::_HarvestOptionsTypes();
		self::_HarvestOptions();
		self::_ModifyData();
		return array_filter(self::$_arContainer, function ($k){return $k=='options'||$k=='js_data';}, ARRAY_FILTER_USE_KEY);
	}
	private static function _HarvestOptionsTypes():void{
		define("POT", EConfigStrConst::POT->value);
		define("PGT", EConfigStrConst::PGT->value);
		$arFilter = [
			"IBLOCK_ID" => self::MODELS_IBLOCK_ID
			,'ID' => self::$_arContainer['MODEL']
		];
		$arSelect = [
			"ID"
			,"IBLOCK_ID"
			, POT.'.ID'
			, POT.'.NAME'
			, POT.'.CODE'
			, POT.'.SORT'
			, POT.'.PROPERTY_MULTI_CHOOSE'
//			, POT.'.PROPERTY_SELECT_FILTER'
			, POT.'.PROPERTY_CNT_LIMIT'
			, PGT // global subTypes (filter)
			, 'PROPERTY_GROUP'
		];
		$arGlobalSubTypes = [];
		$res = CIBlockElement::GetList (Array(), $arFilter, false, false, $arSelect );
		while ($ob = $res->Fetch() ) {
			if ( in_array($ob[POT.'_ID'], self::$_arContainer['EXC_TYPES'])) continue;
			self::$_arContainer['MODELPROP_GROUP'] = $ob['PROPERTY_GROUP_VALUE'];
			if (isset(self::$_arContainer['MAX'][$ob[POT.'_CODE']]))
				$max = self::$_arContainer['MAX'][$ob[POT.'_CODE']];
			elseif ( $ob[POT.'_PROPERTY_CNT_LIMIT_VALUE'] =='N')
				$max = 99;
			else
				$max = 1;
			if ($max==0) continue;
			self::$_arContainer['options'][$ob[POT.'_CODE']] = [
				'CODE' => $ob[POT.'_CODE']
				,'NAME' => $ob[POT.'_NAME']
				,'SORT' => intval($ob[POT.'_SORT'])
				,'MULTI' => $ob[POT.'_PROPERTY_MULTI_CHOOSE_VALUE'] == 'Y'
//				,'FILTER' => $ob[POT.'_PROPERTY_SELECT_FILTER_VALUE']
				,'MAX' => $max
			];
			// добавим глобальные субтипы опций модели, если есть.
			if ( empty($arGlobalSubTypes) && !empty($ob[PGT.'_VALUE']) )
				$arGlobalSubTypes = array_diff($ob[PGT.'_VALUE'], self::$_arContainer['EXC_TYPES']);
		}
	// если определены глобальные подтипы для модели
		if ( !empty($arGlobalSubTypes) )
			self::$_arContainer['SUBTYPE_BIND'] = array_unique(array_merge($arGlobalSubTypes, self::$_arContainer['SUBTYPE_BIND']));

		uasort(self::$_arContainer['options'], function($a, $b) {return $a['SORT'] <=> $b['SORT'];});

	}
	private static function _HarvestOptions():void {
		$arFilter = [
			"IBLOCK_ID" => self::OPT_IBLOCK_ID
			,'PROPERTY_TYPE.CODE' => array_keys(self::$_arContainer['options'])
			,'ACTIVE' => 'Y'
			,[
				"LOGIC" => "OR"
				,["PROPERTY_MODELS" => self::$_arContainer['MODEL']]
				,[
					"PROPERTY_MODELS_GROUP" => self::$_arContainer['MODELPROP_GROUP']
					,"!PROPERTY_EXC_MODELS" => self::$_arContainer['MODEL']
				]
				//deprecated, retained for backwards compatibility
				,["PROPERTY_MODELS" => self::$_arContainer['MODELPROP_GROUP'] ,"!PROPERTY_EXC_MODELS" => self::$_arContainer['MODEL']]
			]
			,[
				"LOGIC" => "OR"
				, ["PROPERTY_SUBTYPE" => false]
				, ["PROPERTY_SUBTYPE" => self::$_arContainer['SUBTYPE_BIND']]
			]
			,[
				"LOGIC" => "OR"
				, ["PROPERTY_SKU_POOL" => false]
				, ["PROPERTY_SKU_POOL" => self::$_arContainer['ARTICLE']]
			]
		];
		if (self::$_arContainer['IS_PLATFORM'])
			$arFilter['!PROPERTY_HIDE_FOR_CHAS'] = 1;
		$arSelect = [
			"ID"
			,"IBLOCK_ID"
			,'CODE'
			,'NAME'
			,'PROPERTY_TYPE.CODE'
			,'PROPERTY_GROUP'
			,'PROPERTY_PRICE'
			,'PROPERTY_DEFAULT_ONLY'
			,'PROPERTY_ALWAYS_INS'
			,'PREVIEW_TEXT'
			,'PROPERTY_SHORT_NAME'
		];
		$res = CIBlockElement::GetList (['propertysort_GROUP'=>'ASC', "SORT"=>'ASC', 'NAME'=>'ASC'], $arFilter, false,false,$arSelect);
		while ($ob = $res->Fetch() ) {
			$price = intval($ob['PROPERTY_PRICE_VALUE']);
			self::$_arContainer['js_data']['opt'][$ob['ID']] =
				[
					'sku' => $ob['CODE']
					,'price' => $price
					,'name' => $ob['PROPERTY_SHORT_NAME_VALUE'] ?: $ob['NAME']
				];
			if(isset(self::$_arContainer['INSTALLED'][$ob['CODE']]) || $ob['PROPERTY_ALWAYS_INS_VALUE'] == 1 ){
				if (self::$_arContainer['BAY_DESC'] && $ob['PROPERTY_TYPE_CODE'] == 'CHS')
					$name = $ob['NAME'] . ' ' . self::$_arContainer['BAY_DESC'];
				else
					$name = $ob['NAME'];
				$instCnt = $ob['PROPERTY_ALWAYS_INS_VALUE'] == 1 ? 1 : intval(self::$_arContainer['INSTALLED'][$ob['CODE']]);
				self::$_arContainer['options'][$ob['PROPERTY_TYPE_CODE']]['INS'][$ob['CODE']] = [
					'ID' => $ob['ID']
					,'NAME' => $name
					//,'PRICE' => $price
					,'CNT' => $instCnt
					,'NOTE' => $ob['PREVIEW_TEXT']
					,'S_NAME' => $ob['PROPERTY_SHORT_NAME_VALUE']
					,'NAME_HAS_CNT' => in_array($ob['PROPERTY_TYPE_CODE'], ['CON', 'RPS_storage', 'CONP'])
				];
				self::$_arContainer['js_data']['ins'][$ob['ID']] = $instCnt;
				//todo if option not special (_notzero) continue
				continue;
			}
//			if (self::$_arContainer['IS_PLATFORM']){
				if (/*$ob['PROPERTY_TYPE_CODE'] !='CPU' &&*/ $ob['PROPERTY_DEFAULT_ONLY_VALUE'] == 1) continue;
			/*} else if ($ob['PROPERTY_TYPE_CODE'] =='CPU' || $ob['PROPERTY_DEFAULT_ONLY_VALUE'] == 1) {
				continue;
			}*/
			$group = $ob['PROPERTY_GROUP_VALUE'] ?: 'NO_GROUP';
			self::$_arContainer['options'][$ob['PROPERTY_TYPE_CODE']]['LIST'][$group][$ob['CODE']] = [
				'ID' => $ob['ID']
				,'NAME' => $ob['NAME']
				//,'PRICE' => $price
				,'NOTE' => $ob['PREVIEW_TEXT']
				,'S_NAME' => $ob['PROPERTY_SHORT_NAME_VALUE']
			];
		}
	}
	private static function _ModifyData():void
	{
		foreach(self::$_arContainer['options'] as $k => &$arOption) {
			$listCnt = 0;
			$arOption['INS_CNT'] = isset($arOption['INS']) ? count($arOption['INS']) : 0;
			if(isset($arOption['LIST'])) foreach($arOption['LIST'] as $arVal) $listCnt += count($arVal);
			$arOption['LIST_CNT'] = $listCnt;
			$totalCnt = $listCnt + $arOption['INS_CNT'];
			if ($totalCnt == 0){
				unset(self::$_arContainer['options'][$k]);
				continue;
			}
			switch ($totalCnt) {
				case 1:
					$vType = ($arOption['MAX'] != 1 || $arOption['INS_CNT'] == 1 ) ? '_PrintString' : '_PrintCheckbox';
					break;
				case 2:
				case 3:
					if( $arOption['MULTI']) $vType = match ($arOption['MAX']) {
						1 => '_PrintCheckbox',
						default => '_PrintSelect',
					};
					else
						$vType = '_PrintRadio';
					break;
				default:
					$vType = '_PrintSelect';
			}
			$arOption['METHOD'] = $vType;
		}
	}
	static function GetAllData():array {
		return self::$_arContainer;
	}
}
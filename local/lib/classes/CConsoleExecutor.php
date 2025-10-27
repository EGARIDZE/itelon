<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('catalog');
CModule::IncludeModule('iblock');
class CConsoleExecutor
{
	static $_arResult = [];
	public static function setOptGroupsMap()
	{
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::OPT_IBLOCK_ID->value
			,'!PROPERTY_GROUP' => false
		];
		$arSelect = ["ID","IBLOCK_ID", 'PROPERTY_GROUP'];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		while ($ob = $res->Fetch()) {
			self::$_arResult['USED'][] = $ob['PROPERTY_GROUP_VALUE'];
		}
		self::$_arResult['USED'] = array_unique(self::$_arResult['USED']);
		$propEnum = CIBlockPropertyEnum::GetList(
			[]
			, [
				"IBLOCK_ID"=>EConfigIntConst::OPT_IBLOCK_ID->value
				,'CODE' => 'GROUP'
			]
		);
		while ($ob = $propEnum->Fetch()) {
			self::$_arResult['ALL'][$ob['ID']] = $ob['VALUE'];
		}
		self::$_arResult['DIFF'] = array_diff(
			self::$_arResult['ALL'],
			self::$_arResult['USED'],
		);
	}
	public static function getArResult() : array
	{
		return self::$_arResult;
	}
	public static function delUnusedOptGroups() {
		foreach(self::$_arResult['DIFF'] as $id => $ob) {
			CIBlockPropertyEnum::Delete($id);
		}
	}
	public static function findNonExistOptionsInConf():array
	{
		$arSelect = array("ID", "IBLOCK_ID", "CODE", 'NAME');
		$configFilter = array(
			"IBLOCK_ID" => EConfigIntConst::CONFIG_IBLOCK_ID->value
		, "ACTIVE" => "Y"
		, "AVAILABLE" => "Y"
		);
		$res = CIBlockElement::GetList(array(), $configFilter, false, false, $arSelect);
		$arInstalled = [];
		$arSku = [];
		while ($ob = $res->GetNextElement()) {
			$arProps = $ob->GetProperties(false, ['EMPTY'=>'N']);
			$arFields = $ob->GetFields();
			foreach ($arProps as $k => $arProp){
				if (str_starts_with($k, 'INS')) {
					$arInstalled[$arFields['CODE']][$k] = $arProp['VALUE'];
					if (is_array($arProp['VALUE'])){
						foreach ($arProp['VALUE'] as $val)
							$arSku[] = $val;
					} else {
						$arSku[] = $arProp['VALUE'];
					}
				}
			}
		}
		$arSku = array_unique($arSku);
		$arFilter = ["IBLOCK_ID" => EConfigIntConst::OPT_IBLOCK_ID->value, "CODE" => $arSku];
		$arSelect = ["ID", "IBLOCK_ID", 'CODE'];
		$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		$arFoundSku = [];
		while ($item = $res->Fetch()) {
			$arFoundSku[] = $item['CODE'];
		}
		$arNotFoundSku = array_diff($arSku, $arFoundSku);
		$arRes = [];
		foreach ($arInstalled as $sku => $arOpt) {
			foreach ($arOpt as $name => $v) {
				if (is_array($v)) {
					foreach ($v as $pn){
						if (in_array($pn, $arNotFoundSku))
							$arRes[$sku][$name][] = $pn;
					}
				} else {
					if (in_array($v, $arNotFoundSku))
						$arRes[$sku][$name] = $v;
				}
			}
		}
		return $arRes;
	}
	public static function updateSetList() : void
	{
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::CATALOG_IBLOCK_ID->value,
			'ACTIVE' => 'Y',
			'ID' => CIBlockElement::SubQuery('PROPERTY_ITEMS', [
				'IBLOCK_ID' => 18,
				'ACTIVE' => 'Y',
//				'CODE' => 'servery-lenovo'
			])
		];
		$arSelect = ["ID", "IBLOCK_ID", 'CODE'];
		$res = CIBlockElement::GetList(array('sort'=>'asc'), $arFilter, false, false, $arSelect);
		while ($ob = $res->Fetch()) {
			$arFilter = [
				"IBLOCK_ID" => 18,
				"ACTIVE" => "Y",
				"PROPERTY_ITEMS" => $ob['ID']
			];
			$res2 = CIBlockElement::GetList(array('NAME'=>'asc'), $arFilter, false, false, $arSelect);
			while ($ob2 = $res2->Fetch()) {
				self::$_arResult['SETS'][$ob['ID']][] = $ob2['ID'];
			}
		}
		foreach(self::$_arResult['SETS'] as $id => $arSet) {
			CIBlockElement::SetPropertyValuesEx(
				$id
				, EConfigIntConst::CATALOG_IBLOCK_ID->value
				, ["SETS_BLOCK_LINK" => $arSet]
				, ['NewElement']
			);
		}
	}
}
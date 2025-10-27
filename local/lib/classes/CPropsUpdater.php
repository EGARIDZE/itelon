<?php

class CPropsUpdater
{
	//todo повесить на евент создания модели
	public static function updateCatConfigUrl() :void {

		$arUrl = [];
		$arSelect = ['ID','IBLOCK_ID','PROPERTY_SECTION_LINK'];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::MODEL_IBLOCK_ID->value
			, '!PROPERTY_SECTION_LINK' => false
			,'ACTIVE' => 'Y'
//			,'ID' => 1913465
		];
		$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
		while ($ob = $res->Fetch()) {
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
			$arUrl[$ob['ID']] = $url;
		}
		$arSelect = ['ID', 'IBLOCK_ID', 'PROPERTY_MODEL_LINK'];
		$arFilter = [
			'IBLOCK_ID' => EConfigIntConst::CATALOG_IBLOCK_ID->value
			,'ACTIVE' => 'Y'
			,'PROPERTY_MODEL_LINK' => array_keys($arUrl)
			,'PROPERTY_CONFIGURATOR_URL' => false
		];
		$res = CIBlockElement::GetList([],$arFilter,false,false,$arSelect);
		while ($ob = $res->Fetch()){
			CIBlockElement::SetPropertyValuesEx(
				$ob['ID']
				, EConfigIntConst::CATALOG_IBLOCK_ID->value
				, ["CONFIGURATOR_URL"=>$arUrl[$ob['PROPERTY_MODEL_LINK_VALUE']]]
			);
		}

	}
}
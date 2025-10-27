<?php

class CDataConstructor
{
	static private string $_html = '';
	static public array $arCatPropsForCard = [
		 'FORM_FACTOR'      =>''
		,'MEMORY'           =>''
		,'NUMBER_DISC'      =>''
		,'POWER_UNIT'       =>''
		,'PROCESSOR_SERIES' =>''
		,'CONTROLLERS'      =>''
		,'INTERFACES'       =>''
		,'CARTRIDGE_SLOTS'  =>''
	];

	/**
	 * @param array $arElementId
	 * @param array $arDisplayProps
	 * @param array $arPreviewText
	 * @return array
	 */
	public static function genPropsHtml(array $arElementId, array $arDisplayProps, array $arPreviewText) : array {

		$arRes = [];
		$arElementIdBySectionId = [];
		$arMandatorySectionPropsBySectionId = [];
		$sectionId = '';

		$db_groups = CIBlockElement::GetElementGroups($arElementId, true);
		while($ar_group = $db_groups->Fetch()) {
			$arElementIdBySectionId[$ar_group['ID']][] = $ar_group['IBLOCK_ELEMENT_ID'];
		}
		$obEnum = new \CUserFieldEnum; // вкл метод
		$dbList = CIBlockSection::GetList(
			false,
			array(
				'IBLOCK_ID' => '14', // ID инфоблока
				'ID' => array_keys($arElementIdBySectionId), // ID раздела
				'!UF_PROPLIST' => false
			),
			false,
			array(
				'ID',
				'UF_PROPLIST' // UF поле
			)
		);
		while ($arResult = $dbList->Fetch()) {
			$rsData = $obEnum->GetList(
				array(),
				array(
					"ID" => $arResult['UF_PROPLIST']
					// перебор полученных id значений
				)
			);
			while ($arEnum = $rsData->Fetch()) {
				$arMandatorySectionPropsBySectionId[$arResult['ID']][] = $arEnum['XML_ID'];
			}
		}
		foreach ($arDisplayProps as $index => $arProps) {
			$sectionId = self::_findSectionId($arElementId[$index], $arElementIdBySectionId, $arMandatorySectionPropsBySectionId);
			if (
				$sectionId
				&& !array_diff($arMandatorySectionPropsBySectionId[$sectionId], array_keys($arProps))
			)
			{
				self::$_html = '<ul>';
				foreach ($arProps as $arProp) {
					if (empty($arProp['VALUE'])) continue;
					if (is_array($arProp['VALUE'])) {
						$value = implode(' / ', $arProp['VALUE']);
					} else if ($arProp['ID']==73 && str_starts_with($arProp['VALUE_XML_ID'], '_')) { //FF
						$value = "<a class='default-link' href='/category/"
							.str_replace('_', '', $arProp['VALUE_XML_ID'])
							."/'>$arProp[VALUE]</a>";
					} else if (in_array($arProp['ID'], [51,75]) && $arProp['VALUE_XML_ID']) { // vendor || cpu
						$value = "<a class='default-link' href='/category/$arProp[VALUE_XML_ID]/'>$arProp[VALUE]</a>";
					}
					else {
						$value = $arProp['LINK_ELEMENT_VALUE'] ? reset($arProp['LINK_ELEMENT_VALUE'])['NAME'] : $arProp['VALUE'];
					}
					self::$_html .= '<li>' . $value . '</li>';
				}
				self::$_html .= '</ul>';
			} else if ($arPreviewText[$index]) {
				self::$_html = $arPreviewText[$index];
			}
			$arRes[$arElementId[$index]] = self::$_html;
		}

		return $arRes;
	}
	private static function _findSectionId(string $elemId, array $arElemIdBySectId, array $arSectPropsBySectId) : string {
		foreach ($arElemIdBySectId as $sectId => $arElemId) {
			if (in_array($elemId, $arElemId) && array_key_exists($sectId, $arSectPropsBySectId))
				return $sectId;
		}
		return '';
	}
	public static function test($arElementId) :array {
		$arMandatorySectionPropsBySectionId = [];
		$arElementIdBySectionId = [];

		$db_groups = CIBlockElement::GetElementGroups($arElementId, true);
		while($ar_group = $db_groups->Fetch()) {
			$arElementIdBySectionId[$ar_group['ID']][] = $ar_group['IBLOCK_ELEMENT_ID'];
		}
		$obEnum = new \CUserFieldEnum; // вкл метод
		$dbList = CIBlockSection::GetList(
			false,
			array(
				'IBLOCK_ID' => '14', // ID инфоблока
				'ID' => array_keys($arElementIdBySectionId), // ID раздела
				'!UF_PROPLIST' => false
			),
			false,
			array(
				'ID',
				'UF_PROPLIST' // UF поле
			)
		);
		while ($arResult = $dbList->Fetch()) {
			$rsData = $obEnum->GetList(
				array(),
				array(
					"ID" => $arResult['UF_PROPLIST'],
					// перебор полученных id значений
				)
			);
			while ($arEnum = $rsData->Fetch()) {
				$arMandatorySectionPropsBySectionId[$arResult['ID']][] = $arEnum['XML_ID'];
			}
		}
		return $arMandatorySectionPropsBySectionId;
	}
	public static function genPriceCardDescription(string $name) : string
	{
		$description = '<ul><li>' . str_replace(',', '</li><li>', $name) . '</li></ul>';

		return $description;
	}
	public static function genConfShortSpecs(array $arProps, bool $bUseShortNames = false) : string
	{
		$strSpec = '<ul>';
		foreach ($arProps as $arProp) {
			$arPropValue = reset($arProp);
			$name = $bUseShortNames ? $arPropValue['S_NAME'] ?? $arPropValue['NAME'] : $arPropValue['NAME'];
			$isCntInName = $arPropValue['NAME_HAS_CNT'];
			$strSpec .= '<li>' . ($isCntInName ? '' : $arPropValue['CNT'] . ' x ') . $name . '</li>';
		}
		$strSpec .= '</ul>';
		return $strSpec;
	}
	public static function genBundlePropsList(string $description) : string
	{
		$arList = explode('|', str_replace('"', '', $description));
		if (count($arList) == 1) return '';
		$strList = '<ul>';
		foreach ($arList as $li) {
			$strList .= '<li>' . trim($li) . '</li>';
		}
		$strList .= '</ul>';
		return $strList;
	}

	/**
	 * @param array{price:int, discontinued:int|string, text:string, class:string|null} $arParams
	 * @return array
	 */
	public static function genStatusArray(array $arParams) : array
	{
		if ($arParams['price'] && $arParams['discontinued'])
			$arResult = ['text' => 'Осталось мало', 'class' => 'low-count'];
		else
			$arResult = ['text' => $arParams['text'], 'class' => $arParams['class']];

		return $arResult;
	}
}
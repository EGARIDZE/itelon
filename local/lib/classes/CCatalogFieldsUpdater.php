<?php

class CCatalogFieldsUpdater
{
	private static $_arResult = [];

	private static function SetArResult($arSelect, $arFilter, $key, $singleId = false) {
		self::$_arResult = [];
		$res = CIBlockElement::GetList([],$arFilter,false,false,$arSelect);
		while ($ob = $res->Fetch()){
			if ($singleId) {
				self::$_arResult[$ob[$key]] = $ob['ID'];
			} else {
				self::$_arResult[$ob[$key]][] = $ob['ID'];
			}
		}
	}
	static function UpdateCat() {
		$arSelect = ['ID', 'IBLOCK_ID', 'PROPERTY_PART_NUMBER'];
		$arFilter = [
			'IBLOCK_ID' => 14
			,'ACTIVE' => 'Y'
//			,"PROPERTY_NOT_AVAILABLE" => false
			,'!PROPERTY_PART_NUMBER' => false
		];
		self::SetArResult($arSelect, $arFilter, 'PROPERTY_PART_NUMBER_VALUE');

		$objPrice = new CPriceListCatList(array_keys(self::$_arResult));
		$arPriceListData = $objPrice->GetArResult();
		foreach (self::$_arResult as $key => $arId) {
			$sklad    = $arPriceListData[$key]['AVAIL']['qty'] > 1 ? 275 : 276;
			$dtime    = $arPriceListData[$key]['DTIME'] ?? '';
			$hasPrice = $arPriceListData[$key]['PRICE'] ? 1 : 0;
			foreach ($arId as $id) {
				self::Update($arPriceListData, $key, $id);
				CIBlockElement::SetPropertyValuesEx(
					$id
					, 14
					, [
						"AVAILABILITY"=>$sklad
						, '_HAS_PRICE' => $hasPrice
						, '_MIN_DTIME' => $dtime
						, '_WARRANTY' => $arPriceListData[$key]['WARRANTY']
					]
				);
			}
		}
	}
	static function UpdateConf() {
		$arSelect = [
			'ID'
			, 'IBLOCK_ID'
			, 'XML_ID'
		];
		$arFilter = [
			'IBLOCK_ID' => 48
			,'ACTIVE' => 'Y'
//			,'CODE' => 'JH149A'
		];
		self::SetArResult($arSelect, $arFilter, 'XML_ID', true);

		$objPrice = new CPriceListConfList(array_keys(self::$_arResult));
		$arPriceListData = $objPrice->GetArResult();
		foreach (self::$_arResult as $key => $id) {
			$sklad = array_key_exists($key, $arPriceListData) ? $arPriceListData[$key]['AVAIL']['sklad'] : false;
			CIBlockElement::SetPropertyValuesEx(
				$id
				, 48
				, [
					"SKLAD"=>$sklad
					, 'WARRANTY'=>$arPriceListData[$key]['WARRANTY']
					, 'STATUS' => $arPriceListData[$key]['STATUS']
					, 'DISCONTINUED' => $arPriceListData[$key]['DISCONTINUED']
					, 'DELIVERY_TIME' => $arPriceListData[$key]['DELIVERY_TIME']
				]
			);
			self::Update($arPriceListData, $key, $id);
		}
	}
	private static function Update($arPriceListData, $key, $id) {
		if (array_key_exists($key, $arPriceListData)) {
			if ($arPriceListData[$key]['PRICE']) {
				$priceData = [
					'PRODUCT_ID' => $id,
					'CATALOG_GROUP_ID' => 1,
					'PRICE' => $arPriceListData[$key]['PRICE'],
					'CURRENCY' => 'RUB',
				];

				$existingPrice = CPrice::GetList(
					array(),
					array(
						"PRODUCT_ID" => $id,
						"CATALOG_GROUP_ID" => 1
					)
				)->fetch();

				if ($existingPrice) {
					CPrice::Update($existingPrice['ID'], $priceData);
				} else {
					CPrice::Add($priceData);
				}
			} else {
				CPrice::DeleteByProduct($id);
			}
			CCatalogProduct::Add(['ID'=>$id, "QUANTITY"=>$arPriceListData[$key]['AVAIL']['qty']]);
		} else {
			CCatalogProduct::Delete($id);
		}
	}
	static function GetArResultTest($marker)
	{
		$arSelect = ['ID', 'IBLOCK_ID', 'PROPERTY_PART_NUMBER'];
		$arFilter = [
			'IBLOCK_ID' => 2
			,'ACTIVE' => 'Y'
			,"PROPERTY_NOT_AVAILABLE" => false
			,'PROPERTY_PART_NUMBER' => $marker
		];
		self::SetArResult($arSelect, $arFilter, 'PROPERTY_PART_NUMBER_VALUE');
		return self::$_arResult;
	}
}
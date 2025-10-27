<?

abstract class CPriceListAbstract {
	protected array $_arData = [];
	protected array $_arFilter = ["IBLOCK_ID" => 28, "INCLUDE_SUBSECTIONS" => "Y", "ACTIVE" => "Y"];
	protected array $_arSelect = ['ID', 'IBLOCK_ID', 'CODE', 'QUANTITY'];
	protected array $_arQty = [];
	protected array $_arDtime = [];
	protected array $_arResult = [];

	protected function Main($bGroupByCode = true) {
		$rsProduct = CIBlockElement::GetList(
			Array("PRICE_1" => 'asc,nulls')
			,$this->_arFilter
			,false
			,false
			,$this->_arSelect
		);
		while($arProduct=$rsProduct->fetch()){
			if ($bGroupByCode) {
				$this->_arData[$arProduct['CODE']] = $arProduct;
			} else if ($arProduct['PROPERTY_MARKER_VALUE']) {
				$this->_arData[$arProduct['PROPERTY_MARKER_VALUE']][] = $arProduct;
				$this->_arQty[$arProduct['PROPERTY_MARKER_VALUE']][] = intval($arProduct['QUANTITY']);
				if ($arProduct['PROPERTY_DELIVERY_TIME_VALUE'])
					$this->_arDtime[$arProduct['PROPERTY_MARKER_VALUE']][intval($arProduct['PROPERTY_DELIVERY_TIME_VALUE'])] =
					$arProduct['PROPERTY_DELIVERY_TIME_VALUE'];
			}
		}
	}



	/**
	 * @param int $price
	 * @return string
	 */
	function PriceFormat($price) {
		return $price > 0 ? "от ".number_format($price, 0, '.', ' ')." ₽" : 'Цена по запросу';
	}


	function test() {
		return $this->_arQty;
	}
	public function GetArResult()
	{
		return $this->_arResult;
	}

}
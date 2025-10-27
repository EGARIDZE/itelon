<?


class CPriceListCatList extends CPriceListAbstract
{
	private $_arPrices = [];

	/**
	 * CPriceListCatList constructor.
	 * @param array|string $markers
	 */
	function __construct($markers) {
		$this->_arFilter['PROPERTY_MARKER'] = $markers;
//		$this->_arFilter['!PROPERTY_TYPE'] = [51,52];
		$this->_arSelect[] = 'PROPERTY_MARKER';
		$this->_arSelect[] = 'PREVIEW_TEXT';
		$this->_arSelect[] = 'PROPERTY_DELIVERY_TIME';
		$this->_arSelect[] = 'PROPERTY_WARRANTY';
		$this->Main(false);
		foreach ($this->_arData as $key => $arDatum) {
			$this->_arPrices[] = intval($arDatum[0]['PRICE_1']);
			$this->_arResult[$key] = [
				'PRICE' => intval($arDatum[0]['PRICE_1'])
				, 'PRICE_FORMATTED' => $this->PriceFormat(intval($arDatum[0]['PRICE_1']))
			];
			$avail = match(max($this->_arQty[$key])){
				999 => ['На складе', 'in_stock', 999],
				10 => ['Скоро на складе', 'in_transit', 10],
				default => ['Под заказ', 'na', 1]
			};
			$this->_arResult[$key]['AVAIL'] = array_combine(['text','class', 'qty'], $avail);
			if ($this->_arResult[$key]['AVAIL']['qty'] < 999 && !empty($this->_arDtime[$key])) {
				$minDtime = min(array_keys($this->_arDtime[$key]));
				$this->_arResult[$key]['DTIME'] = $this->_arDtime[$key][$minDtime];
			}
			$warranty = match($arDatum[0]['PROPERTY_WARRANTY_VALUE']) {
				'1' => '1 год'
				,'3' => '3 года'
				,default => ''
			};
			$this->_arResult[$key]['WARRANTY'] = $warranty;
		}
	}
	function getGlobalMinPrice()
	{
		if (empty($this->_arPrices)) return 'Цена по запросу';
		return $this->PriceFormat(min($this->_arPrices));
	}
}
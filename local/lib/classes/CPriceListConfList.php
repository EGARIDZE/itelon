<?php


class CPriceListConfList extends CPriceListAbstract
{
	/**
	 * CPriceListData constructor.
	 * @param mixed $arXmlId
	 */
	function __construct($arXmlId)
	{
		$this->_arFilter['XML_ID'] = $arXmlId;
		$this->_arSelect[] = 'XML_ID';
		$this->_arSelect[] = 'PROPERTY_WARRANTY';
		$this->_arSelect[] = 'PROPERTY_DELIVERY_TIME';
		$this->_arSelect[] = 'PROPERTY_STATUS';
		$this->_arSelect[] = 'PROPERTY_DISCONTINUED';
		$this->Main();
		foreach ($this->_arData as $key => $arDatum) {
			$this->_arResult[$key] = [
				'PRICE' => intval($arDatum['PRICE_1']),
				'AVAIL' => [
					'qty' => $arDatum['QUANTITY'],
					'sklad' => in_array($arDatum['QUANTITY'], [999,10]) ? 'Y' : false
				]
				,'WARRANTY' => $arDatum['PROPERTY_WARRANTY_VALUE']
				,'DELIVERY_TIME' => $arDatum['PROPERTY_DELIVERY_TIME_VALUE']
				,'STATUS' => $arDatum['PROPERTY_STATUS_VALUE']
				,'DISCONTINUED' => $arDatum['PROPERTY_DISCONTINUED_VALUE']
			];
		}
	}
}
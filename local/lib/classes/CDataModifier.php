<?php

class CDataModifier
{
	/**
	 * @param int|null $price
	 * @param bool $bPrefix (show "от")
	 * @param bool $bShowPrice
	 * @return string
	 */
	static function PriceFormat(int|null $price, bool $bPrefix = true, bool $bShowPrice = true) :string
	{
		if (!$bShowPrice) return 'Цена по запросу';
		$strPrefix = $bPrefix ? "от " : '';
		return $price ? $strPrefix.number_format($price, 0, '.', ' ')." ₽" : 'Цена по запросу';
	}

	/**
	 * @param int|null $qty
	 * @param string $strAltText
	 * @param string $strAltClass
	 * @param string $strDeliveryTime
	 * @return array
	 */
	static function QtyToStrValues(
		int|null $qty
		, string $strAltText = ''
		, string $strAltClass = ''
		, string $strDeliveryTime = ''
	) :array
	{
		if($strDeliveryTime) $strDeliveryTime = "($strDeliveryTime)";
		$result = match ($qty) {
			999 => ['На складе', 'in_stock', '',''],
			10 => ['Скоро на складе', 'in_transit', 'Скоро на складе', $strDeliveryTime],
			1 => ['Под заказ', 'na', 'Под заказ', $strDeliveryTime],
			default => [$strAltText?:'Под заказ', $strAltClass?:'na', $strAltText?:'Под заказ', $strDeliveryTime],
		};
		if ($qty != 999 && $strDeliveryTime) $result[0] .= " $strDeliveryTime";
		return array_combine(['text','class', 'part1', 'part2'], $result);
	}


	static function nameToStyleClass(string $name) : string
	{
		preg_match('/^[рнтас]/ui', $name, $m);
		$n = $m ? mb_strtolower($m[0]) : "";
		return match ($n) {
			'р', 'с' => 'sale',
			'н' => 'new',
			'т' => 'topseller',
			'а' => 'promo',
			default => 'default',
		};
	}
	static function wtyFormat(string $value, string|null $default = '1 год') : string
	{
		if (!$default) $default = '1 год';
		return match ($value) {
			'1' => '1 год',
			'3' => '3 года',
			'5' => '5 лет',
			default => $default
		};
	}
}
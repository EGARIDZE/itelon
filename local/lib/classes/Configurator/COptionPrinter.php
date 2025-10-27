<?php

class COptionPrinter
{
	use TPrinter;
	private static array $_arProps;
	private static array $_arInstSku;
	private static int $_intInstCnt;
	private static string $_strTitle;
	private static string $_strName;
	private static string $_strId;

	static function PrintAll(array $arOptionsData):void
	{
		foreach ($arOptionsData as $type => self::$_arProps) {
			$name = self::$_arProps['NAME'];
			$tip = self::$_arProps['TIP'] ?? '';
			$method = self::$_arProps['METHOD'];
			$mainSetDivClass = ($method == '_PrintString' && self::$_arProps['MAX']==1) ? ' text-row' : '';
			echo "<div class='form-group input-set$mainSetDivClass' data-code='$type'><label>$name:"; // main set
			if ($tip) self::_printTip($tip);
			echo "</label><div class='input-set__wrapper'>";
			self::_printSetListDiv();

			if (self::$_arProps['INS_CNT'] > 0) {
				foreach (self::$_arProps['INS'] as self::$_arInstSku) {
					self::$_strName = self::$_arInstSku['NAME'];
					self::$_strId = self::$_arInstSku['ID'];
					self::$_intInstCnt = self::$_arInstSku['CNT'];
					self::_PrintSetItem(true);
				}
			} elseif (self::$_arProps['METHOD'] != '_PrintCheckbox') {
				self::$_intInstCnt = 0;
				if (self::$_arProps['METHOD']=='_PrintSelect' || self::$_arProps['METHOD']=='_PrintRadio')
				{
					self::$_strName = 'Нет';
					self::$_strId = '';
				} else {
					$firstGroup = reset(self::$_arProps['LIST']);
					$firstListOption = reset($firstGroup);
					self::$_strName = $firstListOption['NAME'];
					self::$_strId = $firstListOption['ID'];
				}
				self::_PrintSetItem();
			}
			if (self::$_arProps['LIST_CNT'] > 0 && self::$_arProps['METHOD'] == '_PrintCheckbox') {
				foreach (self::$_arProps['LIST'] as $arSku)
					foreach ($arSku as $arSkuProps) {
						self::$_strName = $arSkuProps['NAME'];
						self::$_strId = $arSkuProps['ID'];
						self::_PrintSetItem();
					}
			}
			$bAddMore = self::$_arProps['METHOD'] == '_PrintSelect' && self::$_arProps['MULTI']
				&& (self::$_arProps['MAX']==1 || self::$_arProps['MAX'] != self::$_intInstCnt);
			if ($bAddMore) {
				self::$_strName = 'Нет';
				self::$_strId = '';
				self::_printSetItemTemplate();
			}
			self::_printSetListDiv(true);// close list
			if ($bAddMore) {
				echo "<button class='input-set__append'><span>Добавить</span></button>";
			}
			echo "</div></div>";// close wrapper && main set
		}
	}
	private static function _PrintSelect(bool $printBase = false):void
	{
		self::_printSelectHeader(
			 title: self::$_strName
			, name: "ID_".self::$_arProps['CODE']
			, value: self::$_strId
			, printBase: $printBase
		);
		foreach(self::$_arProps['LIST'] as $group => $arSku){
			if ($group != 'NO_GROUP') echo "<li class='dropdown__option _group'>$group</li>";
			foreach ($arSku as $arSkuProps) {
				echo "<li class='dropdown__option' data-value='$arSkuProps[ID]'>$arSkuProps[NAME]</li>";
			}
		}
		echo "</ul></div></div>"; // close select
	}
	private static function _PrintString(bool $isBase = false):void
	{
		$class = $isBase ? ' is-base' : '';
		echo sprintf("<label class='form-group label'>
							<span class='label__text'>%s</span>
							<input class='form-control _filled _hidden%s' type='text' name='ID_%s' value='%s'>
		                </label>", self::$_strName, $class, self::$_arProps['CODE'], self::$_strId);
	}
	private static function _PrintCheckbox(bool $checked = false):void
	{
		$attrs = '';
		$class = '';
		if ($checked) {
			$attrs = ' checked disabled';
			$class = ' is-base';
		}
		echo "<label class='form-group checkbox'>
				<input
					class='form-control _filled _hidden$class'
					name='ID_" . self::$_arProps['CODE']. "'
					data-type='checkbox'
					type='checkbox'
					value='" . self::$_strId . "'
					$attrs
				>
				<span class='checkbox__label'>" . self::$_strName . "</span>
				<span class='custom-checkbox'></span>
			</label>";
	}
	private static function _PrintRadio():void
	{
		echo "<div class='input-radio__list input-radio input-radio_transparent'>";
		self::_printRadioItem(
			name: self::$_strName
			,id: self::$_strId
			,code: self::$_arProps['CODE']
			,class: ' is-base'
			,attrs: ' checked'
		);
		foreach (self::$_arProps['LIST'] as $arSku){
			foreach ($arSku as $arSkuProps) {
				self::_printRadioItem(
					name: $arSkuProps['NAME']
					,id: $arSkuProps['ID']
					,code: self::$_arProps['CODE']
				);
			}
		}
		echo "</div>";
	}
}
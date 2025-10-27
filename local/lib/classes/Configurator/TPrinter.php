<?php

trait TPrinter
{
	protected static function _printSelectCnt(int $insCnt, int $maxCnt=99):void
	{
		for ($i = $insCnt + 1; $i <= $maxCnt; $i++) {
			echo "<li class='dropdown__option' data-value='$i'>$i</li>";
		}
		echo "</ul></div></div>";
	}
	protected static function _printSelectHeader(
		string|int $title
		, string $name
		, string|int $value
		, bool $printBase = false
		, string $id = ''
		, string $class = 'select-option'
	):void
	{
		echo <<<HEADER
			<div class="form-group dropdown $class">
				<div class="dropdown__button">
					<span class="dropdown__title">$title</span>
					<div class="arrow"></div>
					<input class="form-control _filled _hidden" type="text" name="$name" value="$value" data-id="$id">
				</div>
				<div class="dropdown__options">
					<ul class="dropdown__list">						
		HEADER;
		if ($printBase) echo "<li class='dropdown__option is-base _selected' data-value='$value'>$title</li>";
	}
	protected static function _printHiddenElements(bool $cbox = false):void
	{
		$class = '';
		if (!$cbox)
			echo "<button class='input-set-item__delete invisible'></button>";
		else
			$class = ' for-cbox';
		echo <<<HTML
			<div class='input-set__attention invisible$class'>
				<span>!!!</span>
				<div class='input-set__attention-desc'>Цену и
					наличие на данную опцию уточнит менеджер
				</div>
			</div>
		HTML;
	}
	protected static function _printTip(string $tip):void
	{
		echo <<<TIP
			<div class="tip">
				<div class="tip__image">
					<img src="/local/templates/itelion/files/icons/question.svg" alt="#">
				</div>
				<div class="tip__text">
					$tip
				</div>
			</div>
		TIP;
	}
	protected static function _printRadioItem(
		string $name
		, string $code
		, string $id
		, string $class = ''
		, string $attrs = ''
	):void
	{
		echo <<<ITEM
			<div class='input-radio__item'>
				<input
				    class='form-control _filled no-events$class'
					name='ID_$code'
				    type='radio'
				    value='$id'
				    $attrs
				>
				<div class='input-radio__button'>
					<span></span>
					<p class='checkbox__label'>$name</p>
				</div>
			</div>
		ITEM;
	}
	static function Test(): void
	{
		self::$_arProps['METHOD'] = '_PrintRadio';
		echo self::$_arProps['METHOD'];
	}
	protected static function _printSetListDiv(bool $close = false):void
	{
		if (in_array(self::$_arProps['METHOD'], ['_PrintSelect','_PrintCheckbox']))
			echo $close ? "</div>" : "<div class='input-set__list'>";
	}
	protected static function _PrintSetItem(bool $hasInstalled = false):void
	{
		$class = self::$_arProps['MAX'] > 1 ? ' with-qty' : '';
		echo "<div class='input-set__item$class'>";
		self::{self::$_arProps['METHOD']}($hasInstalled);
		echo "<div class='input-set__options'>";
		if( self::$_arProps['MAX'] > 1 ) {
			self::_printSelectHeader(
				title: self::$_intInstCnt
				,name: "amount_".self::$_arProps['CODE']
				,value: self::$_intInstCnt ?: ''
				,printBase: self::$_intInstCnt > 0
				,id: self::$_strId
				,class: 'select-qty'
			);
			self::_printSelectCnt(
				insCnt: self::$_intInstCnt
				,maxCnt: self::$_arProps['MAX']
			);
		}
		if (self::$_arProps['METHOD'] != '_PrintString' || self::$_arProps['MAX'] > 1 ) {
			self::_printHiddenElements(self::$_arProps['METHOD']=='_PrintCheckbox');
		}
		echo "</div></div>";// close options && item
	}
	protected static function _printSetItemTemplate():void
	{
		echo "<div class='input-set__item template'>";
		self::_PrintSelect();
		echo "<div class='input-set__options'>";
		if( self::$_arProps['MAX'] > 1 ) {
			self::_printSelectHeader(
				title: 0
				,name: "amount_".self::$_arProps['CODE']
				,value: ''
				,class: 'select-qty'
			);
			self::_printSelectCnt(
				insCnt: 0
				,maxCnt: self::$_arProps['MAX']
			);
		}
		self::_printHiddenElements();
		echo "</div></div>";// close options && item
	}
}
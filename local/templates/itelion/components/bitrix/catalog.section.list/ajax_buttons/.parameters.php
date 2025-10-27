<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = [
	'ALL_BUTTON_NAME' => [
		'PARENT' => 'CUSTOM_SETTINGS'
		,'NAME' => "Название кнопки 'показать всё'"
		,'TYPE' => 'STRING'
		,'DEFAULT' => 'Все секции'
		,
	]
	,'TAG_ID' => [
		'PARENT' => 'CUSTOM_SETTINGS'
		,'NAME' => 'ID контейнера html, в который загружать компонент'
		,'TYPE' => 'STRING'
		,'DEFAULT' => ''
		,
	]
	,
];
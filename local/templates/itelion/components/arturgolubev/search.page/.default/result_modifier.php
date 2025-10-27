<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$GLOBALS['groupFilter']['=ID'] = array_column($arResult['SEARCH'], 'ITEM_ID');

//clog($arResult);

<?
#!/usr/local/php/bin/php -q
define('SITE_ID', 's1');
$_SERVER["DOCUMENT_ROOT"] = "/home/c/cx17768/Itelon/public_html";

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("BX_CAT_CRON", true);
define('NO_AGENT_CHECK', true);
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.treolan.ru/api/v1/Auth/Token",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'login' => 'itelon_vr',
		'password' => '8lifeek6'
	]),
	CURLOPT_HTTPHEADER => [
		"Accept: text/plain, application/json, text/json",
		"Authorization: 123",
		"Content-Type: application/json"
	],
]);

$auth = curl_exec($curl);
//echo $auth;

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.treolan.ru/api/v1/Catalog/Get",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'category' => '',
		'vendorid' => 0,
		'keywords' => '',
		'criterion' => 'StartWith',
		'inArticul' => false,
		'inName' => false,
		'inMark' => false,
		'showNc' => 1,
		'freeNom' => false
	]),
	CURLOPT_HTTPHEADER => [
		"Accept: text/plain, application/json, text/json",
		"Authorization: Bearer $auth",
		"Content-Type: application/json"
	],
]);

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
file_put_contents($_SERVER['DOCUMENT_ROOT']."/upload/prices/treolan.json", $response);
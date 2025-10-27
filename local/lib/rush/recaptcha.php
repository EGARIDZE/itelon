<?php

AddEventHandler("form","onBeforeResultAdd","onBeforeResultAddHandler");

function onBeforeResultAddHandler($WEB_FORM_ID,$arFields,$arrVALUES)
{
	global $APPLICATION;

	//Защита от атак
    if( !check_bitrix_sessid() ){
        die();
    }

    foreach($arrVALUES as &$value){
		if( !is_array($value) ){
			$value = htmlspecialchars( htmlentities( strip_tags($value), ENT_QUOTES, "UTF-8"), ENT_QUOTES);
		}        
    }
	//END Защита от атак

	$g_recaptcha_response = $arrVALUES["g-recaptcha-response"];

	if( !empty($g_recaptcha_response) ){
		
		$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lcc0RwrAAAAAEFfNgPlo4SOegZGlTMxR8C5fDik&response=".$g_recaptcha_response."&remoteip=".$_SERVER["REMOTE_ADDR"]),true);
			
		$g_recaptcha_response_check = false;
		
			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test_recapthca.txt', var_export($response, true), FILE_APPEND | LOCK_EX);

		if( ($response["success"] and $response["score"] >= 0.3 and $response["action"] == 'feedback') ){
			$g_recaptcha_response_check = true;
		}

		if (!$g_recaptcha_response_check)
		{
			$APPLICATION->ThrowException('Не пройдена проверка Google reCAPTCHA v3.</a>');
			return false;
		}
	}else{
		$APPLICATION->ThrowException('Не пройдена проверка Google reCAPTCHA v3.');
		return false;
	}
}



<?php
$handler = \Bitrix\Main\EventManager::getInstance();

//class autoload php
spl_autoload_register(function ($className) {
    include $className . '.php';
    include $_SERVER['DOCUMENT_ROOT'] . "/local/lib/classes/$className.php";
});

CModule::AddAutoloadClasses(
    '',
    ['CMpr' => '/local/php_interface/CMpr.php'
        , 'GmiClass' => '/local/php_interface/Configurator/conf_3_before_save.php'
        , 'EConfigIntConst' => '/local/php_interface/Configurator/EConfigIntConst.php'
    ],
);

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", array("GmiClass", "GmiOnBeforeIBlockElement"));
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", array("GmiClass", "GmiOnBeforeIBlockElement"));

//function short class call
function mpr()
{
    CMpr::getInstance(func_get_args())
//    ->isTest()
//    ->noClear()
//    ->setMargin(10)
//    ->showClassParameters()
//    ->setColorSheme(
//        [
//            'title_background' => '#DDD',
//            'title_text'       => '#000',
//            'body_background'  => '#282c34',
//            'body_text'        => '#abb2bf',
//            'array'            => '#e06c75',
//            'object'           => '#c678dd',
//            'class_method'     => '#61afef',
//            'class_var'        => '#61afef',
//            'error'            => '#e06c75',
//            'string'           => '#61afef',
//            'integer'          => '#98c379',
//            'double'           => '#98c379',
//            'boolean'          => '#d19a66',
//            'NULL'             => '#d19a66',
//        ]
//    )
        ->init();
}

if (!function_exists('consoleLog')) {
    function consoleLog($var)
    {
        echo '<script>console.log(' . json_encode($var, JSON_PARTIAL_OUTPUT_ON_ERROR) . ')</script>';
    }
}
if (!function_exists('clog')) {
    function clog(...$vars): void
    {
        foreach ($vars as $var) {
            $what = (is_array($var) || is_object($var)) ? json_encode($var, JSON_PARTIAL_OUTPUT_ON_ERROR) : '"' . $var . '"';
            if (json_last_error_msg()) {
                ?>
                <script type='text/javascript'>console.log('<?=json_last_error_msg()?>');</script><?
            } // Print out the error if any
            ?>
            <script type='text/javascript'>console.log(<?=$what?>);</script><?
        }
    }
}

function my_onBeforeResultAdd($WEB_FORM_ID, &$arFields, &$arrVALUES)

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
    if ($WEB_FORM_ID == '10') {
        // форма "Обсудить с ИТ-экспертом"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[98] = $arrVALUES['form_textarea_28'];
        $PROP[99] = $arrVALUES['form_text_24'];
        $PROP[100] = $arrVALUES['form_text_25'];
//        $PROP[101] = $arrVALUES['form_textarea_27'];
        $PROP[471] = $arrVALUES['form_hidden_101'];
        $PROP[472] = $arrVALUES['form_hidden_102'];
        $PROP[473] = $arrVALUES['form_hidden_103'];
        $PROP[474] = $arrVALUES['form_hidden_104'];
        $PROP[475] = $arrVALUES['form_hidden_105'];
        $PROP[476] = $arrVALUES['form_hidden_106'];
        $PROP[477] = $arrVALUES['form_hidden_107'];
        $PROP[640] = $arrVALUES['form_email_157'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 21,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);

        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_108'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '3') {
        // форма "коммерческое предложение"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[96] = $arrVALUES['form_text_5'];
        $PROP[97] = $arrVALUES['form_text_6'];
        $PROP[442] = $arrVALUES['form_hidden_66'];
        $PROP[443] = $arrVALUES['form_hidden_67'];
        $PROP[444] = $arrVALUES['form_hidden_68'];
        $PROP[445] = $arrVALUES['form_hidden_69'];
        $PROP[446] = $arrVALUES['form_hidden_70'];
        $PROP[447] = $arrVALUES['form_hidden_71'];
        $PROP[448] = $arrVALUES['form_hidden_72'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 20,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);

        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_74'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '9') {
        // форма "Нужно больше информации"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[102] = $arrVALUES['form_text_21'];
        $PROP[103] = $arrVALUES['form_text_22'];
        $PROP[457] = $arrVALUES['form_hidden_84'];
        $PROP[458] = $arrVALUES['form_hidden_85'];
        $PROP[459] = $arrVALUES['form_hidden_86'];
        $PROP[460] = $arrVALUES['form_hidden_87'];
        $PROP[461] = $arrVALUES['form_hidden_88'];
        $PROP[462] = $arrVALUES['form_hidden_89'];
        $PROP[463] = $arrVALUES['form_hidden_90'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 22,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);
        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_92'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '1') {
        // форма "заказать звонок"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[109] = $arrVALUES['form_text_1'];
        $PROP[110] = $arrVALUES['form_text_2'];
        $PROP[434] = $arrVALUES['form_hidden_55'];
        $PROP[435] = $arrVALUES['form_hidden_58'];
        $PROP[436] = $arrVALUES['form_hidden_59'];
        $PROP[437] = $arrVALUES['form_hidden_60'];
        $PROP[438] = $arrVALUES['form_hidden_61'];
        $PROP[439] = $arrVALUES['form_hidden_62'];
        $PROP[440] = $arrVALUES['form_hidden_63'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 23,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);

        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_65'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '5') {
        // форма "Обсудить проект с системным архитектором"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[113] = $arrVALUES['form_text_7'];
        $PROP[114] = $arrVALUES['form_text_8'];
        $PROP[450] = $arrVALUES['form_hidden_75'];
        $PROP[451] = $arrVALUES['form_hidden_76'];
        $PROP[452] = $arrVALUES['form_hidden_77'];
        $PROP[453] = $arrVALUES['form_hidden_78'];
        $PROP[454] = $arrVALUES['form_hidden_79'];
        $PROP[455] = $arrVALUES['form_hidden_80'];
        $PROP[456] = $arrVALUES['form_hidden_81'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 25,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);
        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_83'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '13') {
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

        $el = new CIBlockElement;
        $PROP = array();
        $PROP[115] = $arrVALUES['form_text_38'];
        $PROP[116] = $arrVALUES['form_text_39'];
        $PROP[117] = $arrVALUES['form_text_40'];
        $PROP[118] = $arrVALUES['form_text_41'];
        $PROP[119] = $arrVALUES['form_text_42'];
        $PROP[478] = $arrVALUES['form_hidden_109'];
        $PROP[479] = $arrVALUES['form_hidden_110'];
        $PROP[480] = $arrVALUES['form_hidden_111'];
        $PROP[481] = $arrVALUES['form_hidden_112'];
        $PROP[482] = $arrVALUES['form_hidden_113'];
        $PROP[483] = $arrVALUES['form_hidden_114'];
        $PROP[484] = $arrVALUES['form_hidden_115'];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 26,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);
        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_116'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '14') {
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
        $el = new CIBlockElement;
        $PROP = [
            'NAME' => $arrVALUES['form_text_44'],
            'EMAIL' => $arrVALUES['form_email_45'],
            'PHONE' => $arrVALUES['form_text_46'],
            'INN' => $arrVALUES['form_text_47'],
            'TYPE' => $arrVALUES['form_text_48'],
            'SUM' => $arrVALUES['form_text_49'],
            'PERIOD' => $arrVALUES['form_text_50'],
        ];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 34,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        if (!$el->Add($arLoadProductArray)) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");
            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }
    } elseif ($WEB_FORM_ID == '11') {
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
        $el = new CIBlockElement;
        $PROP = [
            'EMAIL' => $arrVALUES['form_text_29'],
        ];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 39,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        if (!$el->Add($arLoadProductArray)) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");
            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }
    } elseif ($WEB_FORM_ID == '12') {
        // форма "Подготовим индивидуальное предложение для вас"
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
        $el = new CIBlockElement;

        $connect = '';
        switch ($arrVALUES['form_radio_SIMPLE_QUESTION_839']) {
            case '30':
                $connect = 46;
                break;
            case '51':
                $connect = 47;
                break;
            case '52':
                $connect = 48;
                break;
        }

        $PROP = [
            'NAME' => $arrVALUES['form_text_33'],
            'PHONE' => $arrVALUES['form_text_34'],
            'EMAIL' => $arrVALUES['form_email_153'],
            'CONNECT' => $connect,

        ];

        $PROP[464] = $arrVALUES['form_hidden_93'];
        $PROP[465] = $arrVALUES['form_hidden_94'];
        $PROP[466] = $arrVALUES['form_hidden_95'];
        $PROP[467] = $arrVALUES['form_hidden_96'];
        $PROP[468] = $arrVALUES['form_hidden_97'];
        $PROP[469] = $arrVALUES['form_hidden_98'];
        $PROP[470] = $arrVALUES['form_hidden_99'];
	    $PROP['COMMENT'] = $arrVALUES['form_textarea_35'];

        if ($arrVALUES['basket_id']) {
	        $elementId = $arrVALUES['basket_id'];
            $descr = '<h3>Корзина: </h3><p>-----</p>';
	        $res = CIBlockElement::GetProperty(40, $elementId, [], ["ID" => 651]);
	        while ($ob = $res->GetNext())
	        {
		        $descr .= $ob['VALUE']['TEXT'];
	        }

            $arrVALUES['form_hidden_159'] = html_entity_decode($descr, ENT_QUOTES, 'UTF-8');

            CIBlockElement::SetPropertyValuesEx(
		        $elementId
		        , 40
		        , $PROP
	        );
        } else {
	        $arLoadProductArray = array(
		        "IBLOCK_ID" => 40,
		        "PROPERTY_VALUES" => $PROP,
		        "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
		        "ACTIVE" => "Y",
	        );
	        $elementId = $el->Add($arLoadProductArray);
        }


        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");
            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_100'] = $elementId;
        }
    } elseif ($WEB_FORM_ID == '17') {
	    // форма "Подготовим индивидуальное предложение для вас" конфиг
	    CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
	    $el = new CIBlockElement;

	    $connect = '';
	    switch ($arrVALUES['form_radio_SIMPLE_QUESTION_839']) {
		    case '133':
			    $connect = 46;
			    break;
		    case '134':
			    $connect = 47;
			    break;
		    case '135':
			    $connect = 48;
			    break;
	    }
        //$config = json_decode($arrVALUES['form_hidden_151']);
	    $PROP = [
		    'NAME' => $arrVALUES['form_text_136'],
		    'PHONE' => $arrVALUES['form_text_137'],
		    'EMAIL' => $arrVALUES['form_email_147'],
		    'CONNECT' => $connect,
            'UTM_SOURCE' => $arrVALUES['form_hidden_139'],
            'UTM_TYPE' => $arrVALUES['form_hidden_140'],
            'UTM_MEDIUM' => $arrVALUES['form_hidden_141'],
            'UTM_CAMPAIGN' => $arrVALUES['form_hidden_142'],
            'UTM_CONTENT' => $arrVALUES['form_hidden_143'],
            'UTM_TERM' => $arrVALUES['form_hidden_144'],
            'FILL_URL' => $arrVALUES['form_hidden_145'],
            'WARRANTY' => $arrVALUES['form_hidden_148'],
            'LEASING' => $arrVALUES['form_hidden_149'],
            'INN' => $arrVALUES['form_hidden_150'],
            'PRICE' => $arrVALUES['form_hidden_154'],
            'PLATFORM' => $arrVALUES['form_hidden_151'],
	    ];


	    $arLoadProductArray = array(
		    "IBLOCK_ID" => 40,
            "IBLOCK_SECTION_ID" => 476,
		    "PROPERTY_VALUES" => $PROP,
		    "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
		    "ACTIVE" => "Y",
		    'PREVIEW_TEXT' => $arrVALUES['form_textarea_138'], //чем дополнить конфиг
		    'DETAIL_TEXT' => $arrVALUES['form_hidden_152'], // список опций
            'DETAIL_TEXT_TYPE' => 'html'
	    );

	    $elementId = $el->Add($arLoadProductArray);
	    if (!$elementId) {
		    // Добавляем запись об ошибке в лог
		    AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");
		    // Записываем информацию об ошибке в файл
		    $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
		    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
	    }

	    if ($elementId) {
		    // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
		    $arrVALUES['form_hidden_146'] = $elementId;
	    }
    } elseif ($WEB_FORM_ID == '15') {
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
        $el = new CIBlockElement;

        $PROP = [
            'NAME' => $arrVALUES['form_text_53'],
            'PHONE' => $arrVALUES['form_text_54'],
        ];

        $arLoadProductArray = array(
            "IBLOCK_ID" => 44,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        if (!$el->Add($arLoadProductArray)) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");
            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }
    } elseif ($WEB_FORM_ID == '16') {
        CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков
        $tasksName = [
            'value1' => 'name1_',
            'value2' => 'name2_',
            'value3' => 'name3_',
            'value4' => 'name4_',
            'value5' => 'name5_',
            'value6' => 'name6_',
            'value7' => 'name7_',
            'value8' => 'name8_',
            'value9' => 'name9_',
            'value10' => 'name10_',
            'value11' => 'name11_',
            'value12' => 'name12_',
        ];

        $tasksValue = [
            'value1' => 'Сервер виртуализации',
            'value2' => 'Сервер для видеонаблюдения',
            'value3' => 'Сервер баз данных',
            'value4' => 'Серверы с GPU',
            'value5' => 'Серверы для анализа данных',
            'value6' => 'Серверы для машинного обучения',
            'value7' => 'Терминальный сервер',
            'value8' => 'Почтовый сервер',
            'value9' => 'Серверы для проектирования и моделирования (CAD/CAM/BIM/3D).',
            'value10' => 'Серверы для IP-телефонии',
            'value11' => 'Серверы для хостинга (Web-серверы)',
            'value12' => 'Сервер для 1С',
        ];

        $el = new CIBlockElement;
        $PROP = array();
        $PROP['NAME'] = $arrVALUES['form_text_117'];
        $PROP['EMAIL'] = $arrVALUES['form_email_118'];
        $PROP['PHONE'] = $arrVALUES['form_text_119'];
        $PROP['COMPANY'] = $arrVALUES['form_text_120'];
        $PROP['MANUFACTURERS'] = $arrVALUES['form_text_121'];
        $PROP['MARK'] = $arrVALUES['form_text_122'];
        $PROP['UTM_SOURCE'] = $arrVALUES['form_hidden_125'];
        $PROP['UTM_TYPE'] = $arrVALUES['form_hidden_126'];
        $PROP['UTM_MEDIUM'] = $arrVALUES['form_hidden_127'];
        $PROP['UTM_CAMPAIGN'] = $arrVALUES['form_hidden_128'];
        $PROP['UTM_CONTENT'] = $arrVALUES['form_hidden_129'];
        $PROP['UTM_TERM'] = $arrVALUES['form_hidden_130'];
        $PROP['FILL_URL'] = $arrVALUES['form_hidden_131'];
        $PROP['COMMENT'] = $arrVALUES['form_textarea_156'];
        $PROP['TASK'] = $arrVALUES['form_textarea_158'];

        if(!empty($arrVALUES['task'])){
            foreach ($arrVALUES['task'] as $k => $task){
                foreach ($arrVALUES as $key => $item){
                    if(strpos($key, $tasksName[$task]) !== false){
                        if(empty($PROP['TASKS'][$k])){
                            $PROP['TASKS'][$k] = 'Задача: ' . $tasksValue[$task] . "\n";
                            $PROP['TASKS'][$k] .= $item . "\n";
                        }else{
                            $PROP['TASKS'][$k] .= $item . "\n";
                        }
                    }
                }
            }
        }

        $arLoadProductArray = array(
            "IBLOCK_ID" => 53,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
            "ACTIVE" => "Y",
        );

        $elementId = $el->Add($arLoadProductArray);
        if (!$elementId) {
            // Добавляем запись об ошибке в лог
            AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

            // Записываем информацию об ошибке в файл
            $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
        }

        if ($elementId) {
            // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
            $arrVALUES['form_hidden_132'] = $elementId;
        }
    } else if ($WEB_FORM_ID == '18') { //comment
	    CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

	    $el = new CIBlockElement;
	    $PROP = array();
	    $PROP['USER_NAME'] = $arrVALUES['form_text_163'];
	    $PROP['COMMENT'] = $arrVALUES['form_textarea_166'];
	    $PROP['EMAIL'] = $arrVALUES['form_email_165'];
	    $PROP['REPLY_BY_MAIL'] = $arrVALUES['form_hidden_176'];
	    $PROP['RATING'] = $arrVALUES['form_hidden_177'];
	    $PROP['BLOG'] = $arrVALUES['blog_id'];
	    $PROP['UTM_SOURCE'] = $arrVALUES['form_hidden_167'];
	    $PROP['UTM_TYPE'] = $arrVALUES['form_hidden_168'];
	    $PROP['UTM_MEDIUM'] = $arrVALUES['form_hidden_169'];
	    $PROP['UTM_CAMPAIGN'] = $arrVALUES['form_hidden_170'];
	    $PROP['UTM_CONTENT'] = $arrVALUES['form_hidden_171'];
	    $PROP['UTM_TERM'] = $arrVALUES['form_hidden_172'];

	    $arLoadProductArray = array(
		    "IBLOCK_ID" => EIdIntConst::IB_COMMENTS->value,
		    "PROPERTY_VALUES" => $PROP,
		    "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
		    "ACTIVE" => "Y",
            "ACTIVE_FROM" => date("d.m.Y"),
	    );

	    $elementId = $el->Add($arLoadProductArray);
	    $res = CIBlockElement::GetProperty(EIdIntConst::IB_BLOG->value,$arrVALUES['blog_id'],[],['CODE'=>'RATINGS']);
	    while ($ar = $res->fetch()) {
		    if ($ar['VALUE']) $arRate[] = $ar['VALUE'];
	    }
	    $arRate[] = $arrVALUES['form_hidden_177'];
	    CIBlockElement::SetPropertyValuesEx(
		    $arrVALUES['blog_id']
		    , EIdIntConst::IB_BLOG->value
		    , ["RATINGS" => $arRate]
	    );
	    if ($elementId) {
		    // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
		    $arrVALUES['form_hidden_174'] = $elementId;
	    }
        $arrVALUES['form_hidden_176'] = $arrVALUES['form_hidden_176'] == 1 ? "Да" : "Нет";
    } else if ($WEB_FORM_ID == '19') { // get analog
	    CModule::IncludeModule("iblock"); // Подключаем модуль инфоблоков

	    $el = new CIBlockElement;
	    $PROP = array();
	    $PROP['NAME'] = $arrVALUES['form_text_178'];
	    $PROP['PHONE'] = $arrVALUES['form_text_179'];
	    $PROP['DESCRIPTION_TASK'] = $arrVALUES['form_textarea_181'];
	    $PROP['EMAIL'] = $arrVALUES['form_email_180'];
        $PROP['PROD_NAME'] = $arrVALUES['form_hidden_191'];

        $PROP['UTM_SOURCE'] = $arrVALUES['form_hidden_183'];
	    $PROP['UTM_TYPE'] = $arrVALUES['form_hidden_184'];
	    $PROP['UTM_MEDIUM'] = $arrVALUES['form_hidden_185'];
	    $PROP['UTM_CAMPAIGN'] = $arrVALUES['form_hidden_186'];
	    $PROP['UTM_CONTENT'] = $arrVALUES['form_hidden_187'];
	    $PROP['UTM_TERM'] = $arrVALUES['form_hidden_188'];


	    $arLoadProductArray = array(
		    "IBLOCK_ID" => 21,
            "IBLOCK_SECTION_ID" => 594,
		    "PROPERTY_VALUES" => $PROP,
		    "NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
		    "ACTIVE" => "Y",
	    );

	    $elementId = $el->Add($arLoadProductArray);

	    if (!$elementId) {
		    // Добавляем запись об ошибке в лог
		    AddMessage2Log("Ошибка при добавлении элемента: " . $el->LAST_ERROR, "my_module");

		    // Записываем информацию об ошибке в файл
		    $errorLog = date("Y-m-d H:i:s") . " - Ошибка при добавлении элемента: " . $el->LAST_ERROR . "\n";
		    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/error_log.txt', $errorLog, FILE_APPEND);
	    }

	    if ($elementId) {
		    // добавляем id элемента инфоблока, для формирования ссылки на элемент инфоблока в письме
		    $arrVALUES['form_hidden_190'] = $elementId;
	    }
    }
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
//Google recaptcha
//include $_SERVER['DOCUMENT_ROOT'] . "/local/lib/rush/recaptcha.php";
AddEventHandler('form', 'onBeforeResultAdd', 'my_onBeforeResultAdd');

function dump($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

//Redirects
include $_SERVER['DOCUMENT_ROOT'] . "/local/lib/rush/redirects.php";

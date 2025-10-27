<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

spl_autoload_register(function($class_name){
	include $_SERVER['DOCUMENT_ROOT']."/local/lib/classes/$class_name.php";
	include $_SERVER['DOCUMENT_ROOT']."/local/lib/classes/Configurator/$class_name.php";
	include $_SERVER['DOCUMENT_ROOT']."/local/php_interface/Configurator/$class_name.php";
});


$partNumber = GarbageStorage::get('config_sku');
$configData = CDataHarvester::HarvestConfigData($partNumber);
$optionsData = COptionsHarvester::Harvest($configData[$partNumber]['P']);
$arInstalled = array_column($optionsData['options'], 'INS');
$this->SetViewTarget('config-short-specs');
echo CDataConstructor::genConfShortSpecs($arInstalled, true);
$this->EndViewTarget();
$price = $configData[$partNumber]['F']['PRICE_1'];
$name = $configData[$partNumber]['F']['NAME'];
$avail = CDataModifier::QtyToStrValues(
    $configData[$partNumber]['F']['QUANTITY']
    , strDeliveryTime: $configData[$partNumber]['P']['DELIVERY_TIME']['VALUE'] ?? ''
)['text'];
$priceFormatted = CDataModifier::PriceFormat($configData[$partNumber]['F']['PRICE_1'], false);
//ob_start();
$optionsData['js_data']['props'] = [
    'is_platform' => $configData[$partNumber]['P']['CHASSIS_NOCPU']['VALUE']
    ,'base_price' => $price
    ,'name' => $name
];
$this->__component->arResult["CACHED_TPL"] = $optionsData['js_data'];
//ob_get_clean();

//$arIns = array_column($optionsData['options'], "INS");
//clog($optionsData);
$arWarranty = [
    '1' => '1 год'
    ,'3' => '3 года'
    ,'5' => '5 лет'
];
$warrantyValue = $configData[$partNumber]['P']['WARRANTY']['VALUE'] ?? '1';
preg_match("/(сервер|схд)/ui", $name, $m);
$productType = $m ? mb_strtolower($m[0]) : "";
$previewTitle = match ($productType) {
	'сервер' => 'Ваш сервер',
	'схд' => 'Ваша СХД',
	default => 'Ваш продукт'
};
$this->SetViewTarget('config-warranty');
echo $arWarranty[$warrantyValue];
$this->EndViewTarget();
?>



	<form id="config_form" data-form="config">
		<!-- get-id = Уникальный id товара-рандомное число со скрипта -->
		<div class="ware-config solution-config" data-shop-item-get-id="<?=$configData[$partNumber]['F']['ID'];?>" data-shop-item-get-type="config">
			<div class="solution-config__inputs">
				<?
				COptionPrinter::PrintAll($optionsData['options']);
				?>
                <div class="ware-config__label"><b>Гарантия:</b> <span data-shop-item-get="warranty"><?=$arWarranty[$warrantyValue];?></span></div>
                <div class="request">
                    <div class="request__content">
                        <h3>:( Нет нужного процессора или дисков?</h3>
                        <span>Отправьте запрос и получите КП с индивидуальным расчетом!</span>
                    </div>
                    <span class="btn btn_large btn_outlined">
                        <span class="children">Отправить запрос</span>
                        <a href="#tender" class="cover popup-link"></a>
                    </span>
                </div>
            </div>
            <div id="config_form-add" class="solution-config__server">
                <div class="solution-config__preview">
                    <h3><?=$previewTitle;?>:</h3>
                    <div class="solution-config__task">
                        <h4 data-shop-item-get="title"><?=$name;?></h4>
                        <div class="solution-config__task-desc" data-shop-item-get="description">

                            <ul>
                                <?
                                foreach ($optionsData['options'] as $type => $arProps){
                                    if (isset($arProps['INS'])) {
	                                    foreach ($arProps['INS'] as $arProp){
		                                    $name = $arProp['S_NAME'] ?? $arProp["NAME"];
		                                    echo "<li data-type='$type'>";
                                            if (!in_array($type, ['CON', 'RPS_storage', 'CONP'])) {
	                                            echo "<span class='prop-cnt'>$arProp[CNT]</span> x ";
                                            }
                                            echo "<span class='prop-name'>$name</span>
                                            </li>";
	                                    }
                                    }
	                                if ($arProps['LIST_CNT'] > 0 || $arProps['MAX'] > 1) {
		                                echo "<li class='template' data-type='$type'>
                                            <span class='prop-cnt'></span> x 
                                            <span class='prop-name'></span>
                                            </li>";
                                    }
                                }
                                ?>
                            </ul>


                        </div>
                    </div>
                </div>
                <div class="solution-config__main">

                    <div class="solution-config__value">
                        <div class="solution-config__score">
                            <div class="solution-config__price" data-cur_price="<?=$price;?>">
                                <h4 data-shop-item-get="price"><?=$priceFormatted;?></h4>
                                <span>включая НДС 20%</span>
                            </div>
                            <div class="solution-config__attention _disabled">
                                !!! Цена некоторых комплектующих неизвестна
                            </div>
                        </div>
                        <div class="solution-config__place" data-shop-item-get="delivery"><?=$avail;?></div>
                    </div>

                    <div class="solution-config__time">
                        <div class="form-group input-radio ">

                            <label>Срок гарантии с выездом по месту установки
                                <!--<div class="tip">
                                    <div class="tip__image">
                                        <img src="<?php /*=SITE_TEMPLATE_PATH */?>/files/icons/question.svg" alt="#">
                                    </div>
                                    <div class="tip__text">
                                        Подсказка текста
                                    </div>
                                </div>-->
                            </label>

                            <div class="input-radio__list">
                                <?
                                foreach ($arWarranty as $k => $v) {
                                    ?>
                                    <div class="input-radio__item">
                                        <input type="radio" name="time" value=<?="$k"; if($k==$warrantyValue) echo " checked";?>>
                                        <div class="input-radio__button">
                                            <span></span>
                                            <h4><?=$v;?></h4>
                                        </div>
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="solution-config__leasing">
                        <div class="form-group input-range ">
                            <div class="input-range__preview">


                                <div class="form-group checkbox-container">


                                    <label class="checkbox">
                                        <input class="form-control" name="leasing-agree"
                                               data-type="checkbox" type="checkbox">
                                        <span class="checkbox__label">Включить в КП лизинг<span id="checked-leasing-val" class="_hidden"> — <b><span>12</span> мес</b></span></span>
                                        <span class="custom-checkbox"></span>
                                    </label>


                                </div>

                                <div class="input-range__wrapper _hidden">
                                    <input class="form-control" name="leasing" required
                                           value="12" min="6" max="84" step="1"
                                           data-type="range" type="range">
                                    <div class="input-range__captions">

                                        <span>6 мес</span>

                                        <span>84 мес</span>

                                    </div>
                                </div>
                                <div class="input-inn__wrapper _hidden">
                                    <p class="label">Введите ваш ИНН:</p>
                                    <input type="text" name="inn_input" id="inn_input" value="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Для блокировки добавить класс _disabled-->
                    <button class="btn btn_large btn_primary" type="submit">

                        <span class="children">Получить КП с индивидуальной скидкой</span>
                        <a id="config_form_submit-link" href="#choose-config" class="cover popup-link"></a>
                    </button>
                    <button data-shop-item="btn" class="solution-config__link-shop">
                        <span>Добавить в корзину</span>
                        <span>Добавлено в корзину</span>
                    </button>
                </div>
            </div>
		</div>
	</form>
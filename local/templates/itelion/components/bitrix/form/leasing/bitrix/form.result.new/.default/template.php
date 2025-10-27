<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//mpr($arResult['QUESTIONS']);
$inputPhone = str_replace('type="text"', 'type="tel"', $arResult['QUESTIONS']['SIMPLE_QUESTION_625']['HTML_CODE']);
$leasingNumber = str_replace('type="text"', 'type="number"', $arResult['QUESTIONS']['SIMPLE_QUESTION_775']['HTML_CODE']);
$sum = str_replace('type="text"', 'type="range"', $arResult['QUESTIONS']['SIMPLE_QUESTION_276']['HTML_CODE']);
$period = str_replace('type="text"', 'type="range"', $arResult['QUESTIONS']['SIMPLE_QUESTION_927']['HTML_CODE']);
?>

<?
$strFormClass = '';
if ($arResult["isFormNote"] == "Y"):
	$strFormClass = ' _success';
	$arValues = CFormResult::GetDataByIDForHTML($_REQUEST['RESULT_ID'], "N");
	//clog($arValues);
    ?>
    <script>
		ym(13396396,'reachGoal','form.send');
    </script>
<? endif;?>
<div class="configuration-steps__form<?=$strFormClass;?>" id="leasing-form" data-form-info>
<?=$arResult["FORM_HEADER"]?>
<div class="configuration-steps__form--wrapper">
    <div class="configuration-steps__preview">
        <h2><?= $arResult['FORM_TITLE']?></h2>
        <div class="configuration-steps__inputs">
            <div class="form-group input__container input__container_text ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_903']['HTML_CODE']?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_903']['CAPTION']?></span>
            </div>
            <div class="form-group input__container input__container_email ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_984']['HTML_CODE']?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_984']['CAPTION']?></span>
            </div>
            <div class="form-group input__container input__container_phone">
				<?= $inputPhone ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_625']['CAPTION']?></span>
            </div>
            <div class="form-group input__container input__container_number ">
				<?= $leasingNumber ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_775']['CAPTION']?></span>
            </div>
            <div class="form-group input__container input__container_text ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_181']['HTML_CODE']?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_181']['CAPTION']?></span>
            </div>
        </div>
        <div class="form-group input-range input-range_white">
            <div class="input-range__preview">
                <label class="input-range__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_276']['CAPTION']?></label>
                <div class="input-range__wrapper">
					<?= $sum ?>
                    <div class="input-range__captions">
                        <span>от 100 000 ₽</span>
                        <span>до 100 000 000 ₽</span>
                    </div>
                </div>
            </div>
            <input class="form-control input-range_white" placeholder="Введите сумму сделки" required value="25000000" min="100000" max="100000000" step="100000" data-type="number" type="number">
        </div>
        <div class="form-group input-range input-range_white">
            <div class="input-range__preview">
                <label class="input-range__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_927']['CAPTION']?></label>
                <div class="input-range__wrapper">
					<?= $period ?>
                    <div class="input-range__captions">
                        <span>от 6 мес</span>
                        <span>до 84 мес</span>
                    </div>
                </div>
            </div>
            <input class="form-control input-range_white" placeholder="Введите срок лизинга" required value="12" min="6" max="84" step="1" data-type="number" type="number">
        </div>
    </div>
    <div class="configuration-steps__btn">
        <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
        <!--Для блокировки добавить класс _disabled-->
	    <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
        <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                value="<?= $arResult['arForm']['BUTTON'] ?>">
            <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
        </button>
    </div>
</div>
<?=$arResult["FORM_FOOTER"]?>
<div class="configuration-steps__output">
	<div class="configuration-steps__output--wrapper">
		<h2>Получить расчет на лизинг</h2>
		<div class="configuration-steps__output--content">
			<div class="configuration-steps__output--text">
				<p><span data-form-output="name"></span><?=$arValues['form_text_44'];?>, спасибо за ваш интерес!</p>
				<p>Ваш телефон: <span data-form-output="phone"><?=$arValues['form_text_46'];?></span></p>
				<p>Ваша почта: <span data-form-output="email"><?=$arValues['form_email_45'];?></span></p>
				<p>Инн получателя: <span data-form-output="leasing-number"><?=$arValues['form_text_47'];?></span></p>
				<p>Тип оборудования: <span data-form-output="type"><?=$arValues['form_text_48'];?></span></p>
				<p>Сумма сделки: <span data-form-output="sum"><?=$arValues['form_text_49'];?></span> руб</p>
				<p>Срок лизинга: <span data-form-output="period"><?=$arValues['form_text_50'];?></span> мес</p>
			</div>
			<div class="configuration-steps__output--text">
				<p>
					Если в данных ошибка, вы можете продублировать Ваш запрос на почту <a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
				</p>
			</div>
			<div class="configuration-steps__output--text">
				<p>
					Мы свяжемся с вами в ближайшее время!<br>
					С заботой, команда ITELON
				</p>
			</div>
			<div class="configuration-steps__output--contacts">
				<div class="configuration-steps__output--phones">
					<p>
						<a href="tel:+74955103335">+7 495 510 3335</a><br>
						<a href="tel:88005055110">8 (800) 505-51-10</a> - бесплатно по России<br>
						<a href="tel:+79891053335">+7 989 105 33 35</a> (WhatsApp, Telegram)
					</p>
				</div>
				<div class="configuration-steps__output--links">
					<p>
						<a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
						|
						<a href="/">https://itelon.ru</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

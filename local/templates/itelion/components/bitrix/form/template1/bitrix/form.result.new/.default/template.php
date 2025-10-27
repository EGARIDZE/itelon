<?// заказать звонок
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

?>

<? if ($arResult["isFormNote"] == "Y"): ?>
    <script>
        document.querySelector('#successful-submission-form').classList.add('_open')
        // document.querySelector('body').classList.remove('_lock')
		ym(13396396,'reachGoal','form.send');
		ym(13396396,'reachGoal','send-form-zvonok');
    </script>
<? endif ?>
<div class="lock-padding popup popup-form" id="callback">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__wrapper"
                 style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/callback.png');">
				<?= $arResult["FORM_HEADER"] ?>
                <div class="popup-form__wrapper">
                    <div class="popup-form__preview">
                        <h2><?= $arResult['FORM_TITLE'] ?></h2>
                        <p>Заполните форму и наш менеджер перезвонит <br>вам в течение нескольких минут</p>
                    </div>
                    <div class="popup-form__form">
                        <div class="form-group input__container input__container_text ">
							<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_702']['HTML_CODE'] ?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_702']['CAPTION'] ?></span>
                        </div>

                        <div class="form-group input__container input__container_phone">
							<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_554']['HTML_CODE'] ?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_554']['CAPTION'] ?></span>
                        </div>
                        <div class="popup-form__btns">
                            <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                            <!--Для блокировки добавить класс _disabled-->
	                        <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
                            <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                                    value="<?= $arResult['arForm']['BUTTON'] ?>">
                                <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
                            </button>
                        </div>
                    </div>

					<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
						<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden'): ?>
							<?= $arQuestion["HTML_CODE"] ?>
						<? endif ?>
					<? endforeach; ?>
                </div>
				<?= $arResult["FORM_FOOTER"] ?>
            </div>
            <span class="popup__close close-btn">
				<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/popup-close.svg" alt="#">
			</span>
        </div>
    </div>
</div>
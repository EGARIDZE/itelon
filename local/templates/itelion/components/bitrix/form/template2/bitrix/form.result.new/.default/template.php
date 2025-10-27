<?// КП билборд на глагне
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<? if ($arResult["isFormNote"] == "Y"): ?>
    <script>
        document.querySelector('#successful-submission-form').classList.add('_open');
				var lockPaddingValue = window.innerWidth - document.body.offsetWidth + 'px';
        document.body.style.paddingRight = lockPaddingValue;
        document.querySelector('body').classList.add('_lock');
		ym(13396396,'reachGoal','form.send');
    </script>
<? endif; ?>
<section class="section">
    <div class="container">
        <div class="billboard" style="background-image: url('<?= SITE_TEMPLATE_PATH?>/files/images/billboard_kp.webp')">
            <div class="billboard__description">
                <h2><?= $arResult['FORM_TITLE'] ?></h2>
                <p>КП на серверы и СХД со склада — 1 час после общения <br> Индивидуальный расчет проекта под заказ — от 1 до 3 рабочих дней</p>
            </div>
            <div class="billboard__callback">
				<?= $arResult["FORM_HEADER"] ?>
                <div class="billboard__form">
                    <div class="billboard__inputs">
                        <div class="form-group input__container input__container_text ">
							<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_531']['HTML_CODE'] ?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_531']['CAPTION'] ?></span>
                        </div>
                        <div class="form-group input__container input__container_phone">
							<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_167']['HTML_CODE'] ?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_167']['CAPTION'] ?></span>
                        </div>
                        <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                        <!--Для блокировки добавить класс _disabled-->

                        <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                                value="<?= $arResult['arForm']['BUTTON'] ?>">
                            <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
                        </button>
                    </div>
	                <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
					<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
						<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden'): ?>
							<?= $arQuestion["HTML_CODE"] ?>
						<? endif ?>
					<? endforeach; ?>
                </div>
				<?= $arResult["FORM_FOOTER"] ?>
            </div>
        </div>
    </div>
</section>
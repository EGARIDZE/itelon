<?//Поможем сэкономить (в блоге)
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//mpr($arResult);
$inputPhone = str_replace('type="text"', 'type="tel"', $arResult['QUESTIONS']['SIMPLE_QUESTION_342']['HTML_CODE']);
?>

<? if ($arResult["isFormNote"] == "Y"):?>
    <script>
        document.querySelector('#successful-submission-form').classList.add('_open')
        // document.querySelector('body').classList.remove('_lock')
		ym(13396396,'reachGoal','form.send');
    </script>
<? endif;?>
<div class="lock-padding popup popup-form" id="catch" style="padding-right: 0px;">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__wrapper" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/catch.png');">
				<?=$arResult["FORM_HEADER"]?>
                <div class="popup-form__wrapper">
                    <div class="popup-form__preview">
                        <h2><?= htmlspecialchars_decode($arResult['FORM_TITLE'])?></h2>
                        <p><?= $arResult['FORM_DESCRIPTION']?></p>
                    </div>
                    <div class="popup-form__form">
                        <div class="form-group input__container input__container_text ">
							<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_358']['HTML_CODE']?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_358']['CAPTION']?></span>
                        </div>
                        <div class="form-group input__container input__container_phone">
							<!--TODO-ROMAN: во всех input с data-type="tel" minlength равен 18 -->
							<?= $inputPhone?>
                            <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_342']['CAPTION']?></span>
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
                </div>
				<?=$arResult["FORM_FOOTER"]?>
            </div>
            <span class="popup__close close-btn">
				<img src="<?= SITE_TEMPLATE_PATH ?>/files/icons/popup-close.svg" alt="close">
			</span>
        </div>
    </div>
</div>
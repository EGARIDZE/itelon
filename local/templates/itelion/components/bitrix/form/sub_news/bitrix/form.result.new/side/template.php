<?// подпишитесь на новости в листинге новостей/блога - боковая
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<? if ($arResult["isFormNote"] == "Y"): ?>
    <script>
        document.querySelector('#successful-submission-form').classList.add('_open');
				var lockPaddingValue = window.innerWidth - document.body.offsetWidth + 'px';
        document.body.style.paddingRight = lockPaddingValue;
        document.querySelector('body').classList.add('_lock');
		ym(13396396,'reachGoal','form.send');
    </script>
<?endif;?>
<div class="articles-form">
	<?=$arResult["FORM_HEADER"]?>
        <div class="articles-form__wrapper">
            <div class="articles-form__preview">
                <h2><?= $arResult['FORM_TITLE']?></h2>
            </div>
            <div class="articles-form__form">
                <div class="form-group input__container input__container_email">
	                <?= $arResult['QUESTIONS']['SIMPLE_QUESTION_825']['HTML_CODE']?>
                    <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_825']['CAPTION']?></span>
                </div>
                <div class="articles-form__btns">
					<?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
                    <!--Для блокировки добавить класс _disabled-->
                    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                    <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                            value="<?= $arResult['arForm']['BUTTON'] ?>">
                        <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
                    </button>
                </div>
            </div>
        </div>
	<?=$arResult["FORM_FOOTER"]?>
</div>
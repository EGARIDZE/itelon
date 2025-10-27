<?// боковая форма "заказать звонок" для детальных страниц решений
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//clog($arResult["isFormNote"]);
if ($arResult["isFormNote"] == 'Y') {
    ?>
    <script>
        document.querySelector('#successful-submission-form').classList.add('_open');
				var lockPaddingValue = window.innerWidth - document.body.offsetWidth + 'px';
        document.body.style.paddingRight = lockPaddingValue;
        document.querySelector('body').classList.add('_lock')
        ym(13396396,'reachGoal','form.send');
        ym(13396396,'reachGoal','send-form-zvonok');
    </script>
    <?
}
$arData = $arParams['FORM_TEXT'];
?>
<div class="articles__form">
        <div class="articles-form">
			<?=$arResult['FORM_HEADER'];?>
            <div class="articles-form__wrapper">
                <div class="articles-form__preview">
                    <h2><?=$arData['FORM_TEXT_TITLE']['VALUE']['TEXT']??'';?></h2>
                    <p>
		                <?=$arData['FORM_TEXT_DESCR']['VALUE']['TEXT']??'';?>
                    </p>
                </div>
                <div class="articles-form__form">
                    <div class="form-group input__container input__container_text ">
						<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_702']['HTML_CODE'] ?>
                        <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_702']['CAPTION'] ?></span>
                    </div>
                    <div class="form-group input__container input__container_phone">
						<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_554']['HTML_CODE'] ?>
                        <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_554']['CAPTION'] ?></span>
                    </div>
                    <div class="articles-form__btns">
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
    <div class="articles__form--link">
        <b>У вас особый случай?</b>
        <a href="#solution-event" class="link-scroll">Расскажите нам</a>
    </div>
    </div>
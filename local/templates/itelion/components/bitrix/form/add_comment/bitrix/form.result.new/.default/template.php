<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormNote"] == "Y") {
    ?>
     <script>
        $('.articles__comments').addClass('_success');
		ym(13396396,'reachGoal','form.send');
    </script>
    <?
} else {
    ?>
    <div class="articles-form" id="send-comment">
        <div class="articles-form__wrapper">
            <?=$arResult["FORM_HEADER"]?>
            <div class="articles-form__form">
                <div class="articles-rating" data-rating="rating">
                    <div class="articles-rating__body">
                        <p>Ваша оценка*</p>
                        <div class="articles-rating__items">
                            <div class="articles-rating__item _active" data-rating-value="1"></div>
                            <div class="articles-rating__item _active" data-rating-value="2"></div>
                            <div class="articles-rating__item _active" data-rating-value="3"></div>
                            <div class="articles-rating__item _active" data-rating-value="4"></div>
                            <div class="articles-rating__item _active" data-rating-value="5"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group textarea__container">
                    <?= $arResult['QUESTIONS']['COMMENT']['HTML_CODE']?>
                    <span class="textarea__label"><?= $arResult['QUESTIONS']['COMMENT']['CAPTION']?></span>
                </div>
                <div class="form-group input__container input__container_text">
                    <?= $arResult['QUESTIONS']['NAME']['HTML_CODE']?>
                    <span class="input__label"><?= $arResult['QUESTIONS']['NAME']['CAPTION']?></span>
                </div>
                <div class="articles-form__column">
                    <div class="form-group input__container input__container_email">
                        <?= $arResult['QUESTIONS']['EMAIL']['HTML_CODE']?>
                        <span class="input__label"><?= $arResult['QUESTIONS']['EMAIL']['CAPTION']?></span>
                    </div>
                    <p>Ваш адрес не будет опубликован или добавлен в рассылку</p>
                </div>

                <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
                <div class="billboard__policy">
                    <label class="checkbox policy-agr">
                        <input id="mail_checkbox" class="form-control" name="answer" type="checkbox" value="" />
                        <span class="checkbox__label_form"> <?= $arResult['QUESTIONS']['REPLY_BY_MAIL']['CAPTION']?> </span>
                        <span class="custom-checkbox"></span>
                    </label>
                </div>
                <div class="articles-form__btns">
                    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
                    <!--Для блокировки добавить класс _disabled-->
                    <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                        value="<?= $arResult['arForm']['BUTTON'] ?>">
                        <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
                    </button>
                </div>
            </div>
            <input name="blog_id" type="hidden" value="<?=$arParams['BLOG_ID'];?>" />
	        <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
		        <? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
			        <?= $arQuestion["HTML_CODE"] ?>
		        <? endif ?>
	        <? endforeach; ?>
            <?=$arResult["FORM_FOOTER"]?>
        </div>
    </div>
    <?
}
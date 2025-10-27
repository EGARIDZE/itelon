<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<? if ($arResult["isFormErrors"] == "Y"): ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>
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
<? endif; ?>
<section class="section" id="technical-support-form">
    <div class="container">
	<div class="support-request__form<?=$strFormClass;?>" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/support-request.webp')" data-form-info>
<?= $arResult["FORM_HEADER"] ?>
        <div class="support-request__form--wrapper">
            <div class="support-request__preview">
                <h2><?= $arResult['FORM_TITLE'] ?></h2>
                <p>Обратитесь к экспертам компании Itelon</p>
            </div>
            <div class="support-request__inputs">
                <div class="form-group input__container input__container_text ">
					<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_849']['HTML_CODE'] ?>
                    <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_849']['CAPTION'] ?></span>
                </div>

                <div class="form-group input__container input__container_email ">
					<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_705']['HTML_CODE'] ?>
                    <span class="input__label"> <?= $arResult['QUESTIONS']['SIMPLE_QUESTION_705']['CAPTION'] ?></span>
                </div>
            </div>
            <div class="support-request__inputs">
                <div class="form-group input__container input__container_phone">
					<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_530']['HTML_CODE'] ?>
                    <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_530']['CAPTION'] ?></span>
                </div>
                <div class="form-group input__container input__container_text ">
					<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_476']['HTML_CODE'] ?>
                    <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_476']['CAPTION'] ?></span>
                </div>

            </div>
            <div class="form-group input__container input__container_text ">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_852']['HTML_CODE'] ?>
                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_852']['CAPTION'] ?></span>
            </div>

            <div class="form-group textarea__container">
				<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_198']['HTML_CODE'] ?>
                <span class="textarea__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_198']['CAPTION'] ?></span>
            </div>
            <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">
            <!--Для блокировки добавить класс _disabled-->
	        <?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
            <button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit"
                    value="<?= $arResult['arForm']['BUTTON'] ?>">
                <span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
            </button>
			<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
				<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden'): ?>
					<?= $arQuestion["HTML_CODE"] ?>
				<? endif ?>
			<? endforeach; ?>
        </div>
		<?= $arResult["FORM_FOOTER"] ?>
	<div class="support-request__info">
				<div class="support-request__info--wrapper">
					<h2>Заявка на техничекую поддержку</h2>
					<div class="support-request__info--container">
						<div class="support-request__info--content">
                            <div class="support-request__info--text">
                                <div class="support-request__info--values">
                                    <p><span data-form-output="name"></span><?=$arValues['form_text_38'];?>, спасибо за ваш интерес!</p>
                                    <p>Ваш телефон: <span data-form-output="phone"><?=$arValues['form_text_40'];?></span></p>
                                    <p>Ваша почта: <span data-form-output="email"><?=$arValues['form_text_39'];?></span></p>
                                    <p>Номер счета, договора либо УПД: <span data-form-output="score"><?=$arValues['form_text_41'];?></span></p>
                                    <p>Серийный номер оборудования: <span data-form-output="number"><?=$arValues['form_text_42'];?></span></p>
                                    <p>Неисправность: <span data-form-output="fault"><?=$arValues['form_textarea_43'];?></span></p>
                                </div>
                                <div class="support-request__info--values">
                                    <p>
                                        Если в данных ошибка, вы можете продублировать Ваш запрос на почту <a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
                                    </p>
                                </div>
                                <div class="support-request__info--values">
                                    <p>
                                        Мы свяжемся с вами в ближайшее время!<br>
                                        С заботой, команда ITELON
                                    </p>
                                </div>
                            </div>
                            <div class="support-request__info--contacts">
                                <div class="support-request__info--phones">
                                    <p>
                                        <a href="tel:+74955103335">+7 495 510 3335</a><br>
                                        <a href="tel:88005055110">8 (800) 505-51-10</a> - бесплатно по России<br>
                                        <a href="tel:+79891053335">+7 989 105 33 35</a> (WhatsApp, Telegram)
                                    </p>
                                </div>
                                <div class="support-request__info--links">
                                    <p>
                                        <a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
                                        |
                                        <a href="/">https://itelon.ru</a>
                                    </p>
                                </div>
                            </div>
						</div>
						<div class="support-request__info--image">
							<picture><source srcset="/local/templates/itelion/files/images/support-request-image2025.webp" type="image/webp"><img src="/local/templates/itelion/files/images/support-request-image2025.png" alt="Заявка на техничекую поддержку"></picture>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>
</section>
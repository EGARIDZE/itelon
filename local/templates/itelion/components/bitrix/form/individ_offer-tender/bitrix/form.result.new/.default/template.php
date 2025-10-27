<?// получить КП
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//mpr($arResult['QUESTIONS']);
$inputPhone = str_replace('type="text"', 'type="tel"', $arResult['QUESTIONS']['SIMPLE_QUESTION_475']['HTML_CODE']);


$radioArray = explode('><', $arResult['QUESTIONS']['SIMPLE_QUESTION_839']['HTML_CODE']);
$radioInput = '<div class="choosing-social__item"><';
$radioInput .= $radioArray[1];
$radioInput .= '><button><img src="/local/templates/itelion/files/icons/tg.svg" alt="#"><span>Telegram</span></button></div><div class="choosing-social__item"><';
$radioInput .= $radioArray[6];
$radioInput .= '><button><img src="/local/templates/itelion/files/icons/whats.svg" alt="#"><span>Whatsapp</span></button></div><div class="choosing-social__item"><';
$radioInput .= $radioArray[11];
$radioInput .= '><button><img src="/local/templates/itelion/files/icons/mail.svg" alt="#"><span>E-mail</span></button></div>';

if ($arResult["isFormErrors"] == "Y") {
	clog($arResult["FORM_ERRORS_TEXT"]);
}

$strFormClass = '';

?>

<? if ($arResult["isFormNote"] == "Y"):
    $strFormClass = ' _success _open';
	$arValues = CFormResult::GetDataByIDForHTML($_REQUEST['RESULT_ID'], "N");
    $strSocial = match ($arValues['form_radio_SIMPLE_QUESTION_839']) {
        '30' => 'Telegram',
        '51' => 'Whatsapp',
        '52' => 'E-mail',
        default => 'Любой способ'
    };
    //clog($arValues);
    ?>
    <script>
        ym(13396396,'reachGoal','form.send');
    </script>
<? endif; ?>

<div class="lock-padding popup popup-form<?=$strFormClass;?>" id="tender" style="padding-right: 8px;" data-form-info>
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__wrapper" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/files/images/tender2025.webp');">
				<?= $arResult["FORM_HEADER"] ?>
                <div class="popup-form__wrapper">
                    <div class="popup-form__preview">
                        <h2><?= $arResult['FORM_TITLE'] ?></h2>
                    </div>
                    <div class="popup-form__form">
                        <div class="popup-form__socials">
                            <div class="choosing-social">
                                <h3><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_839']['CAPTION'] ?></h3>
                                <div class="choosing-social__list" data-form-input="social">
									<?= $radioInput?>
                                </div>
                            </div>
                        </div>
                            <div class="form-group input__container input__container_text ">
								<?= $arResult['QUESTIONS']['SIMPLE_QUESTION_598']['HTML_CODE'] ?>
                                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_598']['CAPTION'] ?></span>
                            </div>
                        <div class="popup-form__inputs">
                            <div class="form-group input__container input__container_phone">
								<?= $inputPhone ?>
                                <span class="input__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_475']['CAPTION'] ?></span>
                            </div>
                            <div class="form-group input__container input__container_email">
								<?= $arResult['QUESTIONS']['E_MAIL']['HTML_CODE'] ?>
                                <span class="input__label"><?= $arResult['QUESTIONS']['E_MAIL']['CAPTION'] ?></span>
                            </div>
                        </div>
                        <div class="form-group textarea__container">
                            <?= $arResult['QUESTIONS']['SIMPLE_QUESTION_182']['HTML_CODE'] ?>
                            <span class="textarea__label"><?= $arResult['QUESTIONS']['SIMPLE_QUESTION_182']['CAPTION'] ?></span>
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
						<div class="popup-form__info">
							<div class="popup-form__info--content">
								<div class="popup-form__info--text">
									<p><span data-form-output="name"></span><?=$arValues['form_text_33'];?>, спасибо за ваш запрос!</p>
									<p>Ваш телефон: <span data-form-output="phone"><?=$arValues['form_text_34'];?></span></p>
									<p>Ваша почта: <span data-form-output="email"><?=$arValues['form_email_153'];?></span></p>
									<p class="popup-form__info--comment">Комментарий: <span data-form-output="comment"><?=$arValues['form_textarea_35'];?></span></p>
									<p>Где вы хотите получить КП:
										<span data-form-output="social"><?=$strSocial;?></span>
									</p>
									<p class="popup-form__period">
										Срок поставки: ожидается <span>(2-4 недели)</span>
									</p>
								</div>
								<div class="popup-form__info--text">
									<p>
										Если в данных ошибка, вы можете продублировать Ваш запрос на почту <a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
									</p>
								</div>
								<div class="popup-form__info--text">
									<p>
										Мы свяжемся с вами в ближайшее время!<br>
										С заботой, команда ITELON
									</p>
								</div>
							</div>
							<div class="popup-form__info--contacts">
								<div class="popup-form__info--phones">
									<p>
										<a href="tel:+74955103335">+7 495 510 3335</a><br>
										<a href="tel:88005055110">8 (800) 505-51-10</a> - бесплатно по России<br>
										<a href="tel:+79891053335">+7 989 105 33 35</a> (WhatsApp, Telegram)
									</p>
								</div>
								<div class="popup-form__info--links">
                                    <p>
                                        ❤️ Обзоры серверов и СХД, бенчмарки и железные новости — больше в нашем <a href="https://t.me/itelon_servers" target="_blank">Telegram</a>
                                    </p>
									<p>
										<a href="mailto:sales@itelon.ru">sales@itelon.ru</a>
										|
										<a href="/">https://itelon.ru</a>
									</p>
								</div>
							</div>
						</div>
     </div>
				<?= $arResult["FORM_FOOTER"] ?>
            </div>
            <span class="popup__close close-btn">
				<img src="<?= SITE_TEMPLATE_PATH?>/files/icons/popup-close.svg" alt="#">
			</span>
        </div>
    </div>
</div>
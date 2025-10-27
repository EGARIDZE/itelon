<?// получить КП - новая корзина
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
?>
<? if ($arResult["isFormNote"] == "Y"):
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
        $.getScript('/local/lib/js/func.js', function () {
            resetBtnsArterSubmit();
            changeCountFull();
            updateBasketElement(localStorage.getItem('basketId'));
            localStorage.removeItem('basketId');
            clearLocalStorage();
        });

        document.querySelector('#successful-submission-form').classList.add('_open');
        ym(13396396,'reachGoal','form.send');
    </script>
<? endif; ?>
<div class="lock-padding popup popup-shop" id="shop">
	<div class="popup__body">
		<div class="container">
			<div class="popup__content">
				<div class="popup__wrapper">
					<div class="popup-shop__wrapper">
							<div class="popup-shop__close-mobile close-btn">
								Закрыть корзину
							</div>
						    <?= $arResult["FORM_HEADER"] ?>
								<div class="popup-shop__body">
									<div class="popup-shop__table popup-shop-table">
										<div class="popup-shop-table__wrapper" data-accordion="accordion">
											<!--Для показа добавляется класс _active -->
											<div class="popup-shop-table__title-mobile" data-accordion="title" data-shop="value">
												<div class="popup-shop-table__title-mobile--default">
													<span>Показать товаров <b data-shop="count">4</b> на сумму <b data-shop="fullprice">0 ₽</b></span>
												</div>
												<div class="popup-shop-table__title-mobile--opened">
													<span>Товаров <b data-shop="count">4</b> на сумму <b data-shop="fullprice">0 ₽</b></span>
												</div>
											</div>
											<!--Для показа добавляется класс _active -->
											<div class="popup-shop-table__title-mobile" data-accordion="title" data-shop="send">
												<div class="popup-shop-table__title-mobile--default">
													<span>Показать товаров <b data-shop="count">4</b></span>
												</div>
												<div class="popup-shop-table__title-mobile--opened">
													<span>Товаров <b data-shop="count">4</b></span>
												</div>
											</div>
											<div class="popup-shop-table__content" data-accordion="content">
												<div class="popup-shop-table__info">
													<div class="popup-shop-table__header">
														<div class="popup-shop-table__header--title"><span>Товар</span></div>
														<div class="popup-shop-table__header--title"><span>Кол-во</span></div>
														<div class="popup-shop-table__header--title"><span>Сумма (руб.), <br>вкл. НДС 20%</span></div>
													</div>
													<div class="popup-shop-table__list" data-shop="list">

													</div>
													<div class="popup-shop-table__footer">
														<div class="popup-shop-table__footer--title _active">
															<span>ИТОГО:</span>
														</div>
														<!--Для показа добавляется класс _active -->
														<div class="popup-shop-table__footer--title" data-shop="value">
															<span data-shop="fullprice"><b>0 ₽</b></span>
														</div>
														<!--Для показа добавляется класс _active -->
														<div class="popup-shop-table__footer--title" data-shop="send">
															<span>Пришлем КП&nbsp;с&nbsp;точным расчетом</span>
														</div>
														<input type="text" name="shop-fullprice" data-shop-fullprice="input" value="0" class="popup-shop-product__input">
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="popup-shop__form popup-shop-form">
										<div class="popup-form__preview">
											<h2>Оформить заказ</h2>
										</div>
										<div class="popup-shop-form__info">
											<!--Для показа добавляется класс _active -->
											<div class="popup-shop-form__value" data-shop="value">
												<div class="popup-shop-form__total">Итого заказ на сумму:</div>
												<div class="popup-shop-form__price" data-shop="fullprice">0 ₽</div>
												<div class="popup-shop-form__annotation">включая НДС 20%</div>
											</div>
											<!--Для показа добавляется класс _active -->
											<div class="popup-shop-form__value" data-shop="send">
												<div class="popup-shop-form__price">Пришлем КП&nbsp;с&nbsp;точным расчетом</div>
											</div>
											<div class="popup-shop-form__label">
												<img src="<?=SITE_TEMPLATE_PATH;?>/files/icons/car.svg" alt="Бесплатная доставка по России">
												<span>Бесплатная доставка по России</span>
											</div>
										</div>
										<div class="popup-form__form">
											<div class="popup-form__socials">
												<div class="choosing-social">
													<h3>Где вы хотите получить КП:</h3>
													<div class="choosing-social__list" data-form-input="social">
														<?= $radioInput?>
													</div>
												</div>
											</div>
											<div class="form-group input__container input__container_text">
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
												<?include $_SERVER['DOCUMENT_ROOT'].'/include/billboard-policy.php';?>
												<!--Для блокировки добавить класс _disabled-->
												<button class="btn btn_large btn_accent need-pp-agr" type="submit" name="web_form_submit" value="<?= $arResult['arForm']['BUTTON'] ?>">
													<span class="children"><?= $arResult['arForm']['BUTTON'] ?></span>
												</button>
											</div>
										</div>
									</div>
									<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
										<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden'): ?>
											<?= $arQuestion["HTML_CODE"] ?>
										<? endif ?>
									<? endforeach; ?>
                                    <input type="hidden" name="basket_id" value="">
								</div>
						    <?= $arResult["FORM_FOOTER"] ?>
					</div>
				</div>
				<span class="popup__close close-btn">
					<img src="<?= SITE_TEMPLATE_PATH?>/files/icons/popup-close.svg" alt="#">
				</span>
			</div>
		</div>
	</div>
</div>

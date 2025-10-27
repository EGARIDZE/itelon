$(document).ready(function(){

	// copy email, phone. Goal: copy_tel, copy_mail
	$('a[href^="tel:"]').on('copy', function () {  	
		ym(13396396,'reachGoal','copy_tel');
    });	
	$('a[href^="mailto:"]').on('copy', function () {  	
		ym(13396396,'reachGoal','copy_mail');
    });	
	
	// click email, phone. Goal: click_tel, click_mail
	$('a[href^="tel:"]').on('click', function () {  	
		ym(13396396,'reachGoal','click_tel');
    });	
	$('a[href^="mailto:"]').on('click', function () {  	
		ym(13396396,'reachGoal','click_mail');
    });		

	//buy one click. Goal: click_kupit
	$('.product-preview a[href^="#tender"], .ware__settings a[href^="#tender"]').on('click', function () {  	
		ym(13396396,'reachGoal','click_kupit');
    });	
	
	//configuration. Goal: click_skonfigurirovat
	$('.product-preview .btn-icon_config a, .ware__settings a[href^="#config_fold"]').on('click', function () {  	
		ym(13396396,'reachGoal','click_skonfigurirovat');
    });	
	
	//Goal: click_ostavit_zayvky
	$('.products-banner-new a[href^="#consultation"], .preview-banner a[href^="#consultation"]').on('click', function () {  	
		ym(13396396,'reachGoal','click_ostavit_zayvky');
    });		

	//Goal: click-button-kp
	$('.header__btns a[href^="#tender"], .request a[href^="#tender"], #config_form_submit-link').on('click', function () {  	
		ym(13396396,'reachGoal','click-button-kp');
    });	
	
	//Goal: click-button-zvonok
	$('.header__btns a[href^="#callback"], .contacts__btn a[href^="#callback"]').on('click', function () {  	
		ym(13396396,'reachGoal','click-button-zvonok');
    });	
	
	//Other coals in form templates
	
	//Recaptcha
	
	const siteKey = '6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa'; // ваш site key

    $('form').each(function () {
        const $form = $(this);
        const $recaptchaInput = $form.find('.g-recaptcha-response');
        let recaptchaExecuted = false;


        // При наведении — получаем токен заранее (необязательно)
        $form.find('button[type="submit"]').on('mouseover', function () {
            if (recaptchaExecuted) return;

            recaptchaExecuted = true;

            grecaptcha.ready(function () {
                grecaptcha.execute(siteKey, { action: 'feedback' })
                    .then(function (token) {
                        $recaptchaInput.val(token);
                        //console.log("Токен установлен предварительно:", token);
                    })
                    .catch(function (err) {
                        console.error("Ошибка предварительного запроса reCAPTCHA:", err);
                        recaptchaExecuted = false;
                    });
            });
        });
    });	
	
	
   $('body').on('click', 'form button[name="web_form_submit"]', function(){
   
		recaptcha_input = $(this).parents('.popup-form').parent().find('.g-recaptcha-response');
		 grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
   });	
   
   $('body').on('mouseover', 'form button[name="web_form_submit"]', function(){
		recaptcha_input = $(this).parents('.popup-form').parent().find('.g-recaptcha-response');
		grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
	});     
	
   $('body').on('click', '.configuration-steps form button[name="web_form_submit"]', function(){
   
		recaptcha_input = $(this).parent().find('.g-recaptcha-response');
		 grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
   });		
   
   $('body').on('mouseover', '.configuration-steps form button[name="web_form_submit"]', function(){
   
		recaptcha_input = $(this).parent().find('.g-recaptcha-response');
		 grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
   });	   
   
   $('body').on('click', 'form button[name="web_form_submit"]', function(){
   
		recaptcha_input = $(this).parent().find('.g-recaptcha-response');
		 grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
   });		   
   
   $('body').on('mouseover', 'form button[name="web_form_submit"]', function(){

   
		recaptcha_input = $(this).parent().find('.g-recaptcha-response');
		 grecaptcha.ready(function() {
		// do request for recaptcha token
		// response is promise with passed token
			grecaptcha.execute('6Lcc0RwrAAAAAJn7BsyNk36nUmQio7uxOleGsUCa', {action:'feedback'})
						.then(function(token) {
				recaptcha_input.val(token);
			});
		});        
   });	   
	
});

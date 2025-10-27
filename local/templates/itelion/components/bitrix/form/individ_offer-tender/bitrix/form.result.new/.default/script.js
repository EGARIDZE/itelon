/*
$(function (){
    const form = '#tender';
    const $phoneDiv = $('.input__container_phone', form);
    const $mailDiv = $('.input__container_email', form);
    const $mailInput = $('.input-email', form);
    const $phoneInput = $('.input-tel', form);
    const target = $('.choosing-social__list', form)[0];
    const config = {
        subtree: true,
        attributes: true,
        attributeFilter: ['checked'],
    };
    const observer = new MutationObserver(function (mutations) {
        //console.log(mutations);
        if (mutations.length > 0) {
            if (mutations[0].target.id === '52') {
                $phoneDiv.addClass('_hidden');
                $mailDiv.removeClass('_hidden');
                $mailInput.prop('required', true).attr('type', 'email');
                $phoneInput.prop('required', false).attr('type', 'hidden');
            } else {
                $phoneDiv.removeClass('_hidden');
                $mailDiv.addClass('_hidden');
                $mailInput.prop('required', false).attr('type', 'hidden');
                $phoneInput.prop('required', true).attr('type', 'tel');
            }
        }
    });
    observer.observe(target, config);
});*/

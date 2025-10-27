function copyHtmlDataToForm($obj) {
    let formId = '#basket';
    let name;
    let price;
    let description;
    let avail;
    let warranty;

    if ($obj.hasClass('buy-btn_cat')) { // детальная каталога
        let $basketInfo = $('#basket-desc');
        name = $basketInfo.data('name');
        price = $basketInfo.data('price');
        description = $basketInfo.html();
        avail = $basketInfo.data('avail');
        warranty = $basketInfo.data('warranty');

    } else if ($obj.hasClass('buy-btn_promo')) { // акция
        let $parent = $obj.closest('.sale-product');
        let $content = $parent.children('.sale-product__content');
        name = $content.find('.sale-product__title').text();
        price = $parent.find('.price').text();
        description = $content.find('.sale-product__description').html();

    } else { //карточка листинга
        let $parent = $obj.closest('.product-preview__description');
        name = $parent.find('.card-title').text();
        price = $parent.find('.product-preview__score').text();
        let code = $parent.data('model') || $parent.data('marker');
        let codeType = $parent.data('model') ? 'model' : 'marker';
        if (code) {
            $.post('/local/ajaxhandler/form_data.php',
                {
                    'form_data_basket_desc' : {
                        code_type : codeType,
                        code : code
                    }
                },
                function (response) {
                    $('.description', formId).html(response);
                }
            );
        } else {
            description = $parent.find('.card-description').html();
        }
        avail = $parent.prev().children('span').text();
        warranty = $parent.find('div[data-shop-item-get="warranty"]').text();
    }
    //console.log(warranty);
    price = price.replace(/^от /i, '');
    $('.name', formId).text(name);
    $('.price', formId).text(price);
    if(description) $('.description', formId).html(description);
    $('.avail', formId).text(avail);
    $('.warranty', formId).text(warranty ? 'Гарантия '+warranty : '');
}
BX.ready(function(){
    BX.bindDelegate(document.body, "click", {className: "basket-call"}, function() {
        localStorage.setItem('btn_index', $(this).index('.basket-call'));
        copyHtmlDataToForm($(this));
    });
    $('.header__banner', 'header').on('click', '.banner-close-btn', function(e) {
        $('.header__banner').hide();
				$('main').removeClass('_offset');
        $.ajax({
            url: '/local/ajaxhandler/set_cookie.php',
            type: 'post',
            data: {'hide-banner' : 'Y'},
            success: function (response) {
                // console.log(response);
            },
            error: function () {
                console.log("Произошла ошибка при отправке запроса.");
            }
        });
    });
    BX.bindDelegate(document.body, "click", {className: "need-pp-agr"}, function(e) {
        let $form = $(this).closest('form');
        let $checkbox = $form.find('input[name="policy"]');
        let $warning = $form.find('.policy-warning');
        let $basketInput = $form.find('input[data-basket]');
        if ($checkbox.is(':checked') === false) {
            e.preventDefault();
            // $(this).prev().slideDown('fast');
            $warning.fadeIn('slow');
        } else if ($form.attr('name') === 'individual_offer_config') {
            localStorage.setItem('config-form_data', $form.find('.popup-form__block').html());
        } else if ($basketInput.length > 0) {
            $form.find('input[name="basket_id"]').val(localStorage.getItem('basketId'));
        }
    });
    BX.bindDelegate(document.body, "change", {className: "policy-checkbox"}, function(e) {
        let $warning = $(this).parents('.billboard__policy').find('.policy-warning');
        // $(this).is(':checked') ? $warning.slideUp('fast') : $warning.slideDown('fast');
        $(this).is(':checked') ? $warning.fadeOut('fast') : $warning.fadeIn('slow');
    });

    $('body').on('click', 'a[href="#get_analog_form"]', function(e) {
        $('#get_analog_form').find('input[name="form_hidden_191"]').val($(this).data('name'));
        $('#get_analog_form').find('#analog_name').text($(this).data('name'));
    });
});
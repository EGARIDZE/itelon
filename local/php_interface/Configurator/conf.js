$(function(){
    let timeout;
    $('.add-more-btn').on('click', function () {
        $(this).prev().clone(true).insertBefore($(this));
        $(this).prev().find('input').val('');

        let row = $(this).prev();
        let sku = row.find('.input-sku');
        let cnt = row.find('.input-cnt');
        let skuName = sku.attr('name');
        let cntName = cnt.attr('name');
        let counter = +skuName.match(/n(\d)/)[1];
        sku.attr('name', skuName.replace(/n\d/, `n${counter+1}`));
        cnt.attr('name', cntName.replace(/n\d/, `n${counter+1}`));
    });
    $('.option-select').on('change', function () {
        let $this = $(this);
        if ($this.val() != '0') {
            $this.siblings().eq(1).val($this.val());
            let wrap = $this.closest('.installed-wrap');
            if (wrap.not('.filled')) wrap.addClass('filled');
        }
    });
    $('.installed-wrap').on('change', '.input-sku', function () {
        let wrap = $(this).closest('.installed-wrap');
        if (!wrap.find('.input-sku').not(function(){
            return $(this).val() == '';}).length)
            wrap.removeClass('filled');
    });
    $('.option-filter').on('keyup', function() {
        let $this = $(this);
        window.clearTimeout(timeout);
        timeout = window.setTimeout(function(){
            let query = $this.val().split(" ");
            $this.prev().children().each(function(){
                let checkFailed = false;
                for (let i = 0; i < query.length; i++) {
                    let re = RegExp(query[i], "i");
                    if ( !re.test($(this).text() )) {
                        checkFailed = !!$(this).hide();
                        break;
                    }
                }
                if (!checkFailed) {
                    $(this).show();
                }
            });
        }, 500);
    });
    $('.option-filter').on('focus', function() {
       $(this).prev().prop('size', 5);
    });
    $('.option-select').on('blur', function() {
        if ($(this).prop('size')!=0) $(this).prop('size', 0);
    });

    $("#tr_XML_ID").on('change', 'input', function() {
        $('input[name="CODE"]').val($(this).val().replace(/[^\w-]/g, '_'));
        $('#tr_PROPERTY_333').find('input').val($(this).val());
        $('#CAT_BASE_QUANTITY').val(999);
        $('#CAT_BASE_PRICE').val('');
    });

    let rawDescrArea = $('#tr_PROPERTY_334').find('textarea');
    let description = rawDescrArea.val();
    $(
        `<div id="dev_tools">
                <p class="top-description">${description}</p>
        </div>`
    ).appendTo($('#form_element_48_tabs'));

    rawDescrArea.on('change', function(){
        // console.log( $(this).val() );
        $('.top-description').text($(this).val());
    });
    $('.input-cnt').on('change', function(){
        $(this).toggleClass('colored', $(this).val()>1);
    });
    //console.log('test');
});

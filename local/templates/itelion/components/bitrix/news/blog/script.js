$(function (){
    $('#blog_tags_cloud').on('click', 'p', function(){
        $.post(window.location.href,
            {
                'blog_filter': $(this).data('id'),
            }
            , function (res) {
                $('#blog__list').html(res);
                $('html, body').animate({ scrollTop: $('#blog__list').offset().top - 200 }, 500);
            }
        );
    });

    $('#blog_tags_head, #blog_tags_bottom').on('click', 'p', function(){
        $('#blog_tags_head, #blog_tags_bottom').find('._active').removeClass('_active');
        $.post(window.location.href,
            {
                'blog_filter': $(this).data('id'),
            }
            , function (res) {
                $('#blog__list').html(res);
            }
        );
        $(this).addClass('_active');
    })

    $('#mail_checkbox').on('change', function(){
       if ($(this).is(':checked')) {
           $('input[data-type="checkbox"]').val(1);
       } else {
           $('input[data-type="checkbox"]').val(0);
       }
    });

});
$(function (){
    const $tabs = $('.navigation');
    const $tabsWrapper = $('.tabs__wrapper');
    $tabs.on('click', 'p', function(){
        let id = $(this).data('section');
        $tabs.find('._active').removeClass('_active');
        $tabsWrapper.find('._active').removeClass('_active');
        $(this).addClass('_active');
        $tabsWrapper.find(`div[data-section='${id}']`).addClass('_active');
    });
});
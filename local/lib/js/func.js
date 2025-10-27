function test(){
    console.log('test');
}
function clearLocalStorage() {
    for (var i = 0; i < localStorage.length; i++) {
        if (localStorage.key(i).startsWith("shop-item-")) {
            localStorage.removeItem(localStorage.key(i));
        }
    }
}
function resetBtnsArterSubmit() {
    var btns = document.querySelectorAll('[data-shop-item="btn"]._active');
    if (btns.length > 0) {
        btns.forEach(function (btn) {
            if (btn) btn.classList.remove('_active');
        });
    }
}
//меняем число товаров в корзине
function changeCountFull() {
    var itemsLength = document.querySelectorAll('[data-shop-item-set-id]').length;
    var counts = document.querySelectorAll('[data-shop="count"]');
    counts.forEach(function (count) {
        count.textContent = itemsLength;
        if (itemsLength) {
            count.classList.add('_active');
            document.querySelector('[data-shop-header="link"]').classList.add('popup-link');
        } else {
            count.classList.remove('_active');
            document.querySelector('[data-shop-header="link"]').classList.remove('popup-link');
        }
    });
}
function updateBasketElement(basketId) {
    let itemList = [];
    for (let i = 0; i < localStorage.length; i++) {
        if (localStorage.key(i).startsWith("shop-item-")) {
            let itemObject = JSON.parse(localStorage.getItem(localStorage.key(i)));
            itemList.push(itemObject);
        }
    }
    $.post('/local/ajaxhandler/basket.php',
        {
            updateBasketElement : [basketId, itemList]
        },
        function (response) {
            //console.log('updated');
        }
    );
}
function getCheapestProductDescription($root) {
    let code = $root.data('model') || $root.data('marker');
    let codeType = $root.data('model') ? 'model' : 'marker';
    return $.post('/local/ajaxhandler/form_data.php',
        {
            'form_data_basket_desc' : {
                code_type : codeType,
                code : code
            }
        }
    );
}
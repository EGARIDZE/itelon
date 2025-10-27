(function () {
    'use strict';
    var replaceValue = /от| | |₽|,/g;
    const FUNC_PATH = '/local/lib/js/func.js';
//получаем данные о товаре со страницы
    var createObject = function createObject(item, descr) {
        return {
            id: item.getAttribute('data-shop-item-get-id'),
            type: item.getAttribute('data-shop-item-get-type'),
            title: item.querySelector('[data-shop-item-get="title"]').textContent,
            price: item.querySelector('[data-shop-item-get="price"]').textContent.replace(replaceValue, ''),
            delivery: item.querySelector('[data-shop-item-get="delivery"]').textContent,
            warranty: item.querySelector('[data-shop-item-get="warranty"]').textContent,
            count: 1,
            description: descr
        };
    };

    // создаем элемент для корзины из localStorage по его Id
    var addElement = function addElement(itemId) {
        var element = document.createElement('div');
        element.classList.add('popup-shop-table__product');
        element.classList.add('popup-shop-product');
        var itemObject = JSON.parse(localStorage.getItem("shop-item-".concat(itemId)));

        // сохраняем доп. значения
        var itemTypeText = itemObject.type == 'product' ? 'Продукт' : 'Конфигурация',
            itemTypeClass = itemObject.type == 'product' ? '_product' : '_config',
            itemPriceIsNaN = isNaN(itemObject.price),
            itemPriceText = itemPriceIsNaN ? 'Цена по запросу' : "".concat(parseInt(itemObject.price).toLocaleString(), " \u20BD"),
            itemPriceValue = itemPriceIsNaN ? 'Цена по запросу' : parseInt(itemObject.price),
            itemFinalPriceText = itemPriceIsNaN ? 'Цена по запросу' : (itemPriceValue * itemObject.count).toLocaleString();
        element.setAttribute('data-shop-item-set-id', "".concat(itemId));
        element.innerHTML = `
					<input type="text" name="shop-product-${itemId}" value="${itemId}" class="popup-shop-product__input">
					<div class="popup-shop-product__item popup-shop-product__content">
						<span class="popup-shop-product__type ${itemTypeClass}" data-shop-item-set-type="${itemObject.type}">${itemTypeText}</span>
						<input type="text" name="shop-product-${itemId}-type" value="${itemObject.type}" class="popup-shop-product__input">
						<div class="popup-shop-product__title" data-shop-item-set="title">${itemObject.title}</div>
						<input type="text" name="shop-product-${itemId}-title" value="${itemObject.title}" class="popup-shop-product__input">
						<div class="popup-shop-product__description" data-shop-item-set="description">
							${itemObject.description}
						</div>
						<input type="text" name="shop-product-${itemId}-description" value="${itemObject.description}" class="popup-shop-product__input">
						<div class="popup-shop-product__info">
							Цена за единицу: <b data-shop-item-set="price">${itemPriceText}</b>
							<input type="text" name="shop-product-${itemId}-price" value="${itemPriceText}" class="popup-shop-product__input">
						</div>
						<div class="popup-shop-product__info">
							Срок поставки: <span data-shop-item-set="delivery">${itemObject.delivery}</span>
							<input type="text" name="shop-product-${itemId}-delivery" value="${itemObject.delivery}" class="popup-shop-product__input">
						</div>
						${itemObject.warranty ? `<div class="popup-shop-product__info">
							Гарантия: <span data-shop-item-set="warranty">${itemObject.warranty}</span>
							<input type="text" name="shop-product-${itemId}-warranty" value="${itemObject.warranty}" class="popup-shop-product__input">
						</div>` : ''}
						
					</div>
					<div class="popup-shop-product__item popup-shop-product__count" data-shop-item-set="count">
						<div class="form-group input-count">
							<div class="input-count__wrapper">
								<div class="input-count__btn input-count__btn_lower" data-shop-item-count="lower"></div>
									<input name="shop-product-${itemId}-count" value="${itemObject.count.toString()}" min="0" data-type="number" type="number" autocomplete="off" readonly>
								<div class="input-count__btn input-count__btn_uppper" data-shop-item-count="upper"></div>
							</div>
						</div>
					</div>
					<div class="popup-shop-product__item popup-shop-product__finalprice">
						<span>На сумму:</span>
						<span data-shop-item-set="finalprice">${itemFinalPriceText}</span>
						<input type="text" name="shop-product-${itemId}-finalprice" value="${itemFinalPriceText}" class="popup-shop-product__input">
					</div>
				`;

        // добавление строки ₽, если цена товара = число
        if (!itemPriceIsNaN) {
            element.querySelector('.popup-shop-product__finalprice').innerHTML += '<span>₽</span>';
        }
        return element;
    };

    //проверяем, все ли товары имеют цену
    var checkIsNaN = function checkIsNaN() {
        var items = document.querySelectorAll('[data-shop-item-set-id]');
        var isNaNLength = 0;
        items.forEach(function (item) {
            var itemPriceIsNaN = isNaN(item.querySelector('[data-shop-item-set="finalprice"]').textContent.replace(replaceValue, ''));
            if (itemPriceIsNaN) {
                isNaNLength++;
            }
        });
        return isNaNLength;
    };

    //меняем общую сумму покупки
    var changeFullPrice = function changeFullPrice() {
        var items = document.querySelectorAll('[data-shop-item-set-id]');
        var isNaNLength = checkIsNaN(); //проверяем, все ли товары имеют цену
        var FinalPriceValue = 0;
        items.forEach(function (item) {
            if (isNaNLength == 0) {
                FinalPriceValue += parseInt(item.querySelector('[data-shop-item-set="finalprice"]').textContent.replace(replaceValue, ''));
            }
        });
        var FinalPriceItems = document.querySelectorAll('[data-shop="fullprice"]');
        var FinalPriceValueItems = document.querySelectorAll('[data-shop="value"]');
        var FinalPriceSendItems = document.querySelectorAll('[data-shop="send"]');
        if (isNaNLength == 0) {
            FinalPriceItems.forEach(function (price) {
                price.textContent = "".concat(FinalPriceValue.toLocaleString(), " \u20BD");
            });
            document.querySelector('[data-shop-fullprice="input"]').value = "".concat(FinalPriceValue.toLocaleString(), " \u20BD");
        } else {
            document.querySelector('[data-shop-fullprice="input"]').value = 'Пришлем КП с точным расчетом';
        }
        FinalPriceValueItems.forEach(function (value) {
            if (isNaNLength > 0) {
                value.classList.remove('_active');
            } else {
                value.classList.add('_active');
            }
        });
        FinalPriceSendItems.forEach(function (send) {
            if (isNaNLength > 0) {
                var _send$querySelector;
                send.classList.add('_active');
                (_send$querySelector = send.querySelector('span')) === null || _send$querySelector === void 0 || _send$querySelector.setAttribute('style', 'white-space: normal;');
            } else {
                var _send$querySelector2;
                send.classList.remove('_active');
                (_send$querySelector2 = send.querySelector('span')) === null || _send$querySelector2 === void 0 || _send$querySelector2.removeAttribute('style');
            }
        });
    };

    //закрываем модалку при отсутствии товаров в корзине
    var closeModal = function closeModal() {
        document.querySelector('[id="shop"]').classList.remove('_open');
        document.querySelector('[id="shop"]').removeAttribute('style');
        document.body.classList.remove('_lock');
        document.body.removeAttribute('style');
        var lockPadding = document.querySelectorAll('.lock-padding');
        if (lockPadding.length) {
            lockPadding.forEach(function (elem) {
                elem.removeAttribute('style');
            });
        }
    };

    //показываем всплывашку в шапке об успешном добавлении
    var showNoticeSuccess = function showNoticeSuccess() {
        var headerBtn = document.querySelector('[data-shop="header"]');
        headerBtn.querySelector('[data-shop-header="error"]').classList.remove('_active');
        headerBtn.querySelector('[data-shop-header="success"]').classList.add('_active');
        setTimeout(function () {
            headerBtn.querySelector('[data-shop-header="success"]').classList.remove('_active');
        }, 5000);
    };

    //показываем всплывашку в шапке об отсутствии товаров в корзине
    var showNoticeError = function showNoticeError() {
        var headerBtn = document.querySelector('[data-shop="header"]');
        headerBtn.querySelector('[data-shop-header="success"]').classList.remove('_active');
        headerBtn.querySelector('[data-shop-header="error"]').classList.add('_active');
        setTimeout(function () {
            headerBtn.querySelector('[data-shop-header="error"]').classList.remove('_active');
        }, 5000);
    };

    //заполнем корзину из localStorage при загрузке страницы
    var fillShopFromStorage = function fillShopFromStorage() {
        var list = document.querySelector('[data-shop="list"]');
        for (var i = 0; i < localStorage.length; i++) {
            if (localStorage.key(i).startsWith("shop-item-")) {
                var itemObject = JSON.parse(localStorage.getItem(localStorage.key(i))); //добавляем товар в localStorage
                var itemElement = addElement(itemObject.id); //создаем товар
                list.appendChild(itemElement); //добавляем товар в корзину

                //делаем кнопку добавления товара активной, если она есть
                var btn = document.querySelector("[data-shop-item-get-id=\"".concat(itemObject.id, "\"] [data-shop-item=\"btn\"]"));
                if (btn) {
                    btn.classList.add('_active');
                }
                $.getScript(FUNC_PATH, function () {
                    changeCountFull(); //меняем число товаров в корзине
                });
                changeFullPrice(); //меняем общую сумму покупки
            }
        }
    };
    fillShopFromStorage(); //заполнем корзину из localStorage при загрузке страницы

    document.addEventListener('click', function (e) {

        // если у товара нажали на кнопку добавления в корзину
        if (e.target.hasAttribute('data-shop-item') && e.target.getAttribute('data-shop-item') == 'btn') {
            e.preventDefault();
            var item = e.target.closest('[data-shop-item-get-id]');
            if (e.target.classList.contains('solution-config__link-shop'))
                item.setAttribute('data-shop-item-get-id',
                    "".concat(item.getAttribute('data-shop-item-get-id'), "-")
                        .concat(Math.floor(Math.random() * (100000 - 1000 + 1)) + 1000)
                );
            let descrEmb = item.querySelector('[data-shop-item-get="description"]');
            if (descrEmb) {
                addBasketItem(item, descrEmb.classList.contains('solution-config__task-desc')
                    ? clearDescription(descrEmb) : descrEmb.innerHTML.replace(/"/g, 'in')
                );
            } else {
                let $root = $(item).find('.product-preview__description');
                $.getScript(FUNC_PATH, function () {
                    getCheapestProductDescription($root).done(function (res) {
                        addBasketItem(item, res.replace(/"/g, 'in'));
                    });
                });
            }
            e.target.classList.add('_active'); //делаем кнопку добавления товара активной
            showNoticeSuccess(); //показываем всплывашку в шапке об успешном добавлении
        }

        //если нажали на кнопку в шапке с пустой корзиной
        if (e.target.closest('[data-shop="header"]')) {
            var itemsLength = document.querySelectorAll('[data-shop-item-set-id]').length;
            if (!itemsLength) {
                e.preventDefault();
                showNoticeError(); //показываем всплывашку в шапке об отсутствии товаров в корзине
            }
        }

        //если нажали на ссылку в сообщении об отсутсвии товара
        if (e.target.closest('[data-shop-header="error"]') && e.target.tagName == 'A') {
            location.href = e.target.getAttribute('href');
        }

        //если нажали на кнопку закрытия вслывашки
        if (e.target.closest('[data-shop-header]') && e.target.tagName == 'SPAN') {
            e.target.closest('[data-shop-header]').classList.remove('_active');
        }

        //если изменили кол-во товара в корзине
        if (e.target.hasAttribute('data-shop-item-count')) {
            var countInputValue = e.target.closest('[data-shop-item-set="count"]').querySelector('input').value;
            var setItem = e.target.closest('[data-shop-item-set-id]');
            var productFinalprice = setItem.querySelector('[data-shop-item-set="finalprice"]').textContent.replace(replaceValue, '');
            var itemKey = "shop-item-".concat(setItem.getAttribute('data-shop-item-set-id'));
            if (parseInt(countInputValue) > 0) {
                if (!isNaN(productFinalprice)) {
                    var countInputValueNumber = 0;
                    if (e.target.getAttribute('data-shop-item-count') == 'lower') {
                        countInputValueNumber = parseInt(countInputValue) + 1;
                    } else {
                        countInputValueNumber = parseInt(countInputValue) - 1;
                    }
                    setItem.querySelector('[data-shop-item-set="finalprice"]').textContent = (parseInt(productFinalprice) / countInputValueNumber * parseInt(countInputValue)).toLocaleString();
                }

                //перезаписаем кол-во товара в localStorage
                var _itemObject = JSON.parse(localStorage.getItem(itemKey));
                _itemObject.count = parseInt(countInputValue);
                localStorage.setItem(itemKey, JSON.stringify(_itemObject));
            } else {
                //если товар удалили из корзины
                var getItem = document.querySelector("[data-shop-item-get-id=\"".concat(setItem.getAttribute('data-shop-item-set-id'), "\"]"));
                //убираем активность у кнопки товара, если такая кнопка есть
                if (getItem) {
                    getItem.querySelector('[data-shop-item="btn"]').classList.remove('_active');
                }
                setItem.remove(); //удаляем товар из корзины

                localStorage.removeItem(itemKey); //удаляем товар из localStorage
                $.getScript(FUNC_PATH, function () {
                    changeCountFull(); //меняем число товаров в корзине
                });

                //если удалили последний товар в корзине
                var _itemsLength = document.querySelectorAll('[data-shop-item-set-id]').length;
                if (!_itemsLength) {
                    $.getScript(FUNC_PATH, function () {updateBasketElement(localStorage.getItem('basketId'))});
                    closeModal(); //закрываем модалку корзины
                    showNoticeError(); //показываем всплывашку в шапке об отсутствии товаров в корзине
                }
            }
            changeFullPrice(); //меняем общую сумму покупки
        }
    });
    function addBasketItem(item, descr) {

        let basketId = localStorage.getItem('basketId');
        let itemObject, list, itemElement
        list = document.querySelector('[data-shop="list"]');

        itemObject = createObject(item, descr);
        localStorage.setItem("shop-item-".concat(item.getAttribute('data-shop-item-get-id')), JSON.stringify(itemObject)); //добавляем товар в localStorage
        itemElement = addElement(item.getAttribute('data-shop-item-get-id')); //создаем товар
        list.appendChild(itemElement); //добавляем товар в корзину
        ym(13396396,'reachGoal','click_dobavit_v_korziny'); //отправляем событие в Яндекс Метрику
        if (basketId !== null) {
            $.getScript(FUNC_PATH, function () {
                updateBasketElement(basketId);
            });
        } else {
            $.post('/local/ajaxhandler/basket.php',
                {
                    addBasketElement : [itemObject]
                },
                function (response) {
                    localStorage.setItem('basketId',response);
                }
            );
        }
        $.getScript(FUNC_PATH, function () {
            changeCountFull(); //меняем число товаров в корзине
        });
        changeFullPrice(); //меняем общую сумму покупки
    }
    function clearDescription(description) {
        let clearedDescription = $(description).clone();
        clearedDescription.find('li').each(function(){
            if($(this).is('.template')) $(this).remove();
            else $(this).removeAttr('data-type class').children().removeAttr('class');
        });
        return clearedDescription.html();
    }
})();
$(document).ready(function(){

window.dataLayer = window.dataLayer || [];

   if( $('.products__list').length > 0 ){

        let products = [];

        $('.products__list .ecommerce-product').each(function () {
            const $product = $(this);

            const id = $product.attr('data-id');
            const brand = $product.attr('data-brand');
            const title = $product.find('.card-title').text().trim();

            const priceText = $product.find('.product-preview__score').text().trim();
            const price = parseInt(priceText.replace(/\D/g, ''), 10) || 0;

            products.push({
                ID: id,
                NAME: title,
                PRICE: price,
                BRAND: brand,
            });
        });

        if (products.length > 0) {
            dataLayer.push({
                "ecommerce": {
                    "currencyCode": "RUB",
                    "impressions": products
                }
            });
        }

   }

   $('body').on('click', '.product-preview__image, .product-preview__title a', function(){
        let products = [];
        par = $(this).parents('.ecommerce-product');

        const id = par.attr('data-id');
        const brand = par.attr('data-brand');
        const title = par.find('.card-title').text().trim();

        const priceText = par.find('.product-preview__score').text().trim();
        const price = parseInt(priceText.replace(/\D/g, ''), 10) || 0;

        products.push({
            ID: id,
            NAME: title,
            PRICE: price,
            BRAND: brand,
        });

        if (products.length > 0) {
            dataLayer.push({
                "ecommerce": {
                    "currencyCode": "RUB",
                    "click": {
                        "products": products
                    }
                }
            });
        }        

   });


});

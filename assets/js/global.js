jQuery(document).ready(() => {
    initFixedTopnav();

    let stop = 0;

    let int = setInterval(() => {
        stop++;
        replaceReviewOrderProductsImages();

        if(stop > 3)
            clearInterval(int);
    }, 1500);
});

//topnav
function initFixedTopnav() {
    jQuery(window).on('scroll', () => {
        let $topnav = jQuery('nav.navbar');
    
        if($topnav.length) {
            let $firstSection = jQuery('section').first();
            let scrollTop = jQuery(window).scrollTop();
    
            console.log(scrollTop)
    
            if(scrollTop) {
                $topnav.addClass('sticky');
    
                if($firstSection.length)
                    $firstSection.css('margin-top', $topnav.outerHeight());
            }
            else {
                $topnav.removeClass('sticky');
    
                if($firstSection.length)
                    $firstSection.css('margin-top', 0);
            }
        }
    });
}

//cart
function removeProductFromCart(sku) {
    let key = jQuery('.row-cart-product[data-sku="'+sku+'"]').attr('data-cart-item-key');
    jQuery('.row-cart-product[data-sku="'+sku+'"]').remove();

    jQuery.ajax({
        url: args_mc.ajax_url,
        method: "POST",
        dataType: 'json',
        data: {
            action: 'remove_cart_item',
            itemKey: key
        },
        success: (data) => {
            
        }
    });

    if(jQuery('.row-cart-product').length) {
        changeCartTotals();
    }
    else {
        jQuery('.col-cart-products').addClass('d-none');
        jQuery('.col-cart-empty').removeClass('d-none').addClass('d-flex');
    }
}

function changeCartTotals() {
    let total = 0;
    let keys = [];
    let qtys = [];

    let productsCount = 0;

    jQuery('.row-cart-product').each((i, row) => {
        let qty = jQuery(row).find('input[type=number]').val();
        let price = parseFloat(jQuery(row).attr('data-price'));
        let key = jQuery(row).attr('data-cart-item-key');

        keys.push(key);
        qtys.push(qty);

        let product_total = qty * price;

        total += product_total;

        productsCount++;

        jQuery(row).find('.product-total').text(product_total.toFixed(2));
    });

    jQuery('.cart-total').text(total.toFixed(2));
    jQuery('.cart-icon::after').attr('content', productsCount);

    jQuery.ajax({
        url: args_mc.ajax_url,
        method: "POST",
        dataType: 'json',
        data: {
            action: 'update_cart_items',
            itemKeys: keys,
            qtys
        },
        success: (data) => {
            
        }
    });
}

//global pagination
function changeMcPage(where = null, specific = null) {
    let $num_page = jQuery('input[name=num_page]');
    let num = parseInt($num_page.val());

    if(specific) {
        $num_page.val(specific);
    }
    else {
        switch(where) {
            case 'prev':
                $num_page.val(num - 1);
                break;
    
            case 'next':
                $num_page.val(num + 1);
                break;
        }
    }

    jQuery('#form-mc').submit();
}

//catalogue
function changeMcCategories() {
    jQuery('input[name=num_page]').val(1);
    jQuery('#form-mc').submit();
}

function replaceReviewOrderProductsImages() {
    $descs = jQuery('.wc-block-components-order-summary-item__description');

    if($descs.length) {
        jQuery.ajax({
            url: args_mc.ajax_url,
            method: "POST",
            dataType: 'json',
            data: {
                action: 'get_cart_items'
            },
            success: (response) => {
                let cartItems = response.products;

                cartItems.forEach((c) => {
                    $descs.each((i, d) => {
                        let code = jQuery(d).find('.wc-block-components-product-name').text();
                        
                        if(c.code == code) {
                            let $image = jQuery(d).prev().find('img');
                            $image.attr('src', c.src);
                        }
                    });
                })
            }
        });
    }
}
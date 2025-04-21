jQuery(document).ready(() => {
    initFixedTopnav();
    initBodyOnClick();
    initCartImages();
    openPromoModal();
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

function initCartImages() {
    let stop = 0;

    let int = setInterval(() => {
        stop++;
        replaceReviewOrderProductsImages();

        if(stop > 3)
            clearInterval(int);
    }, 1500);
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

//modal promo
function openPromoModal() {
    let $modal = jQuery('#promoModal');

    if($modal.length) {
        setTimeout(() => {
            $modal.modal('show');

            initPhonesDropdown();
            initDropdownsClick();
        }, 2000);
    }
}

function initPhonesDropdown() {
    let $dropdown = jQuery('#phones-dropdown');
    let $container = $dropdown.find('.sub-options-container');
    let $select = jQuery('#phones-select');

    let lang = 'it_IT';

    DIALS.forEach((d) => {
        let $customOpt = '<div class="request-option" data-value="' + d.code + '" onclick="selectRequestOption(this, true)">' +
                            '<div class="flag flag-' + d.code + '"></div>' +
                            '<span>' + d.name + '</span>' +
                            '<span class="dial-code">+' + d.dial + '</span>' +
                            '<i class="fa-regular fa-circle-check fa-xs icon-selected"></i>' +
                        '</div>';

        let $opt = '<option value="' + d.code + '">+ ' + d.dial + '</option>';

        if(d.code != lang) {
            $container.append($customOpt); 
            $select.append($opt);
        }
        else {
            $container.prepend($customOpt);
            $select.prepend($opt);
        }
    });

    $container.show();
}

function openRequestDropdown(el) {
    let $select = jQuery(el);
    let $dropdown = $select.parent().find('.request-dropdown');

    $dropdown.show();
}

function selectRequestOption(opt, dial = false) {
    let $opt = jQuery(opt);
    let $parent = $opt.parent();
    let $dropdown = $opt.parent().parent();
    let $select = $dropdown.parent().find('select');

    let optValue = $opt.attr('data-value');

    if($parent.hasClass('main-options-container')) {
        let $sub = $dropdown.find('.sub-options-container[data-main-value=' + optValue + ']');

        $parent.hide('slide', { direction: 'left' }, 300, () => {
            $sub.show('slide', { direction: 'right' }, 300);
        });
    }
    else {
        let $main = $dropdown.find('.main-options-container');

        $dropdown.hide();

        // $main.show();
        // $parent.hide();

        $select.val(optValue);
        $select.trigger('change');

        $dropdown.find('.selected').removeClass('selected');
        $opt.addClass('selected');

        if(dial) {
            let $img = $select.prev();

            $img.removeClass();
            $img.addClass('img-dial');
            $img.addClass('flag-' + optValue);
        }
    }
}

function initBodyOnClick() {
    jQuery('body').on('click', (ev) => {
        $ev = jQuery(ev.target);

        if(
            !$ev.hasClass('request-dropdown') &&
            !$ev.hasClass('quotation-select') &&
            !$ev.hasClass('request-option') &&
            !$ev.parent().hasClass('request-option') &&
            !$ev.parent().parent().hasClass('request-dropdown') &&
            !$ev.parent().parent().parent().hasClass('request-dropdown')
        ) {
            jQuery('.request-dropdown').hide();
        }
    });
}

function initDropdownsClick() {
    let $select = jQuery('#phones-select');

    if($select.length) {
        $select.off('mousedown');

        $select.on('mousedown', (e) => {
            e.preventDefault();
            $select.blur();
            window.focus();
        });
    }
}
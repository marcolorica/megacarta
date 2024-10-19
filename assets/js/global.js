jQuery(document).ready(() => {

});

function removeProductFromCart(sku) {
    let key = jQuery('.row-cart-product[data-sku='+sku+']').attr('data-cart-item-key');
    jQuery('.row-cart-product[data-sku='+sku+']').remove();

    jQuery.ajax({
        url: args_mg.ajax_url,
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

    jQuery('.row-cart-product').each((i, row) => {
        let qty = jQuery(row).find('input[type=number]').val();
        let price = parseFloat(jQuery(row).attr('data-price'));
        let key = jQuery(row).attr('data-cart-item-key');

        keys.push(key);
        qtys.push(qty);

        let product_total = qty * price;

        total += product_total;

        jQuery(row).find('.product-total').text(product_total.toFixed(2));
    });

    jQuery('.cart-total').text(total.toFixed(2));

    jQuery.ajax({
        url: args_mg.ajax_url,
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
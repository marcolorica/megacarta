<?php

add_filter('woocommerce_placeholder_img_src', 'filter_woocommerce_placeholder_img_src', 10, 1);
add_filter( 'woocommerce_get_availability_text', 'filter_woocommerce_product_availability', 10, 2);

function filter_woocommerce_placeholder_img_src($src) {
    global $product;

    if(is_a($product, 'WC_Product'))
        $src = mc_get_logo_src();
    
    return $src;
}

function filter_woocommerce_product_availability($availability, $product) {
    if(is_product())
        return '';

    return $availability;
}

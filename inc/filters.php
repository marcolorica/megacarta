<?php

add_filter('woocommerce_placeholder_img_src', 'filter_woocommerce_placeholder_img_src', 10, 1);

function filter_woocommerce_placeholder_img_src($src) {
    global $product;

    if(is_a($product, 'WC_Product'))
        $src = get_stylesheet_directory_uri() . '/assets/images/megacarta-logo.webp';
    
    return $src;
}
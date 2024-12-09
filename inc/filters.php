<?php

add_filter('woocommerce_placeholder_img_src', 'filter_woocommerce_placeholder_img_src', 10, 1);

function filter_woocommerce_placeholder_img_src($src) {
    global $product;

    if(is_a($product, 'WC_Product'))
        $src = mc_get_logo_src();
    
    return $src;
}
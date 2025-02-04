<?php

add_filter('woocommerce_placeholder_img_src', 'filter_woocommerce_placeholder_img_src', 10, 1);
add_filter('woocommerce_get_availability_text', 'filter_woocommerce_product_availability', 10, 2);

add_filter('woocommerce_add_cart_item_data', 'filter_woocommerce_order_product_variants', 10, 2);
add_filter('woocommerce_get_item_data', 'filter_woocommerce_cart_product_variants', 10, 2);

// add_filter('woocommerce_order_data_store_cpt_get_orders_query', 'filter_woocommerce_orders_query', 10, 2);

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

function filter_woocommerce_order_product_variants($cart_item_data, $product_id) {
    $request = (object) $_POST;
    $variant = $request->mc_variant ?? null;

    if($variant)
        $cart_item_data['mc_variant_id'] = sanitize_text_field($variant);

    return $cart_item_data;
}


function filter_woocommerce_cart_product_variants($item_data, $cart_item) {
    if(isset($cart_item['custom_data'])) {
        $item_data[] = [
            'name' => 'Variante',
            'value' => wc_clean($cart_item['mc_variant_id']),
        ];
    }
    
    return $item_data;
}

function filter_woocommerce_orders_query($query, $query_vars) {
    $term = isset($query_vars['order_term']) ? esc_attr($query_vars['order_term']) : null;

    if($term)
        $query['meta_query'][] = [
            'relation' => 'OR',
            [
                'key'     => '_billing_first_name',
                'value'   => $term,
                'compare' => 'LIKE'
            ],
            [
                'key'     => '_billing_last_name',
                'value'   => $term,
                'compare' => 'LIKE'
            ]
        ];

    return $query;
}
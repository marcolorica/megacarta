<?php

add_action('wp_ajax_nopriv_remove_cart_item',"remove_cart_item");
add_action('wp_ajax_remove_cart_item',"remove_cart_item");

add_action('wp_ajax_nopriv_update_cart_items',"update_cart_items");
add_action('wp_ajax_update_cart_items',"update_cart_items");

add_action('wp_ajax_admin_delete_product', 'admin_delete_product_ajax');
add_action('wp_ajax_admin_delete_category', 'admin_delete_category_ajax');

add_action('wp_ajax_nopriv_get_cart_items',"get_cart_items");
add_action('wp_ajax_get_cart_items',"get_cart_items");

function update_cart_items() {
    $request = (object) $_POST;

    $itemKeys = isset($request->itemKeys) ? $request->itemKeys : null;
    $qtys = isset($request->qtys) ? $request->qtys : null;

    foreach($itemKeys as $i => $itemKey) {
        if(is_numeric($qtys[$i]) && $qtys[$i] > 0) {
            WC()->cart->set_quantity($itemKey, $qtys[$i]);
        }
    }

    echo json_encode([
        'status' => 'success',
        'results' => '',
    ]);

    wp_die();
}

function remove_cart_item() {
    $request = (object) $_POST;

    $itemKey = isset($request->itemKey) ? $request->itemKey : null;
    WC()->cart->remove_cart_item($itemKey);

    echo json_encode([
        'status' => 'success',
        'results' => '',
    ]);

    wp_die();
}

function admin_delete_product_ajax() {
    $request = (object) $_POST;

    if(isset($request->product_id) && is_numeric($request->product_id)) {
        $product_id = intval($request->product_id);

        $deleted = wp_delete_post($product_id, false);
        
        if(!$deleted) {
            echo json_encode([
                'status' => 'error',
                'results' => '',
            ]);

            wp_die();
        }
    }

    echo json_encode([
        'status' => 'success',
        'results' => '',
    ]);

    wp_die();
}

function admin_delete_category_ajax() {
    $request = (object) $_POST;
    $category_id = isset($request->category_id) && is_numeric($request->category_id) ? intval($request->category_id) : null;

    if($category_id) {
        $term = get_term($category_id, 'product_cat');
        
        if($term && !is_wp_error($term)) {

            $args = array(
                'taxonomy' => 'product_cat',
                'parent' => $category_id,
                'hide_empty' => false,
            );

            $subcategories = get_terms($args);
            
            foreach($subcategories as $subcategory) {
                wp_delete_term($subcategory->term_id, 'product_cat');
            }
            
            wp_delete_term($category_id, 'product_cat');

            echo json_encode([
                'status' => 'success',
                'results' => '',
            ]);

            wp_die();
        }
    }

    echo json_encode([
        'status' => 'error',
        'results' => '',
    ]);

    wp_die();
}

function get_cart_items() {
    $request = (object) $_POST;

    $cart = WC()->cart->get_cart();

    $items = [];

    foreach($cart as $key => $item ) {
        $product = $item['data'];

        if($product) {
            $items[] = [
                'code' => $product->get_sku(),
                'src' => mc_get_product_image($product->get_id()),
            ];
        }
    }

    echo json_encode([
        'status' => 'success',
        'products' => $items,
    ]);

    wp_die();
}
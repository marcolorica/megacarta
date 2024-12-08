<?php

add_action('wp_ajax_nopriv_remove_cart_item',"remove_cart_item");
add_action('wp_ajax_remove_cart_item',"remove_cart_item");

add_action('wp_ajax_nopriv_update_cart_items',"update_cart_items");
add_action('wp_ajax_update_cart_items',"update_cart_items");

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
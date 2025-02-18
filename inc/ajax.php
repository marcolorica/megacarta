<?php

add_action('wp_ajax_nopriv_remove_cart_item',"remove_cart_item");
add_action('wp_ajax_remove_cart_item',"remove_cart_item");

add_action('wp_ajax_nopriv_update_cart_items',"update_cart_items");
add_action('wp_ajax_update_cart_items',"update_cart_items");

add_action('wp_ajax_admin_delete_product', 'admin_delete_product_ajax');
add_action('wp_ajax_admin_delete_category', 'admin_delete_category_ajax');

add_action('wp_ajax_admin_get_order_status_modal', 'admin_get_order_status_modal_ajax');
add_action('wp_ajax_admin_update_order_status', 'admin_update_order_status_ajax');

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

    mc_return_ajax_json([
        'status' => 'success',
        'results' => '',
    ]);
}

function remove_cart_item() {
    $request = (object) $_POST;

    $itemKey = isset($request->itemKey) ? $request->itemKey : null;
    WC()->cart->remove_cart_item($itemKey);

    mc_return_ajax_json([
        'status' => 'success',
        'results' => '',
    ]);
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

    mc_return_ajax_json([
        'status' => 'success',
        'results' => '',
    ]);
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

            mc_return_ajax_json([
                'status' => 'success',
                'results' => '',
            ]);

            wp_die();
        }
    }

    mc_return_ajax_json([
        'status' => 'error',
        'results' => '',
    ]);
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
                'src' => mc_get_product_image($product->get_id()) ?: wc_placeholder_img_src('woocommerce_single'),
            ];
        }
    }

    mc_return_ajax_json([
        'status' => 'success',
        'products' => $items,
    ]);
}

function admin_get_order_status_modal_ajax() {
    $request = (object) $_POST;

    $order_id = $request->order_id ?? null;
    $order = wc_get_order($order_id);

    $html = mc_get_template_part('modals/order', ['order' => $order]);

    mc_return_ajax_json([
        'status' => 'success',
        'result' => $html,
    ]);
}

function admin_update_order_status_ajax() {
    $request = (object) $_POST;

    $order_id = $request->order_id ?? null;
    $new_status = $request->new_status ?? null;

    if(!$order_id || $new_status)
        mc_return_ajax_json([
            'status' => 'error',
            'message' => 'Richiesta incompleta',
        ]);


    $order = wc_get_order($order_id);
    
    if(!$order)
        mc_return_ajax_json([
            'status' => 'error',
            'message' => 'Ordine non trovato',
        ]);

    $order->update_status($new_status, 'Status aggiornato tramite ajax');

    mc_return_ajax_json([
        'status' => 'success',
        'message' => 'Status aggiornato con successo',
    ]);
    
}
<?php

function mc_get_categories_catalogue($term_id = null) {
    $result = [];

    $categories = get_terms('product_cat', [
        'hide_empty' => 0,
        'orderby' => 'ASC',
        'parent' => 0
    ]);

    $subCategories = get_terms('product_cat', [
        'hide_empty' => 0,
        'orderby' => 'ASC'
    ]);

    foreach($categories as $c) {
        if(!isset($result['c-'.$c->term_id]) && (!$term_id || $term_id == $c->term_id)) {
            $result['c-'.$c->term_id] = (object) [
                'id' => $c->term_id,
                'name' => $c->name,
                'slug' => $c->slug,
                'count' => $c->count,
                'parent' => $c->parent,
                'img' => mc_get_cat_img($c->slug),
                'children' => []
            ];
        }
    }

    foreach($subCategories as $subc) {
        if($subc->parent != 0) {
            if(!$term_id && !isset($result['c-' . $subc->parent]))
                continue;
            // var_dump($subc->name);
            // var_dump($result);
            // die;

            if(!$term_id) {
                $result['c-' . $subc->parent]->children[] = (object) [
                    'id' => $subc->term_id,
                    'name' => $subc->name,
                    'slug' => $subc->slug,
                    'count' => $subc->count,
                    'parent' => $subc->parent,
                    'img' => mc_get_cat_img($subc->slug),
                    'children' => []
                ];
            }
            else if($term_id == $subc->term_id) {
                $result['c-'.$subc->term_id] = (object) [
                    'id' => $subc->term_id,
                    'name' => $subc->name,
                    'slug' => $subc->slug,
                    'count' => $subc->count,
                    'parent' => $subc->parent,
                    'img' => file_exists($path) ? $url : null,
                    'children' => []
                ];
            }
        }
    }

    return $term_id ? $result[array_keys($result)[0]] : $result;
}

function mc_get_products($term = null, $perPage = 10, $_order = 'piu-recenti', $numPage = 1, $categories = []) {
    $orderBy = 'id';
    $order = 'DESC';

    switch($_order) {
        case 'meno-recenti':
            $order = 'ASC';
            break;

        case 'A-Z':
            $orderBy = 'title';
            $orderBy = 'ASC';
            break;

        case 'Z-A':
            $orderBy = 'title';
            break;
    }

	$args = [
        'limit' => $perPage,
        'status' => 'publish',
        'orderby' => $orderBy,
        'order' => $order,
        'page' => $numPage
	];

    if($term)
        $args['s'] = $term;

    if(!empty($categories))
        $args['category'] = $categories;

    $query = new WC_Product_Query($args);
    $products = $query->get_products();

	$res = [];

    $baseDir = get_stylesheet_directory_uri();

    if(!empty($products)) {
        foreach($products as $p) {
            $code = $p->get_name();
            $imgCode = str_replace('/', '-', $code);
            $id = $p->get_id();
			$img = mc_get_product_image($id);
            $cats = $p->get_category_ids();

            $_cats = [];

            foreach($cats as $cat_id) {
                $cat = get_term($cat_id, 'product_cat');
                $_cats[] = $cat->name;
            }

			$res[$p->name] = (object) [
                'id' => $id,
				'name' => $p->get_description(),
				'price' => $p->get_price(),
				'url' => get_permalink($id),
				'img' => $img ?: mc_get_logo_src(),
				'cats' => $_cats,
                'qty' => $p->is_in_stock(),
                'variants' => mc_get_product_variants($id)
			];
        }
    }

    $args_total = [
        'status' => 'publish',
        'return' => 'ids',
        'limit' => -1
    ];

    if($term)
        $args_total['s'] = $term;

    if(!empty($categories))
        $args_total['category'] = $categories;

    $total_products = wc_get_products($args_total);

	return (object) ['result' => $res, 'count' => count($total_products)];
}

function mc_get_orders($term = null, $perPage = 10, $_order = 'piu-recenti', $numPage = 1) {
    $orders = [];

    $args = [
        'status' => array_keys(wc_get_order_statuses())
    ];

    $orderBy = 'id';
    $order = 'DESC';

    switch($_order) {
        case 'meno-recenti':
            $order = 'ASC';
            break;

        case 'A-Z':
            $orderBy = 'name';
            $orderBy = 'ASC';
            break;

        case 'Z-A':
            $orderBy = 'name';
            break;
    }

    $args['orderby'] = $orderBy;
    $args['limit'] = $perPage;
    $args['order'] = $order;
    $args['page'] = $numPage;

    if($term) {
        $args['meta_key'] = '_billing_address_index';
        $args['meta_value'] = $term;
        $args['meta_compare'] = 'LIKE';
    }

    $query = new WC_Order_Query($args);
    $_orders = $query->get_orders();

    $statuses = wc_get_order_statuses();
    $statusColors = [
        'pending' => 'warning',
        'processing' => 'success',
        'on-hold' => 'warning',
        'completed' => 'success',
        'cancelled' => 'danger',
        'refunded' => 'danger',
        'failed' => 'danger',
        'checkout-draft' => 'info'
    ];

    foreach($_orders as $order) {
        $status = $order->get_status();

        $orders[] = (object) [
            'id' => get_the_ID(),
            'customer' => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
            'status' => $statuses['wc-' . $status],
            'statusColor' => $statusColors[$status],
            'tot' => $order->get_total(),
            'products' => $order->get_items()
        ];
    }
    
    wp_reset_postdata();

    $args_total = [
        'status' => array_keys(wc_get_order_statuses()),
        'limit' => -1
    ];

    if($term)
        $args_total['s'] = $term;

    $total_orders = wc_get_orders($args);

	return (object) ['result' => $orders, 'count' => count($total_orders)];
}

function mc_get_product_image($product_id) {
    $product = wc_get_product($product_id);

    if($product) {
        $oem = $product->get_meta('oem');
        
        if($oem) {
            $prefix = get_stylesheet_directory() . "/assets/images/products/$oem";

            $png = file_exists("$prefix.png");
            $jpg = file_exists("$prefix.jpg");
            $webp = file_exists("$prefix.webp");

            $ext = $png ? 'png' : ($jpg ? 'jpg' : ($webp ? 'webp' : null));

            return $ext ? get_stylesheet_directory_uri() . "/assets/images/products/$oem.$ext" : null;
        }
    }

    return null;
}

function mg_is_admin_area() {
    global $post;

    $check = false;

    if($post) {
        $check = get_the_title($post) == 'Area Admin';
    
        if(!$check && $post->post_parent) {
            $check = get_the_title($post->post_parent) == 'Area Admin';
    
            if(!$check && get_post($post->post_parent)->post_parent)
                $check = get_the_title(get_post($post->post_parent)->post_parent) == 'Area Admin';
        }
    }

    return $check;
}

function mc_get_logo_src($white = false) {
    return get_stylesheet_directory_uri() . '/assets/images/megacarta-logo' . ($white ? '-white' : '') . '.webp';
}

function mc_get_cat_img($slug) {
    $prefix = get_stylesheet_directory() . "/assets/images/categories/$slug";

    $png = file_exists("$prefix.png");
    $jpg = file_exists("$prefix.jpg");
    $webp = file_exists("$prefix.webp");

    $ext = $png ? 'png' : ($jpg ? 'jpg' : ($webp ? 'webp' : null));

    return get_stylesheet_directory_uri() . '/assets/images/' . ($ext ? "categories/$slug.$ext" : 'megacarta-logo.webp');
}

function mc_get_page_datas($pagina) {
    $return = [];

    switch($pagina) {
        case 'home':
            $cats = get_option('mc_home_categories');

            $title = get_option('mc_home_map_title');
            $text = get_option('mc_home_map_text');

            $return = (object) [
                'title' => 'Home',
                'main_img' => get_option('mc_home_main_img'),
                'categories' => $cats && is_array($cats) ? $cats : null,
                'map_section' => (object) [
                    'title' => $title ? stripslashes($title) : '',
                    'text' => $text ? stripslashes($text) : ''
                ]
            ];
            break;

        case 'chi-siamo':
            $title_1 = get_option('mc_chi_siamo_title_1');
            $text_1 = get_option('mc_chi_siamo_text_1');

            $title_2 = get_option('mc_chi_siamo_title_2');
            $text_2 = get_option('mc_chi_siamo_text_2');

            $title_3 = get_option('mc_chi_siamo_title_3');
            $text_3 = get_option('mc_chi_siamo_text_3');

            $text_4 = get_option('mc_chi_siamo_content');

            $return = (object) [
                'title' => 'Chi Siamo',
                'main_img' => get_option('mc_chi_siamo_main_img'),
                'first_section' => (object) [
                    'title' => $title_1 ? stripslashes($title_1) : '',
                    'text' => $text_1 ? stripslashes($text_1) : '',
                    'img' => get_option('mc_chi_siamo_img_1'),
                ],
                'second_section' => (object) [
                    'title' => $title_2 ? stripslashes($title_2) : '',
                    'text' => $text_2 ? stripslashes($text_2) : '',
                    'img' => get_option('mc_chi_siamo_img_2'),
                ],
                'third_section' => (object) [
                    'title' => $title_3 ? stripslashes($title_3) : '',
                    'text' => $text_3 ? stripslashes($text_3) : '',
                    'img' => get_option('mc_chi_siamo_img_3'),
                ],
                'fourth_section' => $text_4 ? stripslashes($text_4) : '',
            ];
            break;

        case 'contatti':
            $return = (object) [
                'title' => 'Contatti',
                'main_img' => get_option('mc_contatti_main_img'),
                'phone' => get_option('mc_contacts_phone'),
                'whatsapp' => get_option('mc_contacts_whatsapp'),
                'email' => get_option('mc_contacts_email')
            ];
            break;
    }

    return $return;
}

function mc_get_settings() {
    return (object) [
        'map_iframe' => get_option('mc_map_iframe'),
        'address' => get_option('mc_address'),
        'partita_iva' => get_option('mc_partita_iva')
    ];
}

function mc_upload_image_in_theme($img_name, $img_tmp_name, $dir = '') {
    $upload_dir = wp_upload_dir();
    $upload_path = get_stylesheet_directory() . '/assets/images/' . $dir;
    
    if(!file_exists($upload_path))
        mkdir($upload_path, 0755, true);

    $target_file = $upload_path . basename($img_name);

    $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($img_tmp_name);
    
    if(!in_array($file_type, $allowed_types))
        return (object) [
            'status' => 'error',
            'message' => 'Errore: Il file deve essere un\'immagine (JPG, JPEG, PNG o GIF)'
        ];

    if(!move_uploaded_file($img_tmp_name, $target_file))
        return (object) [
            'status' => 'error',
            'message' => 'Errore nel caricamento dell\'immagine'
        ];

    return (object) ['status' => 'success'];
}

function mc_get_product($product_id) {
    $product = wc_get_product($product_id);

    if(!$product)
        return null;

    return (object) [
        'id' => $product_id,
        'img' => mc_get_product_image($product_id),
        'name' => $product->get_description(),
        'oem' => $product->get_meta('oem'),
        'code' => $product->get_sku(),
        'price' => $product->get_price(),
        'categories' => wp_get_post_terms($product_id, 'product_cat', ['fields' => 'slugs']),
        'qty' => $product->get_stock_quantity(),
        'only_variants' => $product->get_meta('mc_only_variants'),
        'variants' => mc_get_product_variants($product_id)
    ];
}

function mc_get_product_variants($product_id) {
    $product = wc_get_product($product_id);

    if(!$product)
        return null;

    return $product->get_meta('mc_variants') ?: [];
}

function mc_get_cart_count() {
    return WC()->cart->get_cart_contents_count();
}

function upTo20PercentsProductPrices() {
    $query = new WC_Product_Query(['status' => 'publish']);
    $products = $query->get_products();

    if(!empty($products)) {
        foreach($products as $product) {
            var_dump($product->get_sku());die;
            $actual_price = $product->get_price();
            $new_price = $actual_price + ($actual_price / 100 * 20);

            $product->set_regular_price($new_price);
            $product->save();

        }
    }
}
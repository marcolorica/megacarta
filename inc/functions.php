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
        if(!isset($result['c-'.$c->term_id])) {
            $path = get_stylesheet_directory() . "/assets/images/categories/$c->slug.webp";
            $url = get_stylesheet_directory_uri() . "/assets/images/categories/$c->slug.webp";

            if(!$term_id || $term_id == $c->term_id) 
                $result['c-'.$c->term_id] = (object) [
                    'id' => $c->term_id,
                    'name' => $c->name,
                    'slug' => $c->slug,
                    'count' => $c->count,
                    'parent' => $c->parent,
                    'img' => file_exists($path) ? $url : ($term_id ? null: mc_get_cat_img($c->lsug)),
                    'children' => []
                ];
        }
    }

    foreach($subCategories as $subc) {
        if($subc->parent != 0) {
            if(!$term_id && !isset($result['c-' . $subc->parent])) {
                var_dump($subc->name);
                var_dump($result);
                die;
            }

            $path = get_stylesheet_directory() . "/assets/images/categories/$subc->slug.webp";
            $url = get_stylesheet_directory_uri() . "/assets/images/categories/$subc->slug.webp";

            if(!$term_id) {
                $result['c-' . $subc->parent]->children[] = (object) [
                    'id' => $subc->term_id,
                    'name' => $subc->name,
                    'slug' => $subc->slug,
                    'count' => $subc->count,
                    'parent' => $subc->parent,
                    'img' => file_exists($path) ? $url : mc_get_cat_img($subc->slug),
                    'children' => []
                ];
            }
            else {
                $result['c-'.$c->term_id] = (object) [
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

    return $term_id ? $result['c-' . $term_id] : $result;
}

function mc_get_products($term = null, $perPage = 10, $order = 'DESC', $numPage = 1, $categories = []) {
	$args = [
        'limit' => $perPage,
        'status' => 'publish',
        'orderby' => 'id',
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
				'cats' => $_cats
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

function mc_get_product_image($product_id) {
    $product = wc_get_product($product_id);

    if($product) {
        $oem = $product->get_meta('oem');
        
        if($oem) {
            $path = get_stylesheet_directory() . "/assets/images/products/$oem.webp";
            $url = get_stylesheet_directory_uri() . "/assets/images/products/$oem.webp";
            return file_exists($path) ? $url : null;
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
    $png = file_exists("$slug.png");
    $jpg = file_exists("$slug.jpg");
    $webp = file_exists("$slug.webp");

    $ext = $png ?: ($jpg ?: ($webp ?: null));

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

            $text_3 = get_option('mc_chi_siamo_content');

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
                'third_section' => $text_3 ? stripslashes($text_3) : '',
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

function mc_upload_image_in_theme($img_name, $img_tmp_name, $cat = false) {
    $upload_dir = wp_upload_dir();
    $upload_path = ABSPATH . 'assets/images/' . ($cat ? 'categories/' : '');
    
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

    var_dump(move_uploaded_file($img_tmp_name, $target_file));die;

    if(!move_uploaded_file($img_tmp_name, $target_file))
        return (object) [
            'status' => 'error',
            'message' => 'Errore nel caricamento dell\'immagine'
        ];

    return (object) ['status' => 'success'];
}
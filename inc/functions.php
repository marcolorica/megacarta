<?php

function mc_get_categories_home() {
	$args = [
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
        'parent' => 0
	];

	$product_categories = get_terms($args);

	$res = [];

	if(!empty($product_categories) && !is_wp_error($product_categories)) {
		foreach($product_categories as $category) {
			if($category->term_id == 15)
                continue;

            $path = get_stylesheet_directory() . "/assets/images/categories/$category->slug.webp";
            $url = get_stylesheet_directory_uri() . "/assets/images/categories/$category->slug.webp";
            $img = file_exists($path) ? $url : null;

            if(!$img) {
                $product_args = [
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $category->term_id,
                        ],
                    ],
                ];
    
                $product_ids = get_posts($product_args);
    
                foreach($product_ids as $id) {
                    $img = mc_get_product_image($id);
    
                    if($img)
                        break;
                }
            }

			$res[] = (object) [
				'name' => $category->name,
				'slug' => $category->slug,
				'img' => $img ?: mc_get_logo_src()
			];
		}
	}

	return $res;
}

function mc_get_categories_catalogue($term = null) {
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

            $result['c-'.$c->term_id] = (object) [
                'id' => $c->term_id,
                'name' => $c->name,
                'slug' => $c->slug,
                'count' => $c->count,
                'img' => file_exists($path) ? $url : mc_get_logo_src(),
                'children' => []
            ];
        }
    }

    foreach($subCategories as $subc) {
        if($subc->parent != 0) {
            if(!isset($result['c-' . $subc->parent])) {
                var_dump($subc->name);
                var_dump($result);
                die;
            }

            $path = get_stylesheet_directory() . "/assets/images/categories/$subc->slug.webp";
            $url = get_stylesheet_directory_uri() . "/assets/images/categories/$subc->slug.webp";

            $result['c-' . $subc->parent]->children[] = (object) [
                'id' => $subc->term_id,
                'name' => $subc->name,
                'slug' => $subc->slug,
                'count' => $subc->count,
                'img' => file_exists($path) ? $url : mc_get_logo_src(),
                'children' => []
            ];
        }
    }

    return $result;
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

function mc_get_page_datas($pagina) {
    $return = [];

    switch($pagina) {
        case 'home':
            $return = [
                'title' => 'Home',
                'main_img' => get_option('mc_home_main_img'),
                'categories' => get_option('mc_home_categories'),
                'map_section' => [
                    'title' => get_option('mc_home_map_title'),
                    'text' => get_option('mc_home_map_text'),
                ]
            ];
            break;

        case 'chi-siamo':
            $return = [
                'title' => 'Chi Siamo',
                'main_img' => get_option('mc_chi_siamo_main_img'),
                'first_section' => [
                    'title' => get_option('mc_chi_siamo_title_1'),
                    'text' => get_option('mc_chi_siamo_text_1'),
                    'img' => get_option('mc_chi_siamo_img_1'),
                ],
                'second_section' => [
                    'title' => get_option('mc_chi_siamo_title_2'),
                    'text' => get_option('mc_chi_siamo_text_2'),
                    'img' => get_option('mc_chi_siamo_img_2'),
                ],
                'third_section' => [
                    'p1' => get_option('mc_chi_siamo_content_1'),
                    'p2' => get_option('mc_chi_siamo_content_2')
                ]
            ];
            break;

        case 'contatti':
            $return = [
                'title' => 'Contatti',
                'main_img' => get_option('mc_contatti_main_img'),
                'phone' => get_option('mc_contacts_phone'),
                'whatsapp' => get_option('mc_contacts_whatsapp'),
                'email' => get_option('mc_contacts_email')
            ];
            break;
    }

    $return = (object) array_map(function($info) {
        $info = is_array($info) ? (object) $info : $info;
    }, $return);

    return $return;
}
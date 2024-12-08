<?php

function mc_get_categories_home() {
	$args = [
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
        'parent' => 0
	];

	$product_categories = get_terms($args);

	$res = [];

	if(!empty($product_categories) && !is_wp_error($product_categories)) {
		foreach($product_categories as $category) {
			if($category->term_id == 15)
                continue;

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

            $img = null;
            foreach($product_ids as $id) {
                $img = mc_get_product_image($id);

                if($img)
                    break;
            }

			$res[] = (object) [
				'name' => $category->name,
				'slug' => $category->slug,
				'img' => $img ?: get_stylesheet_directory_uri() . '/assets/images/megacarta-logo.webp'
			];
		}
	}

	return $res;
}

function mc_get_categories_catalogue() {
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
        if(!isset($result['c-'.$c->term_id]))
            $result['c-'.$c->term_id] = (object) [
                'name' => $c->name,
                'slug' => $c->slug,
                'children' => []
            ];
    }

    foreach($subCategories as $subc) {
        if($subc->parent != 0) {
            if(!isset($result['c-' . $subc->parent])) {
                var_dump($subc->name);
                var_dump($result);
                die;
            }

            $result['c-' . $subc->parent]->children[] = (object) [
                'name' => $subc->name,
                'slug' => $subc->slug,
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

			$res[$p->name] = (object) [
                'id' => $id,
				'name' => $p->get_description(),
				'price' => $p->get_price(),
				'url' => get_permalink($id),
				'img' => $img ?: get_stylesheet_directory_uri() . '/assets/images/megacarta-logo.webp',
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
    return $post ? get_the_title($post) == 'Area Admin' || ($post->post_parent && get_the_title($post->post_parent) == 'Area Admin') : false;
}
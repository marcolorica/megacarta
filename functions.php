<?php


function mc_wp_enqueue_scripts() {
	wp_enqueue_style('mc-style',get_stylesheet_directory_uri() . '/style.css', [], md5(uniqid()));
	wp_enqueue_style('mc-owl-custom-css',get_stylesheet_directory_uri() . '/assets/css/owl-mc.css', [], md5(uniqid()));
	wp_enqueue_script('mc-script',get_stylesheet_directory_uri() . '/assets/js/global.js', ['jquery', 'jquery-ui'],  md5(uniqid()));

	wp_localize_script('mc-script','mc', ['ajax_url' => admin_url('admin-ajax.php')]);

	// DIPENDENZE
	wp_enqueue_style('mc-fontawesome-css',get_stylesheet_directory_uri() . '/assets/css/fontawesome.min.css', [], "0.0.1");
	wp_enqueue_style('mc-owl-carousel-css',get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', [], "2.3.4");
	wp_enqueue_style('mc-owl-default-theme-css',get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.css', [], "2.3.4");
	wp_enqueue_style('mc-owl-animate-css',"https://owlcarousel2.github.io/OwlCarousel2/assets/css/animate.css", [], "2.3.4");
	wp_enqueue_style('mc-aos-css',get_stylesheet_directory_uri() . '/assets/css/aos.css', [], "2.3.1");

	wp_enqueue_script('mc-owl-carousel-js',get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], "2.3.4");
	wp_enqueue_script('mc-particles-js',get_stylesheet_directory_uri() . '/assets/js/particles.min.js', ['jquery'], "2.0.0");
	wp_enqueue_script('jquery-ui',"https://code.jquery.com/ui/1.13.1/jquery-ui.min.js", ['jquery'],  md5(uniqid()));
	wp_enqueue_script('mc-aos-js',get_stylesheet_directory_uri() . '/assets/js/aos.js', ['jquery'], "2.3.1");

	wp_enqueue_style('swal2-css', "https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css", [], "11.10.0");
    wp_enqueue_script('swal2-js', "https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js", [], "11.10.0");
}

function get_mc_categories() {
	$args = [
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
	];

	$product_categories = get_terms($args);

	$res = [];

	if(!empty($product_categories) && !is_wp_error($product_categories)) {
		foreach($product_categories as $category) {
			if($category->term_id == 15)
                continue;

			$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            
			$img = '';

            if($thumbnail_id)
                $img = wp_get_attachment_url($thumbnail_id);

			$res[] = (object) [
				'name' => $category->name,
				'slug' => $category->slug,
				'img' => $img,
				'sizes' => [
					'topout' => '',
					'topin' => '',
					'base' => '',
					'depth' => '',
					'capacity' => ''
				]
			];
		}
	}

	return $res;
}

function get_mc_products() {
	$args = [
        'limit'    => -1,
        'status'   => 'publish',
	];

    $query = new WC_Product_Query($args);
    $products = $query->get_products();

	$res = [];

    $baseDir = get_stylesheet_directory_uri();

    if(!empty($products)) {
        foreach($products as $product) {
            $code = $product->get_name();
            $imgCode = $imgCode = str_replace('/', '-', $code);
			$img = "$baseDir/assets/images/products/$imgCode.webp";

			$res[$product->name] = (object) [
				'name' => $product->get_description(),
				'price' => wc_price($product->get_price),
				'url' => get_permalink($product->get_id()),
				'img' => $img,
                'sizes' => $product->get_meta_data('sizes')
			];
        }
    }

    // echo '<pre>'; var_dump($products); echo '</pre><br><br><br>';
    // echo '<pre>'; var_dump($res); die;

	return $res;
}

add_action('wp_enqueue_scripts', 'mc_wp_enqueue_scripts');

function populate_products() {
	$products = [
        'R10G' => [
            'sizes' => [
                'topout' => '150 x 125mm',
                'topin' => '134 x 109mm',
                'base' => '107 x  82mm',
                'depth' => '44mm',
                'capacity' => '490cm3'
            ],
            'name' => 'Vaschetta alluminio 1 porzione bordo G',
            'price' => '9.99',
        ],
        'R1G' => [
            'sizes' => [
                'topout' => '210 x 140mm',
                'topin' => '195 x 125mm',
                'base' => '175 x 105mm',
                'depth' => '38mm',
                'capacity' => '800cm3'
            ],
            'name' => 'Vaschetta alluminio 2 porzioni bordo G',
            'price' => '9.99',
        ],
        'R11G' => [
            'sizes' => [
                'topout' => '27 x 177mm',
                'topin' => '212 x 162mm',
                'base' => '197 x 147mm',
                'depth' => '36mm',
                'capacity' => '1190 cm3'
            ],
            'name' => 'Vaschetta alluminio 4 porzioni bordo G',
            'price' => '9.99',
        ],
        'R2G' => [
            'sizes' => [
                'topout' => '314 x 213mm',
                'topin' => '292 x 191mm',
                'base' => '277 x 176mm',
                'depth' => '43mm',
                'capacity' => '2450 cm3'
            ],
            'name' => 'Vaschetta alluminio 6 porzioni bordo G',
            'price' => '9.99',
        ],
        'R31G' => [
            'sizes' => [
                'topout' => '322 x 262mm',
                'topin' => '298 x 238mm',
                'base' => '273 x 213mm',
                'depth' => '50mm',
                'capacity' => '3260cm3'
            ],
            'name' => 'Vaschetta alluminio 8 porzioni bordo G',
            'price' => '9.99',
        ],
        // 'CR535 - CR885G' => [
        //     'sizes' => [
        //         'topoutlid' => '625 x 525mm',
        //         'topinlid' => '39mm'
        //     ],
        //     'name' => 'Coperchio per vaschetta alluminio 18 porzioni',
        //     'price' => '9.99'
        // ],
        'R535G' => [
            'sizes' => [
                'topout' => '525 x 325mm',
                'topin' => '497 x 295mm',
                'base' => '473 x 271mm',
                'depth' => '39mm',
                'capacity' => '5350cm3'
            ],
            'name' => 'Vaschetta alluminio 18 porzioni bassa bordo G',
            'price' => '9.99',
        ],
        'R99G' => [
            'sizes' => [
                'topout' => '395 x 325mm',
                'topin' => '368 x 298mm',
                'base' => '345 x 275mm',
                'depth' => '45mm',
                'capacity' => '4600cm3'
            ],
            'name' => 'Vaschetta alluminio 12 porzioni bordo G',
            'price' => '9.99',
        ],
        'R885G' => [
            'sizes' => [
                'topout' => '527 x 325mm',
                'topin' => '497 x 295mm',
                'base' => '455 x 253mm',
                'depth' => '67mm',
                'capacity' => '8850 cm3'
            ],
            'name' => 'Vaschetta alluminio 18 porzioni bordo G',
            'price' => '9.99',
        ],
        'CR535G - CR885G' => [
            'sizes' => [
                'topoutlid' => '625 x 525mm',
                'topinlid' => '39mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 18 porzioni',
            'price' => '9.99',
        ],
        'R28L' => [
            'sizes' => [
                'topout' => '145 x 120mm',
                'topin' => '128 x 104mm',
                'base' => '105 x 80mm',
                'depth' => '40mm',
                'capacity' => '470cm3'
            ],
            'name' => 'Vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'CR23L-R28L' => [
            'sizes' => [
                'topoutlid' => '141 x 115mm',
                'topinlid' => '121 x 95mm',
                'depthlid' => '21mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'CR28L-CA - CR33L-CA' => [
            'sizes' => [
                'topoutlid' => '140 x 115mm',
            ],
            'name' => 'Coperchio per vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'R8L' => [
            'sizes' => [
                'topout' => '192 x 140mm',
                'topin' => '175 x 123mm',
                'base' => '159 x 107mm',
                'depth' => '30mm',
                'capacity' => '585cm3'
            ],
            'name' => 'Vaschetta alluminio 2 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR8L-CA - CR108L-CA' => [
            'sizes' => [
                'topoutlid' => '185 x 133mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 2 porzioni bordo L',
            'price' => '9.99',
        ],
        'R29L' => [
            'sizes' => [
                'topout' => '225 x 175mm',
                'topin' => '208 x 158mm',
                'base' => '200 x 150mm',
                'depth' => '35mm',
                'capacity' => '1125cm3'
            ],
            'name' => 'Vaschetta alluminio 4 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR29L-CA' => [
            'sizes' => [
                'topoutlid' => '218 x 168mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 4 porzioni bordo L',
            'price' => '9.99',
        ],
        'R2L' => [
            'sizes' => [
                'topout' => '318 x 214mm',
                'topin' => '296 x 192mm',
                'base' => '280 x 176mm',
                'depth' => '39mm',
                'capacity' => '2380cm3'
            ],
            'name' => 'Vaschetta alluminio 6 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR2L-CA' => [
            'sizes' => [
                'topoutlid' => '309 x 209mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 6 porzioni bordo L',
            'price' => '9.99',
        ],
        'R80L' => [
            'sizes' => [
                'topout' => '227 x 177mm',
                'topin' => '209 x 161mm',
                'base' => '197 x 147mm',
                'depth' => '30mm',
                'capacity' => '350/480cm3'
            ],
            'name' => 'Vaschetta alluminio tris comparto',
            'price' => '9.99',
        ],
        'CR80L-CA - CR81L-CA - CR808L-CA' => [
            'sizes' => [
                'topoutlid' => '220 x 173mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio tris comparto',
            'price' => '9.99'
        ],
        'R31L' => [
            'sizes' => [
                'topout' => '322 x 262mm',
                'topin' => '300 x 240mm',
                'base' => '273 x 213mm',
                'depth' => '50mm',
                'capacity' => '3240cm3'
            ],
            'name' => 'Vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR31L' => [
            'sizes' => [
                'topoutlid' => '314 x 254mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR31L-CA' => [
            'sizes' => [
                'topoutlid' => '314 x 254mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'Roll 300/125m' => [
            'sizes' => [
                'roll' => '',
                'roll-bw' => '292mm',
                'roll-l' => '125m',
                'roll-box' => '9',
                'roll-pallet' => '450',
                'roll-pallet-plus' => '50'
            ],
            'name' => 'Roll alluminio 125metri',
            'price' => '9.99',
        ],
        'Roll 300/300m' => [
            'sizes' => [
                'roll' => '',
                'roll-bw' => '300mm',
                'roll-l' => '300m',
                'roll-box' => '9',
                'roll-pallet' => '675',
                'roll-pallet-plus' => '75'
            ],
            'name' => 'Roll pellicola 300metri',
            'price' => '9.99',
        ],
        'Foglio 5kg' => [
            'sizes' => [
                'base' => '600 x 400mm',
                'roll-box' => '500',
                'roll-pallet' => '128'
            ],
            'name' => 'Carta forno rettangolare 40x60 confezioni da 5kg',
            'price' => '9.99',
        ],
        'Roll 330/50m' => [
            'sizes' => [
                'roll-2' => '',
                'roll-bw' => '330mm',
                'roll-l' => '50m',
                'roll-box' => '9',
                'roll-pallet' => '432',
                'roll-pallet-plus' => '48'
            ],
            'name' => 'Roll carta forno 50metri',
            'price' => '9.99',
        ]
    ];

	foreach($products as $name => $prod) {
		$prod = (object) $prod;

		$product = new WC_Product_Simple();
		$product->set_name($name);
		$product->set_description($prod->name);
		$product->set_regular_price($prod->price);
		$product->set_status('publish');
		$product->update_meta_data('sizes', $prod->sizes);
		$product_id = $product->save();

		$product->save();
	}
}

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

add_action('wp_ajax_nopriv_update_cart_items',"update_cart_items");
add_action('wp_ajax_update_cart_items',"update_cart_items");

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

add_action('wp_ajax_nopriv_remove_cart_item',"remove_cart_item");
add_action('wp_ajax_remove_cart_item',"remove_cart_item");
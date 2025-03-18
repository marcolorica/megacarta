<?php

require_once 'load.php';





















// DEPRECATED
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

function _new_import_products() {
    $uploads = wp_upload_dir();
    $csvPath = $uploads['basedir'] . '/megacarta1.csv';

    $categories = get_terms('product_cat', [
        'hide_empty' => 0,
        'orderby' => 'ASC',
        'parent' => 0
    ]);

    $categories = array_map(function($category) {
        $category->name = strtolower($category->name);
        return $category;
    }, $categories);

    $_subCategories = get_terms('product_cat', [
        'hide_empty' => 0,
        'orderby' => 'ASC'
    ]);

    $subCategories = [];

    foreach($_subCategories as $subc) {
        if($subc->parent != 0) {
            if(!isset($subCategories['c-' . $subc->parent]))
                $subCategories['c-' . $subc->parent] = [];
    
            $subCategories['c-' . $subc->parent][] = $subc;
        }
    }

    if(file_exists($csvPath)) {
        if(($handle = fopen($csvPath, "r")) !== false) {
            while(($data = fgetcsv($handle, 10000, ",")) !== false) {
                $code = $data[0];
                $oem = $data[1];
                $name = $data[3];
                $cat = $data[4];
                $subCat = $data[5];
                $um = $data[6] ?: '';
                $qtPz = $data[7] ?: '';
                $price = $data[8] ? floatval($data[8]) : '';

                if($code != 'Codice') {
                    $product = new WC_Product_Simple();
                    $product->set_sku($code);
                    $product->set_name($code);
                    $product->set_description($name);
                    $product->set_regular_price($price);
                    $product->set_status('publish');

                    $product->update_meta_data('oem', $oem);
                    $product->update_meta_data('um', $um);
                    $product->update_meta_data('qt_pz', $qtPz);
                    $product_id = $product->save();

                    $category_id = null;
                    $subcategory_id = null;

                    foreach($categories as $c) {
                        if(strtolower($c->name) == strtolower($cat))
                            $category_id = $c->term_id;
                    }
                    
                    if($subCat) {
                        foreach($subCategories as $parent => $childs) {
                            $parent_id = intval(str_replace('c-', '', $parent));
            
                            foreach($childs as $ch) {
                                if(strtolower($ch->name) == strtolower($subCat) && $parent_id == $category_id) {
                                    $subcategory_id = $ch->term_id;
                                    break;
                                }
                            }
                        }
                    }
                    else {
                        $subcategory_id = $category_id;
                    }

                    wp_set_object_terms($product_id, [$subcategory_id], 'product_cat');
                }
            }
        }
    }
}

function new_import_products() {
    $uploads = wp_upload_dir();

    $prodsPath = $uploads['basedir'] . '/megacarta-prods.csv';
    $descsPath = $uploads['basedir'] . '/megacarta-descs.csv';

    $descs = [];

    $not = [];
    $notSkus = [];

    if(file_exists($descsPath)) {
        if(($handle = fopen($descsPath, "r")) !== false) {
            while(($data = fgetcsv($handle, 10000, ",")) !== false) {
                $codes = $data[0];
                $desc = explode('-', str_replace(' ', '', $data[1]));

                foreach($codes as $code) {
                    $descs[$code] = $desc;
                }
            }
        }
    }

    if(file_exists($prodsPath)) {
        if(($handle = fopen($prodsPath, "r")) !== false) {
            while(($data = fgetcsv($handle, 10000, ",")) !== false) {
                $sku = $data[0];
                $name = $data[3];

                $price = $data[8] ? (float) $data[8] : 0;
                $price += ($price / 100 * 20);

                if($sku != 'Codice') {
                    $products = wc_get_products(['sku' => $sku]);
                    $product = reset($products);

                    var_dump($product);die;

                    if($product) {
                        $product->set_sku($sku);
                        $product->set_name($name);
                        $product->set_description($code);
                    var_dump($sku, $price, $data[8]);die;
                        
                        $product->set_price($price);
                        $product->set_regular_price($price);
                        
                        $product->save();

                        var_dump($price);
                        die;

                    } else {
                        $notSkus[] = $code;
                    }
                }
            }
        }
    }

    var_dump($not, $notSkus);
}

function align_product_prices() {
    $uploads = wp_upload_dir();
    $csvPath = $uploads['basedir'] . '/megacarta1.csv';

    if(file_exists($csvPath)) {
        if(($handle = fopen($csvPath, "r")) !== false) {
            while(($data = fgetcsv($handle, 10000, ",")) !== false) {
                $code = $data[0];
                $price = $data[8] ? floatval(str_replace(',', '.', $data[8])) : 0;

                if($code != 'Codice') {
                    $product_id = wc_get_product_id_by_sku($code);

                    if(!$product_id)
                        return false;
                
                    $product = wc_get_product($product_id);
                
                    if(!$product)
                        return false;
                
                    $product->set_regular_price($price);

                    $product->save();
                }
            }
        }
    }
}

function create_woocommerce_categories_programmatically() {
    $toInsert = [
        'Igiene' => [],
        'Alluminio' => [
            'Coperchi per vaschette',
            'Vaschette bordo G',
            'Vaschette bordo L',
            'Vassoi ovali'
        ],
        'Rotoli' => [
            'Alluminio',
            'Carta forno',
            'Pellicola trasparente'
        ],
        'Pizzeria/Rostticceria' => [
            'Carta',
            'Cartone',
            'Spiedini'
        ],
        'Biodegradabile' => [
            'Piatti',
            'Barchette',
            'Bicchieri',
            'Cannucce',
            'Contenitori',
            'Posate'
        ],
        'Plastica/Polipropilene/PET' => [
            'Bicchieri',
            'Coperchi',
            'Insalatiere',
            'Porta bibite'
        ],
        'Take Away' => [
            'Bicchieri',
            'Bowl',
            'Box Burger',
            'Porta fritti',
            'Shopper',
            'Vaschette'
        ],
        'Tovaglioli/Tovaglie/Tovagliette' => [
            'Porta posate',
            'Tovaglie',
            'Tovagliette',
            'Tovaglioli'
        ],
        'Linea Hotel/Guanti' => [
            'Doccia',
            'Guanti',
            'Linee cortesia'
        ],
        'Buste' => [],
        'Ufficio/Casse' => [],
        'Articoli per la pulizia/Dispenser' => [
            'Dispenser',
            'Strumenti',
            'Ricambi'
        ],
        'Detersivi/Detergenti/Igienizzanti' => [
            'Igienizzanti',
            'Detersivi',
            'Detergenti'
        ],
        'Pasticceria' => [
            'Candeline',
            'Carta',
            'Vassoi',
            'Dischi',
            'Scatole'
        ],
        'Sushi e Altro' => [
            'Contenitori in carta',
            'Contenitori in PET',
            'Bacchette'
        ]
    ];

    foreach($toInsert as $c => $ss) {
        $parent_category = wp_insert_term($c, 'product_cat', ['slug' => cat_to_slug($c), 'description' => '']);
        
        if(!is_wp_error($parent_category)) {
            $parent_id = $parent_category['term_id'];
    
            foreach($ss as $s) {
                wp_insert_term($s, 'product_cat', ['slug' => cat_to_slug($c, $s), 'parent' => $parent_id, 'description' => '']);
            }
        }
    }
}

function cat_to_slug($cat, $subcat = null) {
    $cat = str_replace(' ', '-', str_replace('/', '-', strtolower($cat)));

    if($subcat)
        $cat .= '-' . str_replace(' ', '-', str_replace('/', '-', strtolower($subcat)));
    
    return $cat;
}

function upTo20PercentsProductPrices() {
    $query = new WC_Product_Query(['status' => 'publish']);
    $products = $query->get_products();

    if(!empty($products)) {
        foreach($products as $product) {
            $actual_price = $product->get_price();
            $new_price = $actual_price + ($actual_price / 100 * 20);

            $product->set_regular_price($new_price);
            $product->save();
        }
    }
}

function import_new_images() {
    $destinationPath = get_stylesheet_directory() . '/assets/images/products';

    $ok = [];
    $notOk = [];

    $evaluate = [
        (object) [
            'name' => '97057',
            'ext' => 'jpg',
            'news' => [
                '97064',
                '97071',
                '97095'
            ]
        ],
        (object) [
            'name' => '95522',
            'ext' => 'png',
            'news' => [
                '87904',
                '87905'
            ]
        ],
        (object) [
            'name' => '29120',
            'ext' => 'jpg',
            'news' => [
                '29236',
                '29137',
                '63613'
            ]
        ],
        (object) [
            'name' => '119LN01',
            'ext' => 'jpg',
            'news' => [
                '119LN02',
                '119LN03',
                '119LN03B',
                '119LN04B',
            ]
        ],
        (object) [
            'name' => '63279',
            'ext' => 'webp',
            'news' => [
                '36981',
                '63361',
                '66115'
            ]
        ],
        (object) [
            'name' => '60367',
            'ext' => 'jpg',
            'news' => [
                '60366'
            ]
        ],
        (object) [
            'name' => '542050',
            'ext' => 'jpg',
            'news' => [
                '544060'
            ]
        ],
        (object) [
            'name' => '542060',
            'ext' => 'webp',
            'news' => [
                '544160'
            ]
        ],
        (object) [
            'name' => 'H071000',
            'ext' => 'jpg',
            'news' => [
                'H020250',
                'H030375',
                'H040500',
                'H060750'
            ]
        ],
        (object) [
            'name' => 'ST1000TP',
            'ext' => 'jpg',
            'news' => [
                'ST1500TP',
                'ST0750TP',
                'OK375',
                'OK500'
            ]
        ],
        (object) [
            'name' => 'OK250',
            'ext' => 'jpg',
            'news' => [
                'OK1050',
                'OK600',
                'OK750'
            ]
        ],
        (object) [
            'name' => 'ST2',
            'ext' => 'webp',
            'news' => [
                'DS2116F30',
                'DS2114F30',
                'DS1409F30',
                'DS1610F30',
                'DS1911F30',
                'DS1105F30',
                'DS1406F30',
                'DS1906F30',
                'ST3',
                'ST4'
            ]
        ],
        (object) [
            'name' => '93974',
            'ext' => 'jpg',
            'news' => [
                '98092',
                '98665'
            ]
        ],
        (object) [
            'name' => '28321',
            'ext' => 'jpg',
            'news' => [
                '28413'
            ]
        ],
        (object) [
            'name' => 'BC100CAR109PP',
            'ext' => 'jpg',
            'news' => [
                'BC230CAR109PP',
                'BC260CAR109PP',
                'BC365CAR109PP',
                'BC450CAR109PP'
            ]
        ]
    ];
    
    foreach($evaluate as $oem) {
        $sourcePath = "$destinationPath/$oem->name.$oem->ext";
        
        foreach($oem->news as $new) {
            $destPath = "$destinationPath/$new.$oem->ext";
            
            if(file_exists($sourcePath)) {
                $copy = copy($sourcePath, $destPath);

                $arr = $copy ? 'ok' : 'notOk';
                $$arr[] = $new;
            }
        }
    }

    echo '<p>OK: ' . count($ok) . '</p>';

    if(count($ok)) {
        echo '<pre>'; print_r($ok); echo '</pre>';
    }

    echo '<p>Immagini per le quali non è riuscita la copia: ' . count($notOk) . '</p>';

    if(count($notOk)) {
        echo '<pre>'; print_r($notOk); echo '</pre>';
    }
}

function check_oems() {
    $args = [
        'status' => 'publish',
        'limit' => -1
    ];

    $query = new WC_Product_Query($args);
    $products = $query->get_products();

	$oems = [];
    
    foreach($products as $p) {
        $oems[] = $p->get_meta('oem');
    }

    $counts = array_count_values($oems);
    $duplicates = array_filter($counts, function($count) {
        return $count > 1;
    });

    var_dump(array_keys($duplicates));
}
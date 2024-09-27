<?php get_header(); ?>

<?php $products = get_mc_products(); ?>

<?php
    $products = [
        'R1G' => [
            'sizes' => [
                'c1' => '210 x 140mm',
                'c2' => '195 x 125mm',
                'c3' => '175 x 105mm',
                'c4' => '38mm',
                '' => '800cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R11G' => [
            'sizes' => [
                '' => '27 x 177mm',
                '' => '212 x 162mm',
                '' => '197 x 147mm',
                '' => '36mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R2G' => [
            'sizes' => [
                '' => '314 x 213mm',
                '' => '292 x 191mm',
                '' => '277 x 176mm',
                '' => '43mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'RG31G' => [
            'sizes' => [
                '322 x 262mm',
                '298 x 238mm',
                '273 x 213mm',
                '50mm',
                '3260cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR535-CR885G' => [
            'sizes' => [
                '625 x 525mm',
                '39mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99'
        ],
        'R535G' => [
            'sizes' => [
                '525 x 325mm',
                '497 x 295mm',
                '473 x 271mm',
                '39mm',
                '5350cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R99G' => [
            'sizes' => [
                '395 x 325mm',
                '368 x 298mm',
                '345 x 275mm',
                '45mm',
                '4600cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R885G' => [
            'sizes' => [
                '527 x 325mm',
                '497 x 295mm',
                '455 x 253mm',
                '67mm',
                '8850 cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR535G-CR885G' => [
            'sizes' => [
                '625 x 525mm',
                '39mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R28L' => [
            'sizes' => [
                '145 x 120mm',
                '128 x 104mm',
                '105 x 80mm',
                '40mm',
                '470cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR23L-R28L' => [
            'sizes' => [
                '141 x 115mm',
                '121 x 95mm',
                '21mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR28L-CA - CR33L-CA' => [
            'sizes' => [
                '140 x 115mm',
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R8L' => [
            'sizes' => [
                '192 x 140mm',
                '175 x 123mm',
                '159 x 107mm',
                '30mm',
                '585cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR8L-CA - CR108L-CA' => [
            'sizes' => [
                '185 x 133mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R29L' => [
            'sizes' => [
                '225 x 175mm',
                '208 x 158mm',
                '200 x 150mm',
                '35mm',
                '1125cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR29L-CA' => [
            'sizes' => [
                '218 x 168mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R2L' => [
            'sizes' => [
                '318 x 214mm',
                '296 x 192mm',
                '280 x 176mm',
                '39mm',
                '2380cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR2L-CA' => [
            'sizes' => [
                '309 x 209mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'R80L' => [
            'sizes' => [
                '227 x 177mm',
                '209 x 161mm',
                '197 x 147mm',
                '30mm',
                '350/480cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR80L-CA - CR81L-CA - CR808L-CA' => [
            'sizes' => [
                '220 x 173mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99'
        ],
        'R31L' => [
            'sizes' => [
                '322 x 262mm',
                '300 x 240mm',
                '273 x 213mm',
                '50mm',
                '3240cm3'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR31L' => [
            'sizes' => [
                '314 x 254mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'CR31L-CA' => [
            'sizes' => [
                '314 x 254mm'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'Roll 300/125m' => [
            'sizes' => [
                '292mm 125m',
                '9',
                '450',
                '50'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'Roll 300/300m' => [
            'sizes' => [
                '300mm',
                '300m',
                '9',
                '675',
                '75'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'Foglio 5kg' => [
            'sizes' => [
                '600 x 400mm',
                '500',
                '128'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ],
        'Roll 330/50m' => [
            'sizes' => [
                '330mm',
                '50m',
                '9',
                '432',
                '48'
            ],
            'name' => 'Nome Prodotto',
            'price' => '9.99',
        ]
    ];

?>

<section class="intestazione">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="mc-overlay w-100">
                    <h1>CATALOGO</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="catalogo">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="main-title">Esplora il nostro catalogo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="breadcrumb"><a href="/">Home</a> / Catalogo</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">Piatti</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-1"><input id="cat-1" type="checkbox">Circolari</label>
                                <label for="cat-2"><input id="cat-2" type="checkbox">Quadrati</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">Wrinklewall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-3"><input id="cat-3" type="checkbox">Ovali</label>
                                <label for="cat-4"><input id="cat-4" type="checkbox">Formati Speciali E Vassoi</label>
                                <label for="cat-5"><input id="cat-5" type="checkbox">Circolari</label>
                                <label for="cat-6"><input id="cat-6" type="checkbox">A Scompartimento</label>
                                <label for="cat-7"><input id="cat-7" type="checkbox">Rettangolari E Quadrati</label>
                                <label for="cat-8"><input id="cat-8" type="checkbox">Laccati</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">Smoothwall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-9"><input id="cat-9" type="checkbox">Rettangolari</label>
                                <label for="cat-11"><input id="cat-11" type="checkbox">Ovali</label>
                                <label for="cat-12"><input id="cat-12" type="checkbox">Circolari</label>
                                <label for="cat-13"><input id="cat-13" type="checkbox">Formati Speciali</label>
                                <label for="cat-14"><input id="cat-14" type="checkbox">Laccati</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">Semi Smoothwall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-15"><input id="cat-15" type="checkbox">Circolari</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="true" aria-controls="panelsStayOpen-collapseSix">Sistemi Di Chiusura</button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-16"><input id="cat-16" type="checkbox">Coperchi</label>
                                <label for="cat-17"><input id="cat-17" type="checkbox">Nastro In Alluminio</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeven">PET</button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-18"><input id="cat-18" type="checkbox">Rettangolari</label>
                                <label for="cat-19"><input id="cat-19" type="checkbox">Ovali</label>
                                <label for="cat-20"><input id="cat-20" type="checkbox">Circolari</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">Rotoli di alluminio</button>
                        </h2>
                        <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <!-- <label for=""><input type="checkbox">ao</label> -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">Pellicole</button>
                        </h2>
                        <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <!-- <label for=""><input type="checkbox">ao</label> -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="true" aria-controls="panelsStayOpen-collapseTen">Carta forno</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <label for="cat-22"><input id="cat-22" type="checkbox">Rotoli In Carta Forno</label>
                                <label for="cat-23"><input id="cat-23" type="checkbox">Carta Forno In Fogli</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 products">
                <?php foreach($products as $code => $p): $p = (object) $p; ?>
                    <div class="row">
                        <div class="col-3 p-0">
                            <a href="<?= $p->url ?>">
                                <div class="img-container">
                                    <img src="<?= get_stylesheet_directory_uri() . '/assets/images/products/' . str_replace('/', '-', $code) . '.webp' ?>" class="w-100 p-img">
                                </div>
                            </a>
                        </div>
                        <div class="col-9">
                            <a href="<?= $p->url ?>">
                                <p class="product-title"><?= $code ?></p>
                                <p class="product-desc"><?= $p->name ?></p>
                            </a>
                            <div class="product-info">
                                <div class="d-block w-100">
                                    <div class="product-sizes w-100">
                                        <div class="p-info">
                                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/c1.webp' ?>">
                                            <span><?php //$p->sizes['c1'] ?></span>
                                        </div>
                                        <div class="p-info">
                                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/c2.webp' ?>">
                                            <span><?php //$p->sizes['c2'] ?></span>
                                        </div>
                                        <div class="p-info">
                                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/c3.webp' ?>">
                                            <span><?php //$p->sizes['c3'] ?></span>
                                        </div>
                                        <div class="p-info">
                                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/c4.webp' ?>">
                                            <span><?php //$p->sizes['c4'] ?></span>
                                        </div>
                                        <div class="p-info">
                                            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/c5.webp' ?>">
                                            <span><?php //$p->sizes['c5'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block w-100 pt-3">
                                    <div class="product-actions mt-3">
                                        <span class="mg-price">€<?= $p->price ?></span>
                                        <button class="btn btn-outline-primary"><i class="fa-solid fa-shopping-cart me-2"></i>Aggiungi al carrello</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
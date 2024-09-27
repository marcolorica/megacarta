<?php get_header(); ?>

<?php $products = get_mc_products(); ?>

<?php
    $products = [
        'R10G' => [
            'sizes' => [
                'c1' => '150 x 125mm',
                'c2' => '134 x 109mm',
                'c3' => '107 x  82mm',
                'c4' => '44mm',
                'c5' => '490cm3'
            ],
            'name' => 'Vaschetta alluminio 1 porzione bordo G',
            'price' => '9.99',
        ],
        'R1G' => [
            'sizes' => [
                'c1' => '210 x 140mm',
                'c2' => '195 x 125mm',
                'c3' => '175 x 105mm',
                'c4' => '38mm',
                'c5' => '800cm3'
            ],
            'name' => 'Vaschetta alluminio 2 porzioni bordo G',
            'price' => '9.99',
        ],
        'R11G' => [
            'sizes' => [
                'c1' => '27 x 177mm',
                'c2' => '212 x 162mm',
                'c3' => '197 x 147mm',
                'c4' => '36mm',
                'c5' => '1190 cm3'
            ],
            'name' => 'Vaschetta alluminio 4 porzioni bordo G',
            'price' => '9.99',
        ],
        'R2G' => [
            'sizes' => [
                'c1' => '314 x 213mm',
                'c2' => '292 x 191mm',
                'c3' => '277 x 176mm',
                'c4' => '43mm',
                'c5' => '2450 cm3'
            ],
            'name' => 'Vaschetta alluminio 6 porzioni bordo G',
            'price' => '9.99',
        ],
        'R31G' => [
            'sizes' => [
                'c1' => '322 x 262mm',
                'c2' => '298 x 238mm',
                'c3' => '273 x 213mm',
                'c4' => '50mm',
                'c5' => '3260cm3'
            ],
            'name' => 'Vaschetta alluminio 8 porzioni bordo G',
            'price' => '9.99',
        ],
        'CR535 - CR885G' => [
            'sizes' => [
                'cr1' => '625 x 525mm',
                'cr2' => '39mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 18 porzioni',
            'price' => '9.99'
        ],
        'R535G' => [
            'sizes' => [
                'c1' => '525 x 325mm',
                'c2' => '497 x 295mm',
                'c3' => '473 x 271mm',
                'c4' => '39mm',
                'c5' => '5350cm3'
            ],
            'name' => 'Vaschetta alluminio 18 porzioni bassa bordo G',
            'price' => '9.99',
        ],
        'R99G' => [
            'sizes' => [
                'c1' => '395 x 325mm',
                'c2' => '368 x 298mm',
                'c3' => '345 x 275mm',
                'c4' => '45mm',
                'c5' => '4600cm3'
            ],
            'name' => 'Vaschetta alluminio 12 porzioni bordo G',
            'price' => '9.99',
        ],
        'R885G' => [
            'sizes' => [
                'c1' => '527 x 325mm',
                'c2' => '497 x 295mm',
                'c3' => '455 x 253mm',
                'c4' => '67mm',
                'c5' => '8850 cm3'
            ],
            'name' => 'Vaschetta alluminio 18 porzioni bordo G',
            'price' => '9.99',
        ],
        'CR535G-CR885G' => [
            'sizes' => [
                'cr1' => '625 x 525mm',
                'cr2' => '39mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 18 porzioni',
            'price' => '9.99',
        ],
        'R28L' => [
            'sizes' => [
                'c1' => '145 x 120mm',
                'c2' => '128 x 104mm',
                'c3' => '105 x 80mm',
                'c4' => '40mm',
                'c5' => '470cm3'
            ],
            'name' => 'Vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'CR23L-R28L' => [
            'sizes' => [
                'cr1' => '141 x 115mm',
                'cr2' => '121 x 95mm',
                'cr3' => '21mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'CR28L-CA - CR33L-CA' => [
            'sizes' => [
                'cr1' => '140 x 115mm',
            ],
            'name' => 'Coperchio per vaschetta alluminio 1 porzione bordo L',
            'price' => '9.99',
        ],
        'R8L' => [
            'sizes' => [
                'c1' => '192 x 140mm',
                'c2' => '175 x 123mm',
                'c3' => '159 x 107mm',
                'c4' => '30mm',
                'c5' => '585cm3'
            ],
            'name' => 'Vaschetta alluminio 2 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR8L-CA - CR108L-CA' => [
            'sizes' => [
                'cr1' => '185 x 133mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 2 porzioni bordo L',
            'price' => '9.99',
        ],
        'R29L' => [
            'sizes' => [
                'c1' => '225 x 175mm',
                'c2' => '208 x 158mm',
                'c3' => '200 x 150mm',
                'c4' => '35mm',
                'c5' => '1125cm3'
            ],
            'name' => 'Vaschetta alluminio 4 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR29L-CA' => [
            'sizes' => [
                'cr1' => '218 x 168mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 4 porzioni bordo L',
            'price' => '9.99',
        ],
        'R2L' => [
            'sizes' => [
                'c1' => '318 x 214mm',
                'c2' => '296 x 192mm',
                'c3' => '280 x 176mm',
                'c4' => '39mm',
                'c5' => '2380cm3'
            ],
            'name' => 'Vaschetta alluminio 6 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR2L-CA' => [
            'sizes' => [
                'cr1' => '309 x 209mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 6 porzioni bordo L',
            'price' => '9.99',
        ],
        'R80L' => [
            'sizes' => [
                'c1' => '227 x 177mm',
                'c2' => '209 x 161mm',
                'c3' => '197 x 147mm',
                'c4' => '30mm',
                'c5' => '350/480cm3'
            ],
            'name' => 'Vaschetta alluminio tris comparto',
            'price' => '9.99',
        ],
        'CR80L-CA - CR81L-CA - CR808L-CA' => [
            'sizes' => [
                'cr1' => '220 x 173mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio tris comparto',
            'price' => '9.99'
        ],
        'R31L' => [
            'sizes' => [
                'c1' => '322 x 262mm',
                'c2' => '300 x 240mm',
                'c3' => '273 x 213mm',
                'c4' => '50mm',
                'c5' => '3240cm3'
            ],
            'name' => 'Vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR31L' => [
            'sizes' => [
                'cr1' => '314 x 254mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'CR31L-CA' => [
            'sizes' => [
                'cr1' => '314 x 254mm'
            ],
            'name' => 'Coperchio per vaschetta alluminio 8 porzioni bordo L',
            'price' => '9.99',
        ],
        'Roll 300/125m' => [
            'sizes' => [
                'rl1' => '',
                'rl2' => '292mm',
                'rl3' => '125m',
                'rl4' => '9',
                'rl5' => '450',
                'rl6' => '50'
            ],
            'name' => 'Roll alluminio 125metri',
            'price' => '9.99',
        ],
        'Roll 300/300m' => [
            'sizes' => [
                'rl1' => '',
                'rl2' => '300mm',
                'rl3' => '300m',
                'rl4' => '9',
                'rl5' => '675',
                'rl6' => '75'
            ],
            'name' => 'Roll pellicola 300metri',
            'price' => '9.99',
        ],
        'Foglio 5kg' => [
            'sizes' => [
                'c3' => '600 x 400mm',
                'rl4' => '500',
                'rl5' => '128'
            ],
            'name' => 'Carta forno rettangolare 40x60 confezioni da 5kg',
            'price' => '9.99',
        ],
        'Roll 330/50m' => [
            'sizes' => [
                'rl7' => '',
                'rl2' => '330mm',
                'rl3' => '50m',
                'rl4' => '9',
                'rl5' => '432',
                'rl6' => '48'
            ],
            'name' => 'Roll carta forno 50metri',
            'price' => '9.99',
        ]
    ];

    $mobile = wp_is_mobile();
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
                <p class="mg-breadcrumb"><a href="/">Home</a> / Catalogo</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseTwo">Piatti</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
                            <div class="accordion-body">
                                <label for="cat-1"><input id="cat-1" type="checkbox">Circolari</label>
                                <label for="cat-2"><input id="cat-2" type="checkbox">Quadrati</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseThree">Wrinklewall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
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
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseFour">Smoothwall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
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
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseFive">Semi Smoothwall</button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
                            <div class="accordion-body">
                                <label for="cat-15"><input id="cat-15" type="checkbox">Circolari</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseSix">Sistemi Di Chiusura</button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
                            <div class="accordion-body">
                                <label for="cat-16"><input id="cat-16" type="checkbox">Coperchi</label>
                                <label for="cat-17"><input id="cat-17" type="checkbox">Nastro In Alluminio</label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseSeven">PET</button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
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
                            <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapseTen">Carta forno</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
                            <div class="accordion-body">
                                <label for="cat-22"><input id="cat-22" type="checkbox">Rotoli In Carta Forno</label>
                                <label for="cat-23"><input id="cat-23" type="checkbox">Carta Forno In Fogli</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 products">
                <?php
                    foreach($products as $code => $p):
                        $p = (object) $p;
                        $imgCode = str_replace('/', '-', $code);
                ?>
                    <div class="row">
                        <div class="col-3 p-0">
                            <a href="#">
                                <div class="img-container">
                                    <img src="<?= get_stylesheet_directory_uri() . "/assets/images/products/$imgCode.webp" ?>" class="w-100 p-img">
                                </div>
                            </a>
                        </div>
                        <div class="col-9">
                            <a href="#">
                                <p class="product-title"><?= $code ?></p>
                                <p class="product-desc"><?= $p->name ?></p>
                            </a>
                            <div class="product-info">
                                <div class="d-block w-100">
                                    <div class="product-sizes w-100">
                                        <?php foreach($p->sizes as $img => $size) : ?>
                                            <div class="p-info">
                                                <img src="<?= get_stylesheet_directory_uri() . "/assets/images/products/sizes/$img.webp" ?>">
                                                <span><?= $size ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="d-block w-100 pt-3">
                                    <div class="product-actions mt-3">
                                        <span class="mg-price">€<?= rand(1, 2000) / 100 ?></span>
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

<!-- ok -->

<?php get_footer(); ?>
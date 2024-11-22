<?php
    get_header();

    $term = isset($_GET['term']) && strlen($_GET['term']) ? $_GET['term'] : null;
    $products = get_mc_products($term);

    $mobile = wp_is_mobile();
    $baseDirSizes = get_stylesheet_directory_uri() . "/assets/images/products/sizes";
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
                <?php if(!$term) : ?>
                    <h2 class="main-title">Esplora il nostro catalogo</h2>
                <?php else : ?>
                    <h2 class="main-title">Prodotti trovati per "<?= $term ?>"</h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row d-none d-md-block">
            <div class="col-12">
                <?php if(!$term) : ?>
                    <p class="mg-breadcrumb"><a href="/">Home</a> / Catalogo</p>
                <?php else : ?>
                    <p class="mg-breadcrumb text-center"><a href="/">Home</a> / <a href="/catalogo">Catalogo</a> / Ricerca per "<?= $term ?>"</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row <?= $term ? "justify-content-center" : '' ?>">
            <div class="col-12 col-md-3 <?= $term ? 'd-none' : '' ?>">
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
                <div class="row d-block d-md-none row-breadcrumb">
                    <div class="col-12 text-center">
                        <?php if(!$term) : ?>
                            <p class="mg-breadcrumb"><a href="/">Home</a> / Catalogo</p>
                        <?php else : ?>
                            <p class="mg-breadcrumb"><a href="/">Home</a> / <a href="/catalogo">Catalogo</a> / Ricerca per "<?= $term ?>"</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php foreach($products as $code => $p): $p = (object) $p; ?>
                    <div class="row">
                        <div class="col-5 col-md-3 p-0">
                            <a href="<?= $p->url ?>">
                                <div class="img-container">
                                    <img src="<?= $p->img ?>" class="w-100 p-img">
                                </div>
                            </a>
                        </div>
                        <div class="col-7 col-md-9 d-flex d-md-block align-items-center">
                            <a class="w-100" href="<?= $p->url ?>">
                                <p class="product-title"><?= $code ?></p>
                                <p class="product-desc"><?= $p->name ?></p>
                            </a>
                            <!-- <div class="product-info d-none d-md-block">
                                <div class="d-block w-100">
                                    <div class="product-sizes w-100">
                                        <?php foreach($p->sizes as $img => $size) : ?>
                                            <div class="p-info">
                                                <img src="<?= "$baseDirSizes/$img.webp" ?>">
                                                <span><?= $size ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="col-12 d-block d-md-none">
                            <div class="product-info">
                                <div class="d-block w-100">
                                    <div class="product-sizes w-100">
                                        <?php foreach($p->sizes as $img => $size) : ?>
                                            <div class="p-info">
                                                <img src="<?= "$baseDirSizes/$img.webp" ?>">
                                                <span><?= $size ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="product-actions mt-3">
                                <div class="w-<?= $mobile ? 100 : 75 ?>">
                                    <span class="mg-price text-success">€<?= $p->price ?></span>
                                </div>
                                
                                <div class="d-flex flex-column justify-content-end w-<?= $mobile ? 100 : 25 ?>">
                                    <?php do_action('woocommerce_before_add_to_cart_form'); ?>
    
                                    <form class="cart d-flex justify-content-end w-100" action="<?= esc_url(apply_filters( 'woocommerce_add_to_cart_form_action', $p->url)) ?>" method="post" enctype='multipart/form-data'>
                                        <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                                        <button type="submit" name="add-to-cart" value="<?= esc_attr($p->id); ?>" class="single_add_to_cart_button button alt<?= esc_attr(wc_wp_theme_get_element_class_name('button' ) ? ' ' . wc_wp_theme_get_element_class_name('button' ) : '' ); ?> w-100"><i class="fa-solid fa-cart-shopping me-2"></i>Aggiungi al carrello</button>
                                        <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                                    </form>
                                    
                                    <?php do_action('woocommerce_after_add_to_cart_form'); ?>
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
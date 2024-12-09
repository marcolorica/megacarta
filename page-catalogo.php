<?php
    get_header();

    $request = (object) $_GET;

    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $order = isset($request->order) ? $request->order : 'DESC';
    $numPage = isset($request->num_page) ? $request->num_page : 1;
    $maxPages = ceil($products->count / $perPage);
    
    $categories = isset($request->categories) ? $request->categories : [];
    
    $cats = mc_get_categories_catalogue();
    $products = mc_get_products($term, $perPage, $order, $numPage, $categories);

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

                    <?php foreach($cats as $cid => $c) : $cid = str_replace('c-', '', $cid); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $mobile ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $cid ?>" aria-expanded="<?= $mobile ? 'false' : 'true' ?>" aria-controls="panelsStayOpen-collapse<?= $cid ?>"><?= $c->name ?></button>
                            </h2>
                            <div id="panelsStayOpen-collapse<?= $cid ?>" class="accordion-collapse collapse <?= $mobile ? '' : 'show' ?>">
                                <div class="accordion-body">
                                    <?php foreach($c->children as $sid => $subc) : ?>
                                        <label for="cat-<?= "$cid-$sid" ?>">
                                            <input id="cat-<?= "$cid-$sid" ?>"
                                                    type="checkbox"
                                                    class="form-check"
                                                    name="categories[]"
                                                    form="form-mc"
                                                    value="<?= $subc->slug ?>"
                                                    onchange="changeMcCategories()" 
                                                    <?= in_array($subc->slug, $categories) ? 'checked' : '' ?>><?= $subc->name ?>
                                        </label>
                                    <?php endforeach; ?>

                                    <?php if(empty($c->children)) : ?>
                                        <label for="cat-<?= "$cid" ?>">
                                            <input id="cat-<?= "$cid" ?>"
                                                    type="checkbox"
                                                    class="form-check"
                                                    name="categories[]"
                                                    form="form-mc"
                                                    value="<?= $c->slug ?>"
                                                    onchange="changeMcCategories()" 
                                                    <?= in_array($c->slug, $categories) ? 'checked' : '' ?>><?= $c->name ?>
                                        </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

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
                <?php foreach($products->result as $code => $p): $p = (object) $p; ?>
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
                                <p class="mg-price text-success">€<?= $p->price ?></p>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="product-actions">                                
                                <div class="d-flex justify-content-end w-100">
                                    <?php do_action('woocommerce_before_add_to_cart_form'); ?>
    
                                    <form class="cart d-flex justify-content-end w-<?= $mobile ? 100 : 25 ?>" action="<?= esc_url(apply_filters( 'woocommerce_add_to_cart_form_action', $p->url)) ?>" method="post" enctype='multipart/form-data'>
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
                <div class="row row-pagination">
                    <div class="col-12 d-flex justify-content-end" style="gap: 10px">
                        <button class="btn btn-danger" onclick="changeMcPage('prev')" <?= $numPage > 1 ? '' : 'disabled' ?>><i class="fa-solid fa-chevron-left"></i></button>
    
                        <?php if($numPage > 2) : ?>
                            <span onclick="changeMcPage(null, 1)">1</span>
                            <span class="points">...</span>
                        <?php endif; ?>

                        <?php if($numPage > 1) : ?>
                            <span class="prev-page" onclick="changeMcPage('prev')"><?= $numPage - 1 ?></span>
                        <?php endif; ?>
    
                        <span class="actual-page"><?= $numPage ?></span>
    
                        <?php if($numPage < $maxPages) : ?>
                            <span class="next-page" onclick="changeMcPage('next')"><?= $numPage + 1 ?></span>
                        <?php endif; ?>

                        <?php if($numPage < ($maxPages - 1)) : ?>
                            <span class="points">...</span>
                            <span onclick="changeMcPage(null, <?= $maxPages ?>)"><?= $maxPages ?></span>
                        <?php endif; ?>
    
                        <button class="btn btn-danger" onclick="changeMcPage('next')" <?= $numPage < $maxPages ? '' : 'disabled' ?>><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
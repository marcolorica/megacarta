<?php get_header(); ?>

<?php
    $cats = get_mc_categories();
?>

<section class="intestazione">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="mc-overlay w-100">
                    <h1>MEGACARTA</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                Esplora il nostro catalogo
            </div>
        </div>
        <div class="row">
            <?php foreach($cats as $c): ?>
                <div class="col-12 col-md-4">
                    <a href="/catalogo/<?= $c->lug ?>" class="link-cat">
                        <div class="card-categoria">
                            <img src="<?= $c->img ?>" class="img-cat">
                            <p class="title-cat"><?= $c->name ?></p>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

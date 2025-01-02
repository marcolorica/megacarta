<?php
/*
*
* Template Name: Template Area Admin
* Type: page
*
* */
?>

<?php
    get_header();
    
    global $pagename;
    $macros = ['area-admin','prodotti','categorie','ordini','pagine','impostazioni'];
?>

<?php if(in_array($pagename, $macros)) : ?> 
    <nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid lightgray">
        <div class="container">
            <a class="navbar-brand my-2 mx-3" href="/">
                <img src="<?= mc_get_logo_src(); ?>" alt="MEGACARTA" class="mg-logo" width="60" height="60" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'prodotti' ? 'active' : '' ?>" href="/area-admin/prodotti"><i class="fa-solid fa-boxes-stacked me-2"></i>Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'categorie' ? 'active' : '' ?>" href="/area-admin/categorie"><i class="fa-solid fa-list-ul me-2"></i>Categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'ordini' ? 'active' : '' ?>" href="/area-admin/ordini"><i class="fa-regular fa-credit-card me-2"></i>Ordini</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'pagine' ? 'active' : '' ?>" href="/area-admin/pagine"><i class="fa-regular fa-newspaper me-2"></i>Pagine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagename == 'impostazioni' ? 'active' : '' ?>" href="/area-admin/impostazioni"><i class="fa-solid fa-gear me-2"></i>Impostazioni</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php get_template_part('template-parts/area-admin/' . $pagename); ?>

<?php else : ?>
    <?php
        $icon = '';
        $text = '';

        switch($pagename) {
            case 'prodotto':
                $icon = 'boxes-stacked';
                $text = 'prodotti';
                break;

            case 'categoria':
                $icon = 'list-ul';
                $text = 'categorie';
                break;

            case 'ordine':
                $icon = 'credit-card';
                $text = 'ordini';
                break;

            case 'pagina':
                $icon = 'newspaper';
                $text = 'pagine';
                break;
        }
    ?>

    <nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid lightgray">
        <div class="container">
            <a class="navbar-brand my-2 mx-3" href="/">
                <img src="<?= mc_get_logo_src(); ?>" alt="MEGACARTA" class="mg-logo" width="60" height="60" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/area-admin/<?= $text ?>"><i class="fa-solid fa-arrow-left me-2"></i>Torna a <i class="fa-solid fa-<?= $icon ?> mx-2"></i><?= ucfirst($text) ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php get_template_part('template-parts/area-admin/' . $text . '/' . $pagename); ?>

<?php endif; ?>
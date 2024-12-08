<?php
/*
*
* Template Name: Template Area Admin
* Type: page
*
* */
?>

<?php get_header(); ?>
<?php global $pagename; ?>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand my-2 mx-3" href="/">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/megacarta-logo.webp' ?>" alt="MEGACARTA" class="mg-logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/area-admin/prodotti"><i class="fa-solid fa-boxes-stacked me-2"></i>Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/area-admin/categorie"><i class="fa-solid fa-list-ul me-2"></i>Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/area-admin/ordini"><i class="fa-regular fa-credit-card me-2"></i>Ordini</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/area-admin/pagine"><i class="fa-regular fa-newspaper me-2"></i>Pagine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/area-admin/pagine"><i class="fa-solid fa-gear me-2"></i>Impostazioni</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php get_footer(); ?>
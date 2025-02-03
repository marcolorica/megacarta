<?php
    $request = (object) $_GET;
    
    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $numPage = isset($request->num_page) ? $request->num_page : 1;
    
    if(!mg_is_admin_area()) :
?>

<form action="/catalogo" method="GET" id="form-mc">
    <input type="hidden" name="per_page" value="<?= $perPage ?>">
    <input type="hidden" name="num_page" value="<?= $numPage ?>">
</form>

<style>
    #cart-icon::after {
        content: "<?= mc_get_cart_count(); ?>";
    }
</style>

<nav class="navbar navbar-expand-lg bg-mc">
    <div class="container">
        <a class="navbar-brand my-2 mx-3" href="/">
            <img src="<?= mc_get_logo_src(true) ?>" alt="MEGACARTA" class="mg-logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/chi-siamo">Chi siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/catalogo">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/contatti">Contatti</a>
                </li>
                <li class="nav-item d-block d-md-none">
                    <a class="nav-link text-white" href="/carrello"><i class="fa-solid fa-cart-shopping me-2"></i>Carrello</a>
                </li>
            </ul>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="text" placeholder="Cerca..." name="term" form="form-mc" value="<?= $term ?: '' ?>">
                <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass" form="form-mc"></i></button>
            </form>

            <span class="navbar-text ms-3 d-none d-md-inline">
                <a href="/carrello" style="text-decoration:none">
                    <i class="fa-solid fa-cart-shopping fa-lg text-white"></i>
                </a>
            </span>
        </div>
    </div>
</nav>

<?php endif; ?>
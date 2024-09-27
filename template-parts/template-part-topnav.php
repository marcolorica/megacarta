<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand my-2 mx-3" href="/">
      <img src="<?= get_stylesheet_directory_uri() . '/assets/images/mg-logo.png' ?>" alt="MEGACARTA" class="mg-logo" width="60" height="60" class="d-inline-block align-text-top">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <!-- <a class="nav-link active" aria-current="page" href="#">Chi siamo</a> -->
                <a class="nav-link text-white" href="/chi-siamo">Chi siamo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/catalogo">Catalogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/contatti">Contatti</a>
            </li>
            <li class="nav-item d-block d-md-none">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping me-2"></i>Carrello</a>
            </li>
        </ul>

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="text" placeholder="Cerca...">
            <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <span class="navbar-text ms-2 d-none d-md-inline">
            <i class="fa-solid fa-cart-shopping fa-lg text-white"></i>
        </span>

    </div>
  </div>
</nav>

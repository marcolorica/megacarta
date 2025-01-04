<?php
    $pages = [
        (object) [
            'name' => 'Home',
            'slug' => 'home',
            'icon' => 'fa-solid fa-house',
            'text' => 'Modifica la pagina principale'
        ],
        (object) [
            'name' => 'Chi Siamo',
            'slug' => 'chi-siamo',
            'icon' => 'fa-solid fa-map',
            'text' => 'Modifica la pagina descrittiva dell\'azienda'
        ],
        (object) [
            'name' => 'Contatti',
            'slug' => 'contatti',
            'icon' => 'fa-regular fa-address-book',
            'text' => 'Modifica la pagina che permette agli utenti di contattarti'
        ]
    ];
?>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-3">Pagine</h2>
            </div>

            <div class="col-12 body-content">
                <div class="row row-pagine">
                    <?php foreach($pages as $page) : ?>
                        <div class="col-4">
                            <div class="card w-100 card-pagina">
                                <div class="card-body">
                                    <h3 class="card-title"><i class="<?= $page->icon ?>"></i></h3>
                                    <h1 class="card-title text-center"><?= $page->name ?></h1>
                                    <p class="card-text text-center"><?= $page->text ?></p>
                                    <a class="btn azione-mc btn-outline-primary" href="/area-admin/pagine/pagina?slug=<?= $page->slug ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
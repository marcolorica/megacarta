<?php $categories = mc_get_categories_catalogue(); ?>

<form action="/area-admin/categorie" method="GET" id="form-mc"></form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-5">Categorie</h2>
            </div>

            <div class="col-12 body-content">
                <?php foreach($categories as $c) : ?>
                    <div class="row row-categoria mb-5">
                        <div class="col-1 d-flex justify-content-center align-items-center text-center mb-3">
                            <img src="<?= $c->img ?>" class="w-100">
                        </div>
                        <div class="col-7 d-flex align-items-center text-center mb-3">
                            <p class="p-code"><?= $c->name ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center mb-3">
                            <p class="p-products"><?= $c->count ?> prodotti</p>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center mb-3">
                            <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/categorie/categoria?id=<?= $c->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                            <a class="btn azione-mc btn-outline-danger" role="button" onclick="adminDeleteCategory(<?= $c->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
                        </div>

                        <?php foreach($c->children as $subc) : ?>
                            <div class="col-12 ps-5 mb-3 child-cat">
                                <div class="row row-categoria">
                                    <div class="col-1 d-flex justify-content-center align-items-center text-center">
                                        <img src="<?= $subc->img ?>" class="w-100">
                                    </div>
                                    <div class="col-7 d-flex align-items-center text-center">
                                        <p class="p-code"><?= $subc->name ?></p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center text-center">
                                        <p class="p-products"><?= $subc->count ?> prodotti</p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end align-items-center">
                                        <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/categorie/categoria?id=<?= $subc->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                                        <a class="btn azione-mc btn-outline-danger" role="button" onclick="adminDeleteCategory(<?= $subc->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
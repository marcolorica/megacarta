<?php
    $request = (object) $_GET;

    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $order = isset($request->order) ? $request->order : 'DESC';
    $numPage = isset($request->num_page) ? $request->num_page : 1;
    $maxPages = ceil($products->count / $perPage);

    $categories = isset($request->categories) ? $request->categories : [];

    $products = mc_get_products($term, $perPage, $order, $numPage, $categories);
?>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-3">Prodotti</h2>
            </div>
            <div class="col-12">
                <div class="input-group mb-3" id="adminSearch">
                    <input type="text" class="form-control" placeholder="Cerca prodotti...">
                    <button class="btn btn-outline-primary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <div class="col-12 body-content">
                <?php foreach($products->result as $sku => $p) : $p = (object) $p; ?>
                    <div class="row row-prodotto">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <img src="<?= $p->img ?>" class="w-100">
                        </div>
                        <div class="col-9">
                            <p class="p-code"><?= $sku ?></p>
                            <p class="p-title"><?= $p->name ?></p>
                            <p class="p-price">€<?= $p->price ?></p>
                            <p class="p-categories"></p>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center">
                            <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/prodotti/prodotto?id=<?= $p->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                            <a class="btn azione-mc btn-outline-danger" role="button" onclick="deleteProduct(<?= $p->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
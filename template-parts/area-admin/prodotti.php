<?php
    $request = (object) $_GET;

    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $order = isset($request->order) ? $request->order : 'piu-recenti';
    $numPage = isset($request->num_page) ? $request->num_page : 1;

    $categories = isset($request->categories) ? $request->categories : [];

    $products = mc_get_products($term, $perPage, $order, $numPage, $categories);
    $maxPages = ceil($products->count / $perPage);
?>

<form action="/area-admin/prodotti" method="GET" id="form-mc">
    <input type="hidden" name="per_page" value="<?= $perPage ?>">
    <input type="hidden" name="num_page" value="<?= $numPage ?>">
</form>

<section class="admin-body py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-3">Prodotti</h2>
            </div>
            <div class="col-12">
                <div class="input-group mb-3" id="adminSearch">
                    <input type="text" class="form-control" placeholder="Cerca prodotti..." form="form-mc" name="term">
                    <button class="btn btn-outline-primary" type="submit" form="form-mc"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <div class="d-flex justify-content-bewtween align-items-center">
                <span><?= count($products->result) ?> prodotti di <?= $products->count ?></span>
                <select name="order" id="" class="admin-order">
                    <option value="piu-recenti" <?= $order = 'piu-recenti' ? 'selected' : '' ?>>Più recenti</option>
                    <option value="meno-recenti" <?= $order = 'meno-recenti' ? 'selected' : '' ?>>Meno recenti</option>
                    <option value="A-Z" <?= $order = 'A-Z' ? 'selected' : '' ?>>A - Z</option>
                    <option value="A-Z" <?= $order = 'A-Z' ? 'selected' : '' ?>>Z - A</option>
                </select>
            </div>

            <div class="col-12 body-content">
                <?php foreach($products->result as $sku => $p) : $p = (object) $p; ?>
                    <div class="row row-prodotto">
                        <div class="col-1 d-flex justify-content-center align-items-center text-center">
                            <img src="<?= $p->img ?>" class="w-100">
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-code"><?= $sku ?></p>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <p class="p-title"><?= $p->name ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-price">€<?= number_format($p->price, 2, ',', '.'); ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-categories"><?= implode(',', $p->cats) ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center">
                            <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/prodotti/prodotto?id=<?= $p->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                            <a class="btn azione-mc btn-outline-danger" role="button" onclick="deleteProduct(<?= $p->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row row-pagination admin mt-3">
            <div class="col-12 d-flex justify-content-end p-0" style="gap: 10px">
                <button class="btn btn-primary" onclick="changeMcPage('prev')" <?= $numPage > 1 ? '' : 'disabled' ?>><i class="fa-solid fa-chevron-left"></i></button>

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

                <button class="btn btn-primary" onclick="changeMcPage('next')" <?= $numPage < $maxPages ? '' : 'disabled' ?>><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>
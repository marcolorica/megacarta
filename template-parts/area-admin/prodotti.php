<?php
    $request = (object) $_GET;

    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $order = $request->order ?? 'piu-recenti';
    $numPage = $request->num_page ?? 1;

    $categories = $request->categories ?? [];

    $products = mc_get_products($term, $perPage, $order, $numPage, $categories);
    $maxPages = ceil($products->count / $perPage);
?>

<form action="/area-admin/prodotti" method="GET" id="form-mc">
    <input type="hidden" name="per_page" value="<?= $perPage ?>">
    <input type="hidden" name="num_page" value="<?= $numPage ?>">
</form>

<section class="admin-body py-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Prodotti</h2>
            </div>
            <div class="col-12 text-end">
                <a href="/area-admin/prodotti/prodotto" class="btn btn-success text-white"><i class="fa-solid fa-plus me-2"></i>Crea nuovo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3" id="adminSearch">
                    <input type="text" class="form-control" placeholder="Cerca prodotti..." form="form-mc" name="term" value="<?= $term ?: '' ?>">
                    <button class="btn btn-outline-primary" type="submit" form="form-mc"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex">
                    <select class="admin-order me-2" name="per_page" form="form-mc" onchange="jQuery('#form-mc').submit()">
                        <option value="10" <?= $perPage == 10 ? 'selected' : '' ?>>10</option>
                        <option value="25" <?= $perPage == 25 ? 'selected' : '' ?>>25</option>
                        <option value="50" <?= $perPage == 50 ? 'selected' : '' ?>>50</option>
                        <option value="100" <?= $perPage == 100 ? 'selected' : '' ?>>100</option>
                        <option value="200" <?= $perPage == 200 ? 'selected' : '' ?>>200</option>
                    </select>
                    <span>prodotti di <?= $products->count ?></span>
                </div>
                <select name="order" form="form-mc" class="admin-order" onchange="jQuery('#form-mc').submit()">
                    <option value="piu-recenti" <?= $order == 'piu-recenti' ? 'selected' : '' ?>>Più recenti</option>
                    <option value="meno-recenti" <?= $order == 'meno-recenti' ? 'selected' : '' ?>>Meno recenti</option>
                    <option value="A-Z" <?= $order == 'A-Z' ? 'selected' : '' ?>>A - Z</option>
                    <option value="Z-A" <?= $order == 'Z-A' ? 'selected' : '' ?>>Z - A</option>
                </select>
            </div>

            <div class="col-12 body-content">
                <?php foreach($products->result as $p) : $p = (object) $p; ?>
                    <div class="row row-prodotto <?= $p->qty ? 'in-stock' : '' ?>">
                        <div class="col-1 d-flex justify-content-center align-items-center text-center">
                            <img src="<?= $p->img ?>" class="w-100">
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center flex-column">
                            <p class="p-code"><?= $p->sku ?></p>
                            
                            <?php if(count($p->variants)) : ?>
                                <span class="p-variants"><?= count($p->variants) ?> varianti</span>
                            <?php endif; ?>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <p class="p-title"><?= $p->name ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-price"><?= $p->price ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-categories"><?= implode(',', $p->cats) ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center">
                            <a class="btn azione-mc btn-outline-success me-3" href="<?= get_permalink($p->id) ?>"><i class="fa-solid fa-eye fa-fw text-success"></i></a>
                            <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/prodotti/prodotto?id=<?= $p->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                            <a class="btn azione-mc btn-outline-danger" role="button" onclick="adminDeleteProduct(<?= $p->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
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
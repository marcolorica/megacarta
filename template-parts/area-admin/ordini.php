<?php
    $request = (object) $_GET;

    $term = isset($request->term) && strlen($request->term) ? $request->term : null;
    $perPage = isset($request->per_page) ? (int) $request->per_page : 10;
    $order = $request->order ?? 'piu-recenti';
    $numPage = $request->num_page ?? 1;

    $orders = mc_get_orders($term, $perPage, $order, $numPage);
    $maxPages = ceil($orders->count / $perPage);
?>

<form action="/area-admin/ordini" method="GET" id="form-mc">
    <input type="hidden" name="per_page" value="<?= $perPage ?>">
    <input type="hidden" name="num_page" value="<?= $numPage ?>">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-3">Ordini</h2>
            </div>
            <div class="col-12">
                <div class="input-group mb-3" id="adminSearch">
                    <input type="text" class="form-control" placeholder="Cerca ordini...">
                    <button class="btn btn-outline-primary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                    <span>ordini di <?= $orders->count ?></span>
                </div>
                <select name="order" form="form-mc" class="admin-order" onchange="jQuery('#form-mc').submit()">
                    <option value="piu-recenti" <?= $order == 'piu-recenti' ? 'selected' : '' ?>>Più recenti</option>
                    <option value="meno-recenti" <?= $order == 'meno-recenti' ? 'selected' : '' ?>>Meno recenti</option>
                    <option value="A-Z" <?= $order == 'A-Z' ? 'selected' : '' ?>>A - Z</option>
                    <option value="Z-A" <?= $order == 'Z-A' ? 'selected' : '' ?>>Z - A</option>
                </select>
            </div>

            <div class="col-12 body-content">
                <?php foreach($orders->result as $o) : $o = (object) $o; ?>
                    <div class="row row-prodotto">
                        <div class="col-3 d-flex justify-content-center align-items-center text-center flex-column">
                            <p class="p-code"><?= $o->customer ?></p>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <p class="p-title"><?= $o->status ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-price">€<?= number_format($o->tot, 2, ',', '.'); ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center text-center">
                            <p class="p-categories"><?= $o->products ?></p>
                        </div>
                        <div class="col-2 d-flex justify-content-end align-items-center">
                            <a class="btn azione-mc btn-outline-success me-3" href="#"><i class="fa-solid fa-eye fa-fw text-success"></i></a>
                            <a class="btn azione-mc btn-outline-primary me-3" href="/area-admin/ordini/ordine?id=<?= $o->id ?>"><i class="fa-solid fa-pencil fa-fw text-primary"></i></a>
                            <a class="btn azione-mc btn-outline-danger" role="button" onclick="adminDeleteOrder(<?= $o->id ?>)"><i class="fa-solid fa-trash-can fa-fw"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
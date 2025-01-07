<?php
    $product_id = $_GET['id'] ?? null;

    $product = $product_id ? mc_get_product($product_id) : null;
    $categories = mc_get_categories_catalogue();
?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-product" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="save_product_edits">
    <input type="hidden" name="product_id" value="<?= $product ? $product_id : '' ?>">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" form="form-product">Salva</button>
            </div>

            <div class="col-12 text-center">
                <h2 class="mb-5"><?= $product ? 'Modifica' : 'Crea nuovo' ?> prodotto<?= $product ? " <b>$product->name</b>" : '' ?></h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <input type="file" style="display:none" name="product_img" form="form-product" onchange="changeImg(this)">
                        
                        <h4 class="mb-3">Immagine principale <span class="text-danger">*</span></h4>
                        <img src="<?= $product->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 mb-3 img-for-edit main-img rounded <?= !$product->img ? 'ph'  : '' ?>" onclick="jQuery(this).prev().prev().click()">
                    </div>
                    
                    <div class="col-6">
                        <h4 class="mb-3">Nome <span class="text-danger">*</span></h4>
                        <input type="text" class="form-control mb-3" name="product_name" placeholder="Nome" value="<?= $product->name ?>" form="form-product" required>

                        <h4 class="mb-3">Codice <span class="text-danger">*</span></h4>
                        <input type="text" class="form-control mb-3" name="product_code" placeholder="Nome" value="<?= $product->code ?>" form="form-product" required>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mb-3">Prezzo <span class="text-danger">*</span></h4>
                                <div class="input-group align-items-start">
                                    <span class="input-group-text">€</span>
                                    <input type="number" step="0.01" name="product_price" class="form-control mb-3" placeholder="Prezzo" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="mb-3">Disponibilità <span class="text-danger">*</span></h4>
                                <input type="number" step="0.01" name="product_qty" class="form-control mb-3" placeholder="Quantità" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h4 class="mb-3">Categorie <span class="text-danger">*</span></h4>

                        <?php foreach($categories as $cid => $c) : $cid = str_replace('c-', '', $cid); ?>
                            <label for="cat-<?= "$cid" ?>" class="label-home">
                                <input id="cat-<?= "$cid" ?>"
                                        type="checkbox"
                                        class="form-check me-2"
                                        name="product_categories[]"
                                        form="form-product"
                                        value="<?= $c->slug ?>"
                                        <?= in_array($c->slug, $product->categories ?: []) ? 'checked' : '' ?>><?= $c->name ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-6">
                        <h4 class="mb-3">Varianti</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(isset($_SESSION['save_success'])) : ?>
    <script>
        jQuery(document).ready(() => {
            Swal.fire({
                title: '<?= $_SESSION['save_success'] ?>',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Ok',
            });
        });
    </script>
<?php unset($_SESSION['save_success']); endif; ?>

<?php if(isset($_SESSION['error'])) : ?>
    <script>
        jQuery(document).ready(() => {
            Swal.fire({
                title: '<?= $_SESSION['error'] ?>',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: 'Ok',
            });
        });
    </script>
<?php unset($_SESSION['error']); endif; ?>
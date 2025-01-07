<?php
    $product_id = $_GET['id'] ?? null;

    $product = $product_id ? mc_get_product($product_id) : null;
    $categories = mc_get_categories_catalogue();

    var_dump($product->variants);die;
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
                        <img src="<?= $product->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 mb-5 img-for-edit mc-square rounded <?= !$product->img ? 'ph'  : '' ?>" onclick="jQuery(this).prev().prev().click()">
                    </div>
                    
                    

                    <div class="col-6">
                        <h4 class="mb-3">Nome <span class="text-danger">*</span></h4>
                        <input type="text" class="form-control mb-5" name="product_name" placeholder="Nome" value="<?= $product ? $product->name : '' ?>" form="form-product" required>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mb-3">Codice fornitore <span class="text-danger">*</span></h4>
                                <input type="text" class="form-control mb-5" name="product_oem" placeholder="Codice fornitore" value="<?= $product ? $product->oem : '' ?>" form="form-product" required>
                                
                                <h4 class="mb-3">Prezzo <span class="text-danger">*</span></h4>
                                <div class="input-group align-items-start">
                                    <span class="input-group-text">€</span>
                                    <input type="number" step="0.01" name="product_price" class="form-control mb-5" placeholder="Prezzo" value="<?= $product ? $product->price : '' ?>" form="form-product" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="mb-3">Codice MEGACARTA <span class="text-danger">*</span></h4>
                                <input type="text" class="form-control mb-5" name="product_code" placeholder="Codice" value="<?= $product ? $product->code : '' ?>" form="form-product" required>

                                <h4 class="mb-3">Disponibilità <span class="text-danger">*</span></h4>
                                <input type="number" step="0.01" name="product_qty" class="form-control mb-5" placeholder="Quantità" value="<?= $product ? $product->qty : '' ?>" form="form-product" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-5">
                        <h4>Categorie <span class="text-danger">*</span></h4>

                        <?php foreach($categories as $c) : ?>
                            <label for="cat-<?= $c->id ?>" class="label-home mt-3">
                                <input id="cat-<?= $c->id ?>"
                                        type="checkbox"
                                        class="form-check me-2"
                                        name="product_categories[]"
                                        form="form-product"
                                        value="<?= $c->id ?>"
                                        <?= in_array($c->slug, $product->categories ?: []) ? 'checked' : '' ?>><?= $c->name ?>
                            </label>
                            
                            <?php foreach($c->children as $subc) : ?>
                                <label for="subcat-<?= $subc->id ?>" class="label-home child">
                                    <input id="subcat-<?= $subc->id ?>"
                                            type="checkbox"
                                            class="form-check me-2"
                                            name="product_categories[]"
                                            form="form-product"
                                            value="<?= $subc->id ?>"
                                            <?= in_array($subc->slug, $product->categories ?: []) ? 'checked' : '' ?>><?= $subc->name ?>
                                </label>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-6 mb-5">
                        <h4 class="mb-3">Varianti</h4>

                        <label for="only-variants" class="d-block mb-3">
                            <input id="only-variants" type="checkbox" class="me-2" name="only_variants" <?= $product->only_variants ?> form="form-product">
                            <span>Vendi solo tramite varianti</span>
                        </label>

                        <div class="template-row-product-variant" style="display:none">
                            <div class="col-2">
                                <input type="file" style="display:none" class="product-variant-file-img" onchange="changeImg(this, true)">
                                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 img-for-edit mc-square rounded ph" onclick="jQuery(this).prev().click()">
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control product-variant-name" placeholder="Nome variante">
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <div class="input-group align-items-start">
                                    <span class="input-group-text">€</span>
                                    <input type="number" step="0.01" class="form-control product-variant-price" placeholder="Prezzo">
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>

                        <?php if($product) : ?>
                            <?php foreach($product->variants as $i => $v) : ?>
                                <div class="row row-product-variant mb-3">
                                    <div class="col-2">
                                        <input type="file" name="product_variants[<?= $i ?>][img]" style="display:none" class="product-variant-file-img" form="form-product" onchange="changeImg(this, true)">
                                        <img src="<?= $v->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 img-for-edit mc-square rounded <?= !$v->img ? 'ph'  : '' ?>" onclick="jQuery(this).prev().click()">
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <input type="text" class="form-control product-variant-name" placeholder="Nome variante" form="form-product" name="product_variants[<?= $i ?>][name]" value="<?= $v->name ?>" form="form-product">
                                    </div>
                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                        <div class="input-group align-items-start">
                                            <span class="input-group-text">€</span>
                                            <input type="number" step="0.01" class="form-control product-variant-price" placeholder="Prezzo" name="product_variants[<?= $i ?>][price]" value="<?= $v->price ?>" form="form-product">
                                        </div>
                                    </div>
                                    <div class="col-2  d-flex justify-content-center align-items-center">
                                        <button class="btn btn-danger" onclick="removeVariantRow(this)"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <button class="btn btn-success" onclick="addProductVariant(this)">Aggiungi variante</button>
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
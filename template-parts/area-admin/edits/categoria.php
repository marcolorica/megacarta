<?php
    $term_id = $_GET['id'];;

    $category = mc_get_categories_catalogue($term_id);
    $categories = mc_get_categories_catalogue();
?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-cat" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="save_cat_edits">
    <input type="hidden" name="term_id" value="<?= $term_id ?>">
    <input type="hidden" name="actual_slug" value="<?= $category->slug ?>">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" form="form-cat">Salva</button>
            </div>

            <div class="col-12 text-center">
                <h2 class="mb-5">Modifica categoria <b><?= $category->name ?></b></h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <input type="file" style="display:none" name="cat_img" form="form-cat" onchange="changeImg(this)">
                        
                        <h4 class="mb-3">Immagine principale <span class="text-danger">*</span></h4>
                        <img src="<?= $category->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 mb-5 img-for-edit main-img rounded <?= !$category->img ? 'ph'  : '' ?>" onclick="jQuery(this).prev().prev().click()">
                    </div>
                    
                    <div class="col-6">
                        <h4 class="mb-3">Nome <span class="text-danger">*</span></h4>
                        <input type="text" class="form-control mb-5" name="cat_name" placeholder="Nome" value="<?= $category->name ?>" form="form-cat" required>

                        <h4 class="mb-3">Categoria Genitore <span class="text-danger">*</span></h4>
                        <select type="text" class="form-select mb-5" name="cat_name" placeholder="Nome" value="<?= $category->name ?>" form="form-cat">
                            <option value="0">Seleziona categoria genitore</option>

                            <?php foreach($categories as $cid => $c) : $cid = str_replace('c-', '', $cid); ?>
                                <option value="<?= "$cid" ?>" <?= $c->parent == $cid ? 'selected' : '' ?>><?= $c->name ?></option>
                            <?php endforeach; ?>
                        </select>
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
                title: 'Modifiche salvate!',
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
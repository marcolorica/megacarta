<?php
    $pagina = $_GET['slug'];
    $datas = mc_get_page_datas($pagina);

    var_dump($datas);die;

    $categories = mc_get_categories_catalogue();
?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-page" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="save_page_edits">
    <input type="hidden" name="pagina" value="<?= $pagina ?>">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" form="form-page">Salva</button>
            </div>

            <div class="col-12 text-center">
                <h2 class="mb-5">Modifica pagina <b><?= $datas->title ?></b></h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <?php if($pagina == 'home') : ?>
                        <div class="col-6">
                            <input type="file" style="display:none" name="main_img" form="form-page">
                            
                            <h4 class="mb-3">Immagine principale <span class="text-danger">*</span></h4>
                            <img src="<?= $datas->main_img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 mb-5 img-for-edit main-img rounded <?= !$datas->main_img ? 'ph'  : '' ?>">

                            <h4 class="mb-3">Sezione con mappa <span class="text-danger">*</span></h4>
                            
                            <input type="text" class="form-control mb-3" name="home_map_title" placeholder="Titolo" value="<?= $datas->map_section->title ?>" form="form-page" required>
                            <textarea rows="13" class="form-control" name="home_map_text" placeholder="Contenuto" form="form-page" required><?= $datas->map_section->text ?></textarea>
                            <p class="text-secondary mt-3" style="font-size:13px;font-style:italic">Per modificare l'indirizzo della mappa vai a <a href="/area-admin/impostazioni">Impostazioni</a></p>
                        </div>

                        <div class="col-6">
                            <h4 class="mb-3">Categorie in vetrina <span class="text-danger">*</span></h4>

                            <div class="accordion mb-4" id="accordionEditPage">
                                <?php foreach($categories as $cid => $c) : $cid = str_replace('c-', '', $cid); ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $cid ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?= $cid ?>"><?= $c->name ?></button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse<?= $cid ?>" class="accordion-collapse collapse">
                                            <div class="accordion-body">
                                                <?php foreach($c->children as $sid => $subc) : ?>
                                                    <label for="cat-<?= "$cid-$sid" ?>">
                                                        <input id="cat-<?= "$cid-$sid" ?>"
                                                                type="checkbox"
                                                                class="form-check me-2"
                                                                name="home_categories[]"
                                                                form="form-page"
                                                                value="<?= $subc->slug ?>"
                                                                <?= in_array($cid, $datas->categories ?: []) ? 'checked' : '' ?>><?= $subc->name ?>
                                                    </label>
                                                <?php endforeach; ?>

                                                <?php if(empty($c->children)) : ?>
                                                    <label for="cat-<?= "$cid" ?>">
                                                        <input id="cat-<?= "$cid" ?>"
                                                                type="checkbox"
                                                                class="form-check me-2"
                                                                name="home_categories[]"
                                                                form="form-page"
                                                                value="<?= $c->slug ?>"
                                                                <?= in_array($sid, $datas->categories ?: []) ? 'checked' : '' ?>><?= $c->name ?>
                                                    </label>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    <?php endif; ?>
                        
                    <?php if($pagina == 'chi-siamo') : ?>
                        <div class="col-12">
                            <input type="file" style="display:none" name="main_img" form="form-page">
                            
                            <h4 class="mb-3">Immagine principale <span class="text-danger">*</span></h4>
                            <img src="<?= $datas->main_img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 mb-5 img-for-edit main-img rounded <?= !$datas->main_img ? 'ph'  : '' ?>">
                        </div>

                        <div class="col-12">
                            <h4 class="mb-3">Prima Sezione <span class="text-danger">*</span></h4>

                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control mb-3" name="chi_siamo_title_1" placeholder="Titolo" form="form-page" value="<?= $datas->first_section->title ?>" required>
                                    <textarea rows="13" class="form-control mb-5" name="chi_siamo_text_1" placeholder="Contenuto" form="form-page" required><?= $datas->first_section->text ?></textarea>
                                </div>
                                <div class="col-6">
                                    <input type="file" style="display:none" name="chi_siamo_img_1" form="form-page">  
                                    <img src="<?= $datas->first_section->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 img-for-edit rounded <?= !$datas->first_section->img ? 'ph'  : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="mb-3">Seconda Sezione <span class="text-danger">*</span></h4>

                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control mb-3" name="chi_siamo_title_2" placeholder="Titolo" form="form-page" value="<?= $datas->second_section->title ?>" required>
                                    <textarea rows="13" class="form-control mb-5" name="chi_siamo_text_2" placeholder="Contenuto" form="form-page" required><?= $datas->second_section->text ?></textarea>
                                </div>
                                <div class="col-6">
                                    <input type="file" style="display:none" name="chi_siamo_img_2" form="form-page">
                                    <img src="<?= $datas->second_section->img ?: get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png' ?>" class="w-100 img-for-edit rounded <?= !$datas->second_section->img ? 'ph'  : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="mb-3">Terza Sezione</h4>

                            <textarea rows="13" class="form-control mb-3" name="chi_siamo_content_1" placeholder="Contenuto 1" form="form-page"><?= $datas->third_section->p1 ?></textarea>
                            <textarea rows="13" class="form-control mb-5" name="chi_siamo_content_2" placeholder="Contenuto 2" form="form-page"><?= $datas->third_section->p2 ?></textarea>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($pagina == 'contatti') : ?>
                        <div class="col-12">
                            <h4 class="mb-3">Imposta i tuoi dati di contatto <span class="text-danger">*</span></h4>
    
                            <div class="socials mt-3 <?= wp_is_mobile() ? 'mobile' : '' ?>">
                                <label class="phone d-block"><i class="fa-solid fa-phone"></i></label>
                                <input type="text" class="form-control" name="contacts_phone" placeholder="+393333333333" form="form-page" required>
    
                                <label class="whatsapp d-block"><i class="fa-brands fa-whatsapp"></i></label>
                                <input type="text" class="form-control" name="contacts_whatsapp" placeholder="+393333333333" form="form-page" required>
    
                                <label class="email d-block"><i class="fa-regular fa-envelope me-0"></i></label>
                                <input type="email" class="form-control" name="contacts_email" placeholder="mario.rossi@gmail.com" form="form-page" required>
                            </div>
                        </div>
                    <?php endif; ?>
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
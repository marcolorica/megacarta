<?php get_header(); ?>
<?php $chi_siamo = mc_get_page_datas('chi-siamo'); ?>

<style>
    .intestazione.mg-chi-siamo {
        background-image: url(<?= get_option('mc_chi_siamo_main_img') ?>);
    }
</style>

<section class="intestazione mg-chi-siamo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="mc-overlay w-100">
                    <h1>CHI SIAMO</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mappa mt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h3><?= $chi_siamo->first_section->title ?></h3>
                <p><?= $chi_siamo->first_section->text ?></p>
            </div>

            <div class="col-12 col-md-6">
                <img src="<?= get_option('mc_chi_siamo_img_1') ?>" class="w-100">
            </div>
        </div>

        <div class="row mb-3 d-none d-md-flex">
            <div class="col-12 col-md-6">
                <img src="<?= get_option('mc_chi_siamo_img_2') ?>" class="w-100">
            </div>

            <div class="col-12 col-md-6">
                <h3><?= $chi_siamo->second_section->title ?></h3>
                <p><?= $chi_siamo->second_section->text ?></p>
            </div>
        </div>
        <div class="row mb-3 d-flex d-md-none">
            <div class="col-12 col-md-6">
                <h3><?= $chi_siamo->second_section->title ?></h3>
                <p><?= $chi_siamo->second_section->text ?></p>
            </div>

            <div class="col-12 col-md-6">
                <img src="<?= get_option('mc_chi_siamo_img_2') ?>" class="w-100">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h3><?= $chi_siamo->third_section->title ?></h3>
                <p><?= $chi_siamo->third_section->text ?></p>
            </div>

            <div class="col-12 col-md-6">
                <img src="<?= get_option('mc_chi_siamo_img_3') ?>" class="w-100">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <p><?= $chi_siamo->fourth_section ?></p>
            </div>
        </div>
    </div>
</section>

<?php mc_test_func('new_import_products'); ?>

<?php get_footer(); ?>
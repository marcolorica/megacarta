<?php $settings = mc_get_settings(); ?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-settings" method="POST">
    <input type="hidden" name="action" value="save_settings">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" form="form-settings">Salva</button>
            </div>

            <div class="col-12 text-center">
                <h2 class="mb-5">Impostazioni</h2>
            </div>
            
            <div class="col-6 mb-5">
                <label class="mb-2"><i class="fa-solid fa-location-dot me-2"></i>Indirizzo sede</label>
                <input type="text" class="form-control" name="address" form="form-settings" value="<?= $settings->address ?>" placeholder="Via Roma, 63">

                <label class="mb-2"><i class="fa-solid fa-map-location-dot me-2"></i>Iframe Mappa Google</label>
                <textarea class="form-control mb-3" name="map_iframe" form="form-settings" placeholder="<iframe src=..." rows="9"><?= $settings->map_iframe ?></textarea>
                
                <label class="mb-2"><i class="fa-solid fa-id-card me-2"></i>Partita IVA</label>
                <input type="text" class="form-control mb-3" name="partita_iva" form="form-settings" value="<?= $settings->partita_iva ?>" placeholder="123456789">
                
                <label class="mb-2"><i class="fa-solid fa-building-columns me-2"></i>Dettagli bancari</label>
                <textarea class="form-control" name="bank_details" placeholder="IT60X0542811101000000123456..." form="form-settings" rows="7"><?= $settings->bank_details ?></textarea>
            </div>

            <div class="col-6 mb-5">
               <?= $settings->map_iframe ?>
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
<?php
    $order_id = $_GET['id'] ?? null;
    $order = $order_id ? mc_get_order($order_id) : null;
?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-order" method="POST">
    <input type="hidden" name="action" value="save_order_edits">
    <input type="hidden" name="order_id" value="<?= $order ? $order_id : '' ?>">
</form>

<section class="admin-body pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" form="form-order">Salva</button>
            </div>

            <div class="col-12 text-center">
                <h2 class="mb-5">Ordine #<?= $order->id ?></h2>
            </div>

            <div class="col-12">
                <h4 class="mb-3">Stato dell'ordine</h4>
                
                <div class="order-statuses">
                    <?php foreach(mc_get_order_status(null) as $status) : ?>
                        <label class="label-status <?= $order->status->label == $status->label ? 'active' : '' ?>"><span class="badge text-bg-<?= $status->color ?>"><?= $status->label ?></span></label>
                    <?php endforeach; ?>
                </div>
                
                <input type="range" class="form-range mb-3" min="0" max="6" step="1" id="statusRange" onkeypress="onKeyPressOrderStatusRange(e)">
            </div>
            
            <div class="col-6">
                <h4 class="mb-3">Cliente</h4>
                <!-- qui cliente -->
            </div>

            <div class="col-6">
                <h4 class="mb-3">Prodotti</h4>
                <!-- qui prodotti con table + totale -->
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
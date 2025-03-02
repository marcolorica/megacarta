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

                <input type="range" class="form-range mt-5" min="0" max="7" step="1" value="<?= $order->status->value ?>" data-status-value="<?= $order->status->value ?>" id="statusRange" oninput="statusOrderRangeChanged(this)" onkeypress="onKeyPressOrderStatusRange(e)">
                
                <div class="order-statuses">
                    <?php $i = 0; foreach(mc_get_order_status(null) as $slug => $status) : ?>
                        <label class="label-status <?= $order->status->label == $status->label ? 'actual' : '' ?>" style="left: <?= number_format(($i * 14.29), 2, '.', ',') ?>%">
                            <span data-status-value="<?= $status->label ?>" class="badge text-bg-<?= $status->color ?>"><?= $status->label ?></span>
                        </label>
                    <?php $i++; endforeach; ?>
                </div>                
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
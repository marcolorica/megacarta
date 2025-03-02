<?php
    $order_id = $_GET['id'] ?? null;
    $order = $order_id ? mc_get_order($order_id) : null;
?>

<pre>
    <?= print_r($order); ?>
</pre>

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

            <div class="col-12" style="position:relative">
                <input type="range" class="form-range mt-5" min="0" max="7" step="1" value="<?= $order->status->value ?>" data-original-value="<?= $order->status->value ?>" id="statusRange" oninput="statusOrderRangeChanged(this)" onchange="statusOrderRangeChanged(this)">
                
                <div id="sendCustomerEmail" class="w-100" style="display:none">
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="checkbox" name="send_customer_email" class="form-check-input me-2">
                        <label>Invia email al cliente per il cambio stato dell'ordine</label>
                    </div>
                </div>

                <div class="order-statuses">
                    <?php $i = 0; foreach(mc_get_order_status(null) as $slug => $status) : ?>
                        <label class="label-status <?= $order->status->label == $status->label ? 'actual' : '' ?>" style="left: <?= number_format(($i * 14.29), 2, '.', ',') ?>%" onclick="changeOrderStatusRange(this)">
                            <span data-status-value="<?= $status->value ?>" class="badge text-bg-<?= $status->color ?>"><?= $status->label ?></span>
                        </label>
                    <?php $i++; endforeach; ?>
                </div>    
            </div>

            <div class="col-6">
                <h5 style="color:grey"><?= mc_format_data($order->created, 'd/m/Y H:i') ?></h5>

                <div class="row">
                    <div class="col-6">
                        <label for="">Nome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->first_name ?>" readonly>
                    </div>
                    <div class="col-6">
                        <label for="">Cogome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->last_name ?>" readonly>
                    </div>
                </div>
                <p>Indirizzo di fatturazione</p>
            </div>
            <div class="col-6">
                <h1 class="order-price">€<?= $order->total ?></h1>
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
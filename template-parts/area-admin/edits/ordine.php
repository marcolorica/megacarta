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

                <div class="row pt-5">
                    <div class="col-12">
                        <h3 class="mt-4">Indirizzo di fatturazione</h3>
                    </div>

                    <div class="col-6">
                        <label for="">Nome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->first_name ?>" readonly>

                        <label for="">Email</label>
                        <input type="email" class="form-control mb-3" value="<?= $order->customer->billing->email ?>" readonly>

                        <label for="">Indirizzo</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->address_1 ?>" readonly>

                        <label for="">Città</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->city ?>" readonly>

                        <label for="">Dettagli</label>
                        <textarea class="form-control mb-3" rows="6" readonly><?= $order->customer->billing->address_2 ?></textarea>
                    </div>
                    <div class="col-6">
                        <label for="">Cogome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->last_name ?>" readonly>

                        <label for="">Telefono</label>
                        <input type="email" class="form-control mb-3" value="<?= $order->customer->billing->phone ?>" readonly>

                        <label for="">CAP</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->postcode ?>" readonly>

                        <label for="">Provincia</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->billing->state ?>" readonly>
                    </div>

                    <div class="col-12">
                        <h3 class="mt-4">Indirizzo di spedizione</h3>
                    </div>

                    <div class="col-6">
                        <label for="">Nome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->first_name ?>" readonly>

                        <label for="">Email</label>
                        <input type="email" class="form-control mb-3" value="<?= $order->customer->shipping->email ?>" readonly>

                        <label for="">Indirizzo</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->address_1 ?>" readonly>

                        <label for="">Città</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->city ?>" readonly>

                        <label for="">Dettagli</label>
                        <textarea class="form-control mb-3" rows="6" readonly><?= $order->customer->shipping->address_2 ?>"</textarea>
                    </div>
                    <div class="col-6">
                        <label for="">Cogome</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->last_name ?>" readonly>

                        <label for="">Telefono</label>
                        <input type="email" class="form-control mb-3" value="<?= $order->customer->shipping->phone ?>" readonly>

                        <label for="">CAP</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->postcode ?>" readonly>

                        <label for="">Provincia</label>
                        <input type="text" class="form-control mb-3" value="<?= $order->customer->shipping->state ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h1 class="order-price mb-3">€<?= $order->total ?></h1>

                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Codice</th>
                        <th>Prdootto</th>
                        <th>Quantità</th>
                        <th>Subtotale</th>
                    </thead>
                    <tbody>
                        <?php foreach($order->items as $i => $product) : ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $product->sku ?></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->qty ?></td>
                                <td>€<?= $peoduct->subtotal ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="text-end" colspan="4"></td>
                            <td>€<?= $order->total ?></td>
                        </tr>
                    </tbody>
                </table>
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
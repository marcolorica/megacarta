<?php
    get_header();

    $order_key = $_GET['key'] ?? null;
    $order_id = $order_key ? wc_get_order_id_by_order_key($order_key) : null;
    $order = $order_id ? wc_get_order($order_id) : null;

    $customerName = $order ? $order->get_billing_first_name() : '';
?>

<section class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Grazie <?= $customerName ?> per aver acquistato da noi!</h1>
                <h3 class="text-center">Riceverai una mail con i dettagli dell'ordine</h3>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
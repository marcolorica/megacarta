<?php
    get_header();
    $url_parts = explode('/', $_SERVER['REQUEST_URI']);
    $order_id = intval($url_parts[count($url_parts) - 1]);

    $order = wc_get_order($order_id);
    $customerName = $order ? $order->get_billing_first_name() : '';
?>

<section>
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
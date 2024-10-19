<?php get_header(); ?>

<?php

    $cartProducts = [];
    $cartTotal = 0;

    $cart_items = WC()->cart->get_cart();

    $baseDir = get_stylesheet_directory_uri();

    foreach($cart_items as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];

        $sku = $product->get_name();
        $name = $product->get_description();
        $price = $product->get_price();
        $qty = $cart_item['quantity'];
        $url = $product->get_permalink();

        $imgCode = $imgCode = str_replace('/', '-', $sku);
        $img = "$baseDir/assets/images/products/$imgCode.webp";

        $cartTotal += $price * $qty;

        $cartProducts[$sku] = [
            'itemKey' => $cart_item_key,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
            'url' => $url,
            'image' => $img
        ];
    }

?>

<main>
    <div class="container cart p-5">
        <h1 class="text-white mb-3">Carrello</h1>

        <div class="row bg-white p-4">
            <div class="col-12 col-md-8 <?= count($cartProducts) ? '' : 'd-none' ?> col-cart-products">
                <div class="row mb-2" style="border-bottom: 1px solid lightgrey">
                    <div class="col-9">
                        <h4>Prodotti</h4>
                    </div>
                    <div class="col-3">
                        <p><b>Totale</b></p>
                    </div>
                </div>
    
                <?php
                    foreach($cartProducts as $sku => $product) {
                        $product = (object) $product;
                    ?>
                    <div class="row mb-3 row-cart-product py-3" data-sku="<?= $sku ?>" data-price="<?= $product->price ?>" data-cart-item-key="<?= $product->itemKey ?>">
                        <div class="col-3">
                            <img src="<?= $product->image ?>" class="w-100">
                        </div>
                        <div class="col-6">
                            <p class="m-0"><a href="<?= $product->url ?>"><?= $product->description ?></a></p>
                            <p class="mb-0 fw-bold me-2 mb-2">Codice: <?= $sku ?></p>
                            <p class="mb-0 fs-4 me-2 mb-2">€<?= $product->price ?></p>
                            <div class="qty mb-2">
                                <input type="number" class="form-control w-25" value="<?= $product->qty ?>" oninput="changeCartTotals()" onkeyup="changeCartTotals()" onchange="changeCartTotals()">
                            </div>
                            <p class="remove-product"><a class="text-danger" role="button" onclick="removeProductFromCart('<?= $sku ?>')"><i class="fa-solid fa-trash me-2"></i>Rimuovi prodotto</a></p>
                        </div>
                        <div class="col-3">
                            <p style="font-size: 20px;">€<span class="product-total"><?= $product->qty * $product->price ?></span></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-12 col-md-4 d-<?= count($cartProducts) ? 'flex' : 'none' ?> col-cart-products flex-column align-items-end justify-content-between">
                <div class="w-100 text-end">
                    <h4 class="text-end">Totale Carrello</h4>
                    <p class="fw-bold" style="font-size:40px">€<span class="cart-total"><?= $cartTotal ?></span></p>
                </div>
                <a href="/checkout" class="btn btn-success"><i class="fa-solid fa-shopping-cart fa-xs me-2"></i>Procedi con l'ordine</a>
            </div>
            <div class="col-12 flex-column py-4 justify-content-center align-items-center col-cart-empty d-<?= count($cartProducts) ? 'none' : 'flex' ?>">
                <i class="fa-solid fa-cart-flatbed"></i>
                <p>Non hai ancora aggiunto prodotti al carrello!</p>
                <p>Visita il nostro <a href="/">Catalogo</a> per aggiungerne di nuovi</p>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
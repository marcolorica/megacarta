<?php
    $statuses = [
        "pending" => "In attesa di pagamento",
        "processing" => "In lavorazione",
        "on-hold" => " In attesa",
        "completed" => "Completato",
        "cancelled" => "Annullato",
        "refunded" => "Rimborsato",
        "failed" => "Fallito"
    ];
?>

<!-- <select id="order_status" class="form-select mb-3" data-original-value="<?= $order->status ?>" onchange="changeOrderStatus(this)">
    <option <?= $order->status == 'pending' ? 'selected' : '' ?> value="pending">In attesa di pagamento</option>
    <option <?= $order->status == 'processing' ? 'selected' : '' ?> value="processing">In lavorazione</option>
    <option <?= $order->status == 'on-hold' ? 'selected' : '' ?> value="on-hold"> In attesa</option>
    <option <?= $order->status == 'completed' ? 'selected' : '' ?> value="completed">Completato</option>
    <option <?= $order->status == 'cancelled' ? 'selected' : '' ?> value="cancelled">Annullato</option>
    <option <?= $order->status == 'refunded' ? 'selected' : '' ?> value="refunded">Rimborsato</option>
    <option <?= $order->status == 'failed' ? 'selected' : '' ?> value="failed">Fallito</option>
</select> -->

<label for="" class="label-status"><span class="badge"><?= $statuses[$order->status] ?></span></label>
<input type="range" class="form-range mb-3" min="0" max="6" step="1" id="statusRange" onkeypress="onKeyPressOrderStatusRange(e)">

<label class="d-flex justify-content-center align-items-center"><input type="checkbox" name="order_send_email" class="form-check me-2">Invia email al cliente per il cambio di stato</label>

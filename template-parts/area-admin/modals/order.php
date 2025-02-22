<div class="modal fade" id="orderStatusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title border-0">Ordine #<?= $order->id ?> - Modifica Stato </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                <input type="range" class="form-range mb-3" min="0" max="6" step="1" id="statusRange">

                <label class="d-flex justify-content-center align-items-center"><input type="checkbox" name="order_send_email" class="form-check me-2">Invia email al cliente per il cambio di stato</label>

                <!-- <a href="/admin/ordini/ordine/<?= $order->id ?>" class="text-primary">Visualizza più dettagli <i class="fa-solid fa-arrow-right ms-2 fa-sm"></i></a> -->
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary" onclick="saveOrderStatus(this)" disabled>Salva</button>
            </div>
        </div>
    </div>
</div>


<!-- ok -->
<div class="modal" id="orderStatusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ordine #<?= $order->id ?> - Modifica Stato </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="order_status" class="form-select">
                    <option <?= $order->status == 'pending' ? 'selected' : '' ?> value="pending">In attesa di pagamento</option>
                    <option <?= $order->status == 'processing' ? 'selected' : '' ?> value="processing">In lavorazione</option>
                    <option <?= $order->status == 'on-hold' ? 'selected' : '' ?> value="on-hold"> In attesa</option>
                    <option <?= $order->status == 'completed' ? 'selected' : '' ?> value="completed">Completato</option>
                    <option <?= $order->status == 'cancelled' ? 'selected' : '' ?> value="cancelled">Annullato</option>
                    <option <?= $order->status == 'refunded' ? 'selected' : '' ?> value="refunded">Rimborsato</option>
                    <option <?= $order->status == 'failed' ? 'selected' : '' ?> value="failed">Fallito</option>
                </select>
                <p><a href="/admin/ordini/ordine/<?= $order->id ?>">Visualizza più dettagli <i class="fa-solid fa-arrow-right ms-3 fa-sm"></i></a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveOrderStatus(this)" disabled>Salva</button>
            </div>
        </div>
    </div>
</div>
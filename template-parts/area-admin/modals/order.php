<div class="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ordine #<?= $order->id ?> - Modifica Stato </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="order_status">
                    <option value="pending"></option>
                    <option value="processing"></option>
                    <option value="on-hold"></option>
                    <option value="completed"></option>
                    <option value="cancelled"></option>
                    <option value="refunded"></option>
                    <option value="failed"></option>
                    <option value="checkout-draft"></option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveOrderStatus(this)" disabled>Salva</button>
            </div>
        </div>
    </div>
</div>
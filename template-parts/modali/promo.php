<div class="modal fade" id="promoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="promoModalLabel">PER PREVENTIVI ALL'INGROSSO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <p>Se necessiti di un preventivo particolare per merce all'ingrosso lasciaci il tuo recapito per essere ricontattato il prima possibile!</p>

                        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-promo" method="POST">
                            <input type="hidden" name="action" value="submit_promo_modal">
                        </form>

                        <div class="d-flex w-100 gap-2 mb-3">
                            <div class="w-50">
                                <input type="text" name="name" class="form-control" form="form-promo" placeholder="Nome *" required>
                            </div>
                            <div class="w-50">
                                <input type="text" name="surname" class="form-control" form="form-promo" placeholder="Cognome *" required>
                            </div>
                        </div>

                        <input type="email" name="email" class="form-control mb-3" form="form-promo" placeholder="Email *" required>

                        <div class="mg-phone">
                            <span class="img-dial"></span>
                            
                            <select id="phones-select" class="form-select" onclick="openRequestDropdown(this)">
                                <option value="" selected disabled>+ 39</option>
                            </select>
    
                            <div class="request-dropdown py-3 rounded-1 shadow" id="phones-dropdown">
                                <div class="sub-options-container">
                                </div>
                            </div>
                        </div>

                        <input type="text" name="rag_sociale" class="form-control mb-3" form="form-promo" placeholder="Ragione Sociale *" required>

                        <input type="text" name="piva" class="form-control mb-3" form="form-promo" placeholder="Partita IVA *" required>

                        <select name="settore" class="form-select mb-3" form="form-promo" required>
                            <option value="" selected disabled>Settore economico *</option>
                        </select>

                        <label for="privacy-check" class="d-flex" style="font-size:8px">
                            <input type="checkbox" class="form-check-input me-2" form="form-promo" required>
                            <span>Acconsento alla condivisione dei miei dati per essere ricontattato da Megacarta S.r.l. e alla loro memorizzazione per facilitare la fruizione del servizio. Dichiaro di essere maggiorenne, di aver letto e accettato <a href="/condizioni-duso">Condizioni d'uso</a> e <a href="/privacy-policy">Privacy Policy</a></span>
                        </label>

                    </div>
                    <div class="col-6">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/promo.webp">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .request-offcanvas .request-dropdown {
        position: absolute;
        display: none;
        border: 1px solid #dee2e6;
        font-size: 1rem;
        width: 100%;
        z-index: 9999;
        background: white;
        max-height: 200px;
        overflow-y: scroll;
    }

    #phones-dropdown {
        width: max-content;
    }

    #phones-dropdown .request-option {
        justify-content: start;
        gap: 10px;
    }

    #phones-dropdown .request-option .dial-code {
        color: grey;
    }

    .request-offcanvas .request-dropdown .sub-options-container {
        display: none;
    }
</style>
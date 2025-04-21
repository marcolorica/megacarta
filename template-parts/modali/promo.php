<div class="modal modal-lg fade" id="promoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="row">
                    <div class="col-12">
                        <h1 class="modal-title fs-5 text-center" style="font-weight:bold;font-size:26px">HAI UN'ATTIVITÀ SU ROMA E PROVINCIA E UTILIZZI GRANDI QUANTITATIVI DI PRODOTTI MONOUSO O DETERGENZA?</h1>
                        <p class="text-center my-4">Contattaci per fissare un appuntamento o ricevere un listino personalizzato con condizioni vantaggiose pensate per la tua realtà.</p>
                    </div>
                    <div class="col-6">

                        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-promo" method="POST">
                            <input type="hidden" name="action" value="submit_promo_modal">
                        </form>

                        <div class="d-flex w-100 gap-2 mb-3">
                            <div class="w-50">
                                <input type="text" name="name" class="form-control" form="form-promo" placeholder="Nome">
                            </div>
                            <div class="w-50">
                                <input type="text" name="surname" class="form-control" form="form-promo" placeholder="Cognome">
                            </div>
                        </div>

                        <input type="email" name="email" class="form-control mb-3" form="form-promo" placeholder="Email *" required>

                        <div class="w-100 d-flex gap-2 mb-3">
                            <div class="w-25">
                                <span class="img-dial"></span>
                                
                                <select id="phones-select" class="form-select mc-select" onclick="openPhoneDropdown(this)">
                                    <option value="" selected disabled>+ 39</option>
                                </select>
        
                                <div class="mc-dropdown py-3 rounded-1 shadow" id="phones-dropdown">
                                    <div class="sub-options-container">
                                    </div>
                                </div>
                            </div>

                            <input type="text" placeholder="Telefono *" class="form-control w-75" form="form-promo" required>
                        </div>

                        <input type="text" name="rag_sociale" class="form-control mb-3" form="form-promo" placeholder="Ragione Sociale *" required>

                        <select name="settore" class="form-select mb-3" form="form-promo" onchange="changeSector(this)" required>
                            <option value="" selected disabled>Settore economico *</option>

                            <option value="Ristorazione">Ristorazione</option>
                            <option value="Bar e Caffetterie">Bar e Caffetterie</option>
                            <option value="Mense aziendali e scolastiche">Mense aziendali e scolastiche</option>
                            <option value="Strutture ricettive (hotel, B&B, agriturismi)">Strutture ricettive (hotel, B&B, agriturismi)</option>
                            <option value="Imprese di pulizia">Imprese di pulizia</option>
                            <option value="Centri massaggi e SPA">Centri massaggi e SPA</option>
                            <option value="Cooperative">Cooperative</option>
                            <option value="Altro">Altro</option>
                        </select>

                        <div id="altro" style="display:none">
                            <input type="text" class="form-control mb-3" name="altro" form="form-promo" placeholder="Specifica il tuo settore economico...">
                        </div>

                        <textarea name="note" form="form-promo" class="form-control mb-3" placeholder="Note..."></textarea>

                        <label for="privacy-check" class="d-flex" style="font-size:8px">
                            <input type="checkbox" class="form-check-input me-2" form="form-promo" required>
                            <span>Acconsento alla condivisione dei miei dati per essere ricontattato da Megacarta S.r.l. e alla loro memorizzazione per facilitare la fruizione del servizio. Dichiaro di essere maggiorenne, di aver letto e accettato <a href="/condizioni-duso">Condizioni d'uso</a> e <a href="/privacy-policy">Privacy Policy</a></span>
                        </label>

                        <button class="btn btn-danger w-100 mt-4">INVIA</button>

                    </div>
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        <img class="w-100" src="<?= get_stylesheet_directory_uri() ?>/assets/images/promo-mc.webp">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

megacartasrl@hotmail.com
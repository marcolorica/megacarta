<?php $settings = mc_get_settings(); ?>
<?php $email = mc_get_page_datas('contatti')->email; ?>

<footer id="syrus-theme-footer">
    <div class="footer-info-container">        
        <div class="footer-info copyright">
            <a href="privacy-policy" title="MEGACARTA Srl">© <?= date("Y") ?> MEGACARTA Srl</a>
        </div>

        <div class="footer-info testo-1">
            <p><?= $settings->address ?></p>
        </div>

        <div class="footer-info testo-2">
            <p>P.IVA <?= $settings->partita_iva ?></p>
        </div>

        <div class="footer-info testo-1">
            <p><?= $email ?></p>
        </div>
    </div>
</footer>
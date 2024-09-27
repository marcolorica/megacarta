<?php get_header(); ?>

<?php
    $cats = get_mc_categories();
?>

<section class="intestazione">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="mc-overlay w-100">
                    <h1>MEGACARTA</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Esplora il nostro catalogo</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach($cats as $c): ?>
                <div class="col-12 col-md-4">
                    <a href="/catalogo" class="link-cat">
                        <div class="card-categoria">
                            <img src="<?= $c->img ?>" class="img-cat">
                            <p class="title-cat"><?= $c->name ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mappa">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Spediamo in tutta Roma!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>MEGACARTA SRL: La Tua Soluzione Completa per Rifornimenti di Carta, Plastica e Alluminio a Roma</h3>

                <p>MEGACARTA SRL è una realtà consolidata e dinamica nel settore della distribuzione di forniture di carta, plastica e alluminio. Da anni ci impegniamo a garantire un servizio efficiente e di qualità ai nostri clienti, offrendo prodotti di alta gamma per rispondere a ogni esigenza del mercato. La nostra azienda si distingue per la vasta gamma di articoli che mette a disposizione, che variano dalla carta per uffici e attività commerciali, ai prodotti in plastica e alluminio per l’imballaggio e il confezionamento.</p>
                <p>La nostra missione è fornire soluzioni rapide e personalizzate, mantenendo sempre al centro del nostro operato il cliente. Sappiamo quanto sia importante disporre di materiali affidabili e di qualità, per questo selezioniamo con cura i nostri fornitori e monitoriamo costantemente i processi di distribuzione. Grazie a un sistema logistico avanzato, siamo in grado di consegnare in tutta Roma, garantendo puntualità e flessibilità, anche in situazioni di richiesta urgente.</p>
            </div>

            <div class="col-12 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2973.787048369707!2d12.632556876784765!3d41.811347671249194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13258632ef4dfd4b%3A0x98bb2a73478684b1!2sMEGA%20CARTA%20SRL!5e0!3m2!1sit!2sit!4v1727395814061!5m2!1sit!2sit" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <img src="<?= get_stylesheet_directory_uri() . '/assets/images/mappa-roma.png' ?>" class="w-100 img-content"> -->
            </div>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Contattaci</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name">Nome <span class="text-red">*</span></label>
                <input type="text" name="name" class="form-control mb-3">

                <label for="surname">Cognome <span class="text-red">*</span></label>
                <input type="text" name="surname" class="form-control mb-3">

                <label for="email">Email <span class="text-red">*</span></label>
                <input type="email" name="email" class="form-control mb-3">
            </div>
            <div class="col-12 col-md-6 text-end">
                <label class="w-100 text-start" for="message">Messaggio *</label>
                <textarea name="message" class="form-control mb-3"></textarea>
                <button class="btn btn-primary"><i class="fa-regular fa-paper-plane me-2"></i>Invia</button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

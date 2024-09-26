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
                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/mappa-roma.png' ?>" class="w-100 img-content">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

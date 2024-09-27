<?php get_header(); ?>

<section class="intestazione">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="mc-overlay w-100">
                    <h1>CONTATTI</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contacts mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Contattaci</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 text-end">
                <label class="w-100 text-start" for="name">Nome <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control mb-3">

                <label class="w-100 text-start" for="surname">Cognome <span class="text-danger">*</span></label>
                <input type="text" name="surname" class="form-control mb-3">

                <label class="w-100 text-start" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control mb-3">
                
                <label class="w-100 text-start" for="message">Messaggio <span class="text-danger">*</span></label>
                <textarea name="message" class="form-control mb-3" rows="10"></textarea>

                <button class="btn btn-primary"><i class="fa-regular fa-paper-plane me-2"></i>Invia</button>
            </div>
            <div class="col-12 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2973.787048369707!2d12.632556876784765!3d41.811347671249194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13258632ef4dfd4b%3A0x98bb2a73478684b1!2sMEGA%20CARTA%20SRL!5e0!3m2!1sit!2sit!4v1727395814061!5m2!1sit!2sit" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

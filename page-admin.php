<?php get_header(); ?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-login">
    <input type="hidden" name="action" value="admin_login">
</form>

<section class="mt-5" style="min-height:100vh">
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-8 text-center shadow p-5">
                <h3 class="mb-3">Inserisci le credenziali di accesso</h3>

                <input type="email" class="form-control mb-3" name="email" form="form-login" placeholder="Email">
                <input type="password" class="form-control mb-3" name="password" form="form-login" placeholder="Password">

                <button class="btn btn-danger float-end" type="submit" form="form-login">Accedi</button>
            </div>
        </div>
    </div>
</section>

<?php if(isset($_SESSION['error_login'])) : ?>
    <script>
        jQuery(document).ready(() => {
            Swal.fire({
                title: 'Credenziali errate!',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: 'Riprova',
            });
        });
    </script>
<?php unset($_SESSION['error_login']); endif; ?>

<?php get_footer(); ?>
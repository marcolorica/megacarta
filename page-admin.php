<?php get_header(); ?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" id="form-login">
    <input type="hidden" name="action" value="admin_login">
</form>

<section class="mt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h3>Inserisci le credenziali di accesso</h3>

                <input type="email" class="form-control" name="email" form="form-login" placeholder="Email">
                <input type="password" class="form-control" name="password" form="form-login" placeholder="password">
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
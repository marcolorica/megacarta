<?php get_header(); ?>

<form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" id="form-login">
    <input type="hidden" name="action" value="admin_login">
</form>

<section class="mt-5" style="min-height:100vh">
    <div class="container pt-5">
        <div class="row my-3 justify-content-center">
            <div class="col-8 text-center shadow p-5">
                <h3 class="mb-3">Inserisci le credenziali di accesso</h3>

                <input type="email" class="form-control mb-3" name="email" form="form-login" placeholder="Email">

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" form="form-login">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordType(this)">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>

                <button class="btn btn-danger float-end" type="submit" form="form-login">Accedi</button>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePasswordType(el) {
        let $psw = jQuery(el).prev();
        let $icon = jQuery(el).find('i');

        if($psw.attr('type') == 'text') {
            $psw.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
        else {
            $psw.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    }
</script>

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
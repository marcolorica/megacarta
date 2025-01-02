<?php

add_action('admin_post_admin_login', 'admin_login_action_handler');
add_action('admin_post_nopriv_admin_login', 'admin_login_action_handler');

function admin_login_action_handler() {
    $request = (object) $_POST;

    $user = get_user_by('email', $request->email);

    var_dump($request, $user);die;

    if($user && wp_check_password($request->password, $user->data->user_pass)) {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID, true);
        update_user_meta($user->ID, 'last_login', current_time('mysql'));
        wp_redirect('/area-admin/dashboard');
    }

    $_SESSION['error_login'] = true;
    wp_redirect('/admin');
    exit();
}
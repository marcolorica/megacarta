<?php

add_action('admin_post_admin_login', 'admin_login_action_handler');
add_action('admin_post_nopriv_admin_login', 'admin_login_action_handler');

add_action('admin_post_save_page_edits', 'admin_save_page_edits');

function admin_login_action_handler() {
    $request = (object) $_POST;

    $user = get_user_by('email', $request->email);

    if($user && wp_check_password($request->password, $user->data->user_pass)) {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID, true);
        
        update_user_meta($user->ID, 'last_login', current_time('mysql'));
        
        wp_redirect('/area-admin');
        exit();
    }

    $_SESSION['error_login'] = true;
    wp_redirect('/admin');
    exit();
}

function admin_save_page_edits() {
    $request = (object) $_POST;

    $pagina = $request->pagina;

    $home_main_img = $request->home_main_img ?? null;
    $home_categories = $request->home_categories ?? null;
    $home_map_title = $request->home_map_title ?? null;
    $home_map_text = $request->home_map_text ?? null;
    $chi_siamo_main_img = $request->chi_siamo_main_img ?? null;
    $chi_siamo_title_1 = $request->chi_siamo_title_1 ?? null;
    $chi_siamo_text_1 = $request->chi_siamo_text_1 ?? null;
    $chi_siamo_img_1 = $request->chi_siamo_img_1 ?? null;
    $chi_siamo_title_2 = $request->chi_siamo_title_2 ?? null;
    $chi_siamo_text_2 = $request->chi_siamo_text_2 ?? null;
    $chi_siamo_img_2 = $request->chi_siamo_img_2 ?? null;
    $chi_siamo_content_1 = $request->chi_siamo_content_1 ?? null;
    $chi_siamo_content_2 = $request->chi_siamo_content_2 ?? null;
    $contatti_main_img = $request->contatti_main_img ?? null;
    $contacts_phone = $request->contacts_phone ?? null;
    $contacts_whatsapp = $request->contacts_whatsapp ?? null;
    $contacts_email = $request->contacts_email ?? null;

    set_option('mc_home_main_img', $home_main_img);
    set_option('mc_home_categories', $home_categories);
    set_option('mc_home_map_title', $home_map_title);
    set_option('mc_home_map_text', $home_map_text);
    set_option('mc_chi_siamo_main_img', $chi_siamo_main_img);
    set_option('mc_chi_siamo_title_1', $chi_siamo_title_1);
    set_option('mc_chi_siamo_text_1', $chi_siamo_text_1);
    set_option('mc_chi_siamo_img_1', $chi_siamo_img_1);
    set_option('mc_chi_siamo_title_2', $chi_siamo_title_2);
    set_option('mc_chi_siamo_text_2', $chi_siamo_text_2);
    set_option('mc_chi_siamo_img_2', $chi_siamo_img_2);
    set_option('mc_chi_siamo_content_1', $chi_siamo_content_1);
    set_option('mc_chi_siamo_content_2', $chi_siamo_content_2);
    set_option('mc_contatti_main_img', $contatti_main_img);
    set_option('mc_contacts_phone', $contacts_phone);
    set_option('mc_contacts_whatsapp', $contacts_whatsapp);
    set_option('mc_contacts_email', $contacts_email);

    $_SESSION['save_success'] = true;
    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
    exit();
}
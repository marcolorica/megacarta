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
    $to_update = [];

    switch($pagina) {
        case 'home':
            $to_update = [
                'home_categories',
                'home_map_title',
                'home_map_text'
            ];

            $img = $_FILES['home_main_img'] ?? null;
            $img = $img ? (object) $img : null;

            if($img && !empty($img->name)) {
                $upload = mc_upload_image_in_theme($$img->name, $img->tmp_name);

                if($upload->status != 'success') {
                    $_SESSION['error'] = $upload->message;
                    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                    exit();
                }
                
                update_option('mc_home_main_img', get_stylesheet_directory_uri() . "/assets/images/pages/homepage-bg." . explode('/', mime_content_type($img->tmp_name))[1]);
            }

            break;

        case 'chi-siamo':
            $images = [
                'chi_siamo_main_img',
                'chi_siamo_img_1',
                'chi_siamo_img_2',
            ];

            $to_update = [
                'chi_siamo_title_1',
                'chi_siamo_text_1',
                'chi_siamo_title_2',
                'chi_siamo_text_2',
                'chi_siamo_content',
            ];

            foreach($images as $img_name) {
                $img = $_FILES[$img_name] ?? null;
                $img = $img ? (object) $img : null;

                if($img && !empty($img->name)) {
                    $upload = mc_upload_image_in_theme($$img->name, $img->tmp_name);
    
                    if($upload->status != 'success') {
                        $_SESSION['error'] = $upload->message;
                        wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                        exit();
                    }
                    
                    update_option('mc_' . $img_name, get_stylesheet_directory_uri() . "/assets/images/pages/homepage-bg." . explode('/', mime_content_type($img->tmp_name))[1]);
                }
            }
            
            break;

        case 'contatti':
            $to_update = [
                'contatti_main_img',
                'contacts_phone',
                'contacts_whatsapp',
                'contacts_email'
            ];

            $img = $_FILES['contatti_main_img'] ?? null;
            $img = $img ? (object) $img : null;

            if($img && !empty($img->name)) {
                $upload = mc_upload_image_in_theme($$img->name, $img->tmp_name);

                if($upload->status != 'success') {
                    $_SESSION['error'] = $upload->message;
                    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                    exit();
                }
                
                update_option('mc_contatti_main_img', get_stylesheet_directory_uri() . "/assets/images/pages/contatti-bg." . explode('/', mime_content_type($img->tmp_name))[1]);
            }
            
            break;
    }

    foreach($to_update as $name) {
        update_option('mc_' . $name, ($request->$name ?? null));
    }

    $_SESSION['save_success'] = true;
    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
    exit();
}
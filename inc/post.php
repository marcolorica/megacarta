<?php

add_action('admin_post_admin_login', 'admin_login_action_handler');
add_action('admin_post_nopriv_admin_login', 'admin_login_action_handler');

add_action('admin_post_save_product_edits', 'admin_save_product_edits');
add_action('admin_post_save_page_edits', 'admin_save_page_edits');
add_action('admin_post_save_cat_edits', 'admin_save_cat_edits');
add_action('admin_post_save_settings', 'admin_save_settings');

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
                $file_type = mime_content_type($img->tmp_name);
                $upload = mc_upload_image_in_theme($img->name, $img->tmp_name);

                if($upload->status != 'success') {
                    $_SESSION['error'] = $upload->message;
                    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                    exit();
                }

                $ext = explode('/', $file_type)[1];
                $ext = $ext == 'jpeg' ? 'jpg' : $ext;
                
                update_option('mc_home_main_img', get_stylesheet_directory_uri() . "/assets/images/homepage-bg." . $ext);
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
                    $file_type = mime_content_type($img->tmp_name);
                    $upload = mc_upload_image_in_theme($img->name, $img->tmp_name);
    
                    if($upload->status != 'success') {
                        $_SESSION['error'] = $upload->message;
                        wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                        exit();
                    }

                    $ext = explode('/', $file_type)[1];
                    $ext = $ext == 'jpeg' ? 'jpg' : $ext;

                    $new_name = str_replace('_', '-', str_replace('_img', '', (str_replace('main', 'bg', $img_name)))) . '.' . $ext;
                    
                    update_option('mc_' . $img_name, get_stylesheet_directory_uri() . "/assets/images/$new_name");
                }
            }
            
            break;

        case 'contatti':
            $to_update = [
                'contacts_phone',
                'contacts_whatsapp',
                'contacts_email'
            ];

            $img = $_FILES['contatti_main_img'] ?? null;
            $img = $img ? (object) $img : null;

            if($img && !empty($img->name)) {
                    $file_type = mime_content_type($img->tmp_name);
                    $upload = mc_upload_image_in_theme($img->name, $img->tmp_name);

                if($upload->status != 'success') {
                    $_SESSION['error'] = $upload->message;
                    wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
                    exit();
                }

                $ext = explode('/', $file_type)[1];
                $ext = $ext == 'jpeg' ? 'jpg' : $ext;
                
                update_option('mc_contatti_main_img', get_stylesheet_directory_uri() . "/assets/images/contatti-bg." . $ext);
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

function admin_save_cat_edits() {
    $request = (object) $_POST;

    $term_id = intval($request->term_id);

    $name = $request->cat_name ?? null;
    $slug = $name ? sanitize_title($name) : null;
    
    $cat_slug = $request->cat_slug ?? null;
    $parent = $request->cat_parent ?? 0;

    $to_update = ['parent' => intval($parent)];

    if($name) {
        $to_update['name'] = $name;
        $to_update['slug'] = $slug;
    }

    if(term_exists($term_id, 'product_cat'))
        $result = wp_update_term($term_id, 'product_cat', $to_update);

    $img = $_FILES['cat_img'] ?? null;
    $img = $img ? (object) $img : null;

    if($img && !empty($img->name)) {
        $file_type = mime_content_type($img->tmp_name);
        $ext = explode('/', $file_type)[1];
        $ext = $ext == 'jpeg' ? 'jpg' : $ext;

        $upload = mc_upload_image_in_theme("$slug.$ext", $img->tmp_name, 'categories/');

        if($upload->status != 'success') {
            $_SESSION['error'] = $upload->message;
            wp_redirect('/area-admin/pagine/pagina?slug=' . $pagina);
            exit();
        }
    }
    else {
        $img_exists = mc_get_cat_img($cat_slug);

        if($img_exists && $slug != $cat_slug) {
            $image_dir = get_template_directory() . '/assets/images/';
    
            $ext = explode('.', $img_exists)[1];
    
            $old_image_path = $image_dir . $cat_slug . '.' . $ext;
            $new_image_path = $image_dir . $slug . '.' . $ext;
    
            if(file_exists($old_image_path))
                rename($old_image_path, $new_image_path);
        }
    }
    
    $_SESSION['save_success'] = true;
    wp_redirect('/area-admin/categorie/categoria?id=' . $term_id);
    exit();
}

function admin_save_settings() {
    $request = (object) $_POST;

    $to_update = [
        'map_iframe',
        'address',
        'partita_iva'
    ];

    foreach($to_update as $name) {
        update_option('mc_' . $name, ($request->$name ? stripslashes($request->$name) : null));
    }

    $_SESSION['save_success'] = true;
    wp_redirect('/area-admin/impostazioni');
    exit();
}

function admin_save_product_edits() {
    $request = (object) $_POST;

    $product_id = $request->product_id ?? null;
    $new_oem = $request->product_oem;
    $old_oem = null;

    $variants = [];
    $_variants = $request->product_variants ?? [];

    foreach($_variants as $i => $v) {
        $v = (object) $v;
        
        $img = $_FILES['product_variants'][$i] ?? null;
        $img = $img ? (object) $img : null;

        $_variant = (object) [
            'id' => uniqid(),
            'name' => $v->name,
            'price' => $v->price,
            'img' => null
        ];

        if($img && !empty($img->name)) {
            $file_type = mime_content_type($img->tmp_name);
            $upload = mc_upload_image_in_theme($img->name, $img->tmp_name, 'products/variants/');

            if($upload->status != 'success') {
                $_SESSION['error'] = $upload->message;
                wp_redirect('/area-admin/prodotti/prodotto' . ($product_id ? '?id=' . $product_id : ''));
                exit();
            }

            $_variant->img = get_stylesheet_directory_uri() . '/assets/images/products/variants/' . $img->name;
        }

        $variants[] = $_variant;
    }

    if(!$product_id) {
        $product = new WC_Product_Simple();
		$product->set_name($request->product_code);
		$product->set_description($request->product_name);
		$product->set_regular_price($request->product_price);
		$product->set_status('publish');
        $product->update_meta_data('oem', $new_oem);
        $product->update_meta_data('mc_variants', $variants);
		$product_id = $product->save();
    }
    else {
        $product = wc_get_product($product_id);

        $old_oem = $product->get_meta('oem');

        $product->set_name($request->product_code);
		$product->set_description($request->product_name);
		$product->set_regular_price($request->product_price);
		$product->set_status('publish');
        $product->update_meta_data('oem', $new_oem);
        $product->update_meta_data('mc_variants', $variants);

		$product->save();
    }

    wp_set_object_terms($product_id, $request->product_categories, 'product_cat');

    $img = $_FILES['product_img'] ?? null;
    $img = $img ? (object) $img : null;

    if($img && !empty($img->name)) {
        $file_type = mime_content_type($img->tmp_name);
        $ext = explode('/', $file_type)[1];
        $ext = $ext == 'jpeg' ? 'jpg' : $ext;

        $upload = mc_upload_image_in_theme("$new_oem.$ext", $img->tmp_name, 'products/');

        if($upload->status != 'success') {
            $_SESSION['error'] = $upload->message;
            wp_redirect('/area-admin/prodotti/prodotto?id=' . $product_id);
            exit();
        }
    }
    else if($product_id) {
        $img_exists = mc_get_product_image($product_id);

        if($img_exists && $old_oem != $new_oem) {
            $image_dir = get_template_directory() . '/assets/images/products/';
    
            $ext = explode('.', $img_exists)[1];
    
            $old_image_path = $image_dir . $old_oem . '.' . $ext;
            $new_image_path = $image_dir . $new_oem . '.' . $ext;
    
            if(file_exists($old_image_path))
                rename($old_image_path, $new_image_path);
        }
    }

    $_SESSION['save_success'] = true;
    wp_redirect('/area-admin/prodotti/prodotto?id=' . $product_id);
    exit();
}
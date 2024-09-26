<?php


function mc_wp_enqueue_scripts() {
	wp_enqueue_style('mc-style',get_stylesheet_directory_uri() . '/style.css', [], md5(uniqid()));
	wp_enqueue_style('mc-owl-custom-css',get_stylesheet_directory_uri() . '/assets/css/owl-mc.css', [], md5(uniqid()));
	wp_enqueue_script('mc-script',get_stylesheet_directory_uri() . '/assets/js/global.js', ['jquery', 'jquery-ui'],  md5(uniqid()));

	wp_localize_script('mc-script','mc', ['ajax_url' => admin_url('admin-ajax.php')]);

	// DIPENDENZE
	wp_enqueue_style('mc-fontawesome-css',get_stylesheet_directory_uri() . '/assets/css/fontawesome.min.css', [], "0.0.1");
	wp_enqueue_style('mc-owl-carousel-css',get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', [], "2.3.4");
	wp_enqueue_style('mc-owl-default-theme-css',get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.css', [], "2.3.4");
	wp_enqueue_style('mc-owl-animate-css',"https://owlcarousel2.github.io/OwlCarousel2/assets/css/animate.css", [], "2.3.4");
	wp_enqueue_style('mc-aos-css',get_stylesheet_directory_uri() . '/assets/css/aos.css', [], "2.3.1");

	wp_enqueue_script('mc-owl-carousel-js',get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], "2.3.4");
	wp_enqueue_script('mc-particles-js',get_stylesheet_directory_uri() . '/assets/js/particles.min.js', ['jquery'], "2.0.0");
	wp_enqueue_script('jquery-ui',"https://code.jquery.com/ui/1.13.1/jquery-ui.min.js", ['jquery'],  md5(uniqid()));
	wp_enqueue_script('mc-aos-js',get_stylesheet_directory_uri() . '/assets/js/aos.js', ['jquery'], "2.3.1");

	wp_enqueue_style('swal2-css', "https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css", [], "11.10.0");
    wp_enqueue_script('swal2-js', "https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js", [], "11.10.0");
}

function get_mc_categories() {
	$args = [
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
	];

	$product_categories = get_terms($args);

	$res = [];

	if(!empty($product_categories) && !is_wp_error($product_categories)) {
		foreach($product_categories as $category) {
			$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            
			$img = '';

            if($thumbnail_id)
                $image_url = wp_get_attachment_url($thumbnail_id);

			$res[] = (object) [
				'name' => $category->name,
				'slug' => $category->slug,
				'img' => $img
			];
		}
	}

	return $res;
}

add_action('wp_enqueue_scripts', 'mc_wp_enqueue_scripts');
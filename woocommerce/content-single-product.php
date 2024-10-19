<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

//defined( 'ABSPATH' ) || exit;

	global $product;

	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	//do_action( 'woocommerce_before_single_product' );

    // THEME MOD
    $font_sizes = [
        'small' => "1em",
        'medium' => "1.2em",
        'large' => "1.35em"
    ];

    $general_font_size = get_theme_mod("general-font-size") ? sanitize_text_field(get_theme_mod("general-font-size")) : "medium";
    $general_font_size = $font_sizes[$general_font_size];

	if(wp_is_mobile()) {
?>
	<style>
		body.single-product .summary {
			padding: 1em;
		}

		body.single-product #tab-description,
		body.single-product #tab-additional_information {
			padding: 1em;
		}

		.woocommerce-tabs li {
			font-size: .8em !important;
		}

		.woocommerce div.product p.price, 
		.woocommerce div.product span.price {
			font-size: 3em;
		}

		.woocommerce-variation-price span.price {
			font-size: 2em !important;
		}
	</style>
<?php } else { ?>
	<style>
		.woocommerce div.product p.price, 
		.woocommerce div.product span.price {
			font-size: 4em;
		}

		.woocommerce-variation-price span.price {
			font-size: 3em !important;
		}
	</style>
<?php } ?>

<style media="screen">
	.single-content p, .single-content li, .single-content span{
		font-size: <?= $general_font_size ;?> !important;
	}
</style>


<div class="container main-container" role="main" id="main-content" style="margin-top:75px !important;">
	<div class="row mt-4">
		<div class="col-12" id="content-col">
			<div class="card-post" style="border-radius: 15px;overflow: hidden;box-shadow: none !important;">
				<article class="single-post post-<?= get_the_ID() ;?>" data-id-article="<?= get_the_ID() ;?>" data-url="<?= get_the_permalink() ;?>">
					<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product); ?>>
						<?php
							/**
							 * Hook: woocommerce_before_single_product_summary.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							
							remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
							do_action( 'woocommerce_before_single_product_summary' );
						?>
					
						<div class="summary entry-summary">
							<h1 class="product_title w-auto pb-3 <?= wp_is_mobile() ? 'px-3' : '' ?>"><?= get_the_title() ?></h1>
							
							<?php
							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

							add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
							add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

							echo '<div class="w-100 d-flex align-items-center">';

							echo '<p style="font-size:1.2em !important;" class="mb-2">' . $product->get_description() . '</p>';

							echo '</div>';
							
							add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
							add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
							do_action( 'woocommerce_single_product_summary' );
							?>

							<!-- <p class="mb-1"><b>Categoria</b></p>
							<p class="category"><?= $productInfos->sub_category ? $productInfos->category . ' > ' . $productInfos->sub_category : $productInfos->category ?></p>

							<p class="mb-1"><b>Descrizione</b></p>
							<p class="description"><?= $productInfos->description ?></p> -->
						</div>
					

						<?php
						/**
						 * Hook: woocommerce_after_single_product_summary.
						 *
						 * @hooked woocommerce_output_product_data_tabs - 10
						 * @hooked woocommerce_upsell_display - 15
						 * @hooked woocommerce_output_related_products - 20
						 */
						// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
						do_action( 'woocommerce_after_single_product_summary' );
						?>
					</div>
				</article>
				<div class="post-end post-end-<?= get_the_ID(); ?>"></div>
			</div>
		</div>
	</div>
</div>
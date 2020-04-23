<div class="page-section">
	<div class="container">
		<div class="row">
			<div class="col my-auto">
				<?php

				defined( 'ABSPATH' ) || exit;

					get_header( 'shop' );

					/**
						* Hook: woocommerce_before_main_content.
						*
						* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						* @hooked woocommerce_breadcrumb - 20
						* @hooked WC_Structured_Data::generate_website_data() - 30
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
			</div>
		</div>
	</div>
</div>

<?php
	if (is_active_sidebar('silon_shop_sidebar')) {
		$mail_col ='col-lg-9';
	}else{
		$mail_col ='col';
	}
?>		
<div class="shop-page">
	<div class="container">
		<div class="row">
			<?php if(is_active_sidebar('silon_shop_sidebar')) :?>
				<div class="col-lg-3">
					<?php dynamic_sidebar('silon_shop_sidebar');?>
				</div>
			<?php endif;?>
			<div class="<?php echo $mail_col; ?>">
				
				<?php
					if (is_product_category() == true) :

						$cat_thumb_id = get_woocommerce_term_meta( get_queried_object_id(), 'thumbnail_id', true );
                        $cat_term_url = wp_get_attachment_image_url( $cat_thumb_id ,'large');
                        if (!empty($cat_thumb_id)):?> 
                        	<div class="cat-wide-thumb" style="background-image: url(<?php echo $cat_term_url; ?>)"></div>
                        <?php endif;?>
                    <?php endif;?>
                    
						<header class="woocommerce-products-header">
							<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
								<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
							<?php endif; ?>

							<?php
							/**
							 * Hook: woocommerce_archive_description.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
							?>
						</header>
				<?php

					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}

					/**
					 * Hook: woocommerce_after_main_content.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );

					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
				?>	
			</div>
		</div>
	</div>
</div>

	
<?php


defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class(); ?>>
	<div class="product-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium') ;?>);">
		<div class="row">
			<div class="col my-auto">
				<div class="product-buttons">
                    <!-- Add to cart Button -->
                    <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>"><i class="fa fa-shopping-cart"></i></a>
 
                    <?php if(function_exists('yith_wishlist_constructor')) : ?>
                    <!-- Add to wishlist Button -->
                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                    <?php endif; ?>
 
                    <?php if(function_exists('yith_woocompare_constructor')) : ?>

                    <a href="<?php echo site_url();?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID();?>" class="compare" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow"><i class="fa fa-plus"></i></a>	
                    <!-- Add to compare Button -->
                   
                    <?php endif; ?>
                </div>

				<?php woocommerce_template_loop_rating();?>
			</div>
		</div>
	</div>
	<a href="<?php the_permalink(); ?>"><?php do_action('woocommerce_shop_loop_item_title'); ?></a>
    <?php woocommerce_template_loop_price(); ?>
	
</li>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>


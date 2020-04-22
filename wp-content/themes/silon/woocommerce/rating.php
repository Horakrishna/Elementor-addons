<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count >= 0 ) : ?>

	        <?php echo wc_get_rating_html($average, $rating_count); ?>
		<?php if ( comments_open() ): ?><a href="<?php echo get_permalink() ?>#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s',$review_count,'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
	

<?php endif; ?>
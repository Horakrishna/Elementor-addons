<?php
/**
 * Plugin Name: Silon Elementor  Extension
 * Description: Silon extension.
 * Plugin URI:  
 * Version:     1.0.0
 * Author:      Pallab
 * Author URI:  https://pallab.com/
 * Text Domain: silon-elementor-extension
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

final class Silon_Elementor_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.9.7';
	
	const MINIMUM_PHP_VERSION = '7.0';

	private static $_instance = null;

	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {

		load_plugin_textdomain( 'silon-elementor-extension' );

	}
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles'] );

	}

	
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'silon-elementor-extension' ),
			'<strong>' . esc_html__( 'Silon Elementor  Extension', 'silon-elementor-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'silon-elementor-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'silon-elementor-extension' ),
			'<strong>' . esc_html__( 'Silon Elementor  Extension', 'silon-elementor-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'silon-elementor-extension' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'silon-elementor-extension' ),
			'<strong>' . esc_html__( 'Silon Elementor  Extension', 'silon-elementor-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'silon-elementor-extension' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/slider.php' );
		require_once( __DIR__ . '/widgets/content-block.php');
		require_once( __DIR__ . '/widgets/latest-product.php');
		require_once( __DIR__ . '/widgets/category-product.php');
		require_once( __DIR__ . '/widgets/deal-product.php');
		require_once( __DIR__ . '/widgets/product-hover-cart.php');
		require_once( __DIR__ . '/widgets/product-filter.php');

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_ContentBlock_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_LatestProduct_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_ProductCategory_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_ProductCarousel_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_ProductHover_Cart_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Silon_Feature_Product_Widget() );

	}
	/**
	 * widgets style 
	 * 
	 * @return [type] [description]
	 */
	public function widget_styles(){

		wp_enqueue_style('slider', plugins_url('widgets/css/slider.css', __FILE__ ) );
	}

}

Silon_Elementor_Extension::instance();

 function silon_plugin_scripts() {

	    wp_enqueue_style( 'slick-css', plugins_url( 'assets/css/slick.css', __FILE__ ) );
	   
	    wp_enqueue_script( 'slick-min-js', plugins_url( 'assets/js/slick.min.js', __FILE__ ), array('jquery'), '20151215', true );
	}
	
add_action( 'wp_enqueue_scripts', 'silon_plugin_scripts' );


add_action('wp_ajax_my_ajax_action', 'my_ajax_function');
add_action('wp_ajax_nopriv_my_ajax_action', 'my_ajax_function');

function my_ajax_function() {

    if(wp_verify_nonce($_POST['nonce_get'], 'my_ajax_action')) {
        
        $q = new WP_Query( array(
            'posts_per_page' => 9, 
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $_POST['cat_id'],
                )
            ),
        ));


        $html = '<div class="row">';

        $thumb_id = get_woocommerce_term_meta( $_POST['cat_id'], 'thumbnail_id', true );
        $term_img = wp_get_attachment_image_url(  $thumb_id, 'large' );

        if(!empty($thumb_id)) {
            $html .= '<div class="col-lg-6">
                <div class="f-cat-thumb" style="background-image:url('.$term_img.')"></div>
            </div>';
        }

        while($q->have_posts()) : $q->the_post();
            global $product;
            $html .= '<div class="col-lg-2">
                <div class="single-f-product">
                    <div class="single-f-product-bg" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'medium').')"></div>
                    <h4>'.get_the_title().'</h4>
                    <div class="c-product-price">'.$product->get_price_html().'</div>
                </div>
            </div>';
        endwhile; wp_reset_query();

        $html .= '</div>';

       
    } else {
        
        $html = '<div class="alert alert-danger">Error!</div>';
    }


    echo $html;

    die();
}

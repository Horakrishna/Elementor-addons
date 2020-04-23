<?php 

function silon_widget_areas() {

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets', 'silon' ),
		'id'            => 'footer',
		'description'   => esc_html__('Add widgets Here','silon'),
		'before_widget' => '<div class="%2$s single-sidebar-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Silon Woocommerce widgets', 'silon' ),
		'id'            => 'silon_shop_sidebar',
		'description'   => esc_html__('Add widgets Here','silon'),
		'before_widget' => '<div class="%2$s single-sidebar-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action('widgets_init', 'silon_widget_areas');

<?php 

function silon_widget_areas() {

	register_sidebar( array(
		'name' => __( 'Footer widgets', 'PerfectPoingMarketing' ),
		'id' => 'footer',
		'before_widget' => '<div class="%2$s single-sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}
add_action('widgets_init', 'silon_widget_areas');

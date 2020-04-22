<?php

 function silon_product_category_list(){

 	$elements =get_terms('product_cat', array('hide_empty'=> false) );
 	
 	$product_cat_array = array();

 	if ( !empty( $elements )) {
 		foreach ($elements as $element) {
 			$info =get_term($element, 'product_cat');
 			$product_cat_array[$info->term_id ] = $info->name;
 		}
 	}
 	return $product_cat_array;

 }
class Silon_ProductCategory_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'silon-ProductCategory';
	}

	
	public function get_title() {
		return __( 'Silon  Product Category', 'Silon Elementor  Extension' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	
	public function get_categories() {
		return [ 'general' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Configaration', 'Silon Elementor  Extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
					'cat_ids',
					[
						'label' => __( 'Select Category', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::SELECT2,
						'multiple' => true,
		                'options' => silon_product_category_list(),
					]
        );

		$this->add_control(
			'columns',
			[
				'label' => __( 'Columns', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' =>[
					'1' => __('1 Column','plugin-domain'),
					'2' => __('2 Columns','plugin-domain'),
					'3' => __('3 Columns','plugin-domain'),
					'4' => __('4 Columns','plugin-domain'),
				],
				
			]
		);
		
		$this->add_control(
			'bg',
			[
				'label' => __( 'Image as background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		
		$this->end_controls_section();

		
	}

	
	protected function render() {

		$settings = $this->get_settings_for_display();

		/**
		 * Columns setting
		 * 
		 */
		if ( $settings['columns'] == '4' ) {
			$columns_markup = 'col-lg-3';
		}else if( $settings['columns'] == '3' ){
			$columns_markup = 'col-lg-4';
		}else if( $settings['columns'] == '2' ){
			$columns_markup = 'col-lg-6';
		}else{
			$columns_markup = 'col';
		}


		if (!empty( $settings['cat_ids'])) {

			$html = '<div class="row">';
			 foreach ($settings['cat_ids'] as $cat) {
			 	$thumb_id = get_woocommerce_term_meta( $cat, 'thumbnail_id', true );
				$term_img = wp_get_attachment_image_url( $thumb_id ,'medium');
				$info     = get_term($cat, 'product_cat');
			 	$html .='<div class="'.$columns_markup.' single-category-item">';
			 	
			 	if ( !empty($thumb_id)) {
			 		if ($settings['bg'] == 'yes') {
			 			$html .='<div class="cate-img cate-img-bg" style="background-image:url('.$term_img.')"></div>';
			 		}else{
			 			$html .='  
					<div class="row cate-img">
						<div class="col text-center">
							<img src="'.$term_img.'" alt=""/>
						</div>
					</div>';
			 		}
			 		
			 	}else{
			 		$html .='<div class="no-cat-img"><p>No Category image.</p></div>';
			 	}

				$html .='	
					<h3>'.$info->name.' <span>'.$info->count.'</span></h3>
					<p>'.$info->description.'</p>
					
			 	</div>';
			 }
			$html .='<div>';
		}else{
			$html ='<div class="alert alert-warning"><p>Pleease select Category.</p></div>';
		}
		echo $html;
	}
}

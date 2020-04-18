<?php
 function silon_product_cat_list(){

 	$term_id = 'product_cat';
 	$categories =get_terms( $term_id );

 	$cat_array['all'] = "All Categories";

 	if ( !empty( $categories )) {
 		foreach ($categories as $cat) {
 			$cat_info =get_term($cat, $term_id);
 			$cat_array[$cat_info->slug ] = $cat_info->name;
 		}
 	}
 	return $cat_array;

 }
class Silon_LatestProduct_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'silon-leatestProduct';
	}

	
	public function get_title() {
		return __( 'Silon Leatest Product', 'Silon Elementor  Extension' );
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
				'label' => __( 'Content', 'Silon Elementor  Extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'limit',
			[
				'label' =>__('Count', 'plugin-name'),
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => '4',  
			]
		);
		$this->add_control(
					'category',
					[
						'label' => __( 'Select Category', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::SELECT2,
						'multiple' => true,
		                'options' => silon_product_cat_list(),
               			'default' => [ 'all' ],
			]
        );
		$this->add_control(
			'columns', [
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
			'carousel',
			[
				'label' => __( 'Enable Carousel?', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __('Slider Setting','plugin-name'),
				'tab'   =>\Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		

		$this->add_control(
			'arrows' ,
			[
				'label'     => __('Show Arrows ?', 'plugin-domain'),
				'type'      =>\Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default'   => 'yes',
			]
		);
		$this->add_control(
			'dots' ,
			[
				'label'     => __('Show Dots?', 'plugin-domain'),
				'type'      =>\Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default'   => 'yes',
			]
		);

        $this->end_controls_section();
	}

	
	protected function render() {

		$settings = $this->get_settings_for_display();

		if (empty($settings['category']) OR $settings['category'] == 'all') {
			$cats = '';
		}else{
			$cats = implode(',', $settings['category']);
		}

		 if($settings['carousel'] == 'yes') {

                if($settings['arrows'] == 'yes') {
                    $arrows = 'true';
                } else {
                    $arrows = 'false';
                }
                if($settings['dots'] == 'yes') {
                    $dots = 'true';
                } else {
                    $dots = 'false';
                }
               
            $dynamic_id = rand(89898,894698);
            echo '<script>
                jQuery(window).load(function(){
                    jQuery("#product-carousel-'.$dynamic_id.' .products").slick({
                       
                        prevArrow: "<i class=\'fa fa-angle-left\'></i>",
	                    nextArrow: "<i class=\'fa fa-angle-right\'></i>",
	                    dots: '.$dots.',
                        slidesToShow: '.$settings['columns'].' 
                    });
                });
            </script><div id="product-carousel-'.$dynamic_id.'">';
        	}

			echo do_shortcode('[products category="'.$cats.'" limit="'.$settings['limit'].'" columns="'.$settings['columns'].'"]');

	        if($settings['carousel'] == 'yes') {
	         echo '</div>'; 
	     	}

		}
}

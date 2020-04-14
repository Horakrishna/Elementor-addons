<?php

class Silon_ContentBlock_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'silon-contentblock';
	}

	
	public function get_title() {
		return __( 'Silon Content Block', 'Silon Elementor  Extension' );
	}

	public function get_icon() {
		return 'fa fa-wordpress';
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
			'theme',
			[
				'label' =>__('Box theme', 'plugin-name'),
				'type'  => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
                'options' => [
                    '1'  => __('Theme 1', 'plugin-domain' ),
                    '2' => __('Theme 2', 'plugin-domain' ),
                ],
			]
		);

		$this->add_control(
			'block_title', [
				'label' => __( 'Block Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Girl Lookbook 2019'
				
			]
		);

		$this->add_control(
			'block_content', [
				'label'  => __( ' Block Content', 'plugin-domain' ),
				'type'   => \Elementor\Controls_Manager::WYSIWYG,
				'default'=> 'Default Content',
			]
		);


		$this->add_control(
			   'block_image', [
				'label' => __( 'Block Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			   'icon', [
				'label' => __( 'Block Icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default'=> 'fa fa-dauble-right',
			]
		);

		$this->add_control(
			   'link', [
				'label' => __( 'Block Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				
			]
		);

		

		$this->end_controls_section();
	}

	
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ($settings['link'] ['is_external'] == true) {
		 $target= '_blank';
        } else {
            $target= '_self';
        }

		

		echo '<div class="content-box content-box-theme-'.$settings['theme'].'">
			<div class="content-box-bg" style="background-image:url('.wp_get_attachment_image_url($settings['block_image']['id'],'large').')">
			</div>
			<div class="content-box-content">
				'.wpautop($settings['block_content'] ).'
				<h5>'.$settings['block_title'].'</h5>
				<a href="'.$settings['link']['url'].'" target="'.$target.'"><i class="'.$settings['icon'].'"></i></a>
			</div>
	
		</div>';
	
	}
}
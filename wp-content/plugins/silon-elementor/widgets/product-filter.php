<?php

    function silon_feature_product_catg_list() {
        $elements = get_terms( 'product_cat', array('hide_empty' => false) );
        $product_cat_array = array();

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_cat');
                $product_cat_array[ $info->term_id ] = $info->name;
            }
        }
    
        return $product_cat_array;
    }



class Silon_Feature_Product_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'silon-feature-product';
        }
        
        public function get_title() {
            return __( 'Silon Feature Producr ', 'Silon Elementor Extension' );
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
                    'label' 	=> __( 'Configuration', 'plugin-name' ),
                    'tab' 		=> \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

             $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => 'Featured',
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label'    => __( 'Categories', 'plugin-domain' ),
                    'type'     => \Elementor\Controls_Manager::SELECT2,
                    'label_block'=>true,
                    'multiple' => true,
                    'options'  =>silon_feature_product_catg_list(),
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' 	=> __( 'Product Count', 'plugin-domain' ),
                    'type' 		=> \Elementor\Controls_Manager::TEXT,
                    'default'   => '9',
                ]
            );

           
            $this->end_controls_section();

        }

    protected function render() {

         $settings = $this->get_settings_for_display();
        

        $html = '
            <script>
                jQuery(document).ready( function($){
                    $(".featured-category-wrapper ul li button").on("click", function(){
                        $(".featured-category-wrapper ul li button").removeClass("active");
                        $(this).addClass("active");
                     var cat_id  =$(this).attr("data-id");
                     var nonce   =$(this).attr("data-nonce");
                     $.ajax({
                            url: "'.admin_url('admin-ajax.php').'",
                            type:"POST",
                            data:{
                                action     : "my_ajax_action",
                                cat_id     : cat_id,
                                nonce_get  : nonce
                            },

                            beforeSend: function() {
                                $(".feature-cate-products").empty();
                                $(".feature-cate-products").append(\'<div class="loading-bar"><i class="fa fa-spin fa-cog"></i> Loading</div>\');
                            },
                            success: function(html) {
                               $(".feature-cate-products").empty();
                               $(".feature-cate-products").append(html);
                            }
                        });
                    })
                });
            </script>
            <div class="featured-category-wrapper"><h3>'.$settings['title'].'</h3>';
               
                 if (!empty($settings['cat_ids']) ) {

                    $html .='<ul>';
                     $i =0;
                        foreach($settings['cat_ids'] as $cat ) {

                            if ($i== 1) {
                                $ac_class ='active';
                            }else{
                                $ac_class= '';
                            }
                           $cat_info = get_term($cat,'product_cat');
                           $thumb_id = get_woocommerce_term_meta( $settings['cat_ids'][0], 'thumbnail_id', true );
                           $term_img = wp_get_attachment_image_url( $thumb_id ,'large');
                           $html     .='<li><button class="'.$ac_class.'" data-nonce="'.wp_create_nonce('my_ajax_action').'" data-id="'.$cat_info->term_id.'">'.$cat_info->name.'</button></li>';
                        }
                    $html .='</ul>'; 

                $html .='<div class="feature-cate-products">';
                       $q = new WP_Query( array(
                        'posts_per_page' => $settings['count'], 
                        'post_type' => 'product',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'term_id',
                                'terms'    => $settings['cat_ids'][0],
                            )
                        ),
                    ));
                $html .= '<div class="row">';
                    if (!empty($thumb_id)) {
                        $html .='<div class="col-lg-6">
                                    <div class="feature-product-thumb" style="background-image:url('.$term_img.')" >
                                    </div> 

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
                $html .= '</div>';      
           

              if (empty($settings['cat_ids'])) {
                    $html ='<div class="alert alert-warning"><p>Please Select Product Category</p></div>';
              }
        echo $html;
        }
    }
}

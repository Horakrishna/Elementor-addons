<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php 

        $enable_header_top = cs_get_option('enable_header_top');
        $header_link       = cs_get_option('header_links');

        ?>
        <?php wp_head();?>
    </head>

<body <?php body_class();?>>

    <?php if($enable_header_top == true): ?>
    <div class="header-area">
    	<div class="header-top-area">
    		<div class="container">
    			<div class="row">
    				<div class="col">
                        <?php if(!empty($header_link) ) : foreach($header_link as $links ) : ?>

    					<?php if(!empty($links['link']) ):?>
                            <a href="<?php echo $links['link'];?>">
    					<?php endif;?>
                        <?php echo $links['linktext'];?>

                        <?php if(!empty($links['link']) ):?>
                            </a>
                        <?php endif;?>   
                        <?php  endforeach;  endif;?>
    				</div>
    				<div class="col">
    					<div class="header-menu">
                            <?php
                                wp_nav_menu([
                                    'theme_location' => 'top-menu',
                                ]);
                                ?>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
<?php endif;?>
    <div class="container">
    	<div class="row">
    		<div class="col col-auto my-auto">
    			<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/logo.png" alt=""></a>
    		</div>
    		<div class="col my-auto">
    			<div class="main-menu text-center">
    				<?php
                        wp_nav_menu([
                            'theme_location' => 'main_menu',
                            'menu_id' => 'nav',
                        ]);
                    ?>
    			</div>

    		</div>
    		<div class="col my-auto col-auto">
    			<div class="header-area-search">
    				<span class="search-bar"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/search.png" alt=""></span>
    			<?php if (class_exists('WooCommerce')): ?>
    				<a href="" class="silon-cart"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/addtocart.png" alt=""></a>
    				<a href="" class="silon-wishlist"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/wishlist.png" alt=""></a>
    			<?php endif?>
    			</div>

    		</div>
    	</div>
    </div>

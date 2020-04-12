    <?php
        $social_links = cs_get_option('social_links');
    ?>

    <div class="footer-area">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8">
    				<div class="row">
    					<?php dynamic_sidebar('footer');?>
    				</div>
    			</div>
    			<div class="col-lg-4">
    				<div class="single-footer-wid">
    					<h3>experience app on mobile</h3>
    					<a href="" class="app-dl-btn">
    						<i class="fa fa-android"></i>
    						<span class="app-dl-text">Get it On</span>
    						<h5>Google Play</h5>
    					</a>
    					<a href="" class="app-dl-btn">
    						<i class="fa fa-apple"></i>
    						<span class="app-dl-text">Get it On</span>
    						<h5>App Store</h5>
    					</a>
    				</div>
    				<div class="single-footer-wid2">
    					<h3>Fellow Us</h3>
                        <div>
                            <span class="social-link">
                                <?php if(!empty($social_links)): foreach($social_links as $link):?>
                                <a href="<?php echo $link['link']?>"><i class="<?php echo $link['social_icon'];?>"></i></a>
                              <?php endforeach; endif;?>
                            </span>
                        </div>
    					
    				</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col my-auto text-center mt-2">
    				<div class="copy-text">Copyright © 2019 <a href="#">themeies.com.</a> All rights reserved.</div>
    			</div>
    		</div>
    	</div>
    </div>    
        

        <?php wp_footer(); ?>
    </body>
</html>
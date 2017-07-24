<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package aakanksha
 */
?>

	</div><!-- #content -->
	<div class="clearfix"></div>
    <a class="go-top"><i class="fa fa-angle-up"></i></a>
	<?php if(is_front_page()){ ?>
	<footer id="contact" class="site-footer template-wrap" role="contentinfo">
		<?php 
			$color		= get_theme_mod('footer_blog_color'); 
			$img		= get_theme_mod('footer_blog_img', false, 'url');
			$repeat		= get_theme_mod('footer_blog_repeat');
			$parallax	= get_theme_mod('footer_blog_parallax');
			$cover		= get_theme_mod('footer_blog_cover'); 
			
			$bg_repeat  = '';
			if( $repeat == 1 || $repeat == true){
				$bg_repeat = 'background-repeat:no-repeat;';
			}else $bg_repeat = 'background-repeat:repeat;';
			
			$bg_cover = '';
			if( $cover == 1 || $cover == true){
				$bg_cover = 'background-size:cover;';
			}else $bg_cover = '';
			
			$bg_img = '';
			if( $img ){
				$bg_img = 'background-image:url('.$img.');';
			}else $bg_img = '';
			
			$img		= ( ! empty ( $img ) ) 		? ''.$bg_img.'' : '';
			$color		= ( ! empty ( $color ) )  	? 'background-color:'. $color .';' : '';
			$repeat		= ( ! empty ( $repeat ) ) 	? ''. $bg_repeat .'' : '';
			$cover		= ( ! empty ( $cover ) ) 	? ''. $bg_cover .'' : '';
			$parallax 	= ( ! empty ( $parallax ) ) ? 'background-attachment: fixed;': '';
			
			
			/** Style Container */
			$style = ( 
				! empty( $img ) ||
				! empty( $color ) || 
				! empty( $repeat ) ||
				! empty( $cover ) ||
				! empty( $parallax ) ) ? 
					sprintf( '%s %s %s %s %s', $img, $color, $repeat, $cover, $parallax ) : '';
			$css = '';
			if ( ! empty( $style ) ) {			
				$css = 'style="'. $style .'" ';
			}
        ?>
        <div class="footer-img" <?php echo $css ?>></div>
    	<div class="container">
            <div class="row">
				<?php 
                    $color_title		= get_theme_mod('footer_blog_title_color'); 
                    $color_sub_title	= get_theme_mod('footer_blog_subtitle_color');
                        
                    $color_title		= ( ! empty ( $color_title ) ) 		? 'color:'. $color_title .' !important;' : '';
                    $color_sub_title	= ( ! empty ( $color_sub_title ) )  ? 'color:'. $color_sub_title .' !important;' : '';
                    
                    /** Style Container */
                    $title_color = ( 
                        ! empty( $color_title ) ) ? 
                            sprintf( '%s', $color_title) : '';
                    $css_title_color = '';
                    if ( ! empty( $title_color ) ) {			
                        $css_title_color = 'style="'. $title_color .'" ';
                    }
                    
                    $sub_title_color = ( 
                        ! empty( $color_sub_title ) ) ? 
                            sprintf( '%s', $color_sub_title) : '';
                    $css_sub_title_color = '';
                    if ( ! empty( $sub_title_color ) ) {			
                        $css_sub_title_color = 'style="'. $sub_title_color .'" ';
                    }
                ?>
                <div class="col-md-12">
                    <div class="heading-title-wrapper" style="color">
                        <h2 class="title" <?php echo $css_title_color ?>><?php echo get_theme_mod('footer_blog_title') ?></h2>
                        <!--<span class="line-title" style="background-color:#fff"></span>-->
                        <span class="sub-title" <?php echo $css_sub_title_color ?>><?php echo get_theme_mod('footer_blog_subtitle') ?></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="list-contact-wrapper">
					<?php if(get_theme_mod('address_footer') != '') {?>
                    <div class="col-md-4">
                        <div class="contact-wrapper">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <p><?php echo nl2br(get_theme_mod('address_footer')); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(get_theme_mod('phone_footer') != '') {?>
                    <div class="col-md-4">
                        <div class="contact-wrapper">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <p><?php echo nl2br(get_theme_mod('phone_footer')); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(get_theme_mod('email_footer') != '') {?>
                    <div class="col-md-4">
                        <div class="contact-wrapper">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <p><?php echo nl2br(get_theme_mod('email_footer')); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
                <?php if(get_theme_mod('contact_form') != '') {?>
                <div class="contact-form-wrapper">
                	<h2 class="contact-title"><?php echo __('Get In Touch', 'aakanksha')?></h2>
                	<?php echo do_shortcode( get_theme_mod('contact_form') ); ?>
                </div>
                <?php } ?>
            </div>
        </div>
		<div class="site-info">
			<ul class="social-footer">
				<?php if(get_theme_mod('facebook') != '') {?>
				<li><a href="<?php echo get_theme_mod('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if(get_theme_mod('twitter') != '') {?>
				<li><a href="<?php echo get_theme_mod('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if(get_theme_mod('dribbble') != '') {?>
				<li><a href="<?php echo get_theme_mod('dribbble'); ?>"><i class="fa fa-dribbble"></i></a></li>
				<?php } ?>
                <?php if(get_theme_mod('google_plus') != '') {?>
				<li><a href="<?php echo get_theme_mod('google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>
                <?php if(get_theme_mod('pinterest') != '') {?>
				<li><a href="<?php echo get_theme_mod('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>
                <?php if(get_theme_mod('flickr') != '') {?>
				<li><a href="<?php echo get_theme_mod('flickr'); ?>"><i class="fa fa-flickr"></i></a></li>
				<?php } ?>
                <?php if(get_theme_mod('linkedin') != '') {?>
				<li><a href="<?php echo get_theme_mod('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>
			</ul>
			<div class="copyright">
				<?php echo nl2br(get_theme_mod('copyright')); ?>
				<br>
				Also check out: <a href="http://www.thetechpower.com/themes/" target="_blank">thetechpower.com</a>. Developed and designed by <a href="http://www.thetechpower.com"  target="_blank">Aakanksha Singh</a>.
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php } ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

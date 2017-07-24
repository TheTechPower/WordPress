<?php
/*-----------------------------------------------------------------------------------*/
/* Get next or previous post by id
/*-----------------------------------------------------------------------------------*/	
function get_next_previous_port_id( $post_id, $next_or_prev ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $previous_post = $next_or_prev == "prev" ? get_previous_post() : get_next_post();

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $previous_post ){
    	$port = get_posts(array(
    		'post_type' => 'portfolio',
    		'order'		=> $next_or_prev == "prev" ? 'DESC' : 'ASC',
    		'posts_per_page' => 1,
    		));
    	return $port[0]->ID;
    }

    return $previous_post->ID;
}
/*-----------------------------------------------------------------------------------*/
/* Check post is like or not
/*-----------------------------------------------------------------------------------*/	
function is_like_post($id){
	if(isset($_COOKIE['at_like_'.$id]) && $_COOKIE['at_like_'.$id] == 1)
		return 'active';
}
/*-----------------------------------------------------------------------------------*/
/* AS Main Slider
/*-----------------------------------------------------------------------------------*/ 
function as_main_slider($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'slider',
            'posts_per_page' => $numbers
        ));
    $imgArray = array();
    if($query->have_posts()){
        echo '<div id="header_slider" class="owl-carousel owl-theme">';
        while ($query->have_posts()) {
            $query->the_post();
            $slide_color = get_post_meta( $post->ID, 'as_slider_bg', true );
    ?>
        <div class="item slider-info" style="background-color:<?php echo $slide_color; ?>;">
            <div class="text-slider">
                <?php 
					the_content(); 
					echo '<a href="#" id="scroll_to"><span class="scroll-down"><span class="img-scroll-down"></span></span>'.__('see what we can do for you.','aakanksha') .'</a>';
				?>
            </div>
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
        
    <?php
        }
        echo '</div>';
    }
    wp_reset_query();
    
}
/*-----------------------------------------------------------------------------------*/
/* Get Taxonomy Icon
/*-----------------------------------------------------------------------------------*/ 
function as_get_tax_icon($tax_id){
    $term_meta = get_option( "taxonomy_{$tax_id}" );
    return '<i class="fa '.$term_meta['icon'].'"></i>';
}

function as_comment_template($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
?>
    <li class="as-comment" id="comment-<?php echo $comment->comment_ID ?>">
        <div class="as-comment-left">
            <div class="as-comment-thumbnail">
                <?php echo get_avatar($comment->user_id); ?>
            </div>
        </div>
        <div class="as-comment-right">
            <div class="as-comment-header">
                <a href="<?php comment_author_url() ?>"><strong class="as-comment-author"><?php comment_author() ?></strong></a>
                <span class="as-comment-time icon" data-icon="t"><?php comment_date() ?></span>
            </div>
            <div class="as-comment-content">
                <?php comment_text() ?>
                <p class="as-comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
<?php   
}
?>
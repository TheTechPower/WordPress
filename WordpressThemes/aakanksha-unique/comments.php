<?php 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>


<div id="comments" class="as-comments-area">
	<h2 class="as-comments-title">
		<?php comments_number( __('Be the first to post a comment.','aakanksha'), __('1 Comment on this article','aakanksha') , __('% Comments on this article','aakanksha') ); ?>
	</h2>
	<ul class="as-comment-list">
		<?php 
			wp_list_comments(array(
				'type' 			=> 'comment',
				'callback' 		=> 'as_comment_template',
				'avatar_size' 	=> 40,
				'reply_text'	=> __('<i class="fa fa-share-square-o"></i> ','aakanksha').'<span class="icon" data-icon="R"></span>', 
			)) 
		?>
		<div class="comments-navigation">
		<?php 
			paginate_comments_links();
		?> 
		</div>
	</ul>
</div>


<div id="at_respond">
	<?php comment_form(array(
		'title_reply' 			=> __('Leave a Comment', 'aakanksha'),
		'comment_notes_before' 	=> '<p class="before-text">'.__('Please be polite. We appreciate that.<br>Your email address will not be published and required fields are marked.', 'aakanksha').'</p>',
		'comment_notes_after' 	=> '',
		'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.__('Your content', 'aakanksha').' *">' .
    '</textarea></p>',
	)); ?>
</div>
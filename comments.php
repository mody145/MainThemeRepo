<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NewTheme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>


<div class="comments-container">

	<ul id="comments-list" class="comments-list">
<?php 

foreach ($comments as $comment) { ?>

<?php if ($comment->comment_parent == 0) {  ?>
	<li>
		<div class="comment-main-level">
			<!-- Avatar -->
			<div class="comment-avatar"><?php echo get_avatar( $comment->comment_author_email, 80, 'http://placehold.it/80x80/ddd' ); ?></div>
			<!-- Comment Box -->
			<div class="comment-box">
				<div class="comment-head">
					<h6 class="comment-name by-author"><a href="http://creaticode.com/blog"><?php echo $comment->comment_author ?></a></h6>
					<span><?php $date = $comment->comment_date; echo $new_date = date('y-M-D H:i', strtotime($date)); ?></span>
					<a rel="nofollow" href="?replytocom=<?php echo $comment->comment_ID ?>#respond""><i class="fa fa-reply"></i></a>
				</div>
				<div class="comment-content">
					<?php echo $comment->comment_content; comment_reply_link('', $comment->comment_ID, $post->ID); ?>
				</div>
			</div>
		</div>

		<?php 
		$idParent = $comment->comment_ID;
		$childrens = get_comments( array(
			'parent' => $idParent
		) ); 

		if ( ! empty( $childrens ) ) { ?>

		<ul class="comments-list reply-list">

		<?php foreach ($childrens as $children) { ?>

			<li>
				<!-- Avatar -->
				<div class="comment-avatar"><?php echo get_avatar( $children->comment_author_email, 80, 'http://placehold.it/80x80/ddd' ); ?></div>
				<!-- Comment Box -->
				<div class="comment-box">
					<div class="comment-head">
						<h6 class="comment-name"><a href="http://creaticode.com/blog"><?php echo $children->comment_author ?></a></h6>
						<span><?php $date = $children->comment_date; echo $new_date = date('y-M-D H:i', strtotime($date)); ?></span>
					</div>
					<div class="comment-content">
						<?php echo $children->comment_content ?>
					</div>
				</div>
			</li>

			<?php } /* End Forech */ ?>

		</ul>

		<?php } /* Endif */ ?>

	</li>

	<?php } /* End If Parent */ ?>

	<?php } /* End Foreach */ ?>

	</ul>
</div>

<div class="comments-form-container">
	<div class="fields-container">

		

		<?php

		$args = array(
			'comment_field' 		=> '<div class="container-textarea"><div class="avatar-comment hidden-xs"><img src="http://placehold.it/80x80/ddd"></div><textarea name="comment" class="form-control" rows="5"></textarea></div>',
			'submit_button' 		=> '<div class="submit-button"><input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary" value="Send Comment" /></div>',
			'title_reply'   		=> '',
			'comment_notes_before' 	=> '',
			'logged_in_as' 			=> '',
			'fields' 		=> array(
				'author' 	=> '<div class="input-group">
									<span class="input-group-addon" id="sizing-addon1"><i class="icon-chevron-right2"></i></span>
									<input  id="author" type="text" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Type Your First Name" autocomplete="off" />
								</div>',
				'email' 	=> '<div class="input-group">
									<span class="input-group-addon" id="sizing-addon1"><i class="icon-chevron-right2"></i></span>
									<input id="email" type="text" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Type Your First Name" autocomplete="off" />
								</div>',
 				)
			);

		 comment_form( $args ); 


		?>
		
	</div>
</div>









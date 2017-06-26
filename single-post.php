<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="content-post">
		<?php // Start Loop
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>
			<img src="<?php echo get_the_post_thumbnail_url() ?>" width="100%" />
			<div class="post-meta-container">

				<!--=============================================
				=             Button Like And Unlike            =
				==============================================-->

				<?php if (in_array(get_the_id(), $_SESSION['likes'])) { ?>

				<div class="like-container">
					<button class="btn btn-info" type="button">
						<a id="unlike" data-id="<?php echo get_the_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-check"></i>
						</a>
						<span class="badge likes-count"><?php echo get_post_meta( get_the_id(), 'likes', true ); ?></span>
					</button>
				</div>

				<?php } else { ?>

				<div class="like-container">
					<button class="btn btn-info" type="button">
						<a id="like" data-id="<?php echo get_the_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-thumbs-up"></i>
						</a>
						<span class="badge likes-count"><?php echo get_post_meta( get_the_id(), 'likes', true ); ?></span>
					</button>
				</div>

				<?php } ?>

				<!--====  End of  Button Like And Unlike  ====-->

				<!--============================================
				=            Section Count Of Views            =
				=============================================-->

				<?php increament_post_views( get_the_id() ) ?>
				
				<!--====  End of Section Count Of Views  ====-->

				<h1><?php echo the_title(); ?></h1>
				<p class="info_post">
					<i class="icon-user2"> </i><?php echo get_the_author(); ?>
					<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> <i class="icon-bubble"> </i> <?php echo  get_comments_number(); ?>  <i class="icon-eye"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> <i class="icon-clock-o"> </i> <?php echo get_the_date(); ?>
				</p>
				<p class="container-content">
					<?php echo get_the_content(); ?>
				</p>

				<p class="tags_container"><?php the_tags(); ?></p>
			</div>
			
		<?php }} ?>
	</div>

	<div class="subscribe-container">
		<?php echo do_shortcode( '[email-subscribers namefield="YES" desc="" group="Public"]' ); ?>
	</div>

	<?php 
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	 ?>
	 
</div>

<div class="col-md-3 nopadding hidden-xs">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="content-post">
		<?php // Start Loop
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>
			<img src="<?php echo get_the_post_thumbnail_url() ?>" width="100%" />
			<div class="post-meta-container wow fadeIn">

				<!--=============================================
				=             Button Like And Unlike            =
				==============================================-->

				<?php if(check_if_is_product_in_session( $_SESSION['likes'], get_the_id() )) { //if (isset($_SESSION['likes'])) { $arrayLikes = $_SESSION['likes']; } else { $arrayLikes = array(); } if (in_array(get_the_id(), $arrayLikes)) { ?>

				<div class="like-container">
						<a id="unlike" data-id="<?php echo get_the_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-check"></i>
						</a>
						<span class="likes-count round-info-span"><?php get_meta_value_if_exists( get_the_id(), 'likes' ); //echo get_post_meta( get_the_id(), 'likes', true ); ?></span>
				</div>

				<?php } else { ?>

				<div class="like-container">
						<a id="like" data-id="<?php echo get_the_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-thumbs-o-up"></i>
						</a>
						<span class="likes-count round-info-span"><?php get_meta_value_if_exists( get_the_id(), 'likes' ); ?></span>
				</div>

				<?php } ?>

				<!--====  End of  Button Like And Unlike  ====-->

				<!--============================================
				=            Section Count Of Views            =
				=============================================-->

				<?php increament_post_views( get_the_id() ) ?>
				
				<!--====  End of Section Count Of Views  ====-->

				<div class="media">
					<div class="media-left">
						<a href="#">
							<span class="date-bost">
							    <span class="munth"><?php echo get_the_date('M'); ?></span>
							    <span class="day"><?php echo get_the_date('d'); ?></span>
							    <span class="year"><?php echo get_the_date('Y'); ?></span>
							</span>
						</a>
					</div>
					<div class="media-body">
						<h1><?php echo the_title(); ?></h1>
						<p class="info_post">
							<i class="icon-user3"> </i><span class="round-info-span"> <?php echo get_the_author(); ?></span>
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"> <?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
						</p>
					</div>
				</div>

				<p class="container-content">
					<?php echo get_the_content(); ?>
				</p>

				<p class=""><span class="tagged_as"><?php the_tags(); ?></span></p>
			</div>
			
		<?php }} ?>
	</div>

	<div class="subscribe-container wow fadeIn">
		<h3 class="text-center" style="font-family: 'Russo One';"><i class="icon-news"></i>&nbsp; NEWSLETTER</h3>
		<p class="text-center">Sign up for our newsletter to get up-to-date from us</p>
		<?php echo do_shortcode( '[email-subscribers namefield="YES" desc="" group="Public"]' ); ?>
	</div>

	<div class="container-comments">
	<?php 
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			
		comments_template();

		endif;
	?>
	</div>

	<!--===========================================
	=            Section Related Posts            =
	============================================-->

	<div class="latest-posts-blog wow fadeIn">	
	<h3 class="related-posts">Related Posts</h3>
	<?php

	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	if( $related ) foreach( $related as $post ) {
	setup_postdata($post); ?>
		
			<div class="col-md-6 col-sm-6">
				<div class="post-image-home">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
				</div>
				<h3 class="post_title"><a href="<?php echo get_permalink(); ?>"><i class="icon-chevron-right2"> </i> <?php echo the_title(); ?></a></h3>
				<p><?php echo $str = substr(get_the_content(), 0, 150) . ' ... <a class="btn btn-info btn-sm" href="' . get_permalink() . '">Read More</a>'; ?></p>
				<p class="info_post">
					<i class="icon-user2"> </i><?php echo get_the_author(); ?>
					<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> <i class="icon-bubble"> </i> <?php echo  get_comments_number(); ?>  <i class="icon-eye"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> <i class="icon-clock-o"> </i> <?php echo get_the_date(); ?>
				</p>
			</div>

	<?php }
	wp_reset_postdata(); ?>
	</div>

	
	<!--====  End of Section Related Posts  ====-->
	
	 
</div>

<div class="col-md-3 nopadding hidden-xs">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>

<?php get_footer(); ?>
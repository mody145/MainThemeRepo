<?php get_header(); ?>
<!--=====================================
=            Sidebar Section            =
======================================-->

	<div class='col-md-3 nopadding pull-right'>
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div>
	<div class="clearfix hidden-md hidden-lg"></div>

<!--====  End of Sidebar Section  ====-->
<!--=======================================
=            Content Page Here            =
========================================-->

<!-- Content Page Here -->
<div class="col-md-9 nopadding clearfix">

	<!-- Section Welcome -->
	<div class="welcome-container hidden-xs">
		<?php dynamic_sidebar( 'welcome_msg' ); ?>
	</div><!-- End Section Welcome -->

	<!-- Section Slider -->
	<div class="mini-slider hidden-xs">
		<div class="skitter skitter-large with-dots">
			<ul>
			<?php 

			/* --||  Start Loop (WP-Query)  ||-- */

			$args = array(
				'post_type' 	=> 'slider',
				'post_per_post' => 10,
				);
			
			$slides = new WP_Query($args);

			if ($slides->have_posts()) {
				while ($slides->have_posts()) {
					$slides->the_post(); ?>
					 
				<li>
					<h4><?php the_title(); ?></h4>
					<a href="#cut">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="" />
					</a>
					<div class="label_text">
						<p>
							<?php the_content(); ?>
							<a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>" class="btn btn-xs btn-warning">See more</a>
						</p>
					</div>
				</li>

				<!--||  End Loop (WP-QUery)  ||-->
				<?php }} ?>
				<?php wp_reset_postdata(); ?>	

			</ul>
		</div>
	</div><!-- End Section Slider -->

	<!-- Section Features -->
	<div class="feat">
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="box-feat">
				<i class="icon-monocle"></i>
				<h3 class="bold text-uppercase">our experience</h3>
				<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				<a href="<?php echo home_url( 'about-us' ); ?>" class="btn btn-info">Read More</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="box-feat-2">
				<i class="icon-bomb"></i>
				<h3 class="bold">OUR SERVICES</h3>
				<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				<a href="<?php echo home_url( 'services' ); ?>" class="btn btn-info">Read More</a>
			</div>
		</div>
	</div><!-- End Section Features -->

	<!-- Section Testimonials -->
	<div class="testimonials hidden-xs">
		<div class="container-testimonials">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<?php  
				$args_testimonials1 = array('post_type' => 'wpm-testimonial'); ?>
				<?php 
				$testimonial1 = new WP_Query($args_testimonials1);
				$number = 0; 
				if ($testimonial1->have_posts()) {
					while ($testimonial1->have_posts()) {
						$testimonial1->the_post(); ?>
						
					<li <?php if ($testimonial1->current_post == 0) { echo 'class="active"'; } ?> data-target="#carousel-example-generic" data-slide-to="<?php echo $number++; ?>"><?php get_the_title(); ?></li>
				
				<?php }} ?>
				<?php wp_reset_postdata(); ?>	
				</ol>
				<div class="carousel-inner" role="listbox">
				<?php 

				/* --||  Start Loop (WP-Query)  ||-- */

				$args_testimonials = array(
					'post_type' 				=> 'wpm-testimonial',
					'post_per_post' 			=> 10,
					);
				
				$testimonial = new WP_Query($args_testimonials);

				if ($testimonial->have_posts()) {
					while ($testimonial->have_posts()) {
						$testimonial->the_post(); ?>

				<!-- Wrapper for slides -->

					<div class="item <?php if ($testimonial->current_post == 0) { echo 'active'; } ?>">
						<div class="image-testimonials">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>

						<div class="carousel-caption">
						<h4><i class="icon-fountain-pen-head-2"></i> <?php the_title(); ?></h4>
						<p><?php the_content(); ?></p>
						<span><?php echo get_post_meta( get_the_ID(), 'company_name', true ); ?></span>
						</div>
					</div>

				<!--||  End Loop (WP-QUery)  ||-->
				<?php }} ?>
				<?php wp_reset_postdata(); ?>				
								
				</div>
			</div>
		</div>
	</div><!-- End Section Testimonials -->

	<!-- Section Services -->
	<div class="services">
		<div class="col-md-6"></div>
		<div class="col-md-6"></div>
		<div class="col-md-6"></div>
		<div class="col-md-6"></div>
	</div><!-- Section Services -->

	<!-- Start Section Latest Posts -->
	<div class="latest-posts-blog">

    	<?php global $query_string;
        query_posts ('posts_per_page=6');
        if (have_posts()) { while (have_posts()) { the_post(); ?>
        
		<div class="col-md-6 col-sm-6">
			<div class="post-image-home">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>">
			</div>
			<h3 class="bold post_title"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h3>
			<p><?php echo $str = substr(get_the_content(), 0, 150) . ' ... <a href="' . get_permalink() . '">Read More</a>'; ?></p>
			<p class="info_post">
				<span><?php echo '<spna class="bold"><i class="icon-user2"> </i> BY : </span>' . get_the_author(); ?></span>
				<span><?php echo '<spna class="bold"> <i class="icon-clock2"> </i> IN : </span>' .  get_the_date(); ?></span>
			</p>
		</div>

		<?php }} ?>
	</div><!-- End Section Latest Posts -->

</div><!--End Content Page Here -->

<!--====  End of Content Page Here  ====-->



<?php get_footer(); ?>
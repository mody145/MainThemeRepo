<?php get_header(); ?>

<div class="col-md-12 nopadding">

	<!-- Start Container -->
	<div class="page-about-us-container">

		<!-- Start Image -->
		<div class="col-md-6 nopadding">
			<div class="image-about-us">
				<img src="<?php echo get_option( 'about_image' ); ?>" />
			</div>

		</div><!-- End Image -->

		<!-- Start Title And Description -->
		<div class="col-md-6 nopadding">
			<div class="text-about-us">
				<h3 class="bold text-uppercase"><i class="icon-microphone2"> </i> <?php echo get_option( 'about_title' ); ?></h3>
				<p><?php echo get_option( 'about_description' ); ?></p>
			</div>
		</div><!-- End Title And Description -->

	</div><!-- End Container -->

	<!-- Start Container Our Team -->
	<div class="container nopadding">
		<div class="our-team-container">
			<h3 class="text-center bold"OUR TEAM</h3>
			<div class="team-box">

			<?php 
			$args = array( 'post_type' => 'member' );
			$member = new WP_Query( $args );

			// Loop All Members Team
			if($member->have_posts()) {
				while($member->have_posts()) {
					$member->the_post(); ?>

				<!-- Start Loop Member -->
				<div class="person">
					<div class="layout"></div>
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
					<div class="info-member">
						<h4 class="text-center"><?php echo get_the_title(); ?></h4>
						<span class="jop"><?php echo get_post_meta( get_the_ID(), 'jop', true ); ?></span>
						<span class="social-media-team">
							<a href="<?php echo get_post_meta( get_the_ID(), 'face', true ); ?>"><i style="color: rgb(59, 89, 152);" class="icon-facebook-square"></i></a>
							<a href="<?php echo get_post_meta( get_the_ID(), 'twitter', true ); ?>"><i style="color: rgb(85, 172, 238)" class="icon-twitter-square"></i></a>
							<a href="<?php echo get_post_meta( get_the_ID(), 'google', true ); ?>"><i style="color: rgb(225, 48, 108)" class="icon-google-plus-square"></i></a>
						</span>
					</div>
					<div class="overlay"></div>
				</div><!-- End Loop Member -->

			<?php }} ?>

			</div>
		</div><!-- End Container Our Team -->

		<!-- Start Our Experiance -->
		<div class="our-experiance-container">
			<h3 class="bold text-uppercase"><?php echo get_option( 'our_expeiance_title' ); ?></h3>
			<p><?php echo get_option( 'our_expeiance_description' ); ?></p>
		</div><!-- Start Our Experiance -->

	</div>
</div>

<?php get_footer(); ?>
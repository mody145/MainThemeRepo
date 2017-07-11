<?php get_header(); ?>

<div class="col-md-12 nopadding">
<!-- Start Container Here -->
	<div class="container-services wow fadeIn">

	<!--  Check If This Section Disable Or Not -->
	<?php $show_pricing = get_option( 'show_pricing' ); ?>
	<?php if ($show_pricing == 1) { ?>

		<h3 class="text-center bold"><i class="icon-bomb"> </i> PRICING</h3>
		<!-- Start Pricing Plan Here -->
		<div class="service-boxes">
		<?php 
		$args = array( 'post_type' => 'service' );
		$service = new WP_Query( $args );

		if($service->have_posts()) {
			while($service->have_posts()) {
				$service->the_post(); ?>

			<!--  ||  Start Loop Plans  || -->
			<div class="plan">
				<p class="title"><?php echo get_the_title(); ?></p>
				<p class="price"><sub>$</sub><?php echo get_post_meta( get_the_ID(), 'price', true ); ?> <sub>Per Mounth</sub></p>
				<p class="feat-one"><?php echo get_post_meta( get_the_ID(), 'feat-one', true ); ?></p>
				<p class="feat-two"><?php echo get_post_meta( get_the_ID(), 'feat-two', true ); ?></p>
				<p class="feat-three"><?php echo get_post_meta( get_the_ID(), 'feat-three', true ); ?></p>
				<button class="btn btn-info">Order Now</button>
			</div>

		<?php }} ?>
		</div><!-- End Pricing Plan Here -->

		<?php } ?>

		<?php

		// Check If This Section Disable Or Not
		$showStaus = get_option( 'show_other_services' );
		 if ($showStaus == 1) {
		 ?>

		 <!-- Start Other Services Here -->
		<div class="other-services wow fadeIn">
			<h3 class="bold text-uppercase">Other Services</h3>
			<div class="col-md-3">
				<i class="icon-headphone"></i>
				<h4 class="bold">QUICK SUPPORT</h4>
				<p>We do our best to provide the most reliable support to all our users.</p>
			</div>
			<div class="col-md-3">
				<i class="icon-paint-palette"></i>
				<h4 class="bold">CUSTOMIZABLE</h4>
				<p>You can easily read, edit, and write your own code, or change everything.</p>
			</div>
			<div class="col-md-3">
				<i class="icon-iphone"></i>
				<h4 class="bold">RESPONSIVE</h4>
				<p>Your template works on any device: desktop, tablet or mobile.</p>
			</div>
			<div class="col-md-3">
				<i class="icon-wrenches"></i>
				<h4 class="bold">DOCUMENTED</h4>
				<p>you can see, we provided a comprehensive online documentation for this template.</p>
			</div>
		</div><!-- End Other Services Here -->

		<?php } ?>

	</div><!-- End Container Here -->								
	<!-- Contianer About Our Services -->
	<div class="container-about-our-services wow fadeIn">
		<h3 class="text-center bold text-uppercase"><?php echo get_option( 'service_title' ); ?></h3>
		<p class="text-blow"><?php echo get_option( 'service_description' ); ?></p>		
	</div><!-- Contianer About Our Services -->

</div>

<?php get_footer(); ?>
<?php   

add_action('wp_ajax_nopriv_dont_reload_again', 'dont_reload_again'); 
add_action('wp_ajax_dont_reload_again', 'dont_reload_again');
function dont_reload_again() {

	?>

	<?php if ( isset( $_POST['dont_reload'] ) ) { ?>
		<div class="small-header parent_hide_show">
			<div class="container-img-header">
				<div class="overlay"></div>

				<?php 
				$headerImagesString = esc_attr( get_option( 'headerImages' ) );
				$arrayImagesHeader = explode(',', $headerImagesString);
				$random_image = array_rand($arrayImagesHeader);

				?>
				<img src="<?php echo $arrayImagesHeader[$random_image]; ?>" class="">
			</div>
			<i class="icon-show-two toggel-opacity hide_item reload_again" style="font-size: 21px !important;" data-toggle="tooltip" data-placement="top" title="Reload Slider"></i>
			<?php dynamic_sidebar( 'advertise_here' ); ?>
		</div>
			<?php setcookie( 'what_header', 'small', (time() + (86400 * 30)) * 30, "/"); ?>
	<?php } elseif ( isset( $_POST['reload'] ) ) { ?>
		<header class="site-header">
			<i class="icon-close-one toggel-opacity hide_item rotate--90 dont_reload_again" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>

	        <div class="skitter-large-box">
	            <div class="skitter skitter-large-for-header with-thumbs">
	                <ul>
						<?php 

						/* --||  Start Loop (WP-Query)  ||-- */

						$args = array(
							'post_type' 	=> 'slider',
							'post_per_post' => 10,
						    'tax_query' => array(
						        array(
						            'taxonomy' => 'wich_slider',
						            'field'    => 'slug',
						            'terms'    => 'header-slider',
						        ),
						    ),
						);
						
						$slides = new WP_Query($args);

						if ($slides->have_posts()) {
							while ($slides->have_posts()) {
								$slides->the_post(); ?>

	                    <li>
	                        <a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">
	                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="cubeHide" />
	                        </a>
	                        <div class="label_text">
	                            <h3 class="test-title"><?php the_title(); ?></h3>
	                            <?php the_content(); ?>
	                            <span class="cat-pubble"><a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">Read more</a></span>
	                        </div>
	                    </li>

						<!--||  End Loop (WP-QUery)  ||-->
						<?php }} ?>
						<?php wp_reset_postdata(); ?>	

	                </ul>
	            </div>
	        </div>

		</header>

		<?php setcookie( 'what_header', 'slider', (time() + (86400 * 30)) * 30, "/"); ?>

		<script type="text/javascript">
		    $('body').find('.skitter-large-for-header').skitter({
		        navigation: true,
		        dots: false,
		        with_animations: [ 'cube', 'cubeRandom', 'block', 'cubeStop', 'cubeStopRandom', 'cubeHide', 'cubeSize', 'horizontal', 'showBars', 'showBarsRandom', 'tube', 'fade', 'fadeFour', 'paralell', 'blind', 'blindHeight', 'blindWidth', 'directionTop', 'directionBottom', 'directionRight', 'directionLeft', 'cubeSpread', 'glassCube', 'glassBlock', 'circles', 'circlesInside', 'circlesRotate', 'cubeShow', 'upBars', 'downBars', 'hideBars', 'swapBars', 'swapBarsBack', 'swapBlocks', 'cut' ],
		        label_animation: 'fixed',
		    });
		</script>
	<?php } elseif ( isset( $_POST['hide_small_slider'] ) ) { ?>

	<i class="icon-show-two toggel-opacity hide_item show_mini_slider reload_again_small_slider" data-toggle="tooltip" data-placement="top" title="Reload Slider"></i>
	<?php setcookie( 'what_small_slider', 'hide', (time() + (86400 * 30)) * 30, "/"); ?>

	<?php } elseif ( isset( $_POST['show_small_slider'] ) ) { ?>

	<i class="icon-close-one toggel-opacity hide_mini_slider hide_item rotate--90" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>
		<div class="skitter skitter-large with-dots">
			<ul>
			<?php 

			/* --||  Start Loop (WP-Query)  ||-- */

			$args = array(
				'post_type' 	=> 'slider',
				'post_per_post' => 10,
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'wich_slider',
			            'field'    => 'slug',
			            'terms'    => 'small-slider',
			        ),
			    ),
			);
			
			$slides = new WP_Query($args);

			if ($slides->have_posts()) {
				while ($slides->have_posts()) {
					$slides->the_post(); ?>
					 
				<li>
					<a href="#cut">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="" />
					</a>
					<div class="label_text">
						<p>
							<h4><?php the_title(); ?></h4>
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

		<?php setcookie( 'what_small_slider', 'show', (time() + (86400 * 30)) * 30, "/"); ?>

		<script type="text/javascript">
		// Run Skitter Slider
			$('.skitter-large').skitter({

				'dots'				: false,
				'numbers'			: true,
				'label' 			: false,
				'controls'			: true,
				'hide_tools'		: true,
				'with_animations' 	: ["fade"],
				'theme' 			: 'clean',
			});
		</script>

	<?php } ?>

	<?php

	wp_die();
} 

?>
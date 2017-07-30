<?php  

add_action('wp_ajax_nopriv_show_followed_dropdown_box', 'show_followed_dropdown_box'); 
add_action('wp_ajax_show_followed_dropdown_box', 'show_followed_dropdown_box');
function show_followed_dropdown_box() {

	if (empty($_SESSION['follow'])) {
		echo "<span class='text-center'>Your Whitelist Is Empty</span>";
	} else {

		$items_unique = array_unique($_SESSION['follow']); 

			$args = array(
				'post_type' 		=> 'product',
				'post__in' 			=> $items_unique,
				'posts_per_page' 	=> -1
				);
			$Query = new WP_Query( $args );

			if ($Query->have_posts()) {
				while($Query->have_posts()) {
					$Query->the_post(); ?>

		<div class="items">
			<span class="pull-left"><?php echo get_the_title(); ?></span>
			<span class="pull-right"><i class="icon-usd"></i>&nbsp;<?php echo get_post_meta( get_the_id(), '_price', true ); ?></span>
		</div>

		<?php }} ?>

		<div class="buttons">
			<a class="text-center" href="<?php echo home_url( 'wishlist' ); ?>"><button class="btn btn-default btn-sm btn-block">Whitelist Page</button></a>
		</div>

	<?php } 

	wp_die();
} 


?>
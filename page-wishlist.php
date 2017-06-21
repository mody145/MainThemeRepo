<?php session_start() ?>

<?php get_header(); ?>

<div class="col-md-12 nopadding">

	<?php

	if (! empty($_SESSION['follow'])) {

	$items_unique = array_unique($_SESSION['follow']); 
	echo '[ ' . count($items_unique) . ' ] Items';

		$args = array(
			'post_type' 		=> 'product',
			'post__in' 			=> $items_unique,
			'posts_per_page' 	=> -1
			);
		$Query = new WP_Query( $args );

		if ($Query->have_posts()) {
			while($Query->have_posts()) {
				$Query->the_post(); ?>

				<h1><?php the_title(); ?></h1>

		<?php }} ?>

		<div class="empty_white_list"><a href="<?php echo get_template_directory_uri() . '/Ajax/empty_white_list.php' ?>">Empty White List</a></div>

	<?php } else { ?>

	<h1>You List Is Empty</h1>

	<?php } ?>

</div>

<?php get_footer(); ?>
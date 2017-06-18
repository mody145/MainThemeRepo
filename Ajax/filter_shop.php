<?php require_once( dirname( dirname( __FILE__ ) ) . '/../../../wp-load.php' ); ?>

	<!--===========================================
	=            Section Sort By Order            =
	============================================-->
	
	<?php // Sorting By Date
	if (isset($_POST['orderBy']) && $_POST['orderBy'] == 'date') {

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 20,
			'orderby'			=> $orderBy,
			'order' 			=> $order,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>
	
	<!--====  End of Section Sort By Order  ====-->
	
	<!--===========================================
	=            Section Sort By Price            =
	============================================-->
	
	<?php // Sorting By Price
	if (isset($_POST['orderBy']) && $_POST['orderBy'] == '_regular_price') {

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> -1,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>
	
	<!--====  End of Section Sort By Price  ====-->
	
	<!--============================================
	=            Section Sort By Rating            =
	=============================================-->
	
	<?php // Sorting By Rating
	if (isset($_POST['orderBy']) && $_POST['orderBy'] == '_wc_average_rating') {

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> -1,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>	
	
	<!--====  End of Section Sort By Rating  ====-->
	
	<!--============================================
	=            Section Sort By Random           =
	=============================================-->
	
	<?php // Sorting By Random
	if (isset($_POST['orderBy']) && $_POST['orderBy'] == 'rand') {

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> -1,
			'orderby' 			=> $orderBy,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>	
	
	<!--====  End of Section Sort By Random  ====-->
	
	<!--==============================================
	=            Section Sort By Category            =
	===============================================-->
	
	<?php // Sorting By Category
	if (isset($_POST['category'])) {

		$cat = $_POST['category'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> -1,
			'product_cat' 		=> $cat,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>	
	
	<!--====  End of Section Sort By Category  ====-->
	
	<!--================================================
	=            Section Search By Tag Name            =
	=================================================-->
	
		<?php // Search By Tag
	if (isset($_POST['tag'])) {

		$tag = $_POST['tag'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> -1,
			'product_tag' 		=> $tag ,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>
	
	<!--====  End of Section Search By Tag Name  ====-->
	
	<!--====================================================
	=            Section Search By Product Name            =
	=====================================================-->
	
	<?php // Search By Product Name
	if (isset($_POST['name'])) {

		$name = $_POST['name'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> -1,
			'name' 				=> $name ,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>	
	
	<!--====  End of Section Search By Product Name  ====-->
	
	<!--==================================================
	=            Section Search By Price Rane            =
	===================================================-->
	
	<?php // Search By Product Price Range
	if (isset($_POST['price_from']) || isset($_POST['price_to'])) {

		if (isset($_POST['price_from'])) { $price_from = $_POST['price_from']; } else { $price_from = 0; }
		if (isset($_POST['price_to'])) { $price_to = $_POST['price_to']; } else { $price_to = 1000000; }

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> -1,
		    'meta_query' => array(
		        array(
		            'key' => '_price',
		            'value' => array($price_from, $price_to),
		            'compare' => 'BETWEEN',
		            'type' => 'NUMERIC'
		        )
		    )
		);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-filter' ); ?>

		<?php }} ?>

	<?php } ?>	
	
	<!--====  End of Section Search By Price Rane  ====-->
	
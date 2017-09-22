<?php  

add_action('wp_ajax_nopriv_get_random_sale_in_home_page', 'get_random_sale_in_home_page'); 
add_action('wp_ajax_get_random_sale_in_home_page', 'get_random_sale_in_home_page');
function get_random_sale_in_home_page() {

		global $wpdb;
		$sales = $wpdb->get_results( "SELECT * FROM `wp_postmeta` WHERE `meta_key` = '_sale_price_dates_to' AND `meta_value` > 1", ARRAY_A );
		$count_sales = count($sales);
		$avilbale_sales = array();

		for ($i=0; $i < $count_sales; $i++) {
			if ( $sales[$i]['meta_value'] > time() ) {
				$avilbale_sales[] = $sales[$i]['post_id'];
			}
		}

		if ( count( $avilbale_sales ) > 1 ) {
			$idCurrent = $_GET['idCurrentProduct'];
			
			if (($key = array_search($idCurrent, $avilbale_sales)) !== false) {
			    unset($avilbale_sales[$key]);
			}
		}

		$random_sale = array_rand( $avilbale_sales );
		$id_random_sale = $avilbale_sales[$random_sale];

		$_product = wc_get_product( $id_random_sale );

		//pre( $_product );

	?>

		<div class="container_image_closest_sale wow zoomIn" data-saleTo="<?php echo date_format($_product->date_on_sale_to, "Y/m/d") ?>">
			<!-- <span class="gradiant_overlay three"></span> -->
	    	<?php if(has_post_thumbnail( $_product->id )) { echo '<img src="' . get_the_post_thumbnail_url( $_product->id ) . '" />'; } ?>
	    </div>
	    <div class="clock wow fadeIn">
		    <i id="refresh_sale" class="icon-refresh3 round-info-span"></i>
	    	<span class="title_sale">This Item Have Discount<span class="numberCircle"><?php $discount = ( ($_product->regular_price - $_product->sale_price ) * 100) / $_product->regular_price; echo floor($discount) . "%"; ?></span></span>
	    	<div id="clock" data-idProduct="<?php echo $_product->id; ?>"></div>
			<h3>
				<a href="<?php echo get_post_permalink( $_product->id ) ?>"><?php echo $_product->name ?></a>
				<span class="sale_price"><i class="icon-usd"></i>&nbsp;<?php echo $_product->sale_price ?></span>
				<span class="reg_price">&nbsp;/&nbsp;<i class="icon-usd"></i>&nbsp;<?php echo $_product->regular_price ?></span>
			</h3>
			<p><?php echo $_product->description ?></p>
	    </div> 

	    <script type="text/javascript">
	try{

		// Run Countdown In Index Page
		var endDateSale = $('.container_image_closest_sale').attr('data-saleTo');
		$('#clock').countdown(endDateSale, function(event) {
			var $this = $(this).html(event.strftime(''
			+ '<span>%w <sub>weeks</sub></span> '
			+ '<span>%d <sub>days</sub></span> '
			+ '<span>%H <sub>hr</sub></span> '
			+ '<span>%M <sub>min</sub></span> '
			+ '<span>%S <sub>sec</sub></span>'));
		});

	}catch(e){

	console.log(e);
	}
	    </script>
	<?php

	wp_die();
} 

?>
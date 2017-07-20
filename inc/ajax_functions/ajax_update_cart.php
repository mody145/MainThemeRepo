<?php 

add_action('wp_ajax_nopriv_updata_cart_in_header', 'updata_cart_in_header'); 
add_action('wp_ajax_updata_cart_in_header', 'updata_cart_in_header');
function updata_cart_in_header() {

	global $woocommerce;
	$total = WC()->cart->cart_contents_total;
	echo $total;

	
	wp_die();
} 


?>
<?php 

add_action('wp_ajax_nopriv_get_price_by_currency', 'get_price_by_currency'); 
add_action('wp_ajax_get_price_by_currency', 'get_price_by_currency');
function get_price_by_currency() {

	$currency = $_GET['Country_Currency'];
	$the_main_price = $_GET['price'];

	$byCurrency = convertCurrency($the_main_price, 'USD', $currency);
	echo '<i class="icon-quote2"></i>&nbsp;In Your Country :&nbsp;' . $currency . '&nbsp;<span class="bold">' . $byCurrency . '</span>';

	
	wp_die();
} 


?>
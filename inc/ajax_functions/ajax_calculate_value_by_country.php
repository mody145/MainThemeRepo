<?php   

add_action('wp_ajax_nopriv_calc_all_value_cart', 'calc_all_value_cart'); 
add_action('wp_ajax_calc_all_value_cart', 'calc_all_value_cart');
function calc_all_value_cart() {

if (isset($_POST['Country_Currency']) && isset($_POST['price_All'])) {

	if (!empty($_POST['price_All']) && $_POST['price_All'] !== 0) {
		
		if (isset($_POST['Country_Currency'])) {

			global $woocommerce;
			$price = WC()->cart->cart_contents_total;

			if ($price == 0) {
				$price = 1;
			}

			$Country_Currency = $_POST['Country_Currency'];

			$value = convertCurrency($price, 'USD', $Country_Currency);

			$FormateValue = $value;

			echo 'You Cart Value : ' . $Country_Currency . '&nbsp;' . $FormateValue;

			setcookie( 'Country_Currency', $Country_Currency, (time() + (86400 * 30)) * 30, "/");

		}
	} else {

		echo "No Thing To Calculate";
	}
}

	

	if (isset($_POST['country'])) {

		global $woocommerce;
		$price = WC()->cart->cart_contents_total;

		$Country_Currency = $_POST['country'];

		$value = convertCurrency($price, 'USD', $Country_Currency);

		$FormateValue = $value;

		echo 'You Cart Value : ' . $Country_Currency . '&nbsp;' . $FormateValue;
	}

	wp_die();
} 

?>
<?php 

add_action('wp_ajax_nopriv_remove_from_cart_sd', 'remove_from_cart_sd'); 
add_action('wp_ajax_remove_from_cart_sd', 'remove_from_cart_sd');
function remove_from_cart_sd() {

	if (isset($_POST['idRemove'])) {
		$id = $_POST['idRemove']; 

		global $woocommerce;
	    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {

	        if ($cart_item['product_id'] == $id) {
	            //remove single product
	            $woocommerce->cart->remove_cart_item($cart_item_key);
	        }
	    }

		$_cartQty = count( WC()->cart->get_cart() );

		echo $_cartQty; 

	}

	wp_die();
} 


?>
<?php session_start();

/*=====================================================
=            Section Add Pruduct To Follow            =
=====================================================*/

add_action('wp_ajax_nopriv_add_follow', 'add_follow'); 
add_action('wp_ajax_add_follow', 'add_follow');
function add_follow() {
	/*Check If User Add This Item To List Follow*/
	if (isset($_POST['id'])) { 
		// If True Add Item
		$list = $_SESSION['follow'][] = $_POST['id'];

		$items_unique = array_unique($_SESSION['follow']);

		echo count($items_unique);

	}
	wp_die();
} 

/*=====  End of Section Add Pruduct To Follow  ======*/

/*========================================================
=            Section Remove Pruduct To Follow            =
========================================================*/

add_action('wp_ajax_nopriv_remove_follow', 'remove_follow'); 
add_action('wp_ajax_remove_follow', 'remove_follow');
function remove_follow() {

	if (isset($_POST['id'])) { 
		
		$id = $_POST['id'];
		$items = $_SESSION['follow']; 

		$items_unique = array_unique($_SESSION['follow']);

		$_SESSION['follow'] = $items_unique;

		$newItems = $_SESSION['follow'];

		$key = array_search($id, $newItems);

		unset($newItems[$key]);

		$_SESSION['follow'] = $newItems;
		
		echo count($newItems);

	}
	wp_die();
} 

/*=====  End of Section Remove Pruduct To Follow  ======*/

/*=======================================================
=            Section Add To Cart Single Post            =
=======================================================*/

add_action('wp_ajax_nopriv_add_to_cart_single_post', 'add_to_cart_single_post'); 
add_action('wp_ajax_add_to_cart_single_post', 'add_to_cart_single_post');
function add_to_cart_single_post() {


	$id = $_POST['id']; 

	global $woocommerce;
	$woocommerce->cart->add_to_cart($id); 

	$_cartQty = count( WC()->cart->get_cart() );

	echo $_cartQty; 

	wp_die();
} 

/*=====  End of Section Add To Cart Single Post  ======*/

/*================================================
=            Section Empty Whitelist             =
================================================*/

add_action('wp_ajax_nopriv_empty_whitelist', 'empty_whitelist'); 
add_action('wp_ajax_empty_whitelist', 'empty_whitelist');
function empty_whitelist() {


	$_SESSION['follow'] = array(); 

	wp_die();
} 

/*=====  End of Section Empty Whitelist   ======*/

/*=============================================
=            Section Like Product             =
=============================================*/

add_action('wp_ajax_nopriv_like_product', 'like_product'); 
add_action('wp_ajax_like_product', 'like_product');
function like_product() {


	$id = $_POST['id'];

	echo icreament_meta_likes($id);

	wp_die();
} 

/*=====  End of Section Like Product   ======*/

/*==============================================
=            Section Unlike Product            =
==============================================*/

add_action('wp_ajax_nopriv_unlike_product', 'unlike_product'); 
add_action('wp_ajax_unlike_product', 'unlike_product');
function unlike_product() {


	$id = $_POST['id'];

	echo increase_meta_likes($id);

	wp_die();
} 

/*=====  End of Section Unlike Product  ======*/


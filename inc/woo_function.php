<?php 
/*============================================================
=            WooCommerce Check if Product In Cart            =
============================================================*/

function woo_in_cart($product_id) {
    global $woocommerce;
 
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
 
        if($product_id == $_product->id ) {
            return true;
        }
    }
 
    return false;
}

/*=====  End of WooCommerce Check if Product In Cart  ======*/

/*=================================================================
=            WooCommerce Add Meta ( Like ) To Database            =
=================================================================*/

// Function To Check If Product Has Meta ( Likes ) Or Nor
// If Not This Function Will Echo ( 0 )
function check_if_has_meta_likes($id) {

	$newLikesNum = '';

	if ( metadata_exists( 'post', $id, 'likes' ) ) {

		$newLikesNum = get_post_meta( $id, 'likes', true ); 

	} else {

		$newLikesNum = '0'; 
	}
	return $newLikesNum;
}

// Function To Increament++ Number ( Likes )
// If This Product Has Not Meta ( Likes ) Will Create Meta And Add Value 1
function icreament_meta_likes($id) {

	if ( metadata_exists( 'post', $id, 'likes' ) ) {

		$likesNum = get_post_meta( $id, 'likes', true );

		update_post_meta( $id, 'likes', $likesNum+1 );
		$_SESSION['likes'][] = $id;

		$newList = array_unique($_SESSION['likes']);

		$_SESSION['likes'] = $newList;

		$newLikesNum = get_post_meta( $id, 'likes', true );
	} else {

		add_post_meta( $id, 'likes', 1 );

		$newLikesNum = get_post_meta( $id, 'likes', true );
		$_SESSION['likes'][] = $id;
	}
	return $newLikesNum;
}

// Function To increase-- Number ( Likes )
// If This Product Has Not Meta ( Likes ) Will Create Meta And Add Value 1
function increase_meta_likes($id) {

	if ( metadata_exists( 'post', $id, 'likes' ) && get_post_meta( $id, 'likes', true ) !== 0 ) {

		$likesNum = get_post_meta( $id, 'likes', true );

		if ($likesNum == 0) { $newLikesNum == 0; } else {

			update_post_meta( $id, 'likes', $likesNum-1 );

			$items_unique = array_unique($_SESSION['likes']);

			$_SESSION['likes'] = $items_unique;

			$newItems = $_SESSION['likes'];

			$key = array_search($id, $newItems);

			unset($newItems[$key]);

			$_SESSION['likes'] = $newItems;
		}

		$newLikesNum = get_post_meta( $id, 'likes', true );	

	} else {

		add_post_meta( $id, 'likes', 0 );

		$newLikesNum = get_post_meta( $id, 'likes', true );	
	}


	return $newLikesNum;
}

/*=====  End of WooCommerce Add Meta ( Like ) To Database  ======*/

/*===============================================================
=            Icreament Views For Posts - Increament             =
===============================================================*/

	// Icreament Post Views
	function increament_post_views($id) {
		if (metadata_exists( 'post', $id, 'views' )) {
			$Last_views = get_post_meta( $id, 'views', true );
			update_post_meta( $id, 'views', $Last_views+1 );
			$views = get_post_meta( $id, 'views', true );
			$_SESSION['views'][] = $id;
		} else {
			add_post_meta( $id, 'views', 1 );
			$views = get_post_meta( $id, 'views', true );
			$_SESSION['views'][] = $id;
		}
		return $views;
	}
	// Get Views For Post
	function get_views_for_post($id) {
		if (metadata_exists( 'post', $id, 'views' )) {
			$views = get_post_meta( $id, 'views', true );
		} else {
			$views = 0;
		}
		return $views;
	}

/*=====  End of Icreament Views For Posts - Increament   ======*/

/*============================================================
=            Get Count Of Items Follow If Exists             =
============================================================*/

function get_count_session_items_if_exists( $session ) {
	if ( isset( $session ) ) {
		$count = count( $session );
	} else {
		$count = 0;
	}
	return $count;
}

/*=====  End of Get Count Of Items Follow If Exists   ======*/

/*====================================================
=            Get Meta Value If Is Exists             =
====================================================*/

function get_meta_value_if_exists( $post_id, $meta ) {
	if (metadata_exists( 'post', $post_id, $meta )) {
		echo get_post_meta( $post_id, $meta, true );
	} else {
		echo 0;
	}
}

/*=====  End of Get Meta Value If Is Exists   ======*/

/*============================================================
=            Check If Is Product In Session Array            =
============================================================*/

function check_if_is_product_in_session( $sessionArray, $pro_id ) {
	if (isset($sessionArray)) {
		$varSession = $sessionArray;
	} else {
		$varSession = array();
	}
	if (in_array($pro_id, $varSession)) {
		return true;
	} else {
		return false;
	}
}

/*=====  End of Check If Is Product In Session Array  ======*/



?>
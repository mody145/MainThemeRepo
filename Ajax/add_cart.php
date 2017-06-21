<?php 

require_once( dirname( dirname( __FILE__ ) ) . '/../../../wp-load.php' );

$_cartQty = count( WC()->cart->get_cart() );

$id = $_POST['id']; 

do_shortcode( '[add_to_cart id="' . $id . '"]' );

echo $_cartQty;

?>
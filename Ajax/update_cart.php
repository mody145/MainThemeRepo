<?php require_once( dirname( dirname( __FILE__ ) ) . '/../../../wp-load.php' ); ?>
<?php 

global $woocommerce;
$total = WC()->cart->cart_contents_total;
echo $total;

?>
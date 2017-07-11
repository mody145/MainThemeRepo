<?php 

add_action('wp_ajax_nopriv_view_products_in_cart', 'view_products_in_cart'); 
add_action('wp_ajax_view_products_in_cart', 'view_products_in_cart');
function view_products_in_cart() {

	global $woocommerce;

	$infoCart = $woocommerce->cart->get_cart(); 

	if ( empty($infoCart) ) {
		echo "<span class='text-center'>Your Cart Is Empty</span>";
	} else {

		foreach ($infoCart as $cart_item) {
			$info = $cart_item['data']; ?>

		<div class="items">
			<span class="pull-left"><?php echo $info->name ?></span>
			<span class="pull-right"><i class="icon-usd"></i>&nbsp;<?php echo $info->price ?></span>
		</div>

		<?php } ?>

		<div class="buttons">
			<a class="text-center" href="<?php echo home_url( 'checkout' ); ?>"><button class="btn btn-default btn-sm">Checkout</button></a>
			<a class="text-center" href="<?php echo home_url( 'cart' ); ?>"><button class="btn btn-default btn-sm">Cart Page</button></a>
		</div>

	<?php } 

	wp_die();
} 


?>
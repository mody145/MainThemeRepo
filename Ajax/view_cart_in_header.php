<?php  

require_once( dirname( dirname( __FILE__ ) ) . '/../../../wp-load.php' );

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
			<a class="text-center" href="<?php echo home_url( 'checkout' ); ?>"><button class="btn btn-success btn-sm">Checkout</button></a>
			<a class="text-center" href="<?php echo home_url( 'cart' ); ?>"><button class="btn btn-success btn-sm">Cart Page</button></a>
		</div>

	<?php } ?>


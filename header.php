<?php session_start() ?>
<?php require_once get_template_directory() . '/inc/custom_functions/functionUSD_EURO.php';  ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/icon.png';  ?>">
		<title><?php if(is_home()) { echo bloginfo( 'name' ); } else { echo wp_title( $sep = '-' ); } ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>



	<!--===========================================================================
	=            This Divs To Get variables For Main Colors For JQuery            =
	============================================================================-->
	
	<div class="color1"></div>
	<div class="color2"></div>
	<div class="color3"></div>
	<div class="color4"></div>
	<div class="color5"></div>
	<div class="color6"></div>
	<div class="color7"></div>
	<div class="color8"></div>
	<div class="color9"></div>
	<div class="color10"></div>

	<div class="infoColor"></div>
	<div class="colormainScroll" data-color="<?php $mainScrollColor = esc_attr( get_option( 'mainScrollColor' ) ); echo $mainScrollColor; ?>"></div>

	<div class="green"></div>
	<div class="blue"></div>
	
	<div class="fontColorHaveBackground"></div>
	
	<!--====  End of This Divs To Get variables For Main Colors For JQuery  ====-->
	
	<!-- Section Overlay Loading -->
	<div class="loading_overlay">
		<div class="custom-loader">
			<div class="custom-spinner33">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
	</div><!-- Section Overlay Loading -->

	<!-- Section Search FullScrean -->
	<div class="search_fullscrean">
		<!-- Close Icon -->
		<div class="close-search">
			<i class="icon-minimize"></i>
		</div>
		<!-- Input Search -->
		<div class="in_center align-v">
			<div class="parent-center-search">
				<form id="full_screen_search" class="full_screen_search" action="<?php echo admin_url('admin-ajax.php')?>" method="POST">

					<input id="search-text" type="text" name="search" />

					<input type="hidden" name="action" value="full_screen_search" />

					<button type="submit" class=""><i class="icon-search"></i></button>

					<div class="radio-box">

						<div class="radio">
							<input checked="checked" id="product_check" type="radio" name="product_post" value="product">
							<label class="radio-label" for="product_check">Product</label>
						</div>

						<div class="radio">
							<input id="post_check" type="radio" name="product_post" value="post">
							<label class="radio-label" for="post_check">Posts</label>
						</div>

					</div>

				</form>
				<!-- Results -->
				<div class="for-scroll">
					<div class="results_search">
						
					</div>
				</div>
			</div>
		</div>

	</div><!-- Section Search FullScrean -->

	<!-- Start Container -->

	<div class="container">
		<div class="row">

		<!-- Header Here -->

		<div id="headToggile" class="col-md-12 nopadding hidden-xs parent_hide_show">

		<?php if ( isset( $_COOKIE['what_header'] ) && $_COOKIE['what_header'] == 'slider' && is_home() ) { ?>
			<header class="site-header">
				<i class="icon-close-one toggel-opacity hide_item rotate--90 dont_reload_again" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>

		        <div class="skitter-large-box">
		            <div class="skitter skitter-large-for-header with-thumbs">
		                <ul>
							<?php 

							/* --||  Start Loop (WP-Query)  ||-- */

							$args = array(
								'post_type' 	=> 'slider',
								'post_per_post' => 10,
							    'tax_query' => array(
							        array(
							            'taxonomy' => 'wich_slider',
							            'field'    => 'slug',
							            'terms'    => 'header-slider',
							        ),
							    ),
							);
							
							$slides = new WP_Query($args);

							if ($slides->have_posts()) {
								while ($slides->have_posts()) {
									$slides->the_post(); ?>

		                    <li>
		                        <a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">
		                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="cubeHide" />
		                        </a>
		                        <div class="label_text">
		                            <h3 class="test-title"><?php the_title(); ?></h3>
		                            <?php the_content(); ?>
		                            <span class="cat-pubble"><a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">Read more</a></span>
		                        </div>
		                    </li>

							<!--||  End Loop (WP-QUery)  ||-->
							<?php }} ?>
							<?php wp_reset_postdata(); ?>	

		                </ul>
		            </div>
		        </div>

			</header>
		<?php } elseif ( isset( $_COOKIE['what_header'] ) && $_COOKIE['what_header'] == 'small' ) { ?>
			<div class="small-header parent_hide_show">

				<div class="container-img-header">
					<div class="overlay"></div>

					<?php 

					$urlImage = get_template_directory_uri() . '/layout/images/header/';
					$ImagesArray = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', );
					$random_image = array_rand($ImagesArray);

					?>
					<img src="<?php echo $urlImage . $ImagesArray[$random_image]; ?>" class="">
				</div>

				<?php if ( is_home() ) { ?>
				<i class="icon-show-two toggel-opacity hide_item reload_again" style="font-size: 21px !important;" data-toggle="tooltip" data-placement="top" title="Reload Slider"></i>
				<?php } ?>
				<?php dynamic_sidebar( 'advertise_here' ); ?>
			</div>
		<?php } else { ?>

			<?php if ( is_home() ) {  ?>
				<header class="site-header">
					<i class="icon-close-one toggel-opacity hide_item rotate--90 dont_reload_again" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>

	                <div class="skitter-large-box">
	                    <div class="skitter skitter-large-for-header with-thumbs">
	                        <ul>
								<?php 

								/* --||  Start Loop (WP-Query)  ||-- */

								$args = array(
									'post_type' 	=> 'slider',
									'post_per_post' => 10,
								    'tax_query' => array(
								        array(
								            'taxonomy' => 'wich_slider',
								            'field'    => 'slug',
								            'terms'    => 'header-slider',
								        ),
								    ),
								);
								
								$slides = new WP_Query($args);

								if ($slides->have_posts()) {
									while ($slides->have_posts()) {
										$slides->the_post(); ?>

	                            <li>
	                                <a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">
	                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="cubeHide" />
	                                </a>
	                                <div class="label_text">
	                                    <h3 class="test-title"><?php the_title(); ?></h3>
	                                    <?php the_content(); ?>
	                                    <span class="cat-pubble"><a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>">Read more</a></span>
	                                </div>
	                            </li>

								<!--||  End Loop (WP-QUery)  ||-->
								<?php }} ?>
								<?php wp_reset_postdata(); ?>	

	                        </ul>
	                    </div>
	                </div>

				</header>
			<?php } else { ?>

			<div class="small-header">
				<div class="container-img-header">
					<div class="overlay"></div>

					<?php 

					$urlImage = get_template_directory_uri() . '/layout/images/header/';
					$ImagesArray = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', );
					$random_image = array_rand($ImagesArray);

					?>
					<img src="<?php echo $urlImage . $ImagesArray[$random_image]; ?>" class="">
				</div>
				<?php dynamic_sidebar( 'advertise_here' ); ?>
			</div>

			<?php } ?>

		<?php } ?>
		</div>

		<!-- End Header Here -->
		<!-- Start Menu And Prand In Mobile Screen -->
		
		<!-- <header class="site-header"> -->

			<nav class="navbar navbar-default visible-xs">
				<div class="container-fluid">

				<?php $args = array(
					'theme_location' 	=> 'mobile',
					'walker'         	=> new WP_Bootstrap_Navwalker(),
					'menu_class'	 	=> 'nav navbar-nav',
					'container_class'	=> 'collapse navbar-collapse',
					'container_id' 		=> 'bs-example-navbar-collapse-1'
				); ?>

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">Smile</a>
				</div>

				<?php wp_nav_menu( $args ); ?>
				</div>
			</nav>

			<!-- End Menu And Prand In Mobile Screen -->
			<!-- Start Brand Here -->

			<div class="col-md-3 col-sm-6 nopadding hidden-xs" style="position: static;">
				<div class="brand-name transparent wow fadeIn">
					<a href="<?php echo home_url(); ?>"><i class="icon-smile-logo"></i></a>
				</div>
			</div>

			<!-- End Brand Here -->
			<!-- Start Icon Like | Follow | Cart -->

			<div class="col-md-2 col-sm-6 nopadding">
				<div class="icon-header1 wow fadeIn">

					<a href="<?php echo home_url( 'dashpoard' ); ?>"><i class="icon-check2" data-toggle="tooltip" data-placement="bottom" title="Your Orders"><span id="items-follow"><?php echo wc_get_customer_order_count( get_current_user_id() ); ?></span></i></a>

					<!-- Get Count Of Items In List Follow -->
					<a href="<?php echo home_url( 'wishlist' ); ?>"><i class="icon-heart7" data-toggle="tooltip" data-placement="bottom" title="Following List"><span id="items-whitelist"><?php echo get_count_session_items_if_exists( $_SESSION['follow'] ); ?></span></i></a>

					<!-- Get Count Of Items In List Cart -->
					<?php $_cartQty = count( WC()->cart->get_cart() ); ?>
					<a href="<?php echo home_url( 'cart' ); ?>"><i class="icon-add_shopping_cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><span id="items-cart"><?php echo $_cartQty; ?></span></i></a>
				</div>
			</div>

			<!-- End Icon Like | Follow | Cart -->
			<!-- Login/Rgister Form And Add Item -->
			
				<div class="col-md-4 col-sm-12 nopadding">

					<div class="col-md-6 col-sm-6 nopadding">
						<div class="add-register-login wow fadeIn">
							<div class="login-register text-center">
								<?php 
								
								$arr_strings = array('Login','Sign Up');
								$arr_strings_empty = array('','');

								$all_output = do_shortcode('[lsphe-header]' );
								$remove_strings = str_replace($arr_strings, $arr_strings_empty, $all_output);

								echo $remove_strings;

								 ?>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 nopadding">
						<div class="search-in-header wow fadeIn">&nbsp;
							<i class="icon-search"></i>
						</div>
					</div>

				</div>
			
			<!-- End Login/Rgister Form And Add Item -->
			<!-- Srart Form Search -->

				<div class="col-md-3 col-sm-12 nopadding">
					<div class="total-cart text-center wow fadeIn">
						<?php 

						global $woocommerce;

						$amount = WC()->cart->cart_contents_total;
						
						?>

						<i class="icon-shopping-cart"></i> : &nbsp;<i class="icon-usd"></i>&nbsp;<span class="total-number" data-toggle="tooltip" data-placement="bottom" title="Value"><?php echo $amount; ?></span>

						<span id="update_total_cart" class="update-total round2">
							<i class="icon-eye3"></i>
							<span class="show-value-box-dropdown">
								<?php
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
										<a class="text-center" href="<?php echo home_url( 'checkout' ); ?>"><button class="btn btn-primary btn-sm">Checkout</button></a>
										<a class="text-center" href="<?php echo home_url( 'cart' ); ?>"><button class="btn btn-primary btn-sm">Cart Page</button></a>
									</div>

								<?php } ?>
							</span>
						</span>

						<span class="calc-total round2">
							<i class="icon-cog4"></i>
							<span class="calc-total-box-dropdown">
							<span class="select-country text-center"><i class="icon-flag-o"></i>&nbsp; Select Your Country</span>
								<form class="Convert_Form" action="<?php echo admin_url('admin-ajax.php')?>">
									<select class="convert">
										<?php global $Currency;
										foreach ($Currency as $key => $value) { ?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php } ?>
									</select> <span class="text-center convert_result"> </span>
								</form>

								<?php if (isset($_COOKIE['Country_Currency'])) { ?>

								<a id="save_country" href="<?php echo admin_url('admin-ajax.php')?>" class="btn btn-primary btn-sm" data-country="<?php echo $_COOKIE['Country_Currency']; ?>">Calc By&nbsp;-&nbsp;<?php echo $_COOKIE['Country_Currency']; ?></a>
								<a id="remove_cookie" href="<?php echo admin_url('admin-ajax.php')?>" class="btn btn-primary btn-sm">Remove</a>

								<?php } ?>

							</span>
						</span>

						<span class="show-followed round2">
							<i class="icon-heart7"></i>
							<span class="show-followed-dropdown-box">
								<?php
								if (empty($_SESSION['follow'])) {
									echo "<span class='text-center'>Your Whitelist Is Empty</span>";
								} else {

									$items_unique = array_unique($_SESSION['follow']); 

										$args = array(
											'post_type' 		=> 'product',
											'post__in' 			=> $items_unique,
											'posts_per_page' 	=> -1
											);
										$Query = new WP_Query( $args );

										if ($Query->have_posts()) {
											while($Query->have_posts()) {
												$Query->the_post(); ?>

									<div class="items">
										<span class="pull-left"><?php echo get_the_title(); ?></span>
										<span class="pull-right"><i class="icon-usd"></i>&nbsp;<?php echo get_post_meta( get_the_id(), '_price', true ); ?></span>
									</div>

									<?php }} ?>

									<div class="buttons">
										<a class="text-center" href="<?php echo home_url( 'wishlist' ); ?>"><button class="btn btn-primary btn-sm btn-block">Whitelist Page</button></a>
									</div>

								<?php } ?>
							</span>
						</span>

					</div>
				</div>

			<!-- End Form Search -->
			<!-- navbar Header -->

			<div class="col-md-9 col-sm-12 hidden-xs hidden-sm nopadding" style="z-index: 20;">
				<nav class="header-menu wow fadeIn">
					<?php 

					$args1 = array(
						'theme_location' 	=> 'header',
						'walker'         	=> new WP_Bootstrap_Navwalker()
						);

					wp_nav_menu( $args1 ); ?>

				</nav>
			</div>

			<div class="col-md-9 col-sm-12 visible-sm nopadding" style="z-index: 20;">
				<nav class="header-menu wow fadeIn">
					<?php 

					$args1 = array(
						'theme_location' => 'tablet',
						'container_class' 	 => 'menu-headermenu-container',
						'walker'         => new WP_Bootstrap_Navwalker()
						);

					wp_nav_menu( $args1 ); ?>
				</nav>
			</div>

			<!-- End navbar Header -->
			<!-- Navbar Primary -->

			<div class="col-md-3 col-sm-12 nopadding">
				<nav class="primary-menu wow fadeIn">
					<?php 

					$args = array(
						'theme_location' => 'primary'
						);
					wp_nav_menu( $args ); ?>
				</nav>
			</div>

		<!-- </header> -->

		<!-- End Navbar Primary -->

		<!-- For Clear All Float Bootstrap -->
		<div class="clearfix"></div>
		<!-- For Clear All Float Bootstrap -->
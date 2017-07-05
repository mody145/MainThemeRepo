<?php session_start() ?>
<?php require_once get_template_directory() . '/inc/functionUSD_EURO.php';  ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
		<title><?php if(is_home()) { echo bloginfo( 'name' ); } else { echo wp_title( $sep = '-' ); } ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

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

	<div class="green"></div>
	<div class="blue"></div>

	<!-- Section Overlay Loading -->
	<div class="loading_overlay">
		<span>TEST</span>
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
				<div class="results_search">
					
				</div>
			</div>
		</div>

	</div><!-- Section Search FullScrean -->

	<!-- Start Container -->

	<div class="container">
		<div class="row">

		<!-- Header Here -->

		<!-- <div class="col-md-12 nopadding hidden-xs">
			<header class="site-header">
				<img src="<?php //echo get_template_directory_uri() . '/layout/images/head.jpg' ?>">
			</header>
		</div> -->

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
					<a class="navbar-brand" href="<?php echo home_url(); ?>">Brand</a>
				</div>

				<?php wp_nav_menu( $args ); ?>
				</div>
			</nav>

			<!-- End Menu And Prand In Mobile Screen -->
			<!-- Start Brand Here -->

			<div class="col-md-2 col-sm-6 nopadding hidden-xs">
				<div class="brand-name">
					<a href="<?php echo home_url(); ?>">Brand Name</a>
				</div>
			</div>

			<!-- End Brand Here -->
			<!-- Start Icon Like | Follow | Cart -->

			<div class="col-md-3 col-sm-6 nopadding">
				<div class="icon-header1">

					<a href="<?php echo home_url( 'dashpoard' ); ?>"><i class="icon-check2" data-toggle="tooltip" data-placement="bottom" title="Your Orders"><span id="items-follow">0</span></i></a>

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

					<div class="col-md-6 nopadding">
						<div class="add-register-login">
							<div class="login-register text-center">
								<?php echo do_shortcode('[lsphe-header]' ); ?>
							</div>
						</div>
					</div>

					<div class="col-md-6 nopadding">
						<div class="search-in-header" data-toggle="tooltip" data-placement="bottom" title="Click To FullScrean Search">&nbsp;
							<i class="icon-search"></i>
						</div>
					</div>

				</div>
			
			<!-- End Login/Rgister Form And Add Item -->
			<!-- Srart Form Search -->

				<div class="col-md-3 col-sm-12 nopadding">
					<div class="total-cart text-center">
						<?php 

						global $woocommerce;

						$amount = WC()->cart->cart_contents_total;
						
						?>

						Total Cart : <i class="icon-usd"></i>&nbsp;<span class="total-number" data-toggle="tooltip" data-placement="bottom" title="Value"><?php echo $amount; ?></span>
						<span id="update_total_cart" class="update-total" data-link="<?php echo get_template_directory_uri() . '/Ajax/update_cart.php' ?>">
							<i class="icon-eye3"></i>
							<span class="show-value-box-dropdown" data-link="<?php echo get_template_directory_uri() . '/Ajax/view_cart_in_header.php' ?>">

							</span>
						</span>
						<span class="calc-total">
							<i class="icon-calculator"></i>
							<span class="calc-total-box-dropdown">
							<span class="select-country text-center"><i class="icon-flag-o"></i>&nbsp; Select Your Country [Auto Save]</span>
								<form class="Convert_Form" action="<?php echo admin_url('admin-ajax.php')?>">
									<select class="convert">
										<?php global $Currency;
										foreach ($Currency as $key => $value) { ?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php } ?>
									</select> <span class="text-center convert_result"> </span>
								</form>

								<?php if (isset($_COOKIE['Country_Currency'])) { ?>

								<a id="save_country" href="<?php echo admin_url('admin-ajax.php')?>" class="btn btn-success btn-sm" data-country="<?php echo $_COOKIE['Country_Currency']; ?>">Calc By&nbsp;-&nbsp;<?php echo $_COOKIE['Country_Currency']; ?></a>

								<?php } ?>

							</span>
						</span>
					</div>
				</div>

			<!-- End Form Search -->
			<!-- navbar Header -->

			<div class="col-md-9 col-sm-12 hidden-xs hidden-sm nopadding">
				<nav class="header-menu">
					<?php 

					$args1 = array(
						'theme_location' => 'header',
						'walker'         => new WP_Bootstrap_Navwalker()
						);

					wp_nav_menu( $args1 ); ?>
				</nav>
			</div>

			<div class="col-md-9 col-sm-12 visible-sm nopadding">
				<nav class="header-menu">
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
				<nav class="primary-menu">
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
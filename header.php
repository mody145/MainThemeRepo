<?php session_start() ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" />
		<title><?php if(is_home()) { echo bloginfo( 'name' ); } else { echo wp_title( $sep = '-' ); } ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

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

					<a href="<?php echo home_url( 'dashpoard' ); ?>"><i class="icon-check2"><span id="items-follow">0</span></i></a>

					<!-- Get Count Of Items In List Follow -->
					<a href="<?php echo home_url( 'wishlist' ); ?>"><i class="icon-heart7"><span id="items-whitelist"><?php echo get_count_session_items_if_exists( $_SESSION['follow'] ); ?></span></i></a>

					<!-- Get Count Of Items In List Cart -->
					<?php $_cartQty = count( WC()->cart->get_cart() ); ?>
					<a href="<?php echo home_url( 'cart' ); ?>"><i class="icon-add_shopping_cart"><span id="items-cart"><?php echo $_cartQty; ?></span></i></a>
				</div>
			</div>

			<!-- End Icon Like | Follow | Cart -->
			<!-- Login/Rgister Form And Add Item -->
			
				<div class="col-md-4 col-sm-12 nopadding">
					<div class="add-register-login">
						test
					</div>
				</div>
			
			<!-- End Login/Rgister Form And Add Item -->
			<!-- Srart Form Search -->

				<div class="col-md-3 col-sm-12 nopadding">
					<div class="form-search">
						Test
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
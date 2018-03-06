<?php 
/*==================================================
=            Enqueue Styles And Scripts            =
==================================================*/

/*
** Enqueue All Styles And Scripts
** Add By Mahmoud
*/

function dwwp_styles_and_scripts() {

	if ( is_shop() ) {
		// CDN Select2
		wp_enqueue_style( 'select2-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' );
	}

	if ( is_home() ) {
		// skitter slider
		wp_enqueue_style( 'skitter-css', get_template_directory_uri() . '/layout/css/skitter.css' );
	}

	// Animate Lip
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/layout/css/mainify_css/animate.css' );

	if ( is_product() ) {
		// OWL Carousel
		wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/layout/css/owl.carousel.min.css' );
	}

	if ( is_shop() || is_product() || is_product_tag() || is_product_category() || is_home() ) {
		// thumbelina
		wp_enqueue_style( 'thumbelina-css', get_template_directory_uri() . '/layout/css//mainify_css/thumbelina.css' );
	}

	// Bootstrap css
	wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
	// CDN FontAwsome
	//wp_enqueue_style( 'font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	// Fonts
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/layout/css/fonts.css?' . time() . '' );
	// Main File Css
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/layout/css/mainify_css/main.css?' . time() . '' );
	// PHP File To Use Function Darken And Lighten Colors
	wp_enqueue_style( 'function-colors', get_template_directory_uri() . '/layout/css/function-colors.php', false, false );
	
	// Remove Register JQuery
	wp_deregister_script( 'jquery' );
	// Put CDN JQuery ( In Footer )
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', null, null, true );
	// Bootstrap js
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', true );
 	// FontAwesome-js
	//wp_enqueue_script( 'fontAwesome-js', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', array('jquery'), '', true );

	if ( is_home() ) {
		// skitter slider
		wp_enqueue_script( 'skitter-js', get_template_directory_uri() . '/layout/js/mainify_js/jquery.skitter.js', array('jquery'), '', true );
	}

	// WOW Lip
	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/layout/js/pugins_JQuery/wow.min.js', array('jquery'), '', true );
	// Nice Scroll
	wp_enqueue_script( 'NiceScroll-js', get_template_directory_uri() . '/layout/js/pugins_JQuery/jquery.nicescroll.min.js', array('jquery'), '', true );
	// jquery jscroll
	wp_enqueue_script( 'jscroll-js', get_template_directory_uri() . '/layout/js/mainify_js/jquery.jscroll.js', array('jquery'), '', true );
	// easying
	wp_enqueue_script( 'easying-js', get_template_directory_uri() . '/layout/js/mainify_js/jquery.easing.1.3.js', array('jquery'), '', true );

	if ( is_shop() || is_product() || is_product_category() || is_product_tag() ) {

		// Masonry
		wp_enqueue_script( 'Masonry', get_template_directory_uri() . '/layout/js/pugins_JQuery/masonry.pkgd.min.js', array('jquery'), '', true );
	}

	if ( is_shop() || is_product() || is_product_tag() || is_product_category() || is_home() ) {
		//thumbelina
		wp_enqueue_script( 'thumbelina-js', get_template_directory_uri() . '/layout/js/mainify_js/thumbelina.js', array('jquery'), '', true );
	}

	if ( is_product() ) {
		// OWL Carousel
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/layout/js/pugins_JQuery/owl.carousel.min.js', array('jquery'), '', true );	
	}

	if ( is_product() ) {
		// elevateZoom
		wp_enqueue_script( 'elevateZoom', get_template_directory_uri() . '/layout/js/pugins_JQuery/jquery.elevateZoom-3.0.8.min.js', array('jquery'), '', true );
	}

	if ( is_home() ) {
		// final countdown
		wp_enqueue_script( 'final-countdown', get_template_directory_uri() . '/layout/js/mainify_js/jquery.countdown.js', array('jquery'), '', true );
	}

	// For Sticky Sidebar
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/layout/js/pugins_JQuery/jquery.sticky-kit.js', array('jquery'), '', true );
	// Enqueue JQuery
	wp_enqueue_script( 'jquery' );
	// Ajax JQuery
	wp_enqueue_script( 'ajax-js', get_template_directory_uri() . '/layout/js/mainify_js/Ajax_JQuery.js?' . time() . '', array('jquery'), '', true );
	// Main File Js
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/layout/js/mainify_js/main.js?' . time() . '', array('jquery'), '', true );

	// DECLARE JAVASCRIPT GLOBAL VARIABLES FOR WORDPRESS
	wp_localize_script( 'ajax-js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'dwwp_styles_and_scripts' );

function dwwp_admin_custom_script() {
	wp_enqueue_media();
	// Admin Css
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/layout/css/custom-admin.css?' . time() . '' );
	// Fonts
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/layout/css/fonts.css?' . time() . '' );

	// Admin Js
	wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/layout/js/custom-admin.js', array('jquery'), '', true );
	wp_enqueue_script( 'admin-custom-script' );
}
add_action( 'admin_enqueue_scripts', 'dwwp_admin_custom_script' );

/*=====  End of Enqueue Style And Scripts  ======*/
?>
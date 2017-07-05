<?php 
/*==================================================
=            Enqueue Styles And Scripts            =
==================================================*/

/*
** Enqueue All Styles And Scripts
** Add By Mahmoud
*/

function dwwp_styles_and_scripts() {
	// Bootstrap css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/layout/css/bootstrap.css' );
	// skitter slider
	wp_enqueue_style( 'skitter-css', get_template_directory_uri() . '/layout/css/skitter.css' );
	// Fonts
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/layout/css/fonts.css' );
	// Main File Css
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/layout/css/main.css?' . time() . '' );
	
	// Remove Register JQuery
	wp_deregister_script( 'jquery' );
	// Put JQuery ( In Footer )
	wp_register_script( 'jquery', includes_url('js/jquery/jquery.js'), false, '', true );

	// Bootstrap js
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/layout/js/bootstrap.min.js', array('jquery'), '', true );
	// skitter slider
	wp_enqueue_script( 'skitter-js', get_template_directory_uri() . '/layout/js/jquery.skitter.js', array('jquery'), '', true );
	// Trigger Nice Scroll
	wp_enqueue_script( 'NiceScroll-js', get_template_directory_uri() . '/layout/js/jquery.nicescroll.min.js', array('jquery'), '', true );
	// jquery jscroll
	wp_enqueue_script( 'jscroll-js', get_template_directory_uri() . '/layout/js/jquery.jscroll.js', array('jquery'), '', true );
	// easying
	wp_enqueue_script( 'easying-js', get_template_directory_uri() . '/layout/js/jquery.easing.1.3.js', array('jquery'), '', true );
	// Masonry
	wp_enqueue_script( 'Masonry', get_template_directory_uri() . '/layout/js/masonry.pkgd.min.js', array('jquery'), '', true );
	// For Sticky Sidebar
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/layout/js/jquery.sticky-kit.js', array('jquery'), '', true );
	// Enqueue JQuery
	wp_enqueue_script( 'jquery' );
	// Ajax JQuery
	wp_enqueue_script( 'ajax-js', get_template_directory_uri() . '/layout/js/Ajax_JQuery.js?' . time() . '', array('jquery'), '', true );
	// Main File Js
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/layout/js/main.js?' . time() . '', array('jquery'), '', true );

	// DECLARE JAVASCRIPT GLOBAL VARIABLES FOR WORDPRESS
	wp_localize_script( 'ajax-js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'dwwp_styles_and_scripts' );

function dwwp_admin_custom_script() {
	wp_enqueue_media();
	// Admin Css
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/layout/css/custom-admin.css?' . time() . '' );

	// Admin Js
	wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/layout/js/custom-admin.js', array('jquery'), '', true );
	wp_enqueue_script( 'admin-custom-script' );
}
add_action( 'admin_enqueue_scripts', 'dwwp_admin_custom_script' );

/*=====  End of Enqueue Style And Scripts  ======*/
?>
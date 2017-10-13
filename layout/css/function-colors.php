<?php

require_once( '../../../../../wp-load.php' );

// Tell the browser that this is CSS instead of HTML
header("Content-type: text/css");

// Get the color generating code
include_once get_template_directory() . '/layout/css/csscolor.php';

// Set the error handing for csscolor.
// If an error occurs, print the error
// within a CSS comment so we can see
// it in the CSS file.
PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'errorHandler');
function errorHandler($err) {
    echo("/* ERROR " . $err->getMessage() . " */");
}

// Define a couple color palettes
$base = new CSS_Color('C9E3A6');
$highlight = new CSS_Color('746B8E');
$opacity = 100;
// Trigger an error just to see what happens
// $trigger = new CSS_Color('');

// Replace # Function 
function replaceHashHex($hex) {
	global $base;
	$oldHex = $hex;
	$baseHex = $base->hex2RGB( str_replace('#', '', $oldHex) );
	echo $baseHex[0] . ', ' . $baseHex[1] . ', ' . $baseHex[2] ;
} 

// function Make Lighten
function makeLighten($hex, $percent) {
	global $base;
	$oldHex = $hex;
	$baseHex = str_replace('#', '', $oldHex);
	echo '#' . $base->lighten($baseHex, $percent);
}

// function Make Darken
function makeDarken($hex, $percent) {
	global $base;
	$oldHex = $hex;
	$baseHex = str_replace('#', '', $oldHex);
	echo '#' . $base->darken($baseHex, $percent);
}

?>

<?php /* Start Style Sheet Here
		-------------------------------------------- */ ?>

<?php 

	$color1 = esc_attr( get_option( 'color1' ) ); 
	$color2 = esc_attr( get_option( 'color2' ) ); 
	$color3 = esc_attr( get_option( 'color3' ) ); 
	$color4 = esc_attr( get_option( 'color4' ) ); 
	$color5 = esc_attr( get_option( 'color5' ) ); 
	$color6 = esc_attr( get_option( 'color6' ) ); 
	$color7 = esc_attr( get_option( 'color7' ) ); 
	$color8 = esc_attr( get_option( 'color8' ) ); 
	$infoColor = esc_attr( get_option( 'infoColor' ) ); 
	$backgroungTransparentImage = esc_attr( get_option( 'transparentColor' ) ); 
	$fontColorHaveBackground = esc_attr( get_option( 'fontColorHaveBackground' ) ); 

?>
:root {
	--color1: <?php echo $color1 ?>;
	--color2: <?php echo $color2 ?>;
	--color3: <?php echo $color3 ?>;
	--color4: <?php echo $color4 ?>;
	--color5: <?php echo $color5 ?>;
	--color6: <?php echo $color6 ?>;
	--color7: <?php echo $color7 ?>;
	--color8: <?php echo $color8 ?>;
	--infoColor: <?php echo $infoColor ?>;
	--backgroungTransparentImage: <?php echo $backgroungTransparentImage ?>;
	--fontColorHaveBackground: <?php echo $fontColorHaveBackground ?>;
}

/*  [ Opacity ]
-------------------- */

.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
    background-color: rgba(<?php replaceHashHex($color1) ?>, .7);
}

.panel-body:before {
    border-bottom: 5px solid rgba(<?php replaceHashHex($color3) ?>, 0);
    border-right: 5px solid rgba(<?php replaceHashHex($color3) ?>, 0);
    border-left: 5px solid rgba(<?php replaceHashHex($color3) ?>, 0);
}

.counter_spinner10 {
	background-color: rgba(<?php replaceHashHex($color2) ?>, .2);
}

ul.dropdown-menu li {
	border-bottom: 1px solid rgba(<?php replaceHashHex($color2) ?>, 0.6);
}

div.get-posts-in-menu .post-box .info-box > p {
	color: rgba(<?php replaceHashHex($color2) ?>, 0.65);
}

.search_fullscrean {
	background-color: rgba(<?php replaceHashHex($color5) ?>, 0.88);
}

.search_fullscrean .results_search {
	color: rgba(<?php replaceHashHex($color2) ?>, 0.75);
}

.total-cart span.update-total span.show-value-box-dropdown {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.89);
}

.total-cart span.update-total span.show-value-box-dropdown .items:nth-child(even) {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.14);
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.77) !important;
}

span.calc-total-box-dropdown {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.89);
}

span.show-followed-dropdown-box {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.89);
}

span.show-followed-dropdown-box .items:nth-child(even) {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.14);
    background-color: rgba(<?php replaceHashHex($color2) ?>, 0.77) !important;
}

.container-grid-images .grid-images .overlay {
	background: rgba(<?php replaceHashHex($color2) ?>, 0.7);
}

.services-container-box .overlay {
	background: rgba(<?php replaceHashHex($color2) ?>, 0.7);
}

.person h4 {
	background: rgba(<?php replaceHashHex($color2) ?>, 0.92);
}

span.social-media-team {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.92);
}

.person .jop {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.92);
}

.su-spoiler-content.su-clearfix {
	background-color: rgba(<?php replaceHashHex($color2) ?>, 0.34);
}

h1.post-title a {
    color: rgba(<?php replaceHashHex($fontColorHaveBackground) ?>, 1);
}

form.es_shortcode_form input#es_txt_button_pg {
	border: 1px solid rgba(<?php replaceHashHex($color7) ?>, 0.84);
}

.products .overlay i#remove_from_cart_sd {
	color: rgba(<?php replaceHashHex($color3) ?>, 0.62);
}

.parent-cart-page form.woocommerce-cart-form table thead tr th {
	border: 1px solid rgba(<?php replaceHashHex($infoColor) ?>, 0.2);
}

.parent-cart-page form.woocommerce-cart-form table tbody tr td {
	border: 1px solid rgba(<?php replaceHashHex($infoColor) ?>, 0.15);
}

.cart-collaterals .cart_totals {
	border: 1px solid rgba(<?php replaceHashHex($infoColor) ?>, 0.2);
}

@media (max-width: 767px) {
	a.remove i {
		background-color: rgba(<?php replaceHashHex($infoColor) ?>, 0.2);
	}
}

p.info-for-the-post {
	color: rgba(<?php replaceHashHex($color2) ?>, 0.63);
}

/*  [ Lighten ]
-------------------- */

.container-comments .reply-list li:before {
	background: <?php makeLighten($infoColor, 0.3) ?>;
}

.container-comments .comment-box .comment-head span {
	color: <?php makeLighten($color8, 0.1) ?>;
}

.custom-sidebar-widget-footer2 ul li a img {
	border: 4px solid <?php makeLighten($infoColor, 0.4) ?>;
}

.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
    color: <?php makeLighten($color8, 0.1) ?>);
}

.round-info-span {
	background-color: <?php makeDarken($color2, 0.9) ?>;
}

.site-header .test-title {
	color: <?php makeLighten($color8, 0.1) ?>;
}

.site-header .label_skitter p {
	color: <?php makeLighten($color8, 0.1) ?>;
}

.total-cart span.update-total span.show-value-box-dropdown {
	color: <?php makeLighten($color8, 0.1) ?>;
}

span.show-value-box-dropdown .items:nth-child(even) {
	color: <?php makeLighten($color8, 0.2) ?>;
}

span.show-followed-dropdown-box .items:nth-child(even) {
	color: <?php makeLighten($color8, 0.1) ?>;
}

.latest-posts-blog .post_title {
	border-bottom: 1px solid <?php makeLighten($infoColor, 0.4) ?>;
}

.testimonials .image-testimonials {
	border: 6px solid <?php makeDarken($color2, 0.9) ?>;
}

.testimonials .carousel-indicators li {
	background-color: <?php makeLighten($infoColor, 0.4) ?>;
}

.profile-container form.woocomerce-form.woocommerce-form-login.login p.woocommerce-LostPassword.lost_password a {
	color: <?php makeLighten($infoColor, 0.1) ?> !important;
}

.latest-posts-blog-widget a.left.carousel-control i {
	color: <?php makeLighten($infoColor, 0.2) ?>;
}

.latest-posts-blog-widget a.right.carousel-control i {
	color: <?php makeLighten($infoColor, 0.2) ?>;
}

.top-items-shop-widget a.left.carousel-control i {
	color: <?php makeLighten($infoColor, 0.2) ?>;
}

.top-items-shop-widget a.right.carousel-control i {
	color: <?php makeLighten($infoColor, 0.2) ?>;
}

/*  [ Darken ]
-------------------- */

.container-comments .comments-list:before {
	background: <?php makeDarken($color1, 0.8) ?>;
}

.container-comments .comments-list:after {
	background: <?php makeDarken($color1, 0.8) ?>;
	border: 3px solid <?php makeDarken($color1, 0.8) ?>;
}

.container-comments .comment-box .comment-head {
	border-bottom: 1px solid <?php makeDarken($color2, 0.8) ?>;
}

.container-comments .comment-box .comment-head i:hover {
	color: <?php makeDarken($infoColor, .9) ?>;
}

.category_by_images .__box_categorey h4 span {
	color: <?php makeDarken($fontColorHaveBackground, .80) ?>;
}

.category_by_images_blog .__box_categorey h4 span {
	color: <?php makeDarken($fontColorHaveBackground, .80) ?>;
}

.btn-primary.active.focus, 
.btn-primary.active:focus, 
.btn-primary.active:hover, 
.btn-primary:active.focus, 
.btn-primary:active:focus, 
.btn-primary:active:hover, 
.open>.dropdown-toggle.btn-primary.focus, 
.open>.dropdown-toggle.btn-primary:focus, 
.open>.dropdown-toggle.btn-primary:hover {
	border-bottom: 4px solid <?php makeDarken($color3, .8) ?>;
}

.btn-info.active.focus, 
.btn-info.active:focus, 
.btn-info.active:hover, 
.btn-info:active.focus, 
.btn-info:active:focus, 
.btn-info:active:hover, 
.open>.dropdown-toggle.btn-info.focus, 
.open>.dropdown-toggle.btn-info:focus, 
.open>.dropdown-toggle.btn-info:hover {
	border-bottom: 4px solid <?php makeDarken($color5, .8) ?>;
}

.panel-primary > .panel-heading {
    background-color: <?php makeDarken($color3, .9) ?>;
    border-color: <?php makeDarken($color3, .9) ?>;
}

<?php /* End Style Sheet Here
		-------------------------------------------- */ ?>
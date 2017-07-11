/* global $, console */

jQuery(document).ready(function($) {
	'use strict';

	// This Is Main Colors
	var color1 		= $('.color1').css('background-color');
	var color2 		= $('.color2').css('background-color');
	var color3 		= $('.color3').css('background-color');
	var color4 		= $('.color4').css('background-color');
	var color5 		= $('.color5').css('background-color');
	var color6 		= $('.color6').css('background-color');
	var color7 		= $('.color7').css('background-color');
	var color8 		= $('.color8').css('background-color');
	var color9 		= $('.color9').css('background-color');
	var color10 	= $('.color10').css('background-color');

	var infoColor 	= $('.infoColor').css('background-color');

	var green 		= $('.green').css('background-color');
	var blue 		= $('.blue').css('background-color');

	// Masonry Item Width
	$('.grid-item').width(($('.parent').width() / 2) - 20);
	
	// Run Masonry For Blog
	$('.parent').masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: ($('.parent').width() / 2)
	});

	// Run Skitter Slider
	$(function() {
		$('.skitter-large').skitter({

			'dots'				: false,
			'numbers'			: true,
			'controls'			: true,
			'hide_tools'		: true,
			'with_animations' 	: ["paralell", "glassBlock", "swapBars"],
			'theme' 			: 'clean',
		});
	});

	// Trigger Nice Scroll
	$("html").niceScroll({

		cursorcolor: 		color6,
		cursorwidth: 		"10px",
		cursorborder: 		"0",
		cursorborderradius: "1px",
		cursoropacitymin: 	"0.1",
		zindex: 			"999999",
	});

	//Trigger Tooltip Bootstarp
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});

	// Run Bootstrap Carousel
	$('.carousel').carousel();

	$('input').attr('autocomplete', 'off');


	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:3,
	            nav:false
	        },
	        1000:{
	            items:5,
	            nav:true,
	            loop:false
	        }
	    }
	});

/*=====  End of Modify Resent Posts Widget  ======*/

/*===================================================
=            Add Class To Comment Button            =
===================================================*/

	//$('input.submit').addClass('btn btn-info');

	//$('td.product-remove a').html('<i class="icon-remove"></i>');

	//$("input[name='apply_coupon']").addClass('btn btn-info');

	//$("input[name='update_cart']").addClass('btn btn-primary');

	///$(".wc-proceed-to-checkout a").addClass('btn btn-primary');

	$(".woocomerce-form woocommerce-form-login .form-row input[type='submit']").addClass('btn btn-primary');

	$(".profile-container h2").hide();

/*=====  End of Add Class To Comment Button  ======*/

/*======================================================
=            Section Gallery Single Product            =
======================================================*/

	$('body').on('click', '.img_gallary_box img', function(event) {

		var thisLink = $(this).attr('src');

		var mainImage = $('#main_image_product_single');

		mainImage.attr('src', thisLink);

		event.preventDefault();
	});

/*=====  End of Section Gallery Single Product  ======*/

/*===============================================
=            Section Overlay Loading            =
===============================================*/

	$(window).ready(function () {

		$('body').css("overflow", "auto");
		$('.loading_overlay span').fadeOut(200, function() {

			$(this).parent().fadeOut(200, function () {

				$('.loading_overlay').remove();
			});
		});

	});

/*=====  End of Section Overlay Loading  ======*/

/*===============================================
=            Empty Content Box Posts            =
===============================================*/

	$('body').on('mouseleave', '.dropdown-menu', function(event) {

		$('.get-posts-in-menu').html('');

		event.preventDefault();
		/* Act on the event */
	});
	
/*=====  End of Empty Content Box Posts  ======*/

/*==============================================
=            Section Preload Imaegs            =
==============================================*/



/*=====  End of Section Preload Imaegs  ======*/

});
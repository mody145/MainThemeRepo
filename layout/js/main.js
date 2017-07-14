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

	$('.login-register.text-center p').on('click', 'a.header_login', function(event) {

		$('#js_login').ready(function() {
			$('#js_login #username').attr('placeholder', 'Type Your Username')
			$('#js_login #password').attr('placeholder', 'Type Your Password')
		});

		event.preventDefault();
		/* Act on the event */
	});

	$('.login-register.text-center p').on('click', 'a.header_signup', function(event) {

		$('#js_signup').ready(function() {
			$('#js_signup #reg_email_header').attr('placeholder', 'Type Your Register E-mail')
			$('#js_signup #reg_password_header').attr('placeholder', 'Type Your Register Password')
		});

		event.preventDefault();
		/* Act on the event */
	});

	$('p.woocommerce-form-row.woocommerce-form-row--wide.form-row.form-row-wide input#username').attr('placeholder', 'Type Your Username');
	$('p.woocommerce-form-row.woocommerce-form-row--wide.form-row.form-row-wide input#password').attr('placeholder', 'Type Your Password');

	$(".woocomerce-form woocommerce-form-login .form-row input[type='submit']").addClass('btn btn-primary');

	$(".profile-container h2").hide();

/*=====  End of Add Class To Comment Button  ======*/

/*======================================================
=            Section Gallery Single Product            =
======================================================*/

	$('body').on('click', '.img_gallary_box img', function(event) {

		var thisLink = $(this).attr('src');

		var mainImage = $('.main_image_product_single');

		mainImage.attr('src', thisLink);

		event.preventDefault();
	});

/*=====  End of Section Gallery Single Product  ======*/

/*============================================================
=            Section Zoom Image In Single Product            =
============================================================*/

$("#zoom_01").elevateZoom({
	gallery : "gallery_09",
	galleryActiveClass: "active"
	}); 


	$(".img_gallary_box img").click(function(e){
	var currentValue = $(this).attr('src');

	var smallImage = currentValue;
	var largeImage = currentValue;

	// Example of using Active Gallery
	$('#gallery_09 a').removeClass('active').eq(currentValue-1).addClass('active');		


	var ez =   $('#zoom_01').data('elevateZoom');	  

	ez.swaptheimage(smallImage, largeImage); 

});

/*=====  End of Section Zoom Image In Single Product  ======*/

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

/*================================================
=            On Click Currency Scroll            =
================================================*/

$('body').on('click', '.note-currency', function(event) {

		$('.click-here').remove();

		var body = $("body");
		body.animate({scrollTop:0}, 500, 'swing', function() { 
			$('.calc-total').append('<span class="click-here"><i class="icon-hand-o-left"></i></span>');
		});

		event.preventDefault();
		/* Act on the event */
	});

	$('.calc-total').hover(function() {
		$('.click-here').remove();
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});


/*=====  End of On Click Currency Scroll  ======*/

/*===============================================
=            Change Icon Pageination            =
===============================================*/

	$('.malinky-ajax-pagination-loading').html('<i class="fa fa-spinner fa-spin"></i>');

/*=====  End of Change Icon Pageination  ======*/



});
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


	$('.select_filter').select2({
		tags: "true",
		maximumSelectionLength: 5
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

		cursorcolor: 		color5,
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

	$('.carousel-one').owlCarousel({
	    loop:true,
	    margin:10,
	    dots:false,
	    nav:false,
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

/*====================================================
=            Spinner Loading With Counter            =
====================================================*/
	
	function startCounter() {

	  	$('.line_spinner10').css('width');
		var interval = setInterval(increment,80);
		var current = 0;
	  
		function increment(){
			current++;
			$('.line_spinner10').css('width',current+'%');
	    	$('.counter_spinner10').html(current+'%');
	    	
			if(current == 100) { current = 0; }
		}
	}

	//startCounter()

/*=====  End of Spinner Loading With Counter  ======*/

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

	$('.malinky-ajax-pagination-loading').css({
		opacity: '.9',
	    position: 'absolute',
		top: '-8',
		right: '-30',
	}).html('');

/*=====  End of Change Icon Pageination  ======*/

/*=================================================
=            Section Queck View Button            =
=================================================*/

	$('body').on('click', '#queck_view_button', function(event) {

		var that = $(this);
		var id = that.attr('data-id');
		var theWindow = $('.queck-view-window');
		var closeWindow = $('#close_wendow');
		var overlay = $('.fullscreen_overlay');
		var theContent = $('.the_content_queck_view');

		theWindow.fadeIn('200', function() {
			overlay.fadeIn(100);
			$(this).animate({
				width: '80%',
				opacity: '1'},

				600, function() {
					theWindow.animate({
						height: '80%'},

						600, function() {

						overlay.fadeIn(100);
						theContent.fadeIn(150);

						$.ajax({
							url: MyAjax.ajaxurl,
							type: 'POST',
							data: {id: id, action: 'queick_view_windows'},
							beforeSend: function() {
								$('.the_content_queck_view').prepend('<div class="loading_queck_view"><div class="spinner"></div></div>'); }
						})
						.done(function(data) {
							$('.the_content_queck_view').html(data);

						    $('#slider3').Thumbelina({
						        orientation:'vertical',         // Use vertical mode (default horizontal).
						        $bwdBut:$('#slider3 .top'),     // Selector to top button.
						        $fwdBut:$('#slider3 .bottom')   // Selector to bottom button.
						    });
						})
						.fail(function(response) {
							console.log(response);
						})
						.always(function() {
							console.log("complete");
						});

						closeWindow.click(function() {

							theContent.fadeOut(150);
							theWindow.animate({
								height: '0'},

								600, function() {
								theWindow.animate({
									width: '0',
									opacity: '0'},

									600, function() {
									overlay.fadeOut(200);
									theWindow.fadeOut(100);
									theContent.html('');
								});
							});;
						});
					});
			});
		});
		
		event.preventDefault();
		/* Act on the event */
	});

/*=====  End of Section Queck View Button  ======*/

/*================================================
=            Change Icons Filter Shop            =
================================================*/

	var orderingProduct_filter = $('#select2-order-container').parent().find('.select2-selection__arrow').find('b');
	var selectCategory_filter = $('#select2-category-container').parent().find('.select2-selection__arrow').find('b');
	var selectTags_filter = $('#select2-search-tag-container').parent().find('.select2-selection__arrow').find('b');

	orderingProduct_filter.replaceWith('<span class="ordering_product_icon"></span>');
	selectCategory_filter.replaceWith('<span class="filter_category_product_icon"></span>');
	selectTags_filter.replaceWith('<span class="filter_tags_product_icon"></span>');

/*=====  End of Change Icons Filter Shop  ======*/

/*========================================================
=            Modify Height Main Product Image            =
========================================================*/

	var heightInfoProduct = $('.meta_product').outerHeight();
	var heightGalleryProduct = $('.gallery-box').outerHeight();

	var mainImageHeight = (heightInfoProduct + heightGalleryProduct);

	$('.main_image_product').css('min-height', mainImageHeight);

/*=====  End of Modify Height Main Product Image  ======*/


});
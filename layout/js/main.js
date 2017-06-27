/* global $, console */

jQuery(document).ready(function($) {
	'use strict';

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

	// Run Bootstrap Carousel
	$('.carousel').carousel();

/*=====  End of Modify Resent Posts Widget  ======*/

/*===================================================
=            Add Class To Comment Button            =
===================================================*/

	var buttonSubmitComment = $('input.submit');

	buttonSubmitComment.addClass('btn btn-info');

/*=====  End of Add Class To Comment Button  ======*/



});
/* global $, console */

jQuery(document).ready(function($) {
	'use strict';

	// Masonry Item Width
	$('.grid-item').width(($('.parent').width() / 2) - 20);
	
	// Run Masonry
	$('.parent').masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: ($('.parent').width() / 2)
	});

/*==================================================
=            Modify Resent Posts Widget            =
==================================================*/

	var resentPosts = $('.resent-posts-class').parent('div').addClass('resent-posts-container');

	$(function() {
		$('.skitter-large').skitter({

			'dots': false,
			'numbers': true,

		});
	});

	$('.carousel').carousel();

/*=====  End of Modify Resent Posts Widget  ======*/

/*===================================================
=            Add Class To Comment Button            =
===================================================*/

	var buttonSubmitComment = $('input.submit');

	buttonSubmitComment.addClass('btn btn-info');

/*=====  End of Add Class To Comment Button  ======*/



});
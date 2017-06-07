/* global $, console */

jQuery(document).ready(function($) {
	'use strict';

/*==============================================
=            Creat Button To Upload 		   =
=          		(About As Widget)			   =
==============================================*/

	$('button#Author_Info_Image').on('click', function(e) {

		e.preventDefault();

		var imageUploader = wp.media({
			'title' 	: 'Upload Author Image',
			'button' 	: { 'Text' : 'Set The Image' },
			'multiple' 	: false
		});

		imageUploader.open();

		imageUploader.on('select', function() {

			var image 	= imageUploader.state().get('selection').first().toJSON();

			var link 	= image.url;

			$('input.image_er_link').val(link);

			$('.show_image img').attr('src', link);

		});
	});

/*=====  End of Creat Button To Upload  ======*/

/*==================================================
=            Upload Image About Us Page            =
==================================================*/

	$('button#upload_image_about_us_page').on('click', function(e) {

		e.preventDefault();

		var imageUploader = wp.media({
			'title' 	: 'Upload About Us Image',
			'button' 	: { 'Text' : 'Set The Image' },
			'multiple' 	: false
		});

		imageUploader.open();

		imageUploader.on('select', function() {

			var image 	= imageUploader.state().get('selection').first().toJSON();

			var link 	= image.url;

			$('input#image_about_us_hidden_input').val(link);

			$('#image_about_us_show').attr('src', link);

		});
	});

/*=====  End of Upload Image About Us Page  ======*/



});
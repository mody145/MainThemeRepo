/* global $, console */

jQuery(document).ready(function($) {
	'use strict';

/*==============================================
=            Creat Button To Upload 		   =
=          		(About As Widget)			   =
==============================================*/

	$('button#Author_Info_Image').on('click', function(e) {

		e.preventDefault();

		var that = $(this);

		var imageUploader = wp.media({
			'title' 	: 'Upload Author Image',
			'button' 	: { 'Text' : 'Set The Image' },
			'multiple' 	: false
		});

		imageUploader.open();

		imageUploader.on('select', function() {

			var image 	= imageUploader.state().get('selection').first().toJSON();

			var link 	= image.url;

			that.parent().find('input.image_er_link').val(link);

			that.parent().parent().find('.show_image img').attr('src', link);

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

/*==============================================
=            Creat Button To Upload 		   =
=          		(Header Images)				   =
==============================================*/

	var parentImage = $('.show_header_images');

	$('button#header_Image').on('click', function(e) {

		e.preventDefault();

		var that = $(this);

		var imageUploader = wp.media({
			'title' 	: 'Upload Header Images',
			'button' 	: { 'Text' : 'Set The Images' },
			'multiple' 	: true
		});

		imageUploader.open();

		imageUploader.on('select', function() {

			var image   = imageUploader.state().get('selection').toJSON();

			var link 	= [];

			parentImage.html('');

            for (var i = image.length - 1; i >= 0; i--) {

                link[link.length] = image[i]['url'];
                parentImage.append('<img src="' + image[i]['url'] + '" />');
            }

            var st = link.toString();

            $('input.header_image_er_link').val(st);

		});
	});

/*=====  End of Creat Button To Upload  ======*/



});
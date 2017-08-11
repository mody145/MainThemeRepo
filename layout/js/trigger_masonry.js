/* global $, console */
jQuery(document).ready(function($) {
	'use strict';

	var windowWidth = $(window).width(); console.log(windowWidth);
	var columnWidthShop = 3;
	// For Tablet Screen
	if (windowWidth <= 850) {

		var columnWidthShop = 2;
	}
	// For Mobile Screen
	if (windowWidth <= 767) {

		var columnWidthShop = 1;
	}
	
	var msnry = new Masonry('.grid-shop-products',{
	itemSelector: '.grid-item-shop',
	columnWidth: ($('.grid').width() / columnWidthShop)
	}); 

	setInterval(function(){
	msnry.reloadItems();
	msnry.layout();
	},500);	
	console.log('Masonry Add');

});
/* global $, console */
jQuery(document).ready(function($) {
	'use strict';
	
	var msnry = new Masonry('.grid-shop-products',{
	itemSelector: '.grid-item-shop',
	columnWidth: ($('.grid').width() / 3)
	}); 

	setInterval(function(){
	msnry.reloadItems();
	msnry.layout();
	},500);	
	console.log('Masonry Add');
});
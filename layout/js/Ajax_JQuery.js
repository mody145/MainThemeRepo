/*global $, jQuery, alert, console*/

jQuery(document).ready(function($) {
	
	"use strict";

	/*===========================================
	=            Section Filter Shop            =
	===========================================*/
	
	$('form#filter_shop').submit(function (event) {

		event.preventDefault();
	});	

	// Sorting Order By
	$('select#order').on("change", function () {

		var orderBy = $(this).val();
		var order = $(this).find(':selected').attr('data-order');
		
		if (orderBy == '') {
			// Hide Main Container And Show If Filter
			$('.parent-shop').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop').hide(200);
			$('.shop-pagination').hide(200);
		}
		// Start Send Data By Ajax
		$.ajax($('form#filter_shop').attr("action"), { data: {orderBy : orderBy, order : order },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<i class="icon-magnifier"></i>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});

	// Sorting By Categories
	$('select#category').on("change", function () {

		var category = $(this).val();
		
		if (category == '') {
			
			$('.parent-shop').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop').hide(200);
			$('.shop-pagination').hide(200);
		}
		// Start Send Data By Ajax
		$.ajax($('form#filter_shop').attr("action"), { data: {category : category},

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<i class="icon-magnifier"></i>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});
	// Search By Tag Name
	$('input#search-tag').on("keyup", function () {

		var tag = $(this).val();
		
		if (tag == '') {
			
			$('.parent-shop').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop').hide(200);
			$('.shop-pagination').hide(200);
		}
		// Start Send Data By Ajax
		$.ajax($('form#filter_shop').attr("action"), { data: {tag : tag},

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<i class="icon-magnifier"></i>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});	
	// Search By Product Name
	$('input#search-name').on("keyup", function () {

		var name = $(this).val();
		
		if (name == '') {
			
			$('.parent-shop').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop').hide(200);
			$('.shop-pagination').hide(200);
		}
		// Start Send Data By Ajax
		$.ajax($('form#filter_shop').attr("action"), { data: {name : name},

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<i class="icon-magnifier"></i>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});	

	// Search By Product Name
	$('input#price-from, input#price-to').on("keyup", function () {

		var price_from = 0;
		var price_to = 0;

		if (price_from !== '') { price_from = $('input#price-from').val(); }
		if (price_to !== '') { price_to = $('input#price-to').val(); }
		
		if (price_from == '' && price_to == '') {
			
			$('.parent-shop').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop').hide(200);
			$('.shop-pagination').hide(200);
		}
		// Start Send Data By Ajax
		$.ajax($('form#filter_shop').attr("action"), { data: {price_from : price_from, price_to : price_to},

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<i class="icon-magnifier"></i>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});		
	
	/*=====  End of Section Filter Shop  ======*/
	

});
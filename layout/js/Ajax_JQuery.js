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
			$('.parent-shop-container').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop-container').hide(200);
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
			
			$('.parent-shop-container').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop-container').hide(200);
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
			
			$('.parent-shop-container').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop-container').hide(200);
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
			
			$('.parent-shop-container').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop-container').hide(200);
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
			
			$('.parent-shop-container').fadeIn(200);
			$('.shop-pagination').fadeIn(200);
		} else {
			
			$('.parent-shop-container').hide(200);
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

	/*===========================================
	=            Section Add To Follow          =
	===========================================*/
	
	$('h3').on('click', '.follow', function(e) {

		var id = $(this).attr('data-id');
		var addUrl = $('#follow').attr('data-add');
		var removeUrl = $('#follow').attr('data-remove');
		
		$.post(addUrl, {id : id}, function (data) {

			$('#items-whitelist').html(data);

		})
		
			.done(function (d) {

				$('#follow').html("<i id='follow_icon' class='icon-heart6'></i>");
				$('#follow').removeClass('follow').addClass('unfollow');
				$('#follow').attr('id', 'unfollow');
				$('#follow_icon').css('color', '#6a67ce');
			})
		
		e.preventDefault();
	});
	
	/*=====  End of Section Add To Follow  ======*/
	
	/*===============================================
	=            Section Remove Folloing            =
	===============================================*/
	
	$('h3').on('click', '.unfollow', function(e) {

		var id = $(this).attr('data-id');
		var addUrl = $('#unfollow').attr('data-add');
		var removeUrl = $('#unfollow').attr('data-remove');
		
		$.post(removeUrl, {id : id}, function (data) {

			$('#items-whitelist').html(data);

		})
		
			.done(function (d) {

				$('#unfollow').html("<i id='follow_icon' class='icon-heart5'></i>");
				$('#unfollow').removeClass('unfollow').addClass('follow');
				$('#unfollow').attr('id', 'follow');
				$('i#follow_icon').css({color: '#777'});
			})

		e.preventDefault();
	});
	
	
	/*=====  End of Section Remove Folloing  ======*/

	/*=============================================
	=            Section Add To Cart             =
	=============================================*/
	
	$('#add_to_cart_shop').on('click', function(event) {

		var Url = $(this).attr('data-link');
		var id = $(this).attr('data-id');

		$.post(Url, {id : id}, function (data) {

			$('#items-cart').html(data);
			console.log(data);

		})
		
			.done(function (d) {

				$('.add-to-cart-container-false h3').html('<i id="cart_icon" class="icon-cart-arrow-down"></i>');
				$('#cart_icon').css({color: '#6a67ce'});
			})
		
		event.preventDefault();
	});
	
	/*=====  End of Section Add To Cart   ======*/

	/*===============================================
	=            Section Empty WhiteList            =
	===============================================*/
	
	$('.empty_white_list').on('click', function(event) {

		var Url = $('.empty_white_list a').attr('href');
		console.log(Url);

		$.ajax({
			url: Url,
			type: 'POST',
			data: {param1: 'value1'},
		})
		.done(function(data) {
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

		event.preventDefault();
		/* Act on the event */
	});
	
	/*=====  End of Section Empty WhiteList  ======*/

	/*========================================================
	=            Section Add To Cart ( Archive )             =
	========================================================*/
	
	$('body').on('click', '#add_to_cart_shop_archive', function(event) {

		var Url = $(this).attr('data-link');
		var id = $(this).attr('data-id');
		var itemParent = $(this).parent();
		var parentOverLay = itemParent.parent().parent().parent().find('#parent_overlay');

		$.post(Url, {id : id}, function (data) {

			$('#items-cart').html(data);

		})
		
			.done(function (d) {

				itemParent.hide(100);
				parentOverLay.append('<div class="overlay"> <i class="icon-cart-arrow-down"></i> </div>')
				//console.log(overLay);
			})
		
		event.preventDefault();
	});
	
	/*=====  End of Section Add To Cart ( Archive )   ======*/

	/*=======================================================
	=            Section Add To Follow ( Archive )          =
	=======================================================*/
	
	$('h3').on('click', '.follow_archive', function(e) {

		var id = $(this).attr('data-id');
		var addUrl = $(this).attr('data-add');

		var thisItem = $(this);
		
		$.post(addUrl, {id : id}, function (data) {

			$('#items-whitelist').html(data);

		})
		
			.done(function (d) {

				thisItem.html("<i id='follow_icon' class='icon-heart6'></i>");
				thisItem.removeClass('follow_archive').addClass('unfollow_archive');
				thisItem.attr('id', 'unfollow');
				thisItem.find('#follow_icon').css('color', '#6a67ce');
			})
		
		e.preventDefault();
	});
	
	/*=====  End of Section Add To Follow ( Archive )  ======*/
	
	/*===========================================================
	=            Section Remove Folloing ( Archive )            =
	===========================================================*/
	
	$('h3').on('click', '.unfollow_archive', function(e) {

		var id = $(this).attr('data-id');
		var removeUrl = $(this).attr('data-remove');

		var thisItem = $(this);

		$.post(removeUrl, {id : id}, function (data) {

			$('#items-whitelist').html(data);

		})
		
			.done(function (d) {

				thisItem.html("<i id='follow_icon' class='icon-heart5'></i>");
				thisItem.removeClass('unfollow_archive').addClass('follow_archive');
				thisItem.attr('id', 'follow');
				thisItem.find('#follow_icon').css({color: '#777'});
			})

		e.preventDefault();
	});
	
	
	/*=====  End of Section Remove Folloing ( Archive )  ======*/

	/*==============================================================
	=            Section Add Like Button To ( Arshive )            =
	==============================================================*/
	
	$('body').on('click', '#like', function(e) {

		var id = $(this).attr('data-id');
		var addUrl = $(this).attr('data-add');
		var removeUrl = $(this).attr('data-remove');
		var thisItem = $(this);
		var result = thisItem.parent().parent().find('.likes-count');
		
		$.post(addUrl, {id : id}, function (data) {

			result.html(data);

		})
		
			.done(function (d) {

				thisItem.html("<i id='unlike_icon' class='icon-check'></i>");
				thisItem.attr('id', 'unlike');
			})
		
		e.preventDefault();
	});

	/*=====  End of Section Add Like Button To ( Arshive )  ======*/

	/*================================================================
	=            Section Add UnLike Button To ( Arshive )            =
	================================================================*/
	
	$('body').on('click', '#unlike', function(e) {

		var id = $(this).attr('data-id');
		var addUrl = $(this).attr('data-add');
		var removeUrl = $(this).attr('data-remove');
		var thisItem = $(this);
		var result = thisItem.parent().parent().find('.likes-count');
		
		$.post(removeUrl, {id : id}, function (data) {

			result.html(data);

		})
		
			.done(function (d) {

				thisItem.html("<i id='like_icon' class='icon-thumbs-up'></i>");
				thisItem.attr('id', 'like');
			})
		
		e.preventDefault();
	});

	/*=====  End of Section Add UnLike Button To ( Arshive )  ======*/	


	

});
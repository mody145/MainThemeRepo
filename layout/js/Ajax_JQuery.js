/*global $, jQuery, alert, console*/

jQuery(document).ready(function($) {
	
	"use strict";

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
		
		$('.parent-shop-container').remove();

		// Start Send Data By Ajax
		$.ajax(MyAjax.ajaxurl, { data: {orderBy : orderBy, order : order, action: 'sorting_by_date' },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<div class="parent-spinners"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

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
		
		$('.parent-shop-container').remove();

		// Start Send Data By Ajax
		$.ajax(MyAjax.ajaxurl, { data: {category : category, action: 'sorting_by_category' },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<div class="parent-spinners"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
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
		
		$('.parent-shop-container').remove();

		// Start Send Data By Ajax
		$.ajax(MyAjax.ajaxurl, { data: {tag : tag, action: 'sorting_by_tag_name' },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<div class="parent-spinners"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
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
		
		$('.parent-shop-container').remove();

		// Start Send Data By Ajax
		$.ajax(MyAjax.ajaxurl, { data: {name : name, action: 'sorting_by_product_name' },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<div class="parent-spinners"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			},
			error: function() {
				alert("Some Thing Error"); 
			},
			success: function(data) {
				$('.result_search_shop').html(data);    
			}
		});

	});	

	// Search By Product Price
	$('input#price-from, input#price-to').on("keyup", function () {

		var price_from = 0;
		var price_to = 0;

		if (price_from !== '') { price_from = $('input#price-from').val(); }
		if (price_to !== '') { price_to = $('input#price-to').val(); }
		
		$('.parent-shop-container').remove();

		// Start Send Data By Ajax
		$.ajax(MyAjax.ajaxurl, { data: {price_from : price_from, price_to : price_to, action: 'sorting_by_product_price_range' },

			type: "POST",
			beforeSend: function() {
				$('.result_search_shop').html('<div class="parent-spinners"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
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
		var that = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'add_follow'},
			beforeSend: function() {
				that.html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
			}
		})
		.done(function(data) {

			$('#items-whitelist').html(data);

			$('#follow').html("<i id='follow_icon' class='icon-heart8'></i>");
			$('#follow').removeClass('follow').addClass('unfollow');
			$('#follow').attr('id', 'unfollow');
			$('#follow_icon').css('color', color10);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		e.preventDefault();
	});
	
	/*=====  End of Section Add To Follow  ======*/
	
	/*===============================================
	=            Section Remove Folloing            =
	===============================================*/
	
	$('h3').on('click', '.unfollow', function(e) {

		var id = $(this).attr('data-id');
		var that = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'remove_follow'},
			beforeSend: function() {
				that.html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
			}
		})
		.done(function(data) {
			$('#items-whitelist').html(data);

			$('#unfollow').html("<i id='follow_icon' class='icon-heart-o'></i>");
			$('#unfollow').removeClass('unfollow').addClass('follow');
			$('#unfollow').attr('id', 'follow');
			$('i#follow_icon').css({color: color10});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log(Url);
		});

		e.preventDefault();
	});
	
	
	/*=====  End of Section Remove Folloing  ======*/

	/*=============================================
	=            Section Add To Cart             =
	=============================================*/
	
	$('#add_to_cart_shop').on('click', function(event) {

		var id = $(this).attr('data-id');
		var that = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'add_to_cart_single_post'},
			beforeSend: function() {
				that.html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
			}
		})
		.done(function(data) {
			$('#items-cart').html(data);

			$('.add-to-cart-container-false h3').html('<i id="cart_icon" class="icon-shopping-bag"></i>');
			$('#cart_icon').css({color: color10});

			var updateLink = $('#update_total_cart').attr('data-link');
			var oldResult = $('.total-number');

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'GET',
				dataType: 'html',
				data: {action: 'updata_cart_in_header'},
				beforeSend: function() {
					oldResult.html('<i class="fa fa-spinner fa-spin"></i>');
				}
			})
			.done(function(data) {
				oldResult.html(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		event.preventDefault();
	});
	
	/*=====  End of Section Add To Cart   ======*/

	/*===============================================
	=            Section Empty WhiteList            =
	===============================================*/
	
	$('.empty_white_list').on('click', function(event) {

		var thisElement = $(this);
		var that = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {param1: 'value1', action: 'empty_whitelist'},
			beforeSend: function() {
				that.html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');
			}
		})
		.done(function(data) {
			$('.parent-follow-page table').slideUp(150);
			thisElement.hide(100);
			$('.parent-follow-page').prepend('<h3 class="text-center"><i class="icon-close"></i>&nbsp; You List Is Empty &nbsp;<i class="icon-sad"></i></h3>')
			$('#items-whitelist').html(0);

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

		var id = $(this).attr('data-id');
		var itemParent = $(this).parent();
		var parentOverLay = itemParent.parent().parent().parent().find('#parent_overlay');
		var that = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'add_to_cart_single_post'},
			beforeSend: function() {
				that.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			$('#items-cart').html(data);

			itemParent.hide(100);
			parentOverLay.append('<div class="overlay"> <i class="icon-shopping-bag"></i> </div>');

			var updateLink = $('#update_total_cart').attr('data-link');
			var oldResult = $('.total-number');

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'GET',
				dataType: 'html',
				data: {action: 'updata_cart_in_header'},
				beforeSend: function() {
					oldResult.html('<i class="fa fa-spinner fa-spin"></i>');
				}
			})
			.done(function(data) {
				oldResult.html(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		
		event.preventDefault();
	});
	
	/*=====  End of Section Add To Cart ( Archive )   ======*/

	/*=======================================================
	=            Section Add To Follow ( Archive )          =
	=======================================================*/
	
	$('h3').on('click', 'a.follow_archive', function(e) {

		var id = $(this).attr('data-id');
		var thisItem = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'add_follow'},
			beforeSend: function() {
				thisItem.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {

			$('#items-whitelist').html(data);

			thisItem.html("<i id='follow_icon' class='icon-heart8'></i>");
			thisItem.removeClass('follow_archive').addClass('unfollow_archive');
			thisItem.attr('id', 'unfollow');
			thisItem.find('#follow_icon').css('color', color10);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		e.preventDefault();
	});
	
	/*=====  End of Section Add To Follow ( Archive )  ======*/
	
	/*===========================================================
	=            Section Remove Folloing ( Archive )            =
	===========================================================*/
	
	$('h3').on('click', 'a.unfollow_archive', function(e) {

		var id = $(this).attr('data-id');
		var thisItem = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'remove_follow'},
			beforeSend: function() {
				thisItem.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			$('#items-whitelist').html(data);

			thisItem.html("<i id='follow_icon' class='icon-heart-o'></i>");
			thisItem.removeClass('unfollow_archive').addClass('follow_archive');
			thisItem.attr('id', 'follow');
			thisItem.find('#follow_icon').css({color: color10});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});
	
	
	/*=====  End of Section Remove Folloing ( Archive )  ======*/

	/*==============================================================
	=            Section Add Like Button To ( Arshive )            =
	==============================================================*/
	
	$('body').on('click', '#like', function(e) {

		var id = $(this).attr('data-id');
		var thisItem = $(this);
		var result = thisItem.parent().parent().find('.likes-count');

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'like_product'},
			beforeSend: function() {
				thisItem.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			result.html(data);

			thisItem.html("<i id='unlike_icon' class='icon-check'></i>");
			thisItem.attr('id', 'unlike');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		
		e.preventDefault();
	});

	/*=====  End of Section Add Like Button To ( Arshive )  ======*/

	/*================================================================
	=            Section Add UnLike Button To ( Arshive )            =
	================================================================*/
	
	$('body').on('click', '#unlike', function(e) {

		var id = $(this).attr('data-id');
		var thisItem = $(this);
		var result = thisItem.parent().parent().find('.likes-count');

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'unlike_product'},
			beforeSend: function() {
				thisItem.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			result.html(data);

			thisItem.html("<i id='like_icon' class='icon-thumbs-o-up'></i>");
			thisItem.attr('id', 'like');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		
		e.preventDefault();
	});

	/*=====  End of Section Add UnLike Button To ( Arshive )  ======*/	

	/*===============================================================
	=            Section Add To Cart From Page WhiteList            =
	===============================================================*/
	
	$('.add_to_cart_from_whitelist_page').on('click', function(event) {

		var id = $(this).attr('data-id'); 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'add_to_cart_single_post'},
			beforeSend: function() {
				thisElement.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			$('#items-cart').html(data);

			thisElement.replaceWith('<button disabled="disabled" class="btn btn-success btn-sm"><i class="icon-check3"></i>&nbsp;In Cart</button>');

			var updateLink = $('#update_total_cart').attr('data-link');
			var oldResult = $('.total-number');

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'GET',
				dataType: 'html',
				data: {action: 'updata_cart_in_header'},
				beforeSend: function() {
					oldResult.html('<i class="fa fa-spinner fa-spin"></i>');
				}
			})
			.done(function(data) {
				oldResult.html(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		event.preventDefault();
	});
	
	/*=====  End of Section Add To Cart From Page WhiteList  ======*/

	/*==============================================================================
	=            Section Remove Folloing ( Archive ) From WhiteList Page           =
	==============================================================================*/
	
	$('body').on('click', '.remove_from_whitelist_page', function(e) {

		var id = $(this).attr('data-id');
		var thisItem = $(this);
		var parentTd = thisItem.parent().parent(); 

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {id : id, action: 'remove_follow'},
			beforeSend: function() {
				thisItem.html('<i class="fa fa-spinner fa-spin"></i>');
			}
		})
		.done(function(data) {
			$('#items-whitelist').html(data);

			parentTd.css('background-color', color1);
			parentTd.hide(400);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

		e.preventDefault();
	});
	
	
	/*=====  End of Section Remove Folloing ( Archive ) From WhiteList Page ======*/

	/*========================================================
	=            Section GrigImages In Index Page            =
	========================================================*/
	
	$('body').on('click', '#by_rating', function(e) {

		var rating = 'rating';
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {rating: rating, action: 'sorting_grid_images_box'},
			beforeSend: function() {
				$('.grid-images').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.grid-images').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#by_like', function(e) {

		var like = 'like'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {like: like, action: 'sorting_grid_images_box'},
			beforeSend: function() {
				$('.grid-images').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.grid-images').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#by_views', function(e) {

		var views = 'views'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {views: views, action: 'sorting_grid_images_box'},
			beforeSend: function() {
				$('.grid-images').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.grid-images').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#by_comments', function(e) {

		var comments = 'comments'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {comments: comments, action: 'sorting_grid_images_box'},
			beforeSend: function() {
				$('.grid-images').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.grid-images').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color1
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#rand', function(e) {

		var rand = 'rand'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {rand: rand, action: 'sorting_grid_images_box'},
			beforeSend: function() {
				$('.grid-images').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.grid-images').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});
	
	/*=====  End of Section GrigImages In Index Page  ======*/

	/*==================================================
	=            Calc Value Cart By Country            =
	==================================================*/
	
	$('.convert').on('change', function () {

		var Country_Currency = $(this).val();
		var	price_All = $('.total-number').text();

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {Country_Currency : Country_Currency, price_All : price_All, action: 'calc_all_value_cart'},
			beforeSend: function() {
				$('.convert_result').html('<i class="fa fa-spinner fa-pulse"></i>'); }
		})
		.done(function(data) {
			$('.convert_result').html(data);
			var note = $('.note-currency');
			var price = $('.note-currency').attr('data-price');

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'GET',
				dataType: 'html',
				data: {Country_Currency : Country_Currency, price : price, action: 'get_price_by_currency'},
				beforeSend: function() {
				note.html('<i class="fa fa-spinner fa-pulse"></i>'); }
			})
			.done(function(data) {
				note.html(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			

		})
		.fail(function(response) {
			alert(response);
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	
	/*=====  End of Calc Value Cart By Country  ======*/
	
	/*======================================================
	=            Calc Cart Value By Save COOKIE            =
	======================================================*/
	
	$('body').on('click', '#save_country', function(event) {

		var country = $(this).attr('data-country');

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {country: country, action: 'calc_all_value_cart'},
			beforeSend: function() {
				$('.convert_result').html('<i class="fa fa-spinner fa-pulse"></i>');
			}
		})
		.done(function(data) {
			$('.convert_result').html(data);
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
	
	/*=====  End of Calc Cart Value By Save COOKIE  ======*/

	/*======================================================
	=            Section Pagination Filter Shop            =
	======================================================*/

	/* --|| Start Read More Button ||-- */

	$('body').on('click', '.show-more-products', function(event) {

		var orderBy = $('select#order').val();
		var order = $('select#order').find(':selected').attr('data-order');

		var that 	= $(this);
		var page 	= that.data('page');
		var newPage = page+1;
		var Url 	= that.data('link'); 

		$.ajax({
			url: Url,
			type: 'POST',
			data: {orderBy : orderBy, order : order, page: page, action: 'sorting_by_date'},
		})
		.done(function(data) {
			$('.load-more-container').before(data);
			that.data('page', newPage);
			console.log('orderBy: ' + orderBy);
			console.log('order: ' + order);
		})
		.fail(function(response) {
			console.log(response);
		})
		.always(function() {
			console.log("complete");
		});
		

		event.preventDefault();

	});

	/* --|| End Of Read More Button ||-- */
	
	/*=====  End of Section Pagination Filter Shop  ======*/	
	
	/*======================================================
	=            Section Search From Fullscreen            =
	======================================================*/

	$('body').on('click', '.search-in-header', function(event) {

		var elementForm = $('.search_fullscrean');

		var closeSearch = $('.close-search');

		elementForm.fadeIn(400);
		$('#search-text').focus();

		closeSearch.click(function() {

			elementForm.fadeOut(400);
			/* Act on the event */
		});

		$('.full_screen_search').on('submit', function(event) {

			var search = $('#search-text').val();
			var catORpost = $("input[checked='checked']").attr('id');
			var product_post = $('input[name="product_post"]:checked').val();

			var dataForm = $(this).serialize();

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'POST',
				data: dataForm,
				beforeSend: function() {
					$('.results_search').html('<i class="fa fa-spinner fa-pulse fa-2x"></i>');
				}
			})
			.done(function(data) {
				$('.results_search').html(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

			event.preventDefault();
			
		});

		event.preventDefault();
		/* Act on the event */
	});

	/*=====  End of Section Search From Fullscreen  ======*/

	/*======================================================
	=            Toggle Dropdown View Cart Box             =
	======================================================*/
		
		$('body').on('mouseenter', '#update_total_cart', function(event) {

			var box = $('span.show-value-box-dropdown');
			var Url = box.attr('data-link');

			$.ajax({
				url: MyAjax.ajaxurl,
				type: 'GET',
				dataType: 'html',
				data: {action : 'view_products_in_cart'},
				beforeSend: function() {
					box.html('<i class="fa fa-spinner fa-pulse fa-2x"></i>');
				}
			})
			.done(function(data) {
				box.html(data);
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

	/*=====  End of Toggle Dropdown View Cart Box   ======*/

	/*========================================================
	=            Section GrigIPosts In Index Page            =
	========================================================*/
	
	$('body').on('click', '#sorting_posts_by_latest', function(e) {

		var latest = 'latest';
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {latest: latest, action: 'sorting_grid_bosts_in_blog_box'},
			beforeSend: function() {
				$('.services-container-box').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.services-container-box').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#sorting_posts_by_like', function(e) {

		var like = 'like'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {like: like, action: 'sorting_grid_bosts_in_blog_box'},
			beforeSend: function() {
				$('.services-container-box').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.services-container-box').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#sorting_posts_by_views', function(e) {

		var views = 'views'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {views: views, action: 'sorting_grid_bosts_in_blog_box'},
			beforeSend: function() {
				$('.services-container-box').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.services-container-box').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#sorting_posts_by_comments', function(e) {

		var comments = 'comments'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {comments: comments, action: 'sorting_grid_bosts_in_blog_box'},
			beforeSend: function() {
				$('.services-container-box').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.services-container-box').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color1
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});

	$('body').on('click', '#sorting_posts_rand', function(e) {

		var rand = 'rand'; 
		var thisElement = $(this);

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {rand: rand, action: 'sorting_grid_bosts_in_blog_box'},
			beforeSend: function() {
				$('.services-container-box').prepend('<span class="overlay"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			$('.services-container-box').html(data);
			thisElement.siblings('span').css({
				backgroundColor: color1,
				color: '#696767'
			});
			thisElement.css({
				backgroundColor: blue,
				color: color2
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		e.preventDefault();
	});
	
	/*=====  End of Section GrigPosts In Index Page  ======*/

	/*========================================================
	=            Section Box Posts In Header Menu            =
	========================================================*/

	var menu = $('#menu-headermenu').has('.dropdown-menu');

	var dropDown = menu.find('.dropdown-menu');

	dropDown.append('<div class="get-posts-in-menu"></div>');

	var dropDownMenu = $('#menu-headermenu').has('.dropdown-menu').find('.dropdown-menu');

	// When Mouse On Category
	$(dropDownMenu).on('mouseenter', 'li', function(event) {

		var linkCategory = $(this).find('a').attr('href');

		var boxResult = $('.get-posts-in-menu');

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {linkCategory: linkCategory, action: 'get_posts_by_category_in_header_menu'},
			beforeSend: function() {
				boxResult.prepend('<span class="ovlay-loading"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>'); }
		})
		.done(function(data) {
			boxResult.html(data);
			$('.post-image-box').removeClass('preload');
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
	
	/*=====  End of Section Box Posts In Header Menu  ======*/

	/*=====================================================
	=            Section Remove COOKIE Country            =
	=====================================================*/
	
	$('body').on('click', '#remove_cookie', function(event) {

		var thisElement = $(this);
		var calcButton = $('#save_country');

		$.ajax({
			url: MyAjax.ajaxurl,
			type: 'POST',
			data: {param1: 'value1', action: 'remove_cookie_country'},
			beforeSend: function() {
				thisElement.prepend('<i class="fa fa-spinner fa-pulse"></i>'); }
		})
		.done(function(data) {
			console.log(data);

			thisElement.hide(100);
			calcButton.hide(100);
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
	
	/*=====  End of Section Remove COOKIE Country  ======*/
	

});
jQuery(document).ready(function(e){"use strict";(new WOW).init();e(".color1").css("background-color"),e(".color2").css("background-color"),e(".color3").css("background-color"),e(".color4").css("background-color"),e(".color5").css("background-color"),e(".color6").css("background-color"),e(".color7").css("background-color"),e(".color8").css("background-color"),e(".color9").css("background-color"),e(".color10").css("background-color"),e(".infoColor").css("background-color"),e(".green").css("background-color"),e(".blue").css("background-color");try{e(".carousel-one").owlCarousel({loop:!0,margin:10,dots:!1,nav:!1,responsiveClass:!0,responsive:{0:{items:1,nav:!0},600:{items:3,nav:!1},1e3:{items:5,nav:!0,loop:!1}}})}catch(e){console.log(e)}try{var o=e("#typed").attr("link-data").split(",",10);new Typed("#typed",{strings:o,typeSpeed:100,loop:!0,loopCount:1/0,fadeOut:!0})}catch(e){console.log(e)}try{e(".skitter-large-for-header").skitter({navigation:!0,dots:!1,with_animations:["cube","cubeRandom","block","cubeStop","cubeStopRandom","cubeHide","cubeSize","horizontal","showBars","showBarsRandom","tube","fade","fadeFour","paralell","blind","blindHeight","blindWidth","directionTop","directionBottom","directionRight","directionLeft","cubeSpread","glassCube","glassBlock","circles","circlesInside","circlesRotate","cubeShow","upBars","downBars","hideBars","swapBars","swapBarsBack","swapBlocks","cut"],label_animation:"fixed"})}catch(e){console.log(e)}try{e(".select_filter").select2({tags:"true",maximumSelectionLength:5})}catch(e){console.log(e)}try{e(".skitter-large").skitter({dots:!1,numbers:!0,label:!0,controls:!0,hide_tools:!0,with_animations:["fade"],theme:"clean"})}catch(e){console.log(e)}try{var t=e(".colormainScroll").data("color");console.log(t),e("html").niceScroll({cursorcolor:t,cursorwidth:"10px",cursorborder:"0",cursorborderradius:"1px",cursoropacitymin:"0.1",zindex:"999999"})}catch(e){console.log(e)}e(function(){e('[data-toggle="tooltip"]').tooltip()}),e(".carousel").carousel(),e("input").attr("autocomplete","off"),e("span.gradiant_overlay").parent().css({position:"relative"}),e(".latest-posts-blog-widget").find(".gradiant_overlay").parent().css({position:"relative",display:"block"});try{var a=e(".container_image_closest_sale").attr("data-saleTo");e("#clock").countdown(a,function(o){e(this).html(o.strftime("<span>%w <sub>weeks</sub></span> <span>%d <sub>days</sub></span> <span>%H <sub>hr</sub></span> <span>%M <sub>min</sub></span> <span>%S <sub>sec</sub></span>"))})}catch(e){console.log(e)}e(".login-register.text-center p").on("click","a.header_login",function(o){e("#js_login").ready(function(){e("#js_login #username").attr("placeholder","Type Your Username"),e("#js_login #password").attr("placeholder","Type Your Password"),e("#login_data").find("h2").text("Login"),e("#login_data").find(".js_login_log").attr("value","Login")}),o.preventDefault()}),e(".login-register.text-center p").on("click","a.header_signup",function(o){e("#js_signup").ready(function(){e("#js_signup #reg_email_header").attr("placeholder","Type Your Register E-mail"),e("#js_signup #reg_password_header").attr("placeholder","Type Your Register Password")}),o.preventDefault()}),e("p.woocommerce-form-row.woocommerce-form-row--wide.form-row.form-row-wide input#username").attr("placeholder","Type Your Username"),e("p.woocommerce-form-row.woocommerce-form-row--wide.form-row.form-row-wide input#password").attr("placeholder","Type Your Password"),e(".woocomerce-form woocommerce-form-login .form-row input[type='submit']").addClass("btn btn-primary"),e(".profile-container h2").hide(),e("body").on("click",".img_gallary_box img",function(o){var t=e(this).attr("src");e(".main_image_product_single").attr("src",t),o.preventDefault()});try{e("#zoom_01").elevateZoom({gallery:"gallery_09",galleryActiveClass:"active"}),e(".img_gallary_box img").click(function(o){var t=e(this).attr("src"),a=t,r=t;e("#gallery_09 a").removeClass("active").eq(t-1).addClass("active");e("#zoom_01").data("elevateZoom").swaptheimage(a,r)})}catch(e){console.log(e)}e(window).ready(function(){e("body").css("overflow","auto"),e(".loading_overlay .custom-loader").fadeOut(200,function(){e(this).parent().fadeOut(200,function(){e(".loading_overlay").remove()})})}),e("body").on("mouseleave",".dropdown-menu",function(o){e(".get-posts-in-menu").html(""),o.preventDefault()}),e("body").on("click",".note-currency",function(o){e(".click-here").remove(),e(".fullscreen_overlay").hide(400).delay(600).remove(),e(".queck-view-window").hide(400).delay(600).remove();var t=e("html");e(".total-cart").css("z-index","1001"),e(".fullscreen-overlay").fadeIn(200),t.animate({scrollTop:0},500,"swing",function(){e(".calc-total i").removeClass("no-after"),e("body").append('<style>.total-cart span.calc-total i:after { content: "\\f077"; font-family: "icomoon" !important; position: absolute; bottom: -32px; left: 50%; transform: translate(-50%); font-size: 25px; color: var(--color4); animation: 1s linear 0s infinite alternate clickHere; }</style>')}),o.preventDefault()}),e(".calc-total").hover(function(){e(".calc-total i").addClass("no-after"),e(".fullscreen-overlay").fadeOut(200),e(".total-cart").css("z-index","100")},function(){}),e(".malinky-ajax-pagination-loading").css({opacity:".9",position:"absolute",top:"-8",right:"-30"}).html(""),e("body").on("click","#queck_view_button",function(o){var t=e(this).attr("data-id");e("body").prepend('<div class="queck-view-window"></div>'),e(".queck-view-window").prepend('<i id="close_wendow" class="icon-close"></i>'),e(".queck-view-window").append('<div class="the_content_queck_view"></div>'),e(".queck-view-window").before('<div class="fullscreen_overlay"></div>');var a=e(".queck-view-window"),r=e("#close_wendow"),n=e(".the_content_queck_view"),i=e(".fullscreen_overlay");a.fadeIn("200",function(){i.fadeIn(100),e(this).animate({width:"80%",opacity:"1"},600,function(){a.animate({height:"80%"},600,function(){i.fadeIn(100),n.fadeIn(150),e.ajax({url:MyAjax.ajaxurl,type:"POST",data:{id:t,action:"queick_view_windows"},beforeSend:function(){n.prepend('<div class="loading_queck_view"><div class="spinner"></div></div>')}}).done(function(o){n.css("display","none"),n.fadeIn(500),n.html(o),a.niceScroll(n,{cursorborder:0,autohidemode:!1,cursorcolor:"#555",railpadding:{top:5,right:5,left:5,bottom:5}}),e("#slider3").Thumbelina({orientation:"vertical",$bwdBut:e("#slider3 .top"),$fwdBut:e("#slider3 .bottom")})}).fail(function(e){console.log(e)}).always(function(){console.log("complete")}),r.click(function(){n.fadeOut(150),a.animate({height:"0"},600,function(){a.animate({width:"0",opacity:"0"},600,function(){i.fadeOut(200),a.fadeOut(100),a.remove(),r.remove(),n.remove(),i.remove()})})}),i.click(function(){n.fadeOut(150),a.animate({height:"0"},600,function(){a.animate({width:"0",opacity:"0"},600,function(){i.fadeOut(200),a.fadeOut(100),a.remove(),r.remove(),n.remove(),i.remove()})})})})})}),o.preventDefault()});var r=e("#select2-order-container").parent().find(".select2-selection__arrow").find("b"),n=e("#select2-category-container").parent().find(".select2-selection__arrow").find("b"),i=e("#select2-search-tag-container").parent().find(".select2-selection__arrow").find("b"),c=e("#select2-filter-color-container").parent().find(".select2-selection__arrow").find("b"),s=e("#select2-filter-date2-container").parent().find(".select2-selection__arrow").find("b");r.replaceWith('<span class="ordering_product_icon"></span>'),n.replaceWith('<span class="filter_category_product_icon"></span>'),i.replaceWith('<span class="filter_tags_product_icon"></span>'),c.replaceWith('<span class="filter_color_product_icon"></span>'),s.replaceWith('<span class="filter_date2_product_icon"></span>');var l=e(".meta_product").outerHeight()+e(".gallery-box").outerHeight();e(".main_image_product").css("min-height",l),e(".social-media-icon-widget a").each(function(){var o=e(this);""==o.attr("href")&&o.remove()}),e(".social-media-icon-widget a").hover(function(){e(this).find(".overlay").animate({width:"100%"},800)},function(){e(this).find(".overlay").animate({width:"0%"},800)}),e(".go-to-shop-widget").hover(function(){e(this).find("span:last-of-type").animate({height:"100%"},500)},function(){e(this).find("span:last-of-type").animate({height:"0"},500)})});
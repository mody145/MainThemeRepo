<?php  

/*==================================================
=                ( Footer1 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer() {

	register_sidebar(array(
		'name' 			=> 'Footer',
		'id' 			=> 'footer_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer');

/*==========  End of ( Footer1 ) Sidebar  ===========*/

/*==================================================
=                ( Footer2 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer2() {

	register_sidebar(array(
		'name' 			=> 'Footer 2',
		'id' 			=> 'footer2_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer2-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer2">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer2');

/*==========  End of ( Footer2 ) Sidebar  ===========*/

/*==================================================
=                ( Footer3 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer3() {

	register_sidebar(array(
		'name' 			=> 'Footer 3',
		'id' 			=> 'footer3_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer3-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer3">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer3');

/*==========  End of ( Footer3 ) Sidebar  ===========*/

/*=========================================================
=                Register Blog Sidebar          		  =
=========================================================*/

function ourWidgetsInit() {

	register_sidebar(array(
		'name' 			=> 'Main Sidebar',
		'id' 			=> 'right-sidebar',
		'description' 	=> 'This Sidebar Will Be At The Blog',
		'class' 		=> 'right-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget wow fadeIn">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit');

/*==========  End of Register Blog Sidebar  ===========*/

/*=========================================================
=                Register Blog Sidebar          		  =
=========================================================*/

function ourWidgetsInit_blog() {

	register_sidebar(array(
		'name' 			=> 'Blog Sidebar',
		'id' 			=> 'Blog-sidebar',
		'description' 	=> 'This Sidebar Will Be At The Blog',
		'class' 		=> 'right-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget wow fadeIn">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));
}
add_action('widgets_init', 'ourWidgetsInit_blog');

/*==========  End of Register Blog Sidebar  ===========*/

/*=========================================================
=                Register Post Sidebar          		  =
=========================================================*/

function ourWidgetsInit_post() {

	register_sidebar(array(
		'name' 			=> 'Post Sidebar',
		'id' 			=> 'post-sidebar',
		'description' 	=> 'This Sidebar Will Be At The Post',
		'class' 		=> 'right-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget wow fadeIn">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));
}
add_action('widgets_init', 'ourWidgetsInit_post');

/*==========  End of Register Post Sidebar  ===========*/

/*======================================================
=            Section Register Shop Sidebar             =
======================================================*/

function ourWidgetsInit_shop() {

	register_sidebar(array(
		'name' 			=> 'Shop Sidebar',
		'id' 			=> 'shop-sidebar',
		'description' 	=> 'This Widget Will Be Show If Plugin Shop Is Avtive',
		'class' 		=> 'shop-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));
}
add_action('widgets_init', 'ourWidgetsInit_shop');

/*=====  End of Section Register Shop Sidebar   ======*/

/*==================================================
=                Welcome sidebar  	          	   =
==================================================*/

function ourWidgetsInit_welcome() {

	register_sidebar(array(
		'name' 			=> 'Welcome Msg',
		'id' 			=> 'welcome_msg',
		'description' 	=> 'The Widget Message Welcome',
		'class' 		=> 'welcome-widget-class',
		'before_widget' => '<div class="custom-widget-welcome">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_welcome');

/*============  End of Welcome Sidebar  =============*/

/*==================================================
=                advertise here  	          	   =
==================================================*/

function ourWidgetsInit_advertise_here() {

	register_sidebar(array(
		'name' 			=> 'advertise here',
		'id' 			=> 'advertise_here',
		'description' 	=> 'The Widget To Show Ads In Header',
		'class' 		=> 'advertise_here',
		'before_widget' => '<div class="custom-widget-advertise-here">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_advertise_here');

/*============  End of Welcome advertise here  =============*/


/*======================================================
=                advertise here BIG  	          	   =
======================================================*/

function ourWidgetsInit_big_advertise_here() {

	register_sidebar(array(
		'name' 			=> 'Big advertise here',
		'id' 			=> 'big_advertise_here',
		'description' 	=> 'The Widget To Show Ads In Index Page',
		'class' 		=> 'ads-here-big',
		'before_widget' => '',
		'after_widget' 	=> "",
		'before_title' 	=> '',
		'after_title' 	=> "",
		));

}
add_action('widgets_init', 'ourWidgetsInit_big_advertise_here');

/*============  End of Welcome advertise here BIG  =============*/

?>
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

/*==================================================
=                Register Sidebar          		  =
==================================================*/

function ourWidgetsInit() {

	register_sidebar(array(
		'name' 			=> 'Right Sidebar',
		'id' 			=> 'right-sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Right',
		'class' 		=> 'right-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget wow fadeIn">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit');

/*==========  End of Register Sidebar  ===========*/

/*=================================================
=            Section Shop Sidebar Regi            =
=================================================*/

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

/*=====  End of Section Shop Sidebar Regi  ======*/

/*==================================================
=                Welcome Widget  	          	   =
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

/*============  End of Welcome Widget  =============*/

?>
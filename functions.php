<?php 

require get_template_directory() . '/inc/functionUSD_EURO.php';
require get_template_directory() . '/inc/sorting_grid_images_box.php';
require get_template_directory() . '/inc/ajax_full_screan_search.php';
require get_template_directory() . '/inc/ajax_system_follow_like_addtocart.php';
require get_template_directory() . '/inc/ajax_calculate_value_by_country.php';
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/ajax_filter_shop.php';
require get_template_directory() . '/inc/styles_scripts.php';
require get_template_directory() . '/inc/new_post_type.php';
require get_template_directory() . '/inc/woo_function.php';
require get_template_directory() . '/inc/widgets.php';


/*=================================================
=            	Register Menus                    =
=================================================*/

register_nav_menus(array(
	'header'	=> __('Header Menu'),
	'primary' 	=> __('Primary Menu'),
	'footer' 	=> __('Footer Menu'),
	'mobile' 	=> __('Mobile Menu'),
	'tablet' 	=> __('Tablet Menu'),
	));

/*=====  End of Register Menus  =================*/

/*================================================
=            All Theme Support Here              =
================================================*/

add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

/*=====  End of All Theme Support Here    ======*/

?>
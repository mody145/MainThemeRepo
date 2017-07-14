<?php 


require get_template_directory() . '/inc/Facebook/autoload.php';

require get_template_directory() . '/inc/ajax_get_posts_by_category_in_header_menu.php';
require get_template_directory() . '/inc/ajax_view_products_cart_in_header.php';
require get_template_directory() . '/inc/ajax_system_follow_like_addtocart.php';
require get_template_directory() . '/inc/ajax_calculate_value_by_country.php';
require get_template_directory() . '/inc/ajax_get_price_by_my_currency.php';
require get_template_directory() . '/inc/ajax_remove_cookie_country.php';
require get_template_directory() . '/inc/ajax_grid_posts_in_index.php';
require get_template_directory() . '/inc/ajax_full_screan_search.php';
require get_template_directory() . '/inc/sorting_grid_images_box.php';
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/ajax_update_cart.php';
require get_template_directory() . '/inc/functionUSD_EURO.php';
require get_template_directory() . '/inc/ajax_filter_shop.php';
require get_template_directory() . '/inc/styles_scripts.php';
require get_template_directory() . '/inc/new_post_type.php';
require get_template_directory() . '/inc/woo_function.php';
require get_template_directory() . '/inc/widgets.php';

$config = array (
	'app_id' 				=> '339106883174292',
	'app_secret' 			=> '3b35af398a7e3e3437442f6c0ae6a8e6',
	'default_graph_version' => 'v2.9',
	'default_access_token' 	=> 'EAACEdEose0cBAMjgzIEE90hjGJXCZAggqxAw0IObABp3HQqjgBZCqrBiB7HOD7MQlEDqUHC5bCHdTI2IWAaJg8YdDYFth6qPnvkDca6xuFtXGaFEYzbderuKsLqxeFCiZChX1wc2g9cX1dNPhjmhyTFQKGoC5nJx2J9wzIPjjMXyYiwqPhn6kRtBYFdFtoZD', // optional
	);
$facebook = new \Facebook\Facebook($config);

$appsecret_proof= hash_hmac('sha256', 'EAACEdEose0cBAMjgzIEE90hjGJXCZAggqxAw0IObABp3HQqjgBZCqrBiB7HOD7MQlEDqUHC5bCHdTI2IWAaJg8YdDYFth6qPnvkDca6xuFtXGaFEYzbderuKsLqxeFCiZChX1wc2g9cX1dNPhjmhyTFQKGoC5nJx2J9wzIPjjMXyYiwqPhn6kRtBYFdFtoZD', '3b35af398a7e3e3437442f6c0ae6a8e6'); 


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
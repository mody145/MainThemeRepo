<?php 


require get_template_directory() . '/inc/ajax_functions/ajax_get_posts_by_category_in_header_menu.php';
require get_template_directory() . '/inc/ajax_functions/ajax_show_followed_dropdown_box.php';
require get_template_directory() . '/inc/ajax_functions/ajax_view_products_cart_in_header.php';
require get_template_directory() . '/inc/ajax_functions/ajax_system_follow_like_addtocart.php';
require get_template_directory() . '/inc/ajax_functions/ajax_calculate_value_by_country.php';
require get_template_directory() . '/inc/ajax_functions/ajax_get_price_by_my_currency.php';
require get_template_directory() . '/inc/ajax_functions/ajax_remove_cookie_country.php';
require get_template_directory() . '/inc/ajax_functions/ajax_grid_posts_in_index.php';
require get_template_directory() . '/inc/ajax_functions/ajax_remove_from_cart_sd.php';
require get_template_directory() . '/inc/ajax_functions/ajax_full_screan_search.php';
require get_template_directory() . '/inc/ajax_functions/ajax_sorting_grid_images_box.php';
require get_template_directory() . '/inc/ajax_functions/ajax_quick_view_windows.php';
require get_template_directory() . '/inc/ajax_functions/ajax_update_cart.php';
require get_template_directory() . '/inc/ajax_functions/ajax_filter_shop.php';

require get_template_directory() . '/inc/new_post_type/newPostType_getInTouch.php';
require get_template_directory() . '/inc/new_post_type/newPostType_slider.php';
require get_template_directory() . '/inc/new_post_type/newPostType_services.php';
require get_template_directory() . '/inc/new_post_type/newPostType_about_us.php';

require get_template_directory() . '/inc/widgets_classes/widget_latest_in_shop.php';
require get_template_directory() . '/inc/widgets_classes/widget_shop_categories.php';
require get_template_directory() . '/inc/widgets_classes/widget_blog_categories.php';
require get_template_directory() . '/inc/widgets_classes/widget_go_to.php';
require get_template_directory() . '/inc/widgets_classes/widget_social_media.php';
require get_template_directory() . '/inc/widgets_classes/widget_latest_posts.php';
require get_template_directory() . '/inc/widgets_classes/widget_about_us.php';
require get_template_directory() . '/inc/widgets_classes/widget_welcom.php';
require get_template_directory() . '/inc/widgets_classes/widget_tags_posts.php';
require get_template_directory() . '/inc/widgets_classes/widget_tags_product.php';

require get_template_directory() . '/inc/reg_widget_and_sidebar/register_widgets.php';
require get_template_directory() . '/inc/reg_widget_and_sidebar/register_sidebar.php';

require get_template_directory() . '/inc/custom_functions/functionUSD_EURO.php';
require get_template_directory() . '/inc/custom_functions/woo_function.php';

require get_template_directory() . '/inc/Facebook/autoload.php';
require get_template_directory() . '/inc/facebook_init.php';

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

require get_template_directory() . '/inc/styles_scripts.php';

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
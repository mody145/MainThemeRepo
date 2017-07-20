<?php 

add_action('wp_ajax_nopriv_remove_cookie_country', 'remove_cookie_country'); 
add_action('wp_ajax_remove_cookie_country', 'remove_cookie_country');
function remove_cookie_country() {

	setcookie( 'Country_Currency', '', (time() + (86400 * 30)) * 30, "/");

	
	wp_die();
} 


?>
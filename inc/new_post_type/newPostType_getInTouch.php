<?php  

/*==========================================================
=            Add Submenu Page To Contact Foem 7            =
==========================================================*/

function dwwp_add_submenu_page_contact() {
	add_submenu_page( 
		'wpcf7', 
		'Touch', 
		'Get In Touch', 
		'manage_options', 
		'touch', 
		'get_in_touch_callback' );
}
add_action('admin_menu', 'dwwp_add_submenu_page_contact');

function get_in_touch_callback() { ?>

	<?php settings_errors(); ?>
	<!-- Start Form Settings -->
	<form method="POST" action="options.php">
		<?php settings_fields( 'touch_settings' ); ?>
		<?php do_settings_sections( 'touch' );  ?>
		<?php submit_button(); ?>
	</form><!-- End Form Settings -->
	<?php
}

add_action( 'admin_init', 'dwwp_register_custom_settings_touch' );

function dwwp_register_custom_settings_touch() {

	// Register All Settings
	register_setting( 'touch_settings', 'title_get_touch' );
	register_setting( 'touch_settings', 'description_get_touch' );
	register_setting( 'touch_settings', 'address_get_touch' );
	register_setting( 'touch_settings', 'phone_get_touch' );
	register_setting( 'touch_settings', 'fax_get_touch' );
	register_setting( 'touch_settings', 'email_get_touch' );
	register_setting( 'touch_settings', 'hours_get_touch' );

	// Main Section
	add_settings_section( 'touch_section', 'Touch Section', 'touch_settings_callback', 'touch' );

	// All Fields Of Settings
	add_settings_field( 'title_get_touch', 'Title', 'touch_title_callback', 'touch', 'touch_section' );
	add_settings_field( 'description_get_touch', 'Description', 'touch_description_callback', 'touch', 'touch_section' );
	add_settings_field( 'address_get_touch', 'Address', 'touch_address_callback', 'touch', 'touch_section' );
	add_settings_field( 'phone_get_touch', 'Phone', 'touch_phone_callback', 'touch', 'touch_section' );
	add_settings_field( 'fax_get_touch', 'Fax', 'touch_fax_callback', 'touch', 'touch_section' );
	add_settings_field( 'email_get_touch', 'E-mail', 'touch_email_callback', 'touch', 'touch_section' );
	add_settings_field( 'hours_get_touch', 'Working Hours', 'touch_hours_callback', 'touch', 'touch_section' );
}

function touch_settings_callback() {
	echo 'Main Settings';
}
// Title Field
function touch_title_callback() {
	$title = esc_attr( get_option( 'title_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="title_get_touch" value="' . $title . '" />';
}
// Discription Field
function touch_description_callback() {
	$description = esc_attr( get_option( 'description_get_touch', 'None' ) );
	echo '<textarea class="large-text code" rows="8" name="description_get_touch">' . $description . '</textarea>';
}
// Address Field
function touch_address_callback() {
	$address = esc_attr( get_option( 'address_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="address_get_touch" value="' . $address . '" />';
}
// Phone Field
function touch_phone_callback() {
	$phone = esc_attr( get_option( 'phone_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="phone_get_touch" value="' . $phone . '" />';
}
// Fax Field
function touch_fax_callback() {
	$fax = esc_attr( get_option( 'fax_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="fax_get_touch" value="' . $fax . '" />';

}
// Email Field
function touch_email_callback() {
	$email = esc_attr( get_option( 'email_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="email_get_touch" value="' . $email . '" />';

}
// Working Hours Field
function touch_hours_callback() {
	$hours = esc_attr( get_option( 'hours_get_touch', 'None' ) );
	echo '<input type="text" class="regular-text ltr" name="hours_get_touch" value="' . $hours . '" />';

}

/*=====  End of Add Submenu Page To Contact Foem 7  ======*/
?>
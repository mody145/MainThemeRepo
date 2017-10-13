<?php  


/*===================================================
=            Register Post Type About Us            =
===================================================*/

function dwwp_register_post_type_colors() {

	$singular 	= 'Color';
	$plural 	= 'Colors';

	$lables = array(
		'name' 				=> 'Colors',
		'singular_name' 	=> $singular,
		'add_new' 			=> 'Add New ' . $singular,
		'add_new_item' 		=> 'Add New ' . $singular,
		'edit_item' 		=> 'Edit ' . $singular,
		'new_item' 			=> 'New ' . $singular,
		'view_item' 		=> 'Veiw ' . $singular,
		'view_items' 		=> 'Veiw ' . $plural,
		'search_items' 		=> 'Search ' . $plural,
		'not_found' 		=> 'No ' . $plural,
		'all_items' 		=> 'All ' . $plural,
		);

	$args = array(
		'labels'             => $lables,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-admin-customizer',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
        'capabilities' => array(
            'create_posts' => false,
            'edit_posts' => false,
        ),
        'map_meta_cap'       => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'rewrite' 			 => array('slug' => 'color')
		);

	register_post_type('color', $args);
}
add_action('init', 'dwwp_register_post_type_colors');

/*=====  End of Register Post Type AboutUs  ======*/

function dwwp_shoose_colors_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=color', 
		'Shoose Colors',
		'Shoose Colors', 
		'manage_options', 
		'choose_colors', 
		'shoose_colors_custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_shoose_colors_submenu_bage');

function shoose_colors_custom_submenu_page_callback() {
	echo '<br /><h2 class="">Choose Your Main Colors</h2>';
	echo '<i class="icon-smile-logo" style=" font-size: 55px; "></i>';

	settings_errors(); ?>
	<!-- Start Form Settings -->
	<form method="POST" action="options.php">
		<?php settings_fields( 'colors-settings-group' ); ?>
		<?php do_settings_sections( 'colors_setting' );  ?>
		<?php submit_button(); ?>
	</form><!-- End Form Settings -->

	<?php
}

add_action( 'admin_init', 'dwwp_register_custom_settings_colors' );

function dwwp_register_custom_settings_colors() {
	// Register Color Background One
	register_setting( 'colors-settings-group','color1' );
	// Register Color Background Two
	register_setting( 'colors-settings-group','color2' );
	// Register Color Main Color
	register_setting( 'colors-settings-group','color3' );
	// Register Color Main Color
	register_setting( 'colors-settings-group','color4' );
	// Register Color Main Color
	register_setting( 'colors-settings-group','color5' );
	// Register Color Main Color
	register_setting( 'colors-settings-group','color6' );
	// Register Color Main Color
	register_setting( 'colors-settings-group','color7' );
	// Register Color Fonts
	register_setting( 'colors-settings-group','color8' );
	// Register Color Fonts
	register_setting( 'colors-settings-group','infoColor' );
	// Register Transparent Image Background Color
	register_setting( 'colors-settings-group','transparentColor' );
	// Register Font Color Have Deffrent Background
	register_setting( 'colors-settings-group','fontColorHaveBackground' );
	// Register Scroll Color
	register_setting( 'colors-settings-group','mainScrollColor' );

	add_settings_section( 'main-colors-settings', '', 'colors_main__options', 'colors_setting' );

	// Color Background One
	add_settings_field( 'color1', 'background One', 'costum_setting_colors_background1_callback', 'colors_setting', 'main-colors-settings' );
	// Color Background Two
	add_settings_field( 'color2', 'background Two', 'costum_setting_colors_background2_callback', 'colors_setting', 'main-colors-settings' );
	// Main Color
	add_settings_field( 'color3', 'Main Color 1', 'costum_setting_colors_color3_callback', 'colors_setting', 'main-colors-settings' );
	// Main Color
	add_settings_field( 'color4', 'Main Color 2', 'costum_setting_colors_color4_callback', 'colors_setting', 'main-colors-settings' );
	// Main Color
	add_settings_field( 'color5', 'Main Color 3', 'costum_setting_colors_color5_callback', 'colors_setting', 'main-colors-settings' );
	// Main Color
	add_settings_field( 'color6', 'Main Color 4', 'costum_setting_colors_color6_callback', 'colors_setting', 'main-colors-settings' );
	// Main Color
	add_settings_field( 'color7', 'Main Color 5', 'costum_setting_colors_color7_callback', 'colors_setting', 'main-colors-settings' );
	// Fonts Color One
	add_settings_field( 'color8', 'Fonts Color One', 'costum_setting_colors_color8_callback', 'colors_setting', 'main-colors-settings' );
	// Fonts Color Two
	add_settings_field( 'infoColor', 'Fonts Color Two', 'costum_setting_colors_infoColor_callback', 'colors_setting', 'main-colors-settings' );
	// font Color Have Background
	add_settings_field( 'fontColorHaveBackground', 'Font Color Three', 'costum_setting_colors_fontColorHaveBackground_callback', 'colors_setting', 'main-colors-settings' );
	// Transparent Image
	add_settings_field( 'transparentColor', 'Transparent Image', 'costum_setting_colors_transparentColor_callback', 'colors_setting', 'main-colors-settings' );
	// Transparent Image
	add_settings_field( 'mainScrollColor', 'main Scroll Color', 'costum_setting_colors_mainScrollColor_callback', 'colors_setting', 'main-colors-settings' );

}

function colors_main__options() {
	echo '';
}

// Function To Creat Field In Admin Page
function costum_setting_colors_background1_callback() {
	$color1 = esc_attr( get_option( 'color1' ) ); ?>

	<div class="input-color-container">
		<input name="color1" id="input-color1" value="<?php echo $color1; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_background2_callback() {
	$color2 = esc_attr( get_option( 'color2' ) ); ?>

	<div class="input-color-container">
		<input name="color2" id="input-color2" value="<?php echo $color2; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color3_callback() {
	$color3 = esc_attr( get_option( 'color3' ) ); ?>

	<div class="input-color-container">
		<input name="color3" id="input-color3" value="<?php echo $color3; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color4_callback() {
	$color4 = esc_attr( get_option( 'color4' ) ); ?>

	<div class="input-color-container">
		<input name="color4" id="input-color4" value="<?php echo $color4; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color5_callback() {
	$color5 = esc_attr( get_option( 'color5' ) ); ?>

	<div class="input-color-container">
		<input name="color5" id="input-color5" value="<?php echo $color5; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color6_callback() {
	$color6 = esc_attr( get_option( 'color6' ) ); ?>

	<div class="input-color-container">
		<input name="color6" id="input-color6" value="<?php echo $color6; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color7_callback() {
	$color7 = esc_attr( get_option( 'color7' ) ); ?>

	<div class="input-color-container">
		<input name="color7" id="input-color7" value="<?php echo $color7; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_color8_callback() {
	$color8 = esc_attr( get_option( 'color8' ) ); ?>

	<div class="input-color-container">
		<input name="color8" id="input-color8" value="<?php echo $color8; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_infoColor_callback() {
	$infoColor = esc_attr( get_option( 'infoColor' ) ); ?>

	<div class="input-color-container">
		<input name="infoColor" id="input-infoColor" value="<?php echo $infoColor; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_fontColorHaveBackground_callback() {
	$fontColorHaveBackground = esc_attr( get_option( 'fontColorHaveBackground' ) ); ?>

	<div class="input-color-container">
		<input name="fontColorHaveBackground" id="input-fontColorHaveBackground" value="<?php echo $fontColorHaveBackground; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_transparentColor_callback() {
	$transparentColor = esc_attr( get_option( 'transparentColor' ) ); ?>

	<div class="input-color-container">
		<input name="transparentColor" id="input-transparentColor" value="<?php echo $transparentColor; ?>" class="input-color" type="color">
	</div>

	<?php
}

// Function To Creat Field In Admin Page
function costum_setting_colors_mainScrollColor_callback() {
	$mainScrollColor = esc_attr( get_option( 'mainScrollColor' ) ); ?>

	<div class="input-color-container">
		<input name="mainScrollColor" id="input-mainScrollColor" value="<?php echo $mainScrollColor; ?>" class="input-color" type="color">
	</div>

	<?php
}


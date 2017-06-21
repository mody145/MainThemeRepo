<?php 

require '/inc/wp-bootstrap-navwalker.php';

/*==================================================
=            Enqueue Styles And Scripts            =
==================================================*/

/*
** Enqueue All Styles And Scripts
** Add By Mahmoud
*/

function dwwp_styles_and_scripts() {
	// Bootstrap css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/layout/css/bootstrap.css' );
	// skitter slider
	wp_enqueue_style( 'skitter-css', get_template_directory_uri() . '/layout/css/skitter.css' );
	// Fonts
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/layout/css/fonts.css' );
	// Main File Css
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/layout/css/main.css?' . time() . '' );
	// Shop
	wp_enqueue_style( 'shop-css', get_template_directory_uri() . '/layout/css/shop.css?' . time() . '' );

	// Remove Register JQuery
	wp_deregister_script( 'jquery' );
	// Put JQuery ( In Footer )
	wp_register_script( 'jquery', includes_url('js/jquery/jquery.js'), false, '', true );

	// Bootstrap js
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/layout/js/bootstrap.min.js', array('jquery'), '', true );
	// skitter slider
	wp_enqueue_script( 'skitter-js', get_template_directory_uri() . '/layout/js/jquery.skitter.js', array('jquery'), '', true );
	// easying
	wp_enqueue_script( 'easying-js', get_template_directory_uri() . '/layout/js/jquery.easing.1.3.js', array('jquery'), '', true );
	// Masonry
	wp_enqueue_script( 'Masonry', get_template_directory_uri() . '/layout/js/masonry.pkgd.min.js', array('jquery'), '', true );
	// Enqueue JQuery
	wp_enqueue_script( 'jquery' );
	// Ajax JQuery
	wp_enqueue_script( 'ajax-js', get_template_directory_uri() . '/layout/js/Ajax_JQuery.js?' . time() . '', array('jquery'), '', true );
	// Main File Js
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/layout/js/main.js?' . time() . '', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'dwwp_styles_and_scripts' );

function dwwp_admin_custom_script() {
	wp_enqueue_media();
	// Admin Js
	wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/layout/js/custom-admin.js', array('jquery'), '', true );
	wp_enqueue_script( 'admin-custom-script' );
}
add_action( 'admin_enqueue_scripts', 'dwwp_admin_custom_script' );

/*=====  End of Enqueue Style And Scripts  ======*/

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

/*=================================================
=            All Widget Requierd Here             =
=================================================*/

// Include All Widgets
require '/inc/widgets.php';

/*=====  End of All Widget Requierd Here   ======*/

/*================================================
=            All Theme Support Here              =
================================================*/

add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

/*=====  End of All Theme Support Here    ======*/

/*=================================================
=            Register Post Type - Slider          =
=================================================*/

function dwwp_register_post_type_slider() {

	$singular 	= 'Slide';
	$plural 	= 'Slides';

	$lables = array(
		'name' 				=> $plural,
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
        'menu_icon'			 => 'dashicons-format-gallery',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' 			 => array('slug' => 'slide')
		);

	register_post_type('slider', $args);
}
add_action('init', 'dwwp_register_post_type_slider');

/*=====  End of Register Post Type - Slider  ====*/

/*================================================
=            Add Metabox To Slider               =
================================================*/

function dwwp_custom_metabox_slides() {

	 add_meta_box(
	 	'slide_meta',
	 	'Slide Info',
	 	'dwwp_meta_slide_callback',
	 	'slider',
	 	'normal',
	 	'high'
	 	);
}
add_action('add_meta_boxes', 'dwwp_custom_metabox_slides');

function dwwp_meta_slide_callback($post) { ?>
	
	<!-- Start Add Link To Slide -->
	<div>
		<div class="meta-row">
			<p>Exampel : http://www.google.com</p>
			<div class="meta-th">
				<label for="slide_link" class="dwwp-row-title">Type Slide Link Here</label>
			</div>
			<div class="meta-td">
				<input type="text" name="slide-link" id="slide_link" value="<?php echo get_post_meta( $post->ID, 'slide-link', true ); ?>" />
			</div>									
		</div>
	</div><!-- End Add Link To Slide -->

	<?php }

// Save Data
function dwwp_save_metadata_slider($id) {

	if (isset($_POST['slide-link'])) {
		update_post_meta( $id, 'slide-link', sanitize_text_field($_POST['slide-link']) );
	}
}
add_action( 'save_post', 'dwwp_save_metadata_slider' );

/*======  End of Add Metabox To Slider  ========*/

/*===================================================
=            Register Post Type Services            =
===================================================*/

function dwwp_register_post_type_services() {

	$singular 	= 'Service';
	$plural 	= 'Services';

	$lables = array(
		'name' 				=> $plural,
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
        'menu_icon'			 => 'dashicons-layout',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
		'rewrite' 			 => array('slug' => 'service')
		);

	register_post_type('service', $args);
}
add_action('init', 'dwwp_register_post_type_services');

/*=====  End of Register Post Type Services  ======*/

/*===================================================
=            Register Post Type About Us            =
===================================================*/

function dwwp_register_post_type_member() {

	$singular 	= 'Member';
	$plural 	= 'Members';

	$lables = array(
		'name' 				=> 'About Us',
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
        'menu_icon'			 => 'dashicons-groups',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'rewrite' 			 => array('slug' => 'member')
		);

	register_post_type('member', $args);
}
add_action('init', 'dwwp_register_post_type_member');

/*=====  End of Register Post Type Services  ======*/

/*================================================
=            Add Metabox To Service              =
================================================*/

function dwwp_custom_metabox_service() {

	 add_meta_box(
	 	'service_meta',
	 	'Plan Info',
	 	'dwwp_meta_Plan_callback',
	 	'service',
	 	'normal',
	 	'high'
	 	);
}
add_action('add_meta_boxes', 'dwwp_custom_metabox_service');

function dwwp_meta_Plan_callback($post) { ?>

	<div>
	<!-- Start Plan Price -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="price_plan" class="dwwp-row-title">Plan Price</label>
			</div>
			<div class="meta-td">
				<input type="text" name="price" id="price_plan" value="<?php echo get_post_meta( $post->ID, 'price', true ); ?>" />
			</div>									
		</div><!-- End Plan Price -->
		<!-- Start Feat One -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="feat_one" class="dwwp-row-title">Feat One</label>
			</div>
			<div class="meta-td">
				<input type="text" name="feat-one" id="feat_one" value="<?php echo get_post_meta( $post->ID, 'feat-one', true ); ?>" />
			</div>									
		</div><!-- End Feat One -->
		<!-- Start Feat Two -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="feat_two" class="dwwp-row-title">Feat Two</label>
			</div>
			<div class="meta-td">
				<input type="text" name="feat-two" id="feat_two" value="<?php echo get_post_meta( $post->ID, 'feat-two', true ); ?>" />
			</div>									
		</div><!-- End Feat Two -->
		<!-- Start Feat Three -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="feat_three" class="dwwp-row-title">Feat Three</label>
			</div>
			<div class="meta-td">
				<input type="text" name="feat-three" id="feat_three" value="<?php echo get_post_meta( $post->ID, 'feat-three', true ); ?>" />
			</div>									
		</div><!-- End Feat Three -->

	</div>

	<?php }

// Save Data
function dwwp_save_metadata_service($id) {

	if (isset($_POST['price'])) {
		update_post_meta( $id, 'price', sanitize_text_field($_POST['price']) ); }

	if (isset($_POST['feat-one'])) {
		update_post_meta( $id, 'feat-one', sanitize_text_field($_POST['feat-one']) ); }

	if (isset($_POST['feat-two'])) {
		update_post_meta( $id, 'feat-two', sanitize_text_field($_POST['feat-two']) ); }

	if (isset($_POST['feat-three'])) {
		update_post_meta( $id, 'feat-three', sanitize_text_field($_POST['feat-three']) ); }
}
add_action( 'save_post', 'dwwp_save_metadata_service' );

/*======  End of Add Metabox To Slider  ========*/

/*================================================
=            Add Metabox To OurTeam              =
================================================*/

function dwwp_custom_metabox_team() {

	 add_meta_box(
	 	'member_meta',
	 	'Member Info',
	 	'dwwp_meta_member_callback',
	 	'member',
	 	'normal',
	 	'high'
	 	);
}
add_action('add_meta_boxes', 'dwwp_custom_metabox_team');

function dwwp_meta_member_callback($post) { ?>

	<div>
	<!-- Start Jop Field -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="jop" class="dwwp-row-title">Jop</label>
			</div>
			<div class="meta-td">
				<input type="text" name="jop" id="jop" value="<?php echo get_post_meta( $post->ID, 'jop', true ); ?>" />
			</div>									
		</div><!-- End Jop Field -->
		<!-- Start Facebook Link Field -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="face" class="dwwp-row-title">Facebook</label>
			</div>
			<div class="meta-td">
				<input type="text" name="face" id="face" value="<?php echo get_post_meta( $post->ID, 'face', true ); ?>" />
			</div>									
		</div><!-- End Facebook Link Field -->
		<!-- Start Twitter Link Field -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="twitter" class="dwwp-row-title">Twitter</label>
			</div>
			<div class="meta-td">
				<input type="text" name="twitter" id="twitter" value="<?php echo get_post_meta( $post->ID, 'twitter', true ); ?>" />
			</div>									
		</div><!-- End Twitter Link Field -->
		<!-- Start Google Plus Link Field -->
		<div class="meta-row">
			<div class="meta-th">
				<label for="google" class="dwwp-row-title">Google+</label>
			</div>
			<div class="meta-td">
				<input type="text" name="google" id="google" value="<?php echo get_post_meta( $post->ID, 'google', true ); ?>" />
			</div>									
		</div><!-- End Google Plus Link Field -->

	</div>

	<?php }

// Start Save Data
function dwwp_save_metadata_member($id) {

	if (isset($_POST['jop'])) {
		update_post_meta( $id, 'jop', sanitize_text_field($_POST['jop']) ); }

	if (isset($_POST['face'])) {
		update_post_meta( $id, 'face', sanitize_text_field($_POST['face']) ); }

	if (isset($_POST['twitter'])) {
		update_post_meta( $id, 'twitter', sanitize_text_field($_POST['twitter']) ); }

	if (isset($_POST['google'])) {
		update_post_meta( $id, 'google', sanitize_text_field($_POST['google']) ); }
}
add_action( 'save_post', 'dwwp_save_metadata_member' );

/*======  End of Add Metabox To Slider  ========*/

/*================================================
=            	Register Submenu (services)    	=
================================================*/

function dwwp_service_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=service', 
		'Settings',
		'Settings', 
		'manage_options', 
		'service_setting', 
		'service_setting__custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_service_submenu_bage');

function service_setting__custom_submenu_page_callback() { ?>

<?php settings_errors(); ?>
	<!-- Start Form Settings -->
	<form method="POST" action="options.php">
		<?php settings_fields( 'service-settings-group' ); ?>
		<?php do_settings_sections( 'service_setting' );  ?>
		<?php submit_button(); ?>
	</form><!-- End Form Settings -->
<?php 
}

add_action( 'admin_init', 'dwwp_register_custom_settings_sevices' );

function dwwp_register_custom_settings_sevices() {

	register_setting( 'service-settings-group','service_title' );
	register_setting( 'service-settings-group','service_description' );
	register_setting( 'service-settings-group','show_other_services' );
	register_setting( 'service-settings-group','show_pricing' );

	add_settings_section( 'main-info-service', 'Services Main Settings', 'service_main__options', 'service_setting' );

	// Field Services Title
	add_settings_field( 'service_title', 'Services Title', 'costum_setting_service_title_callback', 'service_setting', 'main-info-service' );
	// Field Service Description
	add_settings_field( 'service_description', 'Service Description', 'costum_setting_service_description_callback', 'service_setting', 'main-info-service' );
	// Field Show Other Service
	add_settings_field( 'show_other_services', 'Show Other Service', 'costum_setting_show_other_services_callback', 'service_setting', 'main-info-service' );
	// Show Pricing Or Not
	add_settings_field( 'show_pricing', 'Show Pricing Plan', 'costum_setting_show_pricing_callback', 'service_setting', 'main-info-service' );
}

function service_main__options() {
	echo 'Main Settings';
}
// Function To Creat Field In Admin Page
function costum_setting_service_title_callback() {
	$serviceTitle = esc_attr( get_option( 'service_title' ) );
	echo '<input class="regular-text ltr" type="text" name="service_title" value="' . $serviceTitle . '" />';
}
// Function To Creat Field In Admin Page
function costum_setting_service_description_callback() {
	$serviceDescription = esc_attr( get_option( 'service_description' ) );
	echo '<textarea rows="5" class="large-text code" name="service_description">' . $serviceDescription . '</textarea>';
}
// Function To Creat Field In Admin Page
function costum_setting_show_other_services_callback() {
	$showStatus = esc_attr( get_option( 'show_other_services' ) );
	echo '<select name="show_other_services" >';
		echo '<option ';
		if($showStatus == 1) { echo 'selected'; }
		echo ' value="1">Yes</option>';

		echo '<option ';
		if($showStatus == 0) { echo 'selected'; }
		echo ' value="0">No</option>';
	echo '</select>';
}

function costum_setting_show_pricing_callback() {
	$show_pricing = esc_attr( get_option( 'show_pricing' ) );
	echo '<select name="show_pricing" >';
		echo '<option ';
		if($show_pricing == 1) { echo 'selected'; }
		echo ' value="1">Yes</option>';

		echo '<option ';
		if($show_pricing == 0) { echo 'selected'; }
		echo ' value="0">No</option>';
	echo '</select>';
}

/*=========  End of Register Submenu  ==========*/

/*================================================
=            	Register Submenu (About Us)    	=
================================================*/

function dwwp_about_us_page_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=member', 
		'Settings',
		'Settings', 
		'manage_options', 
		'about_setting', 
		'about_page_setting__custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_about_us_page_submenu_bage');

function about_page_setting__custom_submenu_page_callback() { ?>

<?php settings_errors(); ?>
	<!-- Start From Settings -->
	<form method="POST" action="options.php">
		<?php settings_fields( 'about-us-page-settings-group' ); ?>
		<?php do_settings_sections( 'about_setting' );  ?>
		<?php submit_button(); ?>
	</form><!-- End From Settings -->
<?php 
}

add_action( 'admin_init', 'dwwp_register_custom_settings_about_page' );

function dwwp_register_custom_settings_about_page() {

	register_setting( 'about-us-page-settings-group','about_title' );
	register_setting( 'about-us-page-settings-group','about_description' );
	register_setting( 'about-us-page-settings-group','about_image' );
	register_setting( 'about-us-page-settings-group','our_expeiance_title' );
	register_setting( 'about-us-page-settings-group','our_expeiance_description' );

	add_settings_section( 'main-info-about', 'About Us Main Settings', 'About_main__options', 'about_setting' );

	// Field About Us Title
	add_settings_field( 'about_title', 'About Us Title', 'costum_setting_about_title_callback', 'about_setting', 'main-info-about' );
	// Field About Us Description
	add_settings_field( 'about_description', 'About Us Description', 'costum_setting_about_description_callback', 'about_setting', 'main-info-about' );
	// Field Image
	add_settings_field( 'about_image', 'About Us Image', 'costum_setting_about_image_callback', 'about_setting', 'main-info-about' );
	// Our Experiance Title Field
	add_settings_field( 'our_expeiance_title', 'Our Experiance Title', 'our_expeiance_title_callback', 'about_setting', 'main-info-about' );
	// // Our Experiance Description Field
	add_settings_field( 'our_expeiance_description', 'Our Experiance Description', 'our_expeiance_description_callback', 'about_setting', 'main-info-about' );
}

function About_main__options() {
	echo 'Main Settings';
}
// Function To Creat Field In Admin Page
function costum_setting_about_title_callback() {
	$about_title = esc_attr( get_option( 'about_title' ) );
	echo '<input class="regular-text ltr" type="text" name="about_title" value="' . $about_title . '" />';
}
// Function To Creat Field In Admin Page
function costum_setting_about_description_callback() {
	$about_description = esc_attr( get_option( 'about_description' ) );
	echo '<textarea class="large-text code" rows="8" name="about_description">' . $about_description . '</textarea>';
}
// Function To Creat Field In Admin Page
function costum_setting_about_image_callback() {
	$about_image = esc_attr( get_option( 'about_image' ) );
	echo '<button id="upload_image_about_us_page" class="button">Upload Image</button>';
	echo '<input id="image_about_us_hidden_input" type="hidden" name="about_image" value="' . $about_image . '" />';
	echo '<br /><br /><img id="image_about_us_show" src="' . $about_image . '" width="400" />';
}

function our_expeiance_title_callback() {
	$our_expeiance_title = esc_attr( get_option( 'our_expeiance_title' ) );
	echo '<input class="regular-text ltr" type="text" name="our_expeiance_title" value="' . $our_expeiance_title . '" />';
}

function our_expeiance_description_callback() {
	$our_expeiance_description = esc_attr( get_option( 'our_expeiance_description' ) );
	echo '<textarea class="large-text code" rows="8" name="our_expeiance_description">' . $our_expeiance_description . '</textarea>';
}

/*=========  End of Register Submenu  ==========*/

/*=======================================================
=            Slider All Slides Manage Culomn            =
=======================================================*/

function dwwp_edit_columns_slides($col) {
	
	unset($col['date']);

	$col['slide-link'] = 'Link';
	$col['slide-text'] = 'Text';
	$col['slide-image'] = 'Image';

	return $col;
}
add_filter( 'manage_slider_posts_columns', 'dwwp_edit_columns_slides' );

function dwwp_add_value_to_column_slide($column) {

	global $post;
	$value = '__';

	switch ($column) {
		case 'slide-link':
			$value = get_post_meta( $post->ID, 'slide-link', true );
			break;

		case 'slide-text':
			$value = get_the_content();
			break;

		case 'slide-image':
			$value = "<img src='" . get_the_post_thumbnail_url() . "' height='80px' />";
			break;
	}

	echo $value;
}
add_filter( 'manage_slider_posts_custom_column', 'dwwp_add_value_to_column_slide' );

/*=====  End of Slider All Slides Manage Culomn  ======*/

/*==================================================
=            All Services Manage Culomn            =
==================================================*/

function dwwp_edit_columns_services($col) {
	
	unset($col['date']);

	$col['service-price'] = 'Price';
	$col['service-feat-one'] = 'Feature One';
	$col['service-feat-two'] = 'Feature Two';
	$col['service-feat-Three'] = 'Feature Three';

	return $col;
}
add_filter( 'manage_service_posts_columns', 'dwwp_edit_columns_services' );

function dwwp_add_value_to_column_service($column) {

	global $post;
	$value = '__';

	switch ($column) {
		case 'service-price':
			$value = get_post_meta( get_the_ID(), 'price', true );
			break;

		case 'service-feat-one':
			$value = get_post_meta( get_the_ID(), 'feat-one', true );
			break;

		case 'service-feat-two':
			$value = get_post_meta( get_the_ID(), 'feat-two', true );
			break;

		case 'service-feat-Three':
			$value = get_post_meta( get_the_ID(), 'feat-three', true );
			break;	
	}

	echo $value;
}
add_filter( 'manage_service_posts_custom_column', 'dwwp_add_value_to_column_service' );

/*=====  End of All Services Manage Culomn  ======*/

/*=========================================================
=            All Member Our Team Manage Coulmn            =
=========================================================*/

function dwwp_edit_columns_member($col) {
	
	unset($col['date']);

	$col['member-jop'] = 'Jop';
	$col['member-face'] = 'Facebook';
	$col['member-twitter'] = 'Twitter';
	$col['member-google'] = 'Google+';
	$col['member-image'] = 'Image';

	return $col;
}
add_filter( 'manage_member_posts_columns', 'dwwp_edit_columns_member' );

function dwwp_add_value_to_column_member($column) {

	global $post;
	$value = '__';

	switch ($column) {
		case 'member-jop':
			$value = get_post_meta( get_the_ID(), 'jop', true );
			break;

		case 'member-face':
			$value = get_post_meta( get_the_ID(), 'face', true );
			break;

		case 'member-twitter':
			$value = get_post_meta( get_the_ID(), 'twitter', true );
			break;	

		case 'member-google':
			$value = get_post_meta( get_the_ID(), 'google', true );
			break;	

		case 'member-image':
			$value = "<img src='" . get_the_post_thumbnail_url() . "' height='80px' />";
			break;			
	}

	echo $value;
}
add_filter( 'manage_member_posts_custom_column', 'dwwp_add_value_to_column_member' );

/*=====  End of All Member Our Team Manage Coulmn  ======*/

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

function woo_in_cart($product_id) {
    global $woocommerce;
 
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
 
        if($product_id == $_product->id ) {
            return true;
        }
    }
 
    return false;
}


 ?>
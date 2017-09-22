<?php  


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

/*=====  End of Register Post Type AboutUs  ======*/

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

/*======  End of Add Metabox To ourteam  ========*/

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
	echo '<i class="icon-smile-logo" style=" font-size: 55px; "></i>';
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


?>
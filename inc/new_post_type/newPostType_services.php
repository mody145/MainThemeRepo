<?php  

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

/*======  End of Add Metabox To Services  ========*/

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

/*=========  End of Register Submenu (services) ==========*/


?>
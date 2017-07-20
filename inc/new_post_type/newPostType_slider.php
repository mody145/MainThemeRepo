<?php  

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

?>
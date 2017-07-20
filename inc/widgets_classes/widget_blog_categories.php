<?php 

/*===============================================
=            Widget Catigories Blog             =
===============================================*/

class custom_categories_wigdet extends WP_Widget {
	
	public function __construct() {
		parent::__construct('categories_list', 'List Categories', array(
				'description' => 'Custom Widget List Of Categories',
			));
	}

	/* ---||  Form In Admin Page  ||--- */

	public function form($instace) { ?>

		<p> <!-- Title Field -->
			<label for="<?php echo $this->get_field_id('categories_title2'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('categories_title2'); ?>" 
			value="<?php echo $instace['categories_title2'] ?>" 
			name="<?php echo $this->get_field_name('categories_title2'); ?>" 
			type="text" 
			class="widefat" />
		</p>

	<?php } 

	/* ---||  Template Widget In site  ||--- */

	public function Widget($args, $instace) {
		
		echo $args['before_widget']; ?>

		<div class="list_categories">

		<?php

		$links = wp_list_categories( array(
			'show_count' 			=> true,
			'style' 				=> 'list',
			'hide_title_if_empty' 	=> true,
	        'order'               	=> 'DESC',
	        'orderby'             	=> 'count',
	        'echo' 					=> 0,
	        'separator' 			=> '',
	        'title_li' 				=> '',
	        'hierarchical' 			=> false
			) );

		$links = str_replace('</a> (', '</a> <span class="count">', $links);
		$links = str_replace(')', '</span>', $links);

		echo $links;

		echo '</div>'; 
		echo $args['after_widget'];
	}
}

/*=====  End of Widget Catigories Blog   ======*/


 ?>
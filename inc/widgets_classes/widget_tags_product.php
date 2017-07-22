<?php 

/*=========================================
=            Widget Tags Posts            =
=========================================*/

class tags_product_cloud_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct('tags_products_cloud', 'Products Tags', array(
				'description' => 'To Show Products Tags',
			));
	}

	/* ---||  Form In Admin Page  ||--- */

	public function form($instace) { ?>

		<p> <!-- Title Field -->
			<label for="<?php echo $this->get_field_id('tags_products_title'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('tags_products_title'); ?>" 
			value="<?php echo $instace['tags_products_title'] ?>" 
			name="<?php echo $this->get_field_name('tags_products_title'); ?>" 
			type="text" 
			class="widefat" />
		</p>

	<?php } 

	/* ---||  Template Widget In site  ||--- */

	public function Widget($args, $instace) {
		
		echo $args['before_widget']; 
		echo '<div class="list_posts_tags">';

		echo $args['before_title'];
		echo '<i class="icon-tag4"></i>&nbsp;' . $instace['tags_products_title'];
		echo $args['after_title'];

		$tags = get_tags( array(
			'number'		=> '20'
			) );

		echo '<div class="parent-tags">'; 

			$tagsTerm = get_terms( array( 'taxonomy' => 'product_tag', 'number' => 20 ) ); 
			$countTags = count($tagsTerm); 
			for ($i=0; $i < $countTags; $i++) { 

				echo '<span class="tag-in-widget"><i class="icon-tag3"></i>&nbsp;<a href="' . get_term_link( $tagsTerm[$i]->term_id ) . '">' . $tagsTerm[$i]->name . '</a></span>';
			}

		echo '</div>';

		echo '</div>';
		echo $args['after_widget'];
	}
}

/*=====  End of Widget Tags Posts  ======*/


 ?>
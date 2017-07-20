<?php 

/*===================================================
=            Create Custom Widget About Us          =
===================================================*/

class custom_widget_about_us extends WP_Widget {
	
	public function __construct() {
		parent::__construct('about_us', 'About Us Box', array(
				'description' => 'Authers Information Box With Title, Image And Details',
			));
	}

	/* ---||  Template Widget In site  ||--- */

	public function Widget($one, $two) {
		
		echo $one['before_widget'];

		echo '<div class="dwwp-sidebar-custom-widget-about-us">';

		echo $one['before_title'];
		echo '<i class="icon-pen-point-tip"> </i> ' . $two['title1'];
		echo $one['after_title']; ?>
	
			<div><img src="<?php echo $two['author_box_image']; ?>" /></div>
			<p><?php echo $two['author_bio']; ?> ... </p>

		<?php echo $one['after_widget'];
		echo '</div>'; }

	/* ---||  Form In Admin Page  ||--- */

	public function form($three) { ?>

		<p> <!-- Title Field -->
			<label for="<?php echo $this->get_field_id('title1'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('title1'); ?>" 
			value="<?php echo $three['title1'] ?>" 
			name="<?php echo $this->get_field_name('title1'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p> <!-- Upload Image Button -->
			<button 
			class="button button-secondary" 
			id="Author_Info_Image">Upload Image</button>

			<!-- Link Of Image Field -->
			<input 
			type="text" 
			value="<?php echo $three['author_box_image']; ?>" 
			name="<?php echo $this->get_field_name('author_box_image'); ?>" 
			class="image_er_link" />

			<!-- Show Image -->
			<div class="show_image"><img src="<?php echo $three['author_box_image']; ?>" max-width='300px' height='auto' /></div>
		</p>
		<p> <!-- Text Field -->
			<label for="<?php echo $this->get_field_id('author_bio'); ?>">Author Bio : </label>
			<textarea id="<?php echo $this->get_field_id('author_bio'); ?>" name="<?php echo $this->get_field_name('author_bio'); ?>" class="widefat" rows="5" /><?php if(isset($three['author_bio'])) { echo $three['author_bio']; } ?></textarea>
		</p>

		<?php } }

/*=============  End of Create Custom Widget  =============*/

 ?>
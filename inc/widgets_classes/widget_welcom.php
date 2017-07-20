<?php 

/*==================================================
=            Create Custom Widget welcome          =
==================================================*/

class custom_widget_welcome extends WP_Widget {
	
	public function __construct() {
		parent::__construct('welcome', 'Welcome Message', array(
				'description' => 'This Message Will Be Show In Front Page',
			));
	}

	/* ---||  Template Widget In site  ||--- */

	public function Widget($one, $two) {
		
		echo $one['before_widget']; ?>

		<div class="welcome">
		<h3><i class="icon-sound"> </i><?php echo $two['welcome_title'] ?></h3>
		<p><?php echo $two['welcome_msg']; ?></p>

		<?php echo $one['after_widget'];
		echo '</div>'; }

	/* ---||  Form In Admin Page  ||--- */

	public function form($two) { ?>

		<p> <!-- Title Field -->
			<label for="<?php echo $this->get_field_id('welcome_title'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('welcome_title'); ?>" 
			value="<?php echo $two['welcome_title'] ?>" 
			name="<?php echo $this->get_field_name('welcome_title'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p> <!-- Text Field -->
			<label for="<?php echo $this->get_field_id('welcome_msg'); ?>">Message : </label>
			<textarea id="<?php echo $this->get_field_id('welcome_msg'); ?>" name="<?php echo $this->get_field_name('welcome_msg'); ?>" class="widefat" rows="5" /><?php if(isset($two['welcome_msg'])) { echo $two['welcome_msg']; } ?></textarea>
		</p>

	<?php } 
}

/*=============  End of Create Custom Widget  =============*/

 ?>
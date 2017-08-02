<?php 

class ads_here_sidebar extends WP_Widget {

	
	public function __construct() {
		parent::__construct('ads_here', 'Ads Here', array(
				'description' => 'Advertice Place',
			));
	}

	/* ---||  Template Widget In site  ||--- */

	public function Widget($one, $two) {
		

		echo $one['before_widget']; ?>
		<div class="dwwp-sidebar-custom-widget-ads-here">
	
			<div><a href="<?php echo $two['ads__link']; ?>"><img class="ads-here" src="<?php echo $two['ads_image_link']; ?>" /></a></div>

		</div>
		<?php echo $one['after_widget']; }

	/* ---||  Form In Admin Page  ||--- */

	public function form($three) { ?>

		<p> <!-- Upload Image Button -->
			<button 
			class="button button-secondary" 
			id="Author_Info_Image">Upload Image</button>

			<!-- Link Of Image Field -->
			<input 
			type="text" 
			value="<?php echo $three['ads_image_link']; ?>" 
			name="<?php echo $this->get_field_name('ads_image_link'); ?>" 
			class="image_er_link" />

			<!-- Show Image -->
			<div class="show_image"><img src="<?php echo $three['ads_image_link']; ?>" max-width='300px' height='auto' /></div>
		</p>
		<p> <!-- Linl Field -->
			<input 
			type="text" 
			value="<?php echo $three['ads__link']; ?>" 
			name="<?php echo $this->get_field_name('ads__link'); ?>" 
			class="link_ads" />
		</p>

		<?php } }

 ?>
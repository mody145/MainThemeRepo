<?php 

class big_ads_here_sidebar extends WP_Widget {

	
	public function __construct() {
		parent::__construct('big_ads_here', 'Ads Here Index', array(
				'description' => 'Advertice Place',
			));
	}

	/* ---||  Template Widget In site  ||--- */

	public function Widget($one ,$two) { ?>
	
		<div class="ads-here-big">
			<a href="<?php echo $two['big_ads__link']; ?>">
				<img class="ads-here img-responsive" src="<?php echo $two['big_ads_image_link']; ?>" />
			</a>
		</div>

	<?php }

	/* ---||  Form In Admin Page  ||--- */

	public function form($three) { ?>

		<p> <!-- Upload Image Button -->
			<button 
			class="button button-secondary" 
			id="Author_Info_Image">Upload Image</button>

			<!-- Link Of Image Field -->
			<input 
			type="text" 
			value="<?php echo $three['big_ads_image_link']; ?>" 
			name="<?php echo $this->get_field_name('big_ads_image_link'); ?>" 
			class="image_er_link" />

			<!-- Show Image -->
			<div class="show_image"><img src="<?php echo $three['big_ads_image_link']; ?>" max-width='300px' height='auto' /></div>
		</p>
		<p> <!-- Linl Field -->
			<input 
			type="text" 
			value="<?php echo $three['big_ads__link']; ?>" 
			name="<?php echo $this->get_field_name('big_ads__link'); ?>" 
			class="big_link_ads" />
		</p>

		<?php } }

 ?>
<?php 


/*=========================================================
=            	  Create Social Media Widget              =
=========================================================*/

class social_media_icon_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct('social_media', 'Social Media', array(
				'description' => 'Social Media Icons For Web',
			));
	}

	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('titleSocialMedia'); ?>">The Title : </label>
			<input id="<?php echo $this->get_field_id('titleSocialMedia'); ?>" 
			value="<?php echo $instace['titleSocialMedia'] ?>" 
			name="<?php echo $this->get_field_name('titleSocialMedia'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('YouTube'); ?>">YouTube Link : </label>
			<input id="<?php echo $this->get_field_id('YouTube'); ?>" 
			value="<?php echo $instace['YouTube'] ?>" 
			name="<?php echo $this->get_field_name('YouTube'); ?>" 
			type="text" 
			class="widefat" />
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook Link : </label>
			<input id="<?php echo $this->get_field_id('facebook'); ?>" 
			value="<?php echo $instace['facebook'] ?>" 
			name="<?php echo $this->get_field_name('facebook'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter Link : </label>
			<input id="<?php echo $this->get_field_id('twitter'); ?>" 
			value="<?php echo $instace['twitter'] ?>" 
			name="<?php echo $this->get_field_name('twitter'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus'); ?>">Google+ Link : </label>
			<input id="<?php echo $this->get_field_id('google_plus'); ?>" 
			value="<?php echo $instace['google_plus'] ?>" 
			name="<?php echo $this->get_field_name('google_plus'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Dribbble'); ?>">Dribbble Link : </label>
			<input id="<?php echo $this->get_field_id('Dribbble'); ?>" 
			value="<?php echo $instace['Dribbble'] ?>" 
			name="<?php echo $this->get_field_name('Dribbble'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Vimeo'); ?>">Vimeo Link : </label>
			<input id="<?php echo $this->get_field_id('Vimeo'); ?>" 
			value="<?php echo $instace['Vimeo'] ?>" 
			name="<?php echo $this->get_field_name('Vimeo'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('soundcloud'); ?>">soundcloud Link : </label>
			<input id="<?php echo $this->get_field_id('soundcloud'); ?>" 
			value="<?php echo $instace['soundcloud'] ?>" 
			name="<?php echo $this->get_field_name('soundcloud'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('behance'); ?>">behance Link : </label>
			<input id="<?php echo $this->get_field_id('behance'); ?>" 
			value="<?php echo $instace['behance'] ?>" 
			name="<?php echo $this->get_field_name('behance'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>">instagram Link : </label>
			<input id="<?php echo $this->get_field_id('instagram'); ?>" 
			value="<?php echo $instace['instagram'] ?>" 
			name="<?php echo $this->get_field_name('instagram'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('github'); ?>">github Link : </label>
			<input id="<?php echo $this->get_field_id('github'); ?>" 
			value="<?php echo $instace['github'] ?>" 
			name="<?php echo $this->get_field_name('github'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];

		echo $args['before_title'];
		echo '<i class="icon-share-alt"></i>&nbsp;' . $instace['titleSocialMedia'];
		echo $args['after_title'];

		echo '<div class="social-media-icon-widget">';

		?>
			<a class="YouTube" href='<?php echo $instace['YouTube'] ?>'><span class="overlay"></span><i class="icon-youtube-play"> </i> <span>YouTube</span></a>
			<a class="facebook" href='<?php echo $instace['facebook']; ?>'><span class="overlay"></span><i class="icon-facebook2"> </i> <span>Facebook</span></a>
			<a class="twitter" href='<?php echo $instace['twitter'] ?>'><span class="overlay"></span><i class="icon-twitter2"> </i> <span>Twitter</span></a>
			<a class="google_plus" href='<?php echo $instace['google_plus'] ?>'><span class="overlay"></span><i class="icon-google-plus"> </i> <span>Google+</span></a>
			<a class="Dribbble" href='<?php echo $instace['Dribbble'] ?>'><span class="overlay"></span><i class="icon-dribbble2"> </i> <span>Dribbble</span></a>
			<a class="Vimeo" href='<?php echo $instace['Vimeo'] ?>'><span class="overlay"></span><i class="icon-vimeo"> </i> <span>Vimeo</span></a>
			<a class="soundcloud" href='<?php echo $instace['soundcloud'] ?>'><span class="overlay"></span><i class="icon-soundcloud"> </i> <span>Soundcloud</span></a>
			<a class="behance" href='<?php echo $instace['behance'] ?>'><span class="overlay"></span><i class="icon-behance"> </i> <span>behance</span></a>
			<a class="instagram" href='<?php echo $instace['instagram'] ?>'><span class="overlay"></span><i class="icon-instagram"> </i> <span>instagram</span></a>
			<a class="github" href='<?php echo $instace['github'] ?>'><span class="overlay"></span><i class="icon-github"> </i> <span>github</span></a>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*==========  End of Create Social Media Widget   ============*/


 ?>
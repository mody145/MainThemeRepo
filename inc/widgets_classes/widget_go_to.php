<?php 


/*==============================================================
=            Section Custom Widget Go To Shop                  =
==============================================================*/

class go_to_shop_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct('go_to_shop', 'Go To ...', array(
				'description' => 'Speed Link To Go ...',
			));
	}

	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('Title_to_shop'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('Title_to_shop'); ?>" 
			value="<?php echo $instace['Title_to_shop'] ?>" 
			name="<?php echo $this->get_field_name('Title_to_shop'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Link'); ?>">Link : </label>
			<input id="<?php echo $this->get_field_id('Link'); ?>" 
			value="<?php echo $instace['Link']; ?>" 
			name="<?php echo $this->get_field_name('Link'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon_go_to_shop'); ?>">Icon : </label>
			<input id="<?php echo $this->get_field_id('icon_go_to_shop'); ?>" 
			value="<?php echo $instace['icon_go_to_shop']; ?>" 
			name="<?php echo $this->get_field_name('icon_go_to_shop'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon_go_to_shop_color'); ?>">Color : </label>
			<input id="<?php echo $this->get_field_id('icon_go_to_shop_color'); ?>" 
			value="<?php echo $instace['icon_go_to_shop_color']; ?>" 
			name="<?php echo $this->get_field_name('icon_go_to_shop_color'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Background-Color'); ?>">Background-Color : </label>
			<input id="<?php echo $this->get_field_id('Background-Color'); ?>" 
			value="<?php echo $instace['Background-Color']; ?>" 
			name="<?php echo $this->get_field_name('Background-Color'); ?>" 
			type="text" 
			class="widefat" />
		</p>	
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];

		echo '<div class="go-to-shop-widget">';

		?>
			<a href='<?php echo $instace['Link'] ?>'>
			<div style="color:<?php echo $instace['icon_go_to_shop_color'] ?>;background-color: <?php echo $instace['Background-Color'] ?>">
				<?php echo $instace['icon_go_to_shop']; ?>
				<p><?php echo $instace['Title_to_shop']; ?></p>
			</div>
			</a>

		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*========  End of Section Custom Widget Go To ... =========*/


 ?>
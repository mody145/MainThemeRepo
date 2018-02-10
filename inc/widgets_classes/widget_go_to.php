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
			<label for="<?php echo $this->get_field_id('color_go_to_shop'); ?>">Color : </label>
			<input id="<?php echo $this->get_field_id('color_go_to_shop'); ?>" 
			value="<?php echo $instace['color_go_to_shop']; ?>" 
			name="<?php echo $this->get_field_name('color_go_to_shop'); ?>" 
			type="text" 
			class="widefat" />
		</p>
	
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];

		echo '<div class="go-to-shop-widget">';

		$colorsMain = array();

		$color2 = esc_attr( get_option( 'color2' ) ); 
		$color3 = esc_attr( get_option( 'color3' ) ); 
		$color4 = esc_attr( get_option( 'color4' ) ); 
		$color5 = esc_attr( get_option( 'color5' ) ); 
		$color6 = esc_attr( get_option( 'color6' ) ); 
		$color7 = esc_attr( get_option( 'color7' ) );

		$colorsMain[] = $color3;
		$colorsMain[] = $color4;
		$colorsMain[] = $color5;
		$colorsMain[] = $color6;
		$colorsMain[] = $color7;

		//pre($colorsMain);

		$randomColor = array_rand($colorsMain);

		//pre($colorsMain[$randomColor]);

		?>
			<?php

			 $theColor = '#fff';

			if ( $instace['color_go_to_shop'] == 1 ) { $theColor = $colorsMain[0]; }
			elseif( $instace['color_go_to_shop'] == 2 ) { $theColor = $colorsMain[1]; } 
			elseif( $instace['color_go_to_shop'] == 3 ) { $theColor = $colorsMain[2]; } 
			elseif( $instace['color_go_to_shop'] == 4 ) { $theColor = $colorsMain[3]; } 
			elseif( $instace['color_go_to_shop'] == 5 ) { $theColor = $colorsMain[4]; } 
			else { echo $colorsMain[$randomColor];  } 

			 ?>
			<a href='<?php echo $instace['Link'] ?>'>
			<div style="color:<?php echo $theColor; ?>;background-color: <?php echo $color2;  ?>">
				<?php echo '<span class="wrap-icon"><i class="' . $instace['icon_go_to_shop'] . '"></i></span>'; ?>
				<?php echo '<span class="wrap-icon"><i class="' . $instace['icon_go_to_shop'] . '"></i></span>'; ?>
				<p style="color:<?php echo $theColor; ?>"><?php echo $instace['Title_to_shop']; ?></p>
			</div>
			</a>

		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*========  End of Section Custom Widget Go To ... =========*/


 ?>
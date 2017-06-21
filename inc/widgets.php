<?php

require 'Database.class.php';

/*==================================================
=                Register Sidebar          		  =
==================================================*/

function ourWidgetsInit() {

	register_sidebar(array(
		'name' 			=> 'Right Sidebar',
		'id' 			=> 'right-sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Right',
		'class' 		=> 'right-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

	register_widget( 'custom_widget_about_us' );
	register_widget( 'social_media_icon_Widget' );
	register_widget( 'go_to_shop_widget' );
	register_widget( 'latest_posts_blog' );
}
add_action('widgets_init', 'ourWidgetsInit');

/*==========  End of Register Sidebar  ===========*/

/*==================================================
=                ( Footer1 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer() {

	register_sidebar(array(
		'name' 			=> 'Footer',
		'id' 			=> 'footer_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer');

/*==========  End of ( Footer1 ) Sidebar  ===========*/

/*==================================================
=                ( Footer2 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer2() {

	register_sidebar(array(
		'name' 			=> 'Footer 2',
		'id' 			=> 'footer2_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer2-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer2">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer2');

/*==========  End of ( Footer2 ) Sidebar  ===========*/

/*==================================================
=                ( Footer3 ) Sidebar          	  =
==================================================*/

function ourWidgetsInit_footer3() {

	register_sidebar(array(
		'name' 			=> 'Footer 3',
		'id' 			=> 'footer3_sidebar',
		'description' 	=> 'The Widgets Sidebar Will Be Here At The Footer',
		'class' 		=> 'footer3-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget-footer3">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

}
add_action('widgets_init', 'ourWidgetsInit_footer3');

/*==========  End of ( Footer3 ) Sidebar  ===========*/

/*==================================================
=                Welcome Widget  	          	   =
==================================================*/

function ourWidgetsInit_welcome() {

	register_sidebar(array(
		'name' 			=> 'Welcome Msg',
		'id' 			=> 'welcome_msg',
		'description' 	=> 'The Widget Message Welcome',
		'class' 		=> 'welcome-widget-class',
		'before_widget' => '<div class="custom-widget-welcome">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

	register_widget( 'custom_widget_welcome' );

}
add_action('widgets_init', 'ourWidgetsInit_welcome');

/*============  End of Welcome Widget  =============*/

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
			<p><?php echo $two['author_bio']; ?></p>

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

/*========================================================
=            Widget Latest Posts In The Blog             =
========================================================*/

class latest_posts_blog extends WP_Widget {

	public function __construct() {
		parent::__construct('latest_posts_in_the_blog', 'Latest Posts', array(
				'description' => 'Latest Posts In The Blog',
			));
	}

	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('title'); ?>" 
			value="<?php echo $instace['title'] ?>" 
			name="<?php echo $this->get_field_name('title'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Count Of Posts : </label>
			<input id="<?php echo $this->get_field_id('count'); ?>" 
			value="<?php echo $instace['count'] ?>" 
			name="<?php echo $this->get_field_name('count'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];
		echo '<div class="latest-posts-blog-widget">';

		echo $args['before_title'];
		echo '<i class="icon-chronometer"> </i> ' . $instace['title'];
		echo $args['after_title'];

		$count = $instace['count']; 

		$args_post = array(
			'post_type' 	=> 'post',
			'posts_per_page' => $count,
			);
		
		$post = new WP_Query($args_post); ?>

		<div id="latest_posts_widget" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

		        <?php query_posts ('posts_per_page=5');
		        if ($post->have_posts()) { while ($post->have_posts()) { $post->the_post(); ?>

				<div class="item <?php if ($post->current_post == 0) { echo 'active'; } ?>">
					<a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image"></a>
					<div class="date">
						<span class="day"><?php echo get_the_date('d'); ?></span>
						<span class="mounth"><?php echo get_the_date('M'); ?></span>
					</div>
					<div class="carousel-caption">
						<a href="<?php echo get_permalink(); ?>"><h5><?php echo the_title(); ?></h5></a>
						<p class="decsription"><?php echo $str = substr(get_the_content(), 0, 70) . ' ... <a href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info-for-the-post"><span class="bold"><i class="icon-user2"> </i> By : </span> <?php echo get_the_author(); ?> | <span class="bold"><i class="icon-bubble"> </i> Commments : </span> <?php echo  get_comments_number(); ?></p>
					</div>
				</div>

			<?php } ?>

			<?php wp_reset_query(); ?>

			<?php } ?>

			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#latest_posts_widget" role="button" data-slide="prev">
				<i class="icon-chevron-left2"></i>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#latest_posts_widget" role="button" data-slide="next">
				<i class="icon-chevron-right2"></i>
				<span class="sr-only">Next</span>
			</a>

		</div>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}		
}

/*=====  End of Widget Latest Posts In The Blog   ======*/

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
		echo '<div class="social-media-icon-widget">';

		?>
			<a href='<?php echo $instace['YouTube'] ?>'><i class="icon-youtube-play"> </i> <span>YouTube</span></a>
			<a href='<?php echo $instace['facebook']; ?>'><i class="icon-facebook2"> </i> <span>Facebook</span></a>
			<a href='<?php echo $instace['twitter'] ?>'><i class="icon-twitter2"> </i> <span>Twitter</span></a>
			<a href='<?php echo $instace['google_plus'] ?>'><i class="icon-google-plus"> </i> <span>Google+</span></a>
			<a href='<?php echo $instace['Dribbble'] ?>'><i class="icon-dribbble2"> </i> <span>Dribbble</span></a>
			<a href='<?php echo $instace['Vimeo'] ?>'><i class="icon-vimeo"> </i> <span>Vimeo</span></a>
			<a href='<?php echo $instace['soundcloud'] ?>'><i class="icon-soundcloud"> </i> <span>Soundcloud</span></a>
			<a href='<?php echo $instace['behance'] ?>'><i class="icon-behance"> </i> <span>behance</span></a>
			<a href='<?php echo $instace['instagram'] ?>'><i class="icon-instagram"> </i> <span>instagram</span></a>
			<a href='<?php echo $instace['github'] ?>'><i class="icon-github"> </i> <span>github</span></a>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*==========  End of Create Social Media Widget   ============*/

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

/*===================================================
=            Create Custom Widget About Us          =
===================================================*/

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

		<?php } }

/*=============  End of Create Custom Widget  =============*/

/*=================================================
=            Widget Top Itemes In Shop            =
=================================================*/

function ourWidgetsInit_shop() {

	register_sidebar(array(
		'name' 			=> 'Shop Sidebar',
		'id' 			=> 'shop-sidebar',
		'description' 	=> 'This Widget Will Be Show If Plugin Shop Is Avtive',
		'class' 		=> 'shop-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

	register_widget( 'top_items_in_shop' );
}
add_action('widgets_init', 'ourWidgetsInit_shop');




           	/* --|| Top Items In Shop Widget ||-- */          	 
class top_items_in_shop extends WP_Widget {

	public function __construct() {
		parent::__construct('top_items', 'Latest Items', array(
				'description' => 'Top Items In Shop',
			));
	}
	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('Title_top'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('Title_top'); ?>" 
			value="<?php echo $instace['Title_top'] ?>" 
			name="<?php echo $this->get_field_name('Title_top'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Items'); ?>">Count Of Items : </label>
			<input id="<?php echo $this->get_field_id('Items'); ?>" 
			value="<?php echo $instace['Items'] ?>" 
			name="<?php echo $this->get_field_name('Items'); ?>" 
			type="text" 
			class="widefat" />
		</p>		
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];
		echo '<div class="top-items-shop-widget">';

		echo $args['before_title'];
		echo '<i class="icon-chronometer"> </i> ' . $instace['Title_top'];
		echo $args['after_title']; ?>

		<div id="top_items_widget" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

			<?php $i = 0; ?>

			<?php 

			$woo = array(
				'post_type' 		=> 'product',
				'posts_per_page' 	=> 5,
				'orderby' 			=> 'rating',
				'stock' 			=> 1,
				);
			$shop = new WP_Query($woo);
			while ($shop->have_posts()) {
				$shop->the_post();
				global $product; ?>

			<!-- Loop All Info For Item -->

				<?php if ($i == 0) { ?>

				<!-- Add Class Active -->
				<div class="item <?php echo 'active'; ?>">
				<?php }else { ?>
				<div class="item <?php echo ''; ?>">
				<?php } ?>
					<a href="<?php echo get_the_permalink(); ?>">
						<?php if(has_post_thumbnail( $shop->post->ID )) { echo '<img src="' . get_the_post_thumbnail_url( $shop->post->ID ) . '" />'; } ?>
					</a>

						<?php if ( $product->is_on_sale() ) { ?>
						<span class="sale"><i class="icon-sale"></i></span>
						<?php } else { echo ''; } ?>

					<div class="info-item">
						<span class="likes">
							<?php $rating = $product->get_average_rating(); ?>
							<fieldset id='demo3' class="rating" data-toggle="tooltip" title="Can't Rating From Here ... You Can This From Item Page">
			                	<div class="tooltip top" role="tooltip">
									<div class="tooltip-arrow"></div>
									<div class="tooltip-inner">
									Can't Rating From Here ... You Can This From Item Page
									</div>
			                	</div>

			                	<!-- Start -->
			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 5) { echo "checked='checked'"; } ?> id="1star53" name="rating1" value="5" />
			                    <label class = "full" for="1star53"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4.5 && $rating < 5) { echo "checked='checked'"; } ?> id="1star4half3" name="rating2" value="4.5" />
			                    <label class="half" for="1star4half3"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4 && $rating < 4.5) { echo "checked='checked'"; } ?> id="1star43" name="rating3" value="4" />
			                    <label class = "full" for="1star43"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3.5 && $rating < 4) { echo "checked='checked'"; } ?> id="1star3half3" name="rating4" value="3.5" />
			                    <label class="half" for="1star3half3"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3 && $rating < 3.5) { echo "checked='checked'"; } ?> id="1star33" name="rating5" value="3" />
			                    <label class = "full" for="1star33"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2.5 && $rating < 3) { echo "checked='checked'"; } ?> id="1star2half3" name="rating6" value="2.5" />
			                    <label class="half" for="1star2half3"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2 && $rating < 2.5) { echo "checked='checked'"; } ?> id="1star23" name="rating7" value="2" />
			                    <label class = "full" for="1star23"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1.5 && $rating < 2) { echo "checked='checked'"; } ?> id="1star1half3" name="rating8" value="1.5" />
			                    <label class="half" for="1star1half3"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1 && $rating < 1.5) { echo "checked='checked'"; } ?> id="1star13" name="rating9" value="1" />
			                    <label class = "full" for="1star13"></label>

			                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 0.5 && $rating < 1) { echo "checked='checked'"; } ?> id="1starhalf3" name="rating10" value="0.5" />
			                    <label class="half" for="1starhalf3"></label>

			                </fieldset>
						</span>
							<span class="price">
							<?php echo  '<span class="main-price"><i class="icon-usd"> </i> ';

							if ( $product->is_on_sale() ) { echo $product->get_sale_price(); } else { echo $product->get_regular_price(); }
							echo '</span>'; ?>
							<!-- Check If On Sale -->
							<?php if ( $product->is_on_sale() ) { echo "<span class='price-without-disc'> <i class='icon-usd'></i> " . $product->get_regular_price() . " </span>"; } else { echo ''; } ?>
						</span>
					</div>
					<!-- Product Info -->
					<div class="carousel-caption">
						<a href="<?php echo get_the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
						<?php if ( $product->is_on_sale() ) { ?>
						<span class='discount-number'>This Item Have Discount <div class='numberCircle'><?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?></div></span>
						<?php } else { echo ''; } ?>

						<p class="decsription"><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="#">Read More</a>'; ?></p>
						<p class="info-for-the-post text-center"><span class="bold"><i class="icon-bubble"> </i></span><?php print_r($shop->post->comment_count); ?>
						 | <span class="bold"><i class="icon-stack"> </i></span> 
						 <!-- Get Categories Names -->
						 <?php
						  $cats = $product->get_category_ids(); 
						  foreach ($cats as $cat) {

						  	$term = get_term_by( 'id', $cat, 'product_cat', 'ARRAY_A' );
						  	echo ' [ ' . $term['name'] . ' ] ';
						  }
						  ?> 
						 | <span class="bold"><i class="icon-tag"> </i></span><?php if ( $product->is_on_sale() ) {  echo floor($discount) . "%"; }else{ echo "No"; } ?></p>
					</div>
				</div>

				<?php $i++; ?>

				<?php } ?>

				<?php wp_reset_query(); ?>

			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#top_items_widget" role="button" data-slide="prev">
				<i class="icon-chevron-left2"></i>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#top_items_widget" role="button" data-slide="next">
				<i class="icon-chevron-right2"></i>
				<span class="sr-only">Next</span>
			</a>

		</div>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*=====  End of Widget Top Itemes In Shop  ======*/
?>
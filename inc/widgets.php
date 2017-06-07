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
	register_widget( 'top_items_in_shop' );
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
		echo '<i class="icon-microphone5"> </i> ' . $two['title1'];
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

				<?php }} ?>

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

/*========================================================
=           	 Top Items In Shop Widget           	 =
========================================================*/

class top_items_in_shop extends WP_Widget {

	public function __construct() {
		parent::__construct('top_items', 'Top Items', array(
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
		echo '<i class="icon-thumbs-up"> </i> ' . $instace['Title_top'];
		echo $args['after_title'];

		global $wpdb;
		$getRows = $wpdb->get_results( "SELECT * FROM items ORDER BY Likes DESC LIMIT " . $instace['Items'] . "" );

		?>
		<div id="top_items_widget" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

			<?php $i = 0; ?>

			<!-- Loop All Info For Item -->
			<?php foreach ($getRows as $Row) { ?>

				<?php if ($i == 0) { ?>

				<!-- Add Class Active -->
				<div class="item <?php echo 'active'; ?>">
				<?php }else { ?>
				<div class="item <?php echo ''; ?>">
				<?php } ?>
					<a href="#"><img src="http://placehold.it/300/444" alt="Test"></a>
					<div class="info-item">
						<span class="likes"><?php echo $Row->Likes ?> <i class="icon-thumbs-o-up"></i></span>
						<span class="price"><?php echo  '<span class="bold">' . $Row->Price . '</span>' . ' <i class="icon-dollar"></i>'; ?><?php if ($Row->i_price != 0 && $Row->i_price != NULL ) { echo " /<sub>" . $Row->i_price . " $</sub>"; } else { echo ''; } ?></span>
						<?php if ($Row->i_price != 0 && $Row->i_price != NULL ) { ?>
						<span class="sale"><i class="icon-sale"></i></span>
						<?php } else { echo ''; } ?>
					</div>
					<div class="carousel-caption">
						<a href="#"><h5><?php echo $Row->Name ?></h5></a>

						<!-- Get Count Comments -->
						<?php $countComments =  $wpdb->get_results( "SELECT * FROM comments WHERE item_id = " . $Row->Item_ID . "" ); ?>

						<!-- Get Category Name -->
						<?php $db = new Database(); ?>
						<?php $getRows = $db->getRow( "SELECT items.*, categories.Name AS new_name FROM items INNER JOIN categories ON categories.ID = items.Cat_ID WHERE Item_ID = $Row->Item_ID" ); ?>

						<!-- Get Outher Item -->
						<?php $UserItem = $db->getRow( "SELECT items.*, categories.Name AS cate_name, users.Username AS user_name FROM items INNER JOIN categories ON categories.ID = items.Cat_ID INNER JOIN users ON users.UserID = items.Member_ID WHERE Item_ID = $Row->Item_ID" ); ?>

						<p class="decsription"><?php echo $str = substr(filter_var($Row->Full_dis, FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="#">Read More</a>'; ?></p>
						<p class="info-for-the-post"><span class="bold"><i class="icon-user2"> </i> By : </span> <?php echo $UserItem['user_name'] ?> | <span class="bold"><i class="icon-bubble"> </i> Commments : </span><?php echo count($countComments); ?></p>
						<p class="info-for-the-post"><span class="bold"><i class="icon-stack"> </i> Category : </span> <?php echo $getRows['new_name']; ?> | <span class="bold"><i class="icon-tag"> </i> discount : </span>25%</p>
					</div>
				</div>

				<?php $i++; ?>

				<?php } ?>

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

/*=========  End of Top Items In Shop Widget  ==========*/

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
		parent::__construct('go_to_shop', 'Go To Shop', array(
				'description' => 'Speed Link To Go Shop',
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
			value="<?php echo $instace['Link'] ?>" 
			name="<?php echo $this->get_field_name('Link'); ?>" 
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
			<div>
				<i class="icon-basket"></i>
				<p>Shopping Now</p>
			</div>
			</a>

		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*========  End of Section Custom Widget Go To Shop  =========*/

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
?>
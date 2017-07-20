<?php  

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
						<p class="info-for-the-post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"> <?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"> <?php echo get_the_date(); ?></span>
						</p>
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

?>
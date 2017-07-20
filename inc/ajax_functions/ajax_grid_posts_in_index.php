<?php 

add_action('wp_ajax_nopriv_sorting_grid_bosts_in_blog_box', 'sorting_grid_bosts_in_blog_box'); 
add_action('wp_ajax_sorting_grid_bosts_in_blog_box', 'sorting_grid_bosts_in_blog_box');
function sorting_grid_bosts_in_blog_box() {

	if (isset($_POST['latest'])) {

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'orderby' 			=> 'date',
			'order' 			=> 'DESC'
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">
			    		<div class="img-box align-v">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 nopadding">
			        <div class="col-md-12 nopadding">
			        	<div class="item two wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 nopadding">
		        	<div class="item three wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 nopadding">
		        	<div class="item four wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
	<?php }

	if (isset($_POST['like'])) {

		$orderBy 	= 'likes';
		$order 		= 'DESC';

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">
			    		<div class="img-box align-v">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 nopadding">
			        <div class="col-md-12 nopadding">
			        	<div class="item two wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 nopadding">
		        	<div class="item three wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 nopadding">
		        	<div class="item four wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
	<?php }

	if (isset($_POST['views'])) {

		$orderBy 	= 'views';
		$order 		= 'DESC';

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">
			    		<div class="img-box align-v">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 nopadding">
			        <div class="col-md-12 nopadding">
			        	<div class="item two wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 nopadding">
		        	<div class="item three wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 nopadding">
		        	<div class="item four wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
	<?php }

	if (isset($_POST['comments'])) {

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'orderby' 			=> 'comment_count',
			'order' 			=> 'DESC',
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">
			    		<div class="img-box align-v">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 nopadding">
			        <div class="col-md-12 nopadding">
			        	<div class="item two wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 nopadding">
		        	<div class="item three wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 nopadding">
		        	<div class="item four wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
	<?php }

	if (isset($_POST['rand'])) {

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'orderby' 			=> 'rand'
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">
			    		<div class="img-box align-v">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
						</div>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 nopadding">
			        <div class="col-md-12 nopadding">
			        	<div class="item two wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 nopadding">
		        	<div class="item three wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 nopadding">
		        	<div class="item four wow fadeIn" data-wow-delay=".<?php $i++; echo $i; ?>s">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
	<?php }
	
	wp_die();
} 

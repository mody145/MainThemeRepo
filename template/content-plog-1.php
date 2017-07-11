		<!-- ||  Posts Content  || -->
		
			<article class="post wow fadeIn">
				<div class="post-thumbnail-img">

					<span class="date-bost">
					    <span class="munth"><?php echo get_the_date('M'); ?></span>
					    <span class="day"><?php echo get_the_date('d'); ?></span>
					    <span class="year"><?php echo get_the_date('Y'); ?></span>
					</span>

					<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<a href="<?php the_permalink(); ?>">
						<?php echo '<img src="' . get_the_post_thumbnail_url() . '" />'; ?>
					</a>
					<p class="post-info">
					 <i class="icon-clock-o"></i> 
					<?php the_time('F j,Y g:i a'); ?>
					 <i class="icon-pencil2"></i> By :
					<?php the_author(); ?> 
					 <i class="icon-folder-open"></i> Posted In : 
					<?php 

					$categories =  get_the_category();
					$separator = ', ';
					$output = '';

					if ($categories) {
						foreach ($categories as $category) {
							$output .= "<a href='" . get_category_link($category->term_id) . "'>" . $category->cat_name . "</a>" . $separator;
						}
						echo trim($output, $separator);
					} ?>
						
					</p>
					<p class="info_post-2">
						<i class="icon-thumbs-o-up"> </i>&nbsp;<?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> &nbsp;
						<i class="icon-bubble"> </i>&nbsp;<?php echo  get_comments_number(); ?>  &nbsp;
						<i class="icon-eye"> </i>&nbsp;<?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> &nbsp;
					</p>
				</div>
				<p class="some-content-post"><?php echo $str = substr(get_the_content(), 0, 180) . " ..." ?><a href="<?php echo the_permalink() ?>"> Read More</a></p>
			</article>

		<!-- ||  Posts Content  || -->
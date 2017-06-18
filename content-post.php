			<article class="post">
				<div class="post-thumbnail-img">
					<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<a href="<?php the_permalink(); ?>">
						<?php echo '<img src="' . get_the_post_thumbnail_url() . '" />'; ?>
					</a>
					<p class="post-info">
					<?php the_time('F j,Y g:i a'); ?>
					 | By 
					<?php the_author(); ?>
					 | Posted In 
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
				</div>
				<p class="some-content-post"><?php echo $str = substr(get_the_content(), 0, 180) . " ..." ?><a href="<?php echo the_permalink() ?>"> Read More</a></p>
			</article>
			<article class="post">
				<div class="post-meta">
					<div class="image"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
					<div class="info">
						<a href="<?php echo get_permalink() ?>"><h3 class="bold title"><?php echo get_the_title(); ?></h3></a>
						<?php echo substr(get_the_content(), 0, 180) . " ..." ?>
						<p class="post-information">
							<span class="bold"> <i class="icon-pencil2"></i> BY : </span><?php echo get_the_author(); ?> <span class="bold"> <i class="icon-clock-o"></i> IN : </span><?php echo get_the_date(); ?>

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
					</div>
				</div>
			</article>
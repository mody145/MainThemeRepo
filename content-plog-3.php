			<article class="post">
				<div class="post-meta">
					<div class="image"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
					<div class="info">
						<a href="<?php echo get_permalink() ?>"><h3 class="bold title"><?php echo get_the_title(); ?></h3></a>
						<?php echo substr(get_the_content(), 0, 180) . " ..." ?>
						<p><span class="bold">BY : </span><?php echo get_the_author(); ?> <span class="bold">IN : </span><?php echo get_the_date(); ?></p>
					</div>
				</div>
			</article>
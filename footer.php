				<!-- Start Footer -->
				<div class="clearfix"></div>
					<div class="col-md-12 nopadding">
						<div id="footer_for_sticky">

						<?php if ( is_home() || is_shop() || is_product() ) { ?>

							<div class="category_by_images">

							<?php 

							$list = get_random_categories( 4, array( 'taxonomy' => 'product_cat' ) );

							foreach ($list as $one) { ?>

							<?php 
							    $image = '';
							    if (function_exists('z_taxonomy_image_url')) $image = z_taxonomy_image_url( $one->term_id );
							 ?>
							
								<div class="__box_categorey">
									<h4><?php echo '<a href="' . get_term_link( $one->slug, 'product_cat' ) . '">' . $one->name ?></a><span><?php echo $one->count ?>&nbsp;Products</span></h4>
									<div class="overlay_category_box"></div>
									<img src="<?php echo $image ?>" alt="<?php echo $one->name ?>">
								</div>
							
							<?php } ?>

							</div>

							<?php } elseif ( is_page( 'blog' ) || is_single() ) { ?>
								

							<div class="category_by_images_blog">

							<?php 

							$list = get_random_categories( 3, array( 'taxonomy' => 'category' ) );

							foreach ($list as $one) { ?>

							<?php 
							    $image = '';
							    if (function_exists('z_taxonomy_image_url')) $image = z_taxonomy_image_url( $one->term_id );
							 ?>
								<div class="__box_categorey">
									<h4><?php echo '<a href="' . get_term_link( $one->slug, 'category' ) . '">' . $one->name ?></a><span><?php echo $one->count ?>&nbsp;Post</span></h4>
									<div class="overlay_category_box"></div>
									<img src="<?php echo $image ?>" alt="<?php echo $one->name ?>">
								</div>

							<?php } ?>

							</div>

							<?php } ?>

							<footer class="site-footer wow fadeIn">

							<!--=====================================
							=            widget  Section            =
							======================================-->

								<div class='col-md-3 col-sm-6 nopadding pull-right text-center'>
									<?php dynamic_sidebar( 'footer3_sidebar' ); ?>
								</div>

							<!--====  End of widget  Section  ====-->
							<!--=====================================
							=            widget  Section            =
							======================================-->

								<div class='col-md-3 col-sm-6 col-xs-12 nopadding pull-right'>
									<?php dynamic_sidebar( 'footer2_sidebar' ); ?>
								</div>

							<!--====  End of widget  Section  ====-->
							<!--=====================================
							=            widget  Section            =
							======================================-->

								<div class='col-md-3 hidden-xs hidden-sm nopadding pull-right'>
									<h4>Links</h4>
									<div class="menu-footer">
										<?php $args1 = array('theme_location' => 'footer');
										wp_nav_menu( $args1 ); ?>
									</div>
								</div>

							<!--====  End of widget  Section  ====-->
							<!--=====================================
							=            widget  Section            =
							======================================-->

								<div class='col-md-3 hidden-xs hidden-sm nopadding pull-right'>

									<?php dynamic_sidebar( 'footer_sidebar' ); ?>

									<br />
									<?php if (is_page( 'contact' )) { echo ''; } else {  ?>
									<div>
										<a href="<?php echo home_url( 'contact' ); ?>" class="btn btn-primary">Contact Us</a>
									</div>

									<?php } ?>
								</div>
								

							<!--====  End of widget  Section  ====-->
							</footer>
						</div>
					</div>
				<!-- End Of Footer -->
			</div>
		</div>
		<!-- End Of Container -->
	<?php wp_footer(); ?>
	<script>new WOW().init();</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	</body>
</html>
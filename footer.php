				<!-- Start Footer -->
				<div class="clearfix"></div>
				<div id="footer_for_sticky">
					<div class="col-md-12 nopadding">
						<footer class="site-footer">

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
									<a href="<?php echo home_url( 'contact' ); ?>" class="btn btn-primary"><i class="icon-user-chat"> </i> Contact Us</a>
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
	</body>
</html>
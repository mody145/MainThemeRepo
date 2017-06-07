<?php get_header(); ?>

<div class="col-md-12 nopadding">
	<!-- Start Container Here -->
	<div class="help-container">
		<div class="how-are-we">
			<h3 class="bold"><i class="icon-magic-wand"> </i> FREQUENTLY QUESTIONS</h3>
			<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br /> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and <br />scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into<br /> electronic typesetting</p>
		</div>

		<?php // Loop All Content
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>

				<p><?php echo the_content(); ?></p>
		<?php }} ?>
	</div><!-- End Container Here -->
</div>

<?php get_footer(); ?>
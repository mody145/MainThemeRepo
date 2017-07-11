<?php get_header(); ?>

<div class="col-md-8 nopadding">
	<div class="container-form-contact-us">
		<?php echo do_shortcode( '[contact-form-7 id="550" title="Contact form 1"]' ); ?>
	</div>
</div>
<!-- Get In Touch -->
<div class="col-md-4 nopadding">
	<div class="touch-container wow fadeIn">
		<h2><?php echo esc_attr( get_option( 'title_get_touch', '' ) ); ?></h2>
		<p><?php echo esc_attr( get_option( 'description_get_touch', '' ) ); ?></p>
		<p><?php echo esc_attr( get_option( 'address_get_touch', '' ) ); ?></p>
		<p><?php echo esc_attr( get_option( 'phone_get_touch', '' ) ); ?></p>
		<p><?php echo esc_attr( get_option( 'fax_get_touch', '' ) ); ?></p>
		<p><?php echo esc_attr( get_option( 'email_get_touch', '' ) ); ?></p>
		<h3>Working Hours</h3>
		<p><span class=""><?php echo esc_attr( get_option( 'hours_get_touch', '' ) ); ?></p>
		<p>Best Regards,</p>
	</div>
</div><!-- Get In Touch -->

<?php get_footer(); ?>
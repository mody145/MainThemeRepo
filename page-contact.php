<?php get_header(); ?>

<div class="col-md-8 nopadding">
	<div class="container-form-contact-us">
		<!-- Start Form Contact Here -->
		<form id="contact-us" method="post">

			<h3 class="bold"><i class="icon-paper-plane-o"> </i> CONTACT</h3>
			<h4>Tell Us Your Project</h4>
			<!-- First Name -->
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon1"><i class="icon-chevron-right2"></i></span>
					<input  
					type="text" 
					name="first-name"
					placeholder="Type Your First Name"
					autocomplete="off" 
					class="form-control" 
					aria-describedby="basic-addon1" />
				</div>
			</div><!-- First Name -->
			<!-- Last Name -->
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon1"><i class="icon-chevron-right2"></i></span>
					<input 
					type="text" 
					name="last-name"
					class="form-control" 
					aria-describedby="basic-addon1"
					placeholder="Type Your Last Name"
					autocomplete="off" />
				</div>
			</div><!-- Last Name -->
			<!-- Email -->
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon1"><i class="icon-mail"></i></span>
					<input 
					type="email" 
					name="email"
					class="form-control" 
					aria-describedby="basic-addon1"
					placeholder="Type Your E-mail"
					autocomplete="off" />
				</div>				
			</div><!-- Email -->
			<!-- Subject -->
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon1"><i class="icon-chevron-right2"></i></span>
					<input 
					type="text" 
					name="subject"
					class="form-control" 
					aria-describedby="basic-addon1"
					placeholder="Type Your Subject"
					autocomplete="off" />
				</div>
			</div><!-- Subject -->
			<!-- Message -->
			<div class="col-md-12">
				<textarea name="message" placeholder="Type Your Message Here" rows="5"></textarea>
			</div><!-- Message -->
			<!-- Submit -->
			<div class="col-md-12">
				<button type="submit" class="btn btn-info btn-md">Send E-Mail</button>
			</div><!-- Submit -->

		</form><!-- End Form Contact Here -->
	</div>
</div>
<!-- Get In Touch -->
<div class="col-md-4 nopadding">
	<div class="touch-container">
		<h2>get in touch</h2>
		<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
		<p>8901 mamora road</p>
		<p>Egypt do4 89GR</p>
		<p>phone : +01208086359</p>
		<p>fax : +56464564654</p>
		<p>E-mail : Elpop102011@gmail.com</p>
		<h3>Working Hours</h3>
		<p><span class="">Monday – Saturday : </span> 08AM – 22PM</p>
	</div>
</div><!-- Get In Touch -->

<?php get_footer(); ?>
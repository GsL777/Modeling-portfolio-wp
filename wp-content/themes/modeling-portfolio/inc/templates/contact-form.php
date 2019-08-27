<!-- FILES INCLUDE modeling-portfolio.js, function.php(to add ajax.php), shortcodes.php, ajax.php, theme-support.php, custom-post-type.php, contact.scss -->

<!-- in modeling-contact-form.php write a comment <p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or Post</p>
<p><code>[contact_form]</code></p> -->
<form id="modelingContactForm" class="modeling-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
<!-- Contact-form functionality in modeling-portfolio.js /*Contact form submission*/ section -->

	<div class="form-row">
		<!--<div class="form-group col-md-6 col-sm-12"> style in contact.scss -->
		<div class="form-group col-md-12 col-sm-12">
			<input type="text" class="input-style form-control" placeholder="Your Name" id="name" name="name">
			<small class="text-danger form-control-msg">Your name is Required</small>
		</div>
<!-- 		<div class="form-group col-md-6 col-sm-12">
			<input type="text" class="input-style form-control" placeholder="Your Last Name" id="lastName" name="lastName">
			<small class="text-danger form-control-msg">Your last name is Required</small>
		</div> -->
	</div>

	<!-- <div class="form-group row"> -->
		<div class="form-group col-md-12 col-sm-12">
			<input type="email" class="form-control" placeholder="Your Email" id="email" name="email">
			<small class="text-danger form-control-msg">Your Email is Required</small>
		</div>
	<!-- </div> -->

	<div class="form-group">
		<textarea name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
		<small class="text-danger form-control-msg">A message is Required</small>
	</div>

	<div class="text-left form-group">
		<button type="submit" class="btn btn-primary button-send"><i class="fa fa-paper-plane"></i></button>

		<small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
		<small class="text-success form-control-msg js-form-success">Message was successfully submitted!</small>
		<small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
	</div>

</form>
<?php 
	/*
		This is the template for the footer

		@package modeling-portfolio-theme
	*/
?>

	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<h6 class="underline"><b>About</b></h6>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div><!-- .col-md-6 -->

				<div class="col-md-3 col-sm-6 col-xs-6">
					<h6 class="underline"><b>Address</b></h6>
					<ul class="section-links">
						<li><p>Address: Lorem ipsum dolor sit amet</p></li>
						<li><p>City</p></li>
						<li><p>Email: email@email.com</p></li>
						<li><p>Number: 123456789</p></li>
					</ul>
				</div><!-- .col-md-3 -->

				<div class="col-md-3 col-sm-6 col-xs-6">
					<h6 class="underline"><b>Links</b></h6>
					<!--
					<ul class="section-links">
						<li class="grow"><a href="index.html">Home</a></li>
						<li class="grow"><a href="about.html">About</a></li>
						<li class="grow"><a href="portfolio.html">Portfolio</a></li>
						<li class="grow"><a href="contact.html">Contact</a></li>
					</ul>
					 -->
					<?php 
						wp_nav_menu(
							array(
								'theme_location'	=> 'secondary',//theme_location - has to be the same name as specified in theme-support.php (modeling_register_nav_menu (first value - string $location)).
								'menu_class'		=> 'section-links'
							)
						);
					?>

				</div><!-- .col-md-3 -->
			</div><!-- .row -->
			<hr>
		</div><!-- .container -->

		<div class="initials">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p>2019 &copy; Lorem ipsum.</p>
			</div><!-- .col-lg-12 -->
		</div><!-- .initials -->
	</footer>

	<?php wp_footer(); ?>
	</body>
</html>
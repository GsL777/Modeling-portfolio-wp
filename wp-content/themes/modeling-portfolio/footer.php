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
				<?php 
					$args = array(
						'type' => 'post',
						'category_name'=> 'about-me',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();
				
							the_title('<h6 class="underline"><b>', '</b></h6>'); ?> 
							<p class="text-justify"><?php the_excerpt(); ?></p>

				<?php
						endwhile;
					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>
				</div><!-- .col-lg-12 -->

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
				<p>2019 - <?php echo year(); //function in theme-support.php ?> &copy; Lorem ipsum.</p>
			</div><!-- .col-lg-12 -->
		</div><!-- .initials -->
	</footer>

	<?php wp_footer(); ?>
	</body>
</html>
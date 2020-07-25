<?php
/*

	@package modeling-portfolio-theme

	==================================================
		ABOUT TEMPLATE
	==================================================

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- if a WordPress has the get_ in front of a function it needs an echo -->

	<!-- <section class="story-section"> -->
		<div class="container">
			<div class="animation-element slide-left col-lg-12 col-md-12 col-sm-12">

				<?php the_title( '<h2 class="story">', '</h2>'); ?>
				<p><em><?php the_content(); ?></em></p>

			</div><!-- .col-lg-12 -->
		</div><!-- .container -->
	<!-- </section> -->
</article><!-- standard WordPress markup -->
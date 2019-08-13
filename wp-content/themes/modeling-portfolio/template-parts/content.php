<?php
/*

	@package modeling-portfolio-theme

	==========================================
		STANDARD POST FORMAT
	==========================================

*/
	global $detect;//function mobileDetectGlobal() in theme support for responsive website. Also add && !$detect->isMobile() && !$detect->isTablet() where needed.
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- if a WordPress has the get_ in front of a function it needs an echo, in this case  insert the_ID(); -->
	<header class="entry-header text-center">
		
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>'); // escape the url because we are inside the function so we dont whant to print?>

	</header>

	<div class="entry-content">

		<div class="entry-excerpt">
			<?php the_content(); ?>
		</div>


	</div><!-- .entry-content -->


</article><!-- standard WordPress markup -->
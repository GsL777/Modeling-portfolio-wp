<?php
/*

	@package modeling-portfolio-theme

	==========================================
		ASIDE POST FORMAT
	==========================================

*/
	global $detect;//function mobileDetectGlobal() in theme support for responsive website. Also add && !$detect->isMobile() && !$detect->isTablet() where needed.
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('modeling-format-aside')); ?>><!-- if a WordPress has the get_ in front of a function it needs an echo, in this case  insert the_ID(); -->

		<div class="container-fluid">
			<div class="row about-dressing wrapper">
				<article class="main aside-1 col-md-6">
					<h2><?php the_content(); ?></h2>
					<p><em><?php the_excerpt(); ?></em></p>
				</article>
				<aside class="aside aside-2 col-md-6">
					<?php if( has_post_thumbnail() ): ?>
						<div class="background-image"><?php the_post_thumbnail('full'); ?></div>
					<?php endif; ?>
				</aside>
			</div><!-- .about-dressing -->
		</div><!-- .container-fluid -->

</article><!-- standard WordPress markup -->
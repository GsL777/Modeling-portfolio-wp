<?php
/*

	@package modeling-portfolio-theme

	==========================================
		IMAGE POST FORMAT
	==========================================

*/
	global $detect;//function mobileDetectGlobal() in theme support for responsive website. Also add && !$detect->isMobile() && !$detect->isTablet() where needed.  && (!$detect->isMobile() || !$detect->isTablet() )
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(array('modeling-format-image')); ?>><!-- if a WordPress has the get_ in front of a function it needs an echo. inside post_class() there you can write a custom class inside ''. In this case a custom class is created, because if the user will use another version of wordpress everything will work corectly. -->
	<div class="container">
		<div class="row about-fashion">
			<div class="col-md-5">
				<?php if( has_post_thumbnail() ): ?>
					<div class="background-image"><?php the_post_thumbnail('full'); ?></div>
				<?php endif; ?>
			</div><!-- .col-md-5 -->
			<div class="col-md-7">
				<h2><?php the_content(); ?></h2>
				<p><em><?php the_excerpt(); ?></em></p>
			</div><!-- .col-md-7 -->
		</div><!-- .about-fashion -->
	</div><!-- .container -->

</article>
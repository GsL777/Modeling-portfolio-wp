<?php
/*

	@package modeling-portfolio-theme

	==========================================
		QUOTE POST FORMAT
	==========================================

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-format-quote' ); ?>>

	<div class="text-quote animation-element slide-left">
		<?php echo get_the_content('<p><em>', '</em></p>'); ?>
		<?php the_title('<h3>- ', ' -</h3>'); ?>
	</div><!-- .text-quote -->

</article>
<?php
/*
	@package modeling-portfolio-theme
*/

get_header(); ?>

	<div class="container">

	<?php 

		if( have_posts() ):

			while( have_posts() ): the_post();

				get_template_part( 'template-parts/content', get_post_format() );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
				//get_post_format() - retrieve the_post_format of the current post that is in the post loop.

			endwhile;

		endif;
		
	?>

	</div><!-- .container -->

<?php get_footer(); ?>
<?php 

/*

	@package modeling-portfolio-theme

	===================================
		PAGE ABOUT 
	===================================

*/

get_header(); ?>

	<div id="primary-contact" class="content-area">
		<main id="main-contact" class="site-main" role="main">

			<!-- <div class="container"> --> <!-- .modeling-posts-container - custom class to have a place to print a post. Used in modeling-portfolio.js -->

				<?php 
					if( have_posts() ):

						while( have_posts() ): the_post();
							get_template_part( 'template-parts/content', 'contact' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
							//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
						endwhile;

					endif;
				?>
			<!-- </div> --><!-- .container -->

		</main>
	</div><!-- #primary -->

<?php get_footer(); ?>
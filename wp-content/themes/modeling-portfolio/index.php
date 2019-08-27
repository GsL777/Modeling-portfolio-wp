<?php
/*
	@package modeling-portfolio-theme
*/

get_header(); ?>
<!-- 
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1 class="site-title text-center">
				<span class="hide">Home</span>
			</h1> -->


			<?php 
	
				if( have_posts() ):
					
					while( have_posts() ): the_post(); ?>
						
						<?php get_template_part('template-parts/content',get_post_format()); ?>
					
					<?php endwhile;
					
				endif;
					
			?>

			<?php 
			//Wordpress 101 22lesson to exclude header posts and to print gallery with different bootstrap classes!!!

			/* Not to print the specific (header) category START 
			$args = array(
				'posts_per_page' 	=>	4,
				'category__in' => array ( 6, 8, 9 ),
				'category__not_in' => array( 5 )	
			);

			query_posts($args);
			/* Not to print the specific (header) category END 

				if( have_posts() ):

					while( have_posts() ): the_post();
						get_template_part( 'template-parts/content', get_post_format() );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
						//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
					endwhile;
					
				endif;

			wp_reset_query();//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts())
*/
			?>


<!--
		</main>
	</div> #primary -->

<?php get_footer(); ?>
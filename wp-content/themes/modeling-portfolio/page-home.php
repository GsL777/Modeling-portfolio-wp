<?php 
/*

	@package modeling-modeling-theme

	===================================
		PAGE HOME 
	===================================

*/

get_header(); ?>

	<div id="primary-home" class="content-area">
		<main id="main-home" class="site-main" role="main">

		<header class="entry-header text-center">
			<?php the_title( '<h1 class="site-title text-center">', '</h1>'); // escape the url because we are inside the function so we dont whant to print?>
		</header>


			<section class="quote-section">
				<div class="container">
				<?php 
					$args = array(
						'type' => 'post',
						'category_name'=> 'Home-quote',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

							while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'quote' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
							//get_post_format() - retrieve the_post_format of the current post that is in the post loop.

						endwhile;
					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
				?>
				</div><!-- .container -->
			</section><!-- .quote-section -->


			<section class="gallery-section">
				<div class="container-fluid">
					<div class="row">

					<?php 
						$args = array( 
							'type' => 'post',
							'posts_per_page' => 9,
							'category_name'=> 'Portfolio-Home-Gallery',
							'order' => 'ASC'
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ): 
							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); ?>

							<?php 
								if($i==0): $column = 12; 
									elseif($i > 0 && $i < 2): $column = 6;
									elseif($i > 1 && $i < 3): $column = 6;

									elseif($i > 2 && $i < 4): $column = 12;
									elseif($i > 3 && $i < 5): $column = 6;
									elseif($i > 4 && $i < 6): $column = 6;

									elseif($i > 5 && $i < 7): $column = 12;
									elseif($i > 6): $column = 6;
								endif;
							?>

								<div class="col-lg-4 col-md-<?php echo $column; ?> col-sm-12 gallery-item">
									<div class="gallery-item">
										<!-- <a href="http://localhost/modeling-portfolio/portfolio/"> -->
										<?php $href_page = get_post(62); ?>
										 <a href="<?php echo get_permalink($href_page->ID); ?>">

											<?php if( has_post_thumbnail() ): 
												$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
											endif; // echo $urlImg;
											?>
												<div class="img-responsive" style="background-image: url(<?php echo $urlImg; ?>);"></div>

												<!-- 	CHANGED INSTEAD TO WP_GET ATTACHMENT
												<?php //if( has_post_thumbnail() ): 	?>
									            	 <div class="img-responsive"><?php //the_post_thumbnail('full'); ?></div> 
												<?php //endif; 

												// echo $urlImg;
												?>
												 -->

											<div class="column-picture">
												<!-- <h5>More</h5> -->
												<?php the_title('<h5>', '</h5>'); ?>
											</div>
										</a>
									</div><!-- .gallery-item -->
								</div><!-- .gallery-item -->

							<?php $i++; endwhile;

						endif;

						wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
					?>

					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- .gallery-section -->


			<section class="about-section">
				<?php 
					$args = array(
						'type' => 'post',
						'category_name'=> 'Story',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();
							get_template_part( 'template-parts/content', 'image' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
							//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>

				<?php 
					$args = array(
						'type' => 'post',
						'category_name'=> 'Story2',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();
						get_template_part( 'template-parts/content', 'aside' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
						//get_post_format() - retrieve the_post_format of the current post that is in the post loop.

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>
			</section><!-- .about-section -->

		</main>
	</div><!-- #primary -->

<?php get_footer(); ?>
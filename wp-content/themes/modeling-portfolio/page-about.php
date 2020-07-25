<?php 
/*

	@package modeling-modeling-theme

	===================================
		PAGE ABOUT 
	===================================

*/

get_header(); ?>

	<div id="primary-about" class="content-area">
		<main id="main-about" class="site-main" role="main">

			<header class="entry-header text-center">
				<?php the_title( '<h1 class="site-title text-center">', '</h1>'); // escape the url because we are inside the function so we dont whant to print?>
			</header>

			<section class="story-section">
				<?php 
					$args = array(
						'type' => 'post',
						'category_name'=> 'about-me',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();
							get_template_part( 'template-parts/content', 'about' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
							//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
				?>
			</section>


			<section class="services-section">
				<div class="container">

				<h2 class="services">
					<p><b>What I do</b></p>
				</h2>

					<div class="services-row">
					<?php 
						$args = array(
							'type' => 'post',
							'posts_per_page' => 2,
							'order' => 'ASC',
							'category_name'=> 'what-i-do'
						);

						$blogLoop = new WP_Query($args);

						if( $blogLoop->have_posts() ): 

							$i = 0; //variable for $fontIcon
							while( $blogLoop->have_posts() ): $blogLoop->the_post();
					?>

							<?php 
								// global $fontIcon;   -  use global if the content putted in template part but better to avoid it.
								if($i == 0): $fontIcon = 'fa fa-camera-retro fa-2x';
								elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-book fa-fw fa-2x';
								endif;
							?>

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 content">
									<i class="<?php echo $fontIcon; ?>"></i>
									<div class="card-body">
										<?php the_title( '<h5 class="card-title underline">', '</h5>' ); ?>
										<?php the_content('<p class="card-text">', '</p>'); ?>
									</div><!-- card-body -->
								</div><!-- .col-sm-6 -->

							<?php 

							$i++; //increment for $fontIcon

							endwhile;

						endif;

						wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

						//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
					?>

					</div><!-- .row -->
				</div><!-- .container -->
			</section>


			<section class="testimonials-section">
				<div id="testimonials-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">

					<?php 
						$args_cat = array(
							'include' => '14' 
						);

						$categories = get_categories($args_cat);
						foreach ($categories as $category):

							$args = array(
								'type'				=> 'post',
								'posts_per_page'	=> 4,
								'order'				=> 'ASC',
								'category__in'		=> $category->term_id,
								'category__not_in'	=> array( '5' )
								// 'category_name'=> 'testimonials'
							);

							$blogLoop = new WP_Query($args);

							if( $blogLoop->have_posts() ): 

								$count = 0; //variable for fa icons and for bullets
								$bullets = ''; //variable for bullets
								while( $blogLoop->have_posts() ): $blogLoop->the_post();
								?>

								<?php 
									// global $fontIcon;   -  use global if the content putted in template part but better to avoid it.
									if($count == 0): $fontIcon = 'fa fa-book fa-fw';
									elseif($count > 0 && $count < 2): $fontIcon = 'fa fa-plane fa-fw';
									elseif($count > 1 && $count < 3): $fontIcon = 'fa fa-map'; 
									elseif($count > 2): $fontIcon = 'fa fa-camera-retro'; 
									endif;
								?>

									<div class="carousel-item <?php if($count == 0): echo 'active'; endif; ?>">
										<div class="carousel-caption content col-xs-12">

											<i class="image-content <?php echo $fontIcon; ?>"></i>

											<?php the_title('<h2 class="image-caption col-xs-12"><b>', '</b></h2>'); ?>
											<strong><?php the_time('F j, Y'); ?></strong>
											<?php the_content('<p class="text">', '</p>'); ?>

										</div><!-- .carousel-caption -->
									</div><!-- .carousel-item -->

									<?php $bullets .= '<li data-target="#testimonials-carousel" data-slide-to="' . $count . '" class="navigation-slide '; ?>
									
									<?php if($count == 0): $bullets .= 'active'; endif; ?>

									<?php $bullets .= '"></li>'; ?>

								<?php 

								$count++;

								endwhile;

							endif;

							wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

							//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).

						endforeach;
					?>

						<ol class="carousel-indicators">
							<?php echo $bullets; ?>
						</ol><!-- .carousel-indicators  -->

					</div><!-- .carousel-inner -->


					<a class="carousel-control-prev d-none" href="#testimonials-carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next d-none" href="#testimonials-carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>

				</div><!-- .carousel -->
			</section>


		</main>
	</div><!-- #primary -->

<?php get_footer(); ?>
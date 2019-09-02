<?php 
/*

	@package modeling-modeling-theme

	===================================
		PAGE PORTFOLIO 
	===================================

*/

get_header(); ?>

<!-- FIX(CHANGE) ALL THE GALLERY CODE AND ADD ACE CODE TO THUMBNAIL AND GALLERY -->

<!-- FIX BUG ON HAMBURGER MENU: CSS DOESN'T APPLY ON MENU WHEN RESIZING WINDOW FOR TABLETS  -->

	<section class="portfolio-gallery-section">
		<div class="container">
		    <div class="row">

	        	<div class="sorting">
		            <button class="btn btn-default filter-button" data-filter="all">All</button>
		            <button class="btn btn-default filter-button" data-filter="modeling1">Modeling in Spain</button>
		            <button class="btn btn-default filter-button" data-filter="modeling2">Modeling in Lithuania</button>
		            <button class="btn btn-default filter-button" data-filter="modeling3">Modeling in Morocco</button>
		            <button class="btn btn-default filter-button" data-filter="modeling4">Modeling in France</button>
		        </div>
		        <br/>

				<div class="container">
					<div class="row">

					<?php 
						$args_cat = array(
							'include' => '8' 
						);

						$categories = get_categories($args_cat);
						foreach ($categories as $category):

							$args = array(
								'type'				=> 'post',
								'posts_per_page'	=> 12,
								'order'				=> 'DESC',
								'category__in'		=> $category->term_id,
								'category__not_in'	=> array( '5' )
								// 'category_name'=> 'Portfolio-Home-Gallery'
							);

							$blogLoop = new WP_Query($args);

							if( $blogLoop->have_posts() ): 

								$count = 0; //variable for fa icons and for bullets
								while( $blogLoop->have_posts() ): $blogLoop->the_post();

									if($count == 0 || $count == 4 || $count == 8 || $count == 12): $class = 'modeling1';
									elseif($count == 1 || $count == 5 || $count == 9 || $count == 13): $class = 'modeling2';
									elseif($count == 2 || $count == 6 || $count == 10 || $count == 14): $class = 'modeling3';
									elseif($count == 3 || $count == 7 || $count == 11 || $count == 15): $class = 'modeling4';
								 	endif;
					?>

									<div class="gallery_item col-lg-4 col-md-6 col-sm-12 col-xs-12 filter <?php echo $class; ?>">
										<?php if( has_post_thumbnail() ): ?>
											<div class="img-responsive gallery-img"><?php the_post_thumbnail('full'); ?></div> 
										<?php endif; ?>
									</div>

					<?php 
					 			$count++; 

								endwhile;
							endif;

							wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

							//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
						endforeach;
					?>

			            <a href="#" class="close"></a>
			        </div><!-- .row -->
			    </div><!-- .container -->
		    </div><!-- .row -->
		</div><!-- .container -->

		<div id="imageModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="gallery-modal">
					<div class="modal-body">
		 				<!-- <img src=""> -->
					</div>
				</div><!-- .gallery-modal -->
			</div><!-- .modal-dialog -->
		</div><!-- #imageModal -->
	</section>

<?php get_footer(); ?>
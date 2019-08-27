<?php 
/*

	@package modeling-modeling-theme

	===================================
		PAGE PORTFOLIO 
	===================================

*/

get_header(); ?>

<!-- FIX(CHANGE) ALL THE GALLERY CODE 
AND ADD ACE CODE TO THUMBNAIL AND GALLERY
-->

	<section class="portfolio-gallery-section">
		<div class="container">
		    <div class="row">
		        <div class="sorting">
		            <button class="btn btn-default filter-button" data-filter="all">All</button>
		            <button class="btn btn-default filter-button" data-filter="modeling1">Modeling in Spain</button><!--  instead of Modeling in Spain put category name the_category(); and define in args -->
		            <button class="btn btn-default filter-button" data-filter="modeling2">Modeling in Lithuania</button>
		            <button class="btn btn-default filter-button" data-filter="modeling3">Modeling in Morocco</button>
		            <button class="btn btn-default filter-button" data-filter="modeling4">Modeling in France</button>
		        </div>
		        <br/>

				<div class="container">
					<div class="row">

					<?php 

					$args = array( 
						'type' => 'post',
						'posts_per_page' => 12,
						'category_name'=> 'Portfolio-Home-Gallery',
						'order' => 'ASC'
					);

					$blogLoop = new WP_Query( $args ); 

					if( $blogLoop->have_posts() ): 
						$i = 0;

						while( $blogLoop->have_posts() ): $blogLoop->the_post(); ?>

							<?php 

								if($i==0): $class = 'modeling1';
								elseif($i > 0 && $i <= 2): $class = 'modeling2';
								elseif($i > 1 && $i <= 3): $class = 'modeling3';
								elseif($i > 2 && $i <= 4): $class = 'modeling4';
								elseif($i > 3 && $i <= 5): $class = 'modeling1';
								elseif($i > 4 && $i <= 6): $class = 'modeling2';
								elseif($i > 5 && $i <= 7): $class = 'modeling3';
								elseif($i > 6 && $i <= 8): $class = 'modeling4';
								elseif($i > 7 && $i <= 9): $class = 'modeling1';
								elseif($i > 8 && $i <= 10): $class = 'modeling2';
								elseif($i > 9 && $i <= 11): $class = 'modeling3';
								elseif($i > 10): $class = 'modeling4';
							 	endif;
							?>

								<div class="gallery_item col-lg-4 col-md-6 col-sm-12 col-xs-12 filter <?php echo $class; ?>">

									<?php if( has_post_thumbnail() ): 	?>
										<div class="img-responsive gallery-img"><?php the_post_thumbnail('full'); ?></div> 
									<?php endif; ?>

								<!--
									<?php /*if( has_post_thumbnail() ):
										$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
									endif; */?>
									 <div class="img-responsive gallery-img" style="background-image: url(<?php //echo $urlImg; ?>);"> 
								-->

								</div>

							<?php $i++; 

							endwhile;

						endif;

						wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

						//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
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
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
<?php 
	/*
		This is the template for the header

		@package modeling-portfolio-theme
	*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title><!-- To set a page title go to dashboard Settings -> General -> write in a Site Title a title. It can be seen with an inspect -->
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta charset="<?php bloginfo( 'charset' ); //print the bloinfo charset?>">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- for responsive devices to print full screen -->
	<link rel="profile" href="http://gmpg.org/xfn/11"> <!-- necessary for html5 validation  -->
	<?php if( is_singular() && pings_open( get_queried_object() ) ): //check if this page is not an archive, search result or generic blog loop ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); //pingback_url - for page to scale up on search engine result page (SERP)?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>	
	<?php  
		//ON WORDPRESS DASHBOARD -> PORTFOLIO -> CUSTOM CSS a custom css code could be written and prints in the front-end. Written css in ACE applying in frontend style.
		$custom_ace_css = esc_attr(get_option( 'modeling_css' ));//modeling_css - unique handler from function-admin.php //Custom CSS Options
		if( !empty($custom_ace_css) ):
			echo '<style>' . $custom_ace_css . '</style>';
		endif;
	?>


	<body <?php body_class(); //body_class(); - WP prints automatically to what style is used?>>

	<!-- TURN OFF DASHBOARD ON WEBSITE(TO MAKE WEBSITE FASTER): WP dashboard -> Users -> Admin -> Uncheck Toolbar 'Show Toolbar when viewing site'-->


	<nav class="nav-section navbar navbar-expand-md flex-direction navbar-dark">
		<!-- <a class="navbar-brand position-md-absolute" href="http://localhost/modeling-portfolio/home/"> -->
		<a class="navbar-brand position-md-absolute" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="http://localhost/Modeling-portfolio/wp-content/themes/modeling-portfolio/assets/img/Logo.png" alt="" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navigation-bar navbar-collapse" id="navbarNav">
			<?php //theme-support.php function modeling_register_nav_menu
				wp_nav_menu(
					array(
						'theme_location'	=> 'primary',
						'container'			=> false,
						'menu_class'		=> 'navbar-nav text-center',
						'walker'			=> new Modeling_Walker_Nav_primary()
                	)
				);
			?>
		</div><!-- .collapse -->
	</nav><!-- .nav-section -->


	<header class="header-section">
		<div class="social-media">
			<?php echo social_btn();//function in theme-support.php ?><!-- .socials -->
		</div><!-- .social-media -->

		<div class="header-slider">
			<div id="carouselFade-<?php the_ID(); ?>" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
				<?php 
					$args_cat = array(
						'include' => '5'
					);

					$categories = get_categories($args_cat);
					$count = 0;

					foreach($categories as $category):

						$args = array( 
							'type' => 'post',
							'posts_per_page' => 5,
							'category__in' => $category->term_id
							// 'category__not_in' => array( 1 )
						);

						$blogLoop = new WP_Query( $args );

						if( $blogLoop->have_posts() ):

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); ?>
								
								<div class="image-section carousel-item <?php if($count == 0): echo 'active'; endif; ?>">
									<?php the_post_thumbnail('full'); ?>

									<div class="header-content table">
										<div class="table-cell">
											<h1 class="site-title">
												<span class="hide"><?php the_title(); // SET AS DYNAMIC PAGE TITLE?><!-- Home -->
												<?php //echo get_the_title(111); 
												 //the_title( sprintf(esc_url(get_permalink() ) ) ); ?>
												</span>
											</h1>
										</div><!-- table-cell -->
									</div><!-- header-content -->
								</div><!-- .carousel-item -->

							<?php  
							$count++;
							endwhile;
							
						endif;
						wp_reset_postdata();
					endforeach;
				?>
				</div><!-- .carousel-inner -->


				<a class="previous" href="#carouselFade-<?php the_ID(); ?>" role="button" data-slide="prev">
					<span class="control-prev-icon" aria-hidden="true"><i class="arrow left"></i></span>
					<span class="sr-only">Previous</span>
				</a><!-- .carousel-control-prev -->

				<a class="next" href="#carouselFade-<?php the_ID(); ?>" role="button" data-slide="next">
					<span class="control-next-icon" aria-hidden="true"><i class="arrow right"></i></span>
					<span class="sr-only">Next</span>
				</a><!-- .carousel-control-next -->
			</div><!-- #carouselFade -->
		</div><!-- .header-slider -->
	</header><!-- .header-section -->
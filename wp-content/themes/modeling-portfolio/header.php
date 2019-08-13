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
	<meta name="viewport" content="width+device-width, initial-scale=1"><!-- for responsive devices to print full screen -->
	<link rel="profile" href="http://gmpg.org/xfn/11"> <!-- necessary for html5 validation  -->
	<?php if( is_singular() && pings_open( get_queried_object() ) ): //check if this page is not an archive, search result or generic blog loop ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); //pingback_url - for page to scale up on search engine result page (SERP)?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<?php  
		//ON WORDPRESS DASHBOARD -> PORTFOLIO -> CUSTOM CSS a custom css code could be written and prints in the front-end. Written css in ACE applying in frontend style.
		$custom_ace_css = esc_attr(get_option( 'modeling_css' ));//modeling_css - unique handler from function-admin.php //Custom CSS Options
		if( !empty($custom_ace_css) ):
			echo '<style>' . $custom_ace_css . '</style>';
		endif;
	?>
</head>

	<body <?php body_class(); //body_class(); - WP prints automatically to what style is used?>>

	<!-- TURN OFF DASHBOARD ON WEBSITE(TO MAKE WEBSITE FASTER): WP dashboard -> Users -> Admin -> Uncheck Toolbar 'Show Toolbar when viewing site'-->



<!-- <nav class="navbar navbar-default navbar-modeling">
	<?php /*
		wp_nav_menu(
			array(
					'theme_location'	=> 'primary',
					'container'			=> false,
					'menu_class'		=> 'nav navbar-nav',
					'walker'			=> new Modeling_Walker_Nav_primary()
            	)
			);
			*/
	 ?>
</nav> -->
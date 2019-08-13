<?php 

/*
	@package modeling-portfolio-theme

	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/

//CSS for a custom theme in Wordpress dashboard
function modeling_load_admin_scripts( $hook ) {
	//echo $hook;

	//Admin font
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	//ADMIN-CSS register css admin section
	wp_register_style( 'modeling_admin', get_template_directory_uri() . '/assets/admin-css/modeling.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'modeling_admin' );
	
	//ADMIN-JS register js admin section
	wp_register_script( 'modeling-admin-script', get_template_directory_uri() . '/assets/admin-js/modeling.admin.js', array('jquery'), '1.0.0', true );

	$pages_array  = array(
		'toplevel_page_fashion_portfolio',
		'modeling_page_fashion_portfolio_theme',
		'modeling_page_fashion_portfolio_theme_contact',
		'modeling_page_fashion_portfolio_css'
	);

	//Limit usage to apply one style on the specific wordpress dasboard panel page  need to apply variable $hook in function.
	//if('toplevel_page_fashion_portfolio' == $hook) {//toplevel_page_fashion_portfolio - copied from admin panel Modeling -> General

	if (in_array($hook, $pages_array) ) {
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'modeling_admin');
	}

	if('toplevel_page_fashion_portfolio' == $hook){
		wp_enqueue_media();//built in function that automatically handle calling and activation process of all the scripts and all the source code that needs for use of media uploader
		wp_enqueue_script( 'modeling-admin-script' );
	}

	//ACE
	if('modeling_page_fashion_portfolio_css' == $hook){

		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'modeling_admin');

		wp_enqueue_style( 'ace', get_template_directory_uri() . '/assets/admin-css/modeling.ace.css', array(), '1.0.0', 'all' );//downloaded from https://ace.c9.io/#nav=embedding site to insert code editor to a website.

		wp_enqueue_script( 'ace', get_template_directory_uri() . '/assets/admin-js/ace/ace.js', array('jquery'), '1.2.1', true );//using just wp_enqueue_script function instead of using wp_register_style and then wp_enqueue_style.
		wp_enqueue_script( 'modeling-custom-css-script', get_template_directory_uri() . '/assets/admin-js/modeling.custom_css.js', array('jquery'), '1.0.0', true );
	}

}

//Just for printing in admin panel instead of everywhere. enqueue - 
add_action( 'admin_enqueue_scripts', 'modeling_load_admin_scripts' );


/*
	==============================
		FRONT-END ENQUEUE FUNCTIONS
	==============================
*/

function modeling_load_scripts(){
	//css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.1', 'all' );
	wp_enqueue_style('modeling-portfolio', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
	wp_enqueue_style ('fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css', array(), '5.1.0', 'all');

	//fonts (Part 15 - WordPress Theme Development)
/*	
	wp_enqueue_style( 'playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' );//activate in sass -> main.css -> font-family: 'Playfair', Arial, Verdana, sans-serif; 
*/
		//js
	//wp_deregister_script( 'jquery' );//takes of the script from the head
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.11.3', true);
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.1.1', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.1.1', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/modeling-portfolio.js', array('jquery'), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'modeling_load_scripts' );

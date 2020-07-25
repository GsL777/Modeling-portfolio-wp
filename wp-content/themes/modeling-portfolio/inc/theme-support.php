<?php 

/*
	@package modeling-portfolio-theme

	=============================
		THEME SUPPORT OPTIONS
	=============================
*/
//Modeling Theme Options START
//Activates all the post format in dasboard posts -> Format bar on the right. TO ACTIVATE POST FORMATS GO TO newly created MODELING -> THEME OPTIONS -> select -> save changes and go to the posts.

/*
$options =  get_option( 'post_formats' );
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format){
	$output[] = ( @$options[$format] == 1 ? $format : '');
}

if( !empty($options) ){
	add_theme_support('post-formats', $output );
}
*/

//Simplified version of the code above. TO ACTIVATE POST FORMATS GO TO newly created MODELING -> THEME OPTIONS -> select -> save changes and go to the posts.
$options = get_option('post_formats'); 
if (!empty($options)) { 
	add_theme_support('post-formats', array_keys($options));
}

//Activating theme Options MODELING->THEME OPTIONS
//Theme support Custom Header. Check the boxes in Modeling -> Theme Options and it will appear in dashboard Appearance
$header =  get_option( 'custom_header' );//function modeling_custom_header function-admin.php 
if(@$header == 1) {
	add_theme_support('custom-header');
}

//Theme support Custom Background. Check the boxes in Modeling -> Theme Options and it will appear in dashboard Appearance
$background =  get_option( 'custom_background' );//function modeling_custom_background function-admin.php
if(@$background == 1) {
	add_theme_support('custom-background');
}
//Modeling Theme Options END


/*Activate the post thumbnails START*/
add_theme_support( 'post-thumbnails' );//post-thumbnails - Lets to set Featured Image in Wordpress dashboard -> Posts. Developing content.php
/*Activate the post thumbnails END*/


/*Activate Nav Menu Option in WP dashboard START*/
function modeling_register_nav_menu(){
	register_nav_menu( 'primary', 'Header Navigation Menu' );//First parameter - location unique name. For two word use _, but do not use -   . Second parameter - description. 
}//add a walker.php file and require in functions.php

add_action('after_setup_theme', 'modeling_register_nav_menu');//call an action to activate a function.
/*Activate Nav Menu Option END*/


/*Activate Footer navigation menu START*/
function modeling_theme_setup() {
	add_theme_support('menus'); //activatíng menu's writing a string 

	//register_nav_menu('primary', 'Primary Header Navigation'); //first value - string $location, second option - string $description
	register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'modeling_theme_setup'); //function to create the menus. Function is executed after the setup theme is triggered. Function will work 'after_setup_theme' or after the initialization 'init'
/*Activate Footer navigation menu END*/


//function for testing CONTACT FORM email START
//FILES INCLUDE modeling-portfolio.js, function.php(to add ajax.php), contact-form.php, ajax.php, shortcodes.php, custom-post-type.php, contact.scss 

//TURN OFF IF IT IS NOT IN USE
/*
function mailtrap($phpmailer) {//code in ajax.php function modeling_save_contact();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '5ef4715c46507e';
  $phpmailer->Password = '4fa836c30aacff';
}

add_action('phpmailer_init', 'mailtrap');
//function for testing CONTACT FORM email END
*/

/* Initialize global Mobile Detect START */
function mobileDetectGlobal(){//CALL THE FUNCTION IN ALL THE CONTENT as example in content-image.php	global $detect;

	global $detect;
	$detect = new Mobile_Detect;
}

add_action('after_setup_theme', 'mobileDetectGlobal');//after_setup_theme - WordPress built in action 
/* Initialize global Mobile Detect END */

/*
	===============================
		SOCIAL SHARE BUTTONS START
	===============================
*/
function social_btn(){
	// $title = get_the_title();
	// $permalink = get_permalink();

	//Compose the share links for Facebook, Twitter, LinkedIn, Instagram
	$facebook = sprintf('https://www.facebook.com/login/');
	// $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
	$twitter = sprintf('https://twitter.com/login?lang=en-gb');
	$linkedin = sprintf('https://www.linkedin.com/');
	

	// Wrap the buttons
	$output = '<div class="socials">';
		// Add the links inside the wrapper
		$output .= '<a href="' . $facebook . '" target="_blank" rel="nofollow" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';

		$output .= '<a href="' . $twitter . '" target="_blank" rel="nofollow" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';

		$output .= '<a href="' . $linkedin . '" target="_blank" rel="nofollow" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';

	$output .= '</div>';

	return $output;
}

/*
	===============================
		SOCIAL SHARE BUTTONS END
	===============================
*/

/*
	===============================
		YEAR START
	===============================
*/

	function year(){
		date_default_timezone_set('Europe/Vilnius'); 
		$this_year = date('Y');

		return $this_year;
	}

/*
	===============================
		YEAR END
	===============================
*/
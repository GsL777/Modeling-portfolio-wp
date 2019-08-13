<?php 

/*
@package modeling-portfolio-theme

	=====================
		ADMIN PAGE
	=====================
*/

function portfolio_add_admin_page(){
	//Generate Modeling Portfolio Admin Page
	add_menu_page('Modeling Portfolio Theme Options', 'Modeling', 'manage_options', 'fashion_portfolio', 'modeling_theme_create_page', 'dashicons-editor-unlink', 110);//First parameter - Page title. Second parameter - menu title. Third parameter - Capability(capability to display options to specific users). Fourth parameter - menu slug(parameter that appears in the navigation bar to avoid errors). Fifth parameter - a function name. Sixth parameter - icon url(wordpress premade icons in https://developer.wordpress.org/resource/dashicons/#art) Need to choose the icon and paste the icon name to the Sixth parameter place. Seventh parameter - the position of a menu that specifies a location.

	//Generate Modeling Portfolio Admin Sub Pages
	add_submenu_page( 'fashion_portfolio', 'Modeling Portfolio Sidebar Options', 'Sidebar', 'manage_options', 'fashion_portfolio', 'modeling_theme_create_page' ); //As a first parameter there is a must to use parent_slug the same as add_menu_page Fourth parameter - gytis_portfolio. Second parameter - has to be the same as add_menu_page first parameter. Fifth parameter has to be as fourth parameter in add_menu_page to SHOW SETTINGS AS A FIRST SUBMENU IN A DASHBOARD.

	//Custom theme Sopport Options
	add_submenu_page('fashion_portfolio', 'Modeling Theme Options', 'Theme Options', 'manage_options', 'fashion_portfolio_theme', 'portfolio_theme_support_page');

	//Modeling Contact Form Options
	add_submenu_page('fashion_portfolio', 'Modeling Contact Form', 'Contact Form', 'manage_options', 'fashion_portfolio_theme_contact', 'portfolio_contact_form_page');

	//Modeling Portfolio CSS Options
	add_submenu_page('fashion_portfolio', 'Modeling Portfolio CSS Options', 'Custom CSS', 'manage_options', 'fashion_portfolio_css', 'portfolio_theme_settings_page');
}


add_action('admin_menu', 'portfolio_add_admin_page');//Activate this function. First value - when to trigger this function (in this case during the generation of admin_menu). Second value - the name of the function that must be triggered.

//Activate custom settings
add_action( 'admin_init', 'modeling_custom_settings' );


//Activate custom settings
function modeling_custom_settings(){
	//Sidebar Options
	register_setting('modeling-settings-group', 'profile_picture');
	register_setting('modeling-settings-group', 'first_name');//gives us the ability to create a specific section in WP database to record a custom group of settings (inputs, checkboxes, dropdowns....).
	register_setting('modeling-settings-group', 'last_name');
	register_setting('modeling-settings-group', 'user_description');
	register_setting('modeling-settings-group', 'facebook_handler');//For custom social media
	register_setting('modeling-settings-group', 'twitter_handler', 'modeling_sanitize_twitter_handler');//For custom social media
	register_setting('modeling-settings-group', 'linkedin_handler');//For custom social media
	
	add_settings_section('modeling-sidebar-options', 'Sidebar Options', 'modeling_sidebar_options', 'fashion_portfolio');//adds section inside settings. First parameter - id of the section. Second parameter - the title that will appear. The Third - function that we have to call. The fourth parameter - as the add_menu_page(fourth parameter).

	add_settings_field('sidebar-profile-picture', 'Profile Picture', 'modeling_sidebar_profile', 'fashion_portfolio', 'modeling-sidebar-options' );
	add_settings_field('sidebar-name', 'Full Name', 'modeling_sidebar_name', 'fashion_portfolio', 'modeling-sidebar-options' );
	add_settings_field('sidebar-description', 'Description', 'modeling_sidebar_description', 'fashion_portfolio', 'modeling-sidebar-options' );
	add_settings_field('sidebar-facebook', 'Facebook handler', 'modeling_sidebar_facebook', 'fashion_portfolio', 'modeling-sidebar-options' );
	add_settings_field('sidebar-twitter', 'Twitter handler', 'modeling_sidebar_twitter', 'fashion_portfolio', 'modeling-sidebar-options' );
	add_settings_field('sidebar-linkedin', 'Linkedin handler', 'modeling_sidebar_linkedin', 'fashion_portfolio', 'modeling-sidebar-options' );

	//Theme Support Options
	register_setting('modeling-theme-support', 'post_formats');
	register_setting('modeling-theme-support', 'custom_header');
	register_setting('modeling-theme-support', 'custom_background');

	add_settings_section( 'modeling-theme-options', 'Theme Options', 'modeling_theme_options', 'fashion_portfolio_theme' );

	add_settings_field( 'post_formats', 'Post Formats', 'modeling_post_formats', 'fashion_portfolio_theme', 'modeling-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'modeling_custom_header', 'fashion_portfolio_theme', 'modeling-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'modeling_custom_background', 'fashion_portfolio_theme', 'modeling-theme-options' );

	//Contact Form Options
	register_setting( 'modeling-contact-options', 'activate_contact' );//modeling-contact-form.php and custom-post-type.php files.

	add_settings_section( 'modeling-contact-section', 'Contact Form', 'modeling_contact_section', 'fashion_portfolio_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'modeling_activate_contact', 'fashion_portfolio_theme_contact', 'modeling-contact-section' );

	//Custom CSS Options
	register_setting( 'modeling-custom-css-options', 'modeling_css', 'modeling_sanitize_custom_css');//modeling-custom-css.php

	add_settings_section( 'modeling-custom-css-section', 'Custom CSS', 'modeling_custom_css_section_callback', 'fashion_portfolio_css' ); //fashion_portfolio_css - from function portfolio_add_admin_page(), //Modeling Portfolio CSS Options section.
	//modeling-custom-css.php

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'modeling_custom_css_callback', 'fashion_portfolio_css', 'modeling-custom-css-section' );
	//modeling-custom-css.php
}


//Modeling Portfolio CSS Info START
function modeling_custom_css_section_callback(){
	echo 'Customize Modeling Portfolio Theme with your own CSS';
}//modeling.custom_css.js, enqueue.php, modeling-custom-css.php and header.php $custom_css.

//Modeling Portfolio CSS Options
function modeling_custom_css_callback(){
	$css =  get_option( 'modeling_css' );
	$css = ( empty($css) ? '/*Modeling-portfolio Theme Custom CSS*/' : $css);
	echo '<div id="customCss">' . $css . '</div><textarea id="modeling_css" name="modeling_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';//id="customCss" - from modeling.custom_css.js //div id must be the same as in admin-js.js -> modeling.custom_css.js in ace.edit() section.
}//admin.js -> modeling-custom_css.php , enqueue.php

//WP dashboard -> Modeling -> Custom CSS Sanitization settings
function modeling_sanitize_custom_css( $input ){ //modeling_sanitize_custom_css //Custom CSS Options,register_setting Third parameter.
	$output = esc_textarea( $input );//sanitize the input of textarea

	return $output;
}
//Modeling Portfolio CSS Info END


//Modeling Theme Options START
function modeling_contact_section(){
	echo 'Activate and Deactivate the Built-in Contact Form';
}

//Contact Form 
function modeling_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}

//Custom Contact Form
function modeling_activate_contact(){//variables from function modeling_custom_settings Theme Support Options
	$options =  get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '');

	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '. $checked .' /></label>';
}//Appears in WP dashboard -> Modeling

//Post Formats
function modeling_post_formats(){
	$options =  get_option( 'post_formats' );
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format){
		$checked = ( @$options[$format] == 1 ? 'checked' : '');//@ - means if this variable exists
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats['.$format.']" value="1" '. $checked .' />' . $format . '</label><br>';
	}
	echo $output;//in a callback function for specific settings field have to echo
}//dashboard -> Modeling -> Theme Options to turn on or off in POSTS -> All posts -> Find post

//Custom Header
function modeling_custom_header(){//variables from function modeling_custom_settings Theme Support Options
	$options =  get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '');

	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '. $checked .' />Activate the Custom Header</label>';
}//dashboard -> Modeling -> Theme Options

//Custom Background
function modeling_custom_background(){//variables from function modeling_custom_settings Theme Support Options
	$options =  get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '');
	
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '. $checked .' />Activate the Custom Background</label>';
}//dashboard -> Modeling -> Theme Options
//Modeling Theme Options END


//Sidebar Options Functions
function modeling_sidebar_options(){
	echo 'Customize your Sidebar Information';
}

function modeling_sidebar_profile() { //modeling.admin.js
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if(empty($picture)){
		echo '<button type="button" value="Upload Profile Picture" class="button button-secondary" id="upload-button"><span class="modeling-icon-button dashicons-before dashicons-format-image"></span>Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	}else{
		echo '<button type="button" value="Replace Profile Picture" class="button button-secondary" id="upload-button"><span class="modeling-icon-button dashicons-before dashicons-format-image"></span>Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture . '" /> <button type="button" value="Remove" class="button button-secondary" id="remove-picture"><span class="modeling-icon-button dashicons-before dashicons-no"></span>Remove</button>';
	}//check if there is a picture

}//function to launch media uploader and to add buttons WP dashboard -> Modeling -> Sidebar -> Profile Picture buttons

function modeling_sidebar_name(){
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" /> <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}

function modeling_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="' . $description . '" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function modeling_sidebar_facebook() {//For custom social media
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook handler" />';
}

function modeling_sidebar_twitter() {//For custom social media
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler" /><p class="description">Input your twitter username without the @ character.</p>';
}

function modeling_sidebar_linkedin() {//For custom social media
	$linkedin = esc_attr( get_option( 'linkedin_handler' ) );
	echo '<input type="text" name="linkedin_handler" value="' . $linkedin . '" placeholder="Linkedin handler" />';
}

//Sanitization settings
function modeling_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );//remove HTML
	$output = str_replace('@', '', $output);//remove @ from twitter input in WP dashboard
	return $output;
}

//Template submenu functions
function modeling_theme_create_page(){ //the same name as Fifth Value in function portfolio_add_admin_page().
	//generation of our admin page
	//echo '<h1>Modeling-portfolio Theme Options</h1>';
	require_once( get_template_directory() . '/inc/templates/modeling-admin.php' );
}

function portfolio_theme_support_page(){
	require_once( get_template_directory() . '/inc/templates/modeling-theme-support.php' );
}

function portfolio_contact_form_page(){
	require_once( get_template_directory() . '/inc/templates/modeling-contact-form.php' );
}

//Modeling Portfolio CSS Options
function portfolio_theme_settings_page(){
	//Generation of admin page
	//echo '<h1>Modeling-portfolio Custom CSS</h1>';
	require_once( get_template_directory() . '/inc/templates/modeling-custom-css.php' );
}



?>
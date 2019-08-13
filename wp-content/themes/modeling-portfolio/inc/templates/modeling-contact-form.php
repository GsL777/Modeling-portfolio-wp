<h1>Modeling Portfolio Contact Form</h1>
<?php settings_errors(); //function that will print an error?>

<form method="post" action="options.php" class="modeling-general-form"> 

	<?php settings_fields( 'modeling-contact-options' ); //Contact Form Options from function modeling_custom_settings register_setting First parameter?>
	
	<?php do_settings_sections( 'fashion_portfolio_theme_contact' ); //Contact Form Options from function modeling_custom_settings Fourth parameter?>

	<?php submit_button(); //First parameter - text parameter of submit button. Second parameter - the type of the button. Third parameter - name will be used as an id. ?>
</form>

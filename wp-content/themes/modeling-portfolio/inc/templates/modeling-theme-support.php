<h1>Modeling Theme Options</h1>
<?php settings_errors(); //function that will print an error?>

<form method="post" action="options.php" class="modeling-general-form"> 

	<?php settings_fields( 'modeling-theme-support' ); //Theme Options from function modeling_custom_settings?>
	
	<?php do_settings_sections( 'fashion_portfolio_theme' );?>

	<?php submit_button(); //First parameter - text parameter of submit button. Second parameter - the type of the button. Third parameter - name will be used as an id. ?>
</form>

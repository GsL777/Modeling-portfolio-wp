<h1>Modeling Custom CSS</h1>
<?php settings_errors(); //function that will print an error?>

<form id="save-custom-css-form" method="post" action="options.php" class="modeling-general-form"> 

	<?php settings_fields( 'modeling-custom-css-options' );//function-admin.php function modeling_custom_settings(), Custom CSS Options register_setting first variable?>
	
	<?php do_settings_sections( 'fashion_portfolio_css' );//function-admin.php function modeling_custom_settings(), Custom CSS Options add_settings_section fourth variable ?>

	<?php submit_button(); //First parameter - text parameter of submit button. Second parameter - the type of the button. Third parameter - name will be used as an id. ?>
</form>
<!-- modeling.custom_css.js, enqueue.php, function-admin.php -->
<h1>Modeling Sidebar Options</h1>
<?php settings_errors(); //function that will print an error?>

<?php 
	//function-admin.php
	//Need to retype variables as in function-admin.php
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
?>

<div class="modeling-sidebar-preview">
	<div class="modeling-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>)">
			</div>
		</div>
		<h1 class="modeling-username"><?php print $fullName; ?></h1>
		<h2 class="modeling-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form method="post" action="options.php" class="modeling-general-form"><!-- options.php the same as in Dashboard -> General Settings -> right click on Site Title-> inspect (in form written) -->
	<?php settings_fields( 'modeling-settings-group' ); //put modeling-settings-group from function-admin.php modeling_custom_settings?>
	
	<?php do_settings_sections( 'fashion_portfolio' ); //have to specify the the section where the name belongs. fashion_portfolio taken from function-admin function modeling_custom_settings add_settings_section FOURTH PARAMETER?>

	<?php submit_button( 'Save changes', 'primary', 'btnSubmit' ); //First parameter - text parameter of submit button. Second parameter - the type of the button. Third parameter - name will be used as an id. Not to interfere with ($('.modeling-general-form').submit();) in modeling.admin.js?>
</form>


jQuery(document).ready(function($){
//IMPLEMENTING ACE
	var updateCSS = function(){
		$("#modeling_css").val( editor.getSession().getValue() );
	}//#modeling_css taken from function-admin.php function modeling_custom_css_callback()

	$("#save-custom-css-form").submit( updateCSS );//from modeling-custom-css.php id="". And call the var updateCSS.
});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");//WP DASHBOARD MODELING CUSTOM CSS themes from assets/admin-js -> ace
editor.getSession().setMode("ace/mode/css");
//modeling.custom_css.js, enqueue.php, modeling-custom-css.php
<?php 
/*

	@package modeling-modeling-theme

	==========================================
		SHORTCODE OPTIONS
	==========================================
*/

//TOOLTIP
//https://getbootstrap.com/docs/4.0/components/tooltips/
//code in modeling-portfolio.js and must have a post created
function modeling_tooltip( $attr, $content = null ){//First parameter - the array that contains the attributes. Second parameter - is the content. Text wrapped around a shortcode. $content = null - default action not to trigger an error if [tooltip][/tooltip] is empty.

// PUT TOOLTIP IN WP DASBOARD -> POST
/*
[tooltip placement="top" title="This is the title"]This is the content[/tooltip]

always use lowecase. Do not use _ or - and capital letters inside []
*/

	//get the attributes
	$attr = shortcode_atts(
		array(
			'placement'	=> 'top',
			'title'		=> '',
		),
		$attr,
		'tooltip'
	);

	$title = ( $attr['title'] == '' ? $content : $attr['title'] );

	//return HTML
	return '<span class="modeling-tooltip" data-toggle="tooltip" data-placement="' . $attr['placement'] . '" title="' . $title . '">' . $content . '</span>';//in the dasboard -> post -> select a post write arround the word [tooltip placement="top" title="Tooltip Title"][/tooltip] -> press update. To activate the tooltip write javascript in modeling-modeling.js revealPosts(); function. style in single.scss
}

add_shortcode( 'tooltip', 'modeling_tooltip' ); //First Variable - shorcode name, Second variable - the name of the function shortcode that must be called
//For function to work need to put $('[data-toggle="tooltip"]').tooltip(); to revealPosts function to modeling-portfolio.js


//POPOVER
function modeling_popover( $attr, $content = null ){//code in modeling-portfolio.js
/*
	[popover title="Popover Title" placement="top" content="This is the Popover Content"]This is the clickable content[/popover]
*/

	$attr = shortcode_atts(
		array(
			'placement'	=> 'top',
			'title'		=> '',
			'trigger'	=> 'click',
			'content'	=> ''
		),
		$attr,
		'popover'
	);

	//return HTML
	return '<span class="modeling-popover" data-toggle="popover" data-placement="' . $attr['placement'] . '" title="' . $attr['title'] . '" data-trigger="' . $attr['trigger'] . '" data-content="' . $attr['content'] . '">' . $content . '</span>';

	//return HTML
	/*
	return '<button type="button" class="btn btn-lg btn-danger" data-toggle="popover" data-trigger="click" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>';
	*/
}

add_shortcode( 'popover', 'modeling_popover' );//For function to work need to put $('[data-toggle="popover"]').popover(); to revealPosts function to modeling-portfolio.js
?>
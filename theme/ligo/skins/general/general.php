<?php
/**
 * Grecko skin file for theme.
 */


//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
add_filter('theme_skin_use_fonts', 'theme_skin_use_fonts_grecko');
function theme_skin_use_fonts_grecko($theme_fonts) {
	$theme_fonts['Roboto'] = 1;
	return $theme_fonts;
}

// Add skin fonts in the main fonts list
add_filter('theme_skin_list_fonts', 'theme_skin_list_fonts_grecko');
function theme_skin_list_fonts_grecko($list) {
	//$list['Advent Pro'] = array('family'=>'sans-serif', 'link'=>'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic,cyrillic-ext');
	if (!isset($list['Roboto']))	$list['Roboto'] = array('family'=>'sans-serif');
	return $list;
}


//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------

// Add skin stylesheets
add_action('theme_skin_add_stylesheets', 'theme_skin_add_stylesheets_grecko');
function theme_skin_add_stylesheets_grecko() {
	themerex_enqueue_style( 'theme-skin', themerex_get_file_url('/skins/general/general.css'), array('main-style'), null );
}

// Add skin responsive styles
add_action('theme_skin_add_responsive', 'theme_skin_add_responsive_grecko');
function theme_skin_add_responsive_grecko() {
	if (file_exists(themerex_get_file_dir('/skins/general/general-responsive.css'))) 
		themerex_enqueue_style( 'theme-skin-responsive', themerex_get_file_url('/skins/general/general-responsive.css'), array('theme-skin'), null );
}

// Add skin responsive inline styles
add_filter('theme_skin_add_responsive_inline', 'theme_skin_add_responsive_inline_grecko');
function theme_skin_add_responsive_inline_grecko($custom_style) {
	return $custom_style;	
}


//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
add_action('theme_skin_add_scripts', 'theme_skin_add_scripts_grecko');
function theme_skin_add_scripts_grecko() {
	if (file_exists(themerex_get_file_dir('/skins/general/general.js')))
		themerex_enqueue_script( 'theme-skin-script', themerex_get_file_url('/skins/general/general.js'), array('main-style'), null );
}

// Add skin scripts inline
add_action('theme_skin_add_scripts_inline', 'theme_skin_add_scripts_inline_grecko');
function theme_skin_add_scripts_inline_grecko() {
	?>
	if (THEMEREX_theme_font=='') THEMEREX_theme_font = 'Roboto';

	// Add skin custom colors in custom styles
	function theme_skin_set_theme_color(custom_style, clr) {
		custom_style += 
			'.theme_accent2,.sc_team .sc_team_item .sc_team_item_position'
			+'{ color:'+clr+'; }'
			+'.theme_accent2_bgc,.sc_title_divider.theme_accent2 .sc_title_divider_before,.sc_title_divider.theme_accent2 .sc_title_divider_after,.sc_team .sc_team_item .sc_team_item_avatar:after'
			+'{ background-color:'+clr+'; }'
			+'.theme_accent2_bg'
			+'{ background:'+clr+'; }'
			+'.theme_accent2_border'
			+'{ border-color:'+clr+'; }';
		return custom_style;
	}

	// Add skin's main menu (top panel) back color in the custom styles
	function theme_skin_set_menu_bgcolor(custom_style, clr) {
		return custom_style;
	}

	// Add skin's main menu (top panel) fore colors in the custom styles
	function theme_skin_set_menu_color(custom_style, clr) {
		return custom_style;
	}

	// Add skin's user menu (user panel) back color in the custom styles
	function theme_skin_set_user_menu_bgcolor(custom_style, clr) {
		return custom_style;
	}

	// Add skin's user menu (user panel) fore colors in the custom styles
	function theme_skin_set_user_menu_color(custom_style, clr) {
		return custom_style;
	}
	<?php	
}


//------------------------------------------------------------------------------
// Get/Set skin's main (accent) theme color
//------------------------------------------------------------------------------


// Return main theme color (if not set in the theme options)
add_filter('theme_skin_get_theme_color', 'theme_skin_get_theme_color_grecko', 10, 1);
function theme_skin_get_theme_color_grecko($clr) {
	return empty($clr) ? '#1172d3' : $clr;
}

// Return main theme bg color
add_filter('theme_skin_get_theme_bgcolor', 'theme_skin_get_theme_bgcolor_grecko', 10, 1);
function theme_skin_get_theme_bgcolor_grecko($clr) {
	return '#ffffff';
}

// Add skin's specific theme colors in the custom styles
add_filter('theme_skin_set_theme_color', 'theme_skin_set_theme_color_grecko', 10, 2);
function theme_skin_set_theme_color_grecko($custom_style, $clr) {
	$custom_style .= '
		.theme_accent2,
		.sc_team .sc_team_item .sc_team_item_position
		{ color:'.$clr.'; }
		.theme_accent2_bgc,
		.sc_title_divider.theme_accent2 .sc_title_divider_before,
		.sc_title_divider.theme_accent2 .sc_title_divider_after,
		.sc_team .sc_team_item .sc_team_item_avatar:after
		{ background-color:'.$clr.'; }
		.theme_accent2_bg
		{ background:'.$clr.'; }
		.theme_accent2_border
		{ border-color:'.$clr.'; }
		';
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's main menu (top panel) color
//------------------------------------------------------------------------------

// Return skin's main menu (top panel) background color (if not set in the theme options)
add_filter('theme_skin_get_menu_bgcolor', 'theme_skin_get_menu_bgcolor_grecko', 10, 1);
function theme_skin_get_menu_bgcolor_grecko($clr) {
	return empty($clr) ? '#1172d3' : $clr;
}

// Add skin's main menu (top panel) background color in the custom styles
add_filter('theme_skin_set_menu_bgcolor', 'theme_skin_set_menu_bgcolor_grecko', 10, 2);
function theme_skin_set_menu_bgcolor_grecko($custom_style, $clr) {
	return $custom_style;
}

// Add skin's main menu (top panel) fore colors in custom styles
add_filter('theme_skin_set_menu_color', 'theme_skin_set_menu_color_grecko', 10, 2);
function theme_skin_set_menu_color_grecko($custom_style, $clr) {
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's user menu (user panel) color
//------------------------------------------------------------------------------

// Return skin's user menu color (if not set in the theme options)
add_filter('theme_skin_get_user_menu_bgcolor', 'theme_skin_get_user_menu_bgcolor_grecko', 10, 1);
function theme_skin_get_user_menu_bgcolor_grecko($clr) {
	return empty($clr) ? '#1172d3' : $clr;
}

// Add skin's user menu (user panel) background color in the custom styles
add_filter('theme_skin_set_user_menu_bgcolor', 'theme_skin_set_user_menu_bgcolor_grecko', 10, 2);
function theme_skin_set_user_menu_bgcolor_grecko($custom_style, $clr) {
	return $custom_style;
}

// Add skin's user menu (user panel) fore colors in custom styles
add_filter('theme_skin_set_user_menu_color', 'theme_skin_set_user_menu_color_grecko', 10, 2);
function theme_skin_set_user_menu_color_grecko($custom_style, $clr) {
	return $custom_style;
}
?>
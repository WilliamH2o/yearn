<style>
	/* TODO: add to wp_head	after customizer color picker - make sure its minified*/

	<?php

	$body_bg = '';
	$body_fg = '';

	$top_bar_fg = get_theme_mod( 'yearn_top_bar_foreground' );

	$color_one_bg = get_theme_mod( 'yearn_color_one_background' );
	$color_one_fg = get_theme_mod( 'yearn_color_one_foreground' );

	$color_two_bg = get_theme_mod( 'yearn_color_two_background' );
	$color_two_fg = get_theme_mod( 'yearn_color_two_foreground' );

	?>

	body {
		background-color: <?php echo get_theme_mod( 'yearn-colors-site-background' ); ?>;
		background-image: url("<?php echo get_theme_mod( 'yearn-colors-site-background_image' ); ?>");

	}
	body, button, input, select, textarea { color: <?php echo get_theme_mod( 'yearn-colors-site-text' ); ?> ; }

	a { color: <?php echo get_theme_mod( 'yearn-colors-site-links' ); ?>; }
	/*a:visited {	color: #3f00bd; }*/

	.entry-title {
		background-color: <?php echo get_theme_mod( 'yearn-colors-site-title_background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-site-title_text' ); ?>;
	}

	#primary { background-color: <?php echo get_theme_mod( 'yearn-colors-site-content_background' ); ?>; }

	#yearn-top-bar {
		background-color: <?php echo get_theme_mod( 'yearn-colors-topbar-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-text' ); ?>;
	}

	#yearn-top-bar a {
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-links' ); ?>;
	}

	#yearn-site-footer {
		background-color: <?php echo get_theme_mod( 'yearn-colors-footer-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-footer-text' ); ?>;
	}

	#yearn-site-footer a {
		color: <?php echo get_theme_mod( 'yearn-colors-footer-links' ); ?>;
	}

	#yearn-bottom-bar {
		background-color: <?php echo get_theme_mod( 'yearn-colors-bottombar-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-bottombar-text' ); ?>;
	}

	#yearn-bottom-bar a {
		color: <?php echo get_theme_mod( 'yearn-colors-bottombar-links' ); ?>;
	}

	.color-one,
	#secondary .widget:nth-child(even){
		background-color: <?php echo $color_one_bg ?>;
		color: <?php echo $color_one_fg ?>;
	}
	.color-one-fg,
	.color-one a,
	a.color-one { color: <?php echo $color_one_fg ?>;}

	.color-one-bg { background-color: <?php echo $color_one_bg ?>;}


	.color-two,
	#secondary .widget:nth-child(odd),
	.top-bar .sub-menu	{
		background-color: <?php echo $color_two_bg ?>;
		color: <?php echo $color_two_fg ?>;
	}
	.color-two-fg,
	.color-two a { color: <?php echo $color_two_fg ?>;}
	.color-two-bg { background-color: <?php echo $color_two_bg ?>;}

	/* Style the widget placeholder text*/
	.widget ::-webkit-input-placeholder { color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget :-moz-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget ::-moz-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget :-ms-input-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }



	#content .main { background-color:  <?php echo get_theme_mod( 'yearn_content_background' ); ?>;	}

	.hmenu ul ul,
	button,
	.button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"] {
		background-color: #4f4a59; color:#ffffff;
	}

	button:hover, .button:hover, input[type="button"]:hover, input[type="reset"]:hover,	input[type="submit"]:hover {
		background-color: <?php echo shadeColor( '#4f4a59', -5); ?>;
	}

	/*.entry-date { background-color:*/<?php //echo shadeColor( '#4f4a59', 10); ?>/*; }*/

	/*.entry-meta,*/
	/*.entry-meta a { color: */<?php //echo shadeColor( '#fff', 40); ?>/* }*/


</style>

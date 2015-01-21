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

	h1.entry-title,
	.page-title,
	.entry-meta {
		background-color: <?php echo get_theme_mod( 'yearn-colors-content-title_background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-content-title_text' ); ?>;
	}

	h3.entry-title {
		background-color: <?php echo get_theme_mod( 'yearn-colors-archives-title_background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-archives-title_text' ); ?>;
	}

	h3.entry-title a {color: <?php echo get_theme_mod( 'yearn-colors-archives-title_text' ); ?>;}

	.entry-meta a { color: <?php echo get_theme_mod( 'yearn-colors-content-title_text' ); ?>; }

	h3.entry-title { background-color: <?php echo shadeColor( get_theme_mod( 'yearn-colors-content-title_background' ), -10) ?>;}

	.entry-date { background-color: <?php echo shadeColor( get_theme_mod( 'yearn-colors-content-title_background' ), -5) ?>;}

	.entry-excerpt { background-color: <?php echo get_theme_mod( 'yearn-colors-archives-content_background' ) ?>;}

	#primary { background-color: <?php echo get_theme_mod( 'yearn-colors-site-content_background' ); ?>; }

	#secondary { background-color: <?php echo get_theme_mod( 'yearn-colors-site-sidebar_background' ); ?>; }

	#yearn-top-bar {
		background-color: <?php echo get_theme_mod( 'yearn-colors-topbar-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-text' ); ?>;
	}

	#yearn-top-bar a {
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-links' ); ?>;
	}

	.edit-link a,
	.nav-links a,
	button,
	.button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"] {
		background-color: <?php echo get_theme_mod( 'yearn-colors-content-button-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-content-button-text' ); ?>;
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

	/* Style the widget placeholder text*/
	.widget ::-webkit-input-placeholder { color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget :-moz-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget ::-moz-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }
	.widget :-ms-input-placeholder { color: color: <?php echo $color_two_fg ?>; opacity: .5 }

	/*.entry-meta,*/
	/*.entry-meta a { color: */<?php //echo shadeColor( '#fff', 40); ?>/* }*/


</style>

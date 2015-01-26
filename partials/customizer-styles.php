<style>
	/* TODO: add to wp_head	after customizer color picker - make sure its minified*/

	<?php

	$body_bg = get_theme_mod( 'yearn-colors-site-background' );
	$body_fg = '';

	$top_bar_fg = get_theme_mod( 'yearn_top_bar_foreground' );

	?>

	body {
		background-color: <?php echo ( $body_bg ?  $body_bg : '#000000' ); ?>;
		background-image: url("<?php  echo get_theme_mod( 'yearn-colors-site-background_image' ); ?>");
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

	h3.entry-title { background-color: <?php // echo shadeColor( get_theme_mod( 'yearn-colors-content-title_background' ), -10) ?>;}

	.entry-excerpt { background-color: <?php echo get_theme_mod( 'yearn-colors-archives-content_background' ) ?>;}

	#primary { background-color: <?php echo get_theme_mod( 'yearn-colors-site-content_background' ); ?>; }

	#secondary { background-color: <?php echo get_theme_mod( 'yearn-colors-site-sidebar_background' ); ?>; }

	#masthead {
		background-color: <?php echo get_theme_mod( 'yearn-colors-masthead-background' ); ?>;
		background-image: url("<?php  echo get_theme_mod( 'yearn-colors-masthead-background_image' ); ?>");
		color: <?php echo get_theme_mod( 'yearn-colors-masthead-text' ); ?>;
	}

	#masthead .sub-menu {
		background-color: <?php echo get_theme_mod( 'yearn-colors-masthead-background' ); ?>;
	}

	#masthead a {
		color: <?php echo get_theme_mod( 'yearn-colors-masthead-links' ); ?>;
	}

	#yearn-top-bar,
	#yearn-top-bar .sub-menu {
		background-color: <?php echo get_theme_mod( 'yearn-colors-topbar-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-text' ); ?>;
	}

	#yearn-top-bar a {
		color: <?php echo get_theme_mod( 'yearn-colors-topbar-links' ); ?>;
	}

	#yearn-stripe,
	#yearn-stripe .sub-menu {
		background-color: <?php echo get_theme_mod( 'yearn-colors-stripe-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-stripe-text' ); ?>;
	}

	#yearn-stripe a {
		color: <?php echo get_theme_mod( 'yearn-colors-stripe-links' ); ?>;
	}

	#yearn-site-header {
		background-color: <?php echo get_theme_mod( 'yearn-colors-header-background' ); ?>;
		color: <?php echo get_theme_mod( 'yearn-colors-header-text' ); ?>;
	}

	#yearn-site-header a {
		color: <?php echo get_theme_mod( 'yearn-colors-header-links' ); ?>;
	}

	.edit-link a,
	.nav-links a,
	button,
	.button,
	.comment-reply-link,
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

<?php
/**
 * The header for our theme.
 *
 * Displays head, header#masthead, and begins div#content>div.row
 *
 * @package yearn
 */
?>

<?php
/**
 * todo: conditional featured images based on size and ratio
 * todo: verify size http://192.168.1.125/wptest/?p=1011
 * todo: verify placement http://192.168.1.125/wptest/?p=1016
 * todo: verify <?php the_title( '<h2 class="entry-title">', '</h2>' );
 * ****add color-one and … classes
 * test and fix mobile
 * CSS
 * 	Outline ( without 1,2,3 just bullets )
 * 	reduce grid
 * 	organize css
 * ---test long menu
 * todo: if no sidebar widgets then full width
 * todo: page templates
 * 		left, no sidebar
 *  todo: customizer
 * 		colors
 * 		logo upload
 * 		logo menu same row / verify
 * 		conditional on page css
 * todo: pretty up the gallery pages http://192.168.1.125/wptest/?p=555
 * verify menus areas and that they are conditional
 * verify widget areas and that they are conditional
 * duplicate post status search bar
 * clean search http://192.168.1.125/wptest/?s=Adminimize
 * editor-style.css
 * WooCommerce friendly
 *
 * */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
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
a { color: #3f00bd; }
/*a:visited {	color: #3f00bd; }*/

#yearn-top-bar { background-color: <?php echo get_theme_mod( 'yearn_top_bar_background' ); ?>}

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

	body { background-color: <?php echo get_theme_mod( 'yearn_background' ); ?>; }

	#content .main { background-color:  <?php echo get_theme_mod( 'yearn_content_background' ); ?>;	}

	body, button, input, select, textarea { color: #333333; }



	/*.color-one,*/
	/*#secondary .widget:nth-child(even) {*/
		/*background-color: #70818c; color:#ffffff;*/
	/*}*/


h1, h2, h3, h4, h5, h6 { color: #70818c;}

	/*.color-two,*/
	/*.widget,*/
	/*.top-bar .widget_nav_menu ul ul,*/
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

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'yearn' ); ?></a>

	<header id="masthead" class="color-one full" role="banner"><!--compact -->

		<?php do_action( 'yearn_header' ); ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content <?php echo ( !is_active_sidebar( 'sidebar' ) ? 'full' : '' ); ?>">
		<div class="row main">

			<?php do_action( 'yearn_content_begin' ); ?>
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
 * tab on dropdown
 * add color-one and … classes
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

	html, body { background-color: #dddddd; }

	#content .main {
		background-color: #f7f7f7;
		border-left: 1px solid <?php echo shadeColor( '#dddddd', -10); ?>;
		border-right: 1px solid <?php echo shadeColor( '#dddddd', -10); ?>;
	}
body, button, input, select, textarea {	color: #333333; }

	a { color: #3f00bd; }
	a:visited {	color: #3f00bd; }

	.color-one,
	#secondary .widget:nth-child(even)	{
		background-color: #70818c; color:#ffffff;
	}

	.color-one a,
	a.color-one,
	.color-two a,
	.entry-date,
	.entry-meta .entry-date a,
	.widget a,
	.site-description {
		color:#ffffff; background-color: transparent;
	}

h1, h2, h3, h4, h5, h6 { color: #70818c;}

	.color-two,
	.widget,
	.top-bar .widget_nav_menu ul ul,
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

.entry-date { background-color:<?php echo shadeColor( '#4f4a59', 10); ?>; }

.entry-meta,
.entry-meta a { color: #4f4a59; }

</style>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'yearn' ); ?></a>

	<header id="masthead" class="site-header color-one full" role="banner"><!--compact -->

		<?php do_action( 'yearn_header' ); ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content <?php echo ( !is_active_sidebar( 'sidebar' ) ? 'full' : '' ); ?>">
		<div class="row main">

			<?php do_action( 'yearn_content_begin' ); ?>
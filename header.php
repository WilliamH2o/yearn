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
	<?php get_template_part( 'partials/customizer-styles' ); ?>
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
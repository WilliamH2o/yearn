<?php
/**
 * Yearn Hooks
 *
 * todo: add wrap argument. different actions will have different wraps
 * todo: need header#masthead within
 */

/**
 * do_action( 'yearn_header' );
 *
 * Outputs components to header#masthead
 *
 * Order:
 * div.top-bar-a > div.row > nav#top-bar-navigation > 'top' menu
 * div.top-bar-b > ( div.section-a > 'top-bar-section-a' sidebar ) + ( div.section-b > 'top-bar-section-b' sidebar )
 * div.site-header > div.site-branding + ( main-navigation > 'primary' menu )
 *
 * @see header.php
 */


/**
 * Outputs  do_action( 'yearn_top_bar_a' ) to div.top-bar-a
 *
 * Order:
 * div.top-bar-a > div.row > do_action( 'yearn_top_bar_a' )
 */
if ( ! function_exists( 'yearn_top_bar_a' ) ) {
	function yearn_top_bar_a() {
		if ( has_action( 'yearn_top_bar_a' ) ) { ?>

			<div class=" top-bar top-bar-a color-one ">
				<div class="row middle">

					<?php do_action( 'yearn_top_bar_a' );?>

				</div>
			</div>

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_top_bar_a', 10 );

/**
 * Outputs 'top' menu to nav#top-bar-navigation
 *
 * Hooked to 'yearn_top_bar_a' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_top_bar_navigation' ) ) {
	function yearn_top_bar_navigation() { ?>

		<nav id="top-bar-navigation" class=" hmenu col" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'top', 'after' => '<span>&nbsp;</span>')); ?>
		</nav><!-- #top-bar-navigation -->

	<?php }
}

/**
 * Outputs do_action( 'yearn_top_bar_b' ) to dib.top-bar-b
 *
 * Order:
 * div.top-bar-b > div.row > do_action( 'yearn_top_bar_b' )
 */
if ( ! function_exists( 'yearn_top_bar_b' ) ) {
	function yearn_top_bar_b() {
		if (  has_action( 'yearn_top_bar_b' ) ) { ?>

			<div class=" top-bar top-bar-b color-two ">
				<div class="row middle">

					<?php do_action( 'yearn_top_bar_b' ); ?>

				</div>
			</div> <!-- .top-bar -->

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_top_bar_b', 20 );

/**
 * Outputs do_action( 'yearn_top_bar_b_section_a' ) to div.section-a
 */
if ( ! function_exists( 'yearn_top_bar_b_section_a' ) ) {
	function yearn_top_bar_b_section_a() { ?>

		<?php if ( has_action( 'yearn_top_bar_b_section_a' ) ) { ?>
			<div class="section-a row middle col">
				<?php do_action( 'yearn_top_bar_b_section_a' ); ?>
			</div>
		<?php } ?>

	<?php }
}
add_action( 'yearn_top_bar_b', 'yearn_top_bar_b_section_a', 10 );

/**
 * Outputs dynamic_sidebar( 'top-bar-section-a' )
 *
 * Hooked to 'yearn_top_bar_b_section_a' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_section_a_widgets' ) ) {
	function yearn_section_a_widgets() { ?>

		<?php dynamic_sidebar( 'top-bar-section-a' ); ?>

	<?php }
}
add_action( 'yearn_top_bar_b_section_a', 'yearn_section_a_widgets' );


/**
 * Outputs do_action( 'yearn_top_bar_b_section_b' ) to div.section-b
  */
if ( ! function_exists( 'yearn_top_bar_b_section_b' ) ) {
	function yearn_top_bar_b_section_b() { ?>

		<?php if ( has_action( 'yearn_top_bar_b_section_b' ) ) { ?>
			<div class="section-b row middle col">
				<?php do_action( 'yearn_top_bar_b_section_b' ); ?>
			</div>
		<?php } ?>

	<?php }
}
add_action( 'yearn_top_bar_b', 'yearn_top_bar_b_section_b', 10 );

/**
 * Outputs dynamic_sidebar( 'top-bar-section-b' )
 *
 * Hooked to 'yearn_top_bar_b_section_b' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_top_bar_b_section_b_widgets' ) ) {
	function yearn_section_b_widgets() { ?>

		<?php dynamic_sidebar( 'top-bar-section-b' ); ?>

	<?php }
}

/**
 * Outputs do_action( 'yearn_site_header' ) to div.site-header
 */
if ( ! function_exists( 'yearn_site_header' ) ) {
	function yearn_site_header() {
		if ( has_action( 'yearn_site_header' ) ) { ?>

			<div class="site-header row middle">
				<?php do_action( 'yearn_site_header' );?>
			</div><!-- .row -->

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_site_header', 40 );

/**
 * Outputs site-branding components
 *
 * Order:
 * div.site-branding > h1.site-title + h2.site-description
 */
if ( ! function_exists( 'yearn_site_branding' ) ) {
	function yearn_site_branding() { ?>

			<div class="site-branding col">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				if ( get_bloginfo( 'description' ) ) { ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php } ?>
			</div><!-- .site-branding -->

	<?php }
}
add_action( 'yearn_site_header', 'yearn_site_branding', 10 );

/**
 * Outputs 'primary' menu to nav#site-navigation
 *
 * Hooked to 'yearn_site_header' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_site_navigation' ) ) {
	function yearn_site_navigation() { ?>

		<nav id="site-navigation" class="main-navigation hmenu col" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', '_s' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

	<?php }
}

/**
 * do_action( 'yearn_footer' );
 *
 * Outputs:
 * footer#colophon > div.row > do_action( 'yearn_footer_begin' ) + ( div.row
 * > ( div.footer-first > do_action( 'yearn_footer_first' ) > dynamic_sidebar( 'footer-first' ) )
 * + ( div.footer-second > do_action( 'yearn_footer_second' ) > dynamic_sidebar( 'footer-second' ) )
 * + ( div.footer-third > do_action( 'yearn_footer_third' ) > dynamic_sidebar( 'footer-third' ) ) )
 * + do_action( 'yearn_footer_end' )
 *
 * @see footer.php
 */

/**
 * Outputs footer#colophon with components
 *
 * footer#colophon > div.row > do_action( 'yearn_footer_begin' ) + ( div.row
 * > ( div.footer-first > do_action( 'yearn_footer_first' ) )
 * + ( div.footer-second > do_action( 'yearn_footer_second' ) )
 * + ( div.footer-third > do_action( 'yearn_footer_third' ) )
 * + do_action( 'yearn_footer_end' )
 */
if ( ! function_exists( 'yearn_footer' ) ) {
	function yearn_footer() { ?>

			<footer id="colophon" class="site-footer color-one" role="contentinfo">
				<div class="row ">

					<?php do_action( 'yearn_footer_begin' ); ?>

					<div class="row <?php echo yearn_footer_width(); ?>">


					<?php if ( has_action( 'yearn_footer_first' ) ) { ?>
						<div class="footer-first col">
							<?php do_action( 'yearn_footer_first' ); ?>
						</div>
					<?php } ?>

					<?php if ( has_action( 'yearn_footer_second' ) ) { ?>
						<div class="footer-second col">
							<?php do_action( 'yearn_footer_second' ); ?>
						</div>
					<?php } ?>

					<?php if ( has_action( 'yearn_footer_third' ) ) { ?>
						<div class="footer-third col">
							<?php do_action( 'yearn_footer_third' ); ?>
						</div>
					<?php } ?>

					</div>

					<?php do_action( 'yearn_footer_end' ); ?>

				</div>
			</footer><!-- #colophon -->

	<?php }
}
add_action( 'yearn_footer', 'yearn_footer', 10 );

/**
 * Outputs dynamic_sidebar( 'footer-first' )
 *
 * Hooked to 'yearn_footer_first' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_footer_first_widgets' ) ) {
	function yearn_footer_first_widgets() { ?>

		<?php dynamic_sidebar( 'footer-first' ); ?>

	<?php }
}

/**
 * Outputs dynamic_sidebar( 'footer-second' )
 *
 * Hooked to 'yearn_footer_second' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_footer_second_widgets' ) ) {
	function yearn_footer_second_widgets() { ?>

		<?php dynamic_sidebar( 'footer-second' ); ?>

	<?php }
}

/**
 * Outputs dynamic_sidebar( 'footer-third' )
 *
 * Hooked to 'yearn_footer_third' via yearn_call_actions()
 */
if ( ! function_exists( 'yearn_footer_third_widgets' ) ) {
	function yearn_footer_third_widgets() { ?>

		<?php dynamic_sidebar( 'footer-third' ); ?>

	<?php }
}

/**
 *
 * Various add_action() called after_setup_theme
 *
 */
function yearn_call_actions() {

	if ( has_nav_menu( 'top' ) ) {
		add_action('yearn_top_bar_a', 'yearn_top_bar_navigation', 10);
	}

	if ( is_active_sidebar( 'top-bar-section-a' ) ) {
		add_action( 'yearn_top_bar_b_section_a', 'yearn_section_a_widgets', 10 );
	}

	if ( is_active_sidebar( 'top-bar-section-b' ) ) {
		add_action( 'yearn_top_bar_b_section_b', 'yearn_section_b_widgets', 10 );
	}

	if ( has_nav_menu( 'primary') ) {
		add_action( 'yearn_site_header', 'yearn_site_navigation', 20 );
	}

	if ( is_active_sidebar( 'footer-first' ) ) {
		add_action( 'yearn_footer_first', 'yearn_footer_first_widgets', 10 );
	}

	if ( is_active_sidebar( 'footer-second' ) ) {
		add_action( 'yearn_footer_second', 'yearn_footer_second_widgets', 10 );
	}

	if ( is_active_sidebar( 'footer-third' ) ) {
		add_action( 'yearn_footer_third', 'yearn_footer_third_widgets', 10 );
	}

}
add_action( 'after_setup_theme', 'yearn_call_actions' );

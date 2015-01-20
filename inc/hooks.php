<?php
/**
 * Yearn Hooks
 *
 * todo: add wrap argument. different actions will have different wraps
 * todo: need header#masthead within
  * todo: if no menu/widget found display text.
 */

/**
 * do_action( 'yearn_header' );
 *
 * Outputs components to header#masthead
 *
 * @see header.php
 */


/**
 * Top Bar
 *
 * Outputs #yearn-top-bar and do_action( 'yearn_topbar' )
 */
if ( ! function_exists( 'yearn_topbar' ) ) {
	function yearn_topbar() {
		if ( has_action( 'yearn_topbar' ) && '0' == get_theme_mod( 'yearn-topbar-display' ) ) { ?>

			<div id="yearn-top-bar" class=" top-bar color-one">
				<div class="row middle">

					<?php do_action( 'yearn_topbar' );?>

				</div>
			</div><!-- #yearn-top-bar -->

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_topbar', 10 );

	/**
	 * Does yearn_init_widgets for topbar
	 */
	function yearn_register_topbar_widgets() {
		yearn_init_widgets('yearn-topbar-sections', 'topbar', __('Top Bar', 'yearn') );
	}
	add_action( 'after_setup_theme', 'yearn_register_topbar_widgets' );

	/**
	 * Does yearn_customize_sections for topbar
	 */
	function yearn_topbar_sections() {
		yearn_customize_sections( 'yearn-topbar-sections', 'topbar' );
	}
	add_action('yearn_topbar', 'yearn_topbar_sections');

/**
 * Stripe
 *
 * Outputs #yearn-stripe and do_action( 'yearn_stripe' )
 */
if ( ! function_exists( 'yearn_stripe' ) ) {
	function yearn_stripe() {
		if (  has_action( 'yearn_stripe' ) && '0' == get_theme_mod( 'yearn-stripe-display' ) ) { ?>

			<div id="yearn-stripe" class=" top-bar color-two ">
				<div class="row middle">

					<?php do_action( 'yearn_stripe' ); ?>

				</div>
			</div> <!-- #yearn_stripe -->

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_stripe', 20 );

	/**
	 * Does yearn_init_widgets for stripe
	 */
	function yearn_register_stripe_widgets() {
		yearn_init_widgets('yearn-stripe-sections', 'stripe', __('Stripe', 'yearn') );
	}
	add_action( 'after_setup_theme', 'yearn_register_stripe_widgets' );

	/**
	 * Does yearn_customize_sections for stripe
	 */
	function yearn_stripe_sections() {
		yearn_customize_sections( 'yearn-stripe-sections', 'stripe' );
	}
	add_action('yearn_stripe', 'yearn_stripe_sections');

/**
 * Header
 *
 * Outputs #site-header and do_action( 'yearn_site_header' )
 */
if ( ! function_exists( 'yearn_site_header' ) ) {
	function yearn_site_header() {
		if ( has_action( 'yearn_site_header' ) && '0' == get_theme_mod( 'yearn-header-display' ) ) { ?>


			<div id="yearn-site-header">
				<div class="row middle">
				<?php do_action( 'yearn_site_header' );?>
				</div>
			</div><!-- #yearn-site-header -->

		<?php }
	}
}
add_action( 'yearn_header', 'yearn_site_header', 40 );

	/**
	 * Does yearn_init_widgets for header
	 */
	function yearn_register_header_widgets() {
		yearn_init_widgets('yearn-header-sections', 'header', __('Header', 'yearn') );
	}
	add_action( 'after_setup_theme', 'yearn_register_header_widgets' );

	/**
	 * Does yearn_customize_sections for header
	 */
	function yearn_header_sections() {
		yearn_customize_sections( 'yearn-header-sections', 'header' );
	}
	add_action('yearn_site_header', 'yearn_header_sections');

/**
 * Footer
 *
 * Outputs #yearn-site-footer and do_action( 'yearn_site_footer' )
 */
if ( ! function_exists( 'yearn_site_footer' ) ) {
	function yearn_site_footer() {
		if ( has_action( 'yearn_site_footer' ) && '0' == get_theme_mod( 'yearn-footer-display' ) ) { ?>

			<div id="yearn-site-footer">
				<div class="row middle">
					<?php do_action( 'yearn_site_footer' );?>
				</div>
			</div>

		<?php }
	}
}
add_action( 'yearn_footer', 'yearn_site_footer', 10 );

/**
 * Creates yearn-footer-sections widgets
 */
function yearn_register_site_footer_widgets() {
	yearn_init_widgets('yearn-footer-sections', 'site-footer', __('Footer', 'yearn') );
}
add_action( 'after_setup_theme', 'yearn_register_site_footer_widgets' );

/**
 * Outputs yearn-footer-sections
 */
function yearn_site_footer_sections() {
	yearn_customize_sections( 'yearn-footer-sections', 'site-footer' );
}
add_action('yearn_site_footer', 'yearn_site_footer_sections');

/**
 * Bottom Bar
 *
 * Outputs #yearn-bottom-bar and do_action( 'yearn_bottombar' )
 */
if ( ! function_exists( 'yearn_bottombar' ) ) {
	function yearn_bottombar() {
		if ( has_action( 'yearn_bottombar' ) && '0' == get_theme_mod( 'yearn-bottombar-display' ) ) { ?>

			<div id="yearn-bottom-bar">
				<div class="row middle">
					<?php do_action( 'yearn_bottombar' );?>
				</div>
			</div>

		<?php }
	}
}
add_action( 'yearn_footer', 'yearn_bottombar', 10 );

/**
 * Creates yearn-bottombar-sections widgets
 */
function yearn_register_bottombar_widgets() {
	yearn_init_widgets('yearn-bottombar-sections', 'bottombar', __('Bottom bar', 'yearn') );
}
add_action( 'after_setup_theme', 'yearn_register_bottombar_widgets' );

/**
 * Outputs yearn-bottombar-sections
 */
function yearn_bottombar_sections() {
	yearn_customize_sections( 'yearn-bottombar-sections', 'bottombar' );
}
add_action('yearn_bottombar', 'yearn_bottombar_sections');

/**
 * yearn_customize_sections()
 *
 * Outputs logo and dynamic_sidebar based on Customizer Layout settings
 *
 * @param $theme_mod_id
 * @param $for
 */
if ( ! function_exists( 'yearn_customize_sections' ) ) {
	function yearn_customize_sections( $theme_mod_id, $for ){

		$sections = get_theme_mod( $theme_mod_id );
//		echo $sections;
		if ( 'none' != $sections ) {

			// sections logo, small_widget, medium_widget, large_widget, full_widget
			$a_section = explode( '-' ,$sections);

			// loop through each section and output sidebar or branding
			for ( $i = 0; $i <= count( $a_section ) - 1; $i++ ) {

//				echo $a_section[$i];

				// add alternative class to change css if followed by a large section
				$alt_class = '';

				if ( $i == 0 && $a_section[0] != 'large_widget' && 0 < substr_count($sections, 'large') ) {
					$alt_class = 'small-alt';
				}

				// logo interferes with the sidebar count. -1 to fix it
				if ( 0 < $i && ( '0' < substr_count($sections, 'logo') ) ) {
					$ii = $i - 1;
				} else {
					$ii = $i;
				}

				if ( '0' < substr_count($a_section[$i], 'widget' ) ) {

					// Create Sidebar | Sidebars with Custom Menu Widget cause a bit of lag in the customizer
					echo '<div class="' . $a_section[$i] . ' ' . $alt_class . ' col">';
						dynamic_sidebar( $for . '-' . ($ii+1) );
					echo '</div>';

				} elseif ( '0' < substr_count($a_section[$i], 'logo') ) {

					// alternative class to add to change css if followed by 2 small sections
					if (  'logo-small-small' == $sections  ) {
						$alt_class = 'small';
					}

					if (  'logo_full' == $a_section[$i]  ) {
						$alt_class = 'full';
					}

					// Create
					echo '<div class="branding ' . $alt_class . ' col ">';
					 yearn_site_branding();
					echo '</div>';

				} elseif ( '0' < substr_count($a_section[$i], 'menu' ) ) {
					yearn_site_navigation();
				}

			}
		}
	}
}

/**
 * Register widget sidebars
 *
 * @param $theme_mod_id
 * @param $for
 * @param $name
 */
function yearn_init_widgets($theme_mod_id, $for, $name) {

	$sections = get_theme_mod( $theme_mod_id );

	for ($i = 1; $i <= substr_count($sections, 'widget'); $i++) {

		register_sidebar(array(
			'name' => $name . ' ' . $i,
			'id' => $for . '-' . $i,
			'description' => __( $name . ' Widget Area', 'yearn'), // todo: if this doesn't translate then remove description
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		));

	}
}

/**
 * Outputs site-branding components
 */
if ( ! function_exists( 'yearn_site_branding' ) ) {
	function yearn_site_branding() { ?>

			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php
						if ( '0' == get_theme_mod( 'yearn-blogname-hide' ) ) {
							bloginfo( 'name' );
						}
						if ( get_theme_mod( 'yearn-logo_image' ) ) { ?>
							<img src="<?php echo esc_url( get_theme_mod( 'yearn-logo_image' ) ) ?>" alt="" />
						<?php }
						?>
					</a>
				</h1>
				<?php
				if ( get_bloginfo( 'description' ) && '0' == get_theme_mod( 'yearn-blogdescription-hide' ) ) { ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php } ?>
			</div><!-- .site-branding -->

	<?php }
}
// add_action( 'yearn_site_header', 'yearn_site_branding', 10 );

/**
 * Outputs 'primary' menu to nav#site-navigation
 *
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
 *
 * Various add_action() called after_setup_theme
 *
 */
function yearn_call_actions() {


}

add_action( 'init', 'yearn_call_actions' );

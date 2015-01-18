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
 * Order:
 * div##yearn-top-bar > div.row > nav#top-bar-navigation > 'top' menu
 * div.top-bar-b > ( div.section-a > 'top-bar-section-a' sidebar ) + ( div.section-b > 'top-bar-section-b' sidebar )
 * div.site-header > div.site-branding + ( main-navigation > 'primary' menu )
 *
 * @see header.php
 */


/**
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
 * Outputs #site-header and do_action( 'yearn_site_header' )
 */
if ( ! function_exists( 'yearn_site_header' ) ) {
	function yearn_site_header() {
		if ( has_action( 'yearn_site_header' ) && '0' == get_theme_mod( 'yearn-header-display' )) { ?>


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

	$a_section = explode( '-' ,$sections);

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

	/*if ( 'none' != $sections ) {

		register_sidebar(array(
			'name' => $name . ' A',
			'id' => $for . '-0',
			'description' => __('First ' . $name . ' Widget Area', 'yearn'), // todo: if this doesn't translate then remove description
			'before_widget' => '<aside id="%1$s" class="widget %2$s col">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		));


		if ( 'full' != $sections && 'logo-large' != $sections) {
			register_sidebar(array(
				'name' => $name . ' B',
				'id' => $for . '-1',
				'description' => __('Second ' . $name . ' Widget Area', 'yearn'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s col">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>',
			));
		}

		if ('small-small-small' == $sections) {
			register_sidebar(array(
				'name' => $name . ' C',
				'id' => $for . '-2',
				'description' => __('Third ' . $name . ' Widget Area', 'yearn'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s col">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>',
			));
		}
	}*/

}


/**
 * Dead?
 * Outputs do_action( 'yearn_top_bar_b_section_a' ) to div.section-a
 */
/*
//if ( ! function_exists( 'yearn_top_bar_b_section_a' ) ) {
//	function yearn_top_bar_b_section_a() { ?>
<!---->
<!--		--><?php //if ( has_action( 'yearn_top_bar_b_section_a' ) ) { ?>
<!--			<div class="section-a row middle col">-->
<!--				--><?php //do_action( 'yearn_top_bar_b_section_a' ); ?>
<!--			</div>-->
<!--		--><?php //} ?>
<!---->
<!--	--><?php //}
//}
//add_action( 'yearn_top_bar_b', 'yearn_top_bar_b_section_a', 10 );
*/

/**
 * dead?
 * Outputs dynamic_sidebar( 'top-bar-section-a' )
 *
 * Hooked to 'yearn_top_bar_b_section_a' via yearn_call_actions()
 */
/*if ( ! function_exists( 'yearn_section_a_widgets' ) ) {
	function yearn_section_a_widgets() { */?><!--

		<?php /*dynamic_sidebar( 'top-bar-section-a' ); */?>

	--><?php /*}
}
add_action( 'yearn_top_bar_b_section_a', 'yearn_section_a_widgets' );*/


/**
 * dead?
 * Outputs do_action( 'yearn_top_bar_b_section_b' ) to div.section-b
  */
/*if ( ! function_exists( 'yearn_top_bar_b_section_b' ) ) {
	function yearn_top_bar_b_section_b() { */?><!--

		<?php /*if ( has_action( 'yearn_top_bar_b_section_b' ) ) { */?>
			<div class="section-b row middle col">
				<?php /*do_action( 'yearn_top_bar_b_section_b' ); */?>
			</div>
		<?php /*} */?>

	--><?php /*}
}
add_action( 'yearn_top_bar_b', 'yearn_top_bar_b_section_b', 10 );*/

/**
 * dead
 * Outputs dynamic_sidebar( 'top-bar-section-b' )
 *
 * Hooked to 'yearn_top_bar_b_section_b' via yearn_call_actions()
 */
/*if ( ! function_exists( 'yearn_top_bar_b_section_b_widgets' ) ) {
	function yearn_section_b_widgets() { */?><!--

		<?php /*dynamic_sidebar( 'top-bar-section-b' ); */?>

	--><?php /*}
}*/



/**
 * Outputs site-branding components
 */
if ( ! function_exists( 'yearn_site_branding' ) ) {
	function yearn_site_branding() { ?>

			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				if ( get_bloginfo( 'description' ) ) { ?>
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

		<?php dynamic_sidebar( 'footer-third' );

	}
}



/**
 *
 * Various add_action() called after_setup_theme
 *
 */
function yearn_call_actions() {

//	if ( has_nav_menu( 'primary') ) {
//		add_action( 'yearn_site_header', 'yearn_site_navigation', 20 );
//	}

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

add_action( 'init', 'yearn_call_actions' );

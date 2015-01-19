<?php
/**
 * yearn Theme Customizer
 *
 * @package yearn
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * todo figure out how to handle menus. would like to hide container when menu isn't selected.
 * todo conditionals if menu not selected, don't show setting
 *
 * todo: layout is for layout, not colors. need to create an outline
 */

/**
 * outline
 *
 * Layout
 * 		Top Bar
 * 			Disable Top Bar
 * 			Sections
 * 				Select
 * 					None
 * 					1 Full Widget
 * 					2 Medium Widgets
 * 					3 Small Widgets
 * 					1 Large & 1 Small Widgets
 * 					1 Small & 1 Large Widgets
 * 					1 Logo & 1 Large Widgets
 * 					1 Logo & 2 Small Widgets
 * 					1 Small Widget & 1 Logo & 1 Small Widget
 * 			Disable Borders
 * 		Stripe
 * 			Disable Stripe
 * 			Sections
 * 				Select
 * 					None
 * 					1 Full Widget
 * 					2 Medium Widgets
 * 					3 Small Widgets
 * 					1 Large & 1 Small Widgets
 * 					1 Small & 1 Large Widgets
 * 					1 Logo & 1 Large Widgets
 * 					1 Logo & 2 Small Widgets
 * 					1 Small Widget & 1 Logo & 1 Small Widget
 * 			Disable Borders
 * 		Header
 *			Disable Header
 * 			Sections
 * 				Select
 * 					None
 * 					1 Logo
 * 					1 Row Logo & 1 Row Primary Menu
 *					1 Row Logo & 1 Widget
 * 			Disable Borders
 * 		Content
 * 			Disable Borders
 * 		Pages
 * 			1 Column Default
 *			2 Columns Default
 * 		Posts
 *			1 Column Default
 *			2 Columns Default
 * 		Archives
 *			1 Column Default
 *			2 Columns Default
 * 		Footer
 *			1 Column
 *			2 Columns
 *			3 Columns
 * 			Disable Borders
 * 		Bottom Bar
 * 			Disable Bottom Bar
 * 			Sections
 * 				Select
 * 					None
 * 					1 Full Widget
 * 					2 Medium Widgets
 * 					3 Small Widgets
 * 					1 Large & 1 Small Widgets
 * 					1 Small & 1 Large Widgets
 * 					1 Large Widgets & 1 Logo
 * 					2 Small Widgets & 1 Logo
 * 					1 Small Widget & 1 Logo & 1 Small Widget
 * 			Disable Borders
 *
 */

function yearn_customize_register( $wp_customize )
{

	class yearn_Customize_Controls extends WP_Customize_Control
	{
		public $settings = 'blogname';
		public $type = 'yearn';
		public $description = '';
		public $heading = '';
//		public $hr = '';

		public function render_content()
		{

//			if ($this->hr == 'top' || $this->hr == 'both') {
				echo '<hr />';
//			}

			if ($this->heading) {
				echo '<span class="customize-control-title" style=" font-size: 16px; ">' . esc_html($this->heading) . '</span>';
			}

			if ($this->description) {
				echo '<p class="description customize-control-description">' . $this->description . '</p>';
			}

//			if ($this->hr == 'bottom' || $this->hr == 'both') {
				echo '<hr />';
//			}
		}
	}
	class yearn_Customize_Text extends WP_Customize_Control
	{
		public $settings = 'blogname';
		public $type = 'text';
		public $text = '';

		public function render_content()
		{

			if ($this->text) {
				echo '<p class="description customize-section-description">' . $this->text . '</p>';
			}

		}
	}
	$wp_customize->get_section('title_tagline')->title = __( 'Branding', 'yearn' );
	$wp_customize->get_control('blogdescription')->priority = 3;
	$wp_customize->get_control('blogname')->priority = 1;

	yearn_customize_setting_checkbox($wp_customize, 'yearn-blogname-hide', 0, 'refresh', __('Disable Site Title', 'yearn'), 'title_tagline', 2);

	yearn_customize_setting_checkbox($wp_customize, 'yearn-blogdescription-hide', 0, 'refresh', __('Disable Site Descriptions', 'yearn'), 'title_tagline', 4);

	yearn_customize_setting_image($wp_customize, 'yearn-logo_image', 'refresh', __('Logo Image', 'yearn'), 'title_tagline', 6);

//	$wp_customize->get_setting('blogname')->transport = 'postMessage';
//	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	$wp_customize->get_section('nav')->title = __('Menus', 'yearn');
//	$wp_customize->add_control(
//		new yearn_Customize_Controls(
//			$wp_customize,
//			'yearn_top_bar_a',
//			array(
//				'type'			=> 'yearn',
//				'heading'		=> 'Top Bar',
//				'section'		=> 'yearn-layout-topbar',
//				'description'	=> __( 'The Very Top of the Site', 'yearn' ),
//				'priority' 		=> 10
//			)
//		)
//	);

// Layout
	yearn_customize_layout( $wp_customize );

	//  =============================
	//  = Top Bar
	//  =============================





	// yearn_top_bar_background
	$wp_customize->add_setting(
		'yearn_top_bar_background',
		array(
			'default'		=> '',
			'transport'	=> 'postMessage',
		)
	);

		$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_top_bar_background',
			array(
				'label'      => __( 'Top Bar Background', 'yearn' ),
				'section'    => 'yearn_header_layout',
				'settings'   => 'yearn_top_bar_background',
			) )
	);

	// yearn_top_bar_foreground
	$wp_customize->add_setting(
		'yearn_top_bar_foreground',
		array(
			'default'		=> '',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_top_bar_foreground',
			array(
				'label'      => __( 'Top Bar Text', 'yearn' ),
				'section'    => 'yearn_header_layout',
				'settings'   => 'yearn_top_bar_foreground',
			) )
	);

	// yearn_top_bar_top_menu
	$wp_customize->add_setting(
		'yearn_top_bar_top_menu',
		array(
			'default'	=> 0,
			'transport'	=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'yearn_top_bar_top_menu',
		array(
			'type'     => 'checkbox',
			'label'    => __('Disable Top Menu', 'yearn'),
			'section'  => 'yearn_header_layout',
		)
	);

	//  ============================
	//  = Colors
	//  ============================
	$wp_customize->add_section( 'yearn_colors',
		array(
			'title'		=> 'Colors',
			'priority'	=> 200,
		)
	);

	// yearn_color_one_background
		$wp_customize->add_setting(
			'yearn_color_one_background',
			array(
				'default'		=> '#70818c',
				'transport'	=> 'postMessage',
			)
		);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_color_one_background',
			array(
				'label'      => __( 'Color One Background', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_color_one_background',
			) )
	);

	// yearn_color_one_foreground
		$wp_customize->add_setting( 'yearn_color_one_foreground',
		array(
			'default'		=> '#ffffff',
			'transport'	=> 'postMessage',
		)
	);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_color_one_foreground',
			array(
				'label'      => __( 'Color One Text', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_color_one_foreground',
			) )
	);

	// yearn_color_two_background
		$wp_customize->add_setting( 'yearn_color_two_background',
		array(
			'default'		=> '#4f4a59',
			'transport'	=> 'postMessage',
		)
	);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_color_two_background',
			array(
				'label'      => __( 'Color Two Background', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_color_two_background',
			) )
	);

	// yearn_color_two_foreground
		$wp_customize->add_setting( 'yearn_color_two_foreground',
		array(
			'default'		=> '#ffffff',
			'transport'	=> 'postMessage',
		)
	);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_color_two_foreground',
			array(
				'label'      => __( 'Color Two Text', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_color_two_foreground',
			) )
	);

	// yearn_content_background
		$wp_customize->add_setting( 'yearn_content_background',
		array(
			'default'		=> '#f7f7f7',
			'transport'	=> 'postMessage',
		)
	);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_content_background',
			array(
				'label'      => __( 'Content Background Color', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_content_background',
			) )
	);

	// yearn_background
		$wp_customize->add_setting( 'yearn_background',
		array(
			'default'		=> '#dddddd',
			'transport'	=> 'postMessage',
		)
	);

			$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yearn_background',
			array(
				'label'      => __( 'Background Color', 'yearn' ),
				'section'    => 'yearn_colors',
				'settings'   => 'yearn_background',
			) )
	);

}
add_action( 'customize_register', 'yearn_customize_register' );

if ( ! function_exists('yearn_customize_layout') ) {

	// todo may want to add action each
	function yearn_customize_layout( $wp_customize )
	{
		// Layout Panel
		yearn_customize_panel( $wp_customize, 'yearn-layout', __('Layout', 'yearn') );

			// Top Bar
			yearn_customize_topbar( $wp_customize );

			// Stripe Layout
			yearn_customize_stripe( $wp_customize );

			// Header Layout
			yearn_customize_header( $wp_customize );

			// Content Layout
			// yearn_customize_content( $wp_customize );

			// Pages Layout
			yearn_customize_pages( $wp_customize );

			// Posts Layout
			yearn_customize_posts( $wp_customize );

			// Archives Layout
			yearn_customize_archives( $wp_customize );

			// Footer Layout
			yearn_customize_footer( $wp_customize );

			// Bottom Bar Layout
			yearn_customize_bottombar( $wp_customize );

	}
}

// Top Bar Layout
if ( ! function_exists('yearn_customize_topbar') ) {
	function yearn_customize_topbar($wp_customize)
	{
		// Top Bar Layout
		yearn_customize_section($wp_customize, 'yearn-layout-topbar', __('Top Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-topbar');

		yearn_customize_setting_select($wp_customize, 'yearn-topbar-sections', 'full', 'refresh', __('Sections', 'yearn'), 'yearn-layout-topbar', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
			'logo-large_widget' => __('1 Logo & 1 Large Widgets', 'yearn'),
			'logo-small_widget-small_widget' => __('1 Logo & 2 Small Widgets', 'yearn'),
			'small_widget-logo-small_widget' => __('1 Small Widget & 1 Logo & 1 Small Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'topbar', 'yearn-layout-topbar',  __('After Save &amp; Publish, Please Reload Your Browser if changes are not as expected.', 'yearn')  );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-borders', 0, 'postMessage', __('Disable Borders', 'yearn'), 'yearn-layout-topbar');
	}
}

// Stripe Layout
if ( ! function_exists('yearn_customize_stripe') ) {
	function yearn_customize_stripe($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-stripe', __('Stripe', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-stripe');

		yearn_customize_setting_select($wp_customize, 'yearn-stripe-sections', 'one_large-one_small', 'refresh', __('Sections', 'yearn'), 'yearn-layout-stripe', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
			'logo-large_widget' => __('1 Logo & 1 Large Widgets', 'yearn'),
			'logo-small_widget-small_widget' => __('1 Logo & 2 Small Widgets', 'yearn'),
			'small_widget-logo-small_widget' => __('1 Small Widget & 1 Logo & 1 Small Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_stripe_reload_me', 'yearn-layout-stripe', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-stripe');
	}
}

// Header Layout
if ( ! function_exists('yearn_customize_header') ) {
	function yearn_customize_header($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-header', __('Header', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-header');

		yearn_customize_setting_select($wp_customize, 'yearn-header-sections', 'logo_full-menu', 'refresh', __('Sections', 'yearn'), 'yearn-layout-header', array(
			'none' => __('None', 'yearn'),
			'logo_full' => __('Logo', 'yearn'),
			'menu' => __('Primary Menu', 'yearn'),
			'full_widget' => __('Full Widget', 'yearn'),
			'logo_full-menu' => __('1 Logo & 1 Primary Menu', 'yearn'),
			'logo_full-full_widget' => __('1 Logo & 1 Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_header_reload_me', 'yearn-layout-header', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-header');
	}
}

// Content Layout
//if ( ! function_exists('yearn_customize_content') ) {
	//function yearn_customize_content($wp_customize) {

		// yearn_customize_section($wp_customize, 'yearn-layout-content', __('Content', 'yearn'), 'yearn-layout');

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-content-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-content');
//	}
//}

// Pages Layout
if ( ! function_exists('yearn_customize_pages') ) {
	function yearn_customize_pages($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-pages', __('Pages', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-pages-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-pages', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

	}
}

// Posts Layout
if ( ! function_exists('yearn_customize_posts') ) {
	function yearn_customize_posts($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-posts', __('Posts', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-posts-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-posts', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_posts_reload_me', 'yearn-layout-posts', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );
	}
}

// Archives Layout
if ( ! function_exists('yearn_customize_archives') ) {
	function yearn_customize_archives($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-archives', __('Archives', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-archives-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-archives', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_archives_reload_me', 'yearn-layout-archives', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );
	}
}

// Footer Layout
if ( ! function_exists('yearn_customize_footer') ) {
	function yearn_customize_footer($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-footer', __('Footer', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-footer-sections', 'three_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-footer', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
			'three_column' => __('3 Columns', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_footer_reload_me', 'yearn-layout-footer', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );
	}
}

// Bottom Bar Layout
if ( ! function_exists('yearn_customize_bottombar') ) {
	function yearn_customize_bottombar($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-bottombar', __('Bottom Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-bottombar');

		yearn_customize_setting_select($wp_customize, 'yearn-bottombar-sections', 'full', 'refresh', __('Sections', 'yearn'), 'yearn-layout-bottombar', array(
			'none' => __('None', 'yearn'),
			'full' => __('1 Full Widget', 'yearn'),
			'medium-medium' => __('2 Medium Widgets', 'yearn'),
			'small-small-small' => __('3 Small Widgets', 'yearn'),
			'large-small' => __('1 Large & 1 Small Widgets', 'yearn'),
			'large-logo' => __('1 Large Widgets & 1 Logo', 'yearn'),
			'small-small-logo' => __('2 Small Widgets & 1 Logo', 'yearn'),
			'small-logo-small' => __('1 Small Widget & 1 Logo & 1 Small Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_bottombar_reload_me', 'yearn-layout-bottombar', 'After Save &amp; Publish, Please Reload Your Browser if changes are not as expected ' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-bottombar');
	}
}


/**
 * Create a Panel
 *
 * @param $wp_customize
 * @param $name
 * @param $title
 */
function yearn_customize_panel( $wp_customize, $name, $title ) {
	if ( class_exists( 'WP_Customize_Panel' ) ) {
		if ( ! $wp_customize->get_panel( $name ) ) {
			$wp_customize->add_panel( $name, array(
				'priority'       => 30,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => $title,
				'description'    => '',
			) );
		}
	}
}

/**
 * Create a Section for a Panel
 *
 * @param $wp_customize
 * @param $name
 * @param $title
 * @param $panel
 */
function yearn_customize_section( $wp_customize, $name, $title, $panel ) {
	$wp_customize->add_section(
		$name,
		array(
			'title' => __( $title, 'yearn' ),
			'capability' => 'edit_theme_options',
			'priority' => 40,
			'panel' => $panel,
		)
	);
}

/**
 * Create a Checkbox
 *
 * @param $wp_customize
 * @param $name
 * @param $default
 * @param $transport
 * @param $label
 * @param $section
 * @param int $priority
 */
function yearn_customize_setting_checkbox( $wp_customize, $name, $default, $transport, $label, $section, $priority = 50 ) {
	$wp_customize->add_setting(
		$name,
		array(
			'default'	=> $default,
			'transport'	=> $transport,
		)
	);

	$wp_customize->add_control(
		$name,
		array(
			'type'		=> 'checkbox',
			'label'		=> $label,
			'section'	=> $section,
			'priority'	=> $priority,
		)
	);
}

function yearn_customize_setting_image( $wp_customize, $name, $transport, $label, $section, $priority = 50 ) {
	$wp_customize->add_setting(
		$name,
		array(
			'transport'	=> $transport,
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			$name,
			array(
				'label'		=> $label,
				'section'	=> $section,
				'priority'	=> $priority,
			)
		)
	);
}

/**
 * Create a Select Dropdown
 *
 * @param $wp_customize
 * @param $name
 * @param $default
 * @param $transport
 * @param $label
 * @param $section
 * @param $choices
 */
function yearn_customize_setting_select( $wp_customize, $name, $default, $transport, $label, $section, $choices ) {
	$wp_customize->add_setting(
		$name,
		array(
			'default'	=> $default,
			'transport'	=> $transport,
		)
	);

	$wp_customize->add_control(
		$name,
		array(
			'type'    => 'select',
			'label'   => $label,
			'choices'    => $choices,
			'section' => $section,
		)
	);
}

function yearn_customize_setting_text( $wp_customize, $name, $section, $text ) {
	$wp_customize->add_setting(
		$name,
		array(
//			'default'	=> $default,
//			'transport'	=> $transport,
		)
	);

		$wp_customize->add_control(
		new yearn_Customize_Text(
			$wp_customize,
			$name,
			array(
				'type'			=> 'text',
				'section'		=> $section,
				'text'			=> $text,
				'priority' 		=> 10
			)
		)
	);


}

/**
 * CSS to output to wp_head
 */
function yearn_customize_css() {
	?>
	<style type="text/css">
		body {
			background-color: <?php echo get_theme_mod( 'yearn_background_color' ) ?>;
		}

		.color-one,
		#secondary .widget:nth-child(even) {
			background-color: <?php echo get_theme_mod( 'yearn_color_one_background' ) ?>;
		}

		.color-two a {
			color: <?php echo get_theme_mod( 'yearn_color_two_foreground' ) ?>;
		}

		.color-one a,
		a.color-one,
		.widget a,
		.widget-title,
		.widget_calendar caption,
		.site-description {
		 	color: <?php echo get_theme_mod( 'yearn_color_one_foreground' ) ?>;
		}
	</style>
<?php
}
//add_action( 'wp_head', 'yearn_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yearn_customize_preview_js() {
	wp_enqueue_script( 'yearn_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '4', true );
}
add_action( 'customize_preview_init', 'yearn_customize_preview_js' );

/**
 * Extend
 */





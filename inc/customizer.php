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

function yearn_customize_register( $wp_customize ) {

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

	// Branding
	$wp_customize->get_section('title_tagline')->title = __( 'Branding', 'yearn' );

	$wp_customize->get_control('blogdescription')->priority = 3;

	$wp_customize->get_control('blogname')->priority = 1;

	yearn_customize_setting_checkbox($wp_customize, 'yearn-blogname-hide', 0, 'refresh', __('Disable Site Title', 'yearn'), 'title_tagline', 2);

	yearn_customize_setting_checkbox($wp_customize, 'yearn-blogdescription-hide', 0, 'refresh', __('Disable Site Descriptions', 'yearn'), 'title_tagline', 4);

	yearn_customize_setting_image($wp_customize, 'yearn-logo_image', 'refresh', __('Logo Image', 'yearn'), 'title_tagline', 6);

	// Menus
	$wp_customize->get_section('nav')->title = __('Menus', 'yearn');

	// Layout
	yearn_customize_layout( $wp_customize );

	yearn_customize_colors( $wp_customize );

}
add_action( 'customize_register', 'yearn_customize_register' );

/**
 * Layout
 */
if ( ! function_exists('yearn_customize_layout') ) {

	function yearn_customize_layout( $wp_customize )
	{
		// Layout Panel
		yearn_customize_panel( $wp_customize, 'yearn-layout', __('Layout', 'yearn') );

			// Top Bar
			yearn_customize_layout_topbar( $wp_customize );

			// Stripe Layout
			yearn_customize_layout_stripe( $wp_customize );

			// Header Layout
			yearn_customize_layout_header( $wp_customize );

			// Home Page Layout
			yearn_customize_layout_home_page( $wp_customize );

			// Pages Layout
			yearn_customize_layout_pages( $wp_customize );

			// Posts Layout
			yearn_customize_layout_posts( $wp_customize );

			// Archives Layout
			yearn_customize_layout_archives( $wp_customize );

			// Footer Layout
			yearn_customize_layout_footer( $wp_customize );

			// Bottom Bar Layout
			yearn_customize_layout_bottombar( $wp_customize );

	}
}

// Layout - Top Bar
if ( ! function_exists('yearn_customize_layout_topbar') ) {
	function yearn_customize_layout_topbar($wp_customize)
	{
		// Top Bar Layout
		yearn_customize_section($wp_customize, 'yearn-layout-topbar', __('Top Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-topbar');

		yearn_customize_setting_select($wp_customize, 'yearn-topbar-sections', 'logo-large_widget', 'refresh', __('Sections', 'yearn'), 'yearn-layout-topbar', array(
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

		yearn_customize_setting_text( $wp_customize, 'topbar', 'yearn-layout-topbar',  __('After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.', 'yearn')  );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-borders', 0, 'postMessage', __('Disable Borders', 'yearn'), 'yearn-layout-topbar');
	}
}

// Layout - Stripe
if ( ! function_exists('yearn_customize_layout_stripe') ) {
	function yearn_customize_layout_stripe($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-stripe', __('Stripe', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-stripe');

		yearn_customize_setting_select($wp_customize, 'yearn-stripe-sections', 'large_widget-small_widget', 'refresh', __('Sections', 'yearn'), 'yearn-layout-stripe', array(
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

		yearn_customize_setting_text( $wp_customize, 'yearn_stripe_reload_me', 'yearn-layout-stripe', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-stripe');
	}
}

// Layout - Header
if ( ! function_exists('yearn_customize_layout_header') ) {
	function yearn_customize_layout_header($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-header', __('Header', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-header');

		yearn_customize_setting_select($wp_customize, 'yearn-header-sections', 'menu', 'refresh', __('Sections', 'yearn'), 'yearn-layout-header', array(
			'none' => __('None', 'yearn'),
			'logo_full' => __('Logo', 'yearn'),
			'menu' => __('Primary Menu', 'yearn'),
			'full_widget' => __('Full Widget', 'yearn'),
			'logo_full-menu' => __('1 Logo & 1 Primary Menu', 'yearn'),
			'logo_full-full_widget' => __('1 Logo & 1 Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_header_reload_me', 'yearn-layout-header', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-header');
	}
}

// Layout - Home Page
if ( ! function_exists('yearn_customize_layout_home_page') ) {
	function yearn_customize_layout_home_page($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-home_page', __('Home Page', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-home_page-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-home_page', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

		yearn_customize_setting_select($wp_customize, 'yearn-home_page_top-sections', 'full', 'refresh', __('Top Sections', 'yearn'), 'yearn-layout-home_page', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
		));

		yearn_customize_setting_checkbox($wp_customize, 'yearn-home_page_top-padding', 0, 'refresh', __('Fill Horizontally', 'yearn'), 'yearn-layout-home_page');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-home_page_title', 0, 'refresh', __('Display Title on Home Page', 'yearn'), 'yearn-layout-home_page');

		yearn_customize_setting_select($wp_customize, 'yearn-home_page_bottom-sections', 'full', 'refresh', __('Bottom Sections', 'yearn'), 'yearn-layout-home_page', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'topbar', 'yearn-layout-home_page',  __('After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.', 'yearn')  );

	}
}

// Layout - Pages
if ( ! function_exists('yearn_customize_layout_pages') ) {
	function yearn_customize_layout_pages($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-pages', __('Pages', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-pages-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-pages', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

		yearn_customize_setting_checkbox($wp_customize, 'yearn-pages-comments', 0, 'refresh', __('Disable Comments', 'yearn'), 'yearn-layout-pages');

	}
}

// Layout - Posts
if ( ! function_exists('yearn_customize_layout_posts') ) {
	function yearn_customize_layout_posts($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-posts', __('Posts', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-posts-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-posts', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_posts_reload_me', 'yearn-layout-posts', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );
	}
}

// Layout - Archives
if ( ! function_exists('yearn_customize_layout_archives') ) {
	function yearn_customize_layout_archives($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-archives', __('Archives', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-archives-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-archives', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));
		yearn_customize_setting_text( $wp_customize, 'yearn_archives_reload_me', 'yearn-layout-archives', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );
	}
}

// Layout - Footer
if ( ! function_exists('yearn_customize_layout_footer') ) {
	function yearn_customize_layout_footer($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-footer', __('Footer', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-footer-sections', 'three_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-footer', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
			'large_widget-logo' => __('1 Logo & 1 Large Widgets', 'yearn'),
			'small_widget-small_widget-logo' => __('1 Logo & 2 Small Widgets', 'yearn'),
			'small_widget-logo-small_widget' => __('1 Small Widget & 1 Logo & 1 Small Widget', 'yearn'),
		));

		// todo: this text own function
		yearn_customize_setting_text( $wp_customize, 'yearn-footer-reload-me', 'yearn-layout-footer', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-footer-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-footer');
	}
}

// Layout Bottom Bar
if ( ! function_exists('yearn_customize_layout_bottombar') ) {
	function yearn_customize_layout_bottombar($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-layout-bottombar', __('Bottom Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-bottombar');

		yearn_customize_setting_select($wp_customize, 'yearn-bottombar-sections', 'full', 'refresh', __('Sections', 'yearn'), 'yearn-layout-bottombar', array(
			'none' => __('None', 'yearn'),
			'full_widget' => __('1 Full Widget', 'yearn'),
			'medium_widget-medium_widget' => __('2 Medium Widgets', 'yearn'),
			'small_widget-small_widget-small_widget' => __('3 Small Widgets', 'yearn'),
			'large_widget-small_widget' => __('1 Large & 1 Small Widgets', 'yearn'),
			'small_widget-large_widget' => __('1 Small & 1 Large Widgets', 'yearn'),
			'large_widget-logo' => __('1 Logo & 1 Large Widgets', 'yearn'),
			'small_widget-small_widget-logo' => __('1 Logo & 2 Small Widgets', 'yearn'),
			'small_widget-logo-small_widget' => __('1 Small Widget & 1 Logo & 1 Small Widget', 'yearn'),
		));

		yearn_customize_setting_text( $wp_customize, 'yearn_bottombar_reload_me', 'yearn-layout-bottombar', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your
		Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-bottombar');
	}
}

/**
 * Colors and Background
 */
if ( ! function_exists('yearn_customize_colors') ) {
	function yearn_customize_colors( $wp_customize ){

		// Colors and Backgrounds Panel
		yearn_customize_panel( $wp_customize, 'yearn-colors', __('Colors and Backgrounds', 'yearn') );

		// Site Colors
		yearn_customize_colors_site( $wp_customize );

		// Top Bar
		yearn_customize_colors_topbar( $wp_customize );

		// Content
		yearn_customize_colors_content( $wp_customize );

		// Archives
		yearn_customize_colors_archives( $wp_customize );

		// Footer
		yearn_customize_colors_footer( $wp_customize );

		// Footer
		yearn_customize_colors_bottombar( $wp_customize );

	}
}

// Colors - Site
if ( ! function_exists('yearn_customize_colors_site') ) {
	function yearn_customize_colors_site($wp_customize)
	{
		yearn_customize_section($wp_customize, 'yearn-colors-site', __('Site', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-site-background', false, __('Background', 'yearn'), 'yearn-colors-site');

		yearn_customize_setting_image($wp_customize, 'yearn-colors-site-background_image', 'refresh', __('Background Image', 'yearn'), 'yearn-colors-site');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-site-text', false, __('Text', 'yearn'), 'yearn-colors-site');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-site-links', false, __('Links', 'yearn'), 'yearn-colors-site');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-site-content_background', false, __('Content Background', 'yearn'), 'yearn-colors-site');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-site-sidebar_background', false, __('Sidebar Background', 'yearn'), 'yearn-colors-site');

	}
}

// Colors - Top Bar
if ( ! function_exists('yearn_customize_colors_topbar') ) {
	function yearn_customize_colors_topbar($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-topbar', __('Top Bar', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-background', false, __('Background', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-text', false, __('Text', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-links', false, __('Links', 'yearn'), 'yearn-colors-topbar');

	}
}

// Colors - Content
if ( ! function_exists('yearn_customize_colors_content') ) {
	function yearn_customize_colors_content($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-content', __('Content', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-button-background', false, __('Button Background', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-button-text', false, __('Button Text', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-title_background', false, __('Page Title Backgrounds', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-title_text', false, __('Page Title Text', 'yearn'), 'yearn-colors-content');

	}
}

// Colors - Archives
if ( ! function_exists('yearn_customize_colors_archives') ) {
	function yearn_customize_colors_archives($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-archives', __('Archives', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-title_background', false, __('Entry Title Background', 'yearn'), 'yearn-colors-archives');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-title_text', false, __('Entry Title Text', 'yearn'), 'yearn-colors-archives');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-content_background', false, __('Content Background', 'yearn'), 'yearn-colors-archives');

	}
}

// Colors - Content
if ( ! function_exists('yearn_customize_colors_archives') ) {
	function yearn_customize_colors_archives($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-archives', __('Archives', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-meta-background', false, __('Meta Background', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-meta-text', false, __('Meta Text', 'yearn'), 'yearn-colors-content');

		// yearn_customize_setting_color($wp_customize, 'yearn-colors-content-links', false, __('Links', 'yearn'), 'yearn-colors-topbar');

	}
}

// Colors - Footer
if ( ! function_exists('yearn_customize_colors_footer') ) {
	function yearn_customize_colors_footer($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-footer', __('Footer', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-background', false, __('Background', 'yearn'), 'yearn-colors-footer');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-text', false, __('Text', 'yearn'), 'yearn-colors-footer');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-links', false, __('Links', 'yearn'), 'yearn-colors-footer');

	}
}

// Colors - Bottom Bar
if ( ! function_exists('yearn_customize_colors_bottombar') ) {
	function yearn_customize_colors_bottombar($wp_customize) {

		yearn_customize_section($wp_customize, 'yearn-colors-bottombar', __('Bottom Bar', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-background', false, __('Background', 'yearn'), 'yearn-colors-bottombar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-text', false, __('Text', 'yearn'), 'yearn-colors-bottombar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-links', false, __('Links', 'yearn'), 'yearn-colors-bottombar');

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
 * yearn_customize_setting_color
 *
 * @param $wp_customize
 * @param $name
 * @param $default
 * @param $label
 * @param $section
 * @param int $priority
 */
function yearn_customize_setting_color( $wp_customize, $name, $default, $label, $section, $priority = 50 ) {

	$wp_customize->add_setting(
		$name,
		array(
			'default' => $default,
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$name,
			array(
				'label' => $label,
				'section' => $section,
			))
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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yearn_customize_preview_js() {
	wp_enqueue_script( 'yearn_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '7927', true );
}
add_action( 'customize_preview_init', 'yearn_customize_preview_js' );

/**
 * Extend
 */





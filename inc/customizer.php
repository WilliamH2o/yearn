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
 *
 * todo need themes : is theme A is set change defaults
 * todo reset button
 * todo add Icon Font section
 * todo option display excerpt or full
 * todo template selects
 * todo add select font text box for default and headers
 * todo disable borders
 *
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
	class yearn_Customize_Text extends WP_Customize_Control {
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

	class yearn_Customize_Layout_Sections extends WP_Customize_Control {
		public $col_type = '';

		public function render_content() {
			?>
			<script>
				jQuery( document ).ready( function( $ ) {

					/**
					 * todo refactor
					 */

					if ( $( '#<?php echo $this->col_type ?> select' ).val() === 'none' ) {
						$( '#<?php echo $this->col_type ?>-col_1' ).fadeOut( 400 );
						$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
						$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
						$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
						$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
					} else {
						if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 1 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).show();
							$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 2 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).show();
							$( '#<?php echo $this->col_type ?>-col_2' ).show();
							$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 3 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).show();
							$( '#<?php echo $this->col_type ?>-col_2' ).show();
							$( '#<?php echo $this->col_type ?>-col_3' ).show();
							$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 4 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).show();
							$( '#<?php echo $this->col_type ?>-col_2' ).show();
							$( '#<?php echo $this->col_type ?>-col_3' ).show();
							$( '#<?php echo $this->col_type ?>-col_4' ).show();
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 5 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).show();
							$( '#<?php echo $this->col_type ?>-col_2' ).show();
							$( '#<?php echo $this->col_type ?>-col_3' ).show();
							$( '#<?php echo $this->col_type ?>-col_4' ).show();
							$( '#<?php echo $this->col_type ?>-col_5' ).show();
						} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 0 ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						}
					}

					// Lets do it again when the user changes the Select value of the Column Widths
					$( '#<?php echo $this->col_type ?> select' ).change( 'click', function() {

						// Lets get the col count and then show or hide the each column type
						if ( $( '#<?php echo $this->col_type ?> select' ).val() === 'none' ) {
							$( '#<?php echo $this->col_type ?>-col_1' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
							$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
						} else {
							if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 1 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).show();
								$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
							} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 2 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).show();
								$( '#<?php echo $this->col_type ?>-col_2' ).show();
								$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
							} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 3 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).show();
								$( '#<?php echo $this->col_type ?>-col_2' ).show();
								$( '#<?php echo $this->col_type ?>-col_3' ).show();
								$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
							} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 4 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).show();
								$( '#<?php echo $this->col_type ?>-col_2' ).show();
								$( '#<?php echo $this->col_type ?>-col_3' ).show();
								$( '#<?php echo $this->col_type ?>-col_4' ).show();
								$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
							} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 5 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).show();
								$( '#<?php echo $this->col_type ?>-col_2' ).show();
								$( '#<?php echo $this->col_type ?>-col_3' ).show();
								$( '#<?php echo $this->col_type ?>-col_4' ).show();
								$( '#<?php echo $this->col_type ?>-col_5' ).show();
							} else if ( $( '#<?php echo $this->col_type ?> select' ).val().split( '/' ).length === 0 ) {
								$( '#<?php echo $this->col_type ?>-col_1' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_2' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_3' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_4' ).fadeOut( 400 );
								$( '#<?php echo $this->col_type ?>-col_5' ).fadeOut( 400 );
							}
						}

					});
				});
			</script>
		<?php
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

	do_action('yearn_customize', $wp_customize);

}
add_action( 'customize_register', 'yearn_customize_register', 50 );

/**
 * Layout
 */
if ( ! function_exists('yearn_customize_layout') ) {
	function yearn_customize_layout( $wp_customize ) {
		if ( has_filter('yearn_remove','layout' ) ) {
			return;
		}
		// Layout Panel
		yearn_customize_panel( $wp_customize, 'yearn-layout', __('Layout', 'yearn') );

		do_action('yearn_customize_layout', $wp_customize);

	}
	add_action( 'yearn_customize', 'yearn_customize_layout', 10, 1 );
}

// Layout - Top Bar
if ( ! function_exists('yearn_customize_layout_topbar') ) {
	/**
	 * @param $wp_customize
	 */
	function yearn_customize_layout_topbar($wp_customize) {

		if ( has_filter( 'yearn_remove','topbar' ) ) {
			return;
		}

		// Top Bar Layout
		yearn_customize_section($wp_customize, 'yearn-layout-topbar', __('Top Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-topbar-sections_cols', 'yearn-layout-topbar', 'customize-control-yearn-topbar-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-topbar-sections', '100', 'refresh', __('Column Widths', 'yearn'), 'yearn-layout-topbar', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-topbar-sections', 'none', 'yearn-layout-topbar' );

		yearn_customize_setting_text( $wp_customize, 'topbar', 'yearn-layout-topbar',  __('After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.', 'yearn')  );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-topbar');

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-topbar-borders', 0, 'postMessage', __('Disable Borders', 'yearn'), 'yearn-layout-topbar');
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_topbar', 10, 1 );
}

// Layout - Stripe
if ( ! function_exists('yearn_customize_layout_stripe') ) {
	function yearn_customize_layout_stripe($wp_customize) {

		if ( has_filter( 'yearn_remove','stripe' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-stripe', __('Stripe', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-stripe');

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-stripe-sections_cols', 'yearn-layout-stripe', 'customize-control-yearn-stripe-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-stripe-sections', '100', 'refresh', __('Column Widths', 'yearn'), 'yearn-layout-stripe', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-stripe-sections', 'none', 'yearn-layout-stripe' );

		yearn_customize_setting_text( $wp_customize, 'yearn_stripe_reload_me', 'yearn-layout-stripe', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-stripe-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-stripe');
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_stripe', 20, 1 );
}

// Layout - Header
if ( ! function_exists('yearn_customize_layout_header') ) {
	function yearn_customize_layout_header($wp_customize) {

		if ( has_filter( 'yearn_remove','header' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-header', __('Site Header', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-header');

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-header-sections_cols', 'yearn-layout-header', 'customize-control-yearn-header-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-header-sections', '100', 'refresh', __('Column Widths', 'yearn'), 'yearn-layout-header', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-header-sections', 'none', 'yearn-layout-header' );

		yearn_customize_setting_text( $wp_customize, 'yearn_header_reload_me', 'yearn-layout-header', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-header-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-header');
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_header', 30, 1 );
}

// Layout - Home Page
if ( ! function_exists('yearn_customize_layout_home_page') ) {
	function yearn_customize_layout_home_page($wp_customize) {

		if ( has_filter( 'yearn_remove','home-page' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-home_page', __('Home Page', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-home_page-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-home_page', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-home_page_top-sections_cols', 'yearn-layout-home_page', 'customize-control-yearn-home_page_top-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-home_page_top-sections', '100', 'refresh', __('Top Section Column Widths', 'yearn'), 'yearn-layout-home_page', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-home_page_top-sections', 'none', 'yearn-layout-home_page' );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-home_page_top-padding', 0, 'refresh', __('Fill Horizontally', 'yearn'), 'yearn-layout-home_page');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-home_page_title', 0, 'refresh', __('Display Title on Home Page', 'yearn'), 'yearn-layout-home_page');

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-home_page_bottom-sections_cols', 'yearn-layout-home_page', 'customize-control-yearn-home_page_bottom-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-home_page_bottom-sections', '100', 'refresh', __('bottom Section Column Widths', 'yearn'), 'yearn-layout-home_page', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-home_page_bottom-sections', 'none', 'yearn-layout-home_page' );

		yearn_customize_setting_text( $wp_customize, 'topbar', 'yearn-layout-home_page',  __('After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.', 'yearn')  );

	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_home_page', 40, 1 );
}

// Layout - Site Content
if ( ! function_exists('yearn_customize_layout_site_content') ) {
	function yearn_customize_layout_site_content($wp_customize) {

		if ( has_filter( 'yearn_remove','site_content' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-site_content', __('site_content', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-site_content-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-site_content', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-site_content_top-sections_cols', 'yearn-layout-site_content', 'customize-control-yearn-site_content_top-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-site_content_top-sections', '100', 'refresh', __('Top Section Column Widths', 'yearn'), 'yearn-layout-site_content', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-site_content_top-sections', 'none', 'yearn-layout-site_content' );

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-site_content_bottom-sections_cols', 'yearn-layout-site_content', 'customize-control-yearn-site_content_bottom-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-site_content_bottom-sections', '100', 'refresh', __('Bottom Section Column Widths', 'yearn'), 'yearn-layout-site_content', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-site_content_bottom-sections', 'none', 'yearn-layout-site_content' );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-site_content-comments', 0, 'refresh', __('Disable Comments', 'yearn'), 'yearn-layout-site_content');

	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_site_content', 50, 1 );
}


// Layout - Pages
if ( ! function_exists('yearn_customize_layout_pages') ) {
	function yearn_customize_layout_pages($wp_customize) {

		if ( has_filter( 'yearn_remove','pages' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-pages', __('Pages', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-pages-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-pages', array(
			'one_column' => __('1 Column Default', 'yearn'),
			'two_column' => __('2 Columns Default', 'yearn'),
		));

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-pages_top-sections_cols', 'yearn-layout-pages', 'customize-control-yearn-pages_top-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-pages_top-sections', '100', 'refresh', __('Top Section Column Widths', 'yearn'), 'yearn-layout-pages', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-pages_top-sections', 'none', 'yearn-layout-pages' );

		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-pages_bottom-sections_cols', 'yearn-layout-pages', 'customize-control-yearn-pages_bottom-sections' );

		yearn_customize_setting_select($wp_customize, 'yearn-pages_bottom-sections', '100', 'refresh', __('Bottom Section Column Widths', 'yearn'), 'yearn-layout-pages', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-pages_bottom-sections', 'none', 'yearn-layout-pages' );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-pages-comments', 0, 'refresh', __('Disable Comments', 'yearn'), 'yearn-layout-pages');

	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_pages', 50, 1 );
}

// Layout - Posts
if ( ! function_exists('yearn_customize_layout_posts') ) {
	function yearn_customize_layout_posts($wp_customize) {

		if ( has_filter( 'yearn_remove','posts' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-posts', __('Posts', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-posts-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-posts', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-posts_top-sections_cols', 'yearn-layout-posts', 'customize-control-yearn-posts_top-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-posts_top-sections', '100', 'refresh', __('top Section Column Widths', 'yearn'), 'yearn-layout-posts', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-posts_top-sections', 'none', 'yearn-layout-posts' );

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-posts_bottom-sections_cols', 'yearn-layout-posts', 'customize-control-yearn-posts_bottom-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-posts_bottom-sections', '100', 'refresh', __('Bottom Section Column Widths', 'yearn'), 'yearn-layout-posts', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-posts_bottom-sections', 'none', 'yearn-layout-posts' );

		yearn_customize_setting_text( $wp_customize, 'yearn_posts_reload_me', 'yearn-layout-posts', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_posts', 60, 1 );
}

// Layout - Archives
if ( ! function_exists('yearn_customize_layout_archives') ) {
	function yearn_customize_layout_archives($wp_customize) {

		if ( has_filter( 'yearn_remove','archives' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-archives', __('Archives', 'yearn'), 'yearn-layout');

		yearn_customize_setting_select($wp_customize, 'yearn-archives-sections', 'two_column', 'refresh', __('Sections', 'yearn'), 'yearn-layout-archives', array(
			'one_column' => __('1 Column', 'yearn'),
			'two_column' => __('2 Columns', 'yearn'),
		));

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-archives_top-sections_cols', 'yearn-layout-archives', 'customize-control-yearn-archives_top-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-archives_top-sections', '100', 'refresh', __('top Section Column Widths', 'yearn'), 'yearn-layout-archives', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-archives_top-sections', 'none', 'yearn-layout-archives' );

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-archives_bottom-sections_cols', 'yearn-layout-archives', 'customize-control-yearn-archives_bottom-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-archives_bottom-sections', '100', 'refresh', __('Bottom Section Column Widths', 'yearn'), 'yearn-layout-archives', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-archives_bottom-sections', 'none', 'yearn-layout-archives' );

		yearn_customize_setting_text( $wp_customize, 'yearn_archives_reload_me', 'yearn-layout-archives', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_archives', 70, 1 );
}

// Layout - Footer
if ( ! function_exists('yearn_customize_layout_footer') ) {
	function yearn_customize_layout_footer($wp_customize) {

		if ( has_filter( 'yearn_remove','footer' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-footer', __('Footer', 'yearn'), 'yearn-layout');

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-footer-sections_cols', 'yearn-layout-footer', 'customize-control-yearn-footer-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-footer-sections', '100', 'refresh', __('Column Widths', 'yearn'), 'yearn-layout-footer', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-footer-sections', 'none', 'yearn-layout-footer' );

		// todo: this text own function
		yearn_customize_setting_text( $wp_customize, 'yearn-footer-reload-me', 'yearn-layout-footer', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your Browser.' );

		yearn_customize_setting_checkbox($wp_customize, 'yearn-footer-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-footer');
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_footer', 80, 1 );
}

// Layout Bottom Bar
if ( ! function_exists('yearn_customize_layout_bottombar') ) {
	function yearn_customize_layout_bottombar($wp_customize) {

		if ( has_filter( 'yearn_remove','bottombar' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-layout-bottombar', __('Bottom Bar', 'yearn'), 'yearn-layout');

		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-display', 0, 'refresh', __('Disable', 'yearn'), 'yearn-layout-bottombar');

		// add jQuery
		yearn_customize_setting_layout_sections( $wp_customize, 'yearn-bottombar-sections_cols', 'yearn-layout-bottombar', 'customize-control-yearn-bottombar-sections' );

		// add Column Widths
		yearn_customize_setting_select($wp_customize, 'yearn-bottombar-sections', '100', 'refresh', __('Column Widths', 'yearn'), 'yearn-layout-bottombar', array(
			'none' => __('None', 'yearn'),
			'100' => __('100', 'yearn'),
			'75/25' => __('75/25', 'yearn'),
			'66/33' => __('66/33', 'yearn'),
			'60/40' => __('60/40', 'yearn'),
			'60/20/20' => __('60/20/20', 'yearn'),
			'50/50' => __('50/50', 'yearn'),
			'50/25/25' => __('50/25/25', 'yearn'),
			'40/60' => __('40/60', 'yearn'),
			'40/40/20' => __('40/40/20', 'yearn'),
			'40/20/40' => __('40/20/40', 'yearn'),
			'40/20/20/20' => __('40/20/20/20', 'yearn'),
			'33/33/33' => __('33/33/33', 'yearn'),
			'25/75' => __('25/75', 'yearn'),
			'25/50/25' => __('25/50/25', 'yearn'),
			'25/25/50' => __('25/25/50', 'yearn'),
			'25/25/25/25' => __('25/25/25/25', 'yearn'),
			'20/40/40' => __('20/40/40', 'yearn'),
			'20/40/20/20' => __('20/40/20/20', 'yearn'),
			'20/20/40/20' => __('20/20/40/20', 'yearn'),
			'20/20/20/40' => __('20/20/20/40', 'yearn'),
			'20/20/20/20/20' => __('20/20/20/20/20', 'yearn'),
		));

		// add Column #s
		yearn_customize_setting_layout_sections_generate_cols( $wp_customize, 'yearn-bottombar-sections', 'none', 'yearn-layout-bottombar' );

		yearn_customize_setting_text( $wp_customize, 'yearn_bottombar_reload_me', 'yearn-layout-bottombar', 'After Save &amp; Publish, If changes are not as expected, Please Reload Your
		Browser.' );

//		yearn_customize_setting_checkbox($wp_customize, 'yearn-bottombar-borders', 0, 'refresh', __('Disable Borders', 'yearn'), 'yearn-layout-bottombar');
	}
	add_action( 'yearn_customize_layout', 'yearn_customize_layout_bottombar', 90, 1 );
}

/**
 * Colors and Background
 */
if ( ! function_exists('yearn_customize_colors') ) {
	function yearn_customize_colors( $wp_customize ){

		if ( has_filter( 'yearn_remove','color' ) ) {
			return;
		}

		// Colors and Backgrounds Panel
		yearn_customize_panel( $wp_customize, 'yearn-colors', __('Colors and Backgrounds', 'yearn') );

		do_action('yearn_customize_colors', $wp_customize);

	}
	add_action( 'yearn_customize', 'yearn_customize_colors', 20, 1 );
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
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_site', 5, 1 );
}

// Colors - Masthead
if ( ! function_exists('yearn_customize_colors_masthead') ) {
	function yearn_customize_colors_masthead($wp_customize) {

		if ( has_filter( 'yearn_remove','masthead' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-masthead', __('Masthead', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-masthead-background', false, __('Background', 'yearn'), 'yearn-colors-masthead');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-masthead-text', false, __('Text', 'yearn'), 'yearn-colors-masthead');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-masthead-links', false, __('Links', 'yearn'), 'yearn-colors-masthead');

		yearn_customize_setting_image($wp_customize, 'yearn-colors-masthead-background_image', 'refresh', __('Background Image', 'yearn'), 'yearn-colors-masthead');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_masthead', 10, 1 );
}

// Colors - Top Bar
if ( ! function_exists('yearn_customize_colors_topbar') ) {
	function yearn_customize_colors_topbar($wp_customize) {

		if ( has_filter( 'yearn_remove','topbar' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-topbar', __('&emsp; Top Bar', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-background', false, __('Background', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-text', false, __('Text', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-links', false, __('Links', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-button-background', false, __('Button Background', 'yearn'), 'yearn-colors-topbar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-topbar-button-text', false, __('Button Text', 'yearn'), 'yearn-colors-topbar');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_topbar', 20, 1 );
}

// Colors - Stripe
if ( ! function_exists('yearn_customize_colors_stripe') ) {
	function yearn_customize_colors_stripe($wp_customize) {

		if ( has_filter( 'yearn_remove','stripe' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-stripe', __('&emsp; Stripe', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-stripe-background', false, __('Background', 'yearn'), 'yearn-colors-stripe');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-stripe-text', false, __('Text', 'yearn'), 'yearn-colors-stripe');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-stripe-links', false, __('Links', 'yearn'), 'yearn-colors-stripe');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_stripe', 30, 1 );
}

// Colors - Site Header
if ( ! function_exists('yearn_customize_colors_header') ) {
	function yearn_customize_colors_header($wp_customize) {

		if ( has_filter( 'yearn_remove','header' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-header', __('&emsp; Site Header', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-header-background', false, __('Background', 'yearn'), 'yearn-colors-header');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-header-text', false, __('Text', 'yearn'), 'yearn-colors-header');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-header-links', false, __('Links', 'yearn'), 'yearn-colors-header');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_header', 40, 1 );
}

// Colors - Content
if ( ! function_exists('yearn_customize_colors_content') ) {
	function yearn_customize_colors_content($wp_customize) {

		if ( has_filter( 'yearn_remove','content' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-content', __('Content', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-button-background', false, __('Button Background', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-button-text', false, __('Button Text', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-title_background', false, __('Page Title Backgrounds', 'yearn'), 'yearn-colors-content');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-content-title_text', false, __('Page Title Text', 'yearn'), 'yearn-colors-content');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_content', 50, 1 );
}

// Colors - Archives
if ( ! function_exists('yearn_customize_colors_archives') ) {
	function yearn_customize_colors_archives($wp_customize) {

		if ( has_filter( 'yearn_remove','archives' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-archives', __('Archives', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-title_background', false, __('Entry Title Background', 'yearn'), 'yearn-colors-archives');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-title_text', false, __('Entry Title Text', 'yearn'), 'yearn-colors-archives');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-archives-content_background', false, __('Content Background', 'yearn'), 'yearn-colors-archives');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_archives', 60, 1 );
}

// Colors - Footer
if ( ! function_exists('yearn_customize_colors_footer') ) {
	function yearn_customize_colors_footer($wp_customize) {

		if ( has_filter( 'yearn_remove','footer' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-footer', __('Footer', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-background', false, __('Background', 'yearn'), 'yearn-colors-footer');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-text', false, __('Text', 'yearn'), 'yearn-colors-footer');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-footer-links', false, __('Links', 'yearn'), 'yearn-colors-footer');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_footer', 70, 1 );
}

// Colors - Bottom Bar
if ( ! function_exists('yearn_customize_colors_bottombar') ) {
	function yearn_customize_colors_bottombar($wp_customize) {

		if ( has_filter( 'yearn_remove','bottombar' ) ) {
			return;
		}

		yearn_customize_section($wp_customize, 'yearn-colors-bottombar', __('Bottom Bar', 'yearn'), 'yearn-colors');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-background', false, __('Background', 'yearn'), 'yearn-colors-bottombar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-text', false, __('Text', 'yearn'), 'yearn-colors-bottombar');

		yearn_customize_setting_color($wp_customize, 'yearn-colors-bottombar-links', false, __('Links', 'yearn'), 'yearn-colors-bottombar');

	}
	add_action( 'yearn_customize_colors', 'yearn_customize_colors_bottombar', 80, 1 );
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
 * @param $wp_customize
 * @param $name
 * @param $section
 * @param $col_type
 */
function yearn_customize_setting_layout_sections( $wp_customize, $name, $section, $col_type ) {
	$wp_customize->add_setting(
		$name,
		array()
	);

	$wp_customize->add_control(
		new yearn_Customize_Layout_Sections(
			$wp_customize,
			$name,
			array(
				'col_type'		=> $col_type,
				'label'   		=> '',
				'section'		=> $section,
				'priority' 		=> 1
			)
		)
	);
}

/**
 * @param $wp_customize
 * @param $name
 * @param $default
 * @param $section
 */
function yearn_customize_setting_layout_sections_generate_cols( $wp_customize, $name, $default, $section ) {

	$label = __('Column', 'yearn');

	for ( $i = 1; $i <= 5; $i++ ) {

		yearn_customize_setting_select($wp_customize, $name.'-col_'.$i, $default, 'refresh', $label.$i, $section, array(
			'none' => __('None', 'yearn'),
			'logo' => __('Logo Image', 'yearn'),
			'text' => __('Branding Text', 'yearn'),
			'widget_left' => __('Widget - Left Aligned', 'yearn'),
			'widget_right' => __('Widget - Right Aligned', 'yearn'),
			'widget_center' => __('Widget - Center Aligned', 'yearn'),
			'menu_left' => __('Menu - Left Aligned', 'yearn'),
			'menu_right' => __('Menu - - Right Aligned', 'yearn'),
			'menu_center' => __('Menu - Center Aligned', 'yearn'),
		));

	}

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yearn_customize_preview_js() {
	// todo kill rand()
	wp_enqueue_script( 'yearn_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), rand(), true );
}
add_action( 'customize_preview_init', 'yearn_customize_preview_js' );






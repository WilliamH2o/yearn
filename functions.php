<?php
/**
 * yearn functions and definitions
 *
 * @package yearn
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
// if ( ! isset( $content_width ) ) {
// 	$content_width = 640; /* pixels */
// }

if ( ! function_exists( 'yearn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
add_action( 'after_setup_theme', 'yearn_setup' );
function yearn_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on yearn, use a find and replace
	 * to change 'yearn' to the name of your theme in all the template files
	 */
	// load_theme_textdomain( 'yearn', get_template_directory() . '/languages' );


	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'feature', 2248, 674, true);
	add_image_size( 'feature-sidebar', 1534, 460, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top' => __( 'Top Menu', 'yearn' ),
		'primary' => __( 'Primary Menu', 'yearn' ),
		'primary_mobile' => __( 'Primary Mobile Menu', 'yearn' ),
		'footer' => __( 'Footer Menu', 'yearn' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'yearn_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // yearn_setup


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function yearn_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Top Bar Left', 'yearn' ),
		'id'            => 'top-bar-left',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Top Bar Right', 'yearn' ),
		'id'            => 'top-bar-right',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'yearn' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
		register_sidebar( array(
		'name'          => __( 'Footer First', 'yearn' ),
		'id'            => 'footer-first',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Second', 'yearn' ),
		'id'            => 'footer-second',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Third', 'yearn' ),
		'id'            => 'footer-third',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'yearn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'yearn_scripts' );
function yearn_scripts() {
	wp_enqueue_style( 'yearn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'yearn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'yearn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'yearn-superfish',	get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '20141009', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
}
// Add HTTP_USER_AGENT IE Fixes and other IE fixes to <head>
add_action( 'wp_head', 'unc_http_user_agent_ie', 5 );
if ( ! function_exists('unc_http_user_agent_ie')) {
	function unc_http_user_agent_ie() { 
		if ( isset($_SERVER['HTTP_USER_AGENT']) && ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) ) header('X-UA-Compatible: IE=edge,chrome=1');

		if (stristr($_SERVER['HTTP_USER_AGENT'], 'IEMobile/10.0') !== FALSE ) { 
			echo '<script src="' . get_template_directory_uri() . '/js/responsive.ie10mobilefix.min.js"></script>';
		}
		
		echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		
		echo '<!--[if lt IE 9 &!(IEMobile)]>';
		echo '	<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>';
		echo '	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>';
		echo '<![endif]-->';
	}
}

// Add favicons to <head>
add_action( 'wp_head', 'unc_favicons', 20 );
if ( ! function_exists('unc_favicons')) {
	function unc_favicons() { 
		echo '<!-- For IE 9 and below. ICO should be 32x32 pixels in size -->';
		echo '<!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->';

		echo '<!-- IE 10+ "Metro" Tiles - 144x144 pixels in size -->';
		echo '<meta name="msapplication-TileColor" content="#D83434">';
		echo '<meta name="msapplication-TileImage" content="path/to/tileicon.png">';

		echo '<!-- Touch Icons - iOS and Android 2.1+ 152x152 pixels in size. -->';
		echo '<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">';

		echo '<!-- Firefox, Chrome, Safari, IE 11+ and Opera. 96x96 pixels in size. -->';
		echo '<link rel="icon" href="path/to/favicon.png">';
	}
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * unload jquery_migrate.
 */
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}

/**
 * new the_excerpt
 */
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//
//function custom_excerpt_length( $length ) {
//	return 40;
//}
//
//add_filter('excerpt_more', 'new_excerpt_more');
//function new_excerpt_more( $more ) {
//	return ' <a title="'. get_the_title( get_the_ID() ) .'" class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . 'read more</a>';
//}

/**
 * Web Fonts and Icons
 */
add_action( 'wp_enqueue_scripts', 'yearn_fonts_enqueue', 15 );
function yearn_fonts_enqueue() {
	wp_enqueue_style('lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900');
	wp_enqueue_style('opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,700,700italic');
}

/**
 * Find footer sidebar count to get appropriate width
 */
function yearn_footer_width() {
	if ( is_active_sidebar( 'footer-first' ) &&  is_active_sidebar( 'footer-second' ) &&  is_active_sidebar( 'footer-third' )  ) { 
		return 'footer-three';
	} elseif ( is_active_sidebar( 'footer-first' ) AND is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' )  ) { 
		return 'footer-two';
	} elseif ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' )  ) { 
		return 'footer-one';
	} 
}

/**
 * Darken/lighten a hex color programmatically.
 * https://gist.github.com/chaoszcat/5325115#file-gistfile1-php
 * Originally from http://stackoverflow.com/questions/5560248/programmatically-lighten-or-darken-a-hex-color
 */
// todo: prefix with yearn
if ( ! function_exists('shadeColor')) {
	function shadeColor($color, $percent) {
		$num = base_convert(substr($color, 1), 16, 10);
		$amt = round(2.55 * $percent);
		$r = ($num >> 16) + $amt;
		$b = ($num >> 8 & 0x00ff) + $amt;
		$g = ($num & 0x0000ff) + $amt;

		return '#'.substr(base_convert(0x1000000 + ($r<255?$r<1?0:$r:255)*0x10000 + ($b<255?$b<1?0:$b:255)*0x100 + ($g<255?$g<1?0:$g:255), 10, 16), 1);
	}
}


/**
 * Add support for Vertical Featured Images
 */
if ( ! function_exists( 'mytheme_vertical_check' ) ) :
	function mytheme_vertical_check( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

		$image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'feature-sidebar' );

		//Get the image width and height from the data provided by wp_get_attachment_image_src()
		$width  = $image_data[1];
		$height = $image_data[2];

		if ( $height > $width ) {
			$html = str_replace( 'attachment-', 'vertical-image attachment-', $html );
		}
		return $html;
	}
endif;

add_filter( 'post_thumbnail_html', 'mytheme_vertical_check', 10, 5 );

/**
 * Filter wp_link_pages to wrap current page in span.
 *
 * http://wordpress.stackexchange.com/a/141995
 */
function yearn_link_pages( $link ) {

	if ( ctype_digit( $link ) ) {
		return '<span class="current-page">' . $link . '</span>';
	}
	return $link;
}
add_filter( 'wp_link_pages_link', 'yearn_link_pages' );

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="styled-button"';
}

/**
 * change […] to "read more" and add title for screen readers.
 * http://www.w3.org/TR/2012/NOTE-WCAG20-TECHS-20120103/C7
 */

function new_excerpt_more( $more ) {
	return ' <a class=" read-more " href="'. get_permalink( get_the_ID() ) . '"> <span class="screen-reader-text"> ' . get_the_title(). ' </span> '. __('Read More', 'yearn') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
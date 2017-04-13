<?php
/**
 * MixedNuts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MixedNuts
 */


if ( ! function_exists( 'mixednuts_setup' ) ) :
/**
 * Means if the function mixednuts setup does not exist, then do the following
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mixednuts_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MixedNuts, use a find and replace
	 * to change 'mixednuts' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mixednuts', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	*Add site logo  to head
	*/
	add_theme_support( 'custom-logo');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * Post thumbnails now means featured image
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'mixednuts' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature - hooks into customizer feature in admin
	add_theme_support( 'custom-background', apply_filters( 'mixednuts_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'mixednuts_setup' );

/**
 * Add preconnect for Google Fonts to improve performance for custom fonts
 *
 * @since mixednuts
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function mixednuts_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'mixednuts-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'mixednuts_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * This is used for external content, like a video embedded in the theme. The theme
 *  needs to know how wide to make the video.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mixednuts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mixednuts_content_width', 640 );
}
add_action( 'after_setup_theme', 'mixednuts_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mixednuts_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mixednuts' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mixednuts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mixednuts_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mixednuts_scripts() {
	// Enqueue Google Fonts: Ubunta reg and bold and italic of each Moderate load time
	wp_enqueue_style( 'mixednuts-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,900,900i|' ) ;

	wp_enqueue_style( 'mixednuts-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons' ) ;

	wp_enqueue_style( 'mixednuts-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mixednuts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mixednuts-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mixednuts_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

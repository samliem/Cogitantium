<?php
/**
 * cogitantium functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cogitantium
 */

if ( ! function_exists( 'cogitantium_setup' ) ) :

	require_once('bs4navwalker.php');

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cogitantium_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cogitantium, use a find and replace
		 * to change 'cogitantium' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cogitantium', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cogitantium' ),
			'menu-2' => esc_html__( 'Default', 'cogitantium' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cogitantium_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cogitantium_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cogitantium_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cogitantium_content_width', 640 );
}
add_action( 'after_setup_theme', 'cogitantium_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cogitantium_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cogitantium' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cogitantium' ),
		'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title title-block-wrap clearfix"><span class="block-title"><span>',
		'after_title'   => '</span></span></h3>',
	) );
}
add_action( 'widgets_init', 'cogitantium_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cogitantium_scripts() {

	$theme_uri = get_template_directory_uri();

	wp_enqueue_style( 'bootstrap-style', $theme_uri . '/css/bootstrap.min.css', '', '4.3.1');
	wp_enqueue_style( 'paper-kit-style', $theme_uri . '/css/paper-kit.min.css', '', '2.2.0' );
	wp_enqueue_style( 'cogitantium-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', $theme_uri . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'paper-kit', $theme_uri . '/js/paper-kit.js', array('jquery'), '2.2.0', true );

	if( is_home() ) {
		// Just for homepage
		wp_enqueue_style( 'sections-style', $theme_uri . '/css/section.css');
		wp_enqueue_style( 'owl-style', $theme_uri . '/css/owl.carousel.min.css', '', '2.3.4');
		wp_enqueue_style( 'owl-theme-style', $theme_uri . '/css/owl.theme.default.min.css', '', '2.3.4');
		wp_enqueue_style( 'lightbox-style', $theme_uri . '/js/plugins/lightbox/css/lightbox.min.css');
		wp_enqueue_style( 'animate-style', $theme_uri . '/css/animate.min.css', '', '3.7.0');

		wp_enqueue_script( 'owl-carousel', $theme_uri . '/js/plugins/owl.carousel.min.js', array('jquery'), '2.3.4', true );
		wp_enqueue_script( 'lightbox', $theme_uri . '/js/plugins/lightbox/js/lightbox.min.js', array('jquery'), '2.10.0', true );
		wp_enqueue_script( 'home-script', $theme_uri . '/js/home.js', array('jquery'), '', true);
	} else {
		wp_enqueue_style( 'blog', $theme_uri . '/css/blog.css' );
	}

	wp_enqueue_script( 'main', $theme_uri . '/js/main.js', array('jquery'), '', true );

	// -- Bawaan theme
	// wp_enqueue_script( 'cogitantium-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'cogitantium-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// -- Digantikan dengan Jetpack
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

}
add_action( 'wp_enqueue_scripts', 'cogitantium_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*--------------------------------------------------------------
# Custom Nav Menu
--------------------------------------------------------------*/
add_filter( 'wp_nav_menu', 'cogitantium_replace_anchor' );
function cogitantium_replace_anchor($ulclass) {
	return preg_replace( '/<a/', '<a class="nav-link js-scroll"', $ulclass, -1 );
}

add_filter( 'nav_menu_link_attributes', 'cogitantium_replace_href', 10, 3 );
function cogitantium_replace_href($atts, $item, $args) {
	if( !is_home() ) {
		$href = $atts['href'];
		$pos = strpos( $href, '#' );
		if( $pos !== false ) {
			$href = home_url( '/' ) . $href;
			$atts['href'] = $href;
		}
		
	}
	return $atts;
}

/*--------------------------------------------------------------
# Custom Search Widget
--------------------------------------------------------------*/
add_filter( 'get_search_form', 'cogitantium_search_form', 10, 3 );
function cogitantium_search_form($form) {
	$form = '<form role="search" method="get" class="search-widget" action="' . home_url('/') . '">';
	$form .= '<div class="input-group">';
	$form .= '<input type="text" class="form-control" placeholder="Search Posts" value name="s">';
	$form .= '<span class="input-group-btn">';
	$form .= '<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>';
	$form .= '</span></div></form>';

	return $form;
}

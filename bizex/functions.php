<?php
/**
 * Bizex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bizex
 */

/**
 * Define Core File
*/
define( 'BIZEX_THEME_DRI', get_template_directory() );
define( 'BIZEX_THEME_URI', get_template_directory_uri() );
define( 'BIZEX_CSS_PATH', BIZEX_THEME_URI . '/assets/css' );
define( 'BIZEX_JS_PATH', BIZEX_THEME_URI . '/assets/js' );
define( 'BIZEX_ICON_PATH', BIZEX_THEME_URI . '/assets/fonts/fontawesome/css' );
define( 'BIZEX_IMG_PATH', BIZEX_THEME_URI . '/assets/images' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bizex_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bizex, use a find and replace
		* to change 'bizex' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bizex', get_template_directory() . '/languages' );
	remove_theme_support( 'widgets-block-editor' );

	// custom image size
	add_image_size( 'bizex-img-size-1', 420, 335, true );
	add_image_size( 'bizex-img-size-2', 604, 420, true );
	add_image_size( 'bizex-img-size-3', 263, 245, true );
	add_image_size( 'bizex-img-size-4', 220, 237, true );
	add_image_size( 'bizex-img-size-5', 915, 450, true );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Woocommerce Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bizex' ),
			'menu-2' => esc_html__( 'Footer', 'bizex' ),
			'menu-3' => esc_html__( 'Onepage Menu', 'bizex' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bizex_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bizex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bizex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bizex_content_width', 640 );
}
add_action( 'after_setup_theme', 'bizex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bizex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bizex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bizex' ),
			'before_widget' => '<section id="%1$s" class="widget bz-sidebar-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'bizex' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add Footer widgets here.', 'bizex' ),
			'before_widget' => '<div id="%1$s" class="bz-footer-widget headline pera-content"><div class="menu-widget ul-li-block">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'bizex' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add Footer widgets here.', 'bizex' ),
			'before_widget' => '<div id="%1$s" class="bz-footer-widget headline pera-content"><div class="menu-widget ul-li-block">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'bizex' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add Footer widgets here.', 'bizex' ),
			'before_widget' => '<div id="%1$s" class="bz-footer-widget headline pera-content"><div class="recent-blog-widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'bizex' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add Footer widgets here.', 'bizex' ),
			'before_widget' => '<div id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="bizx_widget_title"><span>',
			'after_title'   => '</span><i></i></h3>',
		)
	);
}
add_action( 'widgets_init', 'bizex_widgets_init' );



/**
 *Google Font Load 
 */
if ( ! function_exists( 'bizex_fonts_url' ) ) :
	
	function bizex_fonts_url() {
		$fonts_url     = '';
		$font_families = array();
		$subsets       = 'latin';
	
	
		if ( 'off' !== _x( 'on', 'Syne: on or off', 'bizex' ) ) {
			$font_families[] = 'Syne:400,500,600,700,800';
		}

		if ( 'off' !== _x( 'on', 'Manrope: on or off', 'bizex' ) ) {
			$font_families[] = 'Manrope:200,300,400,500,600,700,800';
		}

		if ( 'off' !== _x( 'on', 'Roboto: on or off', 'bizex' ) ) {
			$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
		}
		if ( 'off' !== _x( 'on', 'Playfair Display: on or off', 'bizex' ) ) {
			$font_families[] = 'Playfair Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}
	
		if ( $font_families ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}
	
		return esc_url_raw( $fonts_url );
	}
	endif;

/**
 * Enqueue scripts and styles.
 */
function bizex_scripts() {
	// bizex Font Load
	wp_enqueue_style( 'bizex-google-fonts', bizex_fonts_url(), array(), null );

	wp_enqueue_style( 'bootstrap', BIZEX_CSS_PATH . '/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-all-1', BIZEX_CSS_PATH . '/fontawesome-all.css' );
	wp_enqueue_style( 'flaticon', BIZEX_CSS_PATH . '/flaticon.css' );
	wp_enqueue_style( 'splitting', BIZEX_CSS_PATH . '/splitting.css' );
	wp_enqueue_style( 'animate', BIZEX_CSS_PATH . '/animate.css' );
	wp_enqueue_style( 'video', BIZEX_CSS_PATH . '/video.min.css' );
	wp_enqueue_style( 'slick-theme', BIZEX_CSS_PATH . '/slick-theme.css' );
	wp_enqueue_style( 'slick', BIZEX_CSS_PATH . '/slick.css' );
	wp_enqueue_style( 'global', BIZEX_CSS_PATH . '/global.css' );
	wp_enqueue_style( 'bizex-main', BIZEX_CSS_PATH . '/style.css' );
	if(class_exists('WooCommerce')){
		wp_enqueue_style( 'bizex-woocommerce', BIZEX_CSS_PATH . '/woocommerce.css' );
	}

	wp_enqueue_style( 'bizex-style', get_stylesheet_uri(), array(), );
	if (is_rtl()) {		
		wp_enqueue_style( 'prinox-rtl', BIZEX_CSS_PATH . '/rtl.css' );
	}

	wp_enqueue_script('masonry');
	wp_enqueue_script( 'bootstrap', BIZEX_JS_PATH . '/bootstrap.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'popper', BIZEX_JS_PATH . '/popper.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'appear', BIZEX_JS_PATH . '/appear.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'slick', BIZEX_JS_PATH . '/slick.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'wow', BIZEX_JS_PATH . '/wow.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'knob', BIZEX_JS_PATH . '/knob.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'rbtools', BIZEX_JS_PATH . '/rbtools.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'splitting', BIZEX_JS_PATH . '/splitting.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'scroll-out', BIZEX_JS_PATH . '/scroll-out.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'isotope', BIZEX_JS_PATH . '/isotope.pkgd.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'counterup', BIZEX_JS_PATH . '/jquery.counterup.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'waypoints', BIZEX_JS_PATH . '/waypoints.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'twin', BIZEX_JS_PATH . '/twin.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'parallax-scroll', BIZEX_JS_PATH . '/parallax-scroll.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'magnific-popup', BIZEX_JS_PATH . '/jquery.magnific-popup.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'marquee', BIZEX_JS_PATH . '/jquery.marquee.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'script', BIZEX_JS_PATH . '/script.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bizex_scripts' );

/**
 * Implement the Custom Header feature.
 */
require BIZEX_THEME_DRI . '/inc/custom-header.php';

/**
 * Nav Walker
 */
require BIZEX_THEME_DRI . '/inc/class-wp-bizex-navwalker.php';

/**
 * Custom template tags for this theme.
 */
require BIZEX_THEME_DRI . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BIZEX_THEME_DRI . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BIZEX_THEME_DRI . '/lib/plugin-activation.php';

/**
 * Oneclick Demo Import
 */
require BIZEX_THEME_DRI . '/lib/ocdi/functions.php';

/**
 * Customizer additions.
 */
require BIZEX_THEME_DRI . '/inc/customizer.php';

/**
 * Bizex Functions
 */
require BIZEX_THEME_DRI . '/inc/bizex-functions.php';

/**
 * Dynamic Css
 */
require BIZEX_THEME_DRI . '/inc/dynamic-css.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BIZEX_THEME_DRI . '/inc/jetpack.php';
}


/**
 * Bizex Functions
 */
require BIZEX_THEME_DRI . '/inc/cs-framework-functions.php';

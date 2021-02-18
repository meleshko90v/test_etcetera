<?php
/**
 * real estate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package real_estate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'real_estate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function real_estate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on real estate, use a find and replace
		 * to change 'real-estate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'real-estate', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'real-estate' ),
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
				'real_estate_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'real_estate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function real_estate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'real_estate_content_width', 640 );
}
add_action( 'after_setup_theme', 'real_estate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function real_estate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'real-estate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'real-estate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'real_estate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function real_estate_scripts() {
//wp_enqueue_style( 'real-estate-style', get_stylesheet_uri(), array(), _S_VERSION );//v.1.0
	wp_style_add_data( 'real-estate-style', 'rtl', 'replace' );

	wp_enqueue_script( 'real-estate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ie_png-script', get_template_directory_uri() . '/assets/js/ie_png.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'after_setup_theme', 'real_estate_register_nav_menu' );
function real_estate_register_nav_menu() {
	register_nav_menu( 'top_menu', 'menu_header' );
}
add_action( 'wp_enqueue_scripts', 'real_estate_style' );
function real_estate_style() {
	        wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'style-theme', get_template_directory_uri() . '/assets/css/style.css' );
			wp_enqueue_style( 'style-layout', get_template_directory_uri() . '/assets/css/layout.css' );
			wp_enqueue_style( 'style-ie_style', get_template_directory_uri() . '/assets/css/ie_style.css' );
		}
add_action( 'wp_enqueue_scripts', 'real_estate_scripts' );
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

/*
// Регистрация jQuery
add_action( 'wp_enqueue_scripts', 'jquery_script_method' );
function jquery_script_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
}
*/


add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');
 
function misha_filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
 
	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);
 
		// if only max price is set
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);
	}
 
 
	// if post thumbnail is set
	if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'][] = array(
			'key' => '_thumbnail_id',
			'compare' => 'EXISTS'
		);
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			echo '<h2>' . $query->post->post_title . '</h2>';
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
 
	die();
}
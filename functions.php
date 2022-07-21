<?php
/**
 * cure functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cure
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cure_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on cure, use a find and replace
		* to change 'cure' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cure', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Main', 'cure' ),
			'menu-1' => esc_html__( 'Primary', 'cure' ),
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
			'cure_custom_background_args',
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
add_action( 'after_setup_theme', 'cure_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cure_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cure_content_width', 640 );
}
add_action( 'after_setup_theme', 'cure_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cure_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cure' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cure' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cure_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cure_scripts() {
	wp_enqueue_style( 'cure-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cure-style', 'rtl', 'replace' );

	wp_enqueue_style( 'output', get_template_directory_uri() . '/output/output.css', array(), rand(111,9999), 'all' );

	  wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/inc/slick/slick.css',false,'1.1','all');
    wp_enqueue_style( 'slick-theme-style', get_template_directory_uri() . '/inc/slick/slick-theme.css',false,'1.1','all');
 	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/inc/slick/slick.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'cure-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cure_scripts' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

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


/**
 * Register a custom post type called "National Advisory Board".
 *
 * @see get_post_type_labels() for label keys.
 */
function nationaladvisoryboard_init() {
    $labels = array(
        'name'                  => _x( 'National Advisory Board', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'National Advisory Board Member', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'National Advisory Board', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'National Advisory Board Member', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New National Advisory Board Member', 'textdomain' ),
        'new_item'              => __( 'New National Advisory Board Member', 'textdomain' ),
        'edit_item'             => __( 'Edit National Advisory Board Member', 'textdomain' ),
        'view_item'             => __( 'View National Advisory Board Member', 'textdomain' ),
        'all_items'             => __( 'All National Advisory Board Members', 'textdomain' ),
        'search_items'          => __( 'Search National Advisory Board Members', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent National Advisory Board Member:', 'textdomain' ),
        'not_found'             => __( 'No National Advisory Board Members found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No National Advisory Board Members found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'National Advisory Board Member Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set National Advisory Board Member image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove National Advisory Board Member image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as National Advisory Board Member image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'National Advisory Board Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into National Advisory Board Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this National Advisory Board Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter National Advisory Board Members list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'National Advisory Board Members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'National Advisory Board Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'board' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-businesswoman',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'board', $args );
}
 
add_action( 'init', 'nationaladvisoryboard_init' );

/**
 * Register a custom post type called "CAYG Team".
 *
 * @see get_post_type_labels() for label keys.
 */
function caygteam_init() {
    $labels = array(
        'name'                  => _x( 'CAYG Team', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'CAYG Team Member', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'CAYG Team', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'CAYG Team Member', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New CAYG Team Member', 'textdomain' ),
        'new_item'              => __( 'New CAYG Team Member', 'textdomain' ),
        'edit_item'             => __( 'Edit CAYG Team Member', 'textdomain' ),
        'view_item'             => __( 'View CAYG Team Member', 'textdomain' ),
        'all_items'             => __( 'All CAYG Team Members', 'textdomain' ),
        'search_items'          => __( 'Search CAYG Team Members', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent CAYG Team Member:', 'textdomain' ),
        'not_found'             => __( 'No CAYG Team Members found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No CAYG Team Members found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'CAYG Team Member Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set CAYG Team Member image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove CAYG Team Member image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as CAYG Team Member image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'CAYG Team Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into CAYG Team Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this CAYG Team Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter CAYG Team Members list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'CAYG Team list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'CAYG Team Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-admin-users',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'team', $args );
}
 
add_action( 'init', 'caygteam_init' );


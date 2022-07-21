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

    register_taxonomy( 'boardrole', array('board'), array(
        'hierarchical' => true, 
        'label' => 'Board Role', 
        'singular_label' => 'Board Role', 
        'rewrite' => array( 'slug' => 'board-role', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'boardrole', 'board' ); // Better be safe than sorry

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

    register_taxonomy( 'teamrole', array('team'), array(
        'hierarchical' => true, 
        'label' => 'Team Role', 
        'singular_label' => 'Team Role', 
        'rewrite' => array( 'slug' => 'team-role', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'teamrole', 'team' ); // Better be safe than sorry
}

add_action( 'init', 'caygteam_init' );


/**
 * Register a custom post type called "Tools and Resources".
 *
 * @see get_post_type_labels() for label keys.
 */
function toolsandresources_init() {
    $labels = array(
        'name'                  => _x( 'Tools and Resources', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Tool or Resource', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Tools and Resources', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Tool or Resource', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Tool or Resource', 'textdomain' ),
        'new_item'              => __( 'New Tool or Resource', 'textdomain' ),
        'edit_item'             => __( 'Edit Tool or Resource', 'textdomain' ),
        'view_item'             => __( 'View Tool or Resource', 'textdomain' ),
        'all_items'             => __( 'All Tools and Resources', 'textdomain' ),
        'search_items'          => __( 'Search Tools and Resources', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Tool or Resource:', 'textdomain' ),
        'not_found'             => __( 'No Tools and Resources found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Tools and Resources found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Tool or Resource Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Tool or Resource image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Tool or Resource image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Tool or Resource image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Tool or Resource archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Tool or Resource', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Tool or Resource', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Tools and Resources list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Tools and Resources list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Tools and Resources list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'toolsandresources' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-admin-tools',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'toolsandresources', $args );

    register_taxonomy( 'types', array('toolsandresources'), array(
        'hierarchical' => true, 
        'label' => 'Type', 
        'singular_label' => 'Type', 
        'rewrite' => array( 'slug' => 'type', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'types', 'toolsandresources' ); // Better be safe than sorry
}

add_action( 'init', 'toolsandresources_init' );

/**
 * Register a custom post type called "FAQs".
 *
 * @see get_post_type_labels() for label keys.
 */
function faq_init() {
    $labels = array(
        'name'                  => _x( 'FAQs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'FAQ', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'FAQ', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'FAQ', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New FAQ', 'textdomain' ),
        'new_item'              => __( 'New FAQ', 'textdomain' ),
        'edit_item'             => __( 'Edit FAQ', 'textdomain' ),
        'view_item'             => __( 'View FAQ', 'textdomain' ),
        'all_items'             => __( 'All FAQ', 'textdomain' ),
        'search_items'          => __( 'Search FAQ', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent FAQ:', 'textdomain' ),
        'not_found'             => __( 'No FAQs found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No FAQs found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'FAQ Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set FAQ image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove FAQ image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as FAQ image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'FAQ archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into FAQ', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this FAQ', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter FAQ list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'FAQ list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'FAQ list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-format-chat',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
    );
 
    register_post_type( 'faq', $args );

    register_taxonomy( 'FAQ Categories', array('faq'), array(
        'hierarchical' => true, 
        'label' => 'FAQ Categories', 
        'singular_label' => 'FAQ Category', 
        'rewrite' => array( 'slug' => 'faqcategory', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'faqcategories', 'faq' ); // Better be safe than sorry
}

add_action( 'init', 'faq_init' );


/**
 * Register a custom post type called "Workgroups".
 *
 * @see get_post_type_labels() for label keys.
 */
function workgroups_init() {
    $labels = array(
        'name'                  => _x( 'Workgroups', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Workgroup', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Workgroups', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Workgroup', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Workgroup', 'textdomain' ),
        'new_item'              => __( 'New Workgroup', 'textdomain' ),
        'edit_item'             => __( 'Edit Workgroup', 'textdomain' ),
        'view_item'             => __( 'View Workgroup', 'textdomain' ),
        'all_items'             => __( 'All Workgroups', 'textdomain' ),
        'search_items'          => __( 'Search Workgroups', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Workgroup:', 'textdomain' ),
        'not_found'             => __( 'No Workgroups found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Workgroups found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Workgroup Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Workgroup image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Workgroup image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Workgroup image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Workgroup archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Workgroup', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Workgroup', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Workgroups list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Workgroups list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Workgroups list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'workgroups' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-admin-multisite',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
    );
 
    register_post_type( 'workgroups', $args );
}

add_action( 'init', 'workgroups_init' );

/**
 * Register a custom post type called "Research".
 *
 * @see get_post_type_labels() for label keys.
 */
function research_init() {
    $labels = array(
        'name'                  => _x( 'Research', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Research', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Research', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Research', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Research', 'textdomain' ),
        'new_item'              => __( 'New Research', 'textdomain' ),
        'edit_item'             => __( 'Edit Research', 'textdomain' ),
        'view_item'             => __( 'View Research', 'textdomain' ),
        'all_items'             => __( 'All Research', 'textdomain' ),
        'search_items'          => __( 'Search Research', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Research:', 'textdomain' ),
        'not_found'             => __( 'No Research found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Research found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Research Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Research image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Research image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Research image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Research archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Research', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Research', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Research list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Research list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Research list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'research' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-welcome-write-blog',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'research', $args );

    register_taxonomy( 'Research Categories', array('research'), array(
        'hierarchical' => true, 
        'label' => 'Research Categories', 
        'singular_label' => 'Research Category', 
        'rewrite' => array( 'slug' => 'researchcategory', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'researchcategories', 'research' ); // Better be safe than sorry
}

add_action( 'init', 'research_init' );


/**
 * Register a custom post type called "Newsletter".
 *
 * @see get_post_type_labels() for label keys.
 */
function newsletter_init() {
    $labels = array(
        'name'                  => _x( 'Newsletters', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Newsletter', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Newsletter', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Newsletter', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Newsletter', 'textdomain' ),
        'new_item'              => __( 'New Newsletter', 'textdomain' ),
        'edit_item'             => __( 'Edit Newsletter', 'textdomain' ),
        'view_item'             => __( 'View Newsletter', 'textdomain' ),
        'all_items'             => __( 'All Newsletters', 'textdomain' ),
        'search_items'          => __( 'Search Newsletters', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Newsletter:', 'textdomain' ),
        'not_found'             => __( 'No Newsletters found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Newsletters found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Newsletter Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Newsletter image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Newsletter image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Newsletter image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Newsletter archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Newsletter', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Newsletter', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Newsletters list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Newsletters list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Newsletters list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'newsletter' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-email-alt',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
    );
 
    register_post_type( 'newsletter', $args );
}

add_action( 'init', 'newsletter_init' );


/**
 * Register a custom post type called "Blog".
 *
 * @see get_post_type_labels() for label keys.
 */
function blog_init() {
    $labels = array(
        'name'                  => _x( 'Blog', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Blog', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Blog', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Blog', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Blog', 'textdomain' ),
        'new_item'              => __( 'New Blog', 'textdomain' ),
        'edit_item'             => __( 'Edit Blog', 'textdomain' ),
        'view_item'             => __( 'View Blog', 'textdomain' ),
        'all_items'             => __( 'All Blog Posts', 'textdomain' ),
        'search_items'          => __( 'Search Blog', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Blog:', 'textdomain' ),
        'not_found'             => __( 'No Blog Posts found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Blog Posts found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Blog Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Blog image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Blog image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Blog image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Blog archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Blog', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Blog', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Blog list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Blog list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Blog list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'blog' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-edit',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'blog', $args );
}

add_action( 'init', 'blog_init' );

/**
 * Register a custom post type called "In The News".
 *
 * @see get_post_type_labels() for label keys.
 */
function inthenews_init() {
    $labels = array(
        'name'                  => _x( 'In The News', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'News', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'In The News', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'In The News', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New News', 'textdomain' ),
        'new_item'              => __( 'New News', 'textdomain' ),
        'edit_item'             => __( 'Edit News', 'textdomain' ),
        'view_item'             => __( 'View News', 'textdomain' ),
        'all_items'             => __( 'All News', 'textdomain' ),
        'search_items'          => __( 'Search In The News', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent News:', 'textdomain' ),
        'not_found'             => __( 'No In The News Posts found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No In The News Posts found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'In The News Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set In The News image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove In The News image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as In The News image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'In The News archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into News', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this News', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter In The News list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'In The News list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'In The News list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'inthenews' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-megaphone',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'inthenews', $args );
}

add_action( 'init', 'inthenews_init' );

/**
 * Register a custom post type called "Media Kit".
 *
 * @see get_post_type_labels() for label keys.
 */
function mediakit_init() {
    $labels = array(
        'name'                  => _x( 'Media Kit', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Media Kit Entry', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Media Kit', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Media Kit', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Media Kit', 'textdomain' ),
        'new_item'              => __( 'New Media Kit', 'textdomain' ),
        'edit_item'             => __( 'Edit Media Kit', 'textdomain' ),
        'view_item'             => __( 'View Media Kit', 'textdomain' ),
        'all_items'             => __( 'All Media Kits', 'textdomain' ),
        'search_items'          => __( 'Search Media Kit', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Media Kit:', 'textdomain' ),
        'not_found'             => __( 'No Media Kit found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Media Kit found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Media Kit Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Media Kit image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove Media Kit image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as Media Kit image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Media Kit archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Media Kit', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Media Kit', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Media Kit list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Media Kit list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Media Kit list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'mediakit' ),
        'capability_type'    => 'post',
        'menu_icon'    => 'dashicons-admin-appearance',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'mediakit', $args );
}

add_action( 'init', 'mediakit_init' );


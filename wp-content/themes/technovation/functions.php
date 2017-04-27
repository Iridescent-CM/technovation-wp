<?php
/**
 * Technovation functions and definitions.
 *
 * @package Underscores_Technovation
 */


/**
 * Set up theme deafults and register support for WordPress features
 */
function technovation_setup() {
	// Make theme available for translation, just in case we offer a multilingual site in the future
	load_theme_textdomain( 'technovation', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );
	// Enable post formats
	add_theme_support( 'post-formats', array( 'link' ) );
	// Register navigation menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'technovation' ),
		'secondary' => esc_html__( 'Secondary', 'technovation' ),
		'footer'	=> esc_html__( 'Footer', 'technovation' ),
	) );
	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Add support for a custom logo
	add_theme_support( 'custom-logo', array(
		'height' => 104,
		'width' => 444,
		'flex-height' => true
	) );
	// Add styles to the WYSIWG editor
	add_editor_style();
	// Add staff bio staff image size
	add_image_size( 'staff-polaroid', 300, 240, true );
}
add_action( 'after_setup_theme', 'technovation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet
 *
 * TODO: Fix this to the correct size once we've received the PSD's and can measure
 */
function technovation_content_width() {
	$GLOBAL['content_width'] = apply_filters( 'technovation_content_width', 840 );
}
add_action( 'after_setup_theme', 'technovation_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function technovation_scripts() {
	wp_enqueue_style( 'eagle', '//cloud.webtype.com/css/fea72f17-6c81-4c13-9e34-58b54a440d85.css' );
	wp_enqueue_style( 'technovation-style', get_stylesheet_uri(), '', '20161025-1' );

	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

	wp_enqueue_script( 'mmenu', get_stylesheet_directory_uri() . '/js/jquery.mmenu.all.min.js', array( 'jquery' ), '5.6.5', true );

	wp_enqueue_script( 'fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	wp_enqueue_script( 'technovation-js', get_stylesheet_directory_uri() . '/js/technovation.js', array( 'jquery', 'mmenu', 'fitvids' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'technovation_scripts' );

/**
 * Register widget areas
 */
function technovation_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'technovation'),
		'id' => 'sidebar-footer',
		'description' => esc_html__( 'Add widgets that will appear in the footer here', 'technovation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'technovation_widgets_init' );

/**
 * Implement custom header images
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Include custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Add span wrappers to menu widgets for styling flexibility
 */

function technovation_menu_widget_customizations( $item ) {
	return preg_replace( '~(<a[^>]*>)([^<]*)</a>~', '$1<span>$2</span></a>', $item);
}
add_filter( 'walker_nav_menu_start_el', 'technovation_menu_widget_customizations' );

/**
 * Remove curriculum from search results
 */
function technovation_exclude_curriculum( $query ) {
	if ($query->is_search) {
		$query->set('post_type', array( 'post', 'page' ) );
		/* Exclude the linked table of contents of the curriculum from search results */
		$query->set('post__not_in', array( -16554 ) );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'technovation_exclude_curriculum' );

/**
 * Remove admin bar CSS
 */
function technovation_head_css() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'technovation_head_css' );

/**
 *
 */
function technovation_archive_titles( $title ) {
	if ( is_post_type_archive( 'press' ) ) {
		$title = post_type_archive_title('', false) . ' Archives';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'technovation_archive_titles' );

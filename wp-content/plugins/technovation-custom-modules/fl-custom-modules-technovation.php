<?php
/**
 * Plugin Name: Technovation Custom Modules
 * Plugin URI: http://technovationchallenge.org
 * Description: Custom page builder modules for Technovation
 * Version: 1.0
 * Author: Purple Pen Productions
 * Author URI: http://purplepen.com
 */

define( 'TECHNOVATION_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'TECHNOVATION_MODULES_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function technovation_load_modules() {
	if ( class_exists( 'FLBuilder' ) ) {
		require_once 'curriculum-listing/curriculum-listing.php';
		require_once 'graphic-tabs/graphic-tabs.php';
		require_once 'hover-reveal/hover-reveal.php';
		require_once 'image-buttons/image-buttons.php';
		require_once 'leaflet-map/leaflet-map.php';
		require_once 'staff/staff.php';
		require_once 'toc/toc.php';
		require_once 'tagged-boxes/tagged-boxes.php';
		require_once 'text-bubbles/text-bubbles.php';
		require_once 'timeline/timeline.php';
	}
}
add_action( 'init', 'technovation_load_modules' );

/* Customize the existing form fields */
require_once('technovation-bb-custom.php');
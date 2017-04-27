<?php /* All setup for the press custom post type */


/**
 * Register a press post type.
 */
function technovation_press_init() {
	$labels = array(
		'name'								=> _x( 'Press', 'post type general name', 'technovation' ),
		'singular_name'				=> _x( 'Press', 'post type singular name', 'technovation' ),
		'menu_name'						=> _x( 'Press', 'admin menu', 'technovation' ),
		'name_admin_bar'			=> _x( 'Press', 'add new on admin bar', 'technovation' ),
		'add_new'							=> _x( 'Add New', 'curriculum', 'technovation' ),
		'add_new_item'				=> __( 'Add New Press Item', 'technovation' ),
		'new_item'						=> __( 'New Press Item', 'technovation' ),
		'edit_item'						=> __( 'Edit Press Item', 'technovation' ),
		'view_item'						=> __( 'View Press Item', 'technovation' ),
		'all_items'						=> __( 'All Press', 'technovation' ),
		'search_items'				=> __( 'Search Press', 'technovation' ),
		'parent_item_colon'		=> __( 'Parent Press Item:', 'technovation' ),
		'not_found'						=> __( 'No press found.', 'technovation' ),
		'not_found_in_trash'	=> __( 'No press found in Trash.', 'technovation' )
	);

	$args = array(
		'labels'							=> $labels,
		'description'					=> __( 'Press items', 'technovation' ),
		'public'							=> true,
		'menu_icon'						=> 'dashicons-megaphone',
		'publicly_queryable'	=> true,
		'show_ui'							=> true,
		'show_in_menu'				=> true,
		'query_var'						=> true,
		'rewrite'							=> array( 'slug' => 'press' ),
		'capability_type'			=> 'post',
		'has_archive'					=> true,
		'hierarchical'				=> false,
		'menu_position'				=> null,
		'supports'						=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'post-formats' )
	);

	register_post_type( 'press', $args );
}

add_action( 'init', 'technovation_press_init' );

/**
 * Filter post title for post format links that have a titlelink
 */
function technovation_filter_press_link( $url ) {
	global $post;
	$titlelink = get_post_meta( $post->ID, 'titlelink', true );
	if ( 'press' == $post->post_type && ! empty( $titlelink ) ) {
		$url = $titlelink;
	}
	return $url;
}
add_filter( 'the_permalink', 'technovation_filter_press_link', 10, 1 );

/**
 * Add press link meta box
 */
function technovation_press_titlelink() {
	add_meta_box(	'technovation-press-meta', __('Press Info', 'technovation'), 'technovation_press_options_titlelink', 'press', 'link', 'high');
}
add_action( 'admin_init', 'technovation_press_titlelink' );

/**
 * Create markup for the press link meta box
 */
function technovation_press_options_titlelink() {
	global $post;
	$custom = get_post_custom( $post->ID );
	$titlelink = $custom['titlelink'][0];
	$publication = $custom['publication'][0];
	echo '<div><label>Link to the press item:</label><input class="input-full" type="text" name="titlelink" value="' . $titlelink . '" /></div>
		<div style="margin-top:0.5rem;"><label>Name of publication:</label><input class="input-full" type="text" name="publication" value="' . $publication . '" /></div>';
}

/**
 * Save the information entered in the press link meta box
 */
function technovation_save_press_titlelink( $post_id ) {
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( isset( $_POST[ 'titlelink' ] ) ) {
		update_post_meta( $post->ID, 'titlelink', $_POST[ 'titlelink' ] );
		update_post_meta( $post->ID, 'publication', $_POST[ 'publication' ] );
		if ( strlen( $_POST[ 'titlelink' ] ) > 7 ) :
			set_post_format( $post->ID, 'link' );
		endif;
	}
}
add_action( 'save_post_press', 'technovation_save_press_titlelink' );

/**
 * Move the press link meta box to the top of the main column of the page
 */
function technovation_move_press_titlelink() {
	global $post, $wp_meta_boxes;
	do_meta_boxes( get_current_screen(), 'link', $post );
	unset( $wp_meta_boxes[ 'post' ][ 'link' ] );
}
add_action( 'edit_form_after_title', 'technovation_move_press_titlelink' );

/**
 * Enqueue custom styles for the press link meta box
 */
function technovation_press_admin_style() {
	global $post_type;
	if( 'press' == $post_type )
		wp_enqueue_style( 'technovation-admin-style', plugins_url( 'assets/press-admin.css', __FILE__ ) );
}
add_action( 'admin_print_styles-post-new.php', 'technovation_press_admin_style', 11 );
add_action( 'admin_print_styles-post.php', 'technovation_press_admin_style', 11 );
<?php /* All setup for the curriculum custom post type */


/**
 * Register a curriculum post type and taxonomy
 */
function technovation_curriculum_init() {
	$curriculum_labels = array(
		'name'								=> _x( 'Curricula', 'post type general name', 'technovation' ),
		'singular_name'				=> _x( 'Curriculum', 'post type singular name', 'technovation' ),
		'menu_name'						=> _x( 'Curricula', 'admin menu', 'technovation' ),
		'name_admin_bar'			=> _x( 'Curriculum', 'add new on admin bar', 'technovation' ),
		'add_new'							=> _x( 'Add New', 'curriculum', 'technovation' ),
		'add_new_item'				=> __( 'Add New Curriculum', 'technovation' ),
		'new_item'						=> __( 'New Curriculum', 'technovation' ),
		'edit_item'						=> __( 'Edit Curriculum', 'technovation' ),
		'view_item'						=> __( 'View Curriculum', 'technovation' ),
		'all_items'						=> __( 'All Curricula', 'technovation' ),
		'search_items'				=> __( 'Search Curricula', 'technovation' ),
		'parent_item_colon'		=> __( 'Parent Curricula:', 'technovation' ),
		'not_found'						=> __( 'No curricula found.', 'technovation' ),
		'not_found_in_trash'	=> __( 'No curricula found in Trash.', 'technovation' )
	);

	$curriculum_args = array(
		'labels'							=> $curriculum_labels,
		'description'					=> __( 'Individual curriculum lesson plans.', 'technovation' ),
		'public'							=> true,
		'menu_icon'						=> 'dashicons-book-alt',
		'publicly_queryable'	=> true,
		'show_ui'							=> true,
		'show_in_menu'				=> true,
		'query_var'						=> true,
		'rewrite'							=> array( 'slug' => 'curriculum' ),
		'capability_type'			=> 'post',
		'has_archive'					=> true,
		'hierarchical'				=> false,
		'menu_position'				=> null,
		'supports'						=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'curriculum', $curriculum_args );

	$type_labels = array(
		'name'              => _x( 'Types', 'type general name', 'technovation' ),
		'singular_name'     => _x( 'Type', 'type singular name', 'technovation' ),
		'search_items'      => __( 'Search Types', 'technovation' ),
		'all_items'         => __( 'All Types', 'technovation' ),
		'parent_item'       => __( 'Parent Type', 'technovation' ),
		'parent_item_colon' => __( 'Parent Type:', 'technovation' ),
		'edit_item'         => __( 'Edit Type', 'technovation' ),
		'update_item'       => __( 'Update Type', 'technovation' ),
		'add_new_item'      => __( 'Add New Type', 'technovation' ),
		'new_item_name'     => __( 'New Type Name', 'technovation' ),
		'menu_name'         => __( 'Type', 'technovation' ),
	);

	$type_args = array(
		'hierarchical'      => true,
		'labels'            => $type_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', array( 'curriculum' ), $type_args );
}
add_action( 'init', 'technovation_curriculum_init' );

/**
 * Add curriculum info meta box
 */
function technovation_curriculum_metabox() {
	add_meta_box( 'technovation-curriculum-meta', __('Curriculum Information', 'technovation'), 'technovation_curriculum_options', 'curriculum', 'info', 'high' );
}
add_action( 'admin_init', 'technovation_curriculum_metabox' );

/**
 * Create markup for the curriculum info meta box
 */
function technovation_curriculum_options() {
	global $post;
	$custom = get_post_custom( $post->ID );
	$short_name = $custom['short_name'][0];
	$is_senior = $custom['is_senior'][0]; ?>
	<p>
		<label for="short_name">Curriculum Short Name:</label>
		<input type="text" id="short_name" name="short_name" value="<?php echo $short_name; ?>"/>
		<span class="help">This is used to link to this module from the curriculum page(s)</span>
	</p>
	<p>
		<label>
			<input type="checkbox" name="is_senior" id="is_senior" value="yes" <?php echo $is_senior=='yes' ? 'checked' : ''; ?>/>
			Senior Division Only
		</label>
	</p>
	<?php
}

/**
 * Save the information entered in the curriculum info meta box
 */
function technovation_save_curriculum_info( $post_id ) {
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( isset( $_POST[ 'short_name' ] ) ) {
		update_post_meta( $post->ID, 'short_name', $_POST[ 'short_name' ] );
	}
	if ( isset( $_POST[ 'is_senior' ] ) ) {
		update_post_meta( $post->ID, 'is_senior', 'yes' );
	} else {
		update_post_meta( $post->ID, 'is_senior', '' );
	}
}
add_action( 'save_post_curriculum', 'technovation_save_curriculum_info' );

/**
 * Move the curriculum info meta box to the top of the main column on the page
 */
function technovation_move_curriculum_metabox() {
	global $post, $wp_meta_boxes;
	do_meta_boxes( get_current_screen(), 'info', $post );
	unset( $wp_meta_boxes[ 'post' ][ 'info' ] );
}
add_action( 'edit_form_after_title', 'technovation_move_curriculum_metabox' );

/**
 * Enqueue custom styles for the curriculum info meta box
 */
function technovation_curriculum_admin_style() {
	global $post_type;
	if ( 'curriculum' == $post_type )
		wp_enqueue_style( 'technovation-admin-style', plugins_url( 'assets/press-admin.css', __FILE__) );
}
add_action( 'admin_print_styles-post-new.php', 'technovation_curriculum_admin_style', 11 );
add_action( 'admin_print_styles-post.php', 'technovation_curriculum_admin_style', 11 );
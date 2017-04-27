<?php
wp_reset_query();

if ($settings->layout == 'news') {
	$settings->posts_per_page = 3;
	$settings->pagination = 'none';
}

// Get the query data.
$query = FLBuilderLoop::query($settings);

// Render the posts.
if($query->have_posts()) :

?>
<div class="fl-post-<?php echo $settings->layout; ?>" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php

	$count = 0;

	while($query->have_posts()) {

		$query->the_post();

		include apply_filters( 'fl_builder_posts_module_layout_path', $module->dir . 'includes/post-' . $settings->layout . '.php', $settings->layout );

		$count++;
	}

	?>
	<div class="fl-post-news-archive-link">
		<div class="fl-post-news-wrap">
			<a href="<?php echo get_post_type_archive_link( $settings->post_type ); ?>">
				Archive
			</a>
		</div>
	</div>
</div>
<div class="fl-clear"></div>
<?php endif; ?>
<?php


// Render the empty message.
if(!$query->have_posts() && (defined('DOING_AJAX') || isset($_REQUEST['fl_builder']))) :

?>
<div class="fl-post-grid-empty">
	<?php
	if (isset($settings->no_results_message)) :
		echo $settings->no_results_message;
	else :
		_e( 'No posts found.', 'fl-builder' );
	endif;
	?>
</div>

<?php

endif;

wp_reset_postdata();

?>
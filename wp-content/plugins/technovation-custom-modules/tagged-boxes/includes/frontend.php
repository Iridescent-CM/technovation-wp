<?php global $wp_embed; ?>

<div class="tagged-box">
	<h3 class="tagged-box-tag"><?php echo $settings->tag_text; ?></h3>
	<div class="tagged-box-content">
		<?php echo wpautop( $wp_embed->autoembed( $settings->content ) ); ?>
	</div>
</div>
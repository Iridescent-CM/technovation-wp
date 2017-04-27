<?php global $wp_embed; ?>

<div class="text-bubble-container text-bubble-<?php echo $settings->alignment; ?> text-bubble-<?php echo $settings->size; ?>">
	<div class="text-bubble">
		<div class="text-bubble-content">
			<?php echo wpautop( $wp_embed->autoembed( $settings->content ) ); ?>
		</div>
	</div>
</div>
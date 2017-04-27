<?php global $wp_embed; ?>
<div class="hover-reveal fl-clearfix">
	<?php for ( $i = 0; $i < count($settings->items); $i++ ) : if ( ! is_object( $settings->items[$i] ) ) continue; ?>
		<div class="hover-reveal-item">
			<div class="hover-reveal-label">
				<<?php echo $settings->items[$i]->h_level; ?>><?php echo $settings->items[$i]->label; ?></<?php echo $settings->items[$i]->h_level; ?>>
			</div>
			<div class="hover-reveal-content">
				<?php echo wpautop( $wp_embed->autoembed( $settings->items[$i]->content ) ); ?>
			</div>
		</div>
	<?php endfor; ?>
</div>
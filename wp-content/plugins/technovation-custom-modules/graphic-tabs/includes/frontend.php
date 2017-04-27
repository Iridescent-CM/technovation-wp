<?php
	global $wp_embed;
?>

<div class="graphic-tabs">
	<ul class="graphic-tabs-tabs">
		<?php for ( $i = 0; $i < count( $settings->tabs ); $i++ ) : if ( empty( $settings->tabs[ $i ] ) ) continue; ?>
			<li class="graphic-tabs-tab graphic-tab-<?php echo $settings->tabs[ $i ]->tab_color; ?>">
				<a href="#graphic-tab-container-<?php echo $i; ?>" style="background-image: url(<?php echo $settings->tabs[ $i ]->tab_photo_src; ?>);">
					<?php echo $settings->tabs[ $i ]->label; ?>
				</a>
			</li>
		<?php endfor; ?>
	</ul>
	<?php for ( $i = 0; $i < count( $settings->tabs ); $i++ ) : if ( empty( $settings->tabs[ $i ] ) ) continue; ?>
		<div class="graphic-tab-container" id="graphic-tab-container-<?php echo $i; ?>">
			<!-- Image Box -->
			<div class="graphic-tab-image-box graphic-tab-image-<?php echo $settings->tabs[ $i ]->tab_color ?>">
				<div class="graphic-tabs-content">
					<?php echo wpautop( $wp_embed->autoembed( $settings->tabs[ $i ]->image_box_content ) );; ?>
				</div>
				<div class="graphic-tabs-image" style="background-image: url(<?php echo $settings->tabs[ $i ]->image_box_src; ?>);"></div>
			</div>

			<!-- Text Area and Highlight -->
			<div class="graphic-tab-more-info more-info-<?php echo $settings->tabs[ $i ]->tab_color; ?>">
				<div class="graphic-tab-text-area">
					<h3><?php echo $settings->tabs[ $i ]->tab_header; ?></h3>
					<?php echo wpautop( $wp_embed->autoembed( $settings->tabs[ $i ]->tab_text ) );; ?>
				</div>
				<?php if ( ! empty( $settings->tabs[ $i ]->highlight_img ) && ! empty( $settings->tabs[ $i ]->highlight_text ) ) : ?>
					<div class="graphic-tab-highlight"></div>
				<?php endif; ?>
			</div>
		</div>
	<?php endfor; ?>
</div>

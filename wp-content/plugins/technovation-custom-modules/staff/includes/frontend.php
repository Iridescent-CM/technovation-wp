<?php global $wp_embed; ?>

<ul class="staff-listing layout-<?php echo $settings->layout; ?>">
	<?php for( $i = 0; $i<count($settings->staff_member); $i++ ) : ?>
		<li>
			<?php if ( ! empty( $settings->staff_member[ $i ]->bio ) ) : ?>
				<a class="popup-with-zoom-anim staff-link" href="#staff-<?php echo $id; ?>-<?php echo $i; ?>">
			<?php else : ?>
				<span class="staff-link">
			<?php endif; ?>
				<span class="bio-overview">
					<?php echo wp_get_attachment_image( $settings->staff_member[ $i ]->photo, 'staff-polaroid' ); ?>
					<h3><?php echo $settings->staff_member[ $i ]->name; ?></h3>
					<p><?php echo $settings->staff_member[ $i ]->title; ?></p>
				</span>
			<?php if ( ! empty( $settings->staff_member[ $i ]->bio ) ) : ?>
				</a>
			<?php else : ?>
				</span>
			<?php endif; ?>
			<div id="staff-<?php echo $id; ?>-<?php echo $i; ?>"  class="staff-bio entry-content zoom-anim-dialog mfp-hide">
				<h2><?php echo $settings->staff_member[ $i ]->name; ?></h2>
				<?php echo wpautop( $wp_embed->autoembed( $settings->staff_member[ $i ]->bio ) ); ?>
			</div>
		</li>
	<?php endfor; ?>
</ul>
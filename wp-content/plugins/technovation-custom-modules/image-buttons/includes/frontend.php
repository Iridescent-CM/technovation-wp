<?php
	$bgimage = wp_get_attachment_image_src( $settings->image, 'full' );
?>

<div class="<?php echo $module->get_classname(); ?>">
	<a href="<?php echo $settings->link; ?>" target="<?php echo $settings->link_target; ?>" class="image-button <?php echo $settings->btn_color; ?> <?php echo $settings->is_active == 'yes' ? 'selected' : ''; ?>" role="button" style="background-image: url(<?php echo $bgimage[0]; ?>);">
		<?php if ( ! empty( $settings->text ) ) : ?>
			<span class="image-button-text"><?php echo $settings->text; ?></span>
		<?php endif; ?>
	</a>
</div>
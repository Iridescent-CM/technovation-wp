<?php if ( ! empty( $settings->bgcolor ) ) { ?>
	.fl-node-<?php echo $id; ?> .text-bubble-content {
		background-color: #<?php echo $settings->bgcolor; ?>;
		background-color: rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bgcolor)) ?>, <?php echo $settings->bgopacity/100; ?>);
	}
<?php } ?>

.fl-node-<?php echo $id; ?> .text-bubble-content {
	<?php if ( ! empty( $settings->bordercolor ) ) { ?>
		border-color: #<?php echo $settings->bordercolor; ?>;
		border-width: <?php echo $settings->borderwidth; ?>px;
	<?php } else { ?>
		border-width: 0;
	<?php } ?>
}



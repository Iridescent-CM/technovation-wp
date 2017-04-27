<?php
if ( empty( $settings->tag_bg ) ) {
	$settings->tag_bg = '000000';
}

if ( empty( $settings->tag_text_color ) ) {
	$settings->tag_text_color = 'ffffff';
}

if ( empty( $settings->box_bg ) ) {
	$settings->box_bg = 'ffffff';
}

if ( empty( $settings->box_text_color ) ) {
	$settings->box_text_color = '000000';
}
?>

.fl-builder-content .fl-node-<?php echo $id; ?> .tagged-box-tag {
	background: #<?php echo $settings->tag_bg; ?>;
	color: #<?php echo $settings->tag_text_color; ?>;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .tagged-box-tag::after {
	border-left-color: #<?php echo $settings->tag_bg; ?>;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .tagged-box-content {
	background: #<?php echo $settings->box_bg; ?>;
	color: #<?php echo $settings->box_text_color; ?>;
}
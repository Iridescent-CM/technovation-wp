<?php
	$item_width = ( 100 / count( $settings->tabs ) ) . '%';
?>

.fl-node-<?php echo $id; ?> ul.graphic-tabs-tabs li,
.fl-node-<?php echo $id; ?> .entry-content ul.graphic-tabs-tabs li {
	width: 100%;
}

@media (min-width: 600px) {
	.fl-node-<?php echo $id; ?> ul.graphic-tabs-tabs li,
	.fl-node-<?php echo $id; ?> .entry-content ul.graphic-tabs-tabs li {
		width: <?php echo $item_width; ?>
	}
}
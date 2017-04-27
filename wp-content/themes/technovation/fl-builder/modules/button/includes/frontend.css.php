<?php
	$text_color = 'ffffff';
	$text_hover_color = 'ffffff';

	switch ($settings->btn_color) {
		case 'green':
			$bg_color = '28a880';
			$bg_hover_color = '00643f';
			break;
		case 'red':
			$bg_color = '7d324d';
			$bg_hover_color = '52082d';
			break;
		case 'purple':
			$bg_color = '6e466b';
			$bg_hover_color = '411b41';
			break;
		case 'blue':
			$bg_color = '01aaac';
			$bg_hover_color = '016667';
			break;
		case 'yellow':
			$bg_color = 'e9e46f';
			$bg_hover_color = 'c1c320';
			$text_color = '444444';
			$text_hover_color = '323232';
			break;
		case 'ltgray':
			$bg_color = 'cccccc';
			$bg_hover_color = '878787';
			$text_color = '444444';
			$text_hover_color = '323232';
			break;
		case 'dkgray':
			$bg_color = '444444';
			$bg_hover_color = '323232';
			break;
		case 'white':
			$bg_color = 'ffffff';
			$bg_hover_color = 'ebebeb';
			$text_color = '444444';
			$text_hover_color = '444444';
	}

	$border_color = $bg_color;;
?>

.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited {
	<?php if ($settings->style == 'solid') { ?>
		background-color: #<?php echo $bg_color; ?>;
		border: 0 none;
		color: #<?php echo $text_color; ?>;
	<?php } else { ?>
		background-color: transparent;
		border: 1px solid #<?php echo $border_color; ?>;
		color: #<?php echo $border_color; ?>;
	<?php } ?>
	border-radius: <?php echo $settings->font_size*2 ?>px;
		-moz-border-radius: <?php echo $settings->font_size*2 ?>px;
		-webkit-border-radius: <?php echo $settings->font_size*2 ?>px;
	font-size: <?php echo $settings->font_size; ?>px;
	line-height: 1;
	padding: 0.75em 1.5em;
	text-transform: uppercase;
}

.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button *,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:visited * {
	<?php if ($settings->style == 'solid') { ?>
		color: #<?php echo $text_color; ?>
	<?php } else { ?>
		color: #<?php echo $border_color; ?>
	<?php } ?>
}

.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus {
	<?php if ($settings->style == 'solid') { ?>
		background-color: #<?php echo $bg_hover_color; ?>;
	<?php } else { ?>
		background-color: #<?php echo $bg_color; ?>;
	<?php } ?>
}

.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:hover *,
.fl-builder-content .fl-node-<?php echo $id; ?> a.fl-button:focus * {
	<?php if ($settings->style == 'solid') { ?>
		color: #<?php echo $text_hover_color; ?>;
	<?php } else { ?>
		color: #<?php echo $text_color; ?>;
	<?php } ?>
}

.fl-builder-content .fl-node-<?php echo $id; ?> .fl-button,
.fl-builder-content .fl-node-<?php echo $id; ?> .fl-button * {
	transition: all 0.2s linear !important;
    -moz-transition: all 0.2s linear !important;
    -webkit-transition: all 0.2s linear !important;
    -o-transition: all 0.2s linear !important;
}

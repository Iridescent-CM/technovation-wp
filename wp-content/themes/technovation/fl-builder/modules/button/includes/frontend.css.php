<?php
	$text_color = 'ffffff';
	$text_hover_color = 'ffffff';

	switch ($settings->btn_color) {
		case 'thblue':
			$bg_color = '0076cf';
			$bg_hover_color = '005da5';
			break;
		case 'green':
			$bg_color = '43b02a';
			$bg_hover_color = '358c21';
			break;
		case 'magenta':
			$bg_color = 'ec0089';
			$bg_hover_color = 'bc006e';
			break;
		case 'brblue':
			$bg_color = '5be2e7';
			$bg_hover_color = '48b4b8';
			break;
		case 'gold':
			$bg_color = 'ffb81c';
			$bg_hover_color = 'cc9216';
			$text_color = '041e42';
			$text_hover_color = '031834';
			break;
		case 'ltgray':
			$bg_color = 'cccccc';
			$bg_hover_color = '878787';
			$text_color = '041e42';
			$text_hover_color = '031834';
			break;
		case 'dkblue':
			$bg_color = '041e42';
			$bg_hover_color = '364b67';
			break;
		case 'grwhite':
			$bg_color = 'ffffff';
			$bg_hover_color = 'ebebeb';
			$text_color = '43b02a';
			$text_hover_color = '358c21';
			break;
		case 'thblwhite':
			$bg_color = 'ffffff';
			$bg_hover_color = 'ebebeb';
			$text_color = '0076cf';
			$text_hover_color = '005da5';
			break;
		case 'dkblwhite':
			$bg_color = 'ffffff';
			$bg_hover_color = 'ebebeb';
			$text_color = '041e42';
			$text_hover_color = '031834';
			break;
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

	font-size: <?php echo $settings->font_size; ?>px;
	line-height: 1;
	padding: 0.75em 1.5em;
	text-transform: none;
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

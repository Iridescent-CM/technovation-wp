<?php
	$start_month = intval($settings->start_month);
	$end_month = intval($settings->end_month);
	$total_months;

	if ( $end_month > $start_month ) {
		$total_months = $end_month - $start_month + 1;
	} else {
		$total_months = ($end_month + 12) - $start_month + 1;
	}

	$month_width = 100 / ( $total_months );


	switch ($settings->color_scheme) {
		case 'thblue':
		$timeline_color = '#ec0089';
		$text_color = '#ffffff';
		$highlight_color = '#ffb81c';
		$zebra_odd = '#0076cf';
		$zebra_even = '#005da5';
		break;
	case 'green':
		$timeline_color = '#ec0089';
		$text_color = '#ffffff';
		$highlight_color = '#ffb81c';
		$zebra_odd = '#43b02a';
		$zebra_even = '#358c21';
		break;
	case 'magenta':
		$timeline_color = '#0076cf';
		$text_color = '#ffffff';
		$highlight_color = '#ffb81c';
		$zebra_odd = '#ec0089';
		$zebra_even = '#bc006e';
		break;
	case 'gold':
		$timeline_color = '#6e466b';
		$text_color = '#041e42';
		$highlight_color = '#0076cf';
		$zebra_odd = '#ffb81c';
		$zebra_even = '#cc9216';
		break;
	case 'ltgray':
		$timeline_color = '#7d324d';
		$text_color = '#041e42';
		$highlight_color = '#ffb81c';
		$zebra_odd = '#ebebeb';
		$zebra_even = '#d2d2d2';
		break;
	case 'dkblue':
		$timeline_color = 'ffb81c';
		$text_color = '#ffffff';
		$highlight_color = '#0076cf';
		$zebra_odd = '#041e42';
		$zebra_even = '#364b67';
		break;
	case 'black':
		$timeline_color = '28a880';
		$text_color = '#ffffff';
		$highlight_color = '#ffb81c';
		$zebra_odd = '#444444';
		$zebra_even = '#333333';
		break;
	case 'white':
		$timeline_color = '28a880';
		$text_color = '#041e42';
		$highlight_color = '#0076cf';
		$zebra_odd = '#ebebeb';
		$zebra_even = '#f4f4f4';
		break;
	}
?>

.fl-node-<?php echo $id; ?> .months .bumper,
.fl-node-<?php echo $id; ?> .month {
	border-color: <?php echo $timeline_color; ?>;
}

.fl-node-<?php echo $id; ?> .months .bumper::after {
	border-color: <?php echo $timeline_color; ?>;
}

.fl-node-<?php echo $id; ?> .section {
	background-color: <?php echo $zebra_odd; ?>;
}

.fl-node-<?php echo $id; ?> .section:nth-child(even) {
	background-color: <?php echo $zebra_even; ?>;
}

.fl-node-<?php echo $id; ?> .final-event {
	color: <?php echo $highlight_color; ?>;
}

.fl-node-<?php echo $id; ?> .final-event::before {
	border-color: <?php echo $highlight_color; ?>;
}

.fl-node-<?php echo $id; ?> .timeline {
	color: <?php echo $text_color; ?>;
}

@media (min-width:800px) {
	.fl-node-<?php echo $id; ?> .months .bumper,
	.fl-node-<?php echo $id; ?> .sections .bumper {
		width: 0;
	}

	.fl-node-<?php echo $id; ?> .month {
		width: <?php echo $month_width; ?>%;
	}

	<?php for ( $i = 1; $i < 13; $i++ ) : ?>
		.fl-node-<?php echo $id; ?> .section.span-<?php echo $i; ?> {
			line-height: normal;
			width: <?php echo $i * $month_width; ?>%;
		}
	<?php endfor; ?>
}
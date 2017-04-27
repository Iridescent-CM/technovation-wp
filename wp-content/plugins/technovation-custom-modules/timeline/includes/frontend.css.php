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
	case 'green':
		$timeline_color = '#895e85';
		$text_color = '#ffffff';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#59bf93';
		$zebra_even = '#42a87d';
		break;
	case 'red':
		$timeline_color = '#28a880';
		$text_color = '#ffffff';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#903d53';
		$zebra_even = '#802f49';
		break;
	case 'purple':
		$timeline_color = '#28a880';
		$text_color = '#ffffff';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#895e85';
		$zebra_even = '#764c73';
		break;
	case 'blue':
		$timeline_color = '#7d324d';
		$text_color = '#ffffff';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#4cc1c6';
		$zebra_even = '#39a9ae';
		break;
	case 'yellow':
		$timeline_color = '#6e466b';
		$text_color = '#444444';
		$highlight_color = '#01aaac';
		$zebra_odd = '#ffffff';
		$zebra_even = '#f0f0c7';
		break;
	case 'ltgray':
		$timeline_color = '#7d324d';
		$text_color = '#444444';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#ebebeb';
		$zebra_even = '#d2d2d2';
		break;
	case 'dkgray':
		$timeline_color = 'e9e46f';
		$text_color = '#ffffff';
		$highlight_color = '#01aaac';
		$zebra_odd = '#666666';
		$zebra_even = '#585858';
		break;
	case 'black':
		$timeline_color = '28a880';
		$text_color = '#ffffff';
		$highlight_color = '#e9e46f';
		$zebra_odd = '#444444';
		$zebra_even = '#333333';
		break;
	case 'white':
		$timeline_color = '28a880';
		$text_color = '#444444';
		$highlight_color = '#01aaac';
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
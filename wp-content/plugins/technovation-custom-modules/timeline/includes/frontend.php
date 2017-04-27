<?php
	$start_month = intval($settings->start_month);
	$end_month = intval($settings->end_month);
	$total_months;
	$months = array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

	if ( $end_month > $start_month ) {
		$total_months = $end_month - $start_month + 1;
	} else {
		$total_months = ($end_month + 12) - $start_month + 1;
	}
?>

<div class="timeline">
	<div class="months">
		<div class="bumper"></div>
		<?php for( $i = 0; $i < $total_months; $i++ ) : ?>
			<?php
				$current_month = $i + $start_month;
				if( $current_month > 12) {
					$current_month = $current_month - 12;
				}
			?>
			<div class="month"><?php echo $months[$current_month]; ?></div>
		<?php endfor; ?>
		<div class="bumper"></div>
	</div>
	<div class="sections">
		<div class="bumper"></div>
		<?php for( $i = 0; $i < count( $settings->sections ); $i++ ) : ?>
			<?php
				$section_start = intval($settings->sections[ $i ]->start_month);
				$section_end = intval($settings->sections[ $i ]->end_month);
				$section_length;

				if( $section_end > $section_start ) {
					$section_length = $section_end - $section_start + 1;
				} else {
					$section_length = ($section_end + 12) - $section_start + 1;
				}
			?>
			<div class="section span-<?php echo $section_length; ?>"><?php echo $settings->sections[ $i ]->section_title; ?></div>
		<?php endfor; ?>
		<div class="bumper">
			<div class="final-event"><?php echo $settings->end_event; ?></div>
		</div>
	</div>
</div>
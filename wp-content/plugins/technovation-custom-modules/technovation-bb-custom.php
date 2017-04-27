<?php

function technovation_load_custom_bb_extensions() {
	if ( class_exists( 'FLBuilder' ) ) {
		add_filter( 'fl_builder_register_settings_form', 'technovation_extend_row_settings', 10, 2);
		add_filter('fl_builder_render_css', 'technovation_add_row_css', 10, 3);
	}
}
add_action( 'after_setup_theme', 'technovation_load_custom_bb_extensions' );

function technovation_extend_row_settings( $form, $id ) {
	if ( $id == 'row' ) {
		$row_form = array(
			'tabs' => array(
				'style' => array(
					'sections' => array(
						'background' => array(
							'fields'  => array(
								'bg_type'  => array(
									'options' => array(
										'diagonal'   => __('Diagonal', 'technovation')
									),
									'toggle'	=> array(
										'diagonal'	=> array(
											'sections'	=> array( 'bg_colors' )
										)
									)
								)
							)
						),
						'bg_colors'	=> array(
							'title'	=> __('Background Colors', 'fl-builder'),
							'fields'	=> array(
								'diagonal_color_1' => array(
									'type'	=> 'color',
									'label'	=> __('Color 1', 'fl-builder'),
									'show_reset'	=> true,
									'preview'	=> array(
										'type' => 'none'
									)
								),
								'diagonal_color_2' => array(
									'type'	=> 'color',
									'label'	=> __('Color 2', 'fl-builder'),
									'show_reset'	=> true,
									'preview'	=> array(
										'type' => 'none'
									)
								)
							)
						)
					)
				)
			)
		);

		$form = array_merge_recursive($form, $row_form);
	}
	return $form;
}

function technovation_add_row_css( $css, $nodes, $global_settings) {
	$rows = $nodes['rows'];
	foreach($rows as $id=>$row) {
		if($row->settings->bg_type == 'diagonal') :
			$css .= '
				.fl-node-'. $row->node .' .fl-row-content-wrap {
					background: #' . $row->settings->diagonal_color_1 . ';
					background: -moz-linear-gradient(45deg,  #' . $row->settings->diagonal_color_1 . ' 50%, #' . $row->settings->diagonal_color_2 . ' 50%);
					background: -webkit-linear-gradient(45deg,  #' . $row->settings->diagonal_color_1 . ' 50%,#' . $row->settings->diagonal_color_2 . ' 50%);
					background: linear-gradient(45deg,  #' . $row->settings->diagonal_color_1 . ' 50%,#' . $row->settings->diagonal_color_2 .' 50%);
				}';
		endif;
	}

	return $css;
}
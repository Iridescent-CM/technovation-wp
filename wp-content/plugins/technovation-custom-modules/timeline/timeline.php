<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationTimeline
 */
class TechnovationTimeline extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Timeline', 'fl-builder'),
			'description'	=> __('A timeline for displaying events that span blocks of time.', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'timeline/',
			'url'					=> TECHNOVATION_MODULES_URL . 'timeline/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationTimeline', array(
	'general'		=> array(
		'title'			=> __('General', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
					'start_month'	=> array(
						'type'			=> 'select',
						'label'			=> __('Start Month', 'technovation'),
						'default'		=> '08',
						'options'		=> array(
							'01'				=> 'January',
							'02'				=> 'February',
							'03'				=> 'March',
							'04'				=> 'April',
							'05'				=> 'May',
							'06'				=> 'June',
							'07'				=> 'July',
							'08'				=> 'August',
							'09'				=> 'September',
							'10'				=> 'October',
							'11'				=> 'November',
							'12'				=> 'December',
						)
					),
					'end_month'	=> array(
						'type'			=> 'select',
						'label'			=> __('End Month', 'technovation'),
						'default'		=> '07',
						'options'		=> array(
							'01'				=> 'January',
							'02'				=> 'February',
							'03'				=> 'March',
							'04'				=> 'April',
							'05'				=> 'May',
							'06'				=> 'June',
							'07'				=> 'July',
							'08'				=> 'August',
							'09'				=> 'September',
							'10'				=> 'October',
							'11'				=> 'November',
							'12'				=> 'December',
						)
					),
					'end_event'	=> array(
						'type'			=> 'text',
						'label'			=> __('End Event Name', 'technovation'),
					)
				)
			),
			'spans'					=> array(
				'title'					=> __('Sections', 'fl-builder'),
				'fields'				=> array(
					'sections' 			=> array(
						'type' 					=> 'form',
						'label'					=> __('Sections', 'fl-builder'),
						'form'					=> 'sections_form',
						'preview_text'	=> 'section_title',
						'multiple'			=> true
					)
				)
			)
		)
	),
	'style'	=> array(
		'title'	=> __('Style', 'fl-builder'),
		'sections'	=> array(
			'style'	=> array(
				'title'			=> __('', 'technovation'),
				'fields'		=> array(
					'color_scheme'	=> array(
						'type'			=> 'select',
						'label'			=> 'Color Scheme',
						'default'		=> 'purple',
						'options'		=> array(
							'thblue'		=> __('Theme Blue', 'technovation'),
							'green'			=> __('Green', 'technovation'),
							'magenta'		=> __('Magenta', 'technovation'),
							'gold'			=> __('Gold', 'technovation'),
							'ltgray'	  => __('Light Gray', 'technovation'),
							'dkblue'		=> __('Dark Blue', 'technovation'),
							'white'			=> __('White', 'technovation'),
							'black'			=> __('Black', 'technovation')
						)
					)
				)
			)
		)
	)
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('sections_form', array(
	'title'=> __('Add Section', 'fl-builder'),
	'tabs'	=> array(
		'general'			=> array(
			'title'				=> __('General', 'fl-builder'),
			'sections'			=> array(
				'general'			=> array(
					'title'				=> '',
					'fields'				=> array(
						'section_title'	=> array(
							'type'					=> 'text',
							'label'				=> __('Section Title', 'fl-builder')
						),
						'start_month'	=> array(
							'type'			=> 'select',
							'label'			=> __('Start Month', 'technovation'),
							'default'		=> '01',
							'options'		=> array(
								'01'				=> 'January',
								'02'				=> 'February',
								'03'				=> 'March',
								'04'				=> 'April',
								'05'				=> 'May',
								'06'				=> 'June',
								'07'				=> 'July',
								'08'				=> 'August',
								'09'				=> 'September',
								'10'				=> 'October',
								'11'				=> 'November',
								'12'				=> 'December',
							)
						),
						'end_month'	=> array(
							'type'			=> 'select',
							'label'			=> __('End Month', 'technovation'),
							'default'		=> '01',
							'options'		=> array(
								'01'				=> 'January',
								'02'				=> 'February',
								'03'				=> 'March',
								'04'				=> 'April',
								'05'				=> 'May',
								'06'				=> 'June',
								'07'				=> 'July',
								'08'				=> 'August',
								'09'				=> 'September',
								'10'				=> 'October',
								'11'				=> 'November',
								'12'				=> 'December',
							)
						),
					)
				)
			)
		)
	)
));
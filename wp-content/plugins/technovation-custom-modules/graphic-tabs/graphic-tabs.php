<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationGraphicTabs
 */
class TechnovationGraphicTabs extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Graphic Tabs', 'fl-builder'),
			'description'	=> __('Large graphic tabs toggle display of more information.', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'graphic-tabs/',
			'url'					=> TECHNOVATION_MODULES_URL . 'graphic-tabs/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationGraphicTabs', array(
	'tabs'					=> array(
		'title'					=> __('Tabs', 'fl-builder'),
		'sections'			=> array(
			'general'				=> array(
				'title'					=> '',
				'fields'				=> array(
					'tabs'					=> array(
						'type'					=> 'form',
						'label'					=> __('Tab', 'technovation'),
						'form'					=> 'tab_items_form',
						'preview_text'	=> 'label',
						'multiple'			=> true
					)
				)
			)
		)
	)
));

/**
 * Register a settings form for the individual tabs
 */
FLBuilder::register_settings_form('tab_items_form', array(
	'title' => __('Add Marker', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Tab', 'fl-builder'),
			'sections'      => array(
				'general'       => array(
					'title'         => '',
					'fields'        => array(
						'label'         => array(
							'type'          => 'text',
							'label'         => __('Tab name', 'fl-builder')
						),
						'tab_photo'			=> array(
							'type'					=> 'photo',
							'label'					=> __('Tab Image', 'fl-builder')
						),
						'tab_color'			=> array(
							'type'					=> 'select',
							'label'					=> __('Tab Color', 'fl-builder'),
							'default'				=> 'green',
							'options'				=> array(
								'thblue'				=> __('Theme Blue', 'technovation'),
								'green'					=> __('Green', 'technovation'),
								'magenta'				=> __('Magenta', 'technovation'),
								'brblue'				=> __('Bright Blue', 'technovation'),
								'gold'					=> __('Gold', 'technovation'),
								'ltgray'				=> __('Light Gray', 'technovation'),
								'dkblue'				=> __('Dark Blue', 'technovation'),
								'white'					=> __('White', 'technovation'),
								'black'					=> __('Black', 'technovation')
							)
						)
					)
				)
			)
		),
		'tab_content'			=> array(
			'title'						=> __('Tab Content', 'technovation'),
			'sections'				=> array(
				'general'					=> array(
					'title'						=> __('Image Box', 'technovation'),
					'fields'						=> array(
						'image_box'					=> array(
							'type'							=> 'photo',
							'label'							=> 'Image Box Image'
						),
						'image_box_content'	=> array(
							'type'							=> 'editor',
							'label'							=> '',
							'media_buttons'			=> false,
							'rows'							=> 10
						)
					)
				),
				'text_area'				=> array(
					'title'						=> __('Text Area', 'technovation'),
					'fields'					=> array(
						'tab_header'			=> array(
							'type'						=> 'text',
							'label'						=> __('Text Area Header', 'technovation')
						),
						'tab_text'				=> array(
							'type'						=> 'editor',
							'label'						=> '',
							'media_buttons'		=> true,
							'rows'						=> 15
						)
					)
				),
				'highlight_area'	=> array(
					'title'						=> __('Highlight Area', 'technovation'),
					'fields'					=> array(
						'highlight_img'		=> array(
							'type'						=> 'photo',
							'label'						=> __('Highlight Image', 'technovation')
						),
						'highlight_text'	=> array(
							'type'						=> 'editor',
							'label'						=> '',
							'media_buttons'		=> false,
							'rows'						=> 10
						)
					)
				)
			)
		)
	)
));
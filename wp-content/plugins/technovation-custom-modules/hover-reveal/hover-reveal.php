<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationHoverRevealModule
 */
class TechnovationHoverRevealModule extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Hover Reveal', 'fl-builder'),
			'description'	=> __('A module that reveals more information on hover or tap.', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'hover-reveal/',
			'url'					=> TECHNOVATION_MODULES_URL . 'hover-reveal/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationHoverRevealModule', array(
	'items'				=> array(
		'title'				=> __('Items', 'fl-builder'),
		'sections'			=> array(
			'general'			=> array(
				'title'				=> '',
				'fields'				=> array(
					'items'				=> array(
						'type'					=> 'form',
						'label'				=> __('Item', 'fl-builder'),
						'form'					=> 'items_form', // ID from registered form below
						'preview_text'	=> 'label', // Name of a field to use for the preview text
						'multiple'			=> true
					),
				)
			)
		)
	),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('items_form', array(
	'title'=> __('Add Item', 'fl-builder'),
	'tabs'	=> array(
		'general'			=> array(
			'title'				=> __('General', 'fl-builder'),
			'sections'			=> array(
				'general'			=> array(
					'title'				=> '',
					'fields'				=> array(
						'label'				=> array(
							'type'					=> 'text',
							'label'				=> __('Heading', 'fl-builder')
						),
						'h_level'			=> array(
							'type'				=> 'select',
							'label'				=> __('Heading Level', 'fl-builder'),
							'default'			=> 'h2',
							'options'			=> array(
								'h1'					=> 'h1',
								'h2'					=> 'h2',
								'h3'					=> 'h3',
								'h4'					=> 'h4',
								'h5'					=> 'h5',
								'h6'					=> 'h6',
							),
						),
					)
				),
				'content'			=> array(
					'title'				=> __('Content', 'fl-builder'),
					'fields'				=> array(
						'content'			=> array(
							'type'					=> 'editor',
							'label'				=> '',
							'wpautop'		=> false
						)
					)
				)
			)
		)
	)
));
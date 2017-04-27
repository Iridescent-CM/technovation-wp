<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationTOCModule
 */
class TechnovationTOCModule extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Table of Contents', 'fl-builder'),
			'description'	=> __('Create a sticky table of contents for the current page', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'toc/',
			'url'					=> TECHNOVATION_MODULES_URL . 'toc/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationTOCModule', array(
	'general'		=> array(
		'title'			=> __('General', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
					'nav_item'	=> array(
						'type'					=> 'form',
						'label'					=> __('Navigation Items', 'technovation'),
						'form'					=> 'nav_form',
						'preview_text'	=> 'name',
						'multiple'			=> true
					)
				)
			)
		)
	)
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('nav_form', array(
	'title'=> __('Add Navigation Item', 'fl-builder'),
	'tabs'	=> array(
		'general'			=> array(
			'title'				=> __('General', 'fl-builder'),
			'sections'			=> array(
				'general'			=> array(
					'title'				=> '',
					'fields'				=> array(
						'nav_id'				=> array(
							'type'					=> 'text',
							'label'					=> __('ID', 'technovation'),
							'help'					=> 'The ID of the item on the page you want to link to'
						),
						'name'					=> array(
							'type'					=> 'text',
							'label'					=> __('Link Text', 'technovation')
						)
					)
				)
			)
		)
	)
));
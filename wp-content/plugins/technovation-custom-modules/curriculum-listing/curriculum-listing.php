<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationCurriculumListing
 */
class TechnovationCurriculumListing extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Curriculum Listing', 'fl-builder'),
			'description'	=> __('A listing of curriculum modules', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'curriculum-listing/',
			'url'					=> TECHNOVATION_MODULES_URL . 'curriculum-listing/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationCurriculumListing', array(
	'general'		=> array(
		'title'			=> __('General', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
					'linktomodules'	=> array(
						'type'			=> 'select',
						'label'			=> 'Include links to modules?',
						'default'		=> 'no',
						'options'		=> array(
							'no' 				=> __('No', 'technovation'),
							'yes' 			=> __('Yes', 'technovation')
						)
					),
					'items'			=> array(
						'type'			=> 'form',
						'label'			=> __('Item', 'fl-builder'),
						'form'			=> 'curriculum-form',
						'preview_text'	=> 'name',
						'multiple'	=> true
					)
				)
			)
		)
	)
));

/**
 * Register a settings form to use for the individual curriclum plans
 */
FLBuilder::register_settings_form('curriculum-form', array(
	'title'	=> __('Add Section', 'fl-builder'),
	'tabs'		=> array(
		'general'	=> array(
			'title'		=> __('General', 'fl-builder'),
			'sections'	=> array(
				'general'		=> array(
					'title'			=> '',
					'fields'		=> array(
						'name'			=> array(
							'type'			=> 'text',
							'label'			=> __('Name', 'technovation')
						),
						'photo'			=> array(
							'type'			=> 'photo',
							'label'			=> __('Photo', 'technovation')
						),
						'description'	=> array(
								'type'			=> 'textarea',
								'label'			=> __('Description', 'fl-builder'),
								'rows'			=> '3'
						),
						'modules'			=> array(
								'type'			=> 'suggest',
								'label'			=> __('Modules', 'technovation'),
								'action'		=> 'fl_as_posts',
								'data'			=> 'curriculum'
						),
					)
				)
			)
		)
	)
));
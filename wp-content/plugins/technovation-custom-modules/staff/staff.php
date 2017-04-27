<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationStaffModule
 */
class TechnovationStaffModule extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Staff', 'fl-builder'),
			'description'	=> __('Show a gallery of staff members', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'staff/',
			'url'					=> TECHNOVATION_MODULES_URL . 'staff/',
		));

		$this->add_css('jquery-magnificpopup');
		$this->add_js('jquery-magnificpopup');
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationStaffModule', array(
	'general'		=> array(
		'title'			=> __('General', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
					'staff_member'	=> array(
						'type'					=> 'form',
						'label'					=> __('Staff', 'technovation'),
						'form'					=> 'staff_form',
						'preview_text'	=> 'name',
						'multiple'			=> true
					)
				)
			)
		)
	),
	'style'	=> array(
		'title'	=> __('Style', 'fl-builder'),
		'sections'	=> array(
			'gallery_style'	=> array(
				'title'			=> '',
				'fields'		=> array(
					'layout'		=> array(
						'type'			=> 'select',
						'label'			=> __('Layout', 'technovation'),
						'default'		=> 'polaroid',
						'options'		=> array(
							'polaroid'	=> __('Polaroid', 'technovation')
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
FLBuilder::register_settings_form('staff_form', array(
	'title'=> __('Add Staff', 'fl-builder'),
	'tabs'	=> array(
		'general'			=> array(
			'title'				=> __('General', 'fl-builder'),
			'sections'			=> array(
				'general'			=> array(
					'title'				=> '',
					'fields'				=> array(
						'name'					=> array(
							'type'					=> 'text',
							'label'					=> __('Name', 'technovation')
						),
						'title'					=> array(
							'type'					=> 'text',
							'label'					=> __('Title', 'technovation')
						),
						'photo'					=> array(
							'type'					=> 'photo',
							'label'					=> __('Photo', 'technovation'),
							'show_remove'		=> true
						)
					)
				),
				'bio'						=> array(
					'title'					=> __('Bio', 'technovation'),
					'fields'				=> array(
						'bio'						=> array(
							'type'					=> 'editor',
							'label'					=> '',
							'media_buttons'	=> false
						)
					)
				)
			)
		)
	)
));
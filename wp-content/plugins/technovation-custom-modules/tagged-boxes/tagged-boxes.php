<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationTaggedBoxModule
 */
class TechnovationTaggedBoxModule extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Tagged Box', 'fl-builder'),
			'description'	=> __('A box with a tag.', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'tagged-boxes/',
			'url'					=> TECHNOVATION_MODULES_URL . 'tagged-boxes/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationTaggedBoxModule', array(
	'general'		=> array(
		'title'			=> __('General', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
					'tag_text'	=> array(
						'type'			=> 'text',
						'label'			=> __('Tag Text', 'technovation'),
						'default'		=> '',
						'preview'		=> array(
							'type'			=> 'none'
						)
					),
					'content'	=> array(
						'type'			=> 'editor',
						'wpautop'		=> true
					)
				)
			)
		)
	),
	'style'	=> array(
		'title'	=> __('Style', 'fl-builder'),
		'sections'	=> array(
			'tag_style'	=> array(
				'title'			=> __('Tag Style', 'technovation'),
				'fields'		=> array(
					'tag_bg'		=> array(
						'type'			=> 'color',
						'label'			=> __('Tag Background Color', 'technovation'),
						'default'		=> '',
						'show_reset'	=> true
					),
					'tag_text_color'	=> array(
						'type'			=> 'color',
						'label'			=> __('Tag Text Color', 'technovation'),
						'default'		=> '',
						'show_reset'	=> true
					)
				)
			),
			'box_style'	=> array(
				'title'			=> __('Box Style', 'technovation'),
				'fields'		=> array(
					'box_bg'	=> array(
						'type'			=> 'color',
						'label'			=> __('Box Background Color', 'technovation'),
						'default'		=> '',
						'show_reset'	=> true
					),
					'box_text_color'	=> array(
						'type'			=> 'color',
						'label'			=> __('Box Text Color', 'technovation'),
						'default'		=> '',
						'show_reset'	=> true
					)
				)
			)
		)
	)
));
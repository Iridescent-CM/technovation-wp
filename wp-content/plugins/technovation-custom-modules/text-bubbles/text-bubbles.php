<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationTextBubbleModule
 */
class TechnovationTextBubbleModule extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Text Bubble', 'fl-builder'),
			'description'	=> __('A circle with centered text.', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'text-bubbles/',
			'url'					=> TECHNOVATION_MODULES_URL . 'text-bubbles/',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationTextBubbleModule', array(
	'general'		=> array(
		'title'			=> __('Content', 'fl-builder'),
		'sections'	=> array(
			'general'		=> array(
				'title'			=> '',
				'fields'		=> array(
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
			'background'	=> array(
				'title'			=> __('Background', 'technovation'),
				'fields'		=> array(
					'bgcolor'			=> array(
						'type'				=> 'color',
						'label'				=> __('Color', 'fl-builder'),
						'show_reset'	=> true
					),
					'bgopacity'		=> array(
						'type'				=> 'text',
						'label'				=> __('Opacity', 'technovation'),
						'maxlength'		=> '3',
						'size'				=> '4',
						'description'	=> '%',
						'default'			=> 100
					)
				)
			),
			'border'		=> array(
				'title'			=> __('Border', 'technovation'),
				'fields'			=> array(
					'bordercolor'	=> array(
						'type'				=> 'color',
						'label'				=> __('Color', 'fl-builder'),
						'show_reset'	=> true
					),
					'borderwidth'	=> array(
						'type'				=> 'text',
						'label'				=> __('Width', 'fl-builder'),
						'maxlength'		=> '2',
						'size'				=> '3',
						'description'	=> 'px',
						'default'			=> 0
					)
				)
			),
			'layout'	=> array(
				'title'			=> __('Layout', 'technovation'),
				'fields'		=> array(
					'alignment'	=> array(
						'type'			=> 'select',
						'label'			=> __('Alignment', 'technovation'),
						'default'		=> 'center',
						'options'		=> array(
							'left'			=> __('Left', 'fl-builder'),
							'center'		=> __('Center', 'fl-builder'),
							'right'			=> __('Right', 'fl-builder')
						)
					),
					'size'			=> array(
						'type'			=> 'select',
						'label'			=> __('Size', 'technovation'),
						'default'		=> 'medium',
						'options'		=> array(
							'small'			=> __('Small', 'technovation'),
							'medium'		=> __('Medium', 'technovation'),
							'large'			=> __('Large', 'technovation')
						)
					)
				)
			)
		)
	)
));
<?php

/**
 * This creates a simple module with multiple units
 * that reveals more information on hover or tap
 *
 * @class TechnovationImageButtons
 */
class TechnovationImageButtons extends FLBuilderModule {

	/**
	 * Constructor function for the module.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'					=> __('Image Button', 'fl-builder'),
			'description'	=> __('Buttons with text over a background image', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'					=> TECHNOVATION_MODULES_DIR . 'image-buttons/',
			'url'					=> TECHNOVATION_MODULES_URL . 'image-buttons/',
		));
	}

	public function get_classname()
	{
		$classname = 'image-button-wrap';

		if ( ! empty ( $this->settings->align ) ) {
			$classname .= ' image-button-' . $this->settings->align;
		}

		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationImageButtons', array(
	'tabs'					=> array(
		'title'					=> __('General', 'fl-builder'),
		'sections'			=> array(
			'general'				=> array(
				'title'					=> '',
				'fields'				=> array(
					'text'					=> array(
						'type'					=> 'text',
						'label'					=> __('Text', 'fl-builder'),
						'default'				=> __('Click Here', 'fl-builder')
					)
				)
			),
			'link'          => array(
				'title'         => __('Link', 'fl-builder'),
				'fields'        => array(
					'link'          => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com', 'fl-builder' ),
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'link_target'   => array(
						'type'          => 'select',
						'label'         => __('Link Target', 'fl-builder'),
						'default'       => '_self',
						'options'       => array(
							'_self'         => __('Same Window', 'fl-builder'),
							'_blank'        => __('New Window', 'fl-builder')
						),
						'preview'       => array(
							'type'          => 'none'
						)
					)
				)
			)
		)
	),
	'style'         => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'style'         => array(
				'title'         => __('Style', 'fl-builder'),
				'fields'        => array(
					'image'					=> array(
						'type'					=> 'photo',
						'label'					=> __('Background image', 'technovation')
					),
					'btn_color'			=> array(
						'type'					=> 'select',
						'label'					=> __('Color', 'fl-builder'),
						'default'				=> 'green',
						'options'				=> array(
							'green'					=> __('Green', 'fl-builder'),
							'red'						=> __('Red', 'fl-builder'),
							'purple'				=> __('Purple', 'fl-builder'),
							'blue'					=> __('Blue', 'fl-builder'),
							'yellow'				=> __('Yellow', 'fl-builder'),
							'ltgray'				=> __('Light Gray', 'fl-builder'),
							'dkgray'				=> __('Dark Gray', 'fl-builder'),
							'white'					=> __('White', 'fl-builder')
						)
					),
					'is_active'			=> array(
						'type'					=> 'select',
						'label'					=> __('Is this button active?', 'technovation'),
						'default'				=> 'no',
						'options'				=> array(
							'no'						=> __('No', 'technovation'),
							'yes'						=> __('Yes', 'technovation')
						)
					),
					'text_color'		=> array(
						'type'					=> 'color',
						'label'					=> __('Text Color', 'technovation'),
						'default'				=> 'ffffff',
						'show_reset'		=> true
					),
				)
			),
			'formatting'    => array(
				'title'         => __('Layout', 'fl-builder'),
				'fields'        => array(
					'align'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),
					'font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			)
		)
	)));
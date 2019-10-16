<?php

/**
 * @class FLButtonModule
 */
class FLButtonModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Button', 'fl-builder'),
			'description'   	=> __('A simple call to action button.', 'fl-builder'),
			'category'      	=> __('Basic Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method update
	 */
	public function update( $settings )
	{
		// Remove the old three_d setting.
		if ( isset( $settings->three_d ) ) {
			unset( $settings->three_d );
		}

		return $settings;
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'fl-button-wrap';

		if(!empty($this->settings->width)) {
			$classname .= ' fl-button-width-' . $this->settings->width;
		}
		if(!empty($this->settings->align)) {
			$classname .= ' fl-button-' . $this->settings->align;
		}

		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLButtonModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'text'          => array(
						'type'          => 'text',
						'label'         => __('Text', 'fl-builder'),
						'default'       => __('Click Here', 'fl-builder'),
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.fl-button-text'
						)
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
					'btn_color'			=> array(
						'type'					=> 'select',
						'label'					=> __('Color', 'fl-builder'),
						'default'				=> 'green',
						'options'				=> array(
							'thblue'			=> __('Theme Blue', 'fl-builder'),
							'green'				=> __('Green', 'fl-builder'),
							'magenta'			=> __('Magenta', 'fl-builder'),
							'brblue'			=> __('Bright Blue', 'f	l-builder'),
							'ltgray'			=> __('Light Gray', 'fl-builder'),
							'dkblue'			=> __('Dark Blue', 'fl-builder'),
							'gold'				=> __('Gold', 'fl-builder'),
							'white'				=> __('White', 'fl-builder'),
						)
					),
					'style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'solid',
						'options'       => array(
							'solid'         => __('Solid', 'fl-builder'),
							'outline'      	=> __('Outline', 'fl-builder')
						),
					),
				)
			),
			'formatting'    => array(
				'title'         => __('Structure', 'fl-builder'),
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
	)
));
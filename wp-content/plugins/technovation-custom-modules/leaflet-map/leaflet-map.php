<?php

/**
 * @class TechnovationLeafletMap
 */
class TechnovationLeafletMap extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          => __('Leafelet Map', 'fl-builder'),
			'description'   => __('Create a map with markers', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'           => TECHNOVATION_MODULES_DIR . 'leaflet-map/',
			'url'           => TECHNOVATION_MODULES_URL . 'leaflet-map/',
			'editor_export' => true, // Defaults to true and can be omitted.
			'enabled'       => true, // Defaults to true and can be omitted.
		));

		/**
		 * Use these methods to enqueue css and js already
		 * registered or to register and enqueue your own.
		 */
		// Already registered
		$this->add_css('font-awesome');

		// Register and enqueue your own
		$this->add_css('leaflet-style', $this->url . 'css/leaflet.css');
		$this->add_js('leaflet-core', $this->url . 'js/leaflet.js', array(), '', true);
		$this->add_js('leaflet-scroll', $this->url . 'js/Leaflet.Sleep.js', array( 'leaflet-core' ), '', true);
	}

	/**
	 * Use this method to work with settings data before
	 * it is saved. You must return the settings object.
	 *
	 * @method update
	 * @param $settings {object}
	 */
	public function update($settings)
	{
		// $settings->textarea_field .= ' - this text was appended in the update method.';

		return $settings;
	}

	/**
	 * This method will be called by the builder
	 * right before the module is deleted.
	 *
	 * @method delete
	 */
	public function delete()
	{

	}

	/**
	 * Add additional methods to this class for use in the
	 * other module files such as preview.php, frontend.php
	 * and frontend.css.php.
	 *
	 *
	 * @method example_method
	 */
	public function example_method()
	{

	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TechnovationLeafletMap', array(
	'general'       => array( // Tab
		'title'         => __('General', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
			'map_view'       => array(
				'title'					=> __('Map View', 'technovation'),
				'fields'				=> array(
					'latitude'			=> array(
						'type'					=> 'text',
						'label'					=> __('Latitude', 'technovation'),
						'help'					=> 'Latitude of the map center',
						'size'					=> 10
					),
					'longitude'			=> array(
						'type'					=> 'text',
						'label'					=> __('Longitude', 'technovation'),
						'help'					=> 'Longitude of the map center',
						'size'					=> 10
					),
					'zoom_level'		=> array(
						'type'					=> 'select',
						'label'					=> __('Zoom Level'),
						'help'					=> '0 will show the whole world, 13 is village or town, 19 is street-level',
						'default'				=> '2',
						'options'				=> array(
							'0'							=> '0',
							'1'							=> '1',
							'2'							=> '2',
							'3'							=> '3',
							'4'							=> '4',
							'5'							=> '5',
							'6'							=> '6',
							'7'							=> '7',
							'8'							=> '8',
							'9'							=> '9',
							'10'						=> '10',
							'11'						=> '11',
							'12'						=> '12',
							'13'						=> '13',
							'14'						=> '14',
							'15'						=> '15',
							'16'						=> '16',
							'17'						=> '17',
							'18'						=> '18',
							'19'						=> '19'
						)
					)
				)
			),
		)
	),
	'markers'				=> array(
		'title'					=> __('Markers', 'technovation'),
		'sections'			=> array(
			'marker_list'		=> array(
				'title'					=> '',
				'fields'				=> array(
					'markers'					=> array(
						'type'					=> 'form',
						'label'					=> __('Marker', 'technovation'),
						'form'					=> 'marker_items_form',
						'preview_text'	=> 'name',
						'multiple'			=> true
					)
				)
			)
		)
	)
));

/**
 * Register a settings form for the indiviudal markers on the map
 */
FLBuilder::register_settings_form('marker_items_form', array(
	'title' => __('Add Marker', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('General', 'fl-builder'),
			'sections'      => array(
				'general'       => array(
					'title'         => '',
					'fields'        => array(
						'name'         => array(
							'type'          => 'text',
							'label'         => __('Marker name', 'fl-builder')
						),
						'girls'         => array(
							'type'          => 'text',
							'label'         => __('Total Girls', 'fl-builder')
						),
						'marker_lat'   => array(
							'type'          => 'text',
							'label'         => __('Marker latitude', 'fl-builder'),
							'size'					=> 10
						),
						'marker_long'  => array(
							'type'          => 'text',
							'label'         => __('Marker longitude', 'fl-builder'),
							'size'					=> 10
						)
					)
				)
			)
		)
	)
));
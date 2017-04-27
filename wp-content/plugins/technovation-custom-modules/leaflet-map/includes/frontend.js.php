/**
 * You have access to three variables in this file:
 *
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 */
<?php
	if ( empty( $settings->latitude ) ) {
		$settings->latitude = '0';
	}

	if ( empty( $settings->longitude ) ) {
		$settings->longitude = '0';
	}
?>

;(function () {


	var map;
	var ajaxRequest;
	var plotlist;
	var plotlayers=[];
	var markers;

	markers = [
		<?php for ( $i = 0; $i < count( $settings->markers ); $i++ ) : if ( empty( $settings->markers[ $i ] ) ) continue; ?>
		{
			'name': '<?php echo $settings->markers[ $i ]->name; ?>',
			'lat': <?php echo $settings->markers[ $i ]->marker_lat; ?>,
			'lng': <?php echo $settings->markers[ $i ]->marker_long; ?>,
			'content': '<dl><dt><?php echo $settings->markers[ $i ]->name; ?></dt><dd><?php echo $settings->markers[ $i ]->girls; ?></dd></dl>'
		},
		<?php endfor; ?>
		{}
	];

	function initmap() {
		// set up the map
		map = new L.Map('map-<?php echo $id; ?>');

		// create the tile layer with correct attribution
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
		var osm = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 19, attribution: osmAttrib});

		// start the map in South-East England
		map.setView(new L.LatLng(<?php echo $settings->latitude; ?>, <?php echo $settings->longitude; ?>), <?php echo $settings->zoom_level; ?>);
		map.addLayer(osm);

		for ( var i=0; i < markers.length; ++i ) {
			if (markers[i].lat && markers[i].lng) {
				L.marker( [markers[i].lat, markers[i].lng] )
				.bindPopup(markers[i].content)
				.addTo( map );
			}
		}

	}

	initmap();

}());
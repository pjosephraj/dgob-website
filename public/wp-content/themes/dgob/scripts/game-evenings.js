/* globals GMaps: false, MarkerClusterer: false */
$(function () {

	'use strict';

	var map = new GMaps({
		el: '#game-evenings-map',
		lng: 10.4515260,
		lat: 51.1656910,
		zoom: 6,
		markerClusterer: function (map) {
			return new MarkerClusterer(map, [], {
				gridSize: 50
			});
		}
	});

	$('.game-evening-item').each(function () {
		var lat = parseFloat($(this).data('latitude')),
			lng = parseFloat($(this).data('longitude'));
		if (lat !== 0 && lng !== 0) {
			map.addMarker({
				lat: lat,
				lng: lng,
				infoWindow: {
					content: $(this).html()
				}
			});
		}
	});

});
/* globals google: false, GMaps: false, MarkerClusterer: false */

/**
 * Markers used: https://dribbble.com/shots/973117-Map-Markers-PSD
 */
$(function () {

	'use strict';

	var selector = '#game-evenings-map',
		map;

	// Stop here if map container is not present on this page
	if ($(selector).length < 1) {
		return;
	}

	map = new GMaps({
		el: selector,
		lng: 10.4515260,
		lat: 51.1656910,
		zoom: 6,
		markerClusterer: function (map) {
			return new MarkerClusterer(map, [], {
				gridSize: 50,
				styles: [
					{
						url: '/wp-content/themes/dgob/images/markers/cluster.png',
						width: 53,
						height: 53,
						textColor: 'white',
						textSize: 13
					}
				]
			});
		}
	});

	/**
	 * Map style
	 *
	 * In use: https://snazzymaps.com/style/12902/seven-hills
	 * Alternative: https://snazzymaps.com/style/132/light-gray
	 */
	map.map.set('styles', [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ccdde8"},{"visibility":"on"}]}]);

	map.map.setOptions({minZoom: 6, maxZoom: 17});

	map.map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
		$(
			'<div class="map-legend well">' +
			'	<p><img src="/wp-content/themes/dgob/images/markers/public.png"> Öffentlich</p>' +
			'	<p><img src="/wp-content/themes/dgob/images/markers/private.png"> Privat</p>' +
			'</div>'
		).get(0)
	);

	$('.game-evening-item').each(function () {
		var $item = $(this),
			lat = parseFloat($item.data('latitude')),
			lng = parseFloat($item.data('longitude')),
			type = $item.data('type');
		if (lat !== 0 && lng !== 0) {
			map.addMarker({
				lat: lat,
				lng: lng,
				icon: '/wp-content/themes/dgob/images/markers/' + type + '.png',
				infoWindow: {
					content: $item.html()
				}
			});
		}
	});

});
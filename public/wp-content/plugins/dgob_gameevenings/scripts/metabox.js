(function ($) {

	'use strict';

	var map;

	$(function () {
		map = new GMaps({
			el: '#metabox-map',
			lng: 10.4515260,
			lat: 51.1656910,
			zoom: 4,
			panControl: false,
			mapTypeControl: false,
			streetViewControl: false,
			overviewMapControl: false,
			scaleControl: false
		});

		var coords = getCoordsFromInput();
		if (coords.lat !== 0 && coords.lng !== 0) {
			map.addMarker(coords);
			map.setCenter(coords.lat, coords.lng);
		}

		registerUpdateHandlers();

	});

	function getCoordsFromInput() {
		return {
			lat: parseFloat($('#game-evening-latitude').val()) || 0,
			lng: parseFloat($('#game-evening-longitude').val()) || 0
		};
	}

	function registerUpdateHandlers() {
		$('.game-evening-address').on('keypress', debounce(geocodingRequest, 1000));
	}

	function geocodingRequest() {
		GMaps.geocode({
			address: getAddressFromInput(),
			callback: geocodingResponse
		});
	}

	function getAddressFromInput() {
		return [
			$('#game-evening-street').val(),
			$('#game-evening-zip').val(),
			$('#game-evening-city').val()
		].join(' ');
	}

	function geocodingResponse(results, status) {
		if (status === 'OK') {
			var latlng = results[0].geometry.location;
			map.removeMarkers();
			map.setZoom(15);
			map.setCenter(latlng.lat(), latlng.lng());
			map.addMarker({
				lat: latlng.lat(),
				lng: latlng.lng()
			});
			updateFormCoordinates(latlng.lat(), latlng.lng());
		}
	}

	function updateFormCoordinates(lat, lng) {
		$('#game-evening-latitude').val(lat);
		$('#game-evening-longitude').val(lng);
	}

	/**
	 * @author Remy Sharp
	 * @license MIT
	 * @see https://remysharp.com/2010/07/21/throttling-function-calls
	 */
	function debounce(fn, delay) {
		var timer = null;
		return function () {
			var context = this, args = arguments;
			clearTimeout(timer);
			timer = setTimeout(function () {
				fn.apply(context, args);
			}, delay);
		};
	}

}(jQuery));
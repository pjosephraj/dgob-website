$(function () {

	/**
	 * Image lightbox
	 */
	$('a[href$=".jpg"],a[href$=".png"]').magnificPopup({
		type: 'image'
	});

	/**
	 * Inline lightbox
	 */
	$('.lightbox-inline').magnificPopup({
		type: 'inline',
		callbacks: {
			open: function () {
				redrawWgoPlayerInLightbox(this);
			}
		}
	});

	/**
	 * Wgo Player can't set the correct dimensions when it initializes in hidden state.
	 * So we need to redraw the player by calling updateDimensions().
	 */
	function redrawWgoPlayerInLightbox(lightbox) {
		lightbox.content.find('.wgo-player-main').each(function () {
			$(this).get(0)._wgo_player.updateDimensions();
		});
	}

});
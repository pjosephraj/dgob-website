<?php

add_shortcode( 'info-icon', function ( $atts ) {
	$atts = shortcode_atts( array(
		'icon' => 'star',
	), $atts );

	return sprintf( '<div class="info-topic-icon"><span class="glyphicon glyphicon-%s" aria-hidden="true"></span></div>', $atts['icon'] );
} );
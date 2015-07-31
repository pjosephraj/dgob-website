<?php

add_shortcode( 'popup', function ( $atts, $content ) {
	$atts = shortcode_atts( array(
		'link' => 'Popup öffnen',
		'class' => '',
		'inline' => '0',
	), $atts );
	$popup_id = uniqid();
	$content = do_shortcode( $content );
	$out = sprintf( '<a href="#%s" class="lightbox-inline %s">%s</a>', $popup_id, esc_attr( $atts['class'] ), esc_html( $atts['link'] ) );
	if ( (int) $atts['inline'] < 1 ) {
		$out = sprintf( '<p>%s</p>', $out );
	}
	$out .= sprintf( '<div id="%s" class="mfp-hide"><div class="container-fluid lightbox-inline-wrapper">%s</div></div>', $popup_id, $content );
	return $out;
} );

<?php

namespace Dgob;

class DeferredContent {

	protected static $content;

	public static function defer( $content ) {
		self::$content .= $content;
	}

	public static function get() {
		return self::$content;
	}

}

add_shortcode( 'popup', function ( $atts, $content ) {
	$atts = shortcode_atts( array(
		'link' => 'Popup öffnen',
		'class' => '',
	), $atts );
	$popup_id = uniqid();
	$content = do_shortcode( $content );
	$out = sprintf( '<a href="#%s" class="lightbox-inline %s">%s</a>', $popup_id, esc_attr( $atts['class'] ), esc_html( $atts['link'] ) );
	$double_nl = "\n\n"; // Those are required for wpautop to work correctly
	$deferred = sprintf( '<div id="%s" class="mfp-hide"><div class="container-fluid lightbox-inline-wrapper">%s%s%s</div></div>', $popup_id, $double_nl, $content, $double_nl );
	DeferredContent::defer( $deferred );
	return $out;
} );

/**
 * wpautop() is already applied to $content.
 * The deferred content was extracted before, while rendering shortcodes.
 *
 * The ordering is:
 * 11: do_shortcodes (extraction of deferred content)
 * 20: wpautop
 * 30: add the deferred content (re-adding deferred content)
 */
add_filter( 'the_content', function ( $content ) {
	return $content . wpautop( DeferredContent::get() );
}, 30);

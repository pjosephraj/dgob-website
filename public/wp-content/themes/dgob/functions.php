<?php

/**
 * Register menus
 */
register_nav_menu( 'primary', 'Haupt-Navigation' );
register_nav_menu( 'footer', 'Footer-Navigation' );


/**
 * Theme setup
 */
add_action( 'after_setup_theme', function () {
	add_editor_style( array(
		'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&#44;600&#44;700',
		'style.css',
	) );

	add_theme_support( 'title-tag' );
} );


/**
 * Footer sidebar
 */
add_action( 'widgets_init', function () {
	register_sidebar( array(
		'name' => 'Footer',
		'id' => 'footer',
		'description' => 'Widgets im Footerbereich',
		'class' => null,
		'before_widget' => '<div id="%1$s" class="col-sm-3 widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	) );
} );


/**
 * Responsive embeds
 *
 * This assumes the embeds have an aspect ratio of 16:9 (see CSS).
 * If other ratios must be considered, they have to be calculated
 * here from the given dimensions.
 *
 * Note: The output of the oembed_result filter is cached. The
 * non-cached version is embed_oembed_html.
 *
 * @todo Solution for other embeds but videos.
 */
add_filter( 'oembed_result', function ( $data ) {
	if ( strpos( $data, 'youtube' ) > 0 ) { // Only YouTube for now
		$data = preg_replace( '/(width|height)="[^"]+"/i', '', $data );
		$data = sprintf( '<div class="responsive-embed">%s</div>', $data );
	}
	return $data;
} );

<?php

require_once __DIR__ . '/shortcodes/info-icon.php';
require_once __DIR__ . '/shortcodes/popup.php';

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

	add_theme_support( 'post-thumbnails' );
} );


/**
 * Footer sidebar
 */
add_action( 'widgets_init', function () {
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'description'   => 'Widgets im Footerbereich',
		'class'         => null,
		'before_widget' => '<div id="%1$s" class="col-sm-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
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

/**
 * Prints the URL of a file appended by a timestamp parameter.
 *
 * @param string $file The local path relative to the theme directory
 */
function dgob_timestamped_url( $file ) {
	$local_path = get_stylesheet_directory() . '/' . $file;
	printf(
		'%s/%s?%s',
		get_stylesheet_directory_uri(),
		$file,
		filemtime( $local_path )
	);
}


/**
 * Print the main menu
 */
function dgob_main_menu() {
	$key  = 'dgob_main_menu';
	$menu = get_transient( $key );
	if ( false === $menu ) {
		require_once __DIR__ . '/vendor/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php';
		$menu = wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav navbar-nav',
			'walker'         => new wp_bootstrap_navwalker(),
			'depth'          => 2,
			'echo'           => false,
		) );
		set_transient( $key, $menu, HOUR_IN_SECONDS );
	}
	echo $menu;
}


/**
 * Print the footer
 */
function dgob_footer() {
	$key    = 'dgob_footer_sidebar';
	$footer = get_transient( $key );
	if ( false === $footer ) {
		ob_start();
		get_sidebar( 'footer' );
		$footer = ob_get_contents();
		ob_end_clean();
		set_transient( $key, $footer, MINUTE_IN_SECONDS );
	}
	echo $footer;
}


/**
 * Configuration of the Contact Form 7 plugin
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

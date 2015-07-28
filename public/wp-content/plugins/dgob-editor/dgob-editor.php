<?php

/**
 * Plugin Name: DGoB Editor-Konfiguration
 */

if ( is_admin() ) {
	require_once __DIR__ . '/classes/editor.php';

	add_filter( 'content_save_pre', function ( $html ) {
		return \Dgob\Editor::get_instance()->purify( $html );
	} );

	add_filter( 'tiny_mce_before_init', function ( array $config ) {
		return \Dgob\Editor::get_instance()->tinymce_config( $config );
	} );
}
<?php

/**
 * Include third-party NavWalker class for use in header.php
 */
require_once( __DIR__ . '/vendor/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php' );

/**
 * Register menus
 */
register_nav_menu( 'primary', 'Haupt-Navigation' );
register_nav_menu( 'footer', 'Footer-Navigation' );

/**
 * Theme setup
 */
function dgob_theme_setup() {
	add_editor_style( array(
		'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&#44;600&#44;700',
		'style.css'
	) );
}

add_action( 'after_setup_theme', 'dgob_theme_setup' );
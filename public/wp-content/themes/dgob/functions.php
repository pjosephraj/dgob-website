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
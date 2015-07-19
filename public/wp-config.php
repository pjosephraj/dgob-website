<?php

define( 'DB_NAME', 'dgob' );
define( 'DB_USER', 'dgob' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

// Updates are done manually
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Environment specific settings
 */
if ( substr($_SERVER['REMOTE_ADDR'], 0, 7) === '192.168' ) {
	define( 'WP_DEBUG', true );
	define( 'DGOB_PROTOCOL', 'http://' );
} else {
	define( 'WP_DEBUG', false );
	define( 'DGOB_PROTOCOL', 'https://' );
}

require_once( __DIR__ . '/wp-config-local.php' );

define( 'WP_SITEURL', DGOB_PROTOCOL . $_SERVER['HTTP_HOST'] . '/wp' );
define( 'WP_HOME', DGOB_PROTOCOL . $_SERVER['HTTP_HOST'] );
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', DGOB_PROTOCOL . $_SERVER['HTTP_HOST'] . '/wp-content' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . '/wp-settings.php' );

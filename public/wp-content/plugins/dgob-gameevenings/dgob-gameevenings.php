<?php

/**
 * Plugin Name: DGoB Spielabende
 */

require_once 'classes/post_type/game-evening.php';
new Dgob\GameEvenings\PostType\GameEvening();

if ( is_admin() ) {
	require_once 'classes/admin/metabox.php';
	new \Dgob\GameEvenings\Admin\MetaBox();
}

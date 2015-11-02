<?php

namespace Dgob\GameEvenings\PostType;

class GameEvening {

	public function __construct() {
		add_action( 'init', array( $this, 'register' ) );
	}

	public function register() {

		$labels = array(
			'name' => 'Spielabende',
			'singular_name' => 'Spielabend',
			'menu_name' => 'Spielabende',
			'name_admin_bar' => 'Spielabende',
			'parent_item_colon' => 'Elternelement:',
			'all_items' => 'Alle Spielabende',
			'add_new_item' => 'Neuen Spielabend anlegen',
			'add_new' => 'Neu',
			'new_item' => 'Neuer Spielabend',
			'edit_item' => 'Spielabend bearbeiten',
			'update_item' => 'Spielabend aktualisieren',
			'view_item' => 'Spielabend ansehen',
			'search_items' => 'Spielabend suchen',
			'not_found' => 'Nicht gefunden',
			'not_found_in_trash' => 'Nicht im Papierkorb gefunden',
		);

		$args = array(
			'label' => 'game_evening',
			'labels' => $labels,
			'supports' => array( 'title', 'editor' ),
			'taxonomies' => array( 'game_evenings' ),
			'hierarchical' => false,
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 20,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => false,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'capability_type' => 'post',
		);

		register_post_type( 'game_evening', $args );
	}
}

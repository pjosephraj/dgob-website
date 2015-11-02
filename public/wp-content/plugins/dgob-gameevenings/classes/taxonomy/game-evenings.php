<?php

namespace Dgob\GameEvenings\Taxonomy;

class GameEvenings {

	public function __construct() {
		add_action( 'init', array( $this, 'register' ) );
	}

	public function register() {
		register_taxonomy(
			'game_evenings', // Taxonomy name
			'game_evening', // Post type
			array( // Arguments
				'label'   => 'Spielabend-Typen',
				'public'  => false,
				'show_ui' => true,
				'rewrite' => false,
			)
		);
	}
}

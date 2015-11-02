<?php

namespace Dgob\GameEvenings\Admin;

class MetaBox {

	protected $fields = array(
		'street',
		'zip',
		'city',
		'addition',
		'latitude',
		'longitude',
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	public function register() {
		add_meta_box(
			'gameevenings-metabox',
			'Ort',
			array( $this, 'render' ),
			'game_evening',
			'side',
			'high'
		);
	}

	public function render() {
		$postId = get_the_ID();
		$data = array();
		foreach ( $this->fields as $field ) {
			$data[ $field ] = get_post_meta( $postId, '_' . $field, true );
		}
		wp_nonce_field( 'gameevening_save_meta_box_data', 'gameevening_meta_box_nonce' );
		echo <<<EOS
		<input name="street" value="${data['street']}" class="game-evening-address" id="game-evening-street" placeholder="Straße/Hausnummer"><br>
		<input name="zip" value="${data['zip']}" class="game-evening-address" id="game-evening-zip" placeholder="PLZ"><br>
		<input name="city" value="${data['city']}" class="game-evening-address" id="game-evening-city" placeholder="Stadt"><br>
		<input name="addition" value="${data['addition']}" placeholder="Adresszusatz"><br>
		<div id="metabox-map" style="width: 100%; height: 200px; margin-top: 1em;"></div>
		<input type="hidden" name="latitude" id="game-evening-latitude" value="${data['latitude']}">
		<input type="hidden" name="longitude" id="game-evening-longitude" value="${data['longitude']}">
EOS;
	}

	public function add_scripts() {
		global $post_type;
		$plugin_root = plugin_dir_url( dirname( __DIR__ ) );
		if ( 'game_evening' === $post_type ) {
			wp_enqueue_script(
				'gameevenings-google-maps',
				'http://maps.google.com/maps/api/js?sensor=true'
			);
			wp_enqueue_script(
				'gameevenings-gmaps',
				'https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.12/gmaps.min.js',
				array( 'gameevenings-google-maps' )
			);
			wp_enqueue_script(
				'gameevenings-metabox',
				$plugin_root . 'scripts/metabox.js',
				array( 'gameevenings-gmaps' )
			);
		}
	}

	public function save_post( $post_ID ) {
		if ( ! isset( $_POST['gameevening_meta_box_nonce'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['gameevening_meta_box_nonce'], 'gameevening_save_meta_box_data' ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_ID ) ) {
			return;
		}

		foreach ( $this->fields as $field ) {
			update_post_meta( $post_ID, '_' . $field, sanitize_text_field( $_POST[ $field ] ), false );
		}
	}
}

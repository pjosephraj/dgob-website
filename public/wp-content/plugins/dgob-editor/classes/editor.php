<?php

namespace Dgob;

class Editor {

	/**
	 * @var \Dgob\Editor
	 */
	private static $instance;

	/**
	 * @var \HTMLPurifier
	 */
	private $purifier;

	/**
	 * @var \HTMLPurifier_Config
	 */
	private $config;

	/**
	 * @return \Dgob\Editor
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		require_once __DIR__ . '/../vendor/htmlpurifier/library/HTMLPurifier.auto.php';
	}

	/**
	 * @param string $html
	 *
	 * @return string
	 */
	public function purify( $html ) {
		$html = stripslashes( $html );

		return $this->get_purifier()->purify( $html );
	}

	/**
	 * @param array $config
	 *
	 * @return array
	 */
	public function tinymce_config( array $config ) {
		// Remove alignment settings
		$config['toolbar1'] = preg_replace( '/,?align[^,]+/', '', $config['toolbar1'] );
		$config['toolbar2'] = preg_replace( '/,?align[^,]+/', '', $config['toolbar2'] );
		// Remove wp_more
		$config['toolbar1'] = preg_replace( '/,?wp_more/', '', $config['toolbar1'] );
		// Remove text color
		$config['toolbar2'] = preg_replace( '/,?forecolor/', '', $config['toolbar2'] );

		return $config;
	}

	/**
	 * @return \HTMLPurifier
	 */
	protected function get_purifier() {
		if ( is_null( $this->purifier ) ) {
			$this->purifier = new \HTMLPurifier( $this->get_config() );
		}

		return $this->purifier;
	}

	/**
	 * @return \HTMLPurifier_Config
	 */
	protected function get_config() {
		if ( is_null( $this->config ) ) {
			$this->config = \HTMLPurifier_Config::createDefault();
			$this->config->set( 'HTML.Doctype', 'HTML 4.01 Transitional' );
			$this->config->set( 'HTML.AllowedAttributes', array(
				'a.href',
				'a.target',
				'img.src',
				'*.class',
			) );
			$this->config->set( 'Attr.AllowedFrameTargets', array( '_blank' ) );
		}

		return $this->config;
	}

}

<?php

/**
 *Plugin Name: Mail transfer via SMTP
 */

add_action( 'phpmailer_init', function ( PHPMailer $phpmailer ) {
	if ( defined( 'DGOB_SMTP' ) && true === DGOB_SMTP ) {
		// @codingStandardsIgnoreStart
		$phpmailer->IsSMTP();
		$phpmailer->Host       = DGOB_SMTP_HOST;
		$phpmailer->Port       = DGOB_SMTP_PORT;
		$phpmailer->SMTPSecure = DGOB_SMTP_SECURE;
		$phpmailer->SMTPAuth   = DGOB_SMTP_AUTH;
		$phpmailer->Username   = DGOB_SMTP_USER;
		$phpmailer->Password   = DGOB_SMTP_PASS;
		// @codingStandardsIgnoreEnd
	}
} );

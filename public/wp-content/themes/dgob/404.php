<?php

get_header();

echo '<h1>Seite nicht gefunden</h1>';
echo '<div id="e404-board"></div>';

wp_enqueue_script( 'dgob-404', get_template_directory_uri() . '/scripts/404.js' );

get_footer();

<?php

/**
 * Template Name: Spielabende
 */

get_header();
the_title( '<h1>', '</h1>' );
the_content();

echo '<div id="game-evenings-map"></div>';
echo '<ul class="hidden">';

$query = new WP_Query( array(
	'post_type' => 'game_evening',
	'nopaging'  => true,
) );

while ( $query->have_posts() ) {
	$query->the_post();
	$latitude  = get_post_meta( $post->ID, '_latitude', true );
	$longitude = get_post_meta( $post->ID, '_longitude', true );
	$street    = get_post_meta( $post->ID, '_street', true );
	$zip       = get_post_meta( $post->ID, '_zip', true );
	$city      = get_post_meta( $post->ID, '_city', true );
	$addition  = get_post_meta( $post->ID, '_addition', true );
	$addition  = ( '' === $addition ) ? '' : '<br>' . $addition;
	$terms     = get_the_terms( $post->ID, 'game_evenings' );
	$type      = 'public';
	if ( is_array( $terms ) && count( $terms ) > 0 ) {
		$type = $terms[0]->slug;
	}
	printf( '<li class="game-evening-item" data-latitude="%s" data-longitude="%s" data-type="%s">', $latitude, $longitude, $type );
	the_title( '<h4>', '</h4>' );
	printf( '<p>%s<br>%s %s%s</p>', $street, $zip, $city, $addition );
	the_content();
	echo '</li>';
}

echo '</ul>';

wp_enqueue_script( 'google-maps-api', 'http://maps.google.com/maps/api/js?sensor=true', null, null, true );
wp_enqueue_script( 'gmaps', 'https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.12/gmaps.min.js', array( 'google-maps-api' ), null, true );

get_footer();

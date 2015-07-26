<?php

/**
 * Template Name: Spielabende
 */

get_header();

echo '<div id="game-evenings-map"></div>';
echo '<ul class="hidden">';

$query = new WP_Query( array(
	'post_type' => 'game_evening',
	'nopaging' => true,
) );

while ( $query->have_posts() ) {
	$query->the_post();
	$latitude = get_post_meta( $post->ID, '_latitude', true );
	$longitude = get_post_meta( $post->ID, '_longitude', true );
	$street = get_post_meta( $post->ID, '_street', true );
	$zip = get_post_meta( $post->ID, '_zip', true );
	$city = get_post_meta( $post->ID, '_city', true );
	$addition = get_post_meta( $post->ID, '_addition', true );
	$addition = ( '' === $addition ) ? '' : '<br>' . $addition;
	printf( '<li class="game-evening-item" data-latitude="%s" data-longitude="%s">', $latitude, $longitude );
	the_title( '<h4>', '</h4>' );
	printf( '<p>%s<br>%s %s%s</p>', $street, $zip, $city, $addition );
	the_content();
	echo '</li>';
}

echo '</ul>';

get_footer();

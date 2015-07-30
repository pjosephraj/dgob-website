<?php

printf( '<article id="post-%s" class="%s">', get_the_ID(), join( ' ', get_post_class() ) );

print( '<header class="entry-header">' );

if ( is_single() ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
} else {
	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
}

print( '</header>' );

if ( has_post_thumbnail() ) {
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	printf( '<a href="%s" title="%s">', $large_image_url[0], the_title_attribute( 'echo=0' ) );
	the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) );
	print( '</a>' );
}

// Don't use get_the_content() here, or we loose the filters applied by the_content(), like wpautop.
the_content();

print( '</article>' );

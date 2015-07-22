<?php

get_header();

while ( have_posts() ) {

	the_post();
	the_title( '<h1>', '</h1>' );
	the_content();

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
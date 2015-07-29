<?php

get_header();

while ( have_posts() ) {

	echo '<div class="clearfix">';
	the_post();
	the_title( '<h1>', '</h1>' );
	the_content();
	echo '</div>';

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();

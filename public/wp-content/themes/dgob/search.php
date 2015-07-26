<?php

get_header();

printf('<h1>Suchergebnisse für <strong>%s</strong></h1>', get_search_query());

get_search_form();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		printf('<h2><a href="%s">%s</a></h2>', get_the_permalink(), get_the_title());
		printf('<div>%s</div><hr>', get_the_excerpt());
	}
} else {
	print('<p class="alert alert-info">Leider nichts gefunden</p>');
}

get_footer();

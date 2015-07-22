<?php

if ( post_password_required() ) {
	return;
}

if ( have_comments() ) {

	?>
	<h2 class="comments-title">Kommentare</h2>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style' => 'ol',
			'short_ping' => true,
			'avatar_size' => 56,
		) );
		?>
	</ol>

	<?php

}

// Does this post have comments, but commenting is currently disabled?
if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {

	?>
	<p class="no-comments">Kommentieren ist nicht mehr möglich</p>
	<?php

}

comment_form();
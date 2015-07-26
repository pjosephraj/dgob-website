<?php

if ( post_password_required() ) {
	return;
}

?>
<hr>
<div class="row">

	<?php if ( have_comments() ) : ?>

		<div class="col-sm-7">
			<h2>Kommentare</h2>
			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style' => 'ol',
					'short_ping' => true,
					'avatar_size' => 56,
				) );
				?>
			</ol>
		</div>

	<?php endif; ?>
	<div class="col-sm-5">
		<div class="well">

			<?php
			// Does this post have comments, but commenting is currently disabled?
			if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
				?>
				<p class="no-comments">Kommentieren ist nicht mehr möglich</p>
			<?php endif; ?>

			<?php
			comment_form( array(
				'class_submit' => 'btn btn-primary',
			) );
			?>

		</div>
	</div>
</div>
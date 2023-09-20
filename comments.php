


<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php echo get_comments_number(); ?> Comments
		</h2>

		<ul class="comment-list">
			<?php echo get_template_part('template-parts/comment', 'list') ;?>
		</ul>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->

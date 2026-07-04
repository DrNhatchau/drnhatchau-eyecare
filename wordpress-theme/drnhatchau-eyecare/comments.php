<?php
if ( post_password_required() ) {
	return;
}
?>
<div class="blog-comments" style="margin-top:40px;">
	<?php if ( have_comments() ) : ?>
		<h3><?php echo esc_html( get_comments_number() ); ?> bình luận</h3>
		<ul>
			<?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>

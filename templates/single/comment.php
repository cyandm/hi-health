<?php
global $cyn_general, $cyn_render;

$comment = isset( $args['comment'] ) ? $args['comment'] : null;
$children = isset( $args['children'] ) ? $args['children'] : [];

if ( ! $comment )
	return;
?>

<?php

if ( ! function_exists( 'render_single_comment' ) ) {
	function render_single_comment( $comment ) {
		global $cyn_general, $cyn_render;
		$children = $comment->get_children();
		$author_id = $comment->user_id;
		$date = $cyn_general->convert_date_for_human( $comment->comment_ID, 'comment' );
		$content = $comment->comment_content;

		?>

		<div class="comment">

			<div class="comment__author">
				<?php $cyn_render->render_author( $author_id, $date ) ?>
			</div>

			<div class="comment__content">
				<?= $content ?>

			</div>

			<div class="comment_actions">

				<div class="comment__reply"
					 data-comment-text="<?= $comment->comment_content ?>"
					 data-comment-id="<?= $comment->comment_ID ?>">

					<span><?php _e( 'پاسخ', 'cyn-dm' ) ?></span>
					<i class="icon-reply"></i>

				</div>

				<div class="comment_like">

				</div>

			</div>

			<div class="comment__children">
				<?php
				if ( $children !== null ) {
					foreach ( $children as $child ) {
						render_single_comment( $child );
					}
				}
				?>
			</div>

		</div>

		<?php
	}
}

?>



<?php
if ( $comment->comment_parent == 0 ) {
	render_single_comment( $comment );
}
?>
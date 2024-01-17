<?php
global $cyn_render, $cyn_general;

$id = isset( $args['id'] ) ? $args['id'] : null;
$post_date = $cyn_general->convert_date_for_human( $id );

$like_count = get_post_meta( $id, 'like_count', true );

$postsUserLiked = isset( $_COOKIE['postsUserLiked'] ) ? $_COOKIE['postsUserLiked'] : '{}';
$postsUserLiked = (array) json_decode( stripslashes( $postsUserLiked ) );
$isUserLiked = $cyn_general->is_user_likes_this_post( $id, $postsUserLiked ) ? 'true' : 'false';
?>

<header class="single-post__header">
	<?php printf( '<p class="single-post__excerpt">%s</p>', $cyn_render->render_content( 64 ) ) ?>
	<?php printf( '<h1>%s</h1>', get_the_title() ) ?>
	<?php $cyn_render->render_zig_zag() ?>

	<div class="single-post__meta">
		<?php $cyn_render->render_author( get_the_author_meta( 'ID' ) ); ?>
		<?php $cyn_render->render_icon_text( $post_date, 'calendar', 'single-post__meta-icon' ) ?>
	</div>

	<div class="single-post__action">
		<span class="single-post__action-item">
			<i class="icon-share"
			   id="shareAction"></i>
		</span>

		<div>
			<span class="single-post__action-item"
				  data-role="like-action"
				  data-post-type="post"
				  data-active=<?= $isUserLiked ?>
				  data-post-id="<?= $id ?>">
				<?php get_template_part( '/assets/img/heart' ) ?>
				<span id="count"><?= $like_count === '' ? 0 : $like_count ?></span>
			</span>

			<span class="single-post__action-item"
				  id="commentOpenerIcon">
				<i class="icon-comment"></i>
				<span>
					<?= get_comment_count( $id )['all'] ?>
				</span>

			</span>
		</div>
	</div>
</header>
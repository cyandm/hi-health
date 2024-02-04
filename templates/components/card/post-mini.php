<?php
global $cyn_render;

$post_id =
	isset($args['blog_id']) ?
	$args['blog_id'] : get_the_ID();

$index =
	isset($args['index']) ?
	$args['index'] : null;
?>
<a href="<?= get_permalink($post_id) ?>">
	<div data-id="<?= $post_id ?>" class="post-card-mini">
		<?php $cyn_render->render_image(get_post_thumbnail_id($post_id), $index + 1) ?>

		<div class="post-card-mini__content" data-index="<?= $index ?>">
			<div class="caption">
				<?= $cyn_render->render_content(64, $post_id) ?>
			</div>

			<h4>
				<?= get_the_title($post_id) ?>
			</h4>

		</div>
	</div>
</a>
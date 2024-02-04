<?php
global $cyn_render;

$class =
	isset($args['class']) ?
	$args['class'] : ' ';

$post_id =
	isset($args['blog_id']) ?
	$args['blog_id'] : get_the_ID();

$post_date = human_time_diff(
	get_the_time('U', $post_id),
	current_time('U')
)
	. ' ' . pll__('ago')
?>




<div class="<?= "general-card $class" ?>">

	<div class="general-card__image">
		<?php $cyn_render->render_image(get_post_thumbnail_id($post_id)) ?>
	</div>

	<div class="general-card__details">

		<?php printf(
			'<p class="general-card__caption">%s</p>',
			$cyn_render->render_content(64, $post_id)
		) ?>

		<?php printf(
			'<h4 class="general-card__name">%s</h4>',
			get_the_title($post_id)
		) ?>

		<?php $cyn_render->render_zig_zag() ?>

		<div class="general-card__icon-group">
			<?php $cyn_render->render_author(get_the_author_meta("ID")); ?>
			<?php $cyn_render->render_icon_text($post_date, 'calendar', 'general-card__icon') ?>
		</div>

		<a href=<?= get_permalink($post_id) ?> class="btn" variant="primary" size="small">
			<?php pll_e('more-info') ?>

		</a>


	</div>

</div>
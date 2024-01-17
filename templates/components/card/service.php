<?php
global $cyn_render;

$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();

?>

<a class="service-card"
   href="<?= get_permalink( $post_id ) ?>">
	<div class="service-card__image">
		<?php $cyn_render->render_image( get_post_thumbnail_id( $post_id ) ); ?>
	</div>

	<div class="service-card__title">
		<?php printf( '<h3>%s</h1>', get_the_title( $post_id ) ) ?>
	</div>
</a>
<?php
global $cyn_render;

$item_id = get_the_ID();
$item_img = get_post_thumbnail_id( $item_id );


?>


<div class="general-card">

	<div class="general-card__image">
		<?php $cyn_render->render_image( $item_img ) ?>
	</div>

	<div class="general-card__details">

		<?php get_template_part( '/templates/components/single/stars' ) ?>

		<?php printf( '<h4 class="general-card__name">%s</h4>', get_the_title() ) ?>

		<?php get_template_part( '/templates/components/single/address',
			args: [ 'class' => 'caption' ] ) ?>

		<?php $cyn_render->render_zig_zag() ?>

		<?php get_template_part( '/templates/components/single/features',
			args: [ 'class' => 'caption no-name-md', 'post_type' => 'hospital' ] ) ?>

		<a href="<?= get_permalink( $item_id ) ?>"
		   class="btn"
		   variant="primary"
		   size="medium">
			<?php pll_e( 'more-info' ) ?>
		</a>


	</div>

</div>
<?php
global $cyn_render;

$gallery = get_field( 'gallery' );

$image1 = $gallery['image_1'];
$side_gallery = [ $gallery['image_2'], $gallery['image_3'], $gallery['image_4'] ];


?>

<div class="tour-card"
	 style="--bg-url: url( <?= $image1 ? wp_get_attachment_image_src( $image1, 'full' )[0] : '' ?> )">

	<div class="tour-card__info">
		<h3 class="tour-card__title | h1">
			<?= get_the_title() ?>
		</h3>

		<p class="tour-card__description | h3">
			<?= get_the_excerpt() ?>
		</p>

		<?php get_template_part( '/templates/components/single/stars' ) ?>

		<p class="tour-card__content">
			<?= $cyn_render->render_content( 120 ) ?>
		</p>

		<a href="<?= get_permalink() ?>"
		   class="btn"
		   size='medium'
		   variant='secondary'>
			<?php pll_e( 'more-info' ) ?>
		</a>
	</div>

	<div class="tour-card__side-gallery">
		<?php
		foreach ( $side_gallery as $img_id ) {
			$cyn_render->render_image( $img_id );
		}
		?>
	</div>

</div>
<?php
global $cyn_render;

$id = get_the_ID();
$img = get_post_thumbnail_id( $id );
$excerpt = get_the_excerpt( $id );

$name = get_field( 'name' );

$hospital = get_field( 'hospital' );
$hospital = $hospital ? get_post( $hospital )->post_title : '';

$service = get_field( 'service' );
$service = $service ? get_post( $service )->post_title : '';

$doctor = get_field( 'doctor' );
$doctor = $doctor ? get_post( $doctor )->post_title : '';



?>

<div class="testimonial-card">

	<div class="testimonial-card__image">
		<?php $cyn_render->render_image( $img ) ?>
	</div>

	<div class="testimonial-card__details">

		<?php printf( '<span class="testimonial-card__name | body-s">%s</span>', $name ) ?>

		<?php printf( '<h4 class="testimonial-card__title">%s</h4>', get_the_title() ) ?>

		<p class="body-s">
			<?= $excerpt ?>
		</p>

		<div class="testimonial-card__icon-group">
			<?php $cyn_render->render_icon_text( $hospital, 'hospital', 'testimonial-card__icon | body-s' ) ?>
			<?php $cyn_render->render_icon_text( $service, 'medical', 'testimonial-card__icon | body-s' ) ?>
			<?php $cyn_render->render_icon_text( $doctor, 'doctor', 'testimonial-card__icon | body-s' ) ?>
		</div>

	</div>

</div>
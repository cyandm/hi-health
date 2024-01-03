<?php
global $cyn_render;

$doctor_id = get_the_ID();
$doctor_img = get_post_thumbnail_id( $doctor_id );
$short_text = get_field( 'short_text' );

$expertise = get_field( 'expertise' );
$experience = get_field( 'experience' );

$term = get_the_terms( $doctor_id, 'doctor-expertise' )[0];

?>
<a href=<?= get_permalink( $doctor_id ) ?>>
	<div class="general-card">

		<div class="general-card__image">
			<?php $cyn_render->render_image( $doctor_img ) ?>
		</div>

		<div class="general-card__details">

			<?php printf( '<h4 class="general-card__name">%s</h4>', get_the_title() ) ?>
			<?php printf( '<p class="general-card__caption">%s</p>', $short_text ) ?>

			<?php $cyn_render->render_zig_zag() ?>

			<div class="doctor-detail">
				<?php $cyn_render->render_icon_text( $term->name, 'speciality' ) ?>
				<?php $cyn_render->render_icon_text( $experience, 'glasses' ) ?>
			</div>

		</div>

	</div>
</a>
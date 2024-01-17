<?php
global $cyn_render;

$member_ID = isset( $args['member_ID'] ) ? $args['member_ID'] : null;

if ( ! $member_ID )
	return;


$member_image = get_post_thumbnail_id( $member_ID );
$short_text = get_the_excerpt( $member_ID );



?>
<div class="general-card">

	<div class="general-card__image">
		<?php $cyn_render->render_image( $member_image ) ?>
	</div>

	<div class="general-card__details">

		<?php printf( '<h4 class="general-card__name">%s</h4>', get_the_title( $member_ID ) ) ?>
		<?php printf( '<p class="general-card__caption">%s</p>', $short_text ) ?>

	</div>

</div>
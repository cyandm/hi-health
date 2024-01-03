<section class='primary-info | card-info'>

	<div class='primary-info__title'>
		<?php printf( '<h1 class="h3">%s</h1>', get_the_title() ) ?>
	</div>

	<div class='primary-info__description'>
		<?php the_excerpt() ?>
	</div>

	<?php get_template_part( '/templates/components/single/stars' ) ?>

	<?php get_template_part( '/templates/components/single/address' ) ?>

</section>
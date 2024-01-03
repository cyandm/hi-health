<section class='secondary-info | card-info'>

	<div class='secondary-info__title'>
		<?php printf( '<h2>%s</h2>', __( 'معرفی و تصاویر', 'cyn-dm' ) ) ?>
	</div>

	<div class="post-content">
		<?php the_content() ?>
	</div>

	<?php get_template_part( '/templates/components/single/features' ) ?>

	<?php get_template_part( '/templates/components/single/gallery' ) ?>

</section>
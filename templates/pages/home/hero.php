<?php

$title = get_field( 'title' );
$sub_title = get_field( 'sub_title' );



?>

<section class="front-page-hero">

	<div class="front-page-hero__image">
		<img src="<?= get_stylesheet_directory_uri() . '/assets/img/hero-female.png' ?>"
			 alt="">
	</div>

	<span class="front-page-hero__title">
		<?= $title ?>
	</span>
	<span class="front-page-hero__title-overlay">
		<?= $title ?>
	</span>

	<span class="front-page-hero__airplane">
		<img src="<?= get_stylesheet_directory_uri() . '/assets/img/airplane-point.svg' ?>"
			 alt="">
	</span>

	<div class="front-page-hero__content">

		<div class="front-page-hero__content-inner">
			<div class="front-page-hero__content-title">
				<?= $sub_title ?>
			</div>

			<div class="front-page-hero__content-search">
				<?php get_template_part( '/templates/components/search-form', null, [ 'post-type' => 'service', 'search-text' => 'جستجو در خدمات' ] ) ?>
			</div>
		</div>
	</div>

</section>
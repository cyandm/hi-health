<?php
global $cyn_render;

$post_id = get_queried_object_id();
$feature_img = get_post_thumbnail_id( $post_id );

$article_link = get_field( 'articles' );
$user_select = get_field( 'related_doctors' );



$term = get_the_terms( $post_id, 'doctor-expertise' )[0];
$experience = get_field( 'experience' );
$educate_place = get_field( 'edu_place' );


$related_doctors = new WP_Query( [ 
	'post_type' => 'doctor',
	'post__in' => $user_select,
	'posts_per_page' => 4
] );

?>

<?php get_header(); ?>


<main class="doctor-single">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<section class="doctor-item container">

		<div class="doctor-feature">
			<?= wp_get_attachment_image( $feature_img, 'full' ) ?>
		</div>

		<div class="doctor-description">

			<h1>
				<?php the_title(); ?>
			</h1>

			<?= get_field( 'description' ); ?>

			<?php $cyn_render->render_zig_zag() ?>

			<div class="doctor-detail">
				<?php $cyn_render->render_icon_text( $term->name, 'speciality' ) ?>
				<?php $cyn_render->render_icon_text( $experience, 'glasses' ) ?>
				<?php $cyn_render->render_icon_text( $educate_place, 'book' ) ?>
			</div>



			<?php if ( ! empty( $article_link ) ) : ?>
				<a href="<?= $article_link['url']; ?>"
				   target="_blank"
				   class="doctor-article">
					<i class="icon-arrow-upright"></i>
					مشاهده مقالات دکتر
				</a>
			<?php endif; ?>

		</div>

	</section>

	<section class="doctor-other container">

		<div class="title-other">
			<p>دیگر پزشکان</p>
			<a href="<?php ?>">مشاهده همه</a>
		</div>

	</section>

	<section class="item-select container">
		<div class="item-cards even-columns">

			<?php
			if ( $related_doctors->have_posts() ) :
				while ( $related_doctors->have_posts() ) :
					$related_doctors->the_post();

					get_template_part( "templates/components/card/doctor" );

				endwhile;
			endif;
			wp_reset_query();
			?>

		</div>
	</section>



</main>

<?php get_footer(); ?>
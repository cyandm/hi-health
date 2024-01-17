<?php
global $cyn_render;

$post_id = get_queried_object_id();
$feature_img_ID = get_post_thumbnail_id( $post_id );

$microservice_group = array_filter( get_field( 'microservice-group' ) );

// echo '<pre dir="ltr">';
// var_dump( $content_group );
// echo '</pre>';
// wp_die();
?>

<?php get_header(); ?>





<main class="single-service"
	  id="singleService">
	<?php get_template_part( '/templates/components/breadcrumb' ) ?>

	<div class="grid-main container">

		<aside class="single-service__sidebar">

			<div>
				<?php foreach ( $microservice_group as $key => $microservice ) :
					if ( count( array_filter( $microservice ) ) === 0 ) {
						continue;
					} ?>

					<a href="#anchor-<?= $key ?>"
					   class="single-service__microservice__card"
					   style="--bg-url: url(<?= wp_get_attachment_image_url( $microservice['image'] ) ?>)">

						<?= $microservice['title'] ?>

					</a>
				<?php endforeach; ?>
			</div>



		</aside>

		<div class="single-service__content">

			<div class="single-service__hero">

				<?php $cyn_render->render_image( $feature_img_ID ) ?>

				<div class="single-service__content-wrapper">

					<h1>
						<?php the_title(); ?>
					</h1>

					<?php the_content(); ?>

				</div>

			</div>

			<div class="single-service__microservice">

				<?php foreach ( $microservice_group as $key => $microservice ) :

					if ( count( array_filter( $microservice ) ) === 0 ) {
						continue;
					}

					?>
					<section class="single-service__microservice__item">

						<h2 id="anchor-<?= $key ?>"
							class="single-service__microservice__title">
							<?= $microservice['title'] ?>
						</h2>

						<div class="single-service__microservice__image">
							<?php $cyn_render->render_image( $microservice['image'] ) ?>
						</div>

						<div class="single-service__microservice__content">
							<?= $microservice['text'] ?>
						</div>
					</section>

				<?php endforeach; ?>

			</div>

		</div>
	</div>



</main>


<?php get_footer(); ?>
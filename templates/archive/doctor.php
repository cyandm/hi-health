<?php
$taxonomy = 'doctor-expertise';
$terms = get_terms( [ 
	'taxonomy' => $taxonomy,
	'hide_empty' => false
] )

	?>

<?php get_header() ?>

<main class="item-archive">

	<section>

		<?php get_template_part(
			'/templates/components/archive/filter-search-bar',
			null,
			[ 'terms' => $terms, 'search-text' => 'پزشکان', 'taxonomy' => $taxonomy, 'post-type' => 'doctor' ] )
			?>

	</section>


	<section class="item-card-archive container">
		<div class="item-cards posts-container even-columns">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					get_template_part( "templates/components/card/doctor" );

				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>

		<?php get_template_part( '/templates/components/archive/load-more' ) ?>
	</section>

</main>





<?php get_footer() ?>
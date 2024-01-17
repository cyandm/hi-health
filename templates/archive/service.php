<?php
global $wp_query;
$is_tax = is_tax();
$queried_object = get_queried_object();

if ( ! function_exists( 'cyn_render_service_tax_template' ) ) {
	/**
	 * Return template part for service-type
	 * @author Amir Tanazzoh amirtanazzoh@gmail.com
	 *
	 * 
	 * @param WP_TERM $term .
	 * @param WP_Query $term_q optional
	 * @return void
	 */
	function cyn_render_service_tax_template( $term, $term_q = null ) {

		if ( $term_q === null ) {
			$term_q = new WP_Query(
				[ 
					'post_type' => 'service',
					'tax_query' => [ 
						[ 
							'taxonomy' => 'service-type',
							'field' => 'slug',
							'terms' => [ $term->slug ]
						]
					]
				]
			);
		}



		echo '<div class="archive-service__term-con">';
		printf( '<h2>%s</h2>', $term->name );
		echo '<div class="archive-service__term-posts">';

		if ( $term_q->have_posts() ) :
			while ( $term_q->have_posts() ) :
				$term_q->the_post();
				get_template_part( '/templates/components/card/service' );
			endwhile;
		endif;

		echo '</div>';
		echo '</div>';


	}

}


?>

<?php get_header() ?>

<main class="archive-service">

	<?php if ( ! $is_tax ) : ?>
		<section class="archive-service__hero"
				 id="archiveServiceHero"
				 style="--bg_clr:#C0E1E7">
			<div class="container archive-service__con">
				<p class="title archive-service__title">
					<?php pll_e( 'service-archive-title' ) ?>
				</p>
			</div>
		</section>
		<?php get_template_part( '/templates/components/archive/filter-search-bar', null,
			[ 
				'taxonomy' => 'service-type',
				'post-type' => 'service',
				'search-text' => pll__( 'service-search' )
			]
		) ?>
	<?php endif; ?>


	<div class="container">
		<?php
		if ( $is_tax ) {
			cyn_render_service_tax_template( $queried_object, $wp_query );
		}

		if ( ! $is_tax ) {
			$terms = get_terms( [ 
				'taxonomy' => 'service-type'
			] );



			foreach ( $terms as $term ) {
				cyn_render_service_tax_template( $term );
			}
		}
		?>
	</div>

</main>

<?php get_footer(); ?>
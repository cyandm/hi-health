<?php
$taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : '';
$post_type = isset( $args['post-type'] ) ? $args['post-type'] : '';
$search_text = isset( $args['search-text'] ) ? $args['search-text'] : '';

$terms = get_terms( [ 
	'taxonomy' => $taxonomy,
	'hide_empty' => false
] )
	?>




<div class="filter-search-bar__container">
	<div class="filter-search-bar__wrapper container">
		<div class="img-wrapper point-bar">
			<img src="<?= get_stylesheet_directory_uri() . '/assets/img/point.webp' ?>"
				 alt="airplane">
		</div>
		<div class="filter-search-bar__content">

			<?php get_template_part( '/templates/components/search-form', null,
				[ 
					'search-text' => $search_text,
					'post-type' => $post_type
				] ) ?>


			<div class="filter-search-bar__cat">
				<select id="selectFilter"
						data-taxonomy=<?= $taxonomy ?>
						data-post-type=<?= $post_type ?>>
					<option value="default"><?php pll_e( 'choose' ) ?></option>
					<?php
					foreach ( $terms as $term ) {
						printf( '<option value="%s">%s</option>', $term->slug, $term->name );
					}
					?>
				</select>
			</div>


		</div>
		<div class="img-wrapper">
			<img src="<?= get_stylesheet_directory_uri() . '/assets/img/airplane.webp' ?>"
				 alt="airplane">
		</div>

	</div>
</div>
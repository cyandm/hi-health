<?php
global $wp_query, $post_type;
$sort_items = isset( $args['sort_items'] ) ? $args['sort_items'] : null;


?>

<section class="archive-sort">
	<div class='container'>
		<div class='archive-sort__filters-con'>
			<div class='archive-sort__title'>
				<i class="icon-sort"></i>
				<?php pll_e( 'sort-by' ) . ':' ?>
			</div>

			<div class='archive-sort__filters'>
				<label for="default">
					<input type="radio"
						   name="sort-filter"
						   id="default"
						   data-post-type="<?= $post_type ?>"
						   checked>
					<?php pll_e( 'default' ) ?>
				</label>

				<?php foreach ( $sort_items as $item ) : ?>
					<label for=<?= $item['id'] ?>>
						<input type="radio"
							   name="sort-filter"
							   id=<?= $item['id'] ?>
							   data-post-type="<?= $post_type ?>"
							   data-order=<?= $item['order'] ?>
							   data-meta=<?= $item['meta'] ?>>
						<?= $item['name'] ?>
					</label>

				<?php endforeach; ?>

			</div>

		</div>

		<div class='archive-sort__result'>
			<?php printf( '<span> <span id="postsCount">%s</span> %s</span>', $wp_query->found_posts, pll__( 'founded' ) ) ?>
		</div>

	</div>
</section>
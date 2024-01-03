<?php
global $wp_query, $post_type;
$sort_items = isset( $args['sort_items'] ) ? $args['sort_items'] : null;


?>

<section class="archive-sort">
	<div class='container'>
		<div class='archive-sort__filters-con'>
			<div class='archive-sort__title'>
				<i class="icon-sort"></i>
				<?= __( 'ترتیب بر اساس', 'cyn-dm' ) . ':' ?>
			</div>

			<div class='archive-sort__filters'>
				<label for="default">
					<input type="radio"
						   name="sort-filter"
						   id="default"
						   data-post-type="<?= $post_type ?>"
						   checked>
					<?php _e( 'پیش فرض', 'cyn-dm' ) ?>
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
			<?php printf( '<span> <span id="postsCount">%s</span> %s</span>', $wp_query->found_posts, __( 'نتیجه', 'cyn-dm' ) ) ?>
		</div>

	</div>
</section>
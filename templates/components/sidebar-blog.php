<?php
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : null;

?>

<aside class="sidebar-blog">
	<div class="sidebar-blog__wrapper">
		<?php get_template_part( '/templates/components/search-form', null,
			[ 'search-text' => 'جستجو در نوشته ها' ] ) ?>

		<?php get_template_part( '/templates/components/single/list-terms',
			null, [ 'post_id' => $id ] ) ?>
	</div>
</aside>
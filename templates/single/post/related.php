<?php
$id = isset( $args['id'] ) ? $args['id'] : null;
$current_post_cat = get_the_category( $id );
$ids = [];
foreach ( $current_post_cat as $cat_obj ) {
	array_push( $ids, $cat_obj->term_id );
}

$related_acf = get_field( 'related' );

if ( $related_acf === null ) {
	$related = new WP_Query( [ 
		'post_type' => 'post',
		'category__in' => $ids
	] );
	$related = $related->posts;
} else {
	$related = $related_acf;
}


?>

<section class="single-post__related">
	<?php printf( '<h2>%s</h2>', __( 'شاید بپسندید', 'cyn-dm' ) ) ?>

	<div class="grid-col-3">
		<?php
		foreach ( $related as $post_obj ) {
			get_template_part( '/templates/components/card/post', null, [ 'blog_id' => $post_obj->ID ] );
		}
		?>
	</div>
</section>
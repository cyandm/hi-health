<?php
$taxonomy = isset( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : null;
$terms = get_terms( [ 
	'taxonomy' => $taxonomy,
] );


if ( false === $current_post_terms = get_the_terms( $post_id, $taxonomy ) ) {
	$current_post_terms = [];
}




if ( ! $terms )
	return;
?>

<div class="list-terms">
	<?php
	printf( '<p class="h3">%s</p>', pll__( 'categories' ) );

	foreach ( $terms as $term ) {
		$in_post = in_array( $term, $current_post_terms ) ? 'true' : 'false';
		$term_link = get_term_link( $term );


		echo <<<EOL
        <a 
            href="$term_link" 
            class="list-terms__item"
            rel="nofollow"
        >
            <span class="list-terms__bullet" data-active="$in_post"></span>
            <span class="list-terms__name" >$term->name</span>
        </a>
        EOL;
	}

	?>
</div>
<?php
$terms = get_field( 'top_categories' );
$featured_blogs =
	false !== get_field( 'featured_blogs' ) ?
	get_field( 'featured_blogs' ) : [];
?>

<section class="feature">

	<?php if ( false !== $terms ) : ?>
		<div class="feature__side">
			<?php get_template_part(
				'/templates/components/search-form',
				args: [ 'search-text' => pll__( 'blog-search' ) ] )
				?>

			<?php printf( '<h3>%s</h3>', pll__( 'categories' ) ) ?>

			<div class="feature__terms">

				<?php
				foreach ( $terms as $term ) {
					$bg_id = get_field(
						'custom_thumbnail', $term->taxonomy . '_' . $term->term_id );
					$term_link = get_term_link( $term );
					$bg_url = wp_get_attachment_image_url( $bg_id );


					echo <<<EOL
					<a 
					href="$term_link" 
					class="feature__terms__item" 
					style="--bg-url: url('$bg_url')">
						<span>$term->name</span>
					</a>				
					EOL;
				} ?>
			</div>

		</div>
	<?php endif; ?>


	<div class="feature__posts">
		<?php
		foreach ( $featured_blogs as $blog_id ) {
			get_template_part( '/templates/components/card/post', null, [ 'blog_id' => $blog_id, 'class' => 'no-media' ] );
		}
		?>

	</div>

</section>
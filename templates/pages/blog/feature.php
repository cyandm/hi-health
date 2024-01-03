<?php
$terms = get_field( 'top_categories' );
$featured_blogs =
	false !== get_field( 'featured_blogs' ) ?
	get_field( 'featured_blogs' ) : [];


// echo '<pre dir="ltr">';
// var_dump( $featured_blogs );
// echo '</pre>';
// wp_die();

?>

<section class="feature">

	<?php if ( false !== $terms ) : ?>
		<div class="feature__side">
			<?php get_template_part(
				'/templates/components/search-form',
				args: [ 'search-text' => 'جستجو کنید' ] )
				?>

			<?php printf( '<h3>%s</h3>', __( 'دسته بندی ها', 'cyn-dm' ) ) ?>

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
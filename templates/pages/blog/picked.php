<?php
$picked_blogs = get_field( 'picked_blogs' );

if ( ! isset( $picked_blogs ) )
	return;
?>

<section class="picked">
	<?php printf( '<h3>%s</h3>', __( 'مطالب برتر', 'cyn-dm' ) ) ?>

	<div class="picked__blog-group">
		<?php
		foreach ( $picked_blogs as $index => $blog_id ) {
			get_template_part(
				'/templates/components/card/post', 'mini',
				[ 'blog_id' => $blog_id, 'index' => $index ] );
		}
		?>
	</div>

</section>
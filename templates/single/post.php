<?php $id = get_the_ID();

?>

<?php get_header() ?>

<?php get_template_part( '/templates/components/breadcrumb' ) ?>

<main post-id="<?= $id ?>"
	  id="single-post"
	  class="grid-main container single-post">

	<?php get_template_part( '/templates/components/sidebar', 'blog', [ 'id' => $id ] ) ?>

	<div>
		<article>

			<?php get_template_part( '/templates/single/post/header', null, [ 'id' => $id ] ) ?>

			<?php get_template_part( '/templates/single/post/body', null, [ 'id' => $id ] ) ?>

			<?php get_template_part( '/templates/single/post/comments', null, [ 'id' => $id ] ) ?>

		</article>

		<?php get_template_part( '/templates/single/post/related', null, [ 'id' => $id ] ) ?>

	</div>



</main>




<?php get_footer() ?>
<?php /* Template Name: Blog */?>

<?php get_header() ?>

<main class="container">

	<?php get_template_part( '/templates/pages/blog/feature' ) ?>

	<?php get_template_part( '/templates/pages/blog/picked' ) ?>

	<?php get_template_part( '/templates/pages/blog/posts-container' ) ?>

</main>

<?php get_footer() ?>
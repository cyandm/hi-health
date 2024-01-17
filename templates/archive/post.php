<?php
$queried = get_queried_object();

?>


<?php get_header() ?>

<main class="archive-post grid-main container">

	<?php get_template_part( '/templates/components/sidebar-blog' ) ?>

	<div class="archive-post__con">
		<h1>
			<?= $title ?>
		</h1>

		<div class="posts-container grid-col-3">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( '/templates/components/card/post' );
				endwhile;
			endif;
			?>
		</div>

		<?php get_template_part( '/templates/components/archive/load-more', null, [ 
			'post_type' => 'post',
			'taxonomy' => $queried->taxonomy,
			'slug' => $queried->slug
		] ) ?>


	</div>


</main>

<?php get_footer() ?>
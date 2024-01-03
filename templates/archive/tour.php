<?php
$sort_items = [ 
	[ 
		'name' => 'اقتصادی',
		'id' => 'economy',
		'order' => 'ASC',
		'meta' => 'star'
	],
	[ 
		'name' => 'لاکچری',
		'id' => 'luxury',
		'order' => 'DESC',
		'meta' => 'star'
	],
]


	?>


<?php get_header() ?>

<?php
get_template_part(
	'/templates/components/archive/archive-sort',
	null,
	[ 'sort_items' => $sort_items ] );
?>

<main class="container"
	  id='archive-tour-page'>
	<div class="posts-container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				get_template_part( '/templates/components/card/tour' );
			}
		} else {
			get_template_part( '/templates/components/not-found' );
		}
		?>
	</div>

	<?php get_template_part( '/templates/components/archive/load-more' ); ?>



</main>

<?php get_footer() ?>
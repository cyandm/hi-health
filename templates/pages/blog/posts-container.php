<?php
$recent_posts = new WP_Query( [ 
	'post_type' => 'post'
] )



	?>


<section>
	<div class="posts-container grid-col-4">
		<?php
		if ( $recent_posts->have_posts() ) :
			while ( $recent_posts->have_posts() ) :
				$recent_posts->the_post();
				get_template_part( '/templates/components/card/post' );
			endwhile;
		endif;
		?>
	</div>


	<div>
		<?php get_template_part( '/templates/components/archive/load-more', null,
			[ 'post_type' => 'post' ]
		) ?>
	</div>

</section>
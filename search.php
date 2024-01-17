<?php

global $wp_query;


$radios = [ 
	[ 
		'name' => pll__( 'all' ),
		'value' => 'default'
	],
	[ 
		'name' => pll__( 'services' ),
		'value' => 'service'
	],
	[ 
		'name' => pll__( 'doctors' ),
		'value' => 'doctor'
	],
	[ 
		'name' => pll__( 'hotels' ),
		'value' => 'hotel'
	],
	[ 
		'name' => pll__( 'tours' ),
		'value' => 'tour'
	],
	[ 
		'name' => pll__( 'posts' ),
		'value' => 'post'
	],
]

	?>


<?php get_header() ?>

<main id="searchPage">

	<div class="search-bar ">
		<div class="search-bar__wrapper | container">
			<form action="<?= get_bloginfo( 'url' ) ?>"
				  class="search-bar__form"
				  id="searchPageForm">
				<div class="form-control">
					<i class="icon-search"></i>
					<input type="text"
						   id="searchPageInput"
						   name="s"
						   value="<?php the_search_query() ?>">
				</div>
				<div class="search-bar__radio-wrapper">
					<span class="search-bar__radio-title">
						<?= pll__( 'search-in' ) . ' :' ?>
					</span>
					<div class="search-bar__radio-group">
						<?php foreach ( $radios as $radio ) : ?>

							<label for="<?= $radio['value'] ?>">
								<input type="radio"
									   name="post_type"
									   id="<?= $radio['value'] ?>"
									   value="<?= $radio['value'] ?>">
								<?= $radio['name'] ?>

							</label>

						<?php endforeach; ?>
					</div>
				</div>
			</form>

			<div class="search-bar__result">
				<span id="foundPosts"><?= $wp_query->found_posts ?></span>
				<span><?= pll__( 'count' ) ?></span>
			</div>
		</div>
	</div>

	<div class="search-posts container"
		 id="postsContainer">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( '/templates/components/card/search', null,
					[ 'complete' => true ] );
			endwhile;
		endif;
		?>
	</div>

</main>


<?php get_footer() ?>
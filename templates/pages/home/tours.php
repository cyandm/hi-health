<?php
$testimonials_title = get_field( 'tour_title' );
$posts = get_field( 'tour_posts' );
$button = get_field( 'tour_button' );


?>


<section class="tours">

	<div class="tours__header container">
		<span class="tours__title | h1">
			<?= $testimonials_title ?>
		</span>

		<a class="btn"
		   variant="secondary"
		   size="big"
		   href="<?= $button['button_link'] ?>">
			<?= $button['button_text'] ?>
		</a>
	</div>

	<div class="tours__posts">

		<div class="swiper"
			 dir="rtl"
			 id="homePageTours">

			<div class="swiper-wrapper">

				<?php foreach ( $posts as $post ) :
					$link = get_field( 'video_link' );
					$file = get_field( 'video_file' );
					$cover = get_field( 'video_cover' );

					$is_pic = ! $file && ! $link;

					if ( ! $cover && ! $file && ! $link )
						continue;

					?>

					<div class="swiper-slide 
							<?= $is_pic ? 'tours__post-picture' : 'tours__post-video' ?>"
						 style="--bg-url:url(<?= $cover ?>)">

						<?php if ( ! $is_pic ) : ?>
							<video width="100%"
								   height="100%">

								<source src="<?= $link ?>" />
								<source src="<?= $file ?>" />
							</video>
						<?php endif; ?>
					</div>

				<?php endforeach; ?>


			</div>

		</div>

	</div>

	<div class="tours__footer container">
		<a class="btn"
		   variant="secondary"
		   size="big"
		   href="<?= $button['button_link'] ?>">
			<?= $button['button_text'] ?>
		</a>
	</div>

</section>
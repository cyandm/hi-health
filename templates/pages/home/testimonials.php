<?php
$home_PageId = get_option('page_on_front');
$testimonials_title = get_field('testimonials_title', $home_PageId);
$posts = new WP_Query([
	'post_type' => 'testimonial',
	'posts_per_page' => -1,
]);


?>


<section class="testimonials">

	<div class="testimonials__header container">
		<span class="h1">
			<?= $testimonials_title ?>
		</span>
	</div>

	<div class="testimonials__posts">
		<div class="swiper" dir="rtl" id="homePageTestimonials">
			<div class="swiper-wrapper">
				<?php
				if ($posts->have_posts()) :

					while ($posts->have_posts()) :
						$posts->the_post();
						echo '<div class="swiper-slide" style="max-width:650px">';
						get_template_part('/templates/components/card/testimonial');
						echo '</div>';
					endwhile;

				else :
					get_template_part('/templates/components/archive/not-found');
				endif;

				wp_reset_postdata();
				?>
			</div>
		</div>

	</div>

</section>
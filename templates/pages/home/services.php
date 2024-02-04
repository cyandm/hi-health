<?php



$first_section = [
	'title' => !empty(get_field('service_first_title')) ? get_field('service_first_title') : 'خدمات درمانی',
	'link' => get_field('view_all_first'),
	'posts' => get_field('service_first')
];

$second_section = [
	'title' => get_field('service_second_title'),
	'link' => get_field('view_all_second'),
	'posts' => get_field('service_second')
];

function render_service_section(
	$title,
	$view_all_link,
	$posts
) {
	$all_services_link = [
		'url' => get_post_type_archive_link('service'),
		'target' => '',
		'title' => pll__('view-all')
	];

	$title = $title !== '' ? $title : pll__('services');

	$service_q = new WP_Query([
		'post_type' => 'service',
		'posts_per_page' => 4
	]);

	$view_all_link = $view_all_link !== '' ? $view_all_link : $all_services_link;
?>

	<section class="service container">

		<div class="service__head">

			<span class="h1">
				<?= $title ?>
			</span>

			<a href="<?= $view_all_link['url'] ?>" target="<?= $view_all_link['target'] ?>" class="btn" size="medium" variant="primary">
				<?= ($view_all_link['title'])  ?>
			</a>
		</div>

		<div class="service__post">
			<?php
			if ($posts !== false) {
				foreach ($posts as $post_id) {
					get_template_part('/templates/components/card/service', null, ['post_id' => $post_id]);
				}
			} else {
				if ($service_q->have_posts()) :
					while ($service_q->have_posts()) :
						$service_q->the_post();
						get_template_part('/templates/components/card/service');
					endwhile;
				endif;

				wp_reset_postdata();
			}
			?>
		</div>

		<div class="service__footer">
			<a href="<?= $view_all_link['url'] ?>" target="<?= $view_all_link['target'] ?>" class="btn" size="medium" variant="primary">
				<?= $view_all_link['title'] ?>
			</a>
		</div>
	</section>

<?php
}


render_service_section($first_section['title'], $first_section['link'], $first_section['posts']);
render_service_section($second_section['title'], $second_section['link'], $second_section['posts']);

?>
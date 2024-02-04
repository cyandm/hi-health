<?php
global $cyn_render;
$sections = get_field('middle_sections');
$testimonials_title = get_field('middle_title') ?? 'قدم به قدم تا بهبودی';


?>


<section class="middle-section | container">

	<span class="middle-section__title | title-s"> <?= $testimonials_title ?> </span>

	<?php

	foreach ($sections as $section) :

		$section = array_filter($section);

		if (count($section) === 0)
			continue;

	?>

		<div class="middle-section__inner">

			<div class="middle-section__inner-content">
				<?php printf('<span class="h1">%s</span>', $section['title']) ?>

				<p>
					<?= $section['description'] ?? '' ?>
				</p>
			</div>

			<div class="middle-section__inner-image">
				<?php $cyn_render->render_image($section['image'] ?? 0) ?>
			</div>
		</div>

	<?
	endforeach;

	?>

</section>
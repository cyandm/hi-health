<?php
$front_page_id = get_option('page_on_front');
$btn_req = get_field('text_btn_req', $front_page_id);


?>


<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>

</head>

<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<div id="swup" class="transition-fade">

		<?php get_template_part('/templates/components/loading') ?>
		<?php get_template_part('/templates/components/reserve-popup') ?>


		<header class="header" front-page="<?= is_front_page() ? 'TRUE' : 'false' ?>" id="mainHeader">

			<section class="container">

				<div class="right-header">

					<div class="header-logo">
						<?php the_custom_logo(); ?>
					</div>

					<div class="header-menu-wrapper">
						<?php wp_nav_menu(
							[
								'menu' => 'primary',
								'menu_class' => 'header-menu'
							]
						); ?>

						<?php get_template_part('/templates/components/mobile-menu') ?>
					</div>



				</div>

				<div class="left-header">

					<div id="langSwitcher">
						<?php
						get_template_part('/templates/components/lang-switcher');
						?>
					</div>


					<div class="header-button">
						<a href="#" class="btn" variant='primary' size='big' id="reservePopUpOpener">
							<i class="icon-form"></i>
							<?= $btn_req ?>
						</a>
					</div>

				</div>

			</section>

		</header>
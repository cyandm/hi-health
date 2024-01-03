<?php
$fornt_page_id = get_option( 'page_on_front' );
$btn_req = get_field( 'text_btn_req', $fornt_page_id );
?>

<?php
$backabsolute = false;
isset( $args['backabsolute'] ) && $backabsolute = $args['backabsolute'];
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<?php wp_head() ?>
	</head>

	<body <?php body_class() ?>>
		<?php wp_body_open() ?>

		<?php get_template_part( '/templates/components/loading' ) ?>


		<header class="header <?php echo $backabsolute == true ? 'backabsolute' : '' ?>">

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

						<?php get_template_part( '/templates/components/mobile-menu' ) ?>
					</div>



				</div>

				<div class="left-header">

					<div class="lang-menu">
						<a href="#"
						   class="lang-btn">
							<img src="<?= get_stylesheet_directory_uri() . '/assets/img/flag-fa.svg' ?>"
								 alt=""
								 id="btn-flag"
								 class="lang-flag">
							<p id="lang-title"
							   class="lang-title">
								Fa
							</p>
						</a>
					</div>

					<div class="header-button">
						<a href="#"
						   class="btn"
						   variant='primary'
						   size='big'
						   id="send-req">
							<i class="icon-form"></i>
							<?= $btn_req ?>
						</a>
					</div>

				</div>

			</section>

		</header>

		<div id="swup"
			 class="transition-fade">
<?php
//region php
$fornt_page_id = get_option('page_on_front');
$social = get_field('social_media', $fornt_page_id);
$whats_app_link = $social['whats_app'];
$instagram_link = $social['instagram'];
$telegram_link = $social['telegram'];

//endregion
?>


<footer>

	<section class="footer">

		<div class="footer-items">
			<div class="container">

				<div class="footer-menu">

					<?php wp_nav_menu([
						'menu' => 'footer-1',
						'menu_class' => 'f-menu'
					]) ?>

					<?php wp_nav_menu([
						'menu' => 'footer-2',
						'menu_class' => 'f-menu'
					]) ?>

					<?php wp_nav_menu([
						'menu' => 'footer-3',
						'menu_class' => 'f-menu'
					]) ?>

				</div>

				<div class="social-media">
					<?php if (isset($whats_app_link)) : ?>

						<a href="<?= $whats_app_link['url']; ?>" class="social-icon">
							<i class="icon-whatsapp"></i>
						</a>

					<?php endif; ?>

					<?php if (isset($instagram_link)) : ?>

						<a href="<?= $instagram_link['url']; ?>" class="social-icon">
							<i class="icon-instagram"></i>
						</a>

					<?php endif; ?>

					<?php if (isset($telegram_link)) : ?>

						<a href="<?= $telegram_link['url']; ?>" class="social-icon">
							<i class="icon-telegram"></i>
						</a>

					<?php endif; ?>

				</div>

			</div>
		</div>

	</section>

</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>
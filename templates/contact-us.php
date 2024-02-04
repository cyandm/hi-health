<?php /* Template Name: Contact us */ ?>

<?php get_header() ?>


<main class="container" id="contactUsPage">

	<section class="contact-us">

		<div class="form-contact">

			<p><?php the_title() ?></p>

			<form method="post" action="" id="contactForm" class="f-contact">

				<div class="contact-name">
					<i class="icon-user"></i>
					<input type="name" id="name" name="name" placeholder="<?php pll_e('form-name') ?>" required>
				</div>

				<div class="contact-email">
					<i class="icon-email"></i>
					<input type="email" id="email" name="email" placeholder="<?php pll_e('form-email') ?>" required>
				</div>

				<div class="contact-textarea">
					<i class="icon-comment"></i>
					<textarea type="textarea" id="textarea" name="description" placeholder="<?php pll_e('form-message') ?>" required></textarea>
				</div>

				<button class="btn" variant='primary' size='big' type="submit" id="submit_form" name="send">
					<?php pll_e('btn-send') ?>
				</button>

			</form>



		</div>

		<div class="img-contact">
			<img src="<?= get_stylesheet_directory_uri() . '/assets/img/contact-us.webp' ?>" alt="contact-us">
		</div>

	</section>

</main>





<?php get_footer() ?>
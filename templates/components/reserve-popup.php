<div class="reserve-popup" id="reservePopUp" data-active="false">
	<div class="reserve-popup__wrapper">
		<div class="reserve-popup__action">
			<button class="btn" size="small" id="reservePopUpCloser" variant="secondary">
				<i class="icon-close"></i>
				<?php pll_e('close') ?>
			</button>
		</div>
		<div class="reserve-popup__content">
			<header>
				<h2><?php pll_e('request-form') ?></h2>

				<p class="body-s">
					<?php pll_e('request-text') ?>
				</p>
			</header>

			<form class="reserve-popup__form" action="#" id="reservePopUpForm">
				<input type="text" name="name" required placeholder="<?php pll_e('form-name') ?>" id="name">
				<input type="text" name="country" placeholder="<?php pll_e('form-country') ?>" id="country">
				<input type="text" name="telephone" required placeholder="<?php pll_e('form-phone') ?>" id="telephone">
				<input type="text" name="email" placeholder="<?php pll_e('form-email') ?>" id="email" required>
				<input type="file" name="file" placeholder="<?php pll_e('form-file') ?>" id="file" required>
				<textarea name="description" placeholder="<?php pll_e('form-message') ?>" id="description" required></textarea>

				<button class="btn" variant="primary" size="big">
					<i class="icon-send"></i>
					<?php pll_e('btn-send') ?>
				</button>
			</form>
		</div>
	</div>
</div>
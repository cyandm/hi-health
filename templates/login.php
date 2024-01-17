<?php /* Template Name: Login Page */?>

<?php

if ( is_user_logged_in() ) {
	wp_redirect( admin_url() );
	return;
}
global $cyn_login;

$registration_enabled = get_option( 'users_can_register' );



get_header();
?>

<main class="login-page container"
	  id="login-page">

	<div class="login">
		<div class="login-form">
			<?php
			wp_login_form( [ 
				'redirect' => admin_url(), // redirect to admin dashboard.
				'form_id' => 'cyn_login_form',
				'label_username' => pll__( 'username' ),
				'label_password' => pll__( 'password' ),
				'label_remember' => pll__( 'remember-me' ),
				'label_log_in' => pll__( 'login' ),
				'remember' => true
			] );
			?>
		</div>

		<div class="login-error">
			<?php
			$err_codes = isset( $_SESSION["err_codes"] ) ? $_SESSION["err_codes"] : 0;
			if ( $err_codes !== 0 ) {
				echo $cyn_login->display_error_message( $err_codes );
			}


			?>
		</div>
	</div>


	<?php if ( $registration_enabled ) : ?>
		<div class="register">
			<div class="register-form">
				<form id="cyn_registration_form"
					  action=""
					  method="POST">
					<p>
						<label for="cyn_user_login"><?= pll__( 'username' ) . ':' ?></label>
						<input name="cyn_user_login"
							   id="cyn_user_login"
							   type="text" />
					</p>
					<p>
						<label for="cyn_user_email">
							<?php pll__( 'email' ) . ':' ?>
						</label>
						<input name="cyn_user_email"
							   id="cyn_user_email"
							   type="email" />
					</p>

					<p>
						<label for="password"><?= pll__( 'password' ) . ':' ?></label>
						<input name="cyn_user_pass"
							   id="password"
							   type="password" />
					</p>
					<p>
						<label for="password_again"><?= pll__( 'repeat-password' ) . ':' ?></label>
						<input name="cyn_user_pass_confirm"
							   id="password_again"
							   type="password" />
					</p>
					<p>
						<input type="submit"
							   value="<?php pll_e( 'login' ); ?>" />
					</p>

				</form>
			</div>

			<div class="register-error">
				<?php $cyn_login->cyn_register_messages(); ?>
			</div>

		</div>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
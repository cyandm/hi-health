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
				'label_username' => __( 'Username:' ),
				'label_password' => __( 'Password:' ),
				'label_remember' => __( 'Remember Me' ),
				'label_log_in' => __( 'ورود به حساب کاربری' ),
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
						<label for="cyn_user_login"><?= __( 'نام کاربری', 'cyn-dm' ) . ':' ?></label>
						<input name="cyn_user_login"
							   id="cyn_user_login"
							   type="text" />
					</p>
					<p>
						<label for="cyn_user_email"><?= __( 'آدرس ایمیل', 'cyn-dm' ) . ':' ?></label>
						<input name="cyn_user_email"
							   id="cyn_user_email"
							   type="email" />
					</p>

					<p>
						<label for="password"><?= __( 'رمز عبور', 'cyn-dm' ) . ':' ?></label>
						<input name="cyn_user_pass"
							   id="password"
							   type="password" />
					</p>
					<p>
						<label for="password_again"><?= __( 'تکرار رمز عبور', 'cyn-dm' ) . ':' ?></label>
						<input name="cyn_user_pass_confirm"
							   id="password_again"
							   type="password" />
					</p>
					<p>
						<input type="submit"
							   value="<?php _e( 'ثبت نام کنید', 'cyn-dm' ); ?>" />
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
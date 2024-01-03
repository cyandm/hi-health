<?php
if ( ! class_exists( 'cyn_login' ) ) {
	class cyn_login {
		function __construct() {
			add_action( 'init', [ $this, 'cyn_add_new_user' ] );
			add_action( 'init', [ $this, 'cyn_redirect_login_page' ] );
			add_filter( 'login_errors', [ $this, 'cyn_error_handler' ] );
		}



		public function cyn_add_new_user() {
			if ( isset( $_POST["cyn_user_login"] ) ) {
				$user_login = sanitize_user( $_POST["cyn_user_login"] );
				$user_email = sanitize_email( $_POST["cyn_user_email"] );
				$user_pass = $_POST["cyn_user_pass"];
				$pass_confirm = $_POST["cyn_user_pass_confirm"];

				if ( username_exists( $user_login ) ) {
					$this->cyn_errors()->add( 'username_unavailable', __( 'کاربری با این نام کاربری وجود دارد', 'cyn-dm' ) );
				}
				if ( ! validate_username( $user_login ) ) {
					$this->cyn_errors()->add( 'username_invalid', __( 'نام کاربری باید با حروف انگلیسی باشد', 'cyn-dm' ) );
				}
				if ( $user_login == '' ) {
					$this->cyn_errors()->add( 'username_empty', __( 'نام کاربری نمی‌تواند خالی باشد', 'cyn-dm' ) );
				}
				if ( ! is_email( $user_email ) ) {
					$this->cyn_errors()->add( 'email_invalid', __( 'ایمیل صحیح نیست', 'cyn-dm' ) );
				}
				if ( email_exists( $user_email ) ) {
					$this->cyn_errors()->add( 'email_used', __( 'کاربری با این ایمیل وجود دارد', 'cyn-dm' ) );
				}
				if ( $user_pass == '' ) {
					$this->cyn_errors()->add( 'password_empty', __( 'رمز عبور نمی‌تواند خالی باشد!', 'cyn-dm' ) );
				}
				if ( $user_pass != $pass_confirm ) {
					$this->cyn_errors()->add( 'password_mismatch', __( 'رمز های عبور با یکدیگر تطابق ندارند', 'cyn-dm' ) );
				}
				$errors = $this->cyn_errors()->get_error_messages();
				if ( empty( $errors ) ) {
					$new_user_id = wp_insert_user( array(
						'user_login' => $user_login,
						'user_pass' => $user_pass,
						'user_email' => $user_email,
						'user_registered' => date( 'Y-m-d H:i:s' ),

					)
					);
					if ( $new_user_id ) {
						wp_new_user_notification( $new_user_id );
						wp_set_auth_cookie( get_user_by( 'email', $user_email )->ID, true );
						wp_set_current_user( $new_user_id, $user_login );
						do_action( 'wp_login', $user_login, wp_get_current_user() );
						wp_redirect( home_url() );
						exit;
					}
				}
			}
		}
		public function cyn_errors() {
			static $wp_error;
			return isset( $wp_error ) ? $wp_error : ( $wp_error = new WP_Error( null, null, null ) );
		}
		public function cyn_register_messages() {
			if ( $codes = $this->cyn_errors()->get_error_codes() ) {
				echo '<div class="cyn-errors">';
				foreach ( $codes as $code ) {
					$message = $this->cyn_errors()->get_error_message( $code );
					echo '<span class="cyn-errors__item"><strong>' . __( 'خطا', 'cyn-dm' ) . '</strong>: ' . $message . '</span>';
				}
				echo '</div>';
			}
		}

		public function cyn_redirect_login_page() {
			$login_url = home_url( '/login' );
			$url = basename( $_SERVER['REQUEST_URI'] ); // get requested URL
			isset( $_REQUEST['redirect_to'] ) ? ( $url = "wp-login.php" ) : 0; // if users ssend request to wp-admin
			if ( $url == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET' ) {
				wp_redirect( $login_url );
				exit;
			}
		}

		public function cyn_error_handler() {
			$login_page = home_url( '/login' );
			global $errors;
			$err_codes = $errors->get_error_codes(); // get WordPress built-in error codes
			$_SESSION["err_codes"] = $err_codes;
			wp_redirect( $login_page ); // keep users on the same page
			exit;
		}



	}
}
?>
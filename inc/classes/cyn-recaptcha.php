<?php
if ( ! class_exists( 'cyn_recaptcha' ) ) {
	class cyn_recaptcha {
		function __construct() {
			add_action( 'wp_head', fn() => wp_enqueue_script( 'google-recaptcha',
				'https://www.google.com/recaptcha/api.js' )
			);
		}

		public function cyn_recaptcha_key() {
			$site_key = "6LeO4EMpAAAAALlkaGK7ZC7dALSWbgi09kcbJgsT";
			$secret_key = "6LeO4EMpAAAAAF7DwqzCo1W_hsljHS5k2HlyneGv";
			return explode( ",", $site_key . "," . $secret_key );
		}

		public function is_valid_captcha( $captcha ) {
			$captcha_post_data = http_build_query( [ 
				'secret' => $this->cyn_recaptcha_key()[1],
				'response' => $captcha,
				'remoteip' => $_SERVER['REMOTE_ADDR'] ] );

			$captcha_opts = [ 'http' => [ 
				'method' => 'POST',
				'header' => 'Content-type: application/x-www-form-urlencoded',
				'content' => $captcha_post_data ] ];

			$captcha_context = stream_context_create( $captcha_opts );
			$captcha_response = json_decode(
				file_get_contents(
					"https://www.google.com/recaptcha/api/siteverify",
					false,
					$captcha_context ),
				true );
			if ( $captcha_response['success'] )
				return true;
			else
				return false;
		}
	}
}
?>
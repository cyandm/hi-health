<?php
if ( ! class_exists( 'cyn_ajax_general' ) ) {
	class cyn_ajax_general {
		function __construct() {
			add_action( 'wp_ajax_cyn_languages', [ $this, 'cyn_languages' ] );
			add_action( 'wp_ajax_nopriv_cyn_languages', [ $this, 'cyn_languages' ] );

			add_action( 'wp_ajax_cyn_ajax_search', [ $this, 'cyn_ajax_search' ] );
			add_action( 'wp_ajax_nopriv_cyn_ajax_search', [ $this, 'cyn_ajax_search' ] );

			add_action( 'wp_ajax_cyn_ajax_search_page', [ $this, 'cyn_ajax_search_page' ] );
			add_action( 'wp_ajax_nopriv_cyn_ajax_search_page', [ $this, 'cyn_ajax_search_page' ] );
		}

		public function cyn_languages() {
			global $cyn_ajax_posts;

			list(
				'_nonce' => $nonce,

			) = $_POST;

			$cyn_ajax_posts->verify_nonce( $nonce );

			$current_lang = pll_current_language( \OBJECT );
			wp_send_json( [ 
				'langAttr' => $current_lang
			] );

		}


		public function cyn_ajax_search() {
			global $cyn_ajax_posts;

			list(
				'_nonce' => $nonce,
				'value' => $value,
				'postType' => $post_type
			) = $_POST;

			$cyn_ajax_posts->verify_nonce( $nonce );

			$q = new WP_Query( [ 
				'post_type' => $post_type,
				'posts_per_page' => 3,
				's' => $value
			] );

			$html = $cyn_ajax_posts->render_by_query( $q, 'search' );


			wp_send_json( [ 
				'html' => $html,
				'foundPosts' => $q->found_posts,
			] );


		}

		public function cyn_ajax_search_page() {
			global $cyn_ajax_posts;

			list(
				'_nonce' => $nonce,
				'post_type' => $post_type,
				's' => $s,
			) = $_POST;



			$cyn_ajax_posts->verify_nonce( $nonce );

			$q = new WP_Query( [ 
				'post_type' => $post_type === 'default' ? null : $post_type,
				'posts_per_page' => -1,
				'orderby' => 'relevance',
				'order' => 'DESC',
				's' => $s
			] );


			$html = $cyn_ajax_posts->render_by_query( $q, 'search', [ 'complete' => true ] );

			wp_send_json( [ 
				'html' => $html,
				'foundPosts' => $q->found_posts,
			] );
		}
	}
}
?>
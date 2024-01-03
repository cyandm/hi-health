<?php
if ( ! class_exists( 'cyn_ajax_actions' ) ) {
	class cyn_ajax_actions {
		function __construct() {
			add_action( 'wp_ajax_cyn_like_post', [ $this, 'cyn_like_post' ] );
			add_action( 'wp_ajax_nopriv_cyn_like_post', [ $this, 'cyn_like_post' ] );
		}

		function cyn_like_post() {
			global $cyn_ajax_posts;

			list(
				'_nonce' => $nonce,
				'active' => $is_user_liked,
				'postId' => $postId,
				'postType' => $postType,
			) = $_POST;

			$is_user_liked = $is_user_liked === 'true' ? true : false;
			$cyn_ajax_posts->verify_nonce( $nonce );



			$like_count = get_post_meta( $postId, 'like_count', true );



			if ( $like_count === '' ) {
				update_post_meta( $postId, 'like_count', 1 );
				wp_send_json( [ 'postUpdated' => true, 'likeCount' => 1 ] );
			}

			if ( ! $is_user_liked ) {
				update_post_meta( $postId, 'like_count', $like_count + 1, $like_count );
				wp_send_json( [ 
					'postUpdated' => true,
					'likeCount' => $like_count + 1,
					'isUserLiked' => true,
				] );

			}

			update_post_meta( $postId, 'like_count', $like_count - 1, $like_count );
			wp_send_json( [ 
				'postUpdated' => true,
				'likeCount' => $like_count - 1,
				'isUserLiked' => false,
			] );


		}
	}
}
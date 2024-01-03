<?php
if ( ! class_exists( 'cyn_ajax_forms' ) ) {
	class cyn_ajax_forms {
		function __construct() {
			add_action( 'wp_ajax_cyn_add_new_comment', [ $this, 'cyn_add_new_comment' ] );
			add_action( 'wp_ajax_nopriv_cyn_add_new_comment', [ $this, 'cyn_add_new_comment' ] );
		}

		public function cyn_add_new_comment() {
			list(
				'content' => $content,
				'parent-id' => $parent_id,
				'post-id' => $post_id,
				'author-name' => $author_name,
			) = $_POST;

			$comment_approved = is_user_logged_in() ? 'approve' : 'hold';



			$response = wp_insert_comment( [ 
				'comment_author' => $author_name,
				'comment_post_ID' => $post_id,
				'comment_content' => $content,
				'comment_parent' => $parent_id === '' ? 0 : $parent_id,
				'comment_approved' => $comment_approved,
				'user_id' => wp_get_current_user()->ID,
			] );


			wp_send_json( [ 
				'commentCreated' => $response,
				'commentStatus' => $comment_approved
			] );


		}
	}
}
?>
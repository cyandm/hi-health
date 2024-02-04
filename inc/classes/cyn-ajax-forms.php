<?php
if (!class_exists('cyn_ajax_forms')) {
	class cyn_ajax_forms
	{
		function __construct()
		{
			add_action('wp_ajax_cyn_add_new_comment', [$this, 'cyn_add_new_comment']);
			add_action('wp_ajax_nopriv_cyn_add_new_comment', [$this, 'cyn_add_new_comment']);

			add_action('wp_ajax_cyn_reserve_form', [$this, 'cyn_reserve_form']);
			add_action('wp_ajax_nopriv_cyn_reserve_form', [$this, 'cyn_reserve_form']);

			add_action('wp_ajax_cyn_contact_us_form', [$this, 'cyn_contact_us_form']);
			add_action('wp_ajax_nopriv_cyn_contact_us_form', [$this, 'cyn_contact_us_form']);
		}

		public function cyn_add_new_comment()
		{
			list(
				'content' => $content,
				'parent-id' => $parent_id,
				'post-id' => $post_id,
				'author-name' => $author_name,
			) = $_POST;

			$comment_approved = is_user_logged_in() ? 1 : 0;



			$response = wp_insert_comment([
				'comment_author' => sanitize_text_field($author_name),
				'comment_post_ID' => $post_id,
				'comment_content' => sanitize_text_field($content),
				'comment_parent' => $parent_id === '' ? 0 : $parent_id,
				'comment_approved' => $comment_approved,
				'user_id' => wp_get_current_user()->ID,
			]);


			wp_send_json([
				'commentCreated' => $response,
				'commentStatus' => $comment_approved
			]);
		}

		public function cyn_reserve_form()
		{
			global $cyn_ajax_posts;


			list(
				'country' => $country,
				'description' => $description,
				'email' => $email,
				'name' => $name,
				'telephone' => $telephone,
				'_nonce' => $_nonce,
			) = $_POST;


			$cyn_ajax_posts->verify_nonce($_nonce);

			if (isset($_FILES['file'])) {
				global $wp_filesystem;
				WP_Filesystem();

				$content_directory = $wp_filesystem->wp_content_dir() . 'uploads/';
				$wp_filesystem->mkdir($content_directory . 'files');
				$target_dir_location = $content_directory . 'files/';

				$ext = end(explode('.', $_FILES['file']['name']));
				$name_file = strtotime(2000) . '.' . $ext;
				$tmp_name = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_name, $target_dir_location . $name_file);

				$file_link = site_url() . '/wp-content/uploads/files/' . $name_file;
			}

			$created_post = wp_insert_post([
				'post_type' => 'form',
				'post_title' => $name,
				'tax_input' => ['form-cat' => [
					get_term_by('slug', 'reserve', 'form-cat')->term_id
				]],
			]);

			add_post_meta($created_post, 'country', sanitize_text_field($country));
			add_post_meta($created_post, 'telephone', sanitize_text_field($telephone));
			add_post_meta($created_post, 'email', sanitize_email($email));
			add_post_meta($created_post, 'description', sanitize_textarea_field($description));
			isset($file_link) && add_post_meta($created_post, 'file_link', $file_link);

			wp_send_json([
				'postCreated' => true
			]);
		}

		public function cyn_contact_us_form()
		{
			global $cyn_ajax_posts;

			list(
				'description' => $description,
				'email' => $email,
				'name' => $name,
				'_nonce' => $_nonce,
			) = $_POST;

			$cyn_ajax_posts->verify_nonce($_nonce);

			$created_post = wp_insert_post([
				'post_type' => 'form',
				'post_title' => $name,
				'tax_input' => ['form-cat' => [
					get_term_by('slug', 'contact-us', 'form-cat')->term_id
				]],
			]);


			add_post_meta($created_post, 'email', sanitize_email($email));
			add_post_meta($created_post, 'description', sanitize_textarea_field($description));
		}
	}
}

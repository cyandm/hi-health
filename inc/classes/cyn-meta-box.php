<?php
if ( ! class_exists( 'cyn_meta_box' ) ) {
	class cyn_meta_box {
		function __construct() {
			add_action( 'add_meta_boxes', [ $this, 'cyn_form_meta_box' ] );

			add_filter( 'manage_form_posts_columns', [ $this, 'cyn_form_table_head' ] );
			add_action( 'manage_form_posts_custom_column', [ $this, 'cyn_form_table_column' ], 10, 2 );


		}

		public function cyn_form_meta_box() {
			add_meta_box( 'information', 'Information', function () {
				global $post;
				?>
				<table>
					<tr>
						<td><?php _e( 'کشور', 'cyn-dm' ) ?></td>
						<td><?= get_post_meta( $post->ID, 'country', true ) ?></td>
					</tr>
					<tr>
						<td><?php _e( 'تلفن', 'cyn-dm' ) ?></td>
						<td>
							<a href="tel:<?= get_post_meta( $post->ID, 'telephone', true ) ?>">
								<?= get_post_meta( $post->ID, 'telephone', true ) ?>
							</a>
						</td>
					</tr>
					<tr>
						<td><?php _e( 'ایمیل', 'cyn-dm' ) ?></td>
						<td>
							<a href="mailto:<?= get_post_meta( $post->ID, 'email', true ) ?> ">
								<?= get_post_meta( $post->ID, 'email', true ) ?>
							</a>
						</td>
					</tr>
					<tr>
						<td><?php _e( 'توضیحات', 'cyn-dm' ) ?></td>
						<td><?= get_post_meta( $post->ID, 'description', true ) ?></td>
					</tr>
					<tr>
						<td><?php _e( 'لینک فایل پیوست', 'cyn-dm' ) ?></td>
						<td>
							<a href="<?= get_post_meta( $post->ID, 'file_link', true ) ?>">
								<?= get_post_meta( $post->ID, 'file_link', true ) ?>
							</a>
						</td>
					</tr>
				</table>
				<?php

			}, 'form', 'advanced', 'high' );
		}

		public function cyn_form_table_head( $columns ) {
			$columns['telephone'] = __( 'شماره تلفن', 'cyn-dm' );
			$columns['email'] = __( 'آدرس ایمیل', 'cyn-dm' );
			return $columns;
		}

		public function cyn_form_table_column( $column_name, $post_id ) {
			if ( $column_name == 'telephone' ) {
				echo get_post_meta( $post_id, 'telephone', true );
			}

			if ( $column_name == 'email' ) {
				echo get_post_meta( $post_id, 'email', true );
			}


		}
	}
}
?>
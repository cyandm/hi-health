<?php

if ( ! class_exists( 'cyn_render' ) ) {

	class cyn_render {

		public function __construct() {
		}


		public function render_image( $img_id, $data_index = 0 ) {
			echo "<div class=\"img-wrapper\" data-index=\"$data_index\">";
			if ( ! $img_id ) {
				printf( '<img src="%s"/>', get_stylesheet_directory_uri() . '/assets/img/placeholder.webp' );
			} else {
				echo wp_get_attachment_image( $img_id, 'full', false, [] );
			}

			echo '</div>';
		}

		public function render_author( $user_id, $date = null ) {
			$post_author_name = get_user_meta( $user_id, 'nickname', true );
			$img_profile_id = get_field( 'custom_thumbnail', 'user_' . $user_id );
			$img_profile = wp_get_attachment_image_url( $img_profile_id );

			if ( false === $img_profile ) {
				$img_profile = get_stylesheet_directory_uri() . '/assets/img/placeholder.webp';
			}

			if ( null !== $date ) {
				echo <<<EOL
				<div class="author-profile">
					<div class="author-profile__image">
						<img src="$img_profile" />
					</div>
					<div class="author-profile__name-group" >
						<span class="author-profile__name">$post_author_name</span>
						<span class="author-profile__date" >$date</span>
					</div>
				</div>
				EOL;

				return;
			}

			echo <<<EOL
				<div class="author-profile">
					<img src="$img_profile" />
					<span>$post_author_name</span>
				</div>
			EOL;


		}

		public function render_icon_text( $field, $icon_name, $class = '' ) {
			if ( empty( $field ) )
				return;

			printf( '
                <span class="%s">
                    <i class="icon-%s"></i>
                    %s
                </span>', $class, $icon_name, $field );
		}

		public function render_zig_zag() {
			printf( '<img src="%s">', get_stylesheet_directory_uri() . '/assets/img/zigzag-border.svg' );
		}

		public function render_content( $length, $post_id = null ) {
			$content = get_the_content( post: $post_id );
			$content = preg_replace( '/<img[^>]+./', '', $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length, 'utf-8' ) . '...';
			}

			return $content;

		}


	}
}


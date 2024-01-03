<?php

if ( ! class_exists( 'cyn_ajax_posts' ) ) {

	class cyn_ajax_posts {

		function __construct() {

			add_action( 'wp_ajax_cyn_sort_posts', [ $this, 'cyn_sort_posts' ] );
			add_action( 'wp_ajax_nopriv_cyn_sort_posts', [ $this, 'cyn_sort_posts' ] );

			add_action( 'wp_ajax_cyn_filter_posts', [ $this, 'cyn_filter_posts' ] );
			add_action( 'wp_ajax_nopriv_cyn_filter_posts', [ $this, 'cyn_filter_posts' ] );

			add_action( 'wp_ajax_cyn_load_more', [ $this, 'cyn_load_more' ] );
			add_action( 'wp_ajax_nopriv_cyn_load_more', [ $this, 'cyn_load_more' ] );
		}

		public function verify_nonce( $nonce ) {
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
				return wp_send_json_error( [ 'verify_nonce' => false ], 403 );
		}

		public function make_query(
			$post_type,
			$slug = null,
			$taxonomy = null,
			$meta = null,
			$order = null,
			$post_per_page = null,
			$paged = 1 ) {

			$args = [ 
				'post_type' => $post_type,
				'post_per_page' => $post_per_page,
				'paged' => $paged,

			];

			if ( isset( $slug ) && $slug !== 'default' ) {
				$args = array_merge( $args,
					[ 
						'tax_query' => [ 
							[ 
								'taxonomy' => $taxonomy,
								'field' => 'slug',
								'terms' => [ $slug ]
							]
						]
					] );
			}

			if ( isset( $order ) ) {
				$args = array_merge( $args, [ 
					'order' => $order,
					'orderby' => 'meta_value_num',
					'meta_key' => $meta,
				] );
			}



			return new WP_Query( $args );
		}

		public function render_by_query( $query, $post_type ) {
			ob_start();

			if ( $query->have_posts() ) {


				while ( $query->have_posts() ) :

					$query->the_post();
					get_template_part( '/templates/components/card/' . $post_type );

				endwhile;
			} else {
				get_template_part( '/templates/components/not-found' );
			}

			wp_reset_postdata();

			return ob_get_clean();
		}


		public function cyn_sort_posts() {
			list(
				'_nonce' => $_nonce,
				'slug' => $slug,
				'meta' => $meta,
				'order' => $order,
				'postType' => $post_type
			) = $_POST;

			$this->verify_nonce( $_nonce );

			$sorted_posts_Q = $this->make_query( $post_type, $slug, meta: $meta, order: $order );
			$response = $this->render_by_query( $sorted_posts_Q, $post_type );

			wp_send_json_success(
				[ 
					'html' => $response,
					'posts_count' => $sorted_posts_Q->found_posts,
					'max_num_pages' => $sorted_posts_Q->max_num_pages
				], 200 );

			exit;
		}

		public function cyn_load_more() {
			global $cyn_general;

			//toxic code :(
			$meta =
				$postType =
				$currentPage =
				$postsPerPage =
				$order =
				$taxonomy =
				$slug =
				$_nonce = null;

			foreach ( $_GET as $key => $value ) {
				$$key = $cyn_general->define_set( $value );
			}

			$this->verify_nonce( $_nonce );



			$rest_posts = $this->make_query(
				$postType,
				$slug,
				$taxonomy,
				$meta,
				$order,
				$postsPerPage,
				$currentPage + 1 );

			$response = $this->render_by_query( $rest_posts, $postType );


			wp_send_json_success(
				[ 
					'html' => $response,
					'rest_posts' => $rest_posts,
					'max_num_pages' => $rest_posts->max_num_pages
				]
				, 200 );
			exit;
		}

		public function cyn_filter_posts() {
			list(
				'_nonce' => $_nonce,
				'slug' => $slug,
				'taxonomy' => $taxonomy,
				'postType' => $post_type,
			) = $_GET;


			$this->verify_nonce( $_nonce );

			$filtered_posts_Q = $this->make_query( $post_type, $slug, $taxonomy );
			$response = $this->render_by_query( $filtered_posts_Q, $post_type );

			wp_send_json_success( [ 
				'html' => $response
			] );

		}

	}
}

?>
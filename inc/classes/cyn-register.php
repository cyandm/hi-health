<?php

if ( ! class_exists( 'cyn_register' ) ) {
	class cyn_register {
		function __construct() {
			add_action( 'init', [ $this, 'cyn_post_type_register' ] );
			add_action( 'init', [ $this, 'cyn_taxonomy_register' ] );
			add_action( 'init', [ $this, 'cyn_term_register' ] );
			add_action( 'init', [ $this, 'cyn_page_register' ] );
		}


		public function cyn_post_type_register() {
			function make_post_type( $name, $slug, $icon,
				$menu = true,
				$taxonomies = [],
				$supports = [ 
					'title',
					'thumbnail',
					'editor',
					'excerpt',
					'page-attributes'
				],

			) {
				$labels = [ 
					'name' => $name,
					'singular_name' => $name,
					'menu_name' => $name . '‌' . 'ها',
					'name_admin_bar' => $name,
					'add_new' => 'افزودن ' . $name,
					'add_new_item' => 'افزودن ' . $name . ' جدید',
					'new_item' => $name . ' جدید',
					'edit_item' => 'ویرایش ' . $name,
					'view_item' => 'دیدن ' . $name,
					'all_items' => 'همه ' . $name . ' ها',
					'search_items' => 'جستجو ' . $name,
					'not_found' => $name . '‌ای پیدا نشد',
					'not_found_in_trash' => $name . ' پیدا نشد'
				];

				$args = [ 
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true,
					'show_in_menu' => $menu,
					'query_var' => true,
					'rewrite' => [ 'slug' => $slug ],
					'exclude_from_search' => false,
					'has_archive' => true,
					'map_meta_cap' => true,
					'hierarchical' => false,
					'taxonomies' => $taxonomies,
					'menu_position' => null,
					'menu_icon' => $icon,
					'supports' => $supports,

				];

				register_post_type( $slug, $args );

			}


			make_post_type( 'خدمت', 'service', 'dashicons-awards', taxonomies: [ 'service-type' ] );

			make_post_type( 'تور', 'tour', 'dashicons-airplane' );

			make_post_type( 'بیمارستان', 'hospital', 'dashicons-heading' );

			make_post_type( 'دکتر', 'doctor', 'dashicons-businessman' );

			make_post_type( 'هتل', 'hotel', 'dashicons-store' );

			make_post_type( 'فرم', 'form', 'dashicons-format-chat', supports: [ 'title' ] );

			make_post_type( 'عضو', 'member', 'dashicons-groups',
				supports: [ 'title', 'thumbnail', 'excerpt' ] );

			make_post_type( 'نظر', 'testimonial', 'dashicons-testimonial', supports: [ 'title' ] );
		}

		public function cyn_taxonomy_register() {

			function make_taxonomy( $name, $slug, $post_types, $is_hierarchical = true ) {
				$labels = [ 
					'name' => $name . '‌ها',
					'singular_name' => $name,
					'search_items' => 'ها' . $name . 'جستجو در',
					'all_items' => 'همه ' . $name . '‌ ها',
					'edit_item' => ' ویرایش ' . $name,
					'update_item' => 'به روز رسانی' . $name,
					'add_new_item' => 'افزودن ' . $name . ' جدید',
					'new_item_name' => $name . ' جدید',
					'menu_name' => $name,
				];

				$args = [ 
					'hierarchical' => $is_hierarchical,
					'labels' => $labels,
					'show_ui' => true,
					'show_admin_column' => true,
					'query_var' => true,
					'rewrite' => [ 'slug' => $slug ],
				];

				register_taxonomy( $slug, $post_types, $args );
			}
			//sample usage
			//make_taxonomy('دسته‌بندی پروژه', 'project-type', ['project']);
			make_taxonomy( 'نوع خدمت', 'service-type', [ 'service' ] );
			make_taxonomy( 'تخصص', 'doctor-expertise', [ 'doctor' ] );
			make_taxonomy( 'نوع تور', 'tour-type', [ 'tour' ] );
			make_taxonomy( 'دسته بندی فرم', 'form-cat', [ 'form' ] );
		}

		public function cyn_term_register() {
			wp_insert_term( __( 'اقتصادی', 'cyn-dm' ), 'tour-type', [ 'slug' => 'economy' ] );
			wp_insert_term( __( 'لاکچری', 'cyn-dm' ), 'tour-type', [ 'slug' => 'luxury' ] );

			wp_insert_term( __( 'تماس با ما', 'cyn-dm' ), 'form-cat', [ 'slug' => 'contact-us' ] );
			wp_insert_term( __( 'درخواست نوبت', 'cyn-dm' ), 'form-cat', [ 'slug' => 'reserve' ] );
		}

		public function cyn_page_register() {
			if ( ! get_option( 'cyn_theme_installed' ) ) {
				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => __( 'درباره ما', 'cyn-dm' ),
					'post_name' => 'about-us',
					'page_template' => 'templates/about.php'
				] );

				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => __( 'صفحه اصلی وبلاگ', 'cyn-dm' ),
					'post_name' => 'home-blog',
					'page_template' => 'templates/.php'
				] );

				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => __( 'صفحه نخست', 'cyn-dm' ),
					'post_name' => 'home',
					'page_template' => 'templates/home.php'
				] );

				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => __( 'تماس با ما', 'cyn-dm' ),
					'post_name' => 'contact-us',
					'page_template' => 'templates/contact.php'
				] );

				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => __( 'ورود و ثبت نام', 'cyn-dm' ),
					'post_name' => 'login',
					'page_template' => 'templates/login.php'
				] );
				update_option( 'cyn_theme_installed', true );
			}
		}
	}
}


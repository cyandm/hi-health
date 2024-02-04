<?php

if (!class_exists('cyn_translate')) {
	class cyn_translate
	{
		function __construct()
		{

			$this->register_translate_general();
			$this->register_translate_login();
			$this->register_translate_btn();
			$this->register_translate_form();
			$this->register_translate_archive();
			$this->register_translate_single();
			$this->register_translate_comments();
			$this->register_translate_post_types();
		}

		public function register_translate_general()
		{

			pll_register_string('close', 'close', 'Cyan');
			pll_register_string('request-form', 'request-form', 'Cyan');
			pll_register_string('request-text', 'request-text', 'Cyan');
			pll_register_string('hi-health-team', 'hi-health-team', 'Cyan');
			pll_register_string('mobile-app-bar-home', 'mobile-app-bar-home', 'Cyan');
			pll_register_string('mobile-app-bar-languages', 'mobile-app-bar-languages', 'Cyan');
			pll_register_string('mobile-app-bar-contact', 'mobile-app-bar-contact', 'Cyan');
			pll_register_string('service-archive-title', 'service-archive-title', 'Cyan');
		}

		public function register_translate_login()
		{
			pll_register_string('username', 'username', 'Cyan');
			pll_register_string('password', 'password', 'Cyan');
			pll_register_string('repeat-password', 'repeat-password', 'Cyan');
			pll_register_string('remember-me', 'remember-me', 'Cyan');
			pll_register_string('login', 'login', 'Cyan');
			pll_register_string('email', 'email', 'Cyan');
		}

		public function register_translate_btn()
		{
			pll_register_string('btn-send', 'btn-send', 'Cyan');
			pll_register_string('btn-pending', 'btn-pending', 'Cyan');
			pll_register_string('btn-success', 'btn-success', 'Cyan');
			pll_register_string('btn-error', 'btn-error', 'Cyan');
			pll_register_string('view-all', 'view-all', 'Cyan');
		}

		public function register_translate_form()
		{
			pll_register_string('form-name', 'form-name', 'Cyan');
			pll_register_string('form-email', 'form-email', 'Cyan');
			pll_register_string('form-message', 'form-message', 'Cyan');
			pll_register_string('form-country', 'form-country', 'Cyan');
			pll_register_string('form-phone', 'form-phone', 'Cyan');
			pll_register_string('form-file', 'form-file', 'Cyan');
			pll_register_string('doctor-search', 'doctor-search', 'Cyan');
			pll_register_string('service-search', 'service-search', 'Cyan');
			pll_register_string('hospital-search', 'hospital-search', 'Cyan');
			pll_register_string('blog-search', 'blog-search', 'Cyan');
			pll_register_string('general-search', 'general-search', 'Cyan');
		}

		public function register_translate_archive()
		{
			pll_register_string('sort-by', 'sort-by', 'Cyan');
			pll_register_string('default', 'default', 'Cyan');
			pll_register_string('founded', 'founded', 'Cyan');
			pll_register_string('sort-economy', 'sort-economy', 'Cyan');
			pll_register_string('sort-luxury', 'sort-luxury', 'Cyan');
			pll_register_string('choose', 'choose', 'Cyan');
			pll_register_string('load-more', 'load-more', 'Cyan');
			pll_register_string('not-found', 'not-found', 'Cyan');
			pll_register_string('more-info', 'more-info', 'Cyan');
			pll_register_string('ago', 'ago', 'Cyan');
			pll_register_string('categories', 'categories', 'Cyan');
			pll_register_string('loading-text', 'loading-text', 'Cyan');
			pll_register_string('top-blogs', 'top-blogs', 'Cyan');
			pll_register_string('view-all', 'view-all', 'Cyan');
			pll_register_string('other-doctors', 'other-doctors', 'Cyan');
			pll_register_string('search-in', 'search-in', 'Cyan');
			pll_register_string('count', 'count', 'Cyan');
		}

		public function register_translate_single()
		{
			pll_register_string('other-details', 'other-details', 'Cyan');
			pll_register_string('contact-info', 'contact-info', 'Cyan');
			pll_register_string('parking', 'parking', 'Cyan');
			pll_register_string('spa', 'spa', 'Cyan');
			pll_register_string('wifi', 'wifi', 'Cyan');
			pll_register_string('pool', 'pool', 'Cyan');
			pll_register_string('coffee-shop', 'coffee-shop', 'Cyan');
			pll_register_string('urgency', 'urgency', 'Cyan');
			pll_register_string('surgery-room', 'surgery-room', 'Cyan');
			pll_register_string('secondary-title', 'secondary-title', 'Cyan');
		}

		public function register_translate_comments()
		{
			pll_register_string('reply', 'reply', 'Cyan');
		}

		public function register_translate_post_types()
		{
			pll_register_string('post', 'post', 'Cyan');
			pll_register_string('doctor', 'doctor', 'Cyan');
			pll_register_string('service', 'service', 'Cyan');
			pll_register_string('hospital', 'hospital', 'Cyan');
			pll_register_string('tour', 'tour', 'Cyan');
			pll_register_string('hotel', 'hotel', 'Cyan');

			pll_register_string('all', 'all', 'Cyan');
			pll_register_string('posts', 'posts', 'Cyan');
			pll_register_string('doctors', 'doctors', 'Cyan');
			pll_register_string('services', 'services', 'Cyan');
			pll_register_string('hospitals', 'hospitals', 'Cyan');
			pll_register_string('tours', 'tours', 'Cyan');
			pll_register_string('hotels', 'hotels', 'Cyan');
		}
	}
}

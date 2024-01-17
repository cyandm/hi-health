<?php

/****************************** Required Files */
require_once( __DIR__ . '/inc/classes/cyn-theme-init.php' );
require_once( __DIR__ . '/inc/classes/cyn-acf.php' );
require_once( __DIR__ . '/inc/classes/cyn-customize.php' );
require_once( __DIR__ . '/inc/classes/cyn-general.php' );
require_once( __DIR__ . '/inc/classes/cyn-register.php' );
require_once( __DIR__ . '/inc/classes/cyn-render.php' );
require_once( __DIR__ . '/inc/classes/cyn-ajax-posts.php' );
require_once( __DIR__ . '/inc/classes/cyn-ajax-actions.php' );
require_once( __DIR__ . '/inc/classes/cyn-login.php' );
require_once( __DIR__ . '/inc/classes/cyn-recaptcha.php' );
require_once( __DIR__ . '/inc/classes/cyn-ajax-forms.php' );
require_once( __DIR__ . '/inc/classes/cyn-meta-box.php' );
require_once( __DIR__ . '/inc/classes/cyn-translate.php' );
require_once( __DIR__ . '/inc/classes/cyn-ajax-general.php' );




/***************************** Instance Classes */
$cyn_theme_init = new cyn_theme_init( false, '0.0.0' );
$cyn_acf = new cyn_acf();
$cyn_customize = new cyn_customize();
$cyn_general = new cyn_general();
$cyn_register = new cyn_register();
$cyn_render = new cyn_render();
$cyn_ajax_posts = new cyn_ajax_posts();
$cyn_ajax_actions = new cyn_ajax_actions();
$cyn_login = new cyn_login();
$cyn_recaptcha = new cyn_recaptcha();
$cyn_ajax_forms = new cyn_ajax_forms();
$cyn_meta_box = new cyn_meta_box();
$cyn_translate = new cyn_translate();
$cyn_ajax_general = new cyn_ajax_general();




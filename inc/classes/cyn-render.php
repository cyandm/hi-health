<?php

if (!class_exists('cyn_render')) {

    class cyn_render
    {

        public function __construct()
        {
        }


        public function render_image($img_id)
        {
            if (!$img_id) {
                printf('<img src="%s"/>', get_stylesheet_directory_uri() . '/assets/img/placeholder.webp');
                return;
            }

            echo wp_get_attachment_image($img_id, 'full', false, []);
        }

        public function render_icon_text($field, $icon_name)
        {
            if (empty($field)) return;

            printf('
                <span>
                    <i class="icon-%s"></i>
                    %s
                </span>', $icon_name, $field);
        }

        public function render_zig_zag()
        {
            printf('<img src="%s">', get_stylesheet_directory_uri() . '/assets/img/zigzag-border.svg');
        }
    }
}

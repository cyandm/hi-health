<?php
$terms = isset($args['terms']) ? $args['terms'] : [];
$search_text = isset($args['search-text']) ? $args['search-text'] : '';
?>




<div class="filter-search-bar__container">
    <div class="filter-search-bar__wrapper container">
        <div class="img-wrapper point-bar">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/point.webp' ?>" alt="airplane">
        </div>
        <div class="filter-search-bar__content">

            <?php get_template_part('/templates/components/search-form', null, ['search-text' => 'پزشکان']) ?>


            <select class="filter-search-bar__cat">
                <option value="none"><?php _e('انتخاب کنید') ?></option>
                <?php
                foreach ($terms as $term) {
                    printf('<option value="%s">%s</option>', $term->slug, $term->name);
                }
                ?>
            </select>

        </div>
        <div class="img-wrapper">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/airplane.webp' ?>" alt="airplane">
        </div>

    </div>
</div>
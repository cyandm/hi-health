<?php
$home_PageId = get_option('page_on_front');
$selected_blogs = get_field('blog_section_select', $home_PageId);
$blogs_section = [
    'title' => !empty(get_field('blog_section_title', $home_PageId)) ? get_field('blog_section_title', $home_PageId) : 'خوندنشون خوبه',
    'btns' => get_field('blog_section_button', $home_PageId),
];

$last_blogs = new WP_Query([
    'post_type' => 'post',
    'post_per_page' => 4,
]);


?>
<section class="blogs-section container">

    <div class="blogs-section__head">
        <span class="h1">
            <?= $blogs_section['title'] ?>
        </span>

        <a href="<?= $blogs_section['btns']['button_link'] ?>" class="btn" size="medium" variant="primary">
            <?= $blogs_section['btns']['button_text'] ?>
        </a>
    </div>

    <div class="blogs-section__content grid-col-4 posts-container">

        <?php
        if ($selected_blogs !== false) {

            foreach ($selected_blogs as $blog_id) {
                get_template_part('/templates/components/card/post', null, ['blog_id' => $blog_id]);
            }
        } else {
            if ($last_blogs->have_posts()) {
                while ($last_blogs->have_posts()) {
                    $last_blogs->the_post();
                    get_template_part('/templates/components/card/post');
                }
            }
        }

        ?>

    </div>

</section>
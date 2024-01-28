<?php

$faq_section = [
    'title' => !empty(get_field('faq_title')) ? get_field('faq_title') : 'سوالات متداول',
    'question' => get_field('faq_questions'),
    'btn' => get_field('faq_button'),
];

$faq_content = new WP_Query([
    'post_type' => 'faq',
    'post_per_page' => -1,
]);

?>

<section class="faq container" id="faq">

    <div class="faq__head">
        <span class="h1">
            <?= $faq_section['title'] ?>
        </span>

        <a href="<?= $faq_section['btn']['button_link'] ?>" class="btn" size="medium" variant="primary">
            <?= $faq_section['btn']['button_text'] ?>
        </a>
    </div>

    <div class="faq__content">

        <?php
        if ($faq_content->have_posts()) :
            while ($faq_content->have_posts()) :
                $faq_content->the_post();
                get_template_part('/templates/components/card/faq');
            endwhile;
        endif;
        ?>

    </div>

</section>
<?php
$terms = get_terms([
    'taxonomy' => 'doctor-expertise',
    'hide_empty' => false
]);

$related_doctors = new WP_Query([
    'post_type' => 'doctor',
]);
?>

<?php get_header() ?>

<main class="item-archive">

    <section>

        <?php get_template_part('/templates/components/filter-search-bar', null, ['terms' => $terms, 'search-text' => 'پزشکان']) ?>

    </section>


    <section class="item-card-archive container">
        <div class="item-cards even-columns">
            <?php
            if ($related_doctors->have_posts()) :
                while ($related_doctors->have_posts()) : $related_doctors->the_post();

                    get_template_part("templates/components/card/doctor");

                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </section>

</main>





<?php get_footer() ?>
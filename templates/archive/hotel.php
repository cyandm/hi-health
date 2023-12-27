<?php
$related_hotels = new WP_Query([
    'post_type' => 'hotel',
]);
?>


<?php get_header() ?>

<main class="item-archive">

    <section class="item-filter">

        <div class="container">flter</div>

    </section>

    <section class="item-card-archive container">
        <div class="item-cards even-columns">
            <?php
            if ($related_hotels->have_posts()) :
                while ($related_hotels->have_posts()) : $related_hotels->the_post();

                    get_template_part("templates/components/card/archive-card");

                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </section>

</main>

<?php get_footer() ?>
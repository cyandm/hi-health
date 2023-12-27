<?php get_header(); ?>

<?php
$post_id = get_queried_object_id();
$feature_img = get_post_thumbnail_id($post_id);

$content_group = get_field('content');
?>



<main class="service-single">
    <?php get_template_part('/templates/components/breadcrumb') ?>

    <section class="service-item grid-main container">

        <aside class="service-side">

        </aside>

        <div class="service-content">

            <div class="service-hero">

                <div class="service-img">
                    <?= wp_get_attachment_image($feature_img, 'full') ?>
                </div>

                <div class="service-excerpt">
                    <h1><?php the_title(); ?></h1>
                    <?= get_field('description'); ?>
                </div>

            </div>

            <div class="group-content">

                <?php foreach ($content_group as $content_gp) : ?>

                    <div class="split-content">
                        <h2 id="ancher"><?= $content_gp['title'] ?></h2>
                        <?= wp_get_attachment_image($content_gp['image'], 'full') ?>
                        <?= $content_gp['text'] ?>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>



</main>


<?php get_footer(); ?>
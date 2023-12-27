<?php
$rate = (int)get_field('rating');
$loc = get_field('hotel_location');
$title_desc = get_field('title_desc');
$hotel_desc = get_field('description');
$hotel_pos = get_field('possibilities');
$more_desc = get_field('more_desc');
$hotel_city = get_field('location_city');
$hotel_country = get_field('location_country');


?>

<!-- <pre>

<?php var_dump($hotel_pos); ?>

</pre> -->


<?php get_header(); ?>


<main class="hotel-single">

    <?php get_template_part('/templates/components/breadcrumb') ?>

    <section class="hotel-details container">
        <div>
            <div class="hotel-rating">
                <?php
                get_template_part('/templates/components/rate', null, ['rate' => $rate])
                ?>
            </div>

            <div class="hotel-name">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="hotel-loc">
                <i class="icon-location"></i>
                <p><?= $loc ?></p>
            </div>
        </div>
    </section>

    <section class="hotel-content container">

        <div>
            <div class="title-desc">
                <p><?= $title_desc ?></p>
            </div>

            <div class="hotel-desc">
                <?= $hotel_desc ?>
            </div>

            <div class="hotel-pos">
                <?php foreach ($hotel_pos as $hotel_poss) : ?>
                    <?php switch ($hotel_poss['value']) {
                        case ('parking'):
                            echo '<span>
                                    <i class="icon-parking"></i>', $hotel_poss["label"];
                            echo '</span>';
                            break;

                        case ('wifi'):
                            echo '<span>
                                    <i class="icon-wifi"></i>', $hotel_poss["label"];
                            echo '</span>';
                            break;

                        case ('pool'):
                            echo '<span>
                                    <i class="icon-pool"></i>', $hotel_poss["label"];
                            echo '</span>';
                            break;

                        case ('spa'):
                            echo '<span>
                                    <i class="icon-spa"></i>', $hotel_poss["label"];
                            echo '</span>';
                            break;

                        case ('coffee'):
                            echo '<span>
                                    <i class="icon-cofee"></i>', $hotel_poss["label"];
                            echo '</span>';
                            break;
                    } ?>

                <?php endforeach; ?>
            </div>

            <?php if (isset($more_desc)) : ?>
                <div class="more-description">

                    <div class="more-description_content">
                        <div>
                            <?= $more_desc ?>
                        </div>
                    </div>

                    <button class="btn-more-desc">
                        نمایش بیشتر
                        <i class="icon-arrow-s-down"></i>
                    </button>

                </div>
            <?php endif ?>

            <div class="hotel-gallery">

            </div>

        </div>

    </section>

    <section class="hotel-info container">
        <div>
            <p><?php _e("مشخصات") ?></p>

            <div class="hotel-place">
                <span><?= $hotel_city ?></span>
                <span><?= $hotel_country ?></span>
            </div>

        </div>
    </section>

</main>


<?php get_footer(); ?>
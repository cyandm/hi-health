<?php
global $cyn_render;

$doctor_id = get_the_ID();
$doctor_img = get_post_thumbnail_id($doctor_id);


$expertise = get_field('expertise');
$exprience  = get_field('experience');



?>
<a href=<?= get_permalink($doctor_id) ?>>
    <div class="item-card">

        <div class="item-img">
            <?php $cyn_render->render_image($doctor_img) ?>
        </div>

        <div class="doctor-details">

            <p class="doctor-name"><?php the_title() ?></p>
            <p class="doctor-caption"><?= get_field('short_text') ?></p>

            <?php $cyn_render->render_zig_zag() ?>

            <div class="doctor-detail">
                <?php $cyn_render->render_icon_text($expertise, 'speciality') ?>
                <?php $cyn_render->render_icon_text($exprience, 'glasses') ?>
            </div>

        </div>

    </div>
</a>
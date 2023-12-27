<?php
global $cyn_render;

$item_id = get_the_ID();
$item_img = get_post_thumbnail_id($item_id);


$expertise = get_field('expertise');
$exprience  = get_field('experience');



?>
<a href=<?= get_permalink($item_id) ?>>
    <div class="item-card">

        <div class="item-img">
            <?php $cyn_render->render_image($item_img) ?>
        </div>

        <div class="item-details">

            <p class="item-name"><?php the_title() ?></p>
            <p class="item-caption"><?= get_field('short_text') ?></p>

            <?php $cyn_render->render_zig_zag() ?>

            <div class="item-detail">
                <?php $cyn_render->render_icon_text($expertise, 'speciality') ?>
                <?php $cyn_render->render_icon_text($exprience, 'glasses') ?>
            </div>

        </div>

    </div>
</a>
<?php
$home_PageId = get_option('page_on_front');
$middle_banner = get_field("img_banner", $home_PageId);
?>

<section class="middle-banner">

    <div class="middle-banner__desktop">
        <?= wp_get_attachment_image($middle_banner['img_banner_d'], 'full'); ?>
    </div>

    <div class="middle-banner__mobile">
        <?= wp_get_attachment_image($middle_banner['img_banner_m'], 'full'); ?>
    </div>

</section>
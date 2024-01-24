<?php $faq_id = get_the_ID();
?>


<div class="faq__content__items">
    <div class="faq__content__question">
        <p><?= get_the_title($faq_id) ?></p>
        <i class="icon-arrow-m-down"></i>
    </div>


    <div class="faq__content__answer">
        <div>
            <p><?= get_the_content($faq_id); ?></p>
        </div>
    </div>
</div>
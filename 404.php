<?php get_header(); ?>

<main class="container">

    <section class="err-page">

        <div class="err-content">

            <div class="err-img">
                <img src="<?= get_stylesheet_directory_uri() . '/assets/img/404.webp' ?>" alt="404">
            </div>

            <div class="err-btn">
                <a href="/" class="big-btn">بازگشت به صفحه اصلی</a>
            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>
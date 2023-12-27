<?php /* Template Name: contact-us */ ?>

<?php get_header() ?>


<main class="container">

    <section class="contact-us">

        <div class="form-contact">

            <p>تماس با ما</p>

            <form method="post" action="" id="contact_form" class="f-contact">

                <div class="contact-name">
                    <i class="icon-user"></i>
                    <input type="name" id="name" name="name" placeholder="نام خود را وارد کنید">
                </div>

                <div class="contact-email">
                    <i class="icon-email"></i>
                    <input type="text" id="email" name="email" placeholder="ایمیل">
                </div>

                <div class="contact-textarea">
                    <i class="icon-comment"></i>
                    <textarea type="textarea" id="textarea" name="message" placeholder="پیام خود را بنویسید"></textarea>
                </div>

                <button class="big-btn" type="submit" id="submit_form" name="send">ارسال پیام</button>

            </form>

            <div class="form-message success" id="success_message"></div>
            <div class="form-message fail" id="fail_message"></div>

        </div>

        <div class="img-contact">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/contact-us.webp' ?>" alt="contact-us">
        </div>

    </section>

</main>





<?php get_footer() ?>
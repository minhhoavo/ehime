<?php get_header(); ?>
<main class="contact">
    <section class="contact-banner">
        <img class="contact-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact-banner.jpg" alt="お問い合わせ">
        <h1 class="contact-banner__title">CONFIRM<span class="contact-banner__caption">お問い合わせ内容確認</span></h1>
    </section>
    <section class="contact-form">
        <div class="contact-form__cover">
            <div class="contact-form__top">
                <div class="contact-form__wrap l-container">
                    <?php custom_breadcrumbs(); ?>
                    <h2 class="contact-form__title">一般･学生の皆様へ</h2>
                    <p class="contact-form__desc">以下の内容を送信してもよろしいですか？</p>
                </div>
            </div>
            <div class="contact-form__main contact-form__content l-container">
                <?php echo do_shortcode('[mwform_formkey key="162"]'); ?>
            </div>
        </div>
    </section>
    <div class="c-backtotop">
        <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </div>
</main>
<?php get_footer(); ?>
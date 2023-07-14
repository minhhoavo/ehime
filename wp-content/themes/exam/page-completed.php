<?php get_header(); ?>
<main class="contact">
    <section class="contact-banner">
        <img class="contact-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact-banner.jpg" alt="お問い合わせ">
        <h1 class="contact-banner__title">THANK YOU!<span class="contact-banner__caption">お問い合わせ完了</span></h1>
    </section>
    <section class="contact-form">
        <div class="contact-form__cover">
            <div class="contact-form__top">
                <div class="contact-form__wrap l-container">
                    <?php custom_breadcrumbs(); ?>
                    <h2 class="contact-form__title">お問い合わせ、ありがとうございました。</h2>
                    <p class="contact-form__desc">メール確認後、担当者よりご連絡させていただきます。<br>
                    万一、当方からの返信がない場合は、メッセージの送信に失敗している可能性があります。<br>
                    その際は大変恐縮ですが、再度お問い合わせいただくか、別の手段にてご連絡お願いいたします。</p>
                </div>
            </div>
            <div class="contact-form__main contact-form__content l-container">
                <a class="c-btn contact-form__btn" href="<?php bloginfo('url'); ?>">TOPに戻る</button>
                <?php echo do_shortcode('[mwform_formkey key="162"]'); ?>
            </div>
        </div>
    </section>
    <div class="c-backtotop">
        <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </div>
</main>
<?php get_footer(); ?>
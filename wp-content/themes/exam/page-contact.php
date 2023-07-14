<?php get_header(); ?>
<main class="contact">
    <section class="contact-banner">
        <img class="contact-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact-banner.jpg" alt="お問い合わせ">
        <h1 class="contact-banner__title">CONTACT<span class="contact-banner__caption">お問い合わせ</span></h1>
    </section>
    <section class="contact-form">
        <div class="contact-form__cover">
            <div class="contact-form__top">
                <div class="contact-form__wrap l-container">
                    <?php custom_breadcrumbs(); ?>
                    <h2 class="contact-form__title">一般･学生の皆様へ</h2>
                    <p class="contact-form__desc">
                        この度は愛媛シゴト図鑑をご覧いただきありがとうございます。<br>
                        愛媛シゴト図鑑を見て疑問に思ったこと、ご質問等ございましたら下記の問い合わせフォームにて意見をお寄せください 。少し聞きづらいなと思うようなことも遠慮なくご質問ください。愛媛シゴト図鑑は頑張る就活生を応援しています！<br>
                        個人情報の取扱に関しましては、<a class="contact-form__desclink" href="#">プライバシーポリシー</a>をご確認ください。<br>
                        <span class="contact-form__descclr">※は入力必須です。</span>
                    </p>
                    <p class="contact-form__alert">入力内容を確認してください。</p>
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
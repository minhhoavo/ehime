<?php get_header(); ?>
<main class="about">
    <section class="about-banner">
    <img class="about-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-banner.jpg" alt="愛媛シゴト図鑑とは">
    <h1 class="about-banner__title">ABOUT<span class="about-banner__caption">愛媛シゴト図鑑とは</span></h1>
    </section>
    <section class="about-concept">
        <div class="about-concept__top">
            <div class="about-concept__wrap l-container">
            <?php custom_breadcrumbs(); ?>
            <h2 class="about-concept__title">
                <span class="about-concept__caption">愛媛シゴト図鑑のコンセプト</span>
                <span class="about-concept__titleclr">仕事選びの不安を無くしたい</span>
            </h2>
            <div class="about-concept__symbol">
                <img class="about-concept__symbolimg" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-img.png" alt="仕事選びの不安を無くしたい">
            </div>
            </div>
        </div>
        <?php if( have_rows('about') ): ?>
        <div class="about-concept__content">
            <?php while( have_rows('about') ): the_row(); ?>
            <div class="about-concept__item">
                <div class="about-concept__left">
                    <h3 class="about-concept__texttitle"><?php echo get_sub_field('title'); ?></h3>
                    <p class="about-concept__desc"><?php echo get_sub_field('content'); ?></p>
                </div>
                <div class="about-concept__right">
                <?php if( get_sub_field('image') ): ?>
                    <img class="about-concept__img" src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('title'); ?>">
                <?php else : ?> 
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/company/no-image.png" alt="no image available">
                <?php endif; ?>	
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>	
    </section>

    <?php
    $company_name = get_field('company_name');
    $date_of_establishment = get_field('date_of_establishment');
    $capital = get_field('capital');
    $accounting_period = get_field('accounting_period');
    $head_office_location = get_field('head_office_location');
    $tel = get_field('tel');
    $fax = get_field('fax');
    $business_content = get_field('business_content');
    $history = get_field('history');
    $hp = get_field('hp');
    $mail = get_field('mail');
    if(!(empty($company_name) && empty($date_of_establishment) && empty($capital) && empty($accounting_period) && empty($head_office_location) && empty($tel) && empty($fax) && empty($business_content) && empty($history) && empty($hp) && empty($mail))): ?>
    <section class="about-company">
    <h2 class="about-company__title">運営会社</h2>
    <div class="about-company__content">
        <div class="about-company__list">
        <?php if( get_field('company_name') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">社名</dt>
                <dd class="about-company__dd"><?php echo get_field('company_name'); ?></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('date_of_establishmente') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">設立日</dt>
                <dd class="about-company__dd"><?php echo get_field('date_of_establishment'); ?></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('capital') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">資本金</dt>
                <dd class="about-company__dd"><?php echo get_field('capital'); ?></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('accounting_period') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">決算期</dt>
                <dd class="about-company__dd"><?php echo get_field('accounting_period'); ?></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('head_office_location') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">本社所在地</dt>
                <dd class="about-company__dd">
                    <span class="about-company__txt"><?php echo get_field('head_office_location'); ?></span>
                    <?php if( get_field('tel') ): ?>
                        <a class="about-company__tel" href="tel:<?php echo get_field('tel'); ?>">TEL：<?php echo get_field('tel'); ?>　</a>
                    <?php endif; ?>
                    <?php if( get_field('fax') ): ?>
                        <span>FAX：<?php echo get_field('fax'); ?></span>
                    <?php endif; ?>	
                </dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('business_content') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">事業内容</dt>
                <dd class="about-company__dd"><?php echo get_field('business_content'); ?></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('history') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">沿革</dt>
                <dd class="about-company__dd">
                    <span class="about-company__txt"><?php echo get_field('history'); ?></span>
                </dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('hp') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">HP</dt>
                <dd class="about-company__dd"><a class="about-company__link" href="<?php echo get_field('hp'); ?>" target="_blank"><?php echo get_field('hp'); ?></a></dd>
            </dl>
        <?php endif; ?>	
        <?php if( get_field('mail') ): ?>
            <dl class="about-company__dl">
                <dt class="about-company__dt">Mail</dt>
                <dd class="about-company__dd"><a class="about-company__link" href="<?php echo get_field('mail'); ?>"><?php echo get_field('mail'); ?></a></dd>
            </dl>
        <?php endif; ?>	
        </div>
    </div>
    </section>
    <?php endif; ?>
    <div class="c-backtotop">
    <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </div>
</main>
<?php get_footer(); ?>
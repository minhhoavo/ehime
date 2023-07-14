<?php get_header(); ?>
<section class="home-mainvisual">
    <div class="home-mainvisual__banner">
        <?php if( have_rows('slides') ): ?>
            <div class="home-mainvisual__slider">
                <?php while( have_rows('slides') ): the_row(); ?>
                    <div class="home-mainvisual__myslide">
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo get_sub_field('imagesp')['url'] ?>">
                            <img class="home-mainvisual__img" src="<?php echo get_sub_field('image')['url'] ?>" alt="未来の先輩から生の声が届きました。">
                        </picture>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="innerwrap l-container">
        <div class="home-mainvisual__inner">
          <h1><img class="home-mainvisual__catch" src="<?php echo get_template_directory_uri(); ?>/assets/img/mv/mv-catch.png" alt="未来の先輩から生の声が届きました。"></h1>
          <p class="home-mainvisual__caption">2020年卒学生向けの企業紹介サイト</p>
        </div>
      </div>
    </div>
</section>

<main class="home">
    <section class="home-interview">
        <div class="home-interview__top">
            <h2 class="c-title c-title--white">
                <span class="c-caption c-caption--white">Pick Up</span>
                新着ピックアップ
            </h2>
        </div>
        <div class="home-interview__content">
            <div class="home-interview__prev"></div>
            <?php if( have_rows('interview') ): ?>
                <div class="home-interview__list home-interview__slider">
                    <?php while( have_rows('interview') ): the_row(); ?>
                        <div class="home-interview__item">
                            <a class="home-interview__block" href="#">
                                <div class="home-interview__image">
                                <img class="home-interview__img" src="<?php echo get_sub_field('image')['url'] ?>" alt="<?php echo get_sub_field('label') ?>">
                                <span class="home-interview__label"><?php echo get_sub_field('label') ?></span>
                                </div>
                                <div class="home-interview__banner">
                                <h3 class="home-interview__title"><?php echo get_sub_field('title') ?></h3>
                                <p class="home-interview__desc"><?php echo get_sub_field('description') ?></p>
                                </div> 
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="home-interview__next"></div>
        </div>
    </section>

    <?php
        $the_query = new WP_Query(array(
            'post_type' => 'company', 
            'posts_per_page' => 6, 
            'orderby' => 'rand'
        ));
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <section class="home-infor">
        <div class="home-infor__top">
        <h2 class="c-title">
            <span class="c-caption c-caption--infor">Corporate Information</span>
            企業一覧
        </h2>
        <p class="home-infor__text">愛媛で働きたい。<br class="is-nobreak">けれど、どんな会社があるか分からない。<br>愛媛シゴト図鑑では、愛媛に本社がある企業のみご紹介！</p>
        </div>
        <div class="home-infor__content l-container">
            <div class="home-infor__list">
                <?php
                    while ($the_query->have_posts()) : $the_query->the_post();
                    $post = get_post();
                    $taxonomies = get_object_taxonomies($post);   
                    $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
                ?>
                    <a class="c-box__item c-box__item--2" href="<?php echo get_permalink($post->ID); ?>">
                        <div class="c-box__image">
                            <?php if( have_rows('slider_company') ): ?><?php while( have_rows('slider_company') ): the_row(); ?>
                                <picture>
                                    <source media="(max-width: 767px)" srcset="<?php echo get_sub_field('imagesp')['url']; ?>">
                                    <img class="c-box__img" src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_the_title($post->ID);?>">
                                </picture>
                            <?php endwhile; ?>	
                            <?php else : ?> 
                                <img class="c-box__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/company/no-image.png" alt="no image available">
                            <?php endif; ?>	
                        </div>
                        <div class="c-box__banner">
                            <h3 class="c-box__title"><?php echo get_the_title($post->ID); ?></h3>
                            <span class="c-box__caption"><?php echo get_field('location'); ?></span>
                            <p class="c-box__desc"><?php echo get_field('message'); ?></p>
                            <?php if(!empty($taxonomy_names)) :
                                foreach($taxonomy_names as $tax_name) : ?>
                                    <span class="c-box__label"><?php echo $tax_name; ?></span>
                                <?php endforeach;
                            endif;?>
                        </div>
                    </a>
                <?php
                    endwhile;
                ?>
            </div>
            <a class="c-btn c-btn--infor" href="<?php echo get_site_url(); ?>/company"">企業一覧はこちら</a>
        </div>
    </section>
    <?php
        endif;
    ?>
    <?php
        $the_query = new WP_Query(array(
            'order' => 'DESC', 
            'post_type' => 'post', 
            'posts_per_page' => 5, 
            'orderby' => 'date'
        ));
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <section class="home-news">
        <div class="home-news__top">
            <h2 class="c-title c-title--news">
                <span class="c-caption c-caption--news">News</span>
                新着ニュース
            </h2>
        </div>
        <div class="home-news__content">
            <div class="home-news__list">
                <?php
                    while ($the_query->have_posts()) : $the_query->the_post();
                    $post = get_post();
                ?>
                    <div class="home-news__dl">
                        <a class="home-news__item" href="#">
                            <p class="home-news__dt"><?php echo get_the_date('Y.m.d'); ?></p>
                            <p class="home-news__dd"><?php echo get_the_title($post->ID); ?></p>
                        </a>
                    </div>
                <?php
                    endwhile;
                ?>
            </div>
            <div class="home-news__btn">
                <a class="c-btn" href="#">ニュース一覧はこちら</a>
            </div>
        </div>
    </section>
    <?php
        endif;
    ?>
    <div class="home-connect">
    <div class="home-connect__wrap l-container l-container--w1416">
      <div class="home-connect__left">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connect-img1.jpg">
          <img class="home-connect__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connect-img1.jpg" alt="愛媛シゴト図鑑とは">
        </picture>
      </div>
      <div class="home-connect__center">
        <div class="home-connect__image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connectSP-imgcent.png">
            <img class="home-connect__imgcent" src="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connect-imgcent.png" alt="愛媛シゴト図鑑は、これから就職を目指す若者と、">
          </picture>
        </div>
        <p class="home-connect__text">愛媛シゴト図鑑は、これから就職を目指す若者と、<br>愛媛の企業をつなぐ役割を担っています。</p>
        <a class="c-btn c-btn--white is-pc" href="#">愛媛シゴト図鑑とは</a>
      </div>
      <div class="home-connect__right">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connect-img2.jpg">
          <img class="home-connect__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/connect/connect-img2.jpg" alt="わたしたちについて">
        </picture>
      </div>
      <a class="c-btn c-btn--white is-tab" href="#">愛媛シゴト図鑑とは</a>
    </div>
  </div>
  <div class="c-backtotop">
    <picture>
      <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotopSP.svg"> 
      <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </picture>
  </div>
</main>
<?php get_footer(); ?>

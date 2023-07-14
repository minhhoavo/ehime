<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title><?php if(is_home() || is_front_page()){
		echo 'Home ';
	}else{
		wp_title('');
	} ?> | Ehime</title>
	<meta name="description" content="<?php if(is_home() || is_front_page()){
		echo 'Home ';
	}else{
		wp_title('');
	} ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>

<body>
<header class="c-header">
      <div class="c-header__cover l-container">
        <div class="c-header__top">
          <a class="c-header__more" href="#" target="_blank">掲載・取材依頼の企業様へ</a>
        </div>
        <div class="c-header__bottom">
          <div class="c-header__logo">
            <a href="<?php bloginfo('url'); ?>">
              <picture>
                <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/header/h-logoSP.png">
                <img class="c-header__logoimg" src="<?php echo get_template_directory_uri(); ?>/assets/img/header/h-logo.png" alt="Ehime Keizai">
              </picture>
            </a>
          </div>
          <nav class="c-header__nav">
            <ul class="c-header__menu">
              <li class="c-header__item">
                <a class="<?php if (is_post_type_archive('company')){ echo 'is-active';};?> c-header__link" href="<?php echo get_site_url(); ?>/company"">企業一覧</a>
              </li>
              <li class="c-header__item">
                <a class="<?php $current_page = get_the_title(); if ($current_page == '愛媛シゴト図鑑とは'){ echo 'is-active';}?> c-header__link" href="<?php echo get_site_url(); ?>/about"">愛媛シゴト図鑑とは</a>
              </li>
              <li class="c-header__item">
                <a class="c-header__link" href="#">インタビュー</a>
              </li>
              <li class="c-header__item">
                <a class="c-header__link" href="#">ニュース</a>
              </li>
              <li class="c-header__item">
                <a class="<?php $current_page = get_the_title(); if ($current_page == 'お問い合わせ'){ echo 'is-active';}?> c-header__link" href="<?php echo get_site_url(); ?>/contact"">お問い合わせ</a>
              </li>
            </ul>
          </nav>
          <div class="c-header__rightmb">
            <a class="c-header__contact" href="<?php echo get_site_url(); ?>/contact"">
              <i class="c-header__contacticon fa-regular fa-envelope fa-3x" style="color: #ffffff;"></i>
              <span class="c-header__contactlink">お問い合わせ</span>
            </a>
            <div class="c-header__hamburger">
              <span class="c-header__line"></span>
              <span class="c-header__line"></span>
              <span class="c-header__line"></span>
              <span class="c-header__linetxt c-header__linetxt--close">メニュー</span>
              <span class="c-header__linetxt c-header__linetxt--open">閉じる</span>
            </div>
          </div>
          <nav class="c-header__navmb">
            <ul class="c-header__menumb">
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="index.html">ホーム</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="<?php echo get_site_url(); ?>/company"">企業一覧</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="<?php echo get_site_url(); ?>/about"">愛媛シゴト図鑑とは</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="#">インタビュー</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="#">ニュース</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="#">運営会社</a></li>
              <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="<?php echo get_site_url(); ?>/contact"">お問い合わせ</a></li>
            </ul>
            <div class="c-header__infor">
              <a class="c-header__num" href="tel:0899471411"><span class="c-header__tel">TEL.</span>089-947-1411</a><br>
              <p class="c-header__time">受付時間9:00〜17:00（平日のみ）</p>
            </div>
            <div class="c-header__end">
              <a class="c-header__btnprintf" href="#">掲載・取材のご依頼についてはこちら</a>
              <ul>
                <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="#">プライバシーポリシー</a></li>
                <li class="c-header__item"><a class="c-header__link c-header__linkmb" href="#">利用規約</a></li>
              </ul>
              <a class="c-header__btnclose" href="#"><i class="c-header__iconclose fa-solid fa-xmark"></i>閉じる</a>
            </div>
          </nav>
        </div>
      </div>
    </header>
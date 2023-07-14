<?php get_header(); ?>
<?php
    $post = get_post();
    $taxonomies = get_object_taxonomies($post);   
    $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
?>
<main class="company">
    <section class="company-banner">
        <img class="company-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/company/company-banner.jpg" alt="企業一覧">
        <h1 class="company-banner__title">CORPORATE INFORMATION<span class="company-banner__caption">企業一覧</span></h1>
    </section>
    <section class="company-single">
        <div class="company-single__top">
            <div class="company-single__wrap l-container">
                <?php custom_breadcrumbs();?>
                <div class="c-box__item c-box__item--1  l-container" href="#">
                    <?php if( have_rows('slider_company') ): ?>
                        <div class="company-single__slider">  
                            <?php while( have_rows('slider_company') ): the_row(); ?>
                                <div class="c-box__image">
                                    <img class="c-box__img" src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_the_title($post->ID);?>">
                                    <div class="c-box__notice"><span class="c-box__noticetxt"><?php echo get_sub_field('caption'); ?></span></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php else : ?> 
                            <div class="company-single__slider"> 
                                <div class="c-box__image">
                                    <img class="c-box__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/company/no-image.png" alt="no image available">
                                    <div class="c-box__notice"><?php echo get_sub_field('caption'); ?></div>
                                </div>
                            </div>
                    <?php endif; ?>
               
                    <div class="c-box__banner">
                        <p class="c-box__date"><?php echo get_the_date('Y.m.d'); ?></p>
                        <h2 class="c-box__title"><?php echo get_the_title($post->ID);?></h2>
                        <span class="c-box__caption"><?php echo get_field('location'); ?></span>
                        <p class="c-box__desc"><?php echo get_field('message'); ?></p>
                        <?php if(!empty($taxonomy_names)) :
                            foreach($taxonomy_names as $tax_name) : ?>
                                <span class="c-box__label"><?php echo $tax_name; ?></span>
                            <?php endforeach;
                        endif;?>
                        <p class="c-box__text"><?php echo get_the_content();?></p>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $company_name = get_field('company_name');
    $url = get_field('url');
    $address = get_field('address');
    $number_of_employee = get_field('number_of_employee');
    $business_content = get_field('business_content');
    $tel = get_field('tel');
    $president = get_field('president');
    $established = get_field('established');
    $recruit = get_field('recruit');
    if(!(empty($company_name) && empty($url) && empty($address) && empty($number_of_employee) && empty($business_content) && empty($tel) && empty($president) && empty($established) && empty($recruit ))): ?>
    <section class="company-single__box l-container">
        <div class="company-single__boxwrap">
            <div class="company-single__left">
                <span class="company-single__data">企業DATA</span>
            </div>
            <div class="company-single__right">
                <div class="company-single__righttop">
                    <?php if( get_field('company_name') ): ?>
                        <h4 class="company-single__title"><?php echo get_field('company_name'); ?></h4>
                    <?php endif; ?>
                    <?php if( get_field('url') ): ?>
                        <a class="company-single__link" target="_blank" href="<?php echo get_field('url'); ?>"><?php echo get_field('url'); ?><i class="fa-solid fa-up-right-from-square"></i></a>
                    <?php endif; ?>
                </div>
                <div class="company-single__rightcent">
                    <?php if(!(empty($address) && empty($number_of_employee) && empty($business_content))): ?>
                        <div class="company-single__row">
                            <?php if( get_field('address') ): ?>
                                <div class="company-single__column">
                                    <span class="company-single__collabel">本社</span>
                                    <p class="company-single__coltext"><?php echo get_field('address'); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if( get_field('number_of_employee') ): ?>
                                <div class="company-single__column">
                                    <span class="company-single__collabel">TEL</span>
                                    <p class="company-single__coltext"><?php echo get_field('tel'); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if( get_field('business_content') ): ?>
                                <div class="company-single__column">
                                    <span class="company-single__collabel">設立</span>
                                    <p class="company-single__coltext"><?php echo get_field('established'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!(empty($tel) && empty($president))): ?>
                        <div class="company-single__row">
                            <?php if( get_field('tel') ): ?>
                                <div class="company-single__column">
                                    <span class="company-single__collabel">従業員数</span>
                                    <p class="company-single__coltext"><?php echo get_field('number_of_employee'); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if( get_field('president') ): ?>
                                <div class="company-single__column">
                                    <span class="company-single__collabel">代表者</span>
                                    <p class="company-single__coltext"><?php echo get_field('president'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('established') ): ?>
                        <div class="company-single__row">
                            <div class="company-single__column">
                                <span class="company-single__collabel">事業内容</span>
                                <p class="company-single__coltext"><?php echo get_field('business_content'); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if( get_field('recruit') ): ?>
                    <div class="company-single__rightbot">
                        <div class="company-single__count">
                        <p class="company-single__countleft"><span class="company-single__counttxtl">新卒採用実績</span></p>
                        <p class="company-single__countright"><span class="company-single__counttxtr"><?php echo get_field('recruit'); ?></span></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php
    $strength = have_rows('strength');
    $serviceus = have_rows('service_us');
    if(!(empty($strength) && empty($serviceus))): ?>
    <section class="company-single__service l-container l-container--w780">
        <?php if( have_rows('strength') ): ?>
            <div class="company-single__serblock">
                <h2 class="company-single__sertitle">会社のココが良い！</h2>
                <?php while( have_rows('strength') ): the_row(); ?>
                    <div class="company-single__sercont">
                        <h3 class="company-single__serttl"><?php echo get_sub_field('title'); ?></h3>
                        <p class="company-single__serdesc"><?php echo get_sub_field('description'); ?></p>
                    </div>
                <?php endwhile; ?>    
            </div>
        <?php endif; ?>
        <?php if( have_rows('service_us') ): ?>
            <div class="company-single__serblock">
                <h2 class="company-single__sertitle">我が社の サービス</h2>
                <?php while( have_rows('service_us') ): the_row(); ?>
                    <a href="#" class="company-single__sercont">
                        <div class="company-single__serimage">
                            <?php if( get_sub_field('image') ): ?>
                                <img class="company-single__serimg" src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('title'); ?>">
                            <?php else : ?> 
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/company/no-image.png" alt="no image available">
                            <?php endif; ?>	
                        </div>
                        <div class="company-single__sertxt">
                            <h3 class="company-single__serttl"><?php echo get_sub_field('title'); ?></h3>
                            <p class="company-single__serdesc"><?php echo get_sub_field('description'); ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>  
            </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <?php 
        // get the custom post type's taxonomy terms
        $custom_taxterms = wp_get_object_terms( $post->ID, 'tags-category', array('fields' => 'ids') );
        // arguments
        $args = array(
        'post_type' => 'company',
        'post_status' => 'publish',
        'posts_per_page' => 3, // you may edit this number
        'orderby' => 'rand',
        'tax_query' => array(
        array(
        'taxonomy' => 'tags-category',
        'field' => 'id',
        'terms' => $custom_taxterms
        )
        ),
        'post__not_in' => array ($post->ID),
        );
        $related_items = new WP_Query( $args );
        // loop over query
        ?>
    <?php if ($related_items->have_posts()) :?>
    <section class="company-single__related">
         <div class="company-single__relwrap l-container">
             <h2 class="company-single__reltitle">関連記事 <span class="company-single__relcap">この企業に関連する記事のご紹介です。</span>
             </h2>
             <div class="company-single__relcont">
                 <div class="company-single__rellist">
                    <?php  while ( $related_items->have_posts() ) : $related_items->the_post();?>
                     <div class="c-box__item c-box__item--4">
                        <a href="#">
                            <div class="c-box__image">
                                <div class="company-single__select">
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
                            </div>
                             <div class="c-box__banner">
                                <h3 class="c-box__title"><?php the_title(); ?></h3>
                                 <p class="c-box__caption"><?php echo get_field('location'); ?></p>
                             </div>
                         </a>  
                     </div>  
                     <?php
                    endwhile;?>   
                </div>
             </div>
         </div>
    </section>
    
    <?php endif; ?>
    <?php
       
        // Reset Post Data
        wp_reset_postdata();
    ?>
    <?php
    $obj = get_queried_object();
    if ( $obj->post_type === 'company' ) {
        $postid = $obj->ID;
        $the_query = new WP_Query(array(
            'post_type' => 'company', 
            'posts_per_page' => 3, 
            'orderby' => 'rand',
            'post__not_in' => array( $postid )
        ));
    }
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <section class="company-single__other">
        <div class="company-single__otherwrap l-container">
            <h2 class="company-single__othertitle">他の企業を探す</h2>
            <div class="company-single__othercont">
            <div class="company-single__otherlist">
                <?php
                    while ($the_query->have_posts()) : $the_query->the_post();
                    $post = get_post();
                ?>
                <a class="c-box__item c-box__item--3" href="<?php echo get_permalink($post->ID); ?>">
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
        </div>
    </section>
    <?php
        endif;
    ?>
    <div class="c-backtotop">
        <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </div>
</main>
<?php get_footer(); ?>
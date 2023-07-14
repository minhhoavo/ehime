<?php /* Template Name: Company */ ?>
<?php get_header();
$post = get_post();
$taxonomies = get_object_taxonomies($post);   
$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
?>
<main class="company">
	<section class="company-banner">
        <img class="company-banner__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/company/company-banner.jpg" alt="企業一覧">
        <h1 class="company-banner__title">CORPORATE INFORMATION<span class="company-banner__caption">企業一覧</span></h1>
    </section>
    
    <section class="company-content l-container">
        <div class="company-content__top">
            <?php custom_breadcrumbs(); ?>
        </div>
        <div class="company-content__bottom">
            <div class="company-content__list">
                <?php
                    $page = get_query_var('paged', 1);
                    $the_query = new WP_Query(array(
                        'order' => 'DESC', 
                        'post_type' => 'company', 
                        'posts_per_page' => 9, 
                        'orderby' => 'date', 
                        'paged' => $page
                    ));
                    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
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
                    endif; 
                ?>
            </div>
            <div class="c-pagination">
                <?php
                echo pagination($the_query, 1, 'company');
                wp_reset_postdata();  ?>
            </div>
        </div>
    </section>
    <div class="c-backtotop">
        <img class="c-backtotop__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/backtotop.svg" alt="backtotop">
    </div>
</main>
<?php get_footer(); ?>
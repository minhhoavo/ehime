<?php
/* pagination - load page*/
function pagination($custom_query = null, $paged = 1)
{
    global $wp_query, $wp_rewrite;
    if ($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1) echo '<div class="c-pagination">';
    echo paginate_links(array(
        'base' => trailingslashit(esc_url(get_pagenum_link())) . "{$wp_rewrite->pagination_base}/%#%/",
        'format'   => '?paged=%#%',
        'current'  => max(1, get_query_var('paged')),
        'total'    => $total,
        'mid_size' => '5',
        'prev_text'    => __('', 'exam'),
        'next_text'    => __('', 'exam'),
    ));
    if ($total > 1) echo '</div>';
}

function build_url($paged, $type)
{
    $url = home_url("/$type/page/" . $paged);
    return $url;
}

/*
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
**/
if (!function_exists('exam_entry_content')) {
    function exam_entry_content()
    {
        if (!is_single()) :
            the_excerpt();
        elseif (is_single()) :
            the_content();
/*
* Code hiển thị phân trang trong post type
*/
            $link_pages = array(
                'before' => __('<p>Page:', 'exam'),
                'after' => '</p>',
                'nextpagelink' => __('Next page', 'exam'),
                'previouspagelink' => __('Previous page', 'exam')
            );
            wp_link_pages($link_pages);
        endif;
    }
}
//Classic Editor
add_filter('use_block_editor_for_post', '__return_false');
//Edit search form
function custom_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url() . '" >
<div class="custom-form"><label class="screen-reader-text" for="s">' . __('Search:') . '</label>
<input type="text" value="' . get_search_query() . '" name="s" id="s" />
<input class="c-search__submit" type="submit" id="searchsubmit" value="' . esc_attr__('近日公開') . '" />
</div>
</form>';

    return $form;
}
add_filter('get_search_form', 'custom_search_form', 40);
    
    function custom_post_type()
    {
        register_post_type(
            'company',
            array(
                'labels'      => array(
                    'name'          => __('Company', 'exam'),
                    'singular_name' => __('Company', 'exam'),
					'taxonomies'    => __('Company Categories','exam')
                ),
                'public'      => true,
                'has_archive' => true,
				'supports' => array( 'title', 'editor', 'custom-fields','thumbnail' ),
                'rewrite'     => array(
                    'slug' => 'company',
                    'with_front' => false
                ), // my custom slug
            )
        );
    }
    add_action('init', 'custom_post_type');

    function add_custom_tags()
    {
        // Add new "Locations" taxonomy to Posts
        register_taxonomy('tags-category', 'company', array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            // This array of options controls the labels displayed in the WordPress Admin UI
            'labels' => array(
                'name' => __('Tags','exam'),
                'singular_name' => __('Tags','exam')
            ),
            // Control the slugs used for this taxonomy
            'rewrite' => array(
                'slug' => '', // This controls the base slug that will display before each term
                'with_front' => false, // Don't display the category base before "/locations/"
                'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        ));
    }
    add_action('init', 'add_custom_tags');

   // Breadcrumbs
   function custom_breadcrumbs()
   {

       // Settings
       $breadcrums_class   = 'c-breadcrumb';
       $home_title         = 'ホーム';

       // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
       $custom_taxonomy    = 'product_cat';

       // Get the query & post information
       global $post, $wp_query;

       // Do not display on the homepage
       if (!is_front_page()) {
           // Build the breadcrums
           echo '<ul class="' . $breadcrums_class . '">
           ';
       
           // Home page
           echo '<li><a href="' . get_home_url() . '">' . $home_title . '</a></li>';

           if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
           $post_type = get_post_type();
           if ($post_type == 'post') {
               $post_type_object = get_post_type_object($post_type);
               echo '<li>' . $post_type_object->labels->name . '</li>';
           }
           if ($post_type == 'company') {
               $post_type_object = get_post_type_object($post_type);
               echo '<li>企業一覧</li>';
           }
       } else if (is_single()) {

           // If post is a custom post type
           $post_type = get_post_type();
           // If it is a custom post type display name and link
           if ($post_type == 'company') {
               $post_type_object = get_post_type_object($post_type);
               $post_type_archive = get_post_type_archive_link($post_type);
               echo '<li><a href="' . $post_type_archive . '">企業一覧</a></li><li>' . get_the_title() . '</li>';
           }
           if ($post_type == 'post') {
               echo '<a href="' . get_site_url() . '/news">ニュース一覧</a>';
               $post_type_object = get_post_type_object($post_type);
               $post_type_archive = get_post_type_archive_link($post_type);
           }
           
           } else if (is_category()) {
               echo '<a href="' . get_site_url() . '/news">ニュース・お知らせ</a>';
               // Category page
               echo '<span>ニュース' . single_cat_title('', false) . '</span>';
           } else if (is_page()) {
               // If child page, get parents 
           $anc = get_post_ancestors( $post->ID );
                  
           // Get parents in the right order
           $anc = array_reverse($anc);
              
           // Parent page loop
           if ( !isset( $parents ) ) $parents = null;
           foreach ( $anc as $ancestor ) {
               $parents .= '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
           }               
           // Display parent pages
           echo $parents;
              
           // Current pageF
               echo '<li><span>' . get_the_title() . '</span></li>';
           } else if (get_query_var('paged')) {

               // Paginated archives
               echo '<span>' . __('Page') . ' ' . get_query_var('paged') . '</span>';
           } else if (is_search()) {

               // Search results page
               echo '<span>Search results for: ' . get_search_query() . '</span>';
           }
           echo '</ul></li>';
       }
   }

    /*
/* Set title is required when publishing post
*/
add_action('edit_form_advanced', 'force_post_title');
function force_post_title($post)
{
    // List of post types that we want to require post titles for.
    $post_types = array(
        'post',
        'report',
        'interview',
        'company', 
        // 'project' 
    );

    // If the current post is not one of the chosen post types, exit this function.
    if (!in_array($post->post_type, $post_types)) {
        return;
    }

?>
    <script type='text/javascript'>
        (function($) {
            $(document).ready(function() {
                //Require post title when adding/editing Project Summaries
                $('body').on('submit.edit-post', '#post', function() {
                    // If the title isn't set
                    if ($("#title").val().replace(/ /g, '').length === 0) {
                        // Show the alert
                        if (!$("#title-required-msj").length) {
                            $("#titlewrap")
                                .append('<div id="title-required-msj"><em>タイトルが必要です。</em></div>')
                                .css({
                                    "padding": "5px",
                                    "margin": "5px 0",
                                    "background": "#ffebe8",
                                    "border": "1px solid #c00"
                                });
                        }
                        // Hide the spinner
                        $('#major-publishing-actions .spinner').hide();
                        // The buttons get "disabled" added to them on submit. Remove that class.
                        $('#major-publishing-actions').find(':button, :submit, a.submitdelete, #post-preview').removeClass('disabled');
                        // Focus on the title field.
                        $("#title").focus();
                        return false;
                    }
                });
            });
        }(jQuery));
    </script>
<?php
}
<?php

// adding widget area
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
            'name' => 'Pre Pre Footer',
            'before_widget' => '<div class = "pre-pre-footer">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}


define('WP_EXPORTER_ADMIN_BAR', true);


// remove 'type="text/javascript"'' & 'type="text/css' https://www.lee-harris.co.uk/blog/remove-type-attribute-script-tags-wordpress/
add_action('template_redirect', function () {
    ob_start(function ($buffer) {
        $buffer = str_replace(array('type="text/javascript"', "type='text/javascript'"), '', $buffer);

        $buffer = str_replace(array('type="text/css"', "type='text/css'"), '', $buffer);
        return $buffer;
    });
});

//Page Slug Body Class
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

/**
 * Enqueue theme styles (parent first, child second)
 */
function wpse218610_theme_styles()
{
    $parent_style = 'gt3_theme';
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/css/theme.css');
    // wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', false);

}
add_action('wp_enqueue_scripts', 'wpse218610_theme_styles');

function wpdocs_scripts_method()
{
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpdocs_scripts_method');

/**
 * REMOVE WP EMOJI
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * dequeue fonts
 */
function wpse_dequeue_google_fonts()
{
    // wp_deregister_style('gt3_font_awesome');
    // wp_dequeue_style('gt3_font_awesome');
    wp_deregister_style('admin_font');
    wp_dequeue_style('admin_font');
}
add_action('wp_enqueue_scripts', 'wpse_dequeue_google_fonts', 30);

@ini_set('upload_max_size', '85M');
@ini_set('post_max_size', '85M');
@ini_set('max_execution_time', '300');

function wpb_add_google_fonts()
{

    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,300;1,400;1,500;1,600;1,700&display=swap', false);
}

add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');

if (!function_exists('gt3pb_showportfolio_categorys')) {
    function gt3pb_showportfolio_categorys($post_type_terms = "")
    {
        if (!isset($term_list)) {
            $term_list = '';
        }

        $permalink = get_permalink();
        $args = array('taxonomy' => 'Category', 'include' => $post_type_terms);
        $terms = get_terms('portfolio_category', $args);
        $count = count($terms);
        $i = 0;
        $iterm = 1;

        if ($count > 0) {
            $cape_list = '';
            if ($count > 1) {
                $term_list .= '<li class="' . (!isset($_GET['slug']) ? 'selected' : '') . '">';

                $args_for_count_all_terms = array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish'
                );
                $query_for_count_all_terms = new WP_Query($args_for_count_all_terms);

                $term_list .= '<a href="#filter" data-option-value="*" data-catname="all" data-title="' . $query_for_count_all_terms->post_count . '">' . esc_html__('All Schools', 'hershel') . '</a>
				</li>';
            }
            $termcount = count($terms);
            if (is_array($terms)) {
                foreach ($terms as $term) {

                    $args_for_count_all_terms = array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'id',
                                'terms' => $term->term_id
                            )
                        )
                    );
                    $query_for_count_all_terms = new WP_Query($args_for_count_all_terms);

                    $i++;
                    $permalink = esc_url(add_query_arg("slug", $term->term_id, $permalink));
                    $term_list .= '<li ';
                    if (isset($_GET['slug'])) {
                        $getslug = $_GET['slug'];
                    } else {
                        $getslug = '';
                    }

                    if (strnatcasecmp($getslug, $term->term_id) == 0) $term_list .= 'class="selected"';

                    $tempname = strtr($term->name, array(
                        ' ' => '-',
                    ));
                    $tempname = strtolower($tempname);
                    $term_list .= '><a data-option-value=".' . $tempname . '" data-catname="' . $tempname . '" href="#filter"  data-title="' . $query_for_count_all_terms->post_count . '">' . $term->name . '</a>
                </li>';
                    if ($count != $i) $term_list .= ' ';
                    else $term_list .= '';

                    $iterm++;
                }
            }
            return '<div class="filter_block"><div class="filter_navigation"><ul id="options" class="splitter"><li><ul data-option-key="filter" class="optionset">' . $term_list . '</ul></li></ul></div></div>';
        }
    }
}

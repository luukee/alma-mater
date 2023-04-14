<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts()
{
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20);

/*
 * prevent all page titles from appearing on any page
 * link: https://elementor.com/help/hello-theme-tips/
 */
function ele_disable_page_title($return)
{
	return false;
}
add_filter('hello_elementor_page_title', 'ele_disable_page_title');


if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

function cptui_register_my_cpts()
{

	/**
	 * Post Type: Schools.
	 */

	$labels = [
		"name" => __("Schools", "hello-elementor-child"),
		"singular_name" => __("School", "hello-elementor-child"),
		"menu_name" => __("My Schools", "hello-elementor-child"),
		"all_items" => __("All Schools", "hello-elementor-child"),
		"add_new" => __("Add new", "hello-elementor-child"),
		"add_new_item" => __("Add new School", "hello-elementor-child"),
		"edit_item" => __("Edit School", "hello-elementor-child"),
		"new_item" => __("New School", "hello-elementor-child"),
		"view_item" => __("View School", "hello-elementor-child"),
		"view_items" => __("View Schools", "hello-elementor-child"),
		"search_items" => __("Search Schools", "hello-elementor-child"),
		"not_found" => __("No Schools found", "hello-elementor-child"),
		"not_found_in_trash" => __("No Schools found in trash", "hello-elementor-child"),
		"parent" => __("Parent School:", "hello-elementor-child"),
		"featured_image" => __("Featured image for this School", "hello-elementor-child"),
		"set_featured_image" => __("Set featured image for this School", "hello-elementor-child"),
		"remove_featured_image" => __("Remove featured image for this School", "hello-elementor-child"),
		"use_featured_image" => __("Use as featured image for this School", "hello-elementor-child"),
		"archives" => __("School archives", "hello-elementor-child"),
		"insert_into_item" => __("Insert into School", "hello-elementor-child"),
		"uploaded_to_this_item" => __("Upload to this School", "hello-elementor-child"),
		"filter_items_list" => __("Filter Schools list", "hello-elementor-child"),
		"items_list_navigation" => __("Schools list navigation", "hello-elementor-child"),
		"items_list" => __("Schools list", "hello-elementor-child"),
		"attributes" => __("Schools attributes", "hello-elementor-child"),
		"name_admin_bar" => __("School", "hello-elementor-child"),
		"item_published" => __("School published", "hello-elementor-child"),
		"item_published_privately" => __("School published privately.", "hello-elementor-child"),
		"item_reverted_to_draft" => __("School reverted to draft.", "hello-elementor-child"),
		"item_scheduled" => __("School scheduled", "hello-elementor-child"),
		"item_updated" => __("School updated.", "hello-elementor-child"),
		"parent_item_colon" => __("Parent School:", "hello-elementor-child"),
	];

	$args = [
		"label" => __("Schools", "hello-elementor-child"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "school", "with_front" => true],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => ["title", "thumbnail", "custom-fields"],
		"taxonomies" => ["category", "post_tag"],
		"show_in_graphql" => false,
	];

	register_post_type("school", $args);

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __("Testimonials", "hello-elementor-child"),
		"singular_name" => __("Testimonial", "hello-elementor-child"),
		"menu_name" => __("My Testimonials", "hello-elementor-child"),
		"all_items" => __("All Testimonials", "hello-elementor-child"),
		"add_new" => __("Add new", "hello-elementor-child"),
		"add_new_item" => __("Add new Testimonial", "hello-elementor-child"),
		"edit_item" => __("Edit Testimonial", "hello-elementor-child"),
		"new_item" => __("New Testimonial", "hello-elementor-child"),
		"view_item" => __("View Testimonial", "hello-elementor-child"),
		"view_items" => __("View Testimonials", "hello-elementor-child"),
		"search_items" => __("Search Testimonials", "hello-elementor-child"),
		"not_found" => __("No Testimonials found", "hello-elementor-child"),
		"not_found_in_trash" => __("No Testimonials found in trash", "hello-elementor-child"),
		"parent" => __("Parent Testimonial:", "hello-elementor-child"),
		"featured_image" => __("Featured image for this Testimonial", "hello-elementor-child"),
		"set_featured_image" => __("Set featured image for this Testimonial", "hello-elementor-child"),
		"remove_featured_image" => __("Remove featured image for this Testimonial", "hello-elementor-child"),
		"use_featured_image" => __("Use as featured image for this Testimonial", "hello-elementor-child"),
		"archives" => __("Testimonial archives", "hello-elementor-child"),
		"insert_into_item" => __("Insert into Testimonial", "hello-elementor-child"),
		"uploaded_to_this_item" => __("Upload to this Testimonial", "hello-elementor-child"),
		"filter_items_list" => __("Filter Testimonials list", "hello-elementor-child"),
		"items_list_navigation" => __("Testimonials list navigation", "hello-elementor-child"),
		"items_list" => __("Testimonials list", "hello-elementor-child"),
		"attributes" => __("Testimonials attributes", "hello-elementor-child"),
		"name_admin_bar" => __("Testimonial", "hello-elementor-child"),
		"item_published" => __("Testimonial published", "hello-elementor-child"),
		"item_published_privately" => __("Testimonial published privately.", "hello-elementor-child"),
		"item_reverted_to_draft" => __("Testimonial reverted to draft.", "hello-elementor-child"),
		"item_scheduled" => __("Testimonial scheduled", "hello-elementor-child"),
		"item_updated" => __("Testimonial updated.", "hello-elementor-child"),
		"parent_item_colon" => __("Parent Testimonial:", "hello-elementor-child"),
	];

	$args = [
		"label" => __("Testimonials", "hello-elementor-child"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "testimonials", "with_front" => true],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail", "excerpt"],
		"show_in_graphql" => false,
	];

	register_post_type("testimonials", $args);
}

add_action('init', 'cptui_register_my_cpts');


function cptui_register_my_cpts_school()
{

	/**
	 * Post Type: Schools.
	 */

	$labels = [
		"name" => __("Schools", "hello-elementor-child"),
		"singular_name" => __("School", "hello-elementor-child"),
		"menu_name" => __("My Schools", "hello-elementor-child"),
		"all_items" => __("All Schools", "hello-elementor-child"),
		"add_new" => __("Add new", "hello-elementor-child"),
		"add_new_item" => __("Add new School", "hello-elementor-child"),
		"edit_item" => __("Edit School", "hello-elementor-child"),
		"new_item" => __("New School", "hello-elementor-child"),
		"view_item" => __("View School", "hello-elementor-child"),
		"view_items" => __("View Schools", "hello-elementor-child"),
		"search_items" => __("Search Schools", "hello-elementor-child"),
		"not_found" => __("No Schools found", "hello-elementor-child"),
		"not_found_in_trash" => __("No Schools found in trash", "hello-elementor-child"),
		"parent" => __("Parent School:", "hello-elementor-child"),
		"featured_image" => __("Featured image for this School", "hello-elementor-child"),
		"set_featured_image" => __("Set featured image for this School", "hello-elementor-child"),
		"remove_featured_image" => __("Remove featured image for this School", "hello-elementor-child"),
		"use_featured_image" => __("Use as featured image for this School", "hello-elementor-child"),
		"archives" => __("School archives", "hello-elementor-child"),
		"insert_into_item" => __("Insert into School", "hello-elementor-child"),
		"uploaded_to_this_item" => __("Upload to this School", "hello-elementor-child"),
		"filter_items_list" => __("Filter Schools list", "hello-elementor-child"),
		"items_list_navigation" => __("Schools list navigation", "hello-elementor-child"),
		"items_list" => __("Schools list", "hello-elementor-child"),
		"attributes" => __("Schools attributes", "hello-elementor-child"),
		"name_admin_bar" => __("School", "hello-elementor-child"),
		"item_published" => __("School published", "hello-elementor-child"),
		"item_published_privately" => __("School published privately.", "hello-elementor-child"),
		"item_reverted_to_draft" => __("School reverted to draft.", "hello-elementor-child"),
		"item_scheduled" => __("School scheduled", "hello-elementor-child"),
		"item_updated" => __("School updated.", "hello-elementor-child"),
		"parent_item_colon" => __("Parent School:", "hello-elementor-child"),
	];

	$args = [
		"label" => __("Schools", "hello-elementor-child"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "school", "with_front" => true],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => ["title", "thumbnail", "custom-fields"],
		"taxonomies" => ["category", "post_tag"],
		"show_in_graphql" => false,
	];

	register_post_type("school", $args);
}

add_action('init', 'cptui_register_my_cpts_school');

// College Sherpa Post Type
function cptui_register_my_cpts_college_sherpa() {

	/**
	 * Post Type: College Sherpa.
	 */

	$labels = [
		"name" => esc_html__( "College Sherpa", "hello-elementor-child" ),
		"singular_name" => esc_html__( "College Sherpa Post", "hello-elementor-child" ),
		"menu_name" => esc_html__( "College Sherpa", "hello-elementor-child" ),
		"all_items" => esc_html__( "All College Sherpa Posts", "hello-elementor-child" ),
		"add_new" => esc_html__( "Add new", "hello-elementor-child" ),
		"add_new_item" => esc_html__( "Add new College Sherpa Post", "hello-elementor-child" ),
		"edit_item" => esc_html__( "Edit College Sherpa Post", "hello-elementor-child" ),
		"new_item" => esc_html__( "New College Sherpa Post", "hello-elementor-child" ),
		"view_item" => esc_html__( "View College Sherpa Post", "hello-elementor-child" ),
		"view_items" => esc_html__( "View College Sherpa Posts", "hello-elementor-child" ),
		"search_items" => esc_html__( "Search College Sherpa Posts", "hello-elementor-child" ),
		"not_found" => esc_html__( "No College Sherpa Posts found", "hello-elementor-child" ),
		"not_found_in_trash" => esc_html__( "No College Sherpa Posts found in trash", "hello-elementor-child" ),
		"parent" => esc_html__( "Parent College Sherpa Post:", "hello-elementor-child" ),
		"featured_image" => esc_html__( "Featured image for this College Sherpa Post", "hello-elementor-child" ),
		"set_featured_image" => esc_html__( "Set featured image for this College Sherpa Post", "hello-elementor-child" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this College Sherpa Post", "hello-elementor-child" ),
		"use_featured_image" => esc_html__( "Use as featured image for this College Sherpa Post", "hello-elementor-child" ),
		"archives" => esc_html__( "College Sherpa Post archives", "hello-elementor-child" ),
		"insert_into_item" => esc_html__( "Insert into College Sherpa Post", "hello-elementor-child" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this College Sherpa Post", "hello-elementor-child" ),
		"filter_items_list" => esc_html__( "Filter College Sherpa Posts list", "hello-elementor-child" ),
		"items_list_navigation" => esc_html__( "College Sherpa Posts list navigation", "hello-elementor-child" ),
		"items_list" => esc_html__( "College Sherpa Posts list", "hello-elementor-child" ),
		"attributes" => esc_html__( "College Sherpa Posts attributes", "hello-elementor-child" ),
		"name_admin_bar" => esc_html__( "College Sherpa Post", "hello-elementor-child" ),
		"item_published" => esc_html__( "College Sherpa Post published", "hello-elementor-child" ),
		"item_published_privately" => esc_html__( "College Sherpa Post published privately.", "hello-elementor-child" ),
		"item_reverted_to_draft" => esc_html__( "College Sherpa Post reverted to draft.", "hello-elementor-child" ),
		"item_scheduled" => esc_html__( "College Sherpa Post scheduled", "hello-elementor-child" ),
		"item_updated" => esc_html__( "College Sherpa Post updated.", "hello-elementor-child" ),
		"parent_item_colon" => esc_html__( "Parent College Sherpa Post:", "hello-elementor-child" ),
	];

	$args = [
		"label" => esc_html__( "College Sherpa", "hello-elementor-child" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => "the-college-sherpa",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "the-college-sherpa", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-carrot",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
		"taxonomies" => [ "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "college_sherpa", $args );
}

add_action( 'init', 'cptui_register_my_cpts_college_sherpa' );


// User capabilities: Editor: remove Elementor Templates 
// LINK: https://wordpress.org/support/topic/does-not-hide-elementor-templates/
add_action( 'admin_menu', 'members_remove_menu_pages' );
function members_remove_menu_pages() {
  $user = wp_get_current_user();
  if ( in_array('owner', $user->roles) ) {
	  remove_menu_page('edit.php?post_type=elementor_library');
	  remove_menu_page('edit-comments.php');
	  remove_menu_page('tools.php');
	  remove_menu_page('rank-math');
  }
}

// Custom Theme Colors!
function alma_mater_admin_color_scheme() {
$theme_dir = get_stylesheet_directory_uri();

  //Alma Mater
  wp_admin_css_color( 'alma_mater', __( 'Alma Mater' ),
    $theme_dir . '/alma_mater.css',
    array( '#1a2f49', '#fff', '#febe2d' , '#a71f23')
  );
}
add_action('admin_init', 'alma_mater_admin_color_scheme');

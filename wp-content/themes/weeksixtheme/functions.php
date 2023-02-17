<?php

// Register Employees post type
function register_employees_post_type()
{
    $labels = array(
        'name' => __('Employees'),
        'singular_name' => __('Employee'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Employee'),
        'edit_item' => __('Edit Employee'),
        'new_item' => __('New Employee'),
        'view_item' => __('View Employee'),
        'search_items' => __('Search Employees'),
        'not_found' => __('No employees found'),
        'not_found_in_trash' => __('No employees found in trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'employees'),
    );

    register_post_type('employees', $args);
}
add_action('init', 'register_employees_post_type');

// Register Department taxonomy
function register_department_taxonomy()
{
    $labels = array(
        'name' => __('Departments'),
        'singular_name' => __('Department'),
        'search_items' => __('Search Departments'),
        'all_items' => __('All Departments'),
        'parent_item' => __('Parent Department'),
        'parent_item_colon' => __('Parent Department:'),
        'edit_item' => __('Edit Department'),
        'update_item' => __('Update Department'),
        'add_new_item' => __('Add New Department'),
        'new_item_name' => __('New Department Name'),
        'menu_name' => __('Department'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'department'),
    );

    register_taxonomy('department', 'employees', $args);
}
add_action('init', 'register_department_taxonomy');

// Add theme support
function employees_theme_setup() {
    // Register navigation menus
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'employees')
    ));

    // Add theme support
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'employees_theme_setup');

// Enqueue scripts and styles
function employees_enqueue_scripts() {
    wp_enqueue_style( 'employees-style', get_stylesheet_directory_uri() . '/style/custom.css', array(), '1.0.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'employees_enqueue_scripts' );



?>

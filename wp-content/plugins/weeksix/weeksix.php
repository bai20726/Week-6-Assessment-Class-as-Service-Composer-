<?php
/**
 * Plugin Name: Week Six
 * Plugin URL: http://weel.com/plugin
 * Description: A custom plugin that creates a custom post type 'employees' and a custom taxonomy 'department'.
 * Version: 1.0.0
 * Author: Christine Mboya
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Employees_Plugin {
    public function __construct() {
        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'init', array( $this, 'create_taxonomy' ) );
    }

    public function create_post_type() {
        $labels = array(
            'name'               => 'Employees',
            'singular_name'      => 'Employee',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Employee',
            'edit_item'          => 'Edit Employee',
            'new_item'           => 'New Employee',
            'view_item'          => 'View Employee',
            'search_items'       => 'Search Employees',
            'not_found'          => 'No employees found',
            'not_found_in_trash' => 'No employees found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Employees'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'employees' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        );

        register_post_type( 'employees', $args );
    }

    public function create_taxonomy() {
        $labels = array(
            'name'              => 'Departments',
            'singular_name'     => 'Department',
            'search_items'      => 'Search Departments',
            'all_items'         => 'All Departments',
            'parent_item'       => 'Parent Department',
            'parent_item_colon' => 'Parent Department:',
            'edit_item'         => 'Edit Department',
            'update_item'       => 'Update Department',
            'add_new_item'      => 'Add New Department',
            'new_item_name'     => 'New Department Name',
            'menu_name'         => 'Department',
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'rewrite'           => array( 'slug' => 'department' ),
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
        );

        register_taxonomy( 'department', 'employees', $args );
    }
}

new Employees_Plugin();



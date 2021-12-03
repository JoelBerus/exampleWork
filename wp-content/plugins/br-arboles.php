<?php
/*
Plugin Name: Br - Arboles
Description: Plugin to register the arboles post type
Version: 1.0
Author: JoelBerus
Author URI:https://pacificland.wpengine.com/
Textdomain: br
License: GPLv2
*/

function br_register_post_type() {
    $labels = array(
        'name' => __( 'Arboles', 'br' ),
        'singular_name' => __( 'Arboles', 'br' ),
        'add_new' => __( 'New Arboles', 'br' ),
        'add_new_item' => __( 'Add New Arboles', 'br' ),
        'edit_item' => __( 'Edit Arboles', 'br' ),
        'new_item' => __( 'New Arboles', 'br' ),
        'view_item' => __( 'View Arboles', 'br' ),
        'search_items' => __( 'Search Arboles', 'br' ),
        'not_found' =>  __( 'No Arboles Found', 'br' ),
        'not_found_in_trash' => __( 'No Arboles found in Trash', 'br' ),
    );
    
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes',
        ),
        'taxonomies' => array('category'),
        'rewrite'   => array( 'slug' => 'Arboles' ),
        'show_in_rest' => true
    );

    register_post_type( 'br_arboles', $args );
}
add_action( 'init', 'br_register_post_type' );



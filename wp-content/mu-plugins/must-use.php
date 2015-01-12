<?php

/*
Plugin Name: Must-Use Functions
Description: Custom Post Types/Taxonomies and any other functions that should persist even if the theme changes.
Author: MC2
Version: 1.0
Author URI: http://thisismc2.com
*/

  // Custom post types

  function create_post_type() {
    register_post_type( 'mc2-service',
      array(
        'labels' => array(
          'name' => __( 'Services' ),
          'singular_name' => __( 'Service' )
        ),
        'supports' => array('title','excerpt','editor','revisions'),
        'rewrite' => array(
          'slug' => 'services'
          ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-exerpt-view'
      )
    );
    register_post_type( 'mc2-trainer',
      array(
        'labels' => array(
          'name' => __( 'Trainers' ),
          'singular_name' => __( 'Trainer' )
        ),
        'supports' => array('title','editor','revisions','thumbnail'),
        'rewrite' => array(
          'slug' => 'trainers'
          ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups'
      )
    );
    register_post_type( 'mc2-testimonial',
      array(
        'labels' => array(
          'name' => __( 'Testimonials' ),
          'singular_name' => __( 'Testimonial' )
        ),
        'supports' => array('title','excerpt','editor','revisions','thumbnail'),
        'rewrite' => array(
          'slug' => 'testimonials'
          ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-testimonial'
      )
    );
  }

  add_action( 'init', 'create_post_type' );

?>
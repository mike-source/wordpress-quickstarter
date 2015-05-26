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

  }
  add_action( 'init', 'create_post_type' );

  // Customise wordpress admin menu

  function remove_menus(){

    //remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    //emove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    //remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings

  }
  add_action( 'admin_menu', 'remove_menus' );

?>
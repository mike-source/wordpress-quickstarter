<?php

/**
 * Theme Setup
 */
function custom_theme_setup() {
  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  // add_theme_support('title-tag');

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // add_image_size('small', 215, 161);
  // add_image_size('archive-thumb', 287, 215);
  // add_image_size('staff-photo', 470, 353);

  // Add default posts and comments RSS feed links to head
  // add_theme_support('automatic-feed-links');

  // Convert Comments / Gallery & Search into HTML5
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5',array('comment-list','comment-form','search-form','gallery','caption'));

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_nav' => 'Primary Navigation',
    'footer_nav' => 'Footer Navigation',
  ));
}
add_action('after_setup_theme', 'custom_theme_setup');

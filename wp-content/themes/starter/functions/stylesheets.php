<?php

/**
 * Attach CSS
 *
 * Enqueue stylesheets in the following order:
 * 1. font-awesome.min.css (from CDN)
 * 2. /theme/assets/css/main.css
 *
 */
function enqueue_theme_styles() {

    $assets = array(
      'font-awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',
      'main-css'  => '/assets/css/main.css?' . filemtime(get_template_directory() . '/assets/css/main.css')
    );

    // Enqueue Style Sheets:
    wp_enqueue_style('font-awesome', $assets['font-awesome'], false, null);
    wp_enqueue_style('main', get_template_directory_uri() . $assets['main-css'], false, null);

}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles', 100);

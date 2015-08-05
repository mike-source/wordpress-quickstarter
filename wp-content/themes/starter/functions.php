<?php

include_once 'functions/theme-config.php';      // setup theme, thumbnail sizes, register nav menus, widgets etc.
include_once 'functions/stylesheets.php';       // attach CSS
include_once 'functions/js.php';                // attach JS
include_once 'functions/shortcodes.php';        // theme specific shortcodes
include_once 'functions/login.php';             // override login styling
include_once 'functions/google-analytics.php';  // integrate google-analytics (just add 'UA-XXXXX-Y' code)

/**
 * Misc Theme functions
 *
 * Add custom/misc functions below here, or group large/sets of functions into a separate file and
 * attach with an include as above.
 *
 */

// Force Hide Admin Bar for all users
add_filter('show_admin_bar', '__return_false');

// Remove horrible emoji stuff from head tag in 4.2
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Add page slug as a <body> Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
        return $classes;
    }
add_filter( 'body_class', 'add_slug_body_class' );

<?php

/**
 * Attach Javasript
 *
 * Enqueue scripts in the following order:
 * 1. /theme/assets/js/vendor/modernizr.min.js (regenerate custom build: http://modernizr.com/download/)
 * 2. jquery-1.11.1.min.js via Google CDN
 * 3. /theme/assets/js/scripts.min.js (in footer, minified, with cache buster timestamp)
 * 4. /theme/assets/js/main.min.js (in footer, unminified if dev, with cache buster timestamp)
 *
 */
function enqueue_theme_scripts() {

    $assets = array(
      'vendor-js' => '/assets/js/scripts.min.js?' . filemtime(get_template_directory() . '/assets/js/scripts.min.js'),
      'mc2-js'    => '/assets/js/main.js?' . filemtime(get_template_directory() . '/assets/js/main.js'),
      'mc2-js-min'    => '/assets/js/main.min.js?' . filemtime(get_template_directory() . '/assets/js/main.js'),
      'modernizr' => '/assets/js/vendor/modernizr-2.8.3-respond-1.1.0.min.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );

  /**
   * jQuery is loaded using the same method from HTML5 Boilerplate:
   * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
   * It's kept in the header instead of footer to avoid conflicts with plugins.
   */
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, false);
    add_filter('script_loader_src', 'jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // Enqueue Javascript:
  wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, false);
  wp_enqueue_script('jquery');
  wp_enqueue_script('vendor_js', get_template_directory_uri() . $assets['vendor-js'], array(), null, true);

  if (WP_ENV === 'development') {
      wp_register_script('mc2_js', get_template_directory_uri() . $assets['mc2-js'], array(), null, true);
      //wp_localize_script('mc2_js', 'ajax_data', array('ajaxurl' => admin_url('admin-ajax.php'))); // hook in AJAX data for main.js
      wp_enqueue_script('mc2_js');
  } else {
      wp_register_script('mc2_js', get_template_directory_uri() . $assets['mc2-js-min'], array(), null, true);
      //wp_localize_script('mc2_js', 'ajax_data', array('ajaxurl' => admin_url('admin-ajax.php'))); // hook in AJAX data for main.js
      wp_enqueue_script('mc2_js');
  }

}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery-1.11.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'jquery_local_fallback');

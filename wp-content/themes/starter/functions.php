<?php

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)

if (!defined('WP_ENV')) {
  define('WP_ENV', 'production');  // scripts.php checks for values 'production' or 'development'
}


/**
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined above
 * - You're not logged in as an administrator
 *
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'google_analytics', 20);
}


/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js (in footer)
 *
 */
function mc2_scripts() {

    $assets = array(
      'stardos'   => '/assets/fonts/stardos-stencil/stylesheet.css?' . filemtime(get_template_directory() . '/assets/fonts/stardos-stencil/stylesheet.css'),
      'main-css'  => '/assets/css/main.css?' . filemtime(get_template_directory() . '/assets/css/main.css'),
      'vendor-js' => '/assets/js/scripts.min.js?' . filemtime(get_template_directory() . '/assets/js/scripts.min.js'),
      'mc2-js'    => '/assets/js/main.js?' . filemtime(get_template_directory() . '/assets/js/main.js'),
      'mc2-js-min'    => '/assets/js/main.min.js?' . filemtime(get_template_directory() . '/assets/js/main.js'),
      'modernizr' => '/assets/js/vendor/modernizr-2.8.3-respond-1.1.0.min.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );

  // Enqueue Style Sheets:
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, null);
  wp_enqueue_style('stardos', get_template_directory_uri() . $assets['stardos'], false, null);
  wp_enqueue_style('main', get_template_directory_uri() . $assets['main-css'], false, null);

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
      wp_localize_script('mc2_js', 'ajax_data', array('ajaxurl' => admin_url('admin-ajax.php'))); // hook in AJAX data for main.js
      wp_enqueue_script('mc2_js');
  } else {
      wp_register_script('mc2_js', get_template_directory_uri() . $assets['mc2-js-min'], array(), null, true);
      wp_localize_script('mc2_js', 'ajax_data', array('ajaxurl' => admin_url('admin-ajax.php'))); // hook in AJAX data for main.js
      wp_enqueue_script('mc2_js');
  }

}
add_action('wp_enqueue_scripts', 'mc2_scripts', 100);

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


// Force Hide Admin Bar for all users
add_filter('show_admin_bar', '__return_false');

/**
 * Theme Setup
 */
function mc2_theme_setup() {
  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  // add_theme_support('title-tag');

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add default posts and comments RSS feed links to head
  add_theme_support('automatic-feed-links');

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
add_action('after_setup_theme', 'mc2_theme_setup');

// Remove horrible emoji stuff from head tag
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
        return $classes;
    }
add_filter( 'body_class', 'add_slug_body_class' );

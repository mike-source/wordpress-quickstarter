<?php
/**
 *
 * @package WordPress
 * @subpackage Form
 * @since Form 1.0
 */

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
function scripts() {

    $assets = array(
      'main-css'  => '/assets/css/main.css?' . filemtime( get_template_directory() . '/assets/css/main.css'),
      'owl-css'   => '/assets/css/owl.carousel.css?' . filemtime( get_template_directory() . '/assets/css/owl.carousel.css'),
      'owl-theme' => '/assets/css/owl.theme.css?' . filemtime( get_template_directory() . '/assets/css/owl.theme.css'),
      'mc2-js'    => '/assets/js/main.js?' . filemtime( get_template_directory() . '/assets/js/main.js'),
      'modernizr' => '/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );

  // Enqueue Style Sheets:
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . $assets['owl-css'], false, null);
  wp_enqueue_style('owl-theme', get_template_directory_uri() . $assets['owl-theme'], false, null);
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
  wp_enqueue_script('mc2_js', get_template_directory_uri() . $assets['mc2-js'], array(), null, true);
}
add_action('wp_enqueue_scripts', 'scripts', 100);

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


/**
 * Theme Setup
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 *
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */

add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ):
function theme_setup() {

  // This theme styles the visual editor
  // add_editor_style();

  // This theme uses post thumbnails
  add_theme_support( 'post-thumbnails' );

  // Add default posts and comments RSS feed links to head
  // add_theme_support( 'automatic-feed-links' );

  // Register navigation
  register_nav_menus( array(
    'primary' => __( 'Primary Navigation', 'twentyten' ),
  ) );

  // Convert Comments / Gallery & Search into HTML5
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

  // We'll be using post thumbnails for custom header images on posts and pages.
  // set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

  // Custom post types
  add_action( 'init', 'create_post_type' );
  function create_post_type() {
    register_post_type( 'form_service',
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
    register_post_type( 'form_testimonial',
      array(
        'labels' => array(
          'name' => __( 'Testimonials' ),
          'singular_name' => __( 'Testimonial' )
        ),
        'supports' => array('title','excerpt','editor','revisions','thumbnail'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-testimonial'
      )
    );
  }

}
endif;

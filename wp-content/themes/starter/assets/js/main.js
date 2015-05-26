/* ========================================================================
 * Custom JS for the KnowsleyUCHS Wordpress Theme
 *
 * Uses DOM-based Routing similar to Roots/Sage theme https://roots.io/sage/
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * JS is separated into page-specific chunks and stored in an object in values
 * named after body classes that match (e.g 'home'). Where a body class contains
 * a dash, the dash is replaced with an underscore.
 *
 *  - Sections of code will only fire when their class is present on body tag.
 *  - Code under 'common' will fire on every page.
 *  - Within each page/class object 'init' code fires before 'finalize'.
 *
 * Execution order is:
 * 'common': { init: function() {} }            // common init
 * 'matched_page': { init: function() {} }      // page-specific init
 * 'matched_page': { finalize: function() {} }  // page-specific finalize
 * 'common': { finalize: function() {} }        // common finalize
 *
 * Code for handling all this is at the bottom of this file.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var CustomJS = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        /**
         * Owl Carousel
         */
         $("#hero-carousel").owlCarousel({
             items: 1,
             autoplay: true,
             autoplaySpeed: 800,
             autoplayTimeout: 6500,
             autoplayHoverPause: true,
             loop: true,
             nav: false,
             dots: false,
             navRewind: true,
             autoHeight: true
         });

         $('.scroll-arrow').on('click', function() {
             $("html, body").animate({ scrollTop: 800 }, "slow");
         });

      }, // end common.init
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

      }, // end home.init
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Archive
    'post_type_archive': {
      init: function() {
        // JavaScript to be fired on archive pages

        function debounce(fn, threshold) {
            var timeout;
            return function debounced() {
                if (timeout) {
                    clearTimeout(timeout);
                }

                function delayed() {
                    fn();
                    timeout = null;
                }
                setTimeout(delayed, threshold || 100);
            };
        };

      } // end post_type_archive.init
    },
    // Single
    'single_post': {
      init: function() {
        // JavaScript to be fired on single post page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = CustomJS;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

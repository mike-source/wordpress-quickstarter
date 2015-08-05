<?php

/**
 * Example shortcode with custom query
 */

/*
function example_shortcode($atts) {
    ob_start();
    $args = array(
        'posts_per_page' => -1,
        'nopaging' => true,
        'post_type' => 'example',
        'no_found_rows' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    $query = new WP_Query($args);
    update_post_thumbnail_cache($query);
?>
    <?php if ($query->have_posts()) while ($query->have_posts()): $query->the_post(); ?>
        <!-- some html -->
    <?php endwhile; ?>

<?php
    return ob_get_clean();
}
add_shortcode('example-shortcode','example_shortcode');
*/

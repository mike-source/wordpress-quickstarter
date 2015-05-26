<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1><?php the_title(); ?></h1>
    <p class="date">Posted on <?php the_time('F j, Y') ?></p>
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</div><!-- #post-## -->

<?php endwhile; ?>

<?php get_footer(); ?>

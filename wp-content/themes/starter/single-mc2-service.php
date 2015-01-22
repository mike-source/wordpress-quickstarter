<?php
/**
 * The Template for displaying single services.
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1><?php the_title(); ?></h1>
    <p class="date">Posted on <?php the_time('F j, Y') ?></p>
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

<div class="navigation">
    <div class="prev"><?php next_post_link( __( 'Older stores', 'twentyten' ) ); ?></div>
    <div class="next"><?php previous_post_link( __( 'Newer stories', 'twentyten' ) ); ?></div>
</div><!-- #nav-below -->

<?php endwhile; ?>

<?php get_footer(); ?>

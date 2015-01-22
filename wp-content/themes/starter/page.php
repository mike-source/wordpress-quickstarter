<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->

<?php endwhile; ?>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

<div class="posts">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="<?php echo $post->post_name; ?>" class="posts__post">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
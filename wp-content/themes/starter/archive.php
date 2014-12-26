<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

<?php if ( have_posts() ) the_post();?>

    <h1>
    <?php if ( is_day() ) : ?>
        <?php printf( __( '<span>%s</span>', 'twentyten' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?>
        <?php printf( __( '<span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : ?>
        <?php printf( __( '<span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
    <?php else : ?>
        <?php _e( 'Archives', 'twentyten' ); ?>
    <?php endif; ?>
    </h1>

<?php rewind_posts(); get_template_part( 'loop', 'archive' );?>
<?php get_footer(); ?>

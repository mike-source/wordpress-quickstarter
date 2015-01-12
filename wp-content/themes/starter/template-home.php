<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<div id="about" class="focus-wrapper">
    <section class="focus  focus--home">
        <div class="focus__label  focus__label--home">About</div>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="expand focus__expand  focus__expand--home"></div>
            <div class="hidden-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<div id="services" class="services-wrapper">
    <section id="services-carousel" class="services  services--home  owl-carousel">
        <?php $loop = new WP_Query( array( 'post_type' => 'form_service', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div>
            <div class="services__label  services__label--home">Services</div>
            <h1><?php the_title(); ?></h1>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="button">Read More</a>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </section>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<div class="map-wrapper">
    <div id='google-map'></div>
</div>

<?php get_footer(); ?>
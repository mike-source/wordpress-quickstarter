<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<div id="about" class="focus-wrapper">
    <section class="focus  focus--home">
        <div class="focus__label  focus__label--home">About</div>
        <h1>Take control of your body with Form.</h1>
        <div class="expand focus__expand  focus__expand--home"></div>
        <div class="hidden-content">
            <p>Form is a focused, results-based personal training service that you can trust.</p>
            <p>Unlike many personal trainers, our programs are entirely designed around your lifestyle to deliver the quality, convenience and reliability you need to reach your fitness goals.</p>
            <p>From a unique training plan to a tailored nutritional program, we leave nothing up to guesswork. You can be confident that our trainers are educated to the highest levels.</p>
            <p>If you want to get the best out of your body, we believe that you need the best facilities and training to get you there. At Form, you’ll find immaculately presented facilities, with state of the art equipment that is exclusive to our elite membership.</p>
            <p>Join Form, and you’ll join a network of like-minded individuals driven to achieve your results.</p>
        </div>
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
            <a href="#" class="button">Read More</a>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </section>
</div>

<div id="testimonials" class="testimonials-wrapper">
    <section id="testimonials-carousel" class="testimonials  testimonials--home  owl-carousel">
        <div>
            <div class="testimonials__label  testimonials__label--home">Team</div>
            <h1>Testimonials</h1>
            <p>Our clients show their proven results</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-1.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-2.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-3.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <a href="#" class="button">Read More</a>
        </div>
        <div>
            <div class="testimonials__label  testimonials__label--home">Team</div>
            <h1>Testimonials</h1>
            <p>More clients show their proven results</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-1.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-2.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-3.jpg" alt="Testimonial Before/After Pic" class="testimonials__photo">
            <a href="#" class="button">Read More</a>
        </div>
    </section>
</div>

<div id="contact" class="contact-wrapper">
    <section class="contact  contact--home">
        <div class="contact__label  contact__label--home">Contact</div>
        <h1>Contact Us</h1>
        <p class="tel">0161 000 000</p>
        <a class="email" href="mailto:info@formmcr.com"><p>info@formmcr.com</p></a>
        <div class="adr">
            <div class="street-address">Elliot House, 151 Deansgate</div>
            <span class="locality">Manchester</span>, <span class="postal-code">M3 3WD</span>
        </div>
    </section>
</div> 

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<div class="map-wrapper">
    <div id='google-map'></div>
</div>

<div id="social" class="connect-wrapper">
    <section class="connect  connect--home">
        <div class="connect__label  connect__label--home">Social</div>
        <h1>Connect With Us</h1>
        <div class="social">
            <span class="social-button"><a href="" class="facebook"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/faceyb.png" height="80" width="80" alt="Facebook"></a></span>
            <span class="social-button"><a href="" class="twitter"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitty.png" height="80" width="80" alt="Twitter"></a></span>
            <span class="social-button"><a href="" class="linked-in"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instaG.png" height="80" width="80" alt="Linked In"></a></span>
      </div>
        <p>Sign up to receive updates:</p>
    </section>
</div>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?><?php endwhile; ?>

<?php get_footer(); ?>

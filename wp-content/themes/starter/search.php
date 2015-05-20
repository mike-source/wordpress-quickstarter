<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<h1><?php printf('Search Results for: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
	<div id="post-0" class="post no-results not-found">
		<h2 class="entry-title">Nothing Found</h2>
		<div class="entry-content">
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php get_footer(); ?>

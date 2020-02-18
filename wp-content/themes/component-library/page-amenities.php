<?php
/* Template Name: Amenities Page */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php // Show the selected page content.
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'page' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>
		<?php //echo do_shortcode('[td_blog_events_feed count="5"]'); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();

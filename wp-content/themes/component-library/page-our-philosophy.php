<?php
/* Template Name: Our Philosophy Page */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

        <?php get_template_part('template-parts/components/hero', 'none'); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'traina-panel ' ); ?>>

	<?php include(locate_template('template-parts/components/page-intro.php') );	?>

	<?php include(locate_template('template-parts/components/section-info.php')); ?>

	<?php include(locate_template('template-parts/components/block-quote.php')); ?>

	<?php
	// Get each of our panels and show the post data.
	if ( 0 !== traina_panel_count() || is_customize_preview() ) : // If we have pages to show.

		/**
		 * Filter number of front page sections in traina.
		 *
		 * @since traina 1.0
		 *
		 * @param int $num_sections Number of front page sections.
		 */
		$num_sections = apply_filters( 'traina_front_page_sections', 4 );
		global $trainacounter;

		// Create a setting and control for each of the sections available in the theme.
		for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
			$trainacounter = $i;
			traina_front_page_section( null, $i );
		}

	endif; // The if ( 0 !== traina_panel_count() ) ends here. ?>
</article><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();

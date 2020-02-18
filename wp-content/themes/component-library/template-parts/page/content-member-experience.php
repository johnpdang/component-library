<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */
$page_post = $post->ID;
$hero_header = get_field('hero_header');
$intro_header = get_field('intro_header', $page_post);
$intro_shortcode = get_field('page_shortcode', $page_post);
$section_info = get_field('2_column_layout');
$new_content = $intro_header ? true : false;

?>

	<?php if($hero_header): ?>
		<?php include(locate_template('template-parts/components/hero.php')); ?>
	<?php else: ?>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php traina_edit_link( get_the_ID() ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php

			if($intro_header || $intro_shortcode):
				include(locate_template('template-parts/components/page-intro.php'));
			endif;

			if($section_info != ''):
				include(locate_template('template-parts/components/section-info-doubleimage.php'));
			endif;


			if($new_content):
				echo $post->post_content;
			else:

				the_content();
			endif;
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'traina' ),
				'after'  => '</div>',
			));

		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

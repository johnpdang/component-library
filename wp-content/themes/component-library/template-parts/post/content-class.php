<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
	$instructor_group = count(get_field('instructor_group'));
	$slider_checkbox = get_field('enable_slider');
	$enable_instructor_slider = $slider_checkbox && $instructor_group > 4 || $instructor_group > 4  ? true : false;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo traina_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>

		<?php include(locate_template('template-parts/components/hero.php')); ?>
		<?php get_template_part( 'template-parts/components/block-offset-intro-video', 'none' ); ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'traina-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php get_template_part( 'template-parts/components/block-intro-w-sidebar', 'none' ); ?>

		<?php
			if(is_single('personal-training')):
				get_template_part( 'template-parts/components/block-classes', 'none' );
				// if( get_field('toggle_class_instructors') === true) {
					if( get_field('instructor_toggle') === true) {
						get_template_part( 'template-parts/components/block-instructors-group', 'none' );
					};
				// };
				// if( get_field('toggle_class_block_quotes') === true) {
					if( get_field('block_quote_toggle') === true) {
						get_template_part( 'template-parts/components/block-quote', 'none' );
					};
				// };
			elseif($enable_instructor_slider ):
				get_template_part( 'template-parts/components/block-classes', 'none' );
					if( get_field('block_quote_toggle') === true) {
						get_template_part( 'template-parts/components/block-quote', 'none' );
					};
					if( get_field('instructor_toggle') === true) {
						get_template_part( 'template-parts/components/block-instructors-group', 'none' );
					};
			else:
				get_template_part( 'template-parts/components/block-classes', 'none' );
					if( get_field('instructor_toggle') === true) {
						get_template_part( 'template-parts/components/block-instructors-group', 'none' );
					};
					if( get_field('block_quote_toggle') === true) {
						get_template_part( 'template-parts/components/block-quote', 'none' );
					};
			endif;
		?>

		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'traina' ),
			get_the_title()
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		traina_entry_footer();
	}
	?>

</article><!-- #post-## -->

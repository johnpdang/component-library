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

$hero_header = get_field('hero_header');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( is_sticky() && is_home() ) :
		echo traina_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<?php if($hero_header): ?>
		<?php

		// if ('blogs-events' === get_post_type() ) {
		// 	$date_html = '<div class="entry-meta">';
		// 		$date_html .= '<p class="meta-title">Blogs & Events / ' . get_the_date('n.j.y', $rid) .'</p>';
		// 	$date_html .= '</div>';

		// 	echo $date_html;
		// };
		include(locate_template('template-parts/components/hero.php')); ?>
	<?php else: ?>
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) {
				echo '<div class="entry-meta">';
					if ( is_single() ) {
						traina_posted_on();
					} else {
						echo traina_time_link();
						traina_edit_link();
					};
				echo '</div><!-- .entry-meta -->';
			};

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'traina-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
		<div class="entry-content">
			<div class="entry-content__wrapper">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'traina' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'traina' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
		</div><?php //.entry-content ?>
		<aside class="sidebar">
				<h5>Trending Stories</h5>
				<div class="sidebar__card">
					<div class="card__body">
						<p class="eyebrow"><span>BLOG</span> / Sep.16.19</p>
						<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus antium doloremque.</h5>
	          <a href="<?php echo get_the_permalink($rid); ?>" class="button"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
					</div>
						</div>
				<div class="sidebar__card">
					<div class="card__body">
						<p class="eyebrow"><span>BLOG</span> / Sep.16.19</p>
						<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus antium doloremque.</h5>
	          <a href="<?php echo get_the_permalink($rid); ?>" class="button"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
					</div>
				</div>
				<div class="sidebar__card">
					<div class="card__body">
						<p class="eyebrow"><span>BLOG</span> / Sep.16.19</p>
						<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accus antium doloremque.</h5>
	          <a href="<?php echo get_the_permalink($rid); ?>" class="button"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
					</div>
				</div>
			<!-- TODO: Shortcode for trending blogs goes here -->
		</aside>
	</div><?php //.entry-content-wrapper ?>
	<?php
	if ( is_single() ) {
		traina_entry_footer();
	}
	?>

</article><!-- #post-## -->

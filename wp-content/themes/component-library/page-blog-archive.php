<?php /* Template Name: Blog & Events Page */
    $sidebar_shortcode = get_field('shortcode_for_sidebar');
    $has_sidebar = $sidebar_shortcode ? 'has-sidebar' : '';
    $hero_header = get_field('hero_header');

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php

            while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if($hero_header): ?>
                        <?php include(locate_template('template-parts/components/hero.php')); ?>
                    <?php else: ?>
                        <header class="entry-header <?php echo $has_sidebar; ?>">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            <?php traina_edit_link( get_the_ID() ); ?>
                        </header><!-- .entry-header -->
                    <?php endif; ?>

                    <section class="entry-content">
                        <div class="entry-content__wrapper">
                        <?php include(locate_template('template-parts/components/page-intro.php')); ?>
                        </div>
                    </section>
                    <section class="col-xs-12 archive_more_posts">
                        <div class="container container__xl">
                            <div class="row">
                                <h5>More Blog & Events</h5>
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                        </div>

                    </section>
                </article>
        <?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();

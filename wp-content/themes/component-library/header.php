<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://use.typekit.net/ltt3pok.css">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'traina' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="navbar-brand">
			<a href="/" title="Return to homepage">
				<div class="title">
					<div id="website_logo_link" class="image_link" aria-hidden="true" tabindex="1">
						<span class="site-logo"><?php echo traina_get_svg_icon('logo-with-icon'); ?></span>
					</div>
				</div>
			</a>
		</div>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
				<div class="navigation-overlay"></div>
			</div><!-- .navigation-top -->

			<div class="menu-toggle">
				<button class="toggle">
					<span class="open">Menu</span>
					<span class="close"><?php traina_get_svg_icon('white-close', true)?></span>
				</button>
			</div>

			<div class="navigation-mobile">
				<?php $office_info = td_acf_options('td_global_office_info');?>

				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
				</div><!-- .wrap -->
				<div class="navigation-overlay"></div>
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<?php /* <div class="navbar-search">
			<?php get_search_form(); ?>
		</div> */?>

		<div id="nav-join">
			<a href="<?php echo get_page_link(161);?>" title="">Join Us <?php traina_get_svg_icon("small-orange-arrow", true);?></a>
		</div>

	</header><!-- #masthead -->
